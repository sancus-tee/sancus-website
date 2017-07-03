<?php
$page_title = "Home";
include("header.php");
?>

<div class="page-header">
    <h1>Abstract</h1>
</div>
<div>
    <blockquote class="abstract">
    <p>
        In this paper we propose Sancus, a security architecture for networked  embedded devices.
        Sancus supports extensibility in the form of remote (even third-party) software installation on devices while maintaining strong security guarantees.
        More specifically, Sancus can remotely attest to a software provider that a specific software module is running uncompromised, and can authenticate messages from software modules to software providers.
        Software modules can securely maintain local state, and can securely interact with other software modules that they choose to trust.
        The most distinguishing feature of Sancus is that it achieves these security guarantees without trusting <em>any</em> infrastructural software on the device.
        The Trusted Computing Base (TCB) on the device is <em>only</em> the hardware.
        Moreover, the hardware cost of Sancus is low.
    </p>
    <p>
        We describe the design of Sancus, and develop and evaluate a prototype FPGA implementation of a Sancus-enabled device.
        The prototype extends an MSP430 processor with hardware support for the memory access control and cryptographic functionality required to run Sancus.
        We also develop a C compiler that targets our device and that can compile standard C modules to Sancus protected software modules.
    </p>
    </blockquote>
    <p>
        Job Noorman, Pieter Agten, Wilfried Daniels, Raoul Strackx, Anthony Van Herrewege, Christophe Huygens, Bart Preneel, Ingrid Verbauwhede, Frank Piessens.
        <strong>Sancus: Low-cost trustworthy extensible networked devices with a zero-software Trusted Computing Base.</strong>
        <em>Proceedings of the 22nd USENIX conference on Security symposium</em>
    </p>
    <p><a class="btn btn-primary btn-large" href="downloads/sancus.pdf">Get the paper</a></p>
</div>

<?php
include("footer.php");
?>
