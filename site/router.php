<?php
/*------------------------------------------------------------------------
# router.php - multimidias Component
# ------------------------------------------------------------------------
# author    Ponto Mega
# copyright Copyright (C) 2013. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   pontomega.com.br
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

function MultimidiasBuildRoute(&$query)
{
	$segments = array();

	if(isset($query['view'])){
		$segments[] = $query['view'];
		unset($query['view']);
	};

	if(isset($query['id'])){
		$segments[] = $query['id'];
		unset($query['id']);
	};

	return $segments;
}

function MultimidiasParseRoute($segments)
{
	$vars = array();
	// Count segments
	$count = count($segments);
	//Handle View and Identifier
	switch($segments[0])
	{
		case 'multimidias':
			$id = explode(':', $segments[$count-1]);
			$vars['id'] = (int) $id[0];
			$vars['view'] = 'multimidias';
			break;

		case 'multimidia':
			$id = explode(':', $segments[$count-1]);
			$vars['id'] = (int) $id[0];
			$vars['view'] = 'multimidia';
			break;
		case 'musics':
			$id = explode(':', $segments[$count-1]);
			$vars['id'] = (int) $id[0];
			$vars['view'] = 'musics';
			break;

		case 'musicdetail':
			$id = explode(':', $segments[$count-1]);
			$vars['id'] = (int) $id[0];
			$vars['view'] = 'musicdetail';
			break;
		case 'videos':
			$id = explode(':', $segments[$count-1]);
			$vars['id'] = (int) $id[0];
			$vars['view'] = 'videos';
			break;

		case 'videodetail':
			$id = explode(':', $segments[$count-1]);
			$vars['id'] = (int) $id[0];
			$vars['view'] = 'videodetail';
			break;
		case 'photos':
			$id = explode(':', $segments[$count-1]);
			$vars['id'] = (int) $id[0];
			$vars['view'] = 'photos';
			break;

		case 'photodetail':
			$id = explode(':', $segments[$count-1]);
			$vars['id'] = (int) $id[0];
			$vars['view'] = 'photodetail';
			break;
		case 'documents':
			$id = explode(':', $segments[$count-1]);
			$vars['id'] = (int) $id[0];
			$vars['view'] = 'documents';
			break;

		case 'document':
			$id = explode(':', $segments[$count-1]);
			$vars['id'] = (int) $id[0];
			$vars['view'] = 'document';
			break;
	}

	return $vars;
}
?>