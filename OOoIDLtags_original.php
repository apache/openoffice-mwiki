<?php
/**
  * IDL Tag extension
  * The IDLTagExtension was written to manage the IDL links in the 
OpenOffice.org Developer's Guide.
  * The extension converts Java paths to links back to the online IDL 
documentation.
  * @version 1.0.2
  * @link http://wiki.openoffice.org/wiki/Wiki_maintenance/IDLTagExtension
  */

if ( !defined( 'MEDIAWIKI' ) ) {
     die( 'This file is a MediaWiki extension, it is not a valid entry 
point' );
}

// Extension credits that will show up on Special:Version
$wgExtensionCredits['parserhook'][] = array(
     'name' => 'IDL Tags',
     'version' => '1.0.2',
     'author' => array( 'Clayton Cornell', 'Terry Ellison' ),
     'description' => 'Manage the IDL links in the OOo Dev Guide ',
     'url' => 
'http://wiki.openoffice.org/wiki/Wiki_maintenance/IDLTagExtension',
);

global $wgExtIDLtags;
$wgExtIDLtags           = new RenderIDLtags;
$wgExtensionFunctions[] = array( &$wgExtIDLtags, 'oooIDLTags' );

class RenderIDLtags {

     function oooIDLTags() {
         global $wgParser;
         $wgParser->setHook( 'idl', array( &$this, 'renderIDL' ) );
         $wgParser->setHook( 'idlm', array( &$this, 'renderIDLM' ) );
         $wgParser->setHook( 'idls', array( &$this, 'renderIDLS' ) );
         $wgParser->setHook( 'idlmodule', array( &$this, 
'renderIDLMODULE' ) );
         $wgParser->setHook( 'idltopic', array( &$this, 'renderIDLTOPIC' 
) );
     }

     function renderIDL( $input, $args, $parser ) {
         $parser->disableCache();
         $output = $parser->recursiveTagParse( $input );
         $output = '<a href="http://api.openoffice.org/docs/common/ref/' .
             str_replace ('.','/',$output).'.html" class="external 
text">'.$output.'</a>';
         return $output;
     }

     function renderIDLM( $input, $args, $parser ) {
         $parser->disableCache();
         $output = $parser->recursiveTagParse( $input );
         $page = ereg_replace ('\.','/',$output);
         $anchor = ereg_replace (':','.html#',$page);
         $function = ereg_replace ('^.*:','',$page);
         $output = '<a href="http://api.openoffice.org/docs/common/ref/' .
             $anchor.'" class="external text">'.$function.'</a>';
         return $output;
     }

     function renderIDLS( $input, $args, $parser ) {
         $parser->disableCache();
         $output = $parser->recursiveTagParse( $input );
         $function = ereg_replace ('^.*\.','',$output);
         $output = '<a href="http://api.openoffice.org/docs/common/ref/' .
             ereg_replace ('\.','/',$output).'.html" class="external 
text">'.$function.'</a>';
         return $output;
     }

     function renderIDLMODULE( $input, $args, $parser ) {
         $parser->disableCache();
         $output = $parser->recursiveTagParse( $input );
         $function = ereg_replace ('^.*\.','',$output);
         $output = '<a href="http://api.openoffice.org/docs/common/ref/' .
             ereg_replace ('\.','/',$output).'/module-ix.html" 
class="external text">'.$output.'</a>';
         return $output;
     }

     function renderIDLTOPIC( $input, $args, $parser ) {
         $parser->disableCache();
         return '';
     }
}