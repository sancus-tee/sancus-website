
SET_ENV      = $(shell cat ../sancus-setenv)

CC=${SET_ENV} sancus-cc
LD=${SET_ENV} sancus-ld
SIM=sancus-sim
CRYPTO=sancus-crypto
LOAD=sancus-loade

CFLAGS = -Os

#REACTIVE_FLAGS=--verbose
REACTIVE_FLAGS=--debug
DEPLOY=${SET_ENV} ../sancus/bin/reactive-tools ${REACTIVE_FLAGS} deploy --result result.json
CALL=${SET_ENV} ../sancus/bin/reactive-tools --verbose call --config result.json


OBJECTS=sensor1.o sensor2.o aggregator.o display.o
BINS=sensor1.elf sensor2.elf aggregator.elf display.elf


all: build deploy

deploy: build
	test -f runmote
	${DEPLOY} parking-sensors.json

test:
	test -f runmote
	${CALL} --module sensor1 --entry produce_output
	${CALL} --module sensor2 --entry produce_output
	${CALL} --module sensor1 --entry produce_output
	${CALL} --module sensor1 --entry produce_output
	${CALL} --module sensor2 --entry produce_output
	${CALL} --module sensor2 --entry produce_output

# don't forget:
# ~muehlber/git/leuven/sancus/contiki-support/contiki/tools/tunslip -s /dev/ttyUSB1 -t tun0 192.168.0.2 255.255.255.255
runmote:
	touch runmote
	${MAKE} -C ../ deploy-sm-server-reactive
	rm -f runmote

build: ${OBJECTS} ${BINS}

stats: build
	cloc *.c *.h
	size *.elf

sensor1.o: sensor1.c sensor.c sensor.h
sensor2.o: sensor2.c sensor.c sensor.h
aggregator.o: aggregator.c sensor.h helpers.c
display.o: display.c helpers.c


%.elf: %.o
	${LD} $< -o $@


clean:
	rm -f ${OBJECTS} ${BINS}
	rm -f result.json
	rm -f runmote

distclean: clean


