<?php
$page_title = "Home";
include("header.php");
?>

<div class="page-header">
    <h1 class="section-header"><span class="sancus-em">Sancus:</span> <span
        class="sancus-keyword-em">Lightweight</span> and <span
        class="sancus-keyword-em">Open-Source</span> Trusted Computing for the IoT</h1>
</div>
      <p/> <p>
        <!-- ?php create_sancus_button("publications/tops17.pdf", "Get the paper", "download") ?-->
        <?php create_sancus_button("https://github.com/sancus-pma", "View on GitHub", "github") ?>
        <?php create_sancus_button("https://distrinet.cs.kuleuven.be/software/vulcan/demo.html", "Watch a demo", "video-camera") ?>
        <?php create_sancus_button("research.php", "Explore Research", "file") ?>
      </p>

<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="5000">
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
  </ol>

  <div class="carousel-inner">
    <div class="item active">
        <div class="sancus-quote well">
            A project based on open-source building blocks and free-software ethos
            that attempts to provide a layer of integrity and deterministic behavior to
            microcontrollers should be lauded and considered by anyone building hardware
            applications where security and reliability are strong requirements.
            <cite>Mischa Spiegelmock <a href=https://lwn.net/Articles/747564/>LWN.net</a></cite>
        </div>
    </div>

    <div class="item">
        <div class="sancus-quote well">
            We do have problems with security, ones that need to be dealt with,
            not only with changes to software toolchains but also to the underlying
            hardware. 
            <cite>Rik Farrow <a href=https://www.usenix.org/publications/login/fall-2018-vol-43-no-2>USENIX ;login:</a></cite>
        </div>
    </div>
  </div>
</div>

<!--div class="page-header">
    <h2 class="subsection-header">Security Objectives</h2>
</div-->

<br>
<br>

<div class="row text-center" >
    <?php create_sancus_objective("Software Isolation", "shield",
        "Outside software cannot read or write a protected module's runtime
        state. A module can only be called through one of its designated entry
        points.") ?>
    <?php create_sancus_objective("Lightweight Cryptography", "lock-locked",
        "A minimalist cryptographic hardware unit enables low-overhead
        symmetric key derivation, authenticated encryption, and hashing.") ?>
    <?php create_sancus_objective("Software Attestation", "thumb-up",
        "Remote or local parties can verify at runtime that a particular software module
        has been isolated on a specific node without having been tampered with.") ?>
</div>

<div class="row text-center">
    <?php create_sancus_objective("Secure Communication", "envelope-closed",
        "Sancus safeguards the authenticity, integrity, and freshness of all
        traffic between a protected module and its remote provider.") ?>
    <?php create_sancus_objective("Secure I/O", "cog",
        "Secure driver modules have exclusive ownership over memory-mapped I/O
        peripheral devices, and can implement software-defined access control policies.") ?>
    <?php create_sancus_objective("Backwards Compatibility", "code",
        "Legacy applications continue to function as expected; critical
        components can be migrated gradually into Sancus-protected modules.") ?>
</div>


<div class="page-header">
    <h2 class="subsection-header">Abstract</h2>
</div>
 
<div>
    <blockquote>
    <p>
        The Sancus security architecture for networked embedded devices was
        proposed in 2013 at the USENIX Security conference.  It supports remote  (even
        third-party) software installation on devices while maintaining strong security
        guarantees.  More specifically, Sancus can remotely attest to a software
        provider that a specific software module is running uncompromised, and can
        provide a secure communication channel between software modules and software
        providers.  Software modules can securely maintain local state, and can
        securely interact with other software modules that they choose to trust.
    </p>
    <p>
        Over the past three years, significant experience has been gained with
        applications of Sancus, and several extensions of the architecture have  been
        investigated &ndash; both by the original designers as well as by independent
        researchers.  Informed by these additional research results, this journal
        version of the Sancus paper describes an improved design and implementation,
        supporting additional security guarantees (such as confidential deployment) and
        a more efficient cryptographic core.  </p>
    <p>
        We describe the design of Sancus 2.0 (without relying on any prior
        knowledge of Sancus), and develop and evaluate a prototype FPGA implementation.
        The prototype extends an MSP430 processor with hardware support for the memory
        access control and cryptographic functionality required to run Sancus.  We
        report on our experience with using Sancus in a variety of application
        scenarios, and discuss some important avenues of ongoing and future work.
    </p>
    </blockquote>
    <div class="well">
    <p>Job Noorman, Jo Van Bulck, Jan Tobias Mühlberg, Frank Piessens, Pieter Maene, Bart Preneel, Ingrid Verbauwhede, Johannes Götzfried, Tilo Müller, Felix Freiling.
        <strong>Sancus 2.0: A Low-Cost Security Architecture for IoT Devices.</strong>
        <em>ACM Transactions on Privacy and Security (TOPS)</em>, 2017. </p>
    </div>
</div>

<?php
include("footer.php");
?>
