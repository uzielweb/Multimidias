<?php
/*------------------------------------------------------------------------
# musicdetail.php - multimidias Component
# ------------------------------------------------------------------------
# author    Ponto Mega
# copyright Copyright (C) 2013. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   pontomega.com.br
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controllerform library
jimport('joomla.application.component.controllerform');

/**
 * Musics Controller Music Detail
 */
class MultimidiasControllermusicdetail extends JControllerForm
{
	public function __construct($config = array())
	{
		$this->view_list = 'musics'; // safeguard for setting the return view listing to the main view.
		parent::__construct($config);
	}

	/**
	 * Function that allows child controller access to model data
	 * after the data has been saved.
	 * 
	 * @param   JModel  &$model     The data model object.
	 * @param   array   $validData  The validated data.
	 * 
	 * @return  void
	 * 
	 * @since   11.1
	 */
	protected function postSaveHook(JModelLegacy &$model, $validData = array())
	{
		// Get a handle to the Joomla! application object
		$application = JFactory::getApplication();

		$date = date('Y-m-d H:i:s');
		if($validData['date_created'] == '0000-00-00 00:00:00'){
			$data['date_created'] = $date;
		}
		$data['date_modified'] = $date;

		$user = JFactory::getUser();
		if($validData['user_created'] == 0){
			$data['user_created'] = $user->id;
		}
		$data['user_modified'] = $user->id;

		// Delete Image Checked
		if(array_key_exists('thumbnail_delete', $_POST)){
			$data['thumbnail'] = ''; // set image to nothing in database
			// Delete Image Entirely Check
			$db = JFactory::getDBO();
			$query = $db->getQuery(true)->select('thumbnail')->from('#__multimidias_musicdetail')->where('id="' . $validData['id'] . '"');
			$db->setQuery((string)$query);
			$thumbnail = $db->loadResult();
			if($thumbnail){
				$query = $db->getQuery(true)->select('CASE WHEN COUNT(*) > 0 THEN 1 ELSE 0 END')->from('#__multimidias_musicdetail')->where('thumbnail="' . $thumbnail . '" AND id!="' . $validData['id'] . '"');
				$db->setQuery((string)$query);
				$using = $db->loadResult();
				if($using == 0){ // free to delete
					// Include file system helpers
					jimport('joomla.filesystem.file');
					jimport('joomla.filesystem.folder');
					$full_image = JPATH_SITE . DS . 'images' . DS . 'com_multimidias' . DS . $thumbnail;
					$thum_image = JPATH_SITE . DS . 'images' . DS . 'com_multimidias' . DS . 'thumb' . DS . $thumbnail;
					JFile::delete($thum_image);
					if(JFile::delete($full_image)){
						// Add a message to the message queue
						$application->enqueueMessage('Image has been deleted!', 'notice');
					} else {
						// Add a message to the message queue
						$application->enqueueMessage('Image could not be deleted, but was removed from this item.', 'error');
					}
				} else {
					// Add a message to the message queue
					$application->enqueueMessage('Image has been removed from this item, but can not be deleted because it is being used elsewhere.', 'notice');
				}
			}
		}

		// Upload Image
		$file = JRequest::getVar('jform', array(), 'files', 'array');
		if($file['name']['thumbnail']){
			$info = MultimidiasHelper::imageUpload($file, $data, 'thumbnail');
			if($info['error'] == 0){
				$data['thumbnail'] = $info['thumbnail'];
			} else {
				// Add a message to the message queue
				$application->enqueueMessage($info['msg'], 'error');
			}
		}

		$model->save($data);

	}

}
?>