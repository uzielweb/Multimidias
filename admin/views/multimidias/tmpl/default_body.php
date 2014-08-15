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

$edit = "index.php?option=com_multimidias&view=multimidias&task=multimidia.edit";
$user = JFactory::getUser();
$userId = $user->get('id');
?>
<?php foreach($this->items as $i => $item){
	$canCheckin	= $user->authorise('core.manage', 'com_checkin') || $item->checked_out == $userId || $item->checked_out == 0;
	$userChkOut	= JFactory::getUser($item->checked_out);
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
				<?php echo JHtml::_('jgrid.checkedout', $i, $userChkOut->name, $item->checked_out_time, 'multimidias.', $canCheckin); ?>
			<?php } ?>
		</td>
		<td>
			<?php echo $item->description; ?>
		</td>
		<td>
			<?php echo $item->authorcopyright; ?>
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
			<?php echo $item->category; ?>
		</td>
	</tr>
<?php } ?>