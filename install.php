<?php
$page_title = "Installation";

$sections = array(
    "overview" => "Overview",
    "sim"      => "Simulator/tools",
    "fpga"     => "FPGA",
    "llvm"     => "LLVM",
    "compiler" => "Compiler"
);

$python_prereq = array(
    "name"    => "Python",
    "url"     => "http://www.python.org/",
    "package" => "python3",
    "version" => "&ge;3.3",
    "build"   => false
);


$cmake_prereq = array(
    "name"    => "CMake",
    "url"     => "http://www.cmake.org/",
    "package" => "cmake",
    "version" => "&ge;3.4.3",
    "build"   => true
);

$core_src = "sancus-core_2.0.tar.gz";
$core_deb = "sancus-core_2.0_all.deb";
$compiler_src = "sancus-compiler_2.0.tar.gz";
$compiler_deb64 = "sancus-compiler_2.0_amd64.deb";
$llvm_deb64 = "clang-sancus_4.0.0_amd64.deb";
$llvm_armhf = "clang-sancus_4.0.1-2_armhf.deb";

include("header.php");
?>

<?php install_section("overview") ?>
<p>
    Sancus is free software. The latest source code of the Sancus project is being actively
    maintained on <a href="https://github.com/sancus-pma">GitHub</a>. Please
    redirect all your bug reports, issues, and pull requests to the corresponding
    GitHub repository.
</p>
<p>
    This page provides installation instructions, source code and binary
    packages for the official Sancus 2.0 release: simulator, compiler and
    runtime support libraries.  All provided binary packages have been tested on
    Ubuntu 16.04 but should work on any Debian-based GNU/Linux distribution.
</p>

<p>
    In the following, every section starts with a table listing the prerequisites needed to build or run the current software.
    Prerequisites that are <span class="build-prereq">marked</span> are only needed when building from source.
    Note that by default, the install prefix is <code>/usr/local</code>.
    If you would like to use a different prefix, add <code>-DCMAKE_INSTALL_PREFIX=/your/prefix</code> to the <code>cmake</code> command.
    The top-level directory of the unpacked source archive will be referred to as <code>$SOURCE_ROOT</code> and we assume a Bash shell is used.
</p>

<div class="alert alert-info">
    <p><strong>Tip:</strong>
    If you have <a href="https://help.ubuntu.com/community/AptURL">AptURL</a> installed, you can install the prerequisites by clicking the package name.
    You can also click the button below to install all prerequisites at once.</p>
    <div class="all-prereq-button">
        <a href="apt:python2.7,iverilog,cmake,tk,binutils-msp430,gcc-msp430,msp430-libc,msp430mcu,g++-4.7" class="btn btn-primary">Install prerequisites</a>
    </div>
</div>

<?php
    $downloads = array(
        "Source"    => $core_src,
        "Installer" => $core_deb
    );

    $prereqs = array(
        $python_prereq,
        array(
            "name"    => "Icarus Verilog",
            "url"     => "http://iverilog.icarus.com/",
            "package" => "iverilog",
            "version" => "&ge;0.9",
            "build"   => false
        ),
        array(
            "name"    => "Tcl/Tk",
            "url"     => "http://www.tcl.tk/",
            "package" => "tk",
            "version" => "&ge;8.5",
            "build"   => false
        ),
        $cmake_prereq
    );

    install_section("sim", $downloads, $prereqs, "sancus-core");
?>

<p>To install the Sancus simulator and tools:</p>
<pre>
cd $SOURCE_ROOT
mkdir build
cd build
cmake ..
make install
</pre>

<p>This will install <?php doc_ref("sancus-sim")?>, <?php doc_ref("sancus-loader")?>, <?php doc_ref("sancus-gdbproxy")?> and <?php doc_ref("sancus-minidebug")?>.</p>

<?php
    $downloads = array(
        "Source"    => $core_src,
        "BIT"       => "sancus.bit",
        "SPI/Flash" => "sancus.mcs"
    );

    $prereqs = array(
        array(
            "name"    => "XILINX ISE WebPACK",
            "url"     => "http://www.xilinx.com/products/design-tools/ise-design-suite/ise-webpack.htm",
            "package" => null,
            "version" => "&ge;2012.4",
            "build"   => true
        ),
    );

    install_section("fpga", $downloads, $prereqs);
?>

<p>
    An ISE project for synthesizing Sancus for a <a href="http://www.xess.com/shop/product/xula2-lx25/">XuLA2-LX25</a> FPGA on a <a href="http://www.xess.com/shop/product/stickit-mb/">StickIt!-MB</a> board can be found in <code>$SOURCE_ROOT/fpga/xula2-stickit</code>.
    We also provide a pre-compiled BIT file as well as an MCS file for loading into the SPI/Flash.
    By default, Sancus is synthesized with the following features:
    <ul>
        <li>Support for 8 concurrent protected modules.</li>
        <li>64-bit keys</li>
        <li>48KB of program memory.</li>
        <li>10KB of data memory.</li>
        <li>Debug interface.</li>
        <li>UART interface.</li>
    </ul>
</p>

<?php
    $downloads = array(
        "Clang patch" => "clang.patch",
        "amd64 .deb"      => $llvm_deb64,
        "armhf .deb"      => $llvm_armhf,
    );

    $prereqs = array(
        array(
            "name"    => "LLVM prerequisites",
            "url"     => "http://llvm.org/docs/GettingStarted.html#software",
            "package" => null,
            "version" => null,
            "build"   => false
        ),
        $cmake_prereq
    );

    install_section("llvm", $downloads, $prereqs);
?>

<p>
    While building our compiler, we have found a bug in Clang that needs to be patched before being able to use our compiler.
    The easiest way to do this is to install the provided binary package.
    This package is called <code>clang-sancus</code> and will be installed in <code>/usr/local/</code>.
    If you want to patch and build LLVM/Clang manually, you can use the following instructions:
</p>

<pre>
wget http://releases.llvm.org/4.0.0/llvm-4.0.0.src.tar.xz
tar xf llvm-4.0.0.src.tar.xz
cd llvm-4.0.0.src/tools/
wget http://releases.llvm.org/4.0.0/cfe-4.0.0.src.tar.xz
tar xf cfe-4.0.0.src.tar.xz
mv cfe-4.0.0.src clang
cd clang
wget <?php echo $DOMAIN ?>/downloads/clang.patch
patch -p1 &lt; clang.patch
cd ../..
mkdir build
cd build
cmake ..
make
make install
</pre>

<p>If you do not want to install every LLVM backend but only the necessary one, add <code>-DLLVM_TARGETS_TO_BUILD=MSP430</code> to the <code>cmake</code> command.</p>

<?php
    $downloads = array(
        "Source"  => $compiler_src,
        "64-bit"  => $compiler_deb64
    );

    $msp_url = "http://sourceforge.net/projects/mspgcc/";
    $prereqs = array(
        $python_prereq,
        array(
            "name"    => "pyelftools",
            "url"     => "https://pypi.python.org/pypi/pyelftools",
            "package" => null,
            "note"    => "<sup>1</sup>",
            "version" => "&ge;0.24",
            "build"   => false
        ),
        array(
            "name"    => "MSPGCC Binutils",
            "url"     => $msp_url,
            "package" => "binutils-msp430",
            "version" => "&ge;20120406",
            "build"   => false
        ),
        array(
            "name"    => "MSPGCC GCC",
            "url"     => $msp_url,
            "package" => "gcc-msp430",
            "version" => "&ge;20120406",
            "build"   => false
        ),
        array(
            "name"    => "MSPGCC libc",
            "url"     => $msp_url,
            "package" => "msp430-libc",
            "version" => "&ge;20120242",
            "build"   => false
        ),
        array(
            "name"    => "MSPGCC MCU",
            "url"     => $msp_url,
            "package" => "msp430mcu",
            "version" => "&ge;20120406",
            "build"   => false
        ),
        array(
            "name"    => "Patched LLVM/Clang",
            "url"     => "#llvm",
            "package" => null,
            "version" => null,
            "build"   => false
        ),
        array(
            "name"    => "GNU C++ Compiler",
            "url"     => "http://gcc.gnu.org/",
            "package" => "g++",
            "version" => "&ge;4.8",
            "build"   => true
        ),
        $cmake_prereq
    );

    install_section("compiler", $downloads, $prereqs, "sancus-compiler");
?>

<p><small><sup>1</sup>Can be installed using <code>pip3 install pyelftools</code></small></p>

<p>To install the Sancus compiler:</p>
<pre>
cd $SOURCE_ROOT
mkdir build
cd build
cmake ..
make
make install
</pre>

<p>
    This will install <?php doc_ref("sancus-cc")?>, <?php doc_ref("sancus-ld")?> and <?php doc_ref("sancus-crypto")?>.
</p>

<?php
include("footer.php");
?>
