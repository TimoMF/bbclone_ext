<?php
/**
*
* @package phpBB Extension - TimoMF bbclone_ext
* @copyright (c) 2014 TimoMF
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace timomf\bbclone_ext\migrations;

class version_0_2_1 extends \phpbb\db\migration\migration
{
	public function update_data()
	{
		return array(
			array('config.add', array('bbclone_dir', '../bbclone/')),
			array('config.add', array('bbclone_ext', '0.2.1')),

			// Add the ACP module
			array('module.add', array('acp', 'ACP_CAT_DOT_MODS', 'BBCLONE_EXT')),

			array('module.add', array(
				'acp', 'BBCLONE_EXT', array(
					'module_basename'	=> '\timomf\bbclone_ext\acp\bbclone_ext_module',
					'modes'				=> array('manage'),
				),
			)),
		);
	}
}
