/*
 * Copyright (c) 2007, Swedish Institute of Computer Science.
 * All rights reserved. 
 *
 * Redistribution and use in source and binary forms, with or without 
 * modification, are permitted provided that the following conditions 
 * are met: 
 * 1. Redistributions of source code must retain the above copyright 
 *    notice, this list of conditions and the following disclaimer. 
 * 2. Redistributions in binary form must reproduce the above copyright 
 *    notice, this list of conditions and the following disclaimer in the 
 *    documentation and/or other materials provided with the distribution. 
 * 3. Neither the name of the Institute nor the names of its contributors 
 *    may be used to endorse or promote products derived from this software 
 *    without specific prior written permission. 
 *
 * THIS SOFTWARE IS PROVIDED BY THE INSTITUTE AND CONTRIBUTORS ``AS IS'' AND 
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE 
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE 
 * ARE DISCLAIMED.  IN NO EVENT SHALL THE INSTITUTE OR CONTRIBUTORS BE LIABLE 
 * FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL 
 * DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS 
 * OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) 
 * HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT 
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY 
 * OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF 
 * SUCH DAMAGE. 
 *
 * This file is part of the Contiki operating system.
 * 
 * Author: Oliver Schmidt <ol.sc@web.de>
 *
 */

/**
 * \file
 *         A very simple Contiki application showing how to use the Contiki
 *         Multi-threading library
 * \author
 *         Oliver Schmidt <ol.sc@web.de>
 */

/* The Contiki Multi-threading library is on Windows implemented using
 * Win32 fibers. The Cygwin C-library implements Thread-Local-Storage
 * in a way that is incompatible with fibers. Therefore most Cygwin
 * C-library functions don't work when called from a Contiki thread. */

#include <string.h>
#include <stdio.h>
#include "contiki.h"
#include "sys/mt.h"

#include "../config.h"
#include "../ta_mod_external.h"
#include "multi-threading.h"

PROCESS(multi_threading_process, "Multi-threading process");


static char *ptr;


/*---------------------------------------------------------------------------*/
static void
thread_func(char *str, int len)
{
  ptr = str + len;
  mt_yield();

  if(len) {
    thread_func(str, len - 1);
    mt_yield();
  }

  ptr = str + len;
}
/*---------------------------------------------------------------------------*/
static void
thread_main(void *data)
{
  while(1) {
    thread_func((char *)data, 9);
  }
  mt_exit();
}
/*---------------------------------------------------------------------------*/
PROCESS_THREAD(multi_threading_process, ev, data)
{
  static struct mt_thread alpha_thread;
  static struct mt_thread count_thread;

  static struct etimer timer;
  static int toggle;

  PROCESS_BEGIN();


  static char *alpha = "JIHGFEDCBA";
  static char *count = "9876543210";


  mt_init();
  mt_start(&alpha_thread, thread_main, alpha);
  mt_start(&count_thread, thread_main, count);

RESET:
  puts ("Multi-threading process: attempting to register invariants.");
  etimer_set(&timer, CLOCK_SECOND / CLOCK_DIV);

  while(1) {
    PROCESS_WAIT_EVENT();

    {
      static int invars_registered = 0;
      int res;
      if (! invars_registered) {
        res = TARegInvar(alpha, strlen(alpha) + 1);
        if (res != TA_SUCCESS) { goto RESET; }
        res = TARegInvar(count, strlen(count) + 1);
        if (res != TA_SUCCESS) { goto RESET; }
        invars_registered = 1;
      }
    }

    if(ev == PROCESS_EVENT_TIMER) {
      if(toggle) {
        mt_exec(&alpha_thread);
        toggle--;
      } else {
        mt_exec(&count_thread);
        toggle++;
      }
      puts(ptr);

      etimer_set(&timer, CLOCK_SECOND / CLOCK_DIV);
    }
  }

  mt_stop(&alpha_thread);
  mt_stop(&count_thread);
  mt_remove();

  PROCESS_END();
}
/*---------------------------------------------------------------------------*/

