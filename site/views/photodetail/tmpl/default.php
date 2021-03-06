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
	<p><strong>Author / Copyright</strong>: <?php echo $this->item->authorcopyright; ?></p>
	<?php if($this->item->file){ ?>
		<p><strong>File</strong>: <img src="images/com_multimidias/<?php echo $this->item->file; ?>" /></p>
	<?php } ?>
	<p><strong>Link</strong>: <?php echo $this->item->link; ?></p>
	<p><strong>Thumbnail</strong>: <?php echo $this->item->thumbnail; ?></p>
	<p><strong>Category</strong>: <?php echo $this->item->category; ?></p>
</div>