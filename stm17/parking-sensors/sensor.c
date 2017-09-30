#include <sancus/reactive.h>

#include <stdio.h>


#include "sensor.h"

SM_OUTPUT(SMNAME, output);

static int     SM_DATA(SMNAME) initialised;
static int     SM_DATA(SMNAME) nonce;
static int     SM_DATA(SMNAME) seq;
static uint8_t SM_DATA(SMNAME) action;

#define __stringify(arg) #arg
#define STRINGIFY(ARG)   __stringify(ARG)


void SM_FUNC(SMNAME) init(void)
{
  if (! initialised) {
    nonce       = SNONCE;
    seq         = 0;
    action      = 0;
    initialised = 1;
  }
}

SM_ENTRY(SMNAME) void produce_output(void)
{
    puts("* SM " STRINGIFY(SMNAME) ": produce_output");

    if (! initialised) { init(); }

    if (seq == 0) { action = SPOT_FREE; }
    if (seq == 2) { action = SPOT_OCCUPIED | CAR_ENTER; }
    if (seq == 3) { action = SPOT_OCCUPIED; }
    if (seq == 5) { action = SPOT_FREE | CAR_EXIT; }
    if (seq == 6) { action = SPOT_FREE; }

    uint8_t data[] __attribute__((aligned(2)))
                   = { (nonce >> (8*0)) & 0xff,
                       (nonce >> (8*1)) & 0xff,
                       (seq   >> (8*0)) & 0xff,
                       (seq   >> (8*1)) & 0xff,
                       action, 0 };
    seq += 1;

    output(data, sizeof(data));
}

