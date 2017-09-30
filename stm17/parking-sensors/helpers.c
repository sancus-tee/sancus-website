#ifndef __HELPERS


static __attribute__((noinline)) void print_byte(uint8_t b)
{
    printf("%02x", b);
}

static __attribute__((noinline)) void printf1(char *f)
{
    printf(f);
}



#endif /* #ifndef __HELPERS */

