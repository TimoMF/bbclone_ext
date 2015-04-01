<?php
/**
*
* @package phpBB Extension - TimoMF bbclone_ext
* @copyright (c) 2014 TimoMF
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace timomf\bbclone_ext\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
/**
* Event listener
*/
class listener implements EventSubscriberInterface
{
	static public function getSubscribedEvents()
    {
        return array(
			'core.page_header_after'  			=> 'bbclone',
			'core.permissions'					=> 'add_permission',
			'core.user_setup'					=> 'load_language_on_setup'
        );
	}

	public function __construct(\phpbb\config\config $config, \phpbb\template\template $template, \phpbb\request\request $request, \phpbb\user $user, \phpbb\auth\auth $auth)
	{
		$this->template = $template;
		$this->config	= $config;
		$this->request	= $request;
		$this->user		= $user;
		$this->auth     = $auth;
	}	
	
	function bbclone_include($label_for_bbclone)
	{
		global $BBC_MAINSITE, $BBC_SHOW_CONFIG, $BBC_TITLEBAR, $BBC_LANGUAGE, $BBC_MAXTIME, $BBC_MAXVISIBLE,
			$BBC_MAXBROWSER, $BBC_MAXEXTENSION, $BBC_MAXOS, $BBC_MAXROBOT, $BBC_MAXHOST, $BBC_MAXKEY, $BBC_MAXORIGIN, $BBC_MAXPAGE,
			$BBC_DETAILED_STAT_FIELDS, $BBC_USE_LOCK, $BBC_TIME_OFFSET, $BBC_NO_DNS, $BBC_GEOIP_PATH, $BBC_EXT_LOOKUP,
			$BBC_NO_HITS, $BBC_IGNORE_IP, $BBC_IGNORE_REFER, $BBC_HITS, $BBC_DEBUG, $BBC_CUSTOM_CHARSET, $BBC_CSS_FILE, $BBC_LOADTIME,
			$BBC_WHOIS, $BBC_IGNORE_BOTS, $BBC_IGNORE_AGENT, $BBC_USE_ORIGINAL_URI, $BBC_MAX_PAGENAME;
		$this->request->enable_super_globals();	
		define("_BBC_PAGE_NAME", $label_for_bbclone);
		define("_BBCLONE_DIR", ($this->config['bbclone_dir']));
		define("COUNTER", _BBCLONE_DIR."mark_page.php");
		if (is_readable(COUNTER)) include_once(COUNTER);
		$this->request->disable_super_globals();
	}
	
	function bbclone_run($event)
	{
		$label_for_bbclone = '';
		$bbclone_SCRIPT_NAME_new = $this->request->server('SCRIPT_NAME');
		$bbclone_SCRIPT_NAME_new_pos = strpos($bbclone_SCRIPT_NAME_new,'/');
		while ($bbclone_SCRIPT_NAME_new_pos !== FALSE){
			$bbclone_SCRIPT_NAME_new = substr($bbclone_SCRIPT_NAME_new, ($bbclone_SCRIPT_NAME_new_pos+1));
			$bbclone_SCRIPT_NAME_new_pos = strpos($bbclone_SCRIPT_NAME_new,'/');
		}
		$bbclone_SCRIPT_NAME_new = preg_replace('/\.php$/', '', $bbclone_SCRIPT_NAME_new);
		if ($bbclone_SCRIPT_NAME_new == "viewtopic")
		{
			$label_for_bbclone = 'Forum topic: '.$event['page_title'];
		}
		else if ($bbclone_SCRIPT_NAME_new == "viewforum")
		{
			$label_for_bbclone = 'Forum: '.$event['page_title'];
		}
		else if ($bbclone_SCRIPT_NAME_new == "index")
		{
			$label_for_bbclone = 'Forums List';
		}
		else if ($this->config['bbclone_detail'] == 1 & $bbclone_SCRIPT_NAME_new != "ucp")
		{
			$label_for_bbclone = $event['page_title'];
		}
		if ($label_for_bbclone != '')
		{
		$this->bbclone_include($label_for_bbclone);
		}
	}
	
	function bbclone_view()
	{
		$this->template->assign_vars(
			array(
				'S_BBClone'    => $this->auth->acl_get('u_bbclone_view'),
			)
		);

		if ($this->auth->acl_get('u_bbclone_view'))
		{
			if (strpos($this->request->server('REQUEST_URI'), "app.php") !== FALSE)
			{
				$this->template->assign_vars(
					array(
						'U_BBCLONE'    => ('../'.$this->config['bbclone_dir'].'index.php'),
					)
				);
			}
			else
			{
				$this->template->assign_vars(
					array(
						'U_BBCLONE'    => ($this->config['bbclone_dir'].'index.php'),
					)
				);
			};
		};
	}

	public function bbclone($event)
	{
		$this->bbclone_run($event);
		$this->bbclone_view();
	}
	
	public function add_permission($event)
	{
		$permissions = $event['permissions'];
		$permissions['u_bbclone_view'] = array('lang' => 'ACL_U_BBCLONE_VIEW', 'cat' => 'misc');
		$event['permissions'] = $permissions;
	}
	
	public function load_language_on_setup($event)
	{
		$lang_set_ext = $event['lang_set_ext'];
		$lang_set_ext[] = array(
			'ext_name' => 'timomf/bbclone_ext',
			'lang_set' => 'common',
		);
		$event['lang_set_ext'] = $lang_set_ext;
	}

}