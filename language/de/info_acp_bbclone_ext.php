<?php
/**
*
* @package phpBB Extension - TimoMF bbclone_ext
* @copyright (c) 2014 TimoMF
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/
/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}
if (empty($lang) || !is_array($lang))
{
	$lang = array();
}
// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
$lang = array_merge($lang, array(
	'ACL_U_BBCLONE_VIEW'		=> 'BBClone-Link im Kopf anzeigen',
	'BBCLONE_EXT'				=> 'BBClone einbinden',
	'BBCLONE_EXT_EXPLAIN'		=> 'Hier kannst du die Optionen für BBClone eintragen.',
	'BBCLONE_EXT_MANAGE'		=> 'BBClone verwalten',
	'BBCLONE_DETAIL'			=> 'BBClone Details aktivieren',
	'BBCLONE_DETAIL_EXPLAIN'	=> 'Aktiviert: Es werden alle Seiten ausser die ACP und die UCP in BBClone protokolliert. <br /> Deaktiviert: Es werden nur die \'index.php\', \'viewforum.php\' und \'viewtopic.php\' protokolliert.',
	'BBCLONE_DIR'				=> 'Pfad zum BBClone Verzeichnis',
	'BBCLONE_DIR_EXPLAIN'		=> 'Wenn BBClone im selben Verzeichnis wie phpBB ist, dann bitte wie folgt eintragen \'./bbclone/\'<br />Falls BBClone in der Verzeichnisstruktur z.B. eine Ebene h&ouml;her liegt, dann lautet der Eintrag \'../bbclone/\'',
	'BBCLONE_DIR_OPTIONS'		=> 'BBClone Extensions Einstellungen',
));
