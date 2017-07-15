#ifndef SENSOR_H
#define SENSOR_H

#include <sancus/sm_support.h>

extern struct SancusModule sensor;

typedef unsigned sensor_data_t;

sensor_data_t SM_ENTRY(sensor) read_sensor_data_t(void);

#endif
