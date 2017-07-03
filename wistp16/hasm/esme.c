#include <sancus/reactive.h>

#include <stdio.h>
#include <stdlib.h>
#include <random.h>

#include "wan_commands.h"

#define SMNAME     ESME

#define MAX_OBSERVERS 4

SM_OUTPUT(SMNAME, load_switch_out);
SM_OUTPUT(SMNAME, central_system_out);
SM_OUTPUT(SMNAME, han_if_out);


static int      SM_DATA(SMNAME) initialised;
static uint16_t SM_DATA(SMNAME) time;
static int      SM_DATA(SMNAME) seq;

static uint8_t  SM_DATA(SMNAME) supply_state;
static uint16_t SM_DATA(SMNAME) active_power_import;
static uint16_t SM_DATA(SMNAME) active_import_register; // too small; CC bug
static uint8_t  SM_DATA(SMNAME) observers[MAX_OBSERVERS];

#define CHANNEL_LS   1
#define CHANNEL_CS   2
#define CHANNEL_HAN  3

static uint32_t modu16 (uint32_t i, uint32_t j)
{
    return (i % j);
}

void SM_FUNC(SMNAME) init(void)
{
  if (! initialised) {
    time         = 0;
    seq          = 0;

    supply_state = 1;
    active_power_import    = 0;
    active_import_register = 0;

    random_init(0);
    for (int i = 0; i < MAX_OBSERVERS; i++) {
      observers[i] = 0 ;
    }
    observers[0] = CHANNEL_HAN;

    initialised  = 1;
  }
}

void SM_FUNC(SMNAME) produce_output(uint8_t channel, uint8_t info)
{
    uint8_t data[4] __attribute__((aligned(2)))
                   = { (seq    >> (8*0)) & 0xff,
                       (seq    >> (8*1)) & 0xff,
                       info, 0 };
    seq += 1;

    if (channel == CHANNEL_CS) {
      central_system_out(data, sizeof(data));
    }

    if (channel == CHANNEL_LS) {
      load_switch_out(data, sizeof(data));
    }
}

void SM_FUNC(SMNAME) output_consumption_data(void)
{
    uint8_t data[10] __attribute__((aligned(2)))
                     = { (seq                    >> (8*0)) & 0xff,
                         (seq                    >> (8*1)) & 0xff,
                         GET_CONSUMPTION_DATA, 0,
                         supply_state,
                         (active_power_import    >> (8*0)) & 0xff,
                         (active_power_import    >> (8*1)) & 0xff,
                         (active_import_register >> (8*0)) & 0xff,
                         (active_import_register >> (8*1)) & 0xff};

    for (int i = 0; i < MAX_OBSERVERS; i++) {
      if (observers[i] == CHANNEL_HAN) {
        han_if_out(data, sizeof(data));
      }
      else if (observers[i] == CHANNEL_CS) {
        central_system_out(data, sizeof(data));
      }
    }
}

void SM_FUNC(SMNAME) get_input(uint8_t channel, const uint8_t *data,
    size_t len)
{
    if (channel == CHANNEL_LS && len >= 3) {
      supply_state = data[2]; /* only one opperation supported */
    }

    if (channel == CHANNEL_CS && len >= 3) {
      if (data[2] == GET_CONSUMPTION_DATA) {
        for (int i = 0; i < MAX_OBSERVERS; i++) {
          if (observers[i] == 0 || observers[i] == CHANNEL_CS) {
            observers[i] = CHANNEL_CS;
            produce_output(CHANNEL_CS, GET_CONSUMPTION_DATA);
            break; }
        }
      }
    }
}


SM_ENTRY(SMNAME) void advance_time(void)
{
    if (! initialised) {
      init();
      produce_output(CHANNEL_LS, GET_SUPPLY_STATE);
    }
    time++;

    // measure consumption; should be a call to a protected driver
    if (supply_state == SUPPLY_STATE_ENABLED) {
      active_power_import = 50 + (modu16(random_rand(), 100));
    } else {
      active_power_import = 0;
    }
    // accumulate; wee need a notion of time her
    active_import_register += active_power_import;


    if (! (modu16(time, 5))) {
      produce_output(CHANNEL_LS, GET_SUPPLY_STATE);
      output_consumption_data();
    }
}

SM_INPUT(SMNAME, load_switch_in, data, len)
{
    if (! initialised) { init(); }

    get_input(CHANNEL_LS, data, len);
}

SM_INPUT(SMNAME, central_system_in, data, len)
{
    if (! initialised) { init(); }

    get_input(CHANNEL_CS, data, len);
}

