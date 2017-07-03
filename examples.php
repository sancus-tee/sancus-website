<?php
$page_title = "Examples";

$sections = array(
    "overview"   => "Overview",
    "source"     => "Source code",
    "building"   => "Building",
    "running"    => "Running"
);

include("header.php");
?>

<?php example_section("overview") ?>
<p>
In this section we will give a complete example of how to build and run a Sancus application.
We will follow the example given in the paper: one protected module providing sensor data and one that transforms this data and signs it to be sent to the vendor.
</p>

<?php example_section("source") ?>
<?php display_source_file("sensor.h") ?>
<?php display_source_file("sensor.c") ?>
<?php display_source_file("reader.h") ?>
<?php display_source_file("reader.c") ?>
<?php display_source_file("main.c") ?>

<?php example_section("building") ?>
<p>
For the build process, we assume a Bash shell is being used.
We first define some variables:
</p>
<pre>
ROM=48K
RAM=10K
STACK=256
VENDOR_ID=1234
NODE_KEY=deadbeefcafebabe
</pre>
<p>
Compile the sources:
</p>
<pre>
sancus-cc -c -o sensor.o sensor.c
sancus-cc -c -o reader.o reader.c
sancus-cc -c -o main.o main.c
</pre>

<p>
Link everything in standalone mode:
</p>
<pre>
sancus-ld --standalone --rom-size $ROM --ram-size $RAM --sm-stack-size $STACK -o main-no-mac.elf main.o reader.o sensor.o
</pre>

<p>
Then we need to make sure the MAC sections are filled in in order for the reader module to be able to verify the sensor module.
The first step is to calculate the vendor key:
</p>
<pre>
sancus-crypto --gen-vendor-key $VENDOR_ID --key $NODE_KEY
</pre>
<p>
Then we fill in the hash sections using this key:
</p>
<pre>
sancus-crypto --fill-macs --key $VENDOR_KEY -o main.elf main-no-mac.elf
</pre>
<p>
Where <code>$VENDOR_KEY</code> refers to the output of the previous command.
</p>

<?php example_section("running") ?>
<p>
To simulate the resulting binary, simply run:
</p>
<pre>
sancus-sim --rom-size $ROM --ram-size $RAM main.elf
</pre>

<p>
To verify the output of the reader module, we first have to calculate its key:
</p>
<pre>
sancus-crypto --gen-sm-key reader --key $VENDOR_KEY main.elf
</pre>

<p>
Then we can decrypt the output of the reader  module (<code>$NONCE</code>, <code>$CIPHER</code>, and <code>$TAG</code> refer to the data printed by the simulator and <code>$SM_KEY</code> refers to the output of the previous command):
</p>
<pre>
sancus-crypto --unwrap $AD $CIPHER $TAG --key $SM_KEY
</pre>

<?php
include("footer.php");
?>
