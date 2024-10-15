<?php

$page_title = "Research";

$sections = array(
    "core"      => "Core Architecture",
    "ext"       => "Extensions",
    "sca"       => "Side-Channel Attacks and Defenses",
    "apps"     	=> "Applications",
    "student"   => "Student Theses",
    "media"     => "Press Coverage and Outreach",
);

include("header.php");
?>

<div class="page-header">
<h1 class="section-header">Research Publications</h1>
</div>

<p> Sancus is an ongoing research project, being used both within
DistriNet as well as by independent researchers. This page
aims to give a comprehensive overview of academic publications on Sancus-based
architectures and applications. Feel free to <a
href="https://github.com/sancus-tee/sancus-website">open a pull request on GitHub</a> us if you know of other
relevant research results to be included here.
</p>

<?php research_section("core") ?>

<p> The core Sancus security architecture was first presented at the 2013
USENIX security symposium. More recent developments are described in the Sancus
2.0 ACM TOPS journal paper, and in Job Noorman's PhD dissertation linked below.
Furthermore, a higher-level description of Sancus 1.0 is provided by two survey
publications on the Protected Module Architecture research field.
</p>

<?php
    $pubs = array(
        array(
            "author"    => "Job Noorman, Jo Van Bulck, Jan Tobias Mühlberg, Frank Piessens, Pieter Maene, Bart Preneel, Ingrid Verbauwhede, Johannes Götzfried, Tilo Müller, Felix Freiling",
            "title"     => "Sancus 2.0: A Low-Cost Security Architecture for IoT devices",
            "publisher" => "ACM Transactions on Privacy and Security (TOPS)",
            "date"      => "2017",
            "id"        => "tops17",
            "pdf"       => true,
            "slides"    => true,
            "src"       => "https://github.com/sancus-tee",
            "bibtex"    => true
        ),
        array(
            "author"    => "Job Noorman",
            "title"     => "Sancus: A Low-Cost Security Architecture for Distributed IoT Applications on a Shared Infrastructure",
            "publisher" => "PhD thesis KU Leuven",
            "date"      => "2017",
            "id"        => "noorman17phd",
            "pdf"       => "https://lirias.kuleuven.be/bitstream/123456789/574995/1/thesis.pdf",
            "slides"    => true,
            "bibtex"    => true
        ),
        array(
            "author"    => "Pieter Maene, Johannes Götzfried, Ruan De Clercq, Tilo Müller, Felix Freiling, Ingrid Verbauwhede",
            "title"     => "Hardware-Based Trusted Computing Architectures for Isolation and Attestation",
            "publisher" => "IEEE Transactions on Computers",
            "date"      => "2017",
            "id"        => "ieee17",
            "pdf"       => "https://www.esat.kuleuven.be/cosic/publications/article-2750.pdf",
            "slides"    => true,
            "bibtex"    => true
        ),
        array(
            "author"    => "Raoul Strackx, Job Noorman, Ingrid Verbauwhede, Bart Preneel, Frank Piessens",
            "title"     => "Protected Software Module Architectures",
            "publisher" => "Securing Electronic Business Processes (ISSE)",
            "date"      => "2013",
            "id"        => "isse13",
            "pdf"       => "https://lirias.kuleuven.be/bitstream/123456789/430320/1/ISSE-2013-paper.pdf",
            "bibtex"    => true
        ),
        array(
            "author"    => "Job Noorman, Pieter Agten, Wilfried Daniels, Raoul Strackx, Anthony Van Herrewege, Christophe Huygens, Bart Preneel, Ingrid Verbauwhede, Frank Piessens",
            "title"     => "Sancus: Low-Cost Trustworthy Extensible Networked Devices with a Zero-Software Trusted Computing Base",
            "publisher" => "Proceedings of the 22nd USENIX Security Symposium",
            "date"      => "2013",
            "id"        => "usenix13",
            "pdf"       => true,
            "slides"    => true,
            "src"       => "https://github.com/sancus-tee",
            "video"     => "https://www.usenix.org/conference/usenixsecurity13/technical-sessions/presentation/noorman",
            "bibtex"    => true
        ),
    );

    publication_list($pubs);
?>

<?php research_section("ext") ?>

<p>The following papers propose extensions to the Sancus
hardware and compiler infrastructure. Either to protect the confidentiality of
security-critical code, to preserve real-time deadlines on a partially
compromised embedded platform, or to provide authentic execution guarantees for
distributed event-driven applications.
</p>

<?php
    $pubs = array(
        array(
            "author"    => "Gianluca Scopelliti, Sepideh Pouyanrad, Job Noorman, Fritz Alder, Christoph Baumann, Frank Piessens, Jan Tobias Mühlberg",
            "title"     => "End-to-End Security for Distributed Event-Driven Enclave Applications on Heterogeneous TEEs",
            "publisher" => "ACM Transactions on Privacy and Security (TOPS)",
            "date"      => "2023",
            "src"       => "https://github.com/AuthenticExecution/main",
            "pdf"       => "https://dl.acm.org/doi/pdf/10.1145/3592607",
            "web"       => "https://dl.acm.org/doi/10.1145/3592607",
            "slides"    => false,
            "bibtex"    => false,
        ),
        array(
            "author"    => "Fritz Alder, Jo Van Bulck, Frank Piessens, Jan Tobias Mühlberg",
            "title"     => "Aion: Enabling Open Systems through Strong
                            Availability Guarantees for Enclaves",
            "publisher" => "Proceedings of the 28th ACM Conference on Computer and Communications Security (CCS)",
            "date"      => "2021",
            "id"        => "ccs21",
            "src"       => "https://github.com/sancus-tee/sancus-riot",
            "pdf"       => true,
            "slides"    => true,
            "video"     => "https://youtu.be/E_SbvA-txnQ",
            "bibtex"    => true
        ),
        array(
            "author"    => "Gianluca Scopelliti, Sepideh Pouyanrad, Job Noorman, Fritz Alder, Frank Piessens, Jan Tobias Mühlberg",
            "title"     => "POSTER: An Open-Source Framework for Developing Heterogeneous Distributed Enclave Applications",
            "publisher" => "Proceedings of the 28th ACM Conference on Computer and Communications Security (CCS)",
            "date"      => "2021",
            "id"        => "ccs21-poster",
            "src"       => "https://github.com/AuthenticExecution",
            "pdf"       => true,
            "slides"    => true,
            "video"     => "https://youtu.be/whJf6YgLPok",
            "bibtex"    => true
        ),
        array(
            "author"    => "Ivan De Oliveira Nunes, Sashidhar Jakkamsetti, Norrathep Rattanavipanon, Gene Tsudik",
            "title"     => "On the TOCTOU Problem in Remote Attestation",
            "publisher" => "Proceedings of the 28th ACM Conference on Computer and Communications Security (CCS)",
            "date"      => "2021",
            "src"       => "https://github.com/sprout-uci/RATA",
            "pdf"       => "https://arxiv.org/pdf/2005.03873.pdf",
        ),
        array(
            "author"    => "Ben Calus, Bob Reynders, Dominique Devriese, Job Noorman, Frank Piessens",
            "title"     => "FRP IoT Modules as a Scala DSL",
            "publisher" => "Proceedings of 4th International Workshop on Reactive and Event-Based Languages and Systems (REBLS)",
            "date"      => "2017",
            "id"        => "rebls17",
            "src"       => "https://github.com/tzbob/scala-iot-modules-for-frp",
            "pdf"       => true,
            "slides"    => true,
            "bibtex"    => true
        ),
        array(
            "author"    => "Job Noorman, Jan Tobias Mühlberg, Frank Piessens",
            "title"     => "Authentic Execution of Distributed Event-Driven Applications with a Small TCB",
            "publisher" => "Proceedings of the 13th International Workshop on Security and Trust Management (STM)",
            "date"      => "2017",
            "id"        => "stm17",
            "src"       => "https://github.com/sancus-tee/sancus-contiki",
            "pdf"       => true,
            "slides"    => true,
            "web"       => true,
            "bibtex"    => true
        ),
        array(
            "author"    => "Jo Van Bulck, Job Noorman, Jan Tobias Mühlberg, Frank Piessens",
            "title"     => "Towards Availability and Real-Time Guarantees for Protected Module Architectures",
            "publisher" => "Companion Proceedings of the 15th International Conference on Modularity (MASS)",
            "date"      => "2016",
            "id"        => "mass16",
            "pdf"       => true,
            "slides"    => true,
            "bibtex"    => true
        ),
        array(
            "author"    => "Johannes Götzfried, Tilo Müller, Ruan de Clercq, Pieter Maene, Felix Freiling, Ingrid Verbauwhede",
            "title"     => "Soteria: Offline Software Protection within Low-cost Embedded Devices",
            "publisher" => "Proceedings of the 31st Annual Computer Security Applications Conference (ACSAC)",
            "date"      => "2015",
            "id"        => "acsac15",
            "web"       => "https://www1.cs.fau.de/soteria",
            "pdf"       => "https://www1.cs.fau.de/filepool/projects/soteria/soteria.pdf",
            "slides"    => "https://www1.cs.fau.de/filepool/projects/soteria/soteria-talk.pdf",
            "bibtex"    => false
        ),
    );

    publication_list($pubs);
?>

<?php research_section("sca") ?>

<p>
Sancus has been leveraged to study
subtle side-channel vulnerabilities that may undermine enclave protection guarantees.
Particularly, an innovative timing side channel has been revealed
when implementing secure interrupts on Sancus-like processors,
leading to compiler-based defenses and hardware extensions to provably rule
out this attack surface.
</p>

<?php
    $pubs = array(
        array(
            "author"    => "Marton Bognar, Cas Magnus, Jo Van Bulck, Frank Piessens",
            "title"     => "Intellectual Property Exposure: Subverting and Securing Intellectual Property Encapsulation in Texas Instruments Microcontrollers",
            "publisher" => "33rd USENIX Security Symposium",
            "date"      => "2024",
            "id"        => "bognar24exposure",
            "src"       => "https://github.com/martonbognar/ipe-exposure",
            "pdf"       => true,
            "slides"    => false,
            "bibtex"    => true
        ),
        array(
            "author"    => "Matteo Busi, Pierpaolo Degano, Riccardo Focardi, Letterio Galletta, Flaminia Luccio, Frank Piessens and Jo Van Bulck",
            "title"     => "Exceptions Prove the Rule: Investigating and Resolving Residual Side Channels in Provably Secure Interrupt Handling",
            "publisher" => "4th Program Analysis and Verification on Trusted Platforms (PAVeTrust) Workshop",
            "id"        => "pavetrust24",
            "date"      => "2024",
            "src"       => false,
            "pdf"       => true,
            "slides"    => true,
            "bibtex"    => true
        ),
        array(
            "author"    => "Matteo Busi, Riccardo Focardi, Flaminia Luccio",
            "title"     => "Bridging the Gap: Automated Analysis of Sancus",
            "publisher" => "37th IEEE Computer Security Foundations Symposium (CSF)",
            "id"        => "alvie24",
            "date"      => "2024",
            "src"       => "https://github.com/matteobusi/alvie",
            "pdf"       => "https://arxiv.org/pdf/2404.09518",
            "slides"    => false,
            "bibtex"    => false
        ),
        array(
            "author"    => "Marton Bognar, Hans Winderix, Jo Van Bulck, Frank Piessens",
            "title"     => "MicroProfiler: Principled Side-Channel Mitigation through Microarchitectural Profiling",
            "publisher" => "Proceedings of the 8th IEEE European Symposium on Security and Privacy (EuroS&P)",
            "date"      => "2023",
            "id"        => "bognar23microprofiler",
            "src"       => "https://github.com/martonbognar/microprofiler/",
            "pdf"       => true,
            "slides"    => false,
            "bibtex"    => true
        ),
        array(
            "author"    => "Marton Bognar, Jo Van Bulck, Frank Piessens",
            "title"     => "Mind the Gap: Studying the Insecurity of Provably Secure Embedded Trusted Execution Architectures",
            "publisher" => "Proceedings of the 43rd IEEE Symposium on Security and Privacy (S&P)",
            "date"      => "2022",
            "id"        => "bognar22gap",
            "src"       => "https://github.com/martonbognar/gap-attacks",
            "pdf"       => true,
            "slides"    => false,
            "video"     => "https://www.youtube.com/watch?v=5gQfDpDN4eU",
            "bibtex"    => true
        ),
        array(
            "author"    => "Hans Winderix, Jan Tobias Mühlberg, Frank Piessens",
            "title"     => "Compiler-Assisted Hardening of Embedded Software
                            Against Interrupt Latency Side-Channel Attacks",
            "publisher" => "Proceedings of the 6th IEEE European Symposium on
                            Security and Privacy (EuroS&P)",
            "date"      => "2021",
            "id"        => "esp21",
            "src"       => "https://github.com/hanswinderix/sllvm",
            "pdf"       => true,
            "slides"    => true,
            "video"     => "https://youtu.be/L_OzePNKfFs",
            "bibtex"    => true
        ),
        array(
            "author"    => "Matteo Busi, Job Noorman, Jo Van Bulck, Letterio
                            Galletta, Pierpaolo Degano, Jan Tobias Mühlberg, Frank Piessens",
            "title"     => "Securing Interruptible Enclaved Execution on Small Microprocessors",
            "publisher" => "ACM Transactions on Programming Languages and Systems (TOPLAS)",
            "date"      => "2021",
            "id"        => "toplas21",
            "pdf"       => "https://dl.acm.org/doi/abs/10.1145/3470534",
            "bibtex"    => true
        ),
        array(
            "author"    => "Sepideh Pouyanrad, Jan Tobias Mühlberg, Wouter Joosen",
            "title"     => "SCF-MSP: Static Detection of Side Channels in MSP430 Programs",
            "publisher" => "Proceedings of the 15th International Conference on Availability, Reliability and Security (ARES)",
            "date"      => "2020",
            "id"        => "ares2020",
            "src"       => "https://github.com/sepidehpouyan/SCF-MSP430",
            "pdf"       => true,
            "bibtex"    => true
        ),
        array(
            "author"    => "Matteo Busi, Job Noorman, Jo Van Bulck, Letterio
                            Galletta, Pierpaolo Degano, Jan Tobias Mühlberg, Frank Piessens",
            "title"     => "Provably Secure Isolation for Interruptible Enclaved Execution on Small Microprocessors",
            "publisher" => "33rd IEEE Computer Security Foundations Symposium (CSF)",
            "date"      => "2020",
            "id"        => "csf20",
            "src"       => "https://github.com/sancus-tee/sancus-core/tree/nemesis",
            "pdf"       => "https://arxiv.org/pdf/2001.10881.pdf",
            "bibtex"    => true
        ),
        array(
            "author"    => "Jo Van Bulck, David Oswald, Eduard Marin, Abdulla Aldoseri, Flavio D. Garcia, Frank Piessens",
            "title"     => "A Tale of Two Worlds: Assessing the Vulnerability of Enclave Shielding Runtimes",
            "publisher" => "26th ACM Conference on Computer and Communications Security (CCS)",
            "date"      => "2019",
            "id"        => "ccs19",
            "pdf"       => "https://jovanbulck.github.io/files/ccs19-tale.pdf",
            "slides"    => "https://jovanbulck.github.io/files/ccs19-tale-slides.pdf",
            "video"     => "https://www.youtube.com/watch?v=zjdUEKX1jlI",
            "src"       => "https://github.com/jovanbulck/0xbadc0de",
            "bibtex"    => true
        ),
        array(
            "author"    => "Jo Van Bulck, Frank Piessens, Raoul Strackx",
            "title"     => "Nemesis: Studying Microarchitectural Timing Leaks in
                            Rudimentary CPU Interrupt Logic",
            "publisher" => "Proceedings of the 25th ACM Conference on Computer and Communications Security (CCS)",
            "date"      => "2018",
            "id"        => "ccs18",
            "src"       => "https://github.com/jovanbulck/nemesis",
            "pdf"       => true,
            "slides"    => true,
            "video"     => "https://youtu.be/njE9Vg8HOqk",
            "bibtex"    => true
        ),
    );

    publication_list($pubs);
?>


<?php research_section("apps") ?>

<p>Ongoing work leverages Sancus's lightweight
isolation and authentication primitives to establish trust in distributed
embedded application scenarios. These range from addressing specific
requirements, such as securely multiplexing shared platform resources among
distrusting clients, or establishing the integrity of an untrusted host
operating system, to extended case studies in the context of emerging smart
electricity meters or automotive control networks.
</p>

<?php
    $pubs = array(
        array(
            "author"    => "Stien Vanderhallen, Jo Van Bulck, Frank Piessens, Jan Tobias Mühlberg",
            "title"     => "Robust Authentication for Automotive Control Networks through Covert Channels",
            "publisher" => "Computer Networks",
            "date"      => "2021",
            "id"        => "comnet21-robust",
            "pdf"       => true,
            "slides"    => false,
            "src"       => "https://github.com/Stienvdh/vulcan/tree/iat-nonce",
            "bibtex"    => true
        ),
        array(
            "author"    => "Jan Pennekamp, Fritz Alder, Roman Matzutt, Jan Tobias Mühlberg, Frank Piessens, and Klaus Wehrle",
            "title"     => "Secure End-to-End Sensing in Supply Chains",
            "publisher" => "5th International Workshop on Cyber-Physical Systems Security (CPS-Sec)",
            "date"      => "2020",
            "id"        => "cps-sec20",
            "pdf"       => true,
            "video"     => "https://www.youtube.com/watch?v=UavQ54dO3kk",
            "bibtex"    => true
        ),
        array(
            "author"    => "Timothy Werquin, Roos Hubrechtsen, Ashok Thangarajan, Frank Piessens, Jan Tobias Mühlberg",
            "title"     => "Automated Fuzzing of Automotive Control Units",
            "publisher" => "International Workshop on Attacks and Defenses for
Internet-of-Things (ADIoT) / International Workshop on the
Secure Internet of Things (SIoT)",
            "date"      => "2019",
            "id"        => "siot2019",
            "pdf"       => true,
            "slides"    => false,
            "src"       => "https://github.com/timower/caringcaribou/tree/autoFuzz",
            "bibtex"    => true
        ),
        array(
            "author"    => "Jan Tobias Mühlberg, Jo Van Bulck",
            "title"     => "Tutorial: Building Distributed Enclave Applications with Sancus and SGX",
            "publisher" => "Proceedings of the 48th International Conference on Dependable Systems and Networks (DSN)",
            "date"      => "2018",
            "id"        => "dsn18",
            "pdf"       => true,
            "web"       => "https://distrinet.cs.kuleuven.be/software/sancus/tutorial.php",
            "src"       => "https://github.com/sancus-tee/tutorial-dsn18",
            "video"     => "https://www.youtube.com/watch?v=5soMsk8JYN0",
            "bibtex"    => true
        ),
        array(
            "author"    => "Jo Van Bulck, Jan Tobias Mühlberg, Frank Piessens",
            "title"     => "VulCAN: Efficient Component Authentication and Software Isolation for Automotive Control Networks",
            "publisher" => "Proceedings of the 33th Annual Computer Security Applications Conference (ACSAC)",
            "date"      => "2017",
            "id"        => "acsac17",
            "pdf"       => true,
            "slides"    => true,
            "web"       => "https://distrinet.cs.kuleuven.be/software/vulcan",
            "src"       => "https://github.com/sancus-tee/vulcan",
            "video"     => "https://youtu.be/gzxwiWfkl9g",
            "bibtex"    => true
        ),
        array(
            "author"    => "Jan Tobias Mühlberg, Sara Cleemput, Mustafa A. Mustafa, Jo Van Bulck, Bart Preneel, Frank Piessens",
            "title"     => "An Implementation of a High Assurance Smart Meter using Protected Module Architectures",
            "publisher" => "10th WISTP International Conference on Information Security Theory and Practice (WISTP)",
            "date"      => "2016",
            "id"        => "wistp16",
            "pdf"       => true,
            "slides"    => true,
            "web"       => true,
            "bibtex"    => true
        ),
        array(
            "author"    => "Jan Tobias Mühlberg, Job Noorman, Frank Piessens",
            "title"     => "Lightweight and Flexible Trust Assessment Modules for the Internet of Things",
            "publisher" => "Proceedings of the 20th European Symposium on Research in Computer Security (ESORICS)",
            "date"      => "2015",
            "id"        => "esorics15",
            "pdf"       => true,
            "slides"    => true,
            "web"       => true,
            "src"       => "https://github.com/sancus-tee/sancus-contiki",
            "bibtex"    => true
        ),
        array(
            "author"    => "Jo Van Bulck, Job Noorman, Jan Tobias Mühlberg, Frank Piessens",
            "title"     => "Secure Resource Sharing for Embedded Protected Module Architectures",
            "publisher" => "9th WISTP International Conference on Information Security Theory and Practice (WISTP)",
            "date"      => "2015",
            "id"        => "wistp15",
            "pdf"       => true,
            "slides"    => true,
            "web"       => true,
            "src"       => "https://github.com/sancus-tee/sm-access-control",
            "bibtex"    => true
        ),
    );

    publication_list($pubs);
?>

<?php research_section("student") ?>

<p> Sancus has been used as the development platform for several master theses
and other student projects.
</p>
<p><b>2024.</b>
The automated vulnerability discovery tool 'Pandora' has been successfully ported from the high-end Intel SGX architecture to the low-end Sancus architecture. This adaptation enables automated discovery of control flow and pointer vulnerabilities within Sancus enclaves.
</p>

<p><b>2022.</b>
The features of Sancus were compared with those offered by Intellectual Property
Encapsulation (IPE), a security feature found on some commercial Texas Instruments microcontrollers.
</p>

<p><b>2021.</b>
A Sancus compiler extension was developed that automatically balances
conditional branches to protect against advanced side-channel adversaries
exploiting fine-grained enclave memory-access patterns through Direct Memory
Access (DMA) contention.
</p>

<p><b>2020.</b>
Two theses leveraged Sancus as a base platform to further extend uses cases for
authentic execution and controller-area network authentication.
Another thesis, furthermore, explored a new type of side-channel attack on
Sancus enclaves, exploiting memory contention from untrusted DMA devices.
</p>

<p><b>2019.</b>
An enclave-aware DMA controller was developed to
maintain Sancus's security properties in the presence of untrusted peripheral
DMA devices.
Another thesis developed an attack framework for single-stepping Sancus enclaves and investigated side-channel leakage in compiler-generated code.
</p>

<p><b>2018.</b>
One thesis redesigned the Sancus compiler infrastructure, and used
Sancus as the target platform for a unified secure compilation framework.
Another project investigated secure communication channel establishment for
distributed enclave applications with Sancus and Intel SGX.
</p>

<p><b>2017.</b>
A trusted kernel-like software module has been developed to investigate
hardware/software design trade-offs for cryptographic primitives. Another
student project looked into providing responsiveness for the secure world
formed by Sancus modules loaded on the same device.
</p>

<p><b>2016.</b>
Sancus was used as the target platform for an automated reactive
programming code generation framework.
</p>

<p><b>2015.</b>
One thesis explored the feasibility of supplementing
Sancus's hardware-enforced security guarantees with availability and access
control guarantees for shared system resources.
Another project leveraged Sancus to to establish secure I/O paths for
applications running on higher-end Protected Module Architectures.
</p>
<?php
	$pubs = array(
		array(
			"author" 	=> "Gert-Jan Goossens",
			"title" 	=> "Validating Sancus Enclaves using Symbolic Execution",
			"publisher"	=> "Master thesis KU Leuven",
			"date" 		=> "2024",
			"id" 		=> "goossens24thesis",
			"pdf" 		=> true,
			"slides" 	=> true,
			"src" 		=> "https://github.com/Gert-JanG/pandora-sancus",
			"bibtex" 	=> true
		),
        array(
            "author"    => "Jolan Hofmans",
            "title"     => "A Comparative Analysis of Security Features Between Sancus and TI MSP430 IPE",
            "publisher" => "Master thesis KU Leuven",
            "date"      => "2022",
            "id"        => "hofmans22thesis",
            "pdf"       => true,
            "bibtex"    => true
        ),
        array(
            "author"    => "Steffie Joosen",
            "title"     => "Hardening Enclave Programs against Side-Channel Vulnerabilities at Compile-Time",
            "publisher" => "Master thesis KU Leuven",
            "date"      => "2021",
            "id"        => "joosen21thesis",
            "pdf"       => true,
            "src"       => "https://github.com/SteffieJoosen/sllvm/tree/DMADefender/test/sancus",
            "slides"    => false,
            "bibtex"    => true
        ),
        array(
            "author"    => "Marton Bognar",
            "title"     => "Analyzing Side-Channel Leakage in Secure DMA Solutions",
            "publisher" => "Master thesis KU Leuven",
            "date"      => "2020",
            "id"        => "bognar20thesis",
            "src"       => "https://github.com/sancus-tee/sancus-core/pull/19",
            "pdf"       => true,
            "slides"    => false,
            "bibtex"    => true
        ),
        array(
            "author"    => "Stien Vanderhallen",
            "title"     => "Robust Authentication for Automotive Control Networks through Covert Bandwidth",
            "publisher" => "Master thesis KU Leuven",
            "date"      => "2020",
            "id"        => "vanderhallen2020",
            "pdf"       => true,
            "slides"    => false,
            "src"       => "https://github.com/Stienvdh/can-IAT-channel",
            "bibtex"    => true
        ),
        array(
            "author"    => "Gianluca Scopelliti",
            "title"     => "Securing Smart Environments with Authentic Execution",
            "publisher" => "Master thesis Politecnico Di Torino",
            "date"      => "2020",
            "id"        => "scopelliti2020",
            "pdf"       => true,
            "slides"    => false,
            "src"       => "https://github.com/gianlu33/authentic-execution",
            "bibtex"    => true
        ),
        array(
            "author"    => "Sven Cuyt",
            "title"     => "A Security Analysis of Interrupts in Embedded Enclaved Execution",
            "publisher" => "Master thesis KU Leuven",
            "date"      => "2019",
            "id"        => "cuyt19thesis",
            "pdf"       => true,
            "slides"    => true,
            "src"       => "https://github.com/jovanbulck/nemesis/tree/master/sancus/stubs",
            "bibtex"    => true
        ),
        array(
            "author"    => "Sergio Seminara",
            "title"     => "DMA Support for the Sancus Architecture",
            "publisher" => "Master thesis Politecnico di Torino",
            "date"      => "2019",
            "id"        => "seminara19thesis",
            "pdf"       => true,
            "slides"    => true,
            "src"       => "https://github.com/S3rg7o/sancus-core",
            "bibtex"    => true
        ),
	array(
            "author"    => "Timothy Werquin",
            "title"     => "Automated Reverse Engineering and Fuzzing of the CAN Bus",
            "publisher" => "Master thesis KU Leuven",
            "date"      => "2019",
            "id"        => "werquin2019",
            "pdf"       => true,
            "slides"    => false,
            "src"       => "https://github.com/timower/caringcaribou/tree/autoFuzz",
            "bibtex"    => true
        ),
        array(
            "author"    => "Hans Winderix",
            "title"     => "Security Enhanced LLVM",
            "publisher" => "Master thesis KU Leuven",
            "date"      => "2018",
            "id"        => "winderix18thesis",
            "pdf"       => true,
            "slides"    => "publications/winderix18thesis-slides/index.html",
            "src"       => "https://github.com/hanswinderix/sllvm",
            "bibtex"    => true
        ),
        array(
            "author"    => "Sten Verbois",
            "title"     => "Safe Interacting Enclaves for Heterogeneous Protected Module Architectures",
            "publisher" => "Master thesis KU Leuven",
            "date"      => "2018",
            "id"        => "verbois18thesis",
            "pdf"       => true,
            "slides"    => true,
            "video"     => "publications/verbois18thesis-demo.webm",
            "src"       => "https://github.com/stenverbois/vulcan-rs",
            "bibtex"    => true
        ),
        array(
            "author"    => "Michiel Van Beirendonck",
            "title"     => "Responsiveness Guarantee for the Sancus Protected Module Architecture",
            "publisher" => "Honours Programme KU Leuven",
            "date"      => "2017",
            "id"        => "vanbeirendonck17",
            "pdf"       => true,
            "slides"    => true,
            "src"       => "https://github.com/Michielvb/sancus-availability",
            "bibtex"    => true
        ),
        array(
            "author"    => "Alexandru - Madalin Ghenea",
            "title"     => "A Security Kernel for Protected Module Architectures",
            "publisher" => "Master thesis KU Leuven",
            "date"      => "2017",
            "id"        => "madalinghenea17thesis",
            "pdf"       => true,
            "slides"    => true,
            "src"       => "https://github.com/nighthawk017/sancus_kernel",
            "bibtex"    => true
        ),
        array(
            "author"    => "Ben Calus",
            "title"     => "Functional Reactive Programming on Embedded Devices",
            "publisher" => "Master thesis KU Leuven",
            "date"      => "2016",
            "id"        => "calus16thesis",
            "pdf"       => true,
            "bibtex"    => true
        ),
        array(
            "author"    => "Dennis Frett",
            "title"     => "Extending Protected Module Architectures with a Secure I/O Framework",
            "publisher" => "Master thesis KU Leuven",
            "date"      => "2015",
            "id"        => "frett15thesis",
            "pdf"       => true,
            "bibtex"    => true
        ),
        array(
            "author"    => "Jo Van Bulck",
            "title"     => "Secure Resource Sharing for Embedded Protected Module Architectures",
            "publisher" => "Master thesis KU Leuven",
            "date"      => "2015",
            "id"        => "vanbulck15thesis",
            "pdf"       => true,
            "slides"    => true,
            "src"       => "https://github.com/jovanbulck/thesis-src/",
            "bibtex"    => true
        ),
    );

    publication_list($pubs);
?>

<?php research_section("media") ?>

<p>
Sancus has recently been featured in a number of technology news website
articles and at the 2018 Free and Open Source Software Developers' European Meeting (FOSDEM'18).
Specifically, in the context of ongoing research that applies
Sancus-based techniques to secure automotive control networks.
</p>

<?php
    $pubs = array(
        array(
            "author"    => "Jo Van Bulck, Hans Winderix, Marton Bognar, Lesly-Ann Daniel, Daan Vanoverloop",
            "title"     => "Open-Source Prototyping for Systems Security Research",
            "publisher" => "Poster @ KU Leuven Open Science Day, Leuven, Belgium",
            "date"      => "May 6, 2024",
            "id"        => "kul24",
            "slides"    => true,
        ),

        array(
            "author"    => "Jo Van Bulck, Frank Piessens",
            "title"     => "Happy Birthday Sancus! – Lessons from 10 Years of Maintaining a Trusted Computing Research Prototype",
            "publisher" => "Keynote @ DRADS DistriNet Workshop, Rendeux, Belgium",
            "date"      => "March 24, 2023",
            "id"        => "drads23",
            "slides"    => true,
            "video"     => "media/drads23-sancus-bday.mp4"
        ),
        array(
            "author"    => "Gianluca Scopelliti and Sepideh Pouyanrad",
            "title"     => "An Open-Source Framework for Developing Heterogeneous Distributed Enclave Applications",
            "publisher" => "FOSDEM'21",
            "date"      => "February, 2021",
            "id"        => "fosdem21",
            "slides"    => true,
            "src"       => "https://github.com/AuthenticExecution",
            "web"       => "https://archive.fosdem.org/2021/schedule/event/tee_sancus/",
            "video"     => "https://youtu.be/vLnRoNNwfDA"
        ),
        array(
            "author"    => "Hans Winderix",
            "title"     => "Security Enhanced LLVM",
            "publisher" => "BELCLIV award lecture",
            "date"      => "May 22, 2019",
            "id"        => "winderix19belcliv",
            "slides"    => "publications/winderix19belcliv-slides/index.html",
            "web"       => "http://www.clusib.be/wp/price/?lang=nl"
        ),
        array(
            "author"    => "Jan Tobias Mühlberg and Jo Van Bulck",
            "title"     => "Reflections on post-Meltdown trusted computing:
                            A case for open security processors",
            "publisher" => ";login: the USENIX magazine, Fall 2018, Vol. 43, No. 3",
            "date"      => "September, 2018",
            "id"        => "login18",
            "web"       => "https://www.usenix.org/publications/login/fall-2018-vol-43-no-2/muhlberg",
            "pdf"       => true,
            "bibtex"       => true,
        ),
        array(
            "author"    => "Jo Van Bulck",
            "title"     => "Hardware-Based Trusted Computing Architectures From an Attack and Defense Perspective",
            "publisher" => "Newline 0x08",
            "date"      => "April, 2018",
            "id"        => "newline18",
            "web"       => "https://hackerspace.gent/landing/newline.php",
            "pdf"       => true,
        ),
        array(
            "author"    => "Mischa Spiegelmock",
            "title"     => "Open-source trusted computing for IoT",
            "publisher" => "LWN.net",
            "date"      => "February, 2018",
            "id"        => "lwn18",
            "web"       => "https://lwn.net/Articles/747564/",
        ),
        array(
            "author"    => "Jan Tobias Mühlberg",
            "title"     => "Sancus 2.0: Open-Source Trusted Computing for the IoT",
            "publisher" => "FOSDEM'18",
            "date"      => "February, 2018",
            "id"        => "fosdem18",
            #"web"       => "https://fosdem.org/2018/interviews/jan-tobias-muehlberg/",
            "web"       => "https://fosdem.org/2018/schedule/event/sancus/",
            "video"     => "https://www.youtube.com/watch?v=b1Js-GasBZA",
            "slides"    => true,
        ),
        array(
            "author"    => "Jan Tobias Mühlberg",
            "title"     => "Security architecture for CAN",
            "publisher" => "CAN newsleter, CAN in Automation (CiA)",
            "date"      => "September, 2017",
            "id"        => "ext",
            "pdf"       => "https://can-newsletter.org/uploads/media/raw/3db5fe2a245956c04d3842a5ad3a8e27.pdf"
        ),
        array(
            "author"    => "Jan Tobias Mühlberg",
            "title"     => "Isolate and Verify: Security for Embedded Control Systems",
            "publisher" => "EuroSTAR Huddle",
            "date"      => "July 12, 2017",
            "id"        => "ext",
            "web"       => "https://huddle.eurostarsoftwaretesting.com/security-for-embedded-control-systems/"
        ),
        array(
            "author"    => "Jan Tobias Mühlberg",
            "title"     => "Schwachpunkte Ausmerzen",
            "publisher" => "Elektronik Automotive",
            "date"      => "July 5, 2017",
            "id"        => "ext",
            "web"       => "http://www.elektroniknet.de/elektronik-automotive/sonstiges/schwachpunkte-ausmerzen-143239.html"
        ),
        array(
            "author"    => "Jan Tobias Mühlberg and Laura Reggiani",
            "title"     => "Mobilità Intelligente: Privacy e Sicurezza",
            "publisher" => "Elettronica News",
            "date"      => "July 5, 2017",
            "id"        => "ext",
            "web"       => "https://www.elettronicanews.it/mobilita-intelligente-privacy-e-sicurezza/"
        ),
        array(
            "author"    => "Jan Tobias Mühlberg",
            "title"     => "A New Security Architecture for Networked Embedded Devices",
            "publisher" => "eeNews Europe Automotive",
            "date"      => "June 28, 2017",
            "id"        => "ext",
            "web"       => "http://www.eenewsautomotive.com/design-center/new-security-architecture-networked-embedded-devices"
        ),
        array(
            "author"    => "Jan Tobias Mühlberg",
            "title"     => "Making Car Electronics Safe Again",
            "publisher" => "imec Magazine",
            "date"      => "March, 2017",
            "id"        => "ext",
            "web"       => "https://www.imec-int.com/en/imec-magazine/imec-magazine-march-2017/making-car-electronics-safe-again",
            "pdf"       => "https://www.imec-int.com/cache/pdfs/en/imec-magazine/imec-magazine-march-2017/making-car-electronics-safe-again.pdf"
        ),
    );

    publication_list($pubs);
?>

<p></p>

<?php
include("footer.php");
?>
