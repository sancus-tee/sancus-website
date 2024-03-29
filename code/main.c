#include <msp430.h>
#include <stdio.h>
#include <sancus/sm_support.h>
#include "reader.h"

void print_bytes(const char* bytes, size_t n)
{
    int i;
    for (i = 0; i < n; i++)
        printf("%02x", bytes[i] & 0xff);
}

int main()
{
    WDTCTL = WDTPW | WDTHOLD;

    sancus_enable(&sensor);
    sancus_enable(&reader);

    nonce_t no = 0xabcd;
    ReaderOutput out;
    get_readings(no, &out);

    printf("Nonce: ");
    print_bytes((char*)&no, sizeof(no));
    printf(", Cipher: ");
    print_bytes((char*)&out.cipher, sizeof(out.cipher));
    printf(", Tag: ");
    print_bytes(out.tag, sizeof(out.tag));
    putchar('\n');

    return 0;
}

int putchar(int c)
{
    P1OUT = c;
    P1OUT |= 0x80;

    return c;
}
