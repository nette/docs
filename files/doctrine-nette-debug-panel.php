<?php

/**
 * Doctrine v1.2 debug panel for Nette
 *
 * license: New BSD License
 *
 * @copyright  Copyright (c) 2010 Peter Helcmanovsky
 */

class DoctrineNetteDebugPanel extends Nette\Object implements Nette\IDebugPanel
{
	private $dcp;		//Doctrine profiler instance
	
	public function __construct( $_doctrine_profiler )
	{
		$this->dcp = $_doctrine_profiler;
		if (class_exists('Nette\Debug', FALSE) && is_callable('Nette\Debug::addPanel')) {
			Nette\Debug::addPanel($this);
		}
	}
	
	//Nette\IDebugPanel interface
	
	//Renders HTML code for custom tab.
	function getTab()
	{
		return '<image alt="Doctrine" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABtElEQVR4nH2ToYsbQRSHv20iHlzEiIgRJ1ZUJKJwouIgda04cSKif0BFCxEtnGghMqKiphCoWSilkSsKPVERaEXEBVa0EFHIioNGnFgRsSIHI3aZirlmb2/SPDPwdn/f/N6b9wJrLbejXM6t+T2DwiBHJzS6vYA90fQyWQpf3oEIZp1x0O3t03PPy+gOtAREwc9zrj+8sDt0/wc0ur1AXk6ct5aCJN4L8QDlcm5ZZ9AUyHNoh3shwe0mlsu5NfEI0gR0CIcdSGeunE0OD/scvPpYa2rNgYlHsFqAUsggQl7HcDp04n/lfH5jdwLK758sl4n7cZNj0gQA6Z9Bfwh5BkrDRUz555f1AGYxdXU3Be4fw8UEFtM6ZJNDYTCL2dZBNQfrFSiNjKbupgIozPazPB1iTA7nY6DKVz0Q5c5i6wkvCj9VOdAduEwwb09cH4xBno+hc1w1eDaBlkJU6DuQR30QAWPgKkVOz+rib5FzqbR74ruAxoPHAU8GsLkZorauxNPIjbfJkUFUW7Dg7jZef31v+RE5J20NV6kD6hB5Nva20wPAzUSmCWQraAlyeAQ63LnafwHG7KzyWNAiIQAAAABJRU5ErkJggg==" >'
			. count($this->dcp) . ' events';
	}

	//Renders HTML code for custom panel.
	function getPanel()
	{
		if ( !count($this->dcp) ) return;					//no doctrine events, return void
		
		//Visualize events into queries (merge prepare+execute+fetch events into single query)
		$eventcodes_add = array(							//list of event codes to merge to previous event
			Doctrine_Event::STMT_EXECUTE => true,
			Doctrine_Event::STMT_FETCH => true,
			Doctrine_Event::STMT_FETCHALL => true,
			//TODO decide which other codes should add up to previous event
		);
		$eventcodes_params = array(							//list of event codes to use for params
			Doctrine_Event::STMT_EXECUTE => true,
			//TODO find which other codes have params set up
		);
		$eventdesc = array(									//custom descriptions for events without query
			Doctrine_Event::CONN_CONNECT => 'Connecting to DB...',
			//TODO add other descriptions as needed
		);
		$queries = array();
		$singleevent = NULL;
		$totalTime = NULL;
		foreach( $this->dcp->getAll() as $ev ) {			//process all raw doctrine events
			$ecode = $ev->getCode();
			$msecs = $ev->getElapsedSecs() * 1000;
			$totalTime += $msecs;
			$SQL = $ev->getQuery();
			if ( empty($SQL) ) $SQL = isset( $eventdesc[$ecode] ) ? $eventdesc[$ecode] : $ev->getName();
			$params = isset( $eventcodes_params[ $ecode ] ) ? $ev->getParams() : NULL;
			//check if current event can be merged to previous
			if (	$singleevent != NULL &&
					isset( $eventcodes_add[ $ecode ] ) &&
					$singleevent['SQL'] == $SQL )
			{
				$singleevent['time'] += $msecs;
				if ( $params !== NULL ) $singleevent['params'] = $params;
				if ( $ecode == Doctrine_Event::STMT_FETCH ) ++$singleevent['fetched'];
				if ( $ecode == Doctrine_Event::STMT_FETCHALL ) $singleevent['fetched'] = 'all';
				continue;									//event merged
			}
			//no more merging, store the previous result into $queries
			if ( $singleevent !== NULL ) $queries[] = $singleevent;
			//prepare new temporary query from current event
			$singleevent = array();
			$singleevent['time'] = $msecs;
			$singleevent['SQL'] = $SQL;
			$singleevent['params'] = $params;
			$singleevent['fetched'] = '';
			$invoker = $ev->getInvoker();
			$singleevent['conn'] = ( $invoker instanceof Doctrine_Connection ) ? $invoker->getName() : '';
		}
		if ( $singleevent !== NULL ) $queries[] = $singleevent;		//store any remaining temporary query
		unset( $singleevent );

		//create panel HTML from the prepared $queries variable
		$content = "
<h1>Queries: " . count($queries) . ($totalTime === NULL ? '' : ', time: ' . sprintf('%.3f', $totalTime) . ' ms') . "</h1>

<style>
	#nette-debug-DoctrineNetteDebugPanel td.doc1-sql { background: white }
	#nette-debug-DoctrineNetteDebugPanel .nette-alt td.doc1-sql { background: #F5F5F5 }
	#nette-debug-DoctrineNetteDebugPanel .doc1-sql div { display: none; margin-top: 10px; max-height: 150px; overflow:auto }
</style>

<div class='nette-inner'>
<table>
<tr>
	<th>T (ms)</th><th>Event or SQL statement</th><th title='Number of fetch events'>Fetch</th><th>Connection</th>
</tr>
";
		$i = 0; $classes = array('class="nette-alt"', '');
		foreach ($queries as $event) {
			//** filter event description (query)
			$evtxt = $event['SQL'];
			//de-alias columns
			$evtxt = preg_replace( '/(`.*?`)\s+AS\s+`(\w+)`/', '<span title="$2">$1</span>', $evtxt );
			//de-quote column names and highlight them
			$evtxt = preg_replace( '/`(\w+)`/', '<span style="color:darkred;">$1</span>', $evtxt );
			//inject parameter values
			if ( $event['params'] !== NULL ) {
				foreach( $event['params'] as $p ) {
					$qmarkpos = strpos( $evtxt, '?' );
					if ( $qmarkpos === false ) break;
					$evtxt = substr_replace( $evtxt, "<span style='color:blue;'>'$p'</span>", $qmarkpos, 1 );
				}
			}
			//** output all data
			$content .= "
<tr {$classes[($i=1-$i)]}>
	<td>" . sprintf('%.3f', $event['time']) . "</td>
	<td class='doc1-sql'>" . $evtxt . "
	</td>
	<td>" . $event['fetched'] . "</td>
	<td>" . $event['conn'] . "</td>
</tr>
";
		}
		$content .= '</table></div>';
		return $content;
	}

	/**
	 * Returns panel ID.
	 * @return string
	 */
	function getId()
	{
		return get_class($this);
	}
}