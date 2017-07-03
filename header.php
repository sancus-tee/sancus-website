<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$DOMAIN = "https://distrinet.cs.kuleuven.be/software/sancus";

//ob_start();

$navbar_links = array(
    "Home"          => "index.php",
    "Installation"  => "install.php",
    "Documentation" => "doc.php",
    "Examples"      => "examples.php",
    "Research"      => "research.php"
);

include("tools.php");

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <!-- title>Sancus: Low-cost trustworthy extensible networked devices with a zero-software Trusted Computing Base</title-->
    <title>Sancus 2.0: A Low-Cost Security Architecture for IoT Devices</title>
    <link href="sancus.css" rel="stylesheet" />
    <script src="include/jquery.js"></script>
    <script src="include/bootstrap.min.js"></script>
    <script src="include/run_prettify.js"></script>
</head>

<body data-spy="scroll" data-target=".side-nav-bar">
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                <a class="brand" href="index.php">Sancus</a>
                <ul class="nav">
                    <?php gen_navbar_entries() ?>
                </ul>
                </div>
            </div>
        </div>
    <div class="container">
        <div class="row">
            <?php if (empty($sections)): ?>
            <div class="span12">
            <?php else: ?>
            <div class="span3 side-nav-bar">
                <ul class="nav nav-list side-nav-list span3" data-spy="affix">
                    <?php foreach ($sections as $id => $title): ?>
                    <li><a href="#<?php echo $id?>"><i class="icon-chevron-right"></i><?php echo $title?></a></li>
                    <?php endforeach ?>
                </ul>
            </div>
            <div class="span9">
            <?php endif ?>
