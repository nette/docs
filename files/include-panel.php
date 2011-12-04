<?php

class IncludePanel implements Nette\Diagnostics\IBarPanel
{

	public function getPanel()
	{
		$len = strlen($_SERVER['DOCUMENT_ROOT']);
		$list = get_included_files();
		$n = count($list);
		$a = array_map(function($s)use($len) {
					$file = Nette\Diagnostics\Helpers::editorLink($s, 1)->setText(substr($s, $len));
					$file = "$file<br>";
					return $file;
				}, $list);
		$a = join("", $a);
		return "<div class=''><h1>Included files ($n)</h1><div class='nette-inner'><code>$a<code></div></div>";
	}

	public function getTab()
	{
		return '<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAACt0lEQVQ4y62TW0iTcRjGn28nv43NzW14nM506s0UJDMVyo4k2RwolpJUhEUSyyiCCsSrSsrIKLuqoDAsBCVIQsWyoDLLQyhGU1Gz2jyxT79t7vR9/y5Kc+ZFFz2XD8//B+/z/l8h1pFMJhOEqtS5m3fkWyL1KSZm3s75vJ4x/ItCQ5WywsMnm1rffia9Ux7S9MlJjtW1EXl0wnmYLYK1eeFaIyvvwN0z1bWlaQmR4AhgZzmwkgiMDfVtxWAH7XWxADC+nA8iSqVSQ9qukjJXQATrnB9fZv2YYjjYWA5SQUBSfrziommfqZXWRhUsvxGtBvj9fiMXZhBY5/wQCygseHhMMRysk3bo3R8QF18M44ZoWh8f/+h2wxMTHNNdQSPQNA1EpJ7wKRMFNpbDhCOA0W+z0PVUIik1A+aC/Xjd/R5CWiYZHJ/SBXJLmqjVgENFKRkajfBli80kV+mSQS+MwOhsQZghFQcrriEpOmola9i2p3smbuPulQ4qy1P3nisTdwjcC3P24WcvhK+qF7eH25BRXAVzaQ0UAgWmp13o7f0BsVgICtSfDqpOpx8t2eK6VfMwMNHImevzjPZLWrVadurCVbQ9H8X1y29ACIHFkoWRkXkYjVrwhPzagkoRkpypd9w8e0883Ejyr/Aiyf3szE1yQ2KiyMV60Nk5Crfbh6goOez2RQwN2eF0LoH8BogY1ms98iC8iEnIFhEe7XxzXSAkpxY+XwBLSx6oVBJoNDRMpiTYbC7QtBAsuwoAAPMDPe0Y6FkpyOv1w+Pxg2EWUViYAAAQiznExoYgJiYODgcDnuf//gfLcru9iIjWoaHlcZD/fXIC76zjHymRZJERK74SQtYH9Pf3IUcqh06tCfKdM9NwKGOaqHD9HQLC88033NR6ACp9Zw6l1BrXvTal1so/re/C/9JPOxcb0VoXrMkAAAAASUVORK5CYII="/>'
				. count(get_included_files());
	}

}

