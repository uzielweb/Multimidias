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
 * HTML Photos View class for the multimidias Component
 */
class MultimidiasViewphotos extends JViewLegacy
{
	// Overwriting JView display method
	function display($tpl = null)
	{
		// Assign data to the view
		$this->items = $this->get('Items');
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