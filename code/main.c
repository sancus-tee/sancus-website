#include <msp430.h>
#include <stdio.h>
#include <sancus/sm_support.h>
#include "reader.h"

// NOTE: this struct is put in the data section instead of on the stack due to
// a bug in the LLVM MSP430 backend
ReaderOutput out;

void print_bytes(const char* bytes, size_t n)
{
    int i;
    for (i = 0; i < n; i++)
        printf("%02x", bytes[i] & 0xff);
}

int main()
{
    WDTCTL = WDTPW | WDTHOLD;

    protect_sm(&sensor);
    protect_sm(&reader);

    get_readings(&out);

    printf("Data: ");
    print_bytes((char*)&out.data, sizeof(out.data));
    printf(", MAC: ");
    print_bytes(out.mac, sizeof(out.mac));
    printf("\n");

    return 0;
}

int putchar(int c)
{
    P1OUT = c;
    P1OUT |= 0x80;
    return c;
}

