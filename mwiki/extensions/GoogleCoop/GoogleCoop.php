<?php
# Google Custom Search Engine Extension Based on Liang Chen's original
#
# Tag :
#   <Googlecoop></Googlecoop> or <Googlecoop/>
# Ex :
#   Add this tag to the wiki page you configed at your Google co-op control panel.
#
# Enjoy !

$wgExtensionCredits['parserhook'][] = array(
	'path' => __FILE__,	
	'name' => 'Google Co-op Extensions',
	'description' => 'Using Google Co-op',
	'author' => 'Liang Chen and Terry Ellison',
	'url' => '/wiki/Google_search'
	);

$wgExtensionFunctions[] = 'GoogleCoop';

function GoogleCoop() {
	global $wgParser;
	$wgParser->setHook( 'googlefaq',  'renderGoogleFaq' );
	$wgParser->setHook( 'Googlecoop', 'renderGoogleCoop');
	$wgParser->setHook( 'google',     'renderGoogle' );
	$wgParser->setHook( 'googleRU',   'renderGoogleRU' );
}

# The callback function for converting the input text to HTML output
function renderGoogleCoop($input) {
	return implode( "\n", array (
		'<div id="cse-search-results"></div>', 
		'<script type="text/javascript">', 
		'var googleSearchIframeName = "cse-search-results";', 
		'var googleSearchFormName = "cse-search-box";', 
		'var googleSearchFrameWidth = 600;', 
		'var googleSearchDomain = "www.google.com";', 
		'var googleSearchPath = "/cse";</script>', 
		'<script type="text/javascript" src="https://www.google.com/afsonline/show_afs_search.js"></script>', 
		) );
}
/*
$output='<form action="YOURURL" id="cse-search-box">
<input type="hidden" name="cx" value="YOURKEY" />
<input type="hidden" name="cof" value="FORID:10" />
<input type="hidden" name="ie" value="UTF-8" />
<input type="text" name="q" size="31" />
<input type="submit" name="sa" value="Search" />
</form>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">google.load("elements", "1", {packages: "transliteration"});</script>
<script type="text/javascript" src="https://www.google.com/*** /t13n?form=cse-search-box&t13n_langs=fr"></script>
<script type="text/javascript" src="https://www.google.com/*** /brand?form=cse-search-box&lang=fr"></script>
*/

# The callback function for converting the input text to HTML output
function renderGoogleFaq( $input ) { 
	return getGoogleSearchForm( '/Documentation/FAQ/GoogleSearch', '012451685560999373550:38goifyftsg', 'Search' );
}

function renderGoogle( $input ) {
	return getGoogleSearchForm( 'Documentation/GoogleSearch', '012451685560999373550:ejwg-g5sd1k', 'Search' );
}

function renderGoogleRU( $input ) {
	return getGoogleSearchForm( 'RU/GoogleSearch', '012451685560999373550:mwuatqsviug', 'Поиск в Энциклопедии' );
}

function getGoogleSearchForm( $wikiPage, $cx, $searchText  ) {
	 return implode( "\n", array ( 
		'<!-- Search Google -->', 
		'<form action="/wiki/' . $wikiPage . '" id="cse-search-results"><div>', 
		'<input type="hidden" name="cx" value="'. $cx . '" />', 
		'<input type="hidden" name="cof" value="FORID:9" />', 
		'<input type="text" name="q" size="25" />', 
		'<input type="submit" name="sa" value="' . $searchText . '" />', 
		'</div></form>', 
		'<script type="text/javascript" src="https://www.google.com/coop/cse/brand?form=cse-search-box&lang=en"></script>', 
		'<!-- Search Google -->', 
		) ) ;
}
