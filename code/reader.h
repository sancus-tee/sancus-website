#ifndef READER_H
#define READER_H

#include <sancus/sm_support.h>
#include "sensor.h"

extern struct SancusModule reader;

typedef struct
{
    sensor_data data;
    char mac[16];
} ReaderOutput;

void SM_ENTRY("reader") get_readings(ReaderOutput* out);

#endif

