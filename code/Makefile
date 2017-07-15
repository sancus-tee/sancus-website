SANCUS_SUPPORT_DIR  = "/usr/local/share/sancus-support"

CC                  = sancus-cc
LD                  = sancus-ld
SANCUS_CRYPTO       = sancus-crypto
SANCUS_SIM          = sancus-sim
RM                  = rm -f

SANCUS_KEY          = deadbeefcafebabe
VENDOR_ID           = 1234
RAM_SIZE            = 16K
ROM_SIZE            = 41K
MEMFLAGS            = --ram $(RAM_SIZE) --rom $(ROM_SIZE) 

VENDOR_KEY          = $(shell $(SANCUS_CRYPTO) --key $(SANCUS_KEY) --gen-vendor-key $(VENDOR_ID) | xxd -p)
MEMFLAGS            = --ram $(RAM_SIZE) --rom $(ROM_SIZE) 

CFLAGS              = -I$(SANCUS_SUPPORT_DIR)/include/ -Wfatal-errors -Os
LDFLAGS             = -L$(SANCUS_SUPPORT_DIR)/lib/ $(MEMFLAGS) -ldev-uart --standalone --verbose
SIMFLAGS            = $(MEMFLAGS)
CRYPTOFLAGS         = --fill-macs --key $(VENDOR_KEY)

SOURCES         = $(shell ls *.c)
OBJECTS         = $(SOURCES:.c=.o)

TARGET          = main.elf
TARGET_NO_MAC   = no_mac_$(TARGET)

all: $(TARGET)

$(TARGET_NO_MAC): $(OBJECTS)
	$(LD) $(LDFLAGS) -o $@ $^

$(TARGET): $(TARGET_NO_MAC)
	$(SANCUS_CRYPTO) $(CRYPTOFLAGS) -o $@ $<

sim: $(TARGET)
	$(SANCUS_SIM) $(SIMFLAGS) $<

clean:
	$(RM) $(TARGET) $(TARGET_NO_MAC) $(OBJECTS)
	rm -f sim-input.bin sim-output.bin
	rm -f *.fst *.vcd
