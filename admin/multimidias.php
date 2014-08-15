<?php
/*------------------------------------------------------------------------
# multimidias.php - multimidias Component
# ------------------------------------------------------------------------
# author    Ponto Mega
# copyright Copyright (C) 2013. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   pontomega.com.br
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// Added for Joomla 3.0
if(!defined('DS')){
	define('DS',DIRECTORY_SEPARATOR);
};

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_multimidias')){
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
};

// Load cms libraries
JLoader::registerPrefix('J', JPATH_PLATFORM . '/cms');
// Load joomla libraries without overwrite
JLoader::registerPrefix('J', JPATH_PLATFORM . '/joomla',false);

// require helper files
JLoader::register('MultimidiasHelper', dirname(__FILE__) . DS . 'helpers' . DS . 'multimidias.php');

// import joomla controller library
jimport('joomla.application.component.controller');

// Add CSS file for all pages
$document = JFactory::getDocument();
$document->addStyleSheet('components/com_multimidias/assets/css/multimidias.css');
$document->addScript('components/com_multimidias/assets/js/multimidias.js');

// Get an instance of the controller prefixed by Multimidias
$controller = JControllerLegacy::getInstance('Multimidias');

// Perform the Request task
$controller->execute(JFactory::getApplication()->input->get('task'));

// Redirect if set by the controller
$controller->redirect();

?>