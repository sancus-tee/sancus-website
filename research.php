<?php

$page_title = "Research";

$sections = array(
    "core"      => "Core Architecture",
    "ext"       => "Extensions",
    "apps"     	=> "Applications",
    "theses"    => "Master Theses",
    "media"     => "Media Coverage",
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
relevant research results to be included here.
</p>

<?php research_section("core") ?>

<p> The core Sancus security architecture was first presented at the 2013
USENIX security symposium. More recent developments are described in the Sancus
2.0 ACM TOPS journal paper, and in Job Noorman's PhD dissertation linked below.
Furthermore, a higher-level description of Sancus is provided by two survey
publications on the Protected Module Architecture research field.
</p>

<?php
    $pubs = array(
        array(
            "author"    => "Job Noorman, Pieter Agten, Wilfried Daniels, Raoul Strackx, Anthony Van Herrewege, Christophe Huygens, Bart Preneel, Ingrid Verbauwhede, Frank Piessens",
            "title"     => "Sancus: Low-Cost Trustworthy Extensible Networked Devices with a Zero-Software Trusted Computing Base",
            "publisher" => "Proceedings of the 22nd USENIX Security Symposium",
            "date"   	=> "2013",
            "id"        => "usenix13",
            "pdf"       => true,
            "slides"    => true,
            "src"       => "https://github.com/sancus-pma",
            "bibtex"    => true
        ),
        array(
            "author"    => "Raoul Strackx, Job Noorman, Ingrid Verbauwhede, Bart Preneel, Frank Piessens",
            "title"     => "Protected Software Module Architectures",
            "publisher" => "Securing Electronic Business Processes (ISSE)",
            "date"   	=> "2013",
            "id"        => "isse13",
            "pdf"       => "https://lirias.kuleuven.be/bitstream/123456789/430320/1/ISSE-2013-paper.pdf",
            "bibtex"    => true
        ),
        array(
            "author"    => "Pieter Maene, Johannes Götzfried, Ruan De Clercq, Tilo Müller, Felix Freiling, Ingrid Verbauwhede",
            "title"     => "Hardware-Based Trusted Computing Architectures for Isolation and Attestation",
            "publisher" => "IEEE Transactions on Computers",
            "date"   	=> "2017",
            "id"        => "ieee17",
            "pdf"       => "https://www.esat.kuleuven.be/cosic/publications/article-2750.pdf",
            "bibtex"    => true
        ),
        array(
            "author"    => "Job Noorman, Jo Van Bulck, Jan Tobias Mühlberg, Frank Piessens, Pieter Maene, Bart Preneel, Ingrid Verbauwhede, Johannes Götzfried, Tilo Müller, Felix Freiling",
            "title"     => "Sancus 2.0: A Low-Cost Security Architecture for IoT devices",
            "publisher" => "ACM Transactions on Privacy and Security (TOPS)",
            "date"   	=> "2017",
            "id"        => "tops17",
            "pdf"       => "https://www.esat.kuleuven.be/cosic/publications/article-2785.pdf",
            "slides"    => true,
            "src"       => "https://github.com/sancus-pma",
            "bibtex"    => true
        ),
        array(
            "author"    => "Job Noorman",
            "title"     => "Sancus: A Low-Cost Security Architecture for Distributed IoT Applications on a Shared Infrastructure",
            "publisher" => "PhD thesis KU Leuven",
            "date"   	=> "2017",
            "id"        => "noorman17phd",
            "pdf"       => "https://lirias.kuleuven.be/bitstream/123456789/574995/1/thesis.pdf",
            "bibtex"    => true
        )
    );

    publication_list($pubs);
?>

<?php research_section("ext") ?>

<p>The following papers propose extensions to the Sancus
hardware and compiler infrastructure. Either to protect the confidentiality of
security-critical code, or to preserve real-time deadlines on a partially
compromised embedded platform.</p>

<?php
    $pubs = array(
        array(
            "author"    => "Johannes Götzfried, Tilo Müller, Ruan de Clercq, Pieter Maene, Felix Freiling, Ingrid Verbauwhede",
            "title"     => "Soteria: Offline Software Protection within Low-cost Embedded Devices",
            "publisher" => "Proceedings of the 31st Annual Computer Security Applications Conference (ACSAC)",
            "date"   	=> "2015",
            "id"        => "acsac15",
            "web"       => "https://www1.cs.fau.de/soteria",
            "pdf"       => "https://www1.cs.fau.de/filepool/projects/soteria/soteria.pdf",
            "slides"    => "https://www1.cs.fau.de/filepool/projects/soteria/soteria-talk.pdf",
            "bibtex"    => false
        ),
        array(
            "author"    => "Jo Van Bulck, Job Noorman, Jan Tobias Mühlberg, Frank Piessens",
            "title"     => "Towards Availability and Real-Time Guarantees for Protected Module Architectures",
            "publisher" => "Companion Proceedings of the 15th International Conference on Modularity (MASS)",
            "date"   	=> "2016",
            "id"        => "mass16",
            "pdf"       => true,
            "slides"    => true,
            "bibtex"    => true
        )
    );

    publication_list($pubs);
?>

<?php research_section("apps") ?>

<p>Recent and ongoing work leverages Sancus' lightweight
isolation and authentication primitives to establish trust in distributed
embedded application scenarios. These range from addressing specific
requirements, such as securely multiplexing shared platform resources among
distrusting clients, or establishing the integrity of an untrusted host
operating system, to an extended case studies in the context of emerging smart
electricity meters.</p>

<?php
    $pubs = array(
        array(
            "author"    => "Jo Van Bulck, Job Noorman, Jan Tobias Mühlberg, Frank Piessens",
            "title"     => "Secure Resource Sharing for Embedded Protected Module Architectures",
            "publisher" => "9th WISTP International Conference on Information Security Theory and Practice (WISTP)",
            "date"   	=> "2015",
            "id"        => "wistp15",
            "pdf"       => true,
            "slides"    => true,
            "web"       => true,
            "src"       => "https://github.com/sancus-pma/sm-access-control",
            "bibtex"    => true
        ),
        array(
            "author"    => "Jan Tobias Mühlberg, Job Noorman, Frank Piessens",
            "title"     => "Lightweight and Flexible Trust Assessment Modules for the Internet of Things",
            "publisher" => "Proceedings of the 20th European Symposium on Research in Computer Security (ESORICS)",
            "date"   	=> "2015",
            "id"        => "esorics15",
            "pdf"       => true,
            "slides"    => true,
            "web"       => true,
            "src"       => "https://github.com/sancus-pma/sancus-examples",
            "bibtex"    => true
        ),
        array(
            "author"    => "Jan Tobias Mühlberg, Sara Cleemput, Mustafa A. Mustafa, Jo Van Bulck, Bart Preneel, Frank Piessens",
            "title"     => "An Implementation of a High Assurance Smart Meter using Protected Module Architectures",
            "publisher" => "10th WISTP International Conference on Information Security Theory and Practice (WISTP)",
            "date"   	=> "2016",
            "id"        => "wistp16",
            "pdf"       => true,
            "slides"    => false,
            "web"       => true,
            "bibtex"    => true
        )
    );

    publication_list($pubs);
?>

<?php research_section("theses") ?>

<p> Sancus has been used as the development platform for several master thesis
projects. Specifically, one thesis explored the feasibility of supplementing
Sancus' hardware-enforced security guarantees with availability and access
control guarantees for shared system resources.
Another project leveraged Sancus to to establish secure I/O paths for
applications running on higher-end Protected Module Architectures.
Ongoing work finally investigates hardware/software design trade-offs by
developing a trusted kernel-like software module that adopts the
responsibilities of Sancus' existing cryptographic hardware primitives.
</p>

<?php
    $pubs = array(
        array(
            "author"    => "Jo Van Bulck",
            "title"     => "Secure Resource Sharing for Embedded Protected Module Architectures",
            "publisher" => "Master thesis KU Leuven",
            "date"   	=> "2015",
            "id"        => "vanbulck15thesis",
            "pdf"       => true,
            "slides"    => true,
            "src"       => "https://github.com/jovanbulck/thesis-src/",
            "bibtex"    => true
        ),
        array(
            "author"    => "Dennis Frett",
            "title"     => "Extending Protected Module Architectures with a Secure I/O Framework",
            "publisher" => "Master thesis KU Leuven",
            "date"   	=> "2015",
            "id"        => "frett15thesis",
            "pdf"       => true,
            "bibtex"    => true
        ),
        array(
            "author"    => "Alexandru - Madalin Ghenea",
            "title"     => "A Security Kernel for Protected Module Architectures",
            "publisher" => "Master thesis KU Leuven",
            "date"   	=> "2017 (ongoing)",
            "id"        => "ext",
            "pdf"       => false,
            "slides"    => false,
            "src"       => false,
            "bibtex"    => false
        )
    );

    publication_list($pubs);
?>

<?php research_section("media") ?>

<p>
Sancus has recently been featured in a number of technology news website
articles. Specifically, in the context of ongoing research that applies
Sancus-based techniques to secure automotive control networks.
</p>

<?php
    $pubs = array(
        array(
            "author"    => "Jan Tobias Mühlberg",
            "title"     => "A New Security Architecture for Networked Embedded Devices",
            "publisher" => "eeNews Europe Automotive",
            "date"   	=> "June 28, 2017",
            "id"        => "ext",
            "web"       => "http://www.eenewsautomotive.com/design-center/new-security-architecture-networked-embedded-devices"
        ),
        array(
            "author"    => "Laura Reggiani",
            "title"     => "Mobilità Intelligente: Privacy e Sicurezza",
            "publisher" => "Elettronica News",
            "date"   	=> "July 5, 2017",
            "id"        => "ext",
            "web"       => "https://www.elettronicanews.it/mobilita-intelligente-privacy-e-sicurezza/"
        ),
        array(
            "author"    => "Jan Tobias Mühlberg",
            "title"     => "Schwachpunkte Ausmerzen",
            "publisher" => "Elektronik Automotive",
            "date"   	=> "July 5, 2017",
            "id"        => "ext",
            "web"       => "http://www.elektroniknet.de/elektronik-automotive/sonstiges/schwachpunkte-ausmerzen-143239.html"
        ),
        array(
            "author"    => "Jan Tobias Mühlberg",
            "title"     => "Isolate and Verify: Security for Embedded Control Systems",
            "publisher" => "EuroSTAR Huddle",
            "date"   	=> "July 12, 2017",
            "id"        => "ext",
            "web"       => "https://huddle.eurostarsoftwaretesting.com/security-for-embedded-control-systems/"
        ),
    );

    publication_list($pubs);
?>

<p></p>

<?php
include("footer.php");
?>

