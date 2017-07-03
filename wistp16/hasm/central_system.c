#include <sancus/reactive.h>

#include <stdio.h>

#include "wan_commands.h"

#define SMNAME     CS

SM_OUTPUT(SMNAME, load_switch_out);
SM_OUTPUT(SMNAME, esme_out);


static int     SM_DATA(SMNAME) initialised;
static int     SM_DATA(SMNAME) time;
static int     SM_DATA(SMNAME) seq;
static int     SM_DATA(SMNAME) consumption;

#define CHANNEL_LS   1
#define CHANNEL_ESME 2

void SM_FUNC(SMNAME) init(void)
{
  if (! initialised) {
    time        = 0;
    seq         = 0;
    consumption = 0;
    initialised = 1;
  }
}

SM_FUNC(SMNAME) void operate_esme_load_switch(uint8_t action)
{
    uint8_t data[] __attribute__((aligned(2)))
                   = { (seq   >> (8*0)) & 0xff,
                       (seq   >> (8*1)) & 0xff,
                       action, 0 };

    seq += 1;

    load_switch_out(data, sizeof(data));
}

void SM_FUNC(SMNAME) get_input(uint8_t channel, const uint8_t *data,
    size_t len)
{
    if (channel == CHANNEL_ESME) {
      if (len >= 3 && data[2] == GET_CONSUMPTION_DATA) {
        consumption = 1;
      }
    }
}

SM_FUNC(SMNAME) void get_consumption_data(void)
{
    uint8_t data[4] __attribute__((aligned(2)))
                   = { (seq   >> (8*0)) & 0xff,
                       (seq   >> (8*1)) & 0xff,
                       GET_CONSUMPTION_DATA, 0 };

    seq += 1;
    esme_out(data, sizeof(data));
}

SM_ENTRY(SMNAME) void advance_time(void)
{
    if (! initialised) { init(); }
    time++;
}

SM_INPUT(SMNAME, load_switch_in, data, len)
{
    if (! initialised) { init(); }

    get_input(CHANNEL_LS, data, len);
}

SM_INPUT(SMNAME, esme_in, data, len)
{
    if (! initialised) { init(); }

    get_input(CHANNEL_ESME, data, len);
}

