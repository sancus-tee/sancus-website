#include <sancus/reactive.h>

#include <stdio.h>

#include "wan_commands.h"
#include "ihd.h"

#define SMNAME     HAN

static uint16_t SM_DATA(SMNAME) consumption_timestamp;
static uint8_t  SM_DATA(SMNAME) supply_state;
static uint16_t SM_DATA(SMNAME) active_power_import;
static uint16_t SM_DATA(SMNAME) active_import_register;


#define CHANNEL_ESME 1

void SM_FUNC(SMNAME) get_input(uint8_t channel, const uint8_t *data,
    size_t len)
{
    if (channel == CHANNEL_ESME) {
      if (len >= 9 && data[2] == GET_CONSUMPTION_DATA) {
        consumption_timestamp += 1;
        supply_state = data[4];
        active_power_import = data[5] | data[6] << (8*1);
        active_import_register = data[7] | data[8] << (8*1);

        ihd_update_supply_state(supply_state);
        ihd_update_active_power_import(active_power_import);
        ihd_update_active_import_register(active_import_register);
        ihd_display();
      }
    }
}

SM_INPUT(SMNAME, esme_in, data, len)
{
    get_input(CHANNEL_ESME, data, len);
}

