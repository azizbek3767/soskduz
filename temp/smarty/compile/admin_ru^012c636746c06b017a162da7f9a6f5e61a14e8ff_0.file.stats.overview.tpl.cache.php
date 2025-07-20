<?php
/* Smarty version 3.1.33, created on 2025-07-12 16:15:40
  from '/home/soskduz/public_html/admin/templates/stats.overview.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_687243dc550132_06701199',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '012c636746c06b017a162da7f9a6f5e61a14e8ff' => 
    array (
      0 => '/home/soskduz/public_html/admin/templates/stats.overview.tpl',
      1 => 1571729384,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_687243dc550132_06701199 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/function.html_options.php','function'=>'smarty_function_html_options',),1=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/function.html_select_date.php','function'=>'smarty_function_html_select_date',),));
$_smarty_tpl->compiled->nocache_hash = '2042566385687243dc4e3bc0_31801063';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('activeItem'=>"overview",'title'=>"Обзор - Статистика"), 0, false);
echo '<script'; ?>
 type="text/javascript" src="assets/js/raphael-min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="assets/js/morris.min.js"><?php echo '</script'; ?>
>

<div class="page-content-wrap">
	<div class="content-frame" style="margin-bottom:10px;">
    <div class="content-frame-top"><h2>Статистика</h2></div>
</div>                

<div class="row">                              
    <div class="form-group main">
        <div class="col-md-12">
            <div class="col-md-3 text-left">
                <form method="post">
                    <?php if (isset($_smarty_tpl->tpl_vars['filterTypeId']->value)) {?><input type="hidden" name="filterTypeId" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filterTypeId']->value, ENT_QUOTES, 'UTF-8', true);?>
" /><?php }?>
                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['simplePeriods']->value,'selected'=>(($tmp = @$_smarty_tpl->tpl_vars['simplePeriod']->value)===null||$tmp==='' ? "last7days" : $tmp),'name'=>"newSimplePeriod",'onchange'=>"this.form.submit()",'class'=>"form-control select"),$_smarty_tpl);?>

                </form>
            </div>
            <div class="col-md-9 text-right date">
                <form method="post">
                    <?php if (isset($_smarty_tpl->tpl_vars['filterTypeId']->value)) {?><input type="hidden" name="filterTypeId" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filterTypeId']->value, ENT_QUOTES, 'UTF-8', true);?>
" /><?php }?>
                    <div class="col-md-5"></div>
                    <?php echo smarty_function_html_select_date(array('start_year'=>2015,'month_format'=>"%b",'time'=>strtotime($_smarty_tpl->tpl_vars['dateStart']->value),'field_array'=>"newDateStart",'prefix'=>'','class'=>"form-control select"),$_smarty_tpl);?>
 &nbsp;-&nbsp; 
                    <?php echo smarty_function_html_select_date(array('start_year'=>2015,'month_format'=>"%b",'time'=>strtotime($_smarty_tpl->tpl_vars['dateEnd']->value),'field_array'=>"newDateEnd",'prefix'=>'','class'=>"form-control select"),$_smarty_tpl);?>

                    <input class="btn btn-warning" type="submit" value="Показать" />
                </form>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>

<?php if (isset($_smarty_tpl->tpl_vars['days']->value)) {?> 

<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading"><div class="panel-title-box"><h3>Посетители</h3></div></div>
            <div class="panel-body padding-0" id="total<?php echo htmlspecialchars((isset($_smarty_tpl->tpl_vars['__smarty_foreach_days']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_days']->value['iteration'] : null), ENT_QUOTES, 'UTF-8', true);?>
"><div class="chart-holder" id="visitors" style="height: 300px;"></div></div>
        </div>
        <?php echo '<script'; ?>
>
            Morris.Line({
                element: 'visitors',
                data: [ <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['days']->value, 'day', false, NULL, 'days', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['day']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_days']->value['iteration']++;
?>
                { 
                    y: '<?php echo $_smarty_tpl->tpl_vars['day']->value['date'];?>
', 
                    a: <?php echo htmlspecialchars(number_format($_smarty_tpl->tpl_vars['day']->value['newVisitors'],0,",","."), ENT_QUOTES, 'UTF-8', true);?>
,
                    b: <?php echo htmlspecialchars(number_format($_smarty_tpl->tpl_vars['day']->value['retVisitors'],0,",","."), ENT_QUOTES, 'UTF-8', true);?>
,
                    c: <?php echo htmlspecialchars(number_format($_smarty_tpl->tpl_vars['day']->value['newVisitors']+$_smarty_tpl->tpl_vars['day']->value['retVisitors'],0,",","."), ENT_QUOTES, 'UTF-8', true);?>
,
                },
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> ],
                xkey: 'y',
                ykeys: ['a','b', 'c'],
                labels: ['Новые посетители', 'Вернувшиеся посетители', 'Всего посетителей'],
                resize: true,
                hideHover: true,
                xLabels: 'day',
                gridTextSize: '10px',
                lineColors: ['#3c5a96','#f10000', '#2ED621'],
                gridLineColor: '#E5E5E5'
		    });             
        <?php echo '</script'; ?>
>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title">Просмотры за весь период</h3></div>
            <div class="panel-body"><div id="donut" style="height: 268px;"></div></div>
        </div>
    </div>
    <?php echo '<script'; ?>
> 
		Morris.Donut({
			element: 'donut',
			data: [
			    { 
				    label: "Всего просмотров за сегодня", 
                    value: <?php echo htmlspecialchars(number_format($_smarty_tpl->tpl_vars['day']->value['articleVisits']+$_smarty_tpl->tpl_vars['day']->value['sectionVisits']+$_smarty_tpl->tpl_vars['day']->value['searchVisits'],0,",","."), ENT_QUOTES, 'UTF-8', true);?>
 
				},
                {
                    label: "Всего посетителей", 
                    value: <?php echo htmlspecialchars(number_format($_smarty_tpl->tpl_vars['totals']->value['visitors'],0,",","."), ENT_QUOTES, 'UTF-8', true);?>

                },
                {
                    label: "Всего просмотров", 
                    value: <?php echo htmlspecialchars(number_format($_smarty_tpl->tpl_vars['totals']->value['visits'],0,",","."), ENT_QUOTES, 'UTF-8', true);?>

                }
            ],
            colors: ['#95B75D', '#3FBAE4', '#FEA223']
	    });            
    <?php echo '</script'; ?>
>
        
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading"><div class="panel-title-box"><h3>Просмотры</h3></div></div>                                
            <div class="panel-body padding-0"><div class="chart-holder" id="views" style="height: 250px;"></div></div>
        </div>
        <?php echo '<script'; ?>
> 	
            Morris.Bar({
                element: 'views',
                data: [<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['days']->value, 'day', false, NULL, 'days', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['day']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_days']->value['iteration']++;
?>
                { 
                    y: '<?php echo $_smarty_tpl->tpl_vars['day']->value['date'];?>
',
                    a: <?php echo htmlspecialchars(number_format($_smarty_tpl->tpl_vars['day']->value['sectionVisits'],0,",","."), ENT_QUOTES, 'UTF-8', true);?>
, 
                    b: <?php echo htmlspecialchars(number_format($_smarty_tpl->tpl_vars['day']->value['articleVisits'],0,",","."), ENT_QUOTES, 'UTF-8', true);?>
, 
                    c: <?php echo htmlspecialchars(number_format($_smarty_tpl->tpl_vars['day']->value['articleVisits']+$_smarty_tpl->tpl_vars['day']->value['sectionVisits']+$_smarty_tpl->tpl_vars['day']->value['searchVisits'],0,",","."), ENT_QUOTES, 'UTF-8', true);?>
 
                },
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>],
    	        xkey: 'y',
    	        ykeys: ['a', 'b', 'c'],
    	        labels: ['Просмотр страниц', 'Просмотр статей',  'Всего просмотров'],
    	        barColors: ['#3c5a96', '#D67C10', '#f10000'],
    	        gridTextSize: '10px',
    	        hideHover: true,
    	        resize: true,
    	        gridLineColor: '#E5E5E5'
			 });            
        <?php echo '</script'; ?>
>
    </div>
</div>

<?php }?>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>	<?php }
}
