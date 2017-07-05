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
        The Sancus security architecture for networked embedded devices was proposed in 2013 at the USENIX Security conference.
        It supports remote  (even third-party) software installation on devices while maintaining strong security guarantees.
        More specifically, Sancus can remotely attest to a software provider that a specific software module is running uncompromised, and can provide a secure communication channel between software modules and software providers.
        Software modules can securely maintain local state, and can securely interact with other software modules that they choose to trust.
    </p>
    <p>
        Over the past three years, significant experience has been gained with applications of Sancus, and several extensions of the architecture have  been investigated &ndash; both by the original designers as well as by independent researchers.
        Informed by these additional research results, this journal version of the Sancus paper describes an improved design and implementation, supporting additional security guarantees (such as confidential deployment) and a more efficient cryptographic core.
    </p>
    <p>
        We describe the design of Sancus 2.0 (without relying on any prior knowledge of Sancus), and develop and evaluate a prototype FPGA implementation.
        The prototype extends an MSP430 processor with hardware support for the memory access control and cryptographic functionality required to run Sancus.
        We report on our experience with using Sancus in a variety of application scenarios, and discuss some important avenues of ongoing and future work.
    </p>
    </blockquote>
    <p>
        Job Noorman, Jo Van Bulck, Jan Tobias Mühlberg, Frank Piessens, Pieter Maene, Bart Preneel, Ingrid Verbauwhede, Johannes Götzfried, Tilo Müller, Felix Freiling.
        <strong>Sancus 2.0: A Low-Cost Security Architecture for IoT Devices.</strong>
        <em>ACM Transactions on Privacy and Security (TOPS)</em>
    </p>
    <p><a class="btn btn-primary btn-large" href="downloads/tops17.pdf">Get the paper</a></p>
</div>

<?php
include("footer.php");
?>
