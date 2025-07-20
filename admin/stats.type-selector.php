<?php
	$filterTypeId = (int)getRequestVar('filterTypeId');

	$filterTypeOptions[0] 	= lang('stats:types:allVisits');
	$filterTypeOptions[2] 	= lang('stats:types:sections');
	$filterTypeOptions[3] 	= lang('stats:types:articles');
	$filterTypeOptions[4] 	= lang('stats:types:searches');
	$filterTypeOptions[6] 	= lang('stats:types:errors');
	//$filterTypeOptions[7] 	= lang('stats:types:rss');
	//$filterTypeOptions[9] 	= lang('stats:types:sitemap');
	
	$smarty->assign('filterTypeOptions', $filterTypeOptions);
?>