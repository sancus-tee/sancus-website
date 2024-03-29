<?php

define("GITHUB_URL", "https://github.com/sancus-tee");
define("TRAVIS_URL", "https://travis-ci.org/sancus-tee");

function doc_ref($id, $title = null)
{
    if (empty($title))
        $title = $id;

    echo <<<EOF
<a href="doc.php#$id">$title</a>
EOF;
}

function instruction($name, $opcode)
{
    echo <<<EOF
<h3>$name <small>$opcode</small></h3>
EOF;
}

function api_call($func)
{
    echo <<<EOF
<p>Convenience wrapper:</p>
<pre class="prettyprint">
$func
</pre>
EOF;
}

function gen_navbar_entries()
{
    global $navbar_links, $page_title;
    foreach ($navbar_links as $title => $url)
    {
        echo "<li";

        if ($title == $page_title)
            echo " class=\"active\"";

        echo "><a href=\"$url\">$title</a></li>\n";
    }
}

function start_section_header($id)
{
    global $sections;
    $title = $sections[$id];

    echo <<<EOF
<div class="page-header">
    <h1 id="$id" class="section-header">
        $title
EOF;
}

function end_section_header()
{
    echo <<<EOF
    </h1>
</div>
EOF;
}

function start_subsection_header($id)
{
    global $sections;
    $title = $sections[$id];

    echo <<<EOF
<div class="page-header">
    <h2 id="$id" class="subsection-header">
        $title
EOF;
}

function end_subsection_header()
{
    echo <<<EOF
    </h2>
</div>
EOF;
}

function get_pub_opt($pub, $opt)
{
    return isset($pub[$opt]) ? $pub[$opt] : null;
}

function publication_list($pubs)
{
    if (!empty($pubs))
    {
        echo <<<EOF
        <p class=research-par></p>
        <div class=research-list>
        <ul>
EOF;

    foreach ($pubs as $pub)
    {
        $author     = $pub["author"];
        $title      = $pub["title"];
        $publisher  = $pub["publisher"];
        $date       = $pub["date"];

        $id         = get_pub_opt($pub, "id");
        $pdf        = get_pub_opt($pub, "pdf");
        $slides     = get_pub_opt($pub, "slides");
        $bibtex     = get_pub_opt($pub, "bibtex");
        $src        = get_pub_opt($pub, "src");
        $web        = get_pub_opt($pub, "web");
        $video      = get_pub_opt($pub, "video");

        echo <<<EOF
        <li>$author. <strong>$title.</strong> <em>$publisher</em>, $date.
EOF;

        if (!empty($pdf))
        {
            $url = ($pdf === true) ? "publications/$id.pdf" : $pdf;
            echo <<<EOF
            <a href=$url><img alt="pdf" src="icons/pdf.png"></a>
EOF;
        }

        if (!empty($slides))
        {
            $url = ($slides === true) ? "publications/$id-slides.pdf" : $slides;
            echo <<<EOF
            <a href=$url><img alt="slides" src="icons/slides.png"></a>
EOF;
        }

        if (!empty($bibtex))
        {
            $url = ($bibtex === true) ? "publications/$id.bib" : $bibtex;
            echo <<<EOF
            <a href=$url><img alt="bibtex" src="icons/bibtex.png"></a>
EOF;
        }

        if (!empty($src))
        {
            echo <<<EOF
            <a href=$src><img alt="src" src="icons/src.png"></a>
EOF;
        }

        if (!empty($web))
        {
            $url = ($web === true) ? "$id" : $web;
            echo <<<EOF
            <a href=$url><img alt="web" src="icons/web.png"></a>
EOF;
        }

        if (!empty($video))
        {
            $url = ($video === true) ? "$id" : $video;
            echo <<<EOF
            <a href=$url><img alt="video" src="icons/video.png"></a>
EOF;
        }

        echo <<<EOF
        </li>
EOF;
    }
        echo <<<EOF
        </ul>
        </div>
EOF;
    }
}

function install_section($id, $downloads = null, $prereqs = null, $git=null)
{
    start_section_header($id);

    if (!empty($git))
    {
        $url=GITHUB_URL . "/" . $git;
        echo <<<EOF
        <small><a href=$url><img alt="src" src="icons/github-32px.png"></a></small>
EOF;
    }

    if (!empty($downloads))
    {
        echo <<<EOF
        <div class="btn-group header-button">
            <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Download <span class="caret"></span></button>
            <ul class="dropdown-menu">
EOF;
        foreach ($downloads as $title => $url)
        {
            echo <<<EOF
                <li><a href="downloads/$url">$title</a></li>
EOF;
        }

        echo <<<EOF
            </ul>
        </div>
EOF;
    }

    end_section_header();

    if (empty($prereqs))
        return;

    echo <<<EOF
<table class="table table-bordered table-condensed prerequisites">
    <caption>Prerequisites</caption>
    <thead>
        <tr>
            <th>Name</th>
            <th>Ubuntu package</th>
            <th>Version</th>
        </tr>
    </thead>
    <tbody>
EOF;

    foreach ($prereqs as $prereq)
    {
        $class = $prereq["build"] ? "build-prereq" : "runtime-prereq";
        $package_name = $prereq["package"];
        if (empty($package_name))
        {
            $package = "N/A";
            $note = isset($prereq["note"]) ? $prereq["note"] : null;
            if (!empty($note))
                $package .= $note;
        }
        else
            $package = "<a href=\"apt:$package_name\">$package_name</a>";

        $version = $prereq["version"];
        if (empty($version))
            $version = "N/A";

        echo <<<EOF
        <tr class="$class">
            <td><a href="{$prereq["url"]}">{$prereq["name"]}</a></td>
            <td>$package</td>
            <td>$version</td>
        </tr>
EOF;
    }

    echo <<<EOF
    </tbody>
</table>
EOF;
}

function doc_section($id, $cmd = null, $install = null)
{
    start_section_header($id);

    if (!empty($cmd))
    {
        echo <<<EOF
        <small>$cmd</small>
EOF;
    }

    if (!empty($install))
    {
        echo <<<EOF
        <div class="btn-group header-button">
            <a href="install.php#$install" class="btn btn-primary" >Install</a>
        </div>
EOF;
    }

    end_section_header();
}

function example_section($id, $git=null, $travis=null)
{
    start_section_header($id);

    if (!empty($git))
    {
        $url=GITHUB_URL . "/" . $git;
        echo <<<EOF
        <small><a href=$url><img alt="src" src="icons/github-32px.png"></a></small>
EOF;
    }

    if (!empty($travis))
    {
        $url=TRAVIS_URL . "/" . $travis;
        echo <<<EOF
        <small><a href=$url><img alt="status" src="https://travis-ci.org/sancus-tee/sancus-examples.svg?branch=master"></a></small>
EOF;
    }

    end_section_header();
}

function research_section($id)
{
    start_subsection_header($id);
    end_subsection_header();
}

function display_source_file($file)
{
    echo <<<EOF
<pre class="prettyprint">
<a href="code/$file" class="btn btn-primary src-button">$file</a>
EOF;
    echo chop(htmlspecialchars(file_get_contents("code/$file")));
    echo "</pre>\n";
}

function create_sancus_button($href, $lbl, $icon)
{
    echo <<<EOF
    <a href=$href class="btn btn-default sancus-btn" role="button">
            $lbl <i class="fa fa-$icon" aria-hidden="true"></i></a>
EOF;
}

function create_sancus_objective($title, $icon, $text)
{
    echo <<<EOF
    <div class="col-sm-4 sancus-objective">
      <span class="oi oi-$icon sancus-em"></span>
      <h4>$title</h4>
      <p>$text<p>
    </div>
EOF;
}

?>

