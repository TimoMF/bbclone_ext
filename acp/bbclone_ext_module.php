<?php
/**
*
* @package phpBB Extension - TimoMF bbclone_ext
* @copyright (c) 2014 TimoMF
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace timomf\bbclone_ext\acp;

class bbclone_ext_module
{
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\request\request */
	protected $request;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	public $u_action;

	function main($id, $mode)
	{
		global $user, $template, $request, $config, $phpbb_log;

		$this->config	= $config;
		$this->request	= $request;
		$this->template	= $template;
		$this->user		= $user;

		$this->tpl_name		= 'bbclone_ext_manage';
		$this->page_title	= $user->lang('BBClone_EXT');
		$form_key			= 'bbclone_ext';
		add_form_key($form_key);

		if ($this->request->is_set_post('submit'))
		{
			if (!check_form_key($form_key))
			{
				trigger_error($this->user->lang('FORM_INVALID') . adm_back_link($this->u_action), E_USER_WARNING);
			}

			$this->config->set('bbclone_dir', $this->request->variable('bbclone_dir', ''));
			$this->config->set('bbclone_detail', $this->request->variable('bbclone_detail', 0));

			$phpbb_log->add('admin', $this->user->data['user_id'], $this->user->ip, 'bbclone_ext_LOG');
			trigger_error($user->lang['CONFIG_UPDATED'] . adm_back_link($this->u_action));
		}

		$this->template->assign_vars(array(
			'bbclone_dir'		=> isset($this->config['bbclone_dir']) ? $this->config['bbclone_dir'] : '',
			'bbclone_detail'	=> isset($this->config['bbclone_detail']) ? $this->config['bbclone_detail'] : '',
			'U_ACTION'			=> $this->u_action,
		));

	}
}
