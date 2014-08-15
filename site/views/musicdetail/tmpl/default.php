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

?>
<div id="multimidias-content">
	<p><strong>Title</strong>: <?php echo $this->item->title; ?></p>
	<p><strong>Description</strong>: <?php echo $this->item->description; ?></p>
	<p><strong>Author</strong>: <?php echo $this->item->author; ?></p>
	<p><strong>Compositor</strong>: <?php echo $this->item->compositor; ?></p>
	<p><strong>Year</strong>: <?php echo $this->item->year; ?></p>
	<p><strong>File</strong>: <?php echo $this->item->file; ?></p>
	<p><strong>Link</strong>: <?php echo $this->item->link; ?></p>
	<?php if($this->item->thumbnail){ ?>
		<p><strong>Thumbnail</strong>: <img src="images/com_multimidias/<?php echo $this->item->thumbnail; ?>" /></p>
	<?php } ?>
	<p><strong>Category</strong>: <?php echo $this->item->category; ?></p>
</div>