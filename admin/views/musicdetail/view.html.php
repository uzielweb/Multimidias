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
 * Music Detail View
 */
class MultimidiasViewmusicdetail extends JViewLegacy
{
	/**
	 * display method of Music Detail view
	 * @return void
	 */
	public function display($tpl = null)
	{
		// get the Data
		$form = $this->get('Form');
		$item = $this->get('Item');
		$script = $this->get('Script');

		// Check for errors.
		if (count($errors = $this->get('Errors'))){
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		};

		// Assign the variables
		$this->form = $form;
		$this->item = $item;
		$this->script = $script;

		// Set the toolbar
		$this->addToolBar();

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
		JFactory::getApplication()->input->set('hidemainmenu', true);
		$user = JFactory::getUser();
		$userId	= $user->id;
		$isNew = $this->item->id == 0;
		$canDo = MultimidiasHelper::getActions($this->item->id);
		JToolBarHelper::title($isNew ? JText::_('Music Detail :: New') : JText::_('Music Detail :: Edit'), 'musicdetail');
		// Built the actions for new and existing records.
		if ($isNew){
			// For new records, check the create permission.
			if ($canDo->get('core.create')){
				JToolBarHelper::apply('musicdetail.apply', 'JTOOLBAR_APPLY');
				JToolBarHelper::save('musicdetail.save', 'JTOOLBAR_SAVE');
				JToolBarHelper::custom('musicdetail.save2new', 'save-new.png', 'save-new_f2.png', 'JTOOLBAR_SAVE_AND_NEW', false);
			};
			JToolBarHelper::cancel('musicdetail.cancel', 'JTOOLBAR_CANCEL');
		} else {
			if ($canDo->get('core.edit')){
				// We can save the new record
				JToolBarHelper::apply('musicdetail.apply', 'JTOOLBAR_APPLY');
				JToolBarHelper::save('musicdetail.save', 'JTOOLBAR_SAVE');
				// We can save this record, but check the create permission to see
				// if we can return to make a new one.
				if ($canDo->get('core.create')){
					JToolBarHelper::custom('musicdetail.save2new', 'save-new.png', 'save-new_f2.png', 'JTOOLBAR_SAVE_AND_NEW', false);
				};
			};
			if ($canDo->get('core.create')){
				JToolBarHelper::custom('musicdetail.save2copy', 'save-copy.png', 'save-copy_f2.png', 'JTOOLBAR_SAVE_AS_COPY', false);
			};
			JToolBarHelper::cancel('musicdetail.cancel', 'JTOOLBAR_CLOSE');
		};
	}

	/**
	 * Method to set up the document properties
	 *
	 * @return void
	 */
	protected function setDocument()
	{
		$isNew = ($this->item->id < 1);
		$document = JFactory::getDocument();
		$document->setTitle($isNew ? JText::_('Music Detail :: New :: Administrator') : JText::_('Music Detail :: Edit :: Administrator'));
		$document->addScript(JURI::root() . $this->script);
		$document->addScript(JURI::root() . "administrator/components/com_multimidias/views/musicdetail/submitbutton.js");
		JText::script('musicdetail not acceptable. Error');
	}
}
?>