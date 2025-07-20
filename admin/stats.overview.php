<?php
	include('../includes/admin.inc.php');
// 	include('../includes/charts.inc.php');
	if($adminUser['accessLevel'] != 'administrator' && $adminUser['accessLevel'] != 'developer') die(lang('general:accessIsDenied'));

	$noTimeAdjust = true;
	include('chart.date-selector.php');

	/* finding the most recent date */
	$firstDate = dbQuery('stats_cache_daily', DB_VALUE, array('fields'=>'MAX(cacheDate)'));
	if(empty($firstDate)) $firstDate = adjustTime(dbQuery('stats_visits', DB_VALUE, array('fields'=>'MIN(visitDate)')), false, 'Y-m-d');
	#$firstDate = '2007-01-01';

	/* finding total number of days */
	$totalDays = intval((strtotime(adjustTime($gmNow)) - strtotime($firstDate)) / (60 * 60 * 24));

	/* requesting data for each day */
	if(!empty($firstDate)) for($i = 0; $i <= $totalDays; $i++){
		$cacheDay = array();
		$cacheDay['cacheDate'] = date('Y-m-d', strtotime("$firstDate $i days"));

		$startDate = adjustTime($cacheDay['cacheDate'], true);
		$endDate   = date('Y-m-d H:i:s', strtotime("$startDate +1 day -1 second"));

		/* new & returning visitors */
		$where = array();
		$where[] = "visitDate >= '$startDate'";
		$where[] = "visitDate <= '$endDate'";
		$where[] = "isBot = 0";
		$join = array('stats_visitors'=>'USING(visitorId)', 'stats_user_agents'=>'USING(userAgentId)');
		$visitors = dbQuery('stats_visits', DB_ARRAYS, array('fields'=>"COUNT(DISTINCT stats_visitors.visitorId) AS totalVisitors, TO_DAYS('$startDate') - TO_DAYS(firstVisitOn) >= 1 AS isReturning", 'where'=>$where, 'join'=>$join, 'group'=>'isReturning', 'indexKey'=>'isReturning', 'valueKey'=>'totalVisitors'));

		/* visits by type */
		$where = array();
		$where[] = "visitDate >= '$startDate'";
		$where[] = "visitDate <= '$endDate'";
		$where[] = "isBot = 0";
		$join = array('stats_visitors'=>'USING(visitorId)', 'stats_user_agents'=>'USING(userAgentId)');
		$visits = dbQuery('stats_visits', DB_ARRAYS, array('fields'=>'typeId, COUNT(*) AS totalVisits', 'where'=>$where, 'join'=>$join, 'group'=>'typeId', 'indexKey'=>'typeId', 'valueKey'=>'totalVisits'));

		$cacheDay['newVisitors']   = empty($visitors[0]) ? 0 : $visitors[0];
		$cacheDay['retVisitors']   = empty($visitors[1]) ? 0 : $visitors[1];
		$cacheDay['sectionVisits'] = empty($visits[2]) ? 0 : $visits[2];
		$cacheDay['articleVisits'] = empty($visits[3]) ? 0 : $visits[3];
		$cacheDay['searchVisits']  = empty($visits[4]) ? 0 : $visits[4];
		$cacheDay['errorVisits']   = empty($visits[6]) ? 0 : $visits[6];
		//$cacheDay['rssVisits']     = empty($visits[7]) ? 0 : $visits[7];

		/* visits by page generation time */
		$where = array();
		$where[] = "visitDate >= '$startDate'";
		$where[] = "visitDate <= '$endDate'";
		$gentimes = dbQuery('stats_visits', DB_ARRAYS, array('fields'=>'INTERVAL(loadTime * 1000, 100, 250, 500, 1000, 2000) AS pgtGroup, COUNT(*) AS totalVisits', 'where'=>$where, 'group'=>'pgtGroup', 'indexKey'=>'pgtGroup', 'valueKey'=>'totalVisits'));

		$cacheDay['pageGenTime100']  = empty($gentimes[0]) ? 0 : $gentimes[0];
		$cacheDay['pageGenTime250']  = empty($gentimes[1]) ? 0 : $gentimes[1];
		$cacheDay['pageGenTime500']  = empty($gentimes[2]) ? 0 : $gentimes[2];
		$cacheDay['pageGenTime1000'] = empty($gentimes[3]) ? 0 : $gentimes[3];
		$cacheDay['pageGenTime2000'] = empty($gentimes[4]) ? 0 : $gentimes[4];
		$cacheDay['pageGenTimeMore'] = empty($gentimes[5]) ? 0 : $gentimes[5];

		/* random - for tests
		$cacheDay['newVisitors']     = rand(100, 1000);
		$cacheDay['retVisitors']     = rand(100, 1000);
		$cacheDay['sectionVisits']   = $cacheDay['newVisitors'];
		$cacheDay['articleVisits']   = ceil($cacheDay['newVisitors']/2);
		$cacheDay['searchVisits']    = rand(5, 50);
		$cacheDay['adClicks']        = ceil($cacheDay['newVisitors']/15);
		$cacheDay['errorVisits']     = rand(5, 50);
		$cacheDay['rssVisits']       = ceil($cacheDay['retVisitors']/2);
		$cacheDay['pageGenTime100']  = rand(300, 500);
		$cacheDay['pageGenTime250']  = rand(100, 300);
		$cacheDay['pageGenTime500']  = rand(100, 200);
		$cacheDay['pageGenTime1000'] = rand(10, 50);
		$cacheDay['pageGenTime2000'] = rand(10, 50);
		$cacheDay['pageGenTimeMore'] = rand(1, 10);
		*/

		dbQuery('stats_cache_daily', DB_REPLACE, array('values'=>$cacheDay));
	}

	/* Inserting the charts */
	//$chartVisitors = InsertChart('charts/charts.swf', 'charts/charts_library', "chart.visitors.php", 755, 170, 'F5F5F5', false, 'chart-visitors');
	//$smarty->assign('chartVisitors', $chartVisitors);

	//$chartVisits = InsertChart('charts/charts.swf', 'charts/charts_library', "chart.visits.php", 755, 170, 'F5F5F5', false, 'chart-visits');
	//$smarty->assign('chartVisits', $chartVisits);

	/* getting earliest date */
	$minDate = dbQuery('stats_cache_daily', DB_VALUE, array('fields'=>'MIN(cacheDate)'));
	if(strtotime($minDate) > strtotime($dateStart)) $dateStart = $minDate;

	/* showing table */
	$where = array();
	$where[] = "cacheDate >= '$dateStart'";
	$where[] = "cacheDate <= '$dateEnd'";

	/* if too many days, group by week or month and get sum values */
	$totalDays = (strtotime($dateEnd) - strtotime($dateStart)) / (60 * 60 * 24);
	if($totalDays > 300){
		$fields = 'cacheDate, SUM(newVisitors) AS newVisitors, SUM(retVisitors) AS retVisitors, SUM(sectionVisits) AS sectionVisits, SUM(articleVisits) AS articleVisits, SUM(searchVisits) AS searchVisits, SUM(errorVisits) AS errorVisits, SUM(rssVisits) AS rssVisits';
		$group = 'YEAR(cacheDate), MONTH(cacheDate)';
		$dateFormat = "M Y";
	} elseif($totalDays > 70){
		$fields = 'cacheDate, SUM(newVisitors) AS newVisitors, SUM(retVisitors) AS retVisitors, SUM(sectionVisits) AS sectionVisits, SUM(articleVisits) AS articleVisits, SUM(searchVisits) AS searchVisits, SUM(errorVisits) AS errorVisits, SUM(rssVisits) AS rssVisits';
		$group = 'YEAR(cacheDate), WEEK(cacheDate, 3)';
		$dateFormat = "\Week W, Y";
	} else {
		$fields = 'cacheDate, newVisitors, retVisitors, sectionVisits, articleVisits, searchVisits, errorVisits, rssVisits';
		$group = '';
		$dateFormat = "Y-m-d";
	}

	$days = dbQuery('stats_cache_daily', DB_ARRAYS, array('fields'=>$fields, 'where'=>$where, 'order'=>'cacheDate', 'group'=>$group));
	$totals['visitors']  = 0;
	$totals['visits']    = 0;
	$totals['rssVisits'] = 0;
	foreach($days as $i=>$row){
		$days[$i]['date']     = langdate(date($dateFormat, strtotime($row['cacheDate'])));
		$totals['visitors']  += $row['newVisitors'] + $row['retVisitors'];
		$totals['visits']    += $row['articleVisits'] + $row['sectionVisits'] + $row['searchVisits'];
		
		$totals['rssVisits'] += $row['rssVisits'];
	}
	$smarty->assign('days', $days);
	$smarty->assign('totals', $totals);


	$site_user = arrAddSlashes(getRequestVar('site_user', '', $noEscape = true));

	$where = array();

	$totalSiteUsers = dbQuery('customers', DB_VALUE, array('fields'=>'COUNT(*)', 'where'=>$where));
	$smarty->assign('totalSiteUsers', $totalSiteUsers);

	$comment = getRequestVar('comment');
	$where = array();
	$totalComments = dbQuery('comments', DB_VALUE, array('fields'=>'COUNT(*)', 'where'=>$where, 'join'=>$join));
	$smarty->assign('totalComments', $totalComments);	
	
	
	$smarty->display('stats.overview.tpl');
	
?>