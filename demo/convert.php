<?php


require __DIR__ . '/../vendor/autoload.php';


$file = 'demo.texy';
$book = 'doc-2.0';
$lang = 'cs';
$name = basename($file, '.texy');
$id = new Wiki\PageId($book, $lang, $name);

$header = '<!doctype html><meta charset="utf-8"><link rel="stylesheet" href="https://files.nette.org/css/combined.css"><body><div class=page><div class="main has-sidebar"><div class=content>';

$convertor = new Wiki\Convertor;
$page = $convertor->parse($id, file_get_contents($file));
file_put_contents($name . '.html', $header . $page->html);
