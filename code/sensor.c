#include "sensor.h"

DECLARE_SM(sensor, 0x1234);

static sensor_data_t SM_DATA(sensor) data;

sensor_data_t SM_ENTRY(sensor) read_sensor_data_t(void)
{
    return data;
}
