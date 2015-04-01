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
	'ACL_U_BBCLONE_VIEW'		=> 'Show bbclone link in the header',
	'BBCLONE_EXT'				=> 'BBClone integrate',
	'BBCLONE_EXT_EXPLAIN'		=> 'Here you can add options for BBClone.',
	'BBCLONE_EXT_MANAGE'		=> 'BBClone manage',
	'BBCLONE_DETAIL'			=> 'Activate BBClone details',
	'BBCLONE_DETAIL_EXPLAIN'	=> 'All pages are activated logged out of the ACP and the UCP in bbclone.<br />Be disabled only the \'index.php\', \' viewforum.php\' and \'viewtopic.php\' logged.',
	'BBCLONE_DIR'				=> 'Path to BBClone directory.',
	'BBCLONE_DIR_EXPLAIN'		=> 'If BBClone is in the same directory as phpBB then please add as following \'./bbclone/\' <br />If bbclone would be a directory higher in the directory structure then please add as following  \'../bbclone/\'',
	'BBCLONE_DIR_OPTIONS'		=> 'BBClone extensions settings',
));
