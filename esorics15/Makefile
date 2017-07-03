
all: upload


sancus-contiki-3x:
	rm -rf sancus-contiki-3x
	git clone \
          --branch sancus \
          ssh://git@dnetcode.cs.kuleuven.be:2222/sancus-contiki.git \
          sancus-contiki-3x

html: ta_mod
	for file in `find ./ta_mod -name "*.c"`; do ./hll.sh $$file; done

ta_mod: sancus-contiki-3x
	rm -rf ta_mod
	cp -r sancus-contiki-3x/examples/ta_mod ./

ta_mod.tar.gz: ta_mod
	tar -cf ta_mod.tar ta_mod
	gzip -9 ta_mod.tar

sancus-contiki-3x.tar.gz: sancus-contiki-3x
	rm -rf sancus-contiki-3x/.git sancus-contiki-3x/examples/inspector \
          sancus-contiki-3x/examples/ta_mod
	tar -cf sancus-contiki-3x.tar sancus-contiki-3x
	gzip -9 sancus-contiki-3x.tar

prepare:
	${MAKE} clean
	${MAKE} ta_mod.tar.gz sancus-contiki-3x.tar.gz html
	${MAKE} clean
	touch prepare

upload: prepare
	ssh hardy "rm -rf /cw/dnetw3/software/sancus/esorics15/*"
	scp -r * hardy:/cw/dnetw3/software/sancus/esorics15/
	@echo
	@echo "--> http://distrinet.cs.kuleuven.be/software/sancus/esorics15/"

clean:
	rm -rf sancus-contiki-3x

distclean: clean
	rm -f sancus-contiki-3x.tar.gz ta_mod.tar.gz
	rm -rf ta_mod prepare


