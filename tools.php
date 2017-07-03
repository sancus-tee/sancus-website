<?php

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

function install_section($id, $downloads = null, $prereqs = null)
{
    start_section_header($id);

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
            $package = "N/A";
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

function example_section($id)
{
    start_section_header($id);
    end_section_header();
}

function display_source_file($file)
{
    echo <<<EOF
<a href="code/$file" class="btn btn-primary src-button">$file</a>
<pre class="prettyprint">
EOF;
    echo chop(htmlspecialchars(file_get_contents("code/$file")));
    echo "</pre>\n";
}

?>

