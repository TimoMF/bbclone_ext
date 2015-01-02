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
			'core.viewtopic_modify_page_title'			=> 'bbclone_viewtopic',
/**         'core.viewforum_modify_topicrow'            => 'bbclone_viewforum',*/
			'core.index_modify_page_title'				=> 'bbclone_index'
        );
    }
	
   public function __construct(\phpbb\request\request $request)
	{
		$this->request = $request;
	}
	
	public function bbclone_viewtopic($event)
	{
		$this->request->enable_super_globals();
		$label_for_bbclone = 'Forum topic: '.$event['topic_data']['topic_title'];
		define("_BBC_PAGE_NAME", $label_for_bbclone);
		define("_BBCLONE_DIR", "./bbclone/");
		define("COUNTER", _BBCLONE_DIR."mark_page.php");
		if (is_readable(COUNTER)) include_once(COUNTER);
		$this->request->disable_super_globals();
	}
	
/**	
	public function bbclone_viewforum($event)
	{
		$label_for_bbclone = 'Forum: '.$event['topic_row']['FORUM_NAME'];
		define("_BBC_PAGE_NAME", $label_for_bbclone);
		define("_BBCLONE_DIR", "../bbclone/");
		define("COUNTER", _BBCLONE_DIR."mark_page.php");
		if (is_readable(COUNTER)) include_once(COUNTER);
	}
*/
	
	public function bbclone_index($event)
	{
		$this->request->enable_super_globals();
		define("_BBC_PAGE_NAME", 'Forums List');
		define("_BBCLONE_DIR", "./bbclone/");
		define("COUNTER", _BBCLONE_DIR."mark_page.php");
		if (is_readable(COUNTER)) include_once(COUNTER);
		$this->request->disable_super_globals();
	}

}
