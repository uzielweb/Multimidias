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
 * Documents View
 */
class MultimidiasViewdocuments extends JViewLegacy
{
	/**
	 * Documents view display method
	 * @return void
	 */
	function display($tpl = null) 
	{
		// Include helper submenu
		MultimidiasHelper::addSubmenu('documents');

		// Get data from the model
		$items = $this->get('Items');
		$pagination = $this->get('Pagination');

		// Check for errors.
		if (count($errors = $this->get('Errors'))){
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		};

		// Assign data to the view
		$this->items = $items;
		$this->pagination = $pagination;

		// Set the toolbar
		$this->addToolBar();
		// Show sidebar
		$this->sidebar = JHtmlSidebar::render();

		// Display the template
		parent::display($tpl);

		// Set the document
		$this->setDocument();
	}

	/**
	 * Setting the toolbar
	 */
	protected function addToolBar() 
	{
		$canDo = MultimidiasHelper::getActions();
		JToolBarHelper::title(JText::_('Multimidias Manager'), 'multimidias');
		if($canDo->get('core.create')){
			JToolBarHelper::addNew('document.add', 'JTOOLBAR_NEW');
		};
		if($canDo->get('core.edit')){
			JToolBarHelper::editList('document.edit', 'JTOOLBAR_EDIT');
		};
		if($canDo->get('core.delete')){
			JToolBarHelper::deleteList('', 'documents.delete', 'JTOOLBAR_DELETE');
		};
		if($canDo->get('core.admin')){
			JToolBarHelper::divider();
			JToolBarHelper::preferences('com_multimidias');
		};
	}

	/**
	 * Method to set up the document properties
	 *
	 *
	 * @return void
	 */
	protected function setDocument() 
	{
		$document = JFactory::getDocument();
		$document->setTitle(JText::_('Multimidias Manager - Administrator'));
	}
}
?>