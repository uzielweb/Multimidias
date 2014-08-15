<?php
/*------------------------------------------------------------------------
# view.html.php - multimidias Component
# ------------------------------------------------------------------------
# author    Ponto Mega
# copyright Copyright (C) 2013. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   pontomega.com.br
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');

/**
 * HTML Video Detail View class for the Multimidias Component
 */
class MultimidiasViewvideodetail extends JViewLegacy
{
	// Overwriting JViewLegacy display method
	function display($tpl = null)
	{
		// Assign data to the view
		$this->item = $this->get('Item');
		$db = JFactory::getDBO();
		$this->item->description = $db->setQuery('SELECT #__categories.title FROM #__categories WHERE #__categories.id = "'.$this->item->description.'"')->loadResult();

		// Check for errors.
		if (count($errors = $this->get('Errors'))){
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		};

		// Display the view
		parent::display($tpl);
	}
}
?>