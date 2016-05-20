<?php

require __DIR__ . '/../vendor/autoload.php';

/**
 * Generate non-escaped link to documentation
 * @param string $lang
 * @param string $file
 * @return string
 */
function generateNonEscapedLink($lang, $file)
{
	return 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_NAME'] . '?lang=' . $lang . '&file=' . $file;
}

/**
 * Generate escaped link to documentation
 * @param string $lang
 * @param string $file
 * @return string
 */
function generateLink($lang, $file)
{
	return htmlspecialchars(generateNonEscapedLink($lang, $file));
}

/**
 * Get name of local branch of documentation
 * @return bool|mixed
 */
function gitBranch()
{
	if (is_readable(__DIR__ . '/../web-content/.git/HEAD')) {
		$head = trim(file_get_contents(__DIR__ . '/../web-content/.git/HEAD'));
		$head = explode('/', $head);
		return (array_pop($head));
	} else {
		return false;
	}
}

// Root page of documentation
$homepage = generateLink('en', 'homepage');

if (empty($_GET['file'])) {
	/*
	 * Can open homepage? Open it
	 */
	if (is_readable(__DIR__ . '/../web-content/en/homepage.texy')) {
		header('Location:' . generateNonEscapedLink('en', 'homepage'));
		exit;
	}

	/*
	 * Documentation content missing, show advice do download
	 */
	$dir = htmlspecialchars(realpath(__DIR__ . '/..'));

	echo <<<HTML
<meta charset="utf-8">
<p>
Please run <br>
$ git clone https://github.com/nette/web-content '$dir/web-content' <br>
and open <a href="$homepage">$homepage</a>
</p>
HTML;
	exit;
}

$gitBranch = gitBranch();
$file = $_GET['file'] . '.texy';
$lang = !empty($_GET['lang']) ? $_GET['lang'] : 'en';
$filePath = realpath(__DIR__ . '/../web-content/' . $lang . '/' . $file);
$changeLang = generateLink($lang === 'en' ? 'cs' : 'en', $_GET['file']);

$autorefresh = !empty($_GET['refresh']) ? json_encode($_GET['refresh']) : '0';

$name = basename($file, '.texy');
$id = new Wiki\PageId($gitBranch ?: 'doc-2.4', $lang, $name);

// Local address to media files
$mediaPath = 'http://' . $_SERVER['SERVER_NAME'] . dirname(dirname($_SERVER['SCRIPT_NAME'])) . '/web-content/files';

$convertor = new Wiki\Convertor(array(
	'mediaPath' => $mediaPath,
	'fileMediaPath' => $mediaPath,
	'apiUrl' => 'https://api.nette.org' . (strpos($gitBranch, 'doc-') !== false ? '/' . substr($gitBranch, 4) : ''),
));
$page = $convertor->parse($id, file_get_contents(__DIR__ . '/../web-content/' . $lang . '/' . $file));

$hasSidebar = $page->toc ? 'has-sidebar' : '';

$about = "This page is saved on <b>" . htmlspecialchars($filePath) . "</b>" .
	"<br>Last update <b>" . date('Y/m/d H:i:s P', filemtime($filePath)) . "</b>" .
	($gitBranch ? "<br>Using git on branch <b>$gitBranch</b>" : '');

echo <<<HTML
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://files.nette.org/css/combined.css">
  <title>{$page->title}</title>
  <script> if ($autorefresh) { setTimeout(function () { window.location.reload(); }, parseInt($autorefresh) * 1000); } </script>
</head>
<body>
  <div class=page>
    <header class="main"><p>$about</p><nav class=main><ul>
      <li><a href="$homepage">Homepage</a></li>
      <li><a href="$changeLang">Change language</a></li>
    </ul></nav></header>
  <div class=main><div class="content $hasSidebar">

  {$page->html}

  </div> <!-- div.content.has-sidebar -->
  </div> <!-- div.main -->
<footer class=main><p>$about</p></footer>
</div> <!-- div.page -->
<script src="link-transfer.js"></script>
</body>
</html>
HTML;
