
SET_ENV      = $(shell cat ../sancus-setenv)

CC=${SET_ENV} sancus-cc
LD=${SET_ENV} sancus-ld
SIM=sancus-sim
CRYPTO=sancus-crypto
LOAD=sancus-loade

INCLUDES = -I../contiki-support/contiki/core/lib/
CFLAGS   = -Os ${INCLUDES}

#REACTIVE_FLAGS=--verbose
#REACTIVE_FLAGS=--debug
REACTIVE_FLAGS=
DEPLOY=${SET_ENV} ../sancus/bin/reactive-tools ${REACTIVE_FLAGS} deploy --deploy-in-order --result result.json
CALL=${SET_ENV} ../sancus/bin/reactive-tools ${REACTIVE_FLAGS} call --config result.json


OBJECTS=central_system.o esme_load_switch.o esme.o han-if.o ihd.o
BINS=central_system.elf esme_load_switch.elf esme.elf han-if.elf


all: build

deploy: build
	test -f runmote
	${DEPLOY} esme-scenario.json

test-step: test-step-cs test-step-esme

test-step-cs:
	test -f runmote
	${CALL} --module CS --entry advance_time

test-step-esme:
	test -f runmote
	${CALL} --module ESME --entry advance_time

test:
	${MAKE} test-step
	${MAKE} test-step
	${MAKE} test-step
	${MAKE} test-step
	${MAKE} test-step
	${MAKE} test-step
	${MAKE} test-step
	${MAKE} test-step
	${MAKE} test-step
	${MAKE} test-step
	${MAKE} test-step

# don't forget:
# sysctl net.ipv4.ip_forward=1
# ~muehlber/git/leuven/sancus/contiki-support/contiki/tools/tunslip -s /dev/ttyUSB1 -t tun0 192.168.0.2 255.255.255.255
# ~muehlber/git/leuven/sancus/contiki-support/contiki/tools/tunslip -s /dev/ttyUSB3 -t tun1 192.168.0.3 255.255.255.255
runmote: clean
	test -c /dev/ttyUSB0 -a -c /dev/ttyUSB1
	test -c /dev/ttyUSB2 -a -c /dev/ttyUSB3
	${MAKE} -C ../ contiki-support-build
	touch runmote
	screen -c screenrc
	rm -f runmote

runmote-n1:
	${MAKE} -C ../ contiki-support-run_n1

runmote-n2:
	${MAKE} -C ../ contiki-support-run_n2

build: ${OBJECTS} ${BINS}
	${MAKE} -C ../contiki-support/contiki/tools/ tunslip

stats: build
	cloc *.c *.h
	size *.elf ihd.o

central_system.o: central_system.c wan_commands.h 
esme_load_switch.o: esme_load_switch.c wan_commands.h 
esme.o: esme.c wan_commands.h 
han-if.o: han-if.c wan_commands.h ihd.h
ihd.o: ihd.c ihd.h

%.elf: %.o
	${LD} $< -o $@

.PHONY: clean distclean
clean:
	rm -f ${OBJECTS} ${BINS}
	rm -f result.json
	rm -f runmote

distclean: clean


