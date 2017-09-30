#include <sancus/reactive.h>

#include <stdio.h>


#include "sensor.h"
#include "helpers.c"

static __attribute__((noinline)) void decode_print(uint8_t b)
{
    if (b & SPOT_OCCUPIED) {
      printf(" OCCU");
    }
    if (b & SPOT_FREE) {
      printf(" FREE");
    }
    if (b & CAR_ENTER) {
      printf(" ENTR");
    }
    if (b & CAR_EXIT) {
      printf(" EXIT");
    }
}


#define SMNAME aggregator
#define SNONCE 0xacdc

SM_OUTPUT(SMNAME, output);

static uint8_t SM_DATA(SMNAME) spot1_status;
static uint8_t SM_DATA(SMNAME) spot2_status;
static int     SM_DATA(SMNAME) seq;

void SM_FUNC(SMNAME) produce_output(void)
{
    uint8_t free_spots = 0;

    if (spot1_status & SPOT_FREE) { free_spots += 1; }
    if (spot2_status & SPOT_FREE) { free_spots += 1; }

    uint8_t data[] __attribute__((aligned(2)))
                   = { (SNONCE >> (8*0)) & 0xff,
                       (SNONCE >> (8*1)) & 0xff,
                       (seq    >> (8*0)) & 0xff,
                       (seq    >> (8*1)) & 0xff,
                       free_spots, 0 };
    seq += 1;

    printf1("* SM aggregator: sending      ++ ");
    for (unsigned i = 0; i < sizeof(data); i++) {
      print_byte(data[i]);
    }
    printf1("+\n");

    output(data, sizeof(data));  
}

void SM_FUNC(SMNAME) get_input(uint8_t input, const uint8_t *data, size_t len)
{
    printf1("* SM aggregator: got input ");
    print_byte(input);
    printf1(" -- ");

    for (unsigned i = 0; i < len; i++) {
        print_byte(data[i]);
    }
    if (len >= 5) {
        decode_print(data[4]);
        if (input == 1) { spot1_status = data[4]; }
        if (input == 2) { spot2_status = data[4]; }
    }

    printf1("-\n");
    produce_output();
}

SM_INPUT(SMNAME, input1, data, len)
{
    get_input(1, data, len);
}

SM_INPUT(SMNAME, input2, data, len)
{
    get_input(2, data, len);
}

