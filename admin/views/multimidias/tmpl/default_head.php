<?php
/*------------------------------------------------------------------------
# default_head.php - multimidias Component
# ------------------------------------------------------------------------
# author    Ponto Mega
# copyright Copyright (C) 2013. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   pontomega.com.br
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

?>
<tr>
	<th width="5">
		<?php echo JText::_('ID'); ?>
	</th>
	<th width="20">
		<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($this->items); ?>);" />
	</th>
	<th>
		<?php echo JText::_('Title'); ?>
	</th>
	<th>
		<?php echo JText::_('Description'); ?>
	</th>
	<th>
		<?php echo JText::_('Author / Copyright'); ?>
	</th>
	<th>
		<?php echo JText::_('File'); ?>
	</th>
	<th>
		<?php echo JText::_('Link'); ?>
	</th>
	<th>
		<?php echo JText::_('Thumbnail'); ?>
	</th>
	<th>
		<?php echo JText::_('Category'); ?>
	</th>
</tr>