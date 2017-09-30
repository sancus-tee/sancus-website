
all: paper.pdf secargument.pdf parking-sensors.tar.gz html

.PHONY: secargument.pdf
secargument.pdf:
	${MAKE} -C ../ secargument.pdf
	cp ../secargument.pdf ./

parking-sensors.tar.gz: ../parking-sensors/*
	${MAKE} -C ../ parking-sensors.tar.gz
	cp ../parking-sensors.tar.gz ./

.PHONY: paper.pdf
paper.pdf:
	${MAKE} -C ../ paper.pdf
	cp ../paper.pdf ./

html: ../parking-sensors/*
	rm -rf parking-sensors
	cp -r ../parking-sensors ./
	for file in `find ./parking-sensors \
          -name "*.c" -o -name "*.h" -o -name "*.json"`; \
          do ./hll.sh $$file; done

clean:
	rm -f html

distclean: clean
	rm -f secargument.pdf paper.pdf
	rm -f parking-sensors.tar.gz
	rm -rf parking-sensors


