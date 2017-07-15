#include "reader.h"

#include <stdio.h>

DECLARE_SM(reader, 0x1234);

static sensor_data_t SM_FUNC(reader) transform_readings(sensor_data_t data)
{
    return data ^ 0xcafe;
}

int SM_FUNC(reader) outside_sm(void *p)
{
    return ( (p < (void*) &__PS(reader)) || (p >= (void*) &__PE(reader)) ) &&
           ( (p < (void*) &__SS(reader)) || (p >= (void*) &__SE(reader)) );
}

void SM_ENTRY(reader) get_readings(nonce_t no, ReaderOutput* out)
{
    /* Ensure output memory range about to be dereferenced lies outside SM. */
    if (!(outside_sm(out) && outside_sm(out + sizeof(ReaderOutput) - 1)))
    {
        puts("Illegal argument");
        return;
    }

    /* Securely verify and call sensor SM. */
    sensor_data_t data = read_sensor_data_t();

    /* Transform and seal sensor readings. */
    sensor_data_t transformed = transform_readings(data);

    if (!sancus_wrap(&no, sizeof(no), &transformed, sizeof(transformed),
                     out->cipher, out->tag))
    {
        puts("Error encrypting data");
    }
}
