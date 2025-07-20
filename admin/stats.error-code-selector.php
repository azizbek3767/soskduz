<?php
	$filterErrorCode = (int)getRequestVar('filterErrorCode');

	$filterErrorCodeOptions[0] = lang('stats:allCodes');
	$filterErrorCodeOptions[404] = '404';
	$filterErrorCodeOptions[503] = '503';
	$filterErrorCodeOptions[301] = '301';

	$smarty->assign('filterErrorCodeOptions', $filterErrorCodeOptions);
?>