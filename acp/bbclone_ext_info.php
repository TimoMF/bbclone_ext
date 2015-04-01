<?php
/**
*
* @package phpBB Extension - TimoMF bbclone_ext
* @copyright (c) 2014 TimoMF
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace timomf\bbclone_ext\acp;

class bbclone_ext_info
{
	function module()
	{
		return array(
			'filename'	=> '\timomf\bbclone_ext\acp\bbclone_ext_module',
			'title'		=> 'BBClone_EXT',
			'modes'		=> array(
				'manage'	=> array(
					'title' => 'BBClone_EXT',
					'auth' => 'ext_timomf/bbclone_ext && acl_a_board',
					'cat' => array('bbclone_ext')),
			),
		);
	}
}
