<?php
$page_title = "Tutorial";

$sections = array(
    "abstract"      => "Abstract",
    "motivation"    => "Motivation and Goals",
    "organisation"  => "Organisation of the Tutorial",
    "ref"           => "Further Reading",
);

include("header.php");
?>

<div class="page-header">
<h1 class="section-header">Tutorial: Building Distributed Enclave Applications with Sancus and SGX</h1>
</div>

<p>
TODO: small intro mention <a href="https://dsn2018.uni.lu/">DSN 2018</a>
</p>

<br>
<div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="https://www.youtube-nocookie.com/embed/5soMsk8JYN0?rel=0" allowfullscreen></iframe>
</div>
<br>

<?php research_section("abstract") ?>

<blockquote>
Trusted computing technology provides promising
new security primitives for the development of dependable
and highly secure distributed applications. Protected software
components, or <em>enclaves</em>, are provided with strong integrity,
confidentiality and key derivation mechanisms via a minimal,
hardware-only trusted computing base. Yet, leveraging enclaved
execution in practice remains not well-understood, especially for
heterogeneous trusted computing networks. This tutorial aims
to provide insights and hands-on exercises on building such
interactive applications based on Intel SGX and the lightweight
embedded Sancus architecture.
</blockquote>

<?php research_section("motivation") ?>

<p>
Trusted computing architectures such as Intel SGX,
ARM TrustZone, and Sancus have been around for a
number of years. By enforcing strong integrity, confidentiality,
and attestation guarantees with a minimal (hardware-only)
trusted computing base, these architectures aim to provide a
root-of-trust for the development of dependable and highly
secure systems. However, few real-world applications leverage
trusted computing, and approaches to interconnect enclave
applications in heterogeneous and distributed trusted computing
environments remain not well-understood. Yet, this approach
provides strong security benefits in domains like the Internet
of Things or interconnected Industrial Control Systems.
</p>

<p>
This tutorial outlines the development of such
security-sensitive networked applications. Participants will learn how
to write enclaved software modules for both the embedded
open-source Sancus research architecture, as well as for
off-the-shelf Intel SGX platforms. We will show how to make
Sancus/SGX enclaves interact securely in a distributed fashion.
Our approach is distinguished by the concept of <em>authentic
execution</em>, a notion of end-to-end security and secure
I/O where the overall application's behavior depends solely
on protected device drivers and data processing enclaves.
</p>

<p>
The tutorial will cover common pitfalls for enclave
development and feature hands-on exercises on programming,
deploying, attesting, and interacting with basic Sancus/SGX enclaves.
The tutorial setup uses an automotive industry-standard CAN
bus to interconnect Intel SGX machines with Sancus-enabled
microcontrollers. We will provide Sancus I/O driver modules
plus a CAN authentication library that allows participants
to easily setup secure communication channels.
</p>

<p>
Our tutorial aims at researchers, software developers, and
software architects who want to learn more about modern
trusted computing architectures. Basic programming skills
(in C) and familiarity with the GNU/Linux command line
interface are required to follow the hands-on exercises.
</p>

<?php research_section("organisation") ?>

<p>
Participants will be provided with remote SSH access to
an SGX-capable machine, connected to Sancus-enabled
microcontrollers over a CAN network. This machine will also
have pre-installed the required software development tools for
the two trusted computing architectures, as well as skeleton
source code for the hands-on exercises.
</p>

<p>
The tutorial aims to fill about three hours with an equal split
between lectures and practical exercises:
</p>

<p>
TODO table
</p>

<?php research_section("ref") ?>

<?php
    $pubs = array(
        array(
            "author"    => "Job Noorman, Jo Van Bulck, Jan Tobias Mühlberg, Frank Piessens, Pieter Maene, Bart Preneel, Ingrid Verbauwhede, Johannes Götzfried, Tilo Müller, Felix Freiling",
            "title"     => "Sancus 2.0: A Low-Cost Security Architecture for IoT devices",
            "publisher" => "ACM Transactions on Privacy and Security (TOPS)",
            "date"   	=> "2017",
            "id"        => "tops17",
            "pdf"       => true,
            "slides"    => true,
            "src"       => "https://github.com/sancus-pma",
            "bibtex"    => true
        ),
       array(
            "author"    => "Costan, Victor, Srinivas Devadas",
            "title"     => "Intel SGX Explained",
            "publisher" => "IACR Cryptology ePrint Archive",
            "date"   	=> "2016",
            "id"        => "sgxexplained",
            "pdf"       => "https://eprint.iacr.org/2016/086.pdf",
        ),
       array(
            "author"    => "Jo Van Bulck, Jan Tobias Mühlberg, Frank Piessens",
            "title"     => "VulCAN: Efficient Component Authentication and Software Isolation for Automotive Control Networks",
            "publisher" => "Proceedings of the 33th Annual Computer Security Applications Conference (ACSAC)",
            "date"   	=> "2017",
            "id"        => "acsac17",
            "pdf"       => true,
            "slides"    => true,
            "web"       => "https://distrinet.cs.kuleuven.be/software/vulcan",
            "src"       => "https://github.com/sancus-pma/vulcan",
            "video"     => "https://youtu.be/gzxwiWfkl9g",
            "bibtex"    => true
        ),
       array(
            "author"    => "Job Noorman, Jan Tobias Mühlberg, Frank Piessens",
            "title"     => "Authentic Execution of Distributed Event-Driven Applications with a Small TCB",
            "publisher" => "Proceedings of the 13th International Workshop on Security and Trust Management (STM)",
            "date"   	=> "2017",
            "id"        => "stm17",
            "src"       => "https://github.com/sancus-pma/sancus-contiki",
            "pdf"       => true,
            "slides"    => true,
            "web"       => true,
            "bibtex"    => true
        ),
    );

    publication_list($pubs);
?>
 

<?php
include("footer.php");
?>
