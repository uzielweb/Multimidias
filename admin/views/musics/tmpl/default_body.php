<?php
/*------------------------------------------------------------------------
# default_body.php - multimidias Component
# ------------------------------------------------------------------------
# author    Ponto Mega
# copyright Copyright (C) 2013. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   pontomega.com.br
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

$edit = "index.php?option=com_multimidias&view=musics&task=musicdetail.edit";
$user = JFactory::getUser();
$userId = $user->get('id');

// Connect to database
$db = JFactory::getDBO();
?>
<?php foreach($this->items as $i => $item){
	$canCheckin	= $user->authorise('core.manage', 'com_checkin') || $item->checked_out == $userId || $item->checked_out == 0;
	$userChkOut	= JFactory::getUser($item->checked_out);
	$categoryTitle = $db->setQuery('SELECT #__categories.title FROM #__categories WHERE #__categories.id = "'.$item->description.'"')->loadResult();
	?>
	<tr class="row<?php echo $i % 2; ?>">
		<td>
			<?php echo $item->id; ?>
		</td>
		<td>
			<?php echo JHtml::_('grid.id', $i, $item->id); ?>
		</td>
		<td>
			<?php echo $item->title; ?> - (<a href="<?php echo $edit; ?>&id=<?php echo $item->id; ?>"><?php echo 'Edit'; ?></a>)
			<?php if ($item->checked_out){ ?>
				<?php echo JHtml::_('jgrid.checkedout', $i, $userChkOut->name, $item->checked_out_time, 'musics.', $canCheckin); ?>
			<?php } ?>
		</td>
		<td>
			<?php echo $item->description; ?>
		</td>
		<td>
			<?php echo $item->author; ?>
		</td>
		<td>
			<?php echo $item->compositor; ?>
		</td>
		<td>
			<?php echo $item->year; ?>
		</td>
		<td>
			<?php echo $item->file; ?>
		</td>
		<td>
			<?php echo $item->link; ?>
		</td>
		<td>
			<?php echo $item->thumbnail; ?>
		</td>
		<td>
			<a href="index.php?option=com_categories&task=category.edit&id=<?php echo $item->category; ?>&extension=com_multimidias"><?php echo $categoryTitle; ?></a>
		</td>
	</tr>
<?php } ?>