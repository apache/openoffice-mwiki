<?php
/**
 * Apache Open Office skin
 *
 */

if( !defined( 'MEDIAWIKI' ) ) 
  die( "cannot be run standalone." );

#$wgExtensionCredits['skin'][] = array(
#	'path' => __FILE__,
#	'name' => 'Aoo',
#	'url' => "https://www.mediawiki.org/wiki/Skin:jan",
#	'author' => array( 'jan Iversen' ),
#	'descriptionmsg' => 'aoo-desc',
#);

$wgValidSkinNames['aoo'] = 'Aoo';
$wgAutoloadClasses['SkinAoo'] = dirname(__FILE__).'/Aoo.php';

$wgResourceModules['skins.aoo'] = array(
	'styles' => array(
		'common/commonElements.css' => array( 'media' => 'screen' ),
		'common/commonContent.css' => array( 'media' => 'screen' ),
		'common/commonInterface.css' => array( 'media' => 'screen' ),
		'aoo/main.css' => array( 'media' => 'screen' ),
	),
	'remoteBasePath' => &$GLOBALS['wgStylePath'],
	'localBasePath' => &$GLOBALS['wgStyleDirectory'],
);
