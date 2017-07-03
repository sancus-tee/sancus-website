
all: hasm.tar.gz html

hasm.tar.gz: ../implementation/ihd-cs-load-esme-no_debug/*
	${MAKE} -C ../ hasm.tar.gz
	cp ../hasm.tar.gz ./

html: ../implementation/ihd-cs-load-esme-no_debug/*
	rm -rf hasm
	cp -r ../implementation/ihd-cs-load-esme-no_debug ./hasm
	for file in `find ./hasm \
          -name "*.c" -o -name "*.h" -o -name "*.json"`; \
          do ./hll.sh $$file; done

clean:
	rm -f html

distclean: clean
	rm -f hasm.tar.gz
	rm -rf hasm


