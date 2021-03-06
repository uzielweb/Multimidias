<?php
/*------------------------------------------------------------------------
# default.php - multimidias Component
# ------------------------------------------------------------------------
# author    Ponto Mega
# copyright Copyright (C) 2013. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   pontomega.com.br
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// Connect to database
$db = JFactory::getDBO();
jimport('joomla.filter.output');
?>
<div id="multimidias-musics">
	<?php foreach($this->items as $item){ ?>
		<?php
		$item->description = $db->setQuery('SELECT #__categories.title FROM #__categories WHERE #__categories.id = "'.$item->description.'"')->loadResult();
		if(empty($item->alias)){
			$item->alias = $item->title;
		};
		$item->alias = JFilterOutput::stringURLSafe($item->alias);
		$item->linkURL = JRoute::_('index.php?option=com_multimidias&view=musicdetail&id='.$item->id.':'.$item->alias);
		?>
		<p><strong>Title</strong>: <a href="<?php echo $item->linkURL; ?>"><?php echo $item->title; ?></a></p>
		<p><strong>Description</strong>: <?php echo $item->description; ?></p>
		<p><strong>Author</strong>: <?php echo $item->author; ?></p>
		<p><strong>Compositor</strong>: <?php echo $item->compositor; ?></p>
		<p><strong>Year</strong>: <?php echo $item->year; ?></p>
		<p><strong>File</strong>: <?php echo $item->file; ?></p>
		<p><strong>Link</strong>: <?php echo $item->link; ?></p>
		<?php if($item->thumbnail){ ?>
			<p><strong>Thumbnail</strong>: <img src="images/com_multimidias/thumb/<?php echo $item->thumbnail; ?>" /></p>
		<?php } ?>
		<p><strong>Category</strong>: <?php echo $item->category; ?></p>
		<p><strong>Link URL</strong>: <a href="<?php echo $item->linkURL; ?>">Go to page</a> - <?php echo $item->linkURL; ?></p>
		<br /><br />
	<?php }; ?>
</div>
