#include <sancus/reactive.h>

#include <stdio.h>


#include "helpers.c"

#define SMNAME display
#define SNONCE 0xffac

SM_INPUT(SMNAME, input, data, len)
{
    printf1("* SM display   : got input    -- ");

    for (unsigned i = 0; i < len; i++) {
        print_byte(data[i]);
    }

    printf1("- len: ");
    print_byte(len >> (8*0));
    print_byte(len >> (8*1));
    printf1("  ");

    if (len >= 5) {
        printf1(" DISPLAY: ");
        print_byte(data[4]);
    }

    printf1("\n");
}

