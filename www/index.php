<?php

require __DIR__ . '/../vendor/autoload.php';


if (empty($_GET['file'])) {
	$dir = htmlspecialchars(realpath(__DIR__ . '/..'));
	$url = htmlspecialchars('http://' . $_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_NAME'] . '?lang=cs&file=writing&refresh=10');

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
$autorefresh = !empty($_GET['refresh']) ? json_encode($_GET['refresh']) : '0';

$header = <<<HTML
<!doctype html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://files.nette.org/css/combined.css">
  <script> if ($autorefresh) { setTimeout(function () { window.location.reload(); }, parseInt($autorefresh) * 1000); } </script>
</head>
<body><div id=page><div id=main class=sidebar><div id=content>
HTML;

$name = basename($file, '.texy');
$id = new Wiki\PageId($book, $lang, $name);

$convertor = new Wiki\Convertor;
$page = $convertor->parse($id, file_get_contents(__DIR__ . '/../web-content/' . $lang . '/' . $file));

echo $header . $page->html;
