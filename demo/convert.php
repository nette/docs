<?php


require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/other/fshl/fshl.php';
require __DIR__ . '/../src/Link.php';
require __DIR__ . '/../src/Convertor.php';


$file = 'demo.texy';
$book = 'doc-2.0';
$lang = 'cs';

$header = '<!doctype html><meta charset="utf-8"><link rel="stylesheet" href="http://files.nette.org/css/combined.css"><body><div id=page><div id=main class=sidebar><div id=content>';

$name = basename($file, '.texy');
$convertor = new Text\Convertor($book, $lang, $name);
$convertor->parse(file_get_contents($file));
file_put_contents($name . '.html', $header . $convertor->html);
