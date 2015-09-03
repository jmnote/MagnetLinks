<?php
/*
 * This file contains the main include file for the MagnetLinks extension of 
 * MediaWiki. This code is released under the GNU General Public License.
 *
 * @author Jmkim dot com
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @package MediaWikiExtensions
 * @version 0.1
 */
$wgExtensionFunctions[] = 'MagnetLinksExtension';
 
function MagnetLinksExtension() {
	global $wgParser;
	$wgParser->setHook('magnet', 'render_MagnetLink');
}
 
function render_MagnetLink($input, $argv) {
	$pos = strpos($input, ' ');
	if($pos === false) {
		$uri = htmlentities(trim($input));
		$linktext = $uri;
	} else {
		$uri = htmlentities(trim(substr($input, 0, $pos)));
		$linktext = htmlentities(trim(substr($input, $pos)), ENT_COMPAT, 'UTF-8');
	}
	$icon_img = 'http://upload.wikimedia.org/wikipedia/commons/c/c2/Magnet-icon.gif';
	$link_color = '#0088a4';
	return "<img src=\"$icon_img\"/> <a style=\"color:$link_color\" href=\"$uri\">$linktext</a>";
}
 
$wgExtensionCredits['parserhook'][] = array(
	'name' => 'MagnetLinks',
	'author' => 'Jmkim dot com',
	'description' => 'render links to magnet URI between &lt;magnet&gt; and &lt;/magnet&gt;',
	'url' => 'http://www.mediawiki.org/wiki/Extension:MagnetLinks',
	'version' => '0.1.0');
?>