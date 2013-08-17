<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/other/fshl/fshl.php';
require __DIR__ . '/../src/Link.php';
require __DIR__ . '/../src/Convertor.php';


if (empty($_GET['file'])) {
	$dir = htmlspecialchars(realpath(__DIR__ . '/..'));
	$url = htmlspecialchars('http://' . $_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_NAME'] . '?lang=cs&file=writing');

	echo <<<HTML
<meta charset="utf-8">
<p>
Please run <br>
$ git clone https://github.com/nette/web-content '$dir/web-content' <br>
and open <a href="$url">$url</a>
</p>
HTML;
	exit;
}

$file = $_GET['file'] . '.texy';
$book = 'doc-2.0';
$lang = !empty($_GET['lang']) ? $_GET['lang'] : 'cs';

$header = <<<HTML
<!doctype html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="http://files.nette.org/css/combined.css">
  <script> setTimeout(function () { window.location.reload(); }, 5000) </script>
</head>
<body><div id=page><div id=main class=sidebar><div id=content>
HTML;

$name = basename($file, '.texy');
$convertor = new Text\Convertor($book, $lang, $name);
$convertor->parse(file_get_contents(__DIR__ . '/../web-content/' . $lang . '/' . $file));

echo $header . $convertor->html;
