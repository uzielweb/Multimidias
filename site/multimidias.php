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

// Set the component css/js
$document = JFactory::getDocument();
$document->addStyleSheet('components/com_multimidias/assets/css/multimidias.css');

// Require helper file
JLoader::register('MultimidiasHelper', dirname(__FILE__) . DS . 'helpers' . DS . 'multimidias.php');

// import joomla controller library
jimport('joomla.application.component.controller');

// Get an instance of the controller prefixed by Multimidias
$controller = JControllerLegacy::getInstance('Multimidias');

// Perform the request task
$controller->execute(JRequest::getCmd('task'));

// Redirect if set by the controller
$controller->redirect();
?>