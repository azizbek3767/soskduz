<?php
	include('../includes/admin.inc.php');
	include('../includes/charts.inc.php');
	if($adminUser['accessLevel'] != 'administrator' && $adminUser['accessLevel'] != 'developer') die(lang('general:accessIsDenied'));

	$noTimeAdjust = true;
	include('chart.date-selector.php');

	$where[] = "cacheDate >= '$dateStart'";
	$where[] = "cacheDate <= '$dateEnd'";

	/* if too many days, group by week or month and get sum values */
	$totalDays = (strtotime($dateEnd) - strtotime($dateStart)) / (60 * 60 * 24);
	if($totalDays > 300){
		$fields = 'cacheDate, SUM(pageGenTime100) AS pageGenTime100, SUM(pageGenTime250) AS pageGenTime250, SUM(pageGenTime500) AS pageGenTime500, SUM(pageGenTime1000) AS pageGenTime1000, SUM(pageGenTime2000) AS pageGenTime2000, SUM(pageGenTimeMore) AS pageGenTimeMore';
		$group = 'YEAR(cacheDate), MONTH(cacheDate)';
		$dateFormat = "M\rY";
	} elseif($totalDays > 70){
		$fields = 'cacheDate, SUM(pageGenTime100) AS pageGenTime100, SUM(pageGenTime250) AS pageGenTime250, SUM(pageGenTime500) AS pageGenTime500, SUM(pageGenTime1000) AS pageGenTime1000, SUM(pageGenTime2000) AS pageGenTime2000, SUM(pageGenTimeMore) AS pageGenTimeMore';
		$group = 'YEAR(cacheDate), WEEK(cacheDate, 3)';
		$dateFormat = "m/d\rY";
	} else {
		$fields = 'cacheDate, pageGenTime100, pageGenTime250, pageGenTime500, pageGenTime1000, pageGenTime2000, pageGenTimeMore';
		$group = '';
		$dateFormat = "D\rm/d";
	}

	/* legend */
	$ms = lang('stats:ms');
	$gentimes['dates'][]           = '';
	$gentimes['pageGenTime100'][]  = '&lt; 100'.$ms;
	$gentimes['pageGenTime250'][]  = '&lt; 250'.$ms;
	$gentimes['pageGenTime500'][]  = '&lt; 500'.$ms;
	$gentimes['pageGenTime1000'][] = '&lt; 1000'.$ms;
	$gentimes['pageGenTime2000'][] = '&lt; 2000'.$ms;
	$gentimes['pageGenTimeMore'][] = '&gt; 2000'.$ms;

	/* data */
	$data = dbQuery('stats_cache_daily', DB_ARRAYS, array('fields'=>$fields, 'where'=>$where, 'order'=>'cacheDate', 'group'=>$group));
	foreach($data as $row){
		$gentimes['dates'][]              = langdate(date($dateFormat, strtotime($row['cacheDate'])));
		$pageGenSum                       = $row['pageGenTime100'] + $row['pageGenTime250'] + $row['pageGenTime500'] + $row['pageGenTime1000'] + $row['pageGenTime2000'] + $row['pageGenTimeMore'];
		if($pageGenSum > 0){
			$gentimes['pageGenTime100'][]  = floor(($row['pageGenTime100']/$pageGenSum) * 10000)/100;
			$gentimes['pageGenTime250'][]  = floor(($row['pageGenTime250']/$pageGenSum) * 10000)/100;
			$gentimes['pageGenTime500'][]  = floor(($row['pageGenTime500']/$pageGenSum) * 10000)/100;
			$gentimes['pageGenTime1000'][] = floor(($row['pageGenTime1000']/$pageGenSum) * 10000)/100;
			$gentimes['pageGenTime2000'][] = floor(($row['pageGenTime2000']/$pageGenSum) * 10000)/100;
			$gentimes['pageGenTimeMore'][] = floor(($row['pageGenTimeMore']/$pageGenSum) * 10000)/100;
		} else {
			$gentimes['pageGenTime100'][]  = 0;
			$gentimes['pageGenTime250'][]  = 0;
			$gentimes['pageGenTime500'][]  = 0;
			$gentimes['pageGenTime1000'][] = 0;
			$gentimes['pageGenTime2000'][] = 0;
			$gentimes['pageGenTimeMore'][] = 0;
		}
	}
	$gentimes['dates'] = midValues($gentimes['dates']);

	$maxValue = 100;

	/* determine left margin, depending on the max value shown on axis */
	$chart_rect_x = 15;
	$chart_rect_x = max($chart_rect_x, 15 + 5 * (strlen($maxValue) + 1));

	/* if one day, duplpicate it for correct visualization */
	if(count($gentimes['dates']) == 2){
		foreach($gentimes as $type=>$void) $gentimes[$type][] = $gentimes[$type][1];
		/* fixing javascript */
		$col = 1;
	} else {
		$col = '_col_';
	}

	/* finding max value for axis */
	$steps = 4;
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
		$maxValue = ceil($maxValue/$muldiv);
		while(intval($maxValue/$steps) != $maxValue/$steps) $maxValue++;
		$maxValue = $maxValue * $muldiv;
	}

	$chart_width  = 689 + (50 - $chart_rect_x);
	$chart_height = 100;

	$chart['chart_type']    = 'stacked area';
	$chart['chart_data']    = array ( $gentimes['dates'], $gentimes['pageGenTime100'], $gentimes['pageGenTime250'], $gentimes['pageGenTime500'], $gentimes['pageGenTime1000'], $gentimes['pageGenTime2000'], $gentimes['pageGenTimeMore']);
	$chart['chart_value']   = array ( 'font'=>'tahoma', 'size'=>10, 'bold'=>false, 'position'=>'cursor', 'background_color'=>'FFFFE1' );
	$chart['chart_border']  = array ( 'color'=>'000000', 'top_thickness'=>0, 'bottom_thickness'=>1, 'left_thickness'=>1, 'right_thickness'=>1 );
	$chart['chart_rect']    = array ( 'x'=>$chart_rect_x, 'y'=>50, 'width'=>$chart_width, 'height'=>$chart_height );
	$chart['chart_grid_h']  = array ( 'alpha'=>10 );

	$chart['axis_category'] = array ( 'font'=>'tahoma', 'size'=>10, 'bold'=>false );
	$chart['axis_value']    = array ( 'font'=>'tahoma', 'size'=>10, 'bold'=>false, 'steps'=>$steps, 'max'=>$maxValue, 'show_min'=>false, 'suffix'=>'%' );
	$chart['axis_ticks']    = array ( 'value_ticks'=>false, 'category_ticks'=>false, 'major_thickness'=>2, 'minor_thickness'=>1, 'minor_count'=>1 ,'position'=>'outside' );

	$chart['legend_label']  = array ( 'font'=>'tahoma', 'size'=>10, 'bold'=>false, 'layout'=>'horizontal', 'bullet'=>'square' );
	$chart['legend_rect']   = array ( 'x'=>489, 'y'=>8, 'width'=>250, 'height'=>20, 'fill_color'=>'FCFCFC', 'fill_alpha'=>100 );

	$chart['draw']          = array ( array( 'type'=>'text', 'font'=>'tahoma', 'color'=>'C5C5C5', 'size'=>16, 'text'=>lang('stats:pageGenTime'), 'x'=>$chart_rect_x, 'y'=>8 ) );

	$chart['series_color']  = array ( '64C717', '88E83E', 'B0F07E', 'FFE26F', 'FFD427', 'DEB200' );

	$chart['link_data']     = array ( 'url'=>"javascript:highlightRow($col, 'gentime', 'gentimes', 'totalsHighlight')", 'target'=>'javascript' );

	SendChartData ( $chart );
?>