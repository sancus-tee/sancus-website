
#include <stdio.h>

#include "ihd.h"
#include "wan_commands.h"


static uint8_t  ihd_supply_state;
static uint16_t ihd_active_power_import;
static uint16_t ihd_active_import_register;


void ihd_update_supply_state (uint8_t i)
{
    ihd_supply_state = i;
}

void ihd_update_active_power_import (uint16_t i)
{
    ihd_active_power_import = i;
}

void ihd_update_active_import_register (uint16_t i)
{
    ihd_active_import_register = i;
}

void ihd_display (void)
{
    printf ("* IHD -- Supply: ");
    if (ihd_supply_state == SUPPLY_STATE_ENABLED) {
      printf (" ON; "); }
    else if (ihd_supply_state == SUPPLY_STATE_DISABLED) {
      printf ("OFF; "); }
    else {
      printf ("???; "); }
    printf ("Active Power: %u; Total Consumption: %u\n",
      ihd_active_power_import, ihd_active_import_register);
}

