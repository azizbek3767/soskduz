<?php
	include('../includes/admin.inc.php');
	include('../includes/charts.inc.php');
	if($adminUser['accessLevel'] != 'administrator' && $adminUser['accessLevel'] != 'developer') die(lang('general:accessIsDenied'));

	$noTimeAdjust = true;
	include('chart.date-selector.php');

	/* getting earliest date */
	$minDate = dbQuery('stats_cache_daily', DB_VALUE, array('fields'=>'MIN(cacheDate)'));
	if(strtotime($minDate) > strtotime($dateStart)) $dateStart = $minDate;

	$where[] = "cacheDate >= '$dateStart'";
	$where[] = "cacheDate <= '$dateEnd'";

	/* if too many days, group by week or month and get sum values */
	$totalDays = (strtotime($dateEnd) - strtotime($dateStart)) / (60 * 60 * 24);
	if($totalDays > 300){
		$fields = 'cacheDate, SUM(newVisitors) AS newVisitors, SUM(retVisitors) AS retVisitors';
		$group = 'YEAR(cacheDate), MONTH(cacheDate)';
		$dateFormat = "M\rY";
	} elseif($totalDays > 70){
		$fields = 'cacheDate, SUM(newVisitors) AS newVisitors, SUM(retVisitors) AS retVisitors';
		$group = 'YEAR(cacheDate), WEEK(cacheDate, 3)';
		$dateFormat = "m/d\rY";
	} else {
		$fields = 'cacheDate, newVisitors, retVisitors';
		$group = '';
		$dateFormat = "D\rm/d";
	}

	/* legend */
	$visitors['dates'][]       = '';
	$visitors['retVisitors'][] = lang('stats:returningVisitors');
	$visitors['newVisitors'][] = lang('stats:newVisitors');

	$maxValue = 0;

	/* data */
	$data = dbQuery('stats_cache_daily', DB_ARRAYS, array('fields'=>$fields, 'where'=>$where, 'order'=>'cacheDate', 'group'=>$group));
	foreach($data as $row){
		$visitors['dates'][]       = langdate(date($dateFormat, strtotime($row['cacheDate'])));
		$visitors['retVisitors'][] = $row['retVisitors'];
		$visitors['newVisitors'][] = $row['newVisitors'];

		$maxValue = max($maxValue, $row['retVisitors'] + $row['newVisitors']);
	}
	$visitors['dates'] = midValues($visitors['dates']);

	/* determine left margin, depending on the max value shown on axis */
	$chart_rect_x = 15;
	$chart_rect_x = max($chart_rect_x, 15 + 5 * strlen($maxValue));

	/* if one day, duplpicate it for correct visualization */
	if(count($visitors['dates']) == 2){
		foreach($visitors as $type=>$void) $visitors[$type][] = $visitors[$type][1];
		/* fixing javascript */
		$col = 1;
	} else {
		$col = '_col_';
	}

	/* finding max value for axis */
	$steps = 3;
	if($maxValue > 0){
		if($maxValue > 100000){
			$muldiv = 10000;
		} elseif($maxValue > 10000){
			$muldiv = 1000;
		} elseif($maxValue > 1000){
			$muldiv = 100;
		} elseif($maxValue > 100){
			$muldiv = 10;
		} else {
			$muldiv = 1;
		}
		$maxValue = ceil($maxValue/$muldiv) + 1;
		while(intval($maxValue/$steps) != $maxValue/$steps) $maxValue++;
		$maxValue = $maxValue * $muldiv;
	}

	$chart_width  = 689 + (50 - $chart_rect_x);
	$chart_height = 100;

	$chart['chart_type']    = 'stacked area';
	$chart['chart_data']    = array ( $visitors['dates'], $visitors['retVisitors'], $visitors['newVisitors']);
	$chart['chart_value']   = array ( 'font'=>'tahoma', 'size'=>10, 'bold'=>false, 'position'=>'cursor', 'background_color'=>'FFFFE1' );
	$chart['chart_border']  = array ( 'color'=>'000000', 'top_thickness'=>0, 'bottom_thickness'=>1, 'left_thickness'=>1, 'right_thickness'=>1 );
	$chart['chart_rect']    = array ( 'x'=>$chart_rect_x, 'y'=>35, 'width'=>$chart_width, 'height'=>$chart_height );
	$chart['chart_grid_h']  = array ( 'alpha'=>10 );

	$chart['axis_category'] = array ( 'font'=>'tahoma', 'size'=>10, 'bold'=>false );
	$chart['axis_value']    = array ( 'font'=>'tahoma', 'size'=>10, 'bold'=>false, 'steps'=>$steps, 'max'=>$maxValue, 'show_min'=>false );
	$chart['axis_ticks']    = array ( 'value_ticks'=>false, 'category_ticks'=>false, 'major_thickness'=>2, 'minor_thickness'=>1, 'minor_count'=>1 ,'position'=>'outside' );

	$chart['legend_label']  = array ( 'font'=>'tahoma', 'size'=>10, 'bold'=>false, 'layout'=>'horizontal', 'bullet'=>'square' );
	$chart['legend_rect']   = array ( 'x'=>339, 'y'=>8, 'width'=>400, 'height'=>20, 'fill_color'=>'FCFCFC', 'fill_alpha'=>100 );

	$chart['draw']          = array ( array( 'type'=>'text', 'font'=>'tahoma', 'color'=>'C5C5C5', 'size'=>16, 'text'=>lang('stats:visitors'), 'x'=>$chart_rect_x, 'y'=>8 ) );
	#echo $chart_rect_x;

	$chart['series_color']  = array ( 'B0F07E', '88E83E', '64C717' );

	$chart['link_data']     = array ( 'url'=>"javascript:highlightRow($col, 'total', 'totals', 'totalsHighlight')", 'target'=>'javascript' );

	SendChartData ( $chart );
?>