<?php

$page_title = "Research";

$sections = array(
    "core"	=> "Core Architecture",
    "ext"       => "Extensions",
    "apps"     	=> "Applications",
    "theses"    => "Master Theses"
);

include("header.php");
?>

<div class="page-header">
<h1 class="section-header">Research Publications</h1>
</div>

<p> Sancus is an ongoing research project, being used both in the
imec-DistriNet research group as well as by independent researchers. This page
aims to give a comprehensive overview of academic publications on Sancus-based
architectures and applications. Feel free to <a
href="mailto:jo.vanbulck@cs.kuleuven.be">contact</a> us if you know of other
relevant research to be included here.
</p>

        <!-- div class="btn-group">
            <button class="btn btn-mini dropdown-toggle" data-toggle="dropdown">More info<span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li><a href="downloads/paper.pdf">paper</a></li>
            </ul>
        </div-->

<?php research_section("core") ?>

<p class=research-par>The core Sancus security architecture was first presented at the 2013 USENIX security
symposium. More recent developments are described in the Sancus 2.0 ACM TOPS
journal paper, and in Job Noorman's PhD dissertation linked below.</p>

<?php
    $pubs = array(
        array(
            "author"    => "Job Noorman, Pieter Agten, Wilfried Daniels, Raoul Strackx, Anthony Van Herrewege, Christophe Huygens, Bart Preneel, Ingrid Verbauwhede, Frank Piessens",
            "title"     => "Sancus: Low-cost trustworthy extensible networked devices with a zero-software Trusted Computing Base",
            "publisher" => "Proceedings of the 22nd USENIX Security Symposium",
            "year"   	=> "2013",
            "id"        => "usenix13",
            "pdf"       => true,
            "slides"    => true,
            "bibtex"    => true
        ),
        array(
            "author"    => "Job Noorman, Jo Van Bulck, Jan Tobias Mühlberg, Frank Piessens, Pieter Maene, Bart Preneel, Ingrid Verbauwhede, Johannes Götzfried, Tilo Müller, Felix Freiling",
            "title"     => "Sancus 2.0: A Low-Cost Security Architecture for IoT Devices",
            "publisher" => "ACM Transactions on Privacy and Security (TOPS)",
            "year"   	=> "2017",
            "id"        => "tops17",
            "pdf"       => true,
            "bibtex"    => true
        ),
        array(
            "author"    => "Job Noorman",
            "title"     => "Sancus: A Low-Cost Security Architecture for Distributed IoT Applications on a Shared Infrastructure",
            "publisher" => "PhD thesis KU Leuven",
            "year"   	=> "2017",
            "id"        => "ext", //"noorman17phd",
            "pdf"       => "https://lirias.kuleuven.be/bitstream/123456789/574995/1/thesis.pdf"
        )
    );

    publication_list($pubs);
?>

<?php research_section("ext") ?>

<p class=research-par>The following papers propose extensions to the Sancus
hardware and compiler infrastructure. Either to protect the confidentiality of
security-critical code, or to preserve real-time deadlines on a partially
compromised embedded platform.</p>

<?php
    $pubs = array(
        array(
            "author"    => "Johannes Götzfried, Tilo Müller, Ruan de Clercq, Pieter Maene, Felix Freiling, Ingrid Verbauwhede",
            "title"     => "Soteria: Offline Software Protection within Low-cost Embedded Devices",
            "publisher" => "Proceedings of the 31st Annual Computer Security Applications Conference (ACSAC)",
            "year"   	=> "2015",
            "id"        => "ext",
            "web"       => "https://www1.cs.fau.de/soteria",
            "pdf"       => "https://www1.cs.fau.de/filepool/projects/soteria/soteria.pdf",
            "slides"    => "https://www1.cs.fau.de/filepool/projects/soteria/soteria-talk.pdf"
        ),
        array(
            "author"    => "Jo Van Bulck, Job Noorman, Jan Tobias Mühlberg, Frank Piessens",
            "title"     => "Towards Availability and Real-Time Guarantees for Protected Module Architectures",
            "publisher" => "Companion Proceedings of the 15th International Conference on Modularity (MASS)",
            "year"   	=> "2016",
            "id"        => "mass16",
            "pdf"       => true,
            "slides"    => true,
            "bibtex"    => true
        )
    );

    publication_list($pubs);
?>

<?php research_section("apps") ?>

<p class=research-par>Sancus has recently been applied in a number of application scenarios. Ranging from securely multiplexing shared system resources, over establishing the integrity of an untrusted host operating system, to implementing a secure smart metering infrastructure.</p>

<?php
    $pubs = array(
        array(
            "author"    => "Jo Van Bulck, Job Noorman, Jan Tobias Mühlberg, Frank Piessens",
            "title"     => "Secure Resource Sharing for Embedded Protected Module Architectures",
            "publisher" => "9th WISTP International Conference on Information Security Theory and Practice (WISTP)",
            "year"   	=> "2015",
            "id"        => "wistp15",
            "pdf"       => true,
            "slides"    => true,
            "web"       => true,
            "bibtex"    => true
        ),
        array(
            "author"    => "Jan Tobias Mühlberg, Job Noorman, Frank Piessens",
            "title"     => "Lightweight and Flexible Trust Assessment Modules for the Internet of Things",
            "publisher" => "Proceedsings of the 20th European Symposium on Research in Computer Security (ESORICS)",
            "year"   	=> "2015",
            "id"        => "esorics15",
            "pdf"       => true,
            "slides"    => true,
            "web"       => true,
            "bibtex"    => true
        ),
        array(
            "author"    => "Jan Tobias Mühlberg, Sara Cleemput, Mustafa A. Mustafa, Jo Van Bulck, Bart Preneel, Frank Piessens",
            "title"     => "An Implementation of a High Assurance Smart Meter using Protected Module Architectures",
            "publisher" => "10th WISTP International Conference on Information Security Theory and Practice (WISTP)",
            "year"   	=> "2016",
            "id"        => "wistp16",
            "pdf"       => true,
            "slides"    => true,
            "web"       => true,
            "bibtex"    => true
        )
    );

    publication_list($pubs);
?>

<?php research_section("theses") ?>

<p class=research-par>The following master thesis topics build upon Sancus.</p>

<?php
    $pubs = array(
        array(
            "author"    => "Jo Van Bulck",
            "title"     => "Secure Resource Sharing for Embedded Protected Module Architectures",
            "publisher" => "Master thesis KU Leuven",
            "year"   	=> "2015",
            "id"        => "ext",
            "pdf"       => "https://distrinet.cs.kuleuven.be/news/2015/thesis_jovanbulck_digital_version.pdf",
            "slides"    => false,
            "web"       => "https://github.com/jovanbulck/thesis-src/",
            "bibtex"    => false
        )
    );

    publication_list($pubs);
?>

<p></p>

<?php
include("footer.php");
?>

