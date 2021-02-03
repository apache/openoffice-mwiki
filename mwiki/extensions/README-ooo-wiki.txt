Extensions are of four types:
* Core: they come with Mediawiki core and are updated with it
* Contrib, available through ExtensionDistributor [1]: updated manually when Mediawiki is updated
* Contrib, not available through ExtensionDistributor: not updated, stored in SVN for convenience
* Custom: GoogleCoop and OOoIDLtags, stored in SVN

[1] https://www.mediawiki.org/wiki/Special:ExtensionDistributor

== Using tags for syntax coloring: ==
mwiki uses Syntaxhighlight extension for coloring of source code.
In older versions (before MediaWiki 1.16), the extension used the tag <source>. 
This is still supported, but is deprecated. <syntaxhighlight> should be used instead.
