#include <sancus/reactive.h>

#include <stdio.h>

#include "wan_commands.h"

#define SMNAME   ESME_LS

#define LOG_ENTRY_SIZE 4
#define LOG_SIZE       3

SM_OUTPUT(SMNAME, central_system_out);
SM_OUTPUT(SMNAME, esme_out);

static int     SM_DATA(SMNAME) seq;
static uint8_t SM_DATA(SMNAME) supply_state;

static uint8_t SM_DATA(SMNAME) load_switch_log[LOG_ENTRY_SIZE * LOG_SIZE];
static uint8_t SM_DATA(SMNAME) load_switch_log_index;

#define CHANNEL_CS   1
#define CHANNEL_ESME 2

void SM_FUNC(SMNAME) write_load_switch_log(const uint8_t *data, size_t len)
{
    if (load_switch_log_index == LOG_SIZE) {
      load_switch_log_index = 0; }

    load_switch_log[(load_switch_log_index * LOG_ENTRY_SIZE) + 0] = data[0];
    load_switch_log[(load_switch_log_index * LOG_ENTRY_SIZE) + 1] = data[1];
    load_switch_log[(load_switch_log_index * LOG_ENTRY_SIZE) + 2] = data[2];

    load_switch_log_index++;
}

void SM_FUNC(SMNAME) produce_output(uint8_t channel, uint8_t info)
{
    uint8_t data[4 + (LOG_ENTRY_SIZE * LOG_SIZE)] __attribute__((aligned(2)))
                   = { (seq    >> (8*0)) & 0xff,
                       (seq    >> (8*1)) & 0xff,
                       info };
    seq += 1;

    if (info == 0xff) {
      for(int i = 0; i < (LOG_ENTRY_SIZE * LOG_SIZE); i++) {
        data[3 + i] = load_switch_log[i];
      }
    }

    if (channel == CHANNEL_CS) {
      central_system_out(data, sizeof(data));
    }

    if (channel == CHANNEL_ESME) {
      esme_out(data, sizeof(data));
    }
}

void SM_FUNC(SMNAME) get_input(uint8_t channel, const uint8_t *data,
    size_t len)
{
    if (len >= 3) {
        if (channel == CHANNEL_CS) {
          if (data[2] & ENABLE_SUPPLY) {
            write_load_switch_log(data, len);
            supply_state = SUPPLY_STATE_ENABLED;
            produce_output(CHANNEL_CS, ENABLE_SUPPLY);
          }
          if (data[2] & DISABLE_SUPPLY) {
            write_load_switch_log(data, len);
            supply_state = SUPPLY_STATE_DISABLED;
            produce_output(CHANNEL_CS, DISABLE_SUPPLY);
          }
          if (data[2] & GET_SUPPLY_STATE) {
            produce_output(CHANNEL_CS, supply_state);
          }
          if (data[2] & GET_LOAD_SWITCH_LOG) {
            produce_output(CHANNEL_CS, 0xff);
          }
        }
        if (channel == CHANNEL_ESME) {
          if (data[2] & GET_SUPPLY_STATE) {
            produce_output(CHANNEL_ESME, supply_state);
          }
        }
    }
}

SM_INPUT(SMNAME, central_system_in, data, len)
{
    get_input(CHANNEL_CS, data, len);
}

SM_INPUT(SMNAME, esme_in, data, len)
{
    get_input(CHANNEL_ESME, data, len);
}

