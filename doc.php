<?php
$page_title = "Documentation";

$sections = array(
    "sancus-sim"   => "Simulator",
    "sancus-cc"    => "Compiler",
    "sancus-ld"    => "Linker",
    "sancus-hmac"  => "Crypto",
    "tools"        => "Tools",
    "api"          => "API"
);

include("header.php");
?>

<?php doc_section("sancus-sim", "sancus-sim", "sim") ?>

<p>
The simulator provides a convenient way to experiment with Sancus.
Based on Icarus Verilog, it is basically a wrapper around the <code>iverilog</code> command, taking care of the necessary file conversions.
Invoking the simulator looks as follows:
<pre>
sancus-sim [--rom-size SIZE] [--ram-size SIZE] FILE
</pre>
Here, <code>FILE</code> should be a valid ELF binary for the MSP430 and <code>SIZE</code> should be a number in bytes or a number followed by <code>K</code> to specify an amount in kilobytes.
Make sure the amount of ROM/RAM matches the amount used when <a href="#sancus-ld">linking</a> the binary.
By default, the amount of ROM/RAM is 48K/10K.
</p>

<?php doc_section("sancus-cc", "sancus-cc", "compiler") ?>

<p>
The Sancus compiler driver tries to mimic GCC as closely as possible.
Therefore, <code>sancus-cc</code> can be used us a drop-in replacement for <code>gcc</code> in most cases.
The main difference is that <code>sancus-cc</code> will <em>only</em> perform the compile step which basically means the <code>-c</code> flag is mandatory.
Also, only one file can be compiled at a time.
A typical invocation looks as follows:
<pre>
sancus-cc -c [GCC ARGS...] FILE
</pre>
The compiler will generate protected modules based on annotations that should be added to the source code.
The header file <code>&lt;sancus/sm_support.h&gt;</code>, installed as part of the compiler, provides the following annotations:
</p>
<ul>
    <li><code>SPM_ENTRY(name)</code> declares an entry point.</li>
    <li><code>SPM_FUNC(name)</code> declares a function that is <em>not</em> an entry point.</li>
    <li><code>SPM_DATA(name)</code> declares data that should be part of the module's secret section.</li>
</ul>
<p>
Here, <code>name</code> is a string identifying the software module.
This name is only used by the compiler to differentiate modules; it is never used by the Sancus hardware.
</p>

<?php doc_section("sancus-ld", "sancus-ld", "compiler") ?>
<p>
Like the compiler, the Sancus linker tries to mimic standard tools, LD in this case.
A typical invocation looks as follows:
</p>
<pre>
sancus-ld [LD ARGS...] [--rom-size SIZE] [--ram-size SIZE] [--standalone] [--sm-stack-size SIZE] FILE...
</pre>
<p>
The ROM/RAM sizes are as <a href="#sancus-sim">above</a>.
The <code>--sm-stack-size</code> argument defines how much space should be allocated in the secret section for the stack.
</p>

<p>
The linker has two "output modes".
If the <code>--standalone</code> flag is passed to the linker, it will create a fully linked binary that can be directly loaded into the simulator or FPGA.
Multiple protected modules can be linked together and a <code>main</code> function has to be provided.
Also, any libc functions used by the binary will be linked in.
</p>

<p>
In the second mode, when this flag is not passed, the linker creates a relocatable binary which cannot be directly loaded.
Instead, it is intended to be loaded and linked by host software already running on a Sancus node.
Multiple protected modules, as well as unprotected code, can be added and libc functions can also be called.
However, library functions will not be added to the binary and should be resolved on the host.
Currently, a <code>main</code> function is not supported in this mode which means that after a binary is loaded, the host software should provide the means to call an entry point of one of the protected modules.
</p>

<?php doc_section("sancus-hmac", "sancus-hmac", "compiler") ?>
<p>
The <code>sancus-hmac</code> script provides a convenient way to perform all needed crypto operations.
All input keys and data should be provided in hexadecimal notation without the leading <code>0x</code>.
</p>

<p>
To compute a vendor key:
</p>
<pre>
sancus-hmac --vendor-key ID --key NODE_KEY
</pre>

<p>
To compute the key of a software module:
</p>
<pre>
sancus-hmac --hkdf SM_NAME --key VENDOR_KEY ELF_FILE
</pre>
<p>
Here, <code>SM_NAME</code> is the name of the module as given to the compiler using the annotations.
</p>

<p>
To compute the MAC of a software module using the key of another module:
</p>
<pre>
sancus-hmac --hmac SM_NAME --key SM_KEY ELF_FILE
</pre>

<p>
To compute the signature of some data:
</p>
<pre>
sancus-hmac --signature DATA --key KEY
</pre>

<p>
Finally, the following can be used for binaries created using the <code>--standalone</code> linker mode.
This will automatically fill all the MAC sections in the binary:
</p>
<pre>
sancus-hmac --key VENDOR_KEY -o OUT_FILE IN_FILE
</pre>
<p>
Currently, all modules need to have the same vendor ID for this to work.
</p>

<?php doc_section("tools", null, "sim") ?>
<p>
Together with Sancus, a number of tools will be installed that make working with the FPGA a bit easier.
These tools are just rebranded versions of the standard openMSP430 tools.
</p>

<h3 id="sancus-loader">Loader <small>sancus-loader</small></h3>

Sancus supports a simple UART protocol to load binaries which can be used using the <code>sancus-loader</code> script:
<pre>
sancus-loader [-device DEV] [-baudrate BAUD] ELF/IHEX FILE
</pre>

<h3 id="sancus-gdbproxy">GDB proxy <small>sancus-gdbproxy</small></h3>

The GDB proxy translates between the GDB protocol and the UART-based debug protocol of the openMSP430.
<pre>
sancus-gdbproxy [-device DEV] [-baudrate BAUD] [-port PORT] [-shell]
</pre>
(If the <code>-shell</code> flag is not given, a simple GUI will be opened to configure the proxy.)
This will start a proxy listening on port <code>PORT</code> to which you can connect with GDB:
<pre>
$ msp430-gdb
(gdb) target remote localhost:PORT
(gdb) ...
</pre>

<h3 id="sancus-minidebug">Debug GUI <small>sancus-minidebug</small></h3>

Run <code>sancus-minidebug</code> to open a simple debug GUI.
This GUI allows you to inspect registers and memory and control the CPU (reset, step,...).

<?php doc_section("api") ?>

<p>
This section gives an overview of the instructions added to the core MSP430 instruction set.
The hexadecimal number next to the names of the instructions are their opcodes.
</p>

<p>
The header <code>&lt;sancus/sm_support.h&gt;</code> contains a number of convenience functions to call these instructions from C-code.
These functions are also listed here.
Next to these functions, this header also declares a number of types, the meaning of which should be clear:
</p>
<pre class="prettyprint">
typedef unsigned sm_id;
typedef unsigned vendor_id;

struct SancusModule
{
    sm_id       id;
    vendor_id   vendor_id;
    const char* name;
    void*       public_start;
    void*       public_end;
    void*       secret_start;
    void*       secret_end;
};
</pre>
<p>
The macro <code>DECLARE_SM(name, vendor_id)</code> is provided to declare and initialize a <code>struct SancusModule</code>.
This struct can then be used in some of the API calls.
</p>

<?php instruction("unprotect", "0x1380") ?>
<p>
Deactivates the hardware protection of the currently executing module.
That is, the module whose public section contains the current value of the program counter.
</p>
<?php api_call("void unprotect_sm(void);") ?>

<?php instruction("protect <em>SP</em>, <em>layout</em>", "0x1381") ?>
<p>
Activates the hardware protection for a new module with the given <em>layout</em>.
The boundaries of the public section are given in r12 and r13 and those of the secret section in r14 and r15.
(Note that half-open intervals are used for the boundaries.)
<em>SP</em>, the ID of the software provider, is given in r11.
If the protection is successfully activated, the ID that Sancus has assigned to the new module is returned in r15; otherwise, 0 is returned.
</p>
<?php api_call("int protect_sm(struct SancusModule* sm);") ?>
<p>
This function returns 1 if the protection was successfully actived, 0 otherwise.
</p>

<?php instruction("MAC-verify <em>address</em>, <em>expected MAC</em>", "0x1382") ?>
<p>
The MAC of the module whose public section contains <em>address</em> (r14), is calculated and compared with the value stored at <em>expected MAC</em> (r15).
The key used in the MAC computation is that of the module whose public section contains the current value of the program counter.
If the MACs are equal, the ID of the verified module is returned in r15, otherwise 0 is returned.
</p>

<?php api_call("sm_id hmac_verify(const void* expected, struct SancusModule* sm);") ?>

<?php instruction("MAC-seal <em>start</em>, <em>end</em>, <em>result</em>", "0x1384") ?>
<p>
Calculates the MAC, using the key of the calling module, of the data from <em>start</em> (r13) until <em>end</em> (r14) exclusive.
The MAC is stored at the address pointed to by <em>result</em> (r15).
If something fails, for example when this instruction is called from unprotected code, 0 is returned in r15.
</p>

<?php api_call("sm_id hmac_sign(void* dest, const void* src, size_t n);") ?>
<p>
Note: <code class=prettyprint>(char*)src + n</code> is used for <em>end</em>.
</p>

<?php instruction("get-id <em>address</em>", "0x1385") ?>
<p>
Returns the ID of the module whose public section contains <em>address</em> (r15) in r15.
This instruction currently does not contain a convenience wrapper but the compiler automatically calls it when needed.
</p>

<?php
include("footer.php");
?>

