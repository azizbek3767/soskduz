<?php
	if(empty($dsCookieName)) $dsCookieName = 'mainDateSelector';

	$dsCookie        = getRequestVar($dsCookieName, '', $noEscape = true, $checkCookie = true);
	$newSimplePeriod = getRequestVar('newSimplePeriod');
	$newDateStart    = getRequestVar('newDateStart');
	$newDateEnd      = getRequestVar('newDateEnd');

	if(!empty($dsCookie)) $dsCookie = @unserialize($dsCookie);
 	if(!empty($newDateStart)) $dateStart = "$newDateStart[Year]-$newDateStart[Month]-$newDateStart[Day]";
	if(!empty($newDateEnd)) $dateEnd = "$newDateEnd[Year]-$newDateEnd[Month]-$newDateEnd[Day]";
/*
  if(!empty($newDateStart)) $dateStart = $newDateStart;
	if(!empty($newDateEnd)) $dateEnd = $newDateEnd;
*/
	if(!empty($newSimplePeriod)) $simplePeriod = $newSimplePeriod;

	if(!empty($newDateStart) && !empty($newDateEnd)){
		/* date range has been selected */
		$page = 1;
		$smarty->assign('page', $page);
		unset($dsCookie['simplePeriod']);
		$dsCookie['dateStart'] = $dateStart;
		$dsCookie['dateEnd']   = $dateEnd;
		setcookie($dsCookieName, serialize($dsCookie), time() + 60*60*24*180);
	} elseif(!empty($newSimplePeriod)) {
		/* predefined period has been selected */
		$page = 1;
		$smarty->assign('page', $page);
		unset($dsCookie['dateStart']);
		unset($dsCookie['dateEnd']);
		$dsCookie['simplePeriod'] = $simplePeriod;
		setcookie($dsCookieName, serialize($dsCookie), time() + 60*60*24*180);
	} elseif(!empty($dsCookie['dateStart']) && !empty($dsCookie['dateEnd'])) {
		/* predefined date range from cookie */
		$dateStart = $dsCookie['dateStart'];
		$dateEnd   = $dsCookie['dateEnd'];
	} elseif(!empty($dsCookie['simplePeriod'])) {
		/* predefined period from cookie */
		$simplePeriod = $dsCookie['simplePeriod'];
	} else {
		/* default period is "today" */
		$simplePeriod = 'today';
	}
  

  
	if(!empty($simplePeriod)){
		switch ($simplePeriod){
			case 'yesterday':
				$dateEnd = $dateStart = gmdate('Y-m-d', strtotime("-1 day $config[hour_adjustment] hours $config[minute_adjustment] minutes"));
			break;
			case 'last7days':
				$dateEnd = gmdate('Y-m-d', strtotime("$config[hour_adjustment] hours $config[minute_adjustment] minutes"));
				$dateStart = gmdate('Y-m-d', strtotime("-1 week $config[hour_adjustment] hours $config[minute_adjustment] minutes"));
			break;
			case 'thismonth':
				$dateEnd = gmdate('Y-m-d', strtotime("$config[hour_adjustment] hours $config[minute_adjustment] minutes"));
				$dateStart = gmdate('Y-m-01', strtotime("$config[hour_adjustment] hours $config[minute_adjustment] minutes"));
			break;
			case 'lastmonth':
				$dateEnd = gmdate('Y-m-d', mktime($config['hour_adjustment'], $config['minute_adjustment'], 0, date('n'), 0));
				$dateStart = gmdate('Y-m-01', strtotime("-1 month $config[hour_adjustment] hours $config[minute_adjustment] minutes"));
			break;
			case 'alltime':
				$dateEnd = gmdate('Y-m-d', strtotime("$config[hour_adjustment] hours $config[minute_adjustment] minutes"));
				$dateStart = '2007-01-01';
			break;
			case 'today':
			default:
				$dateEnd = $dateStart = gmdate('Y-m-d', strtotime("$config[hour_adjustment] hours $config[minute_adjustment] minutes"));
			break;
		}
		$simplePeriods = array(
			'today'=>lang('stats:periods:today'),
			'yesterday'=>lang('stats:periods:yesterday'),
			'last7days'=>lang('stats:periods:last7days'),
			'thismonth'=>lang('stats:periods:thisMonth'),
			'lastmonth'=>lang('stats:periods:lastMonth'),
			'alltime'=>lang('stats:periods:allTime'),
		);
		$smarty->assign('simplePeriod', $simplePeriod);
	} else {
		$simplePeriods = array(
			''=>'',
			'today'=>lang('stats:periods:today'),
			'yesterday'=>lang('stats:periods:yesterday'),
			'last7days'=>lang('stats:periods:last7days'),
			'thismonth'=>lang('stats:periods:thisMonth'),
			'lastmonth'=>lang('stats:periods:lastMonth'),
			'alltime'=>lang('stats:periods:allTime'),
		);
		$smarty->assign('simplePeriod', '');
	}

	$smarty->assign('dateStart', $dateStart);
	$smarty->assign('dateEnd', $dateEnd);

	if(empty($noTimeAdjust)){
		$dateStart = adjustTime($dateStart.' 00:00:00', true);
		$dateEnd   = adjustTime($dateEnd.' 23:59:59', true);
	}

	$smarty->assign('simplePeriods', $simplePeriods);
?>