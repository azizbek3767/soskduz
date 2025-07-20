<?php
/* Smarty version 3.1.33, created on 2025-03-24 16:29:47
  from '/home/soskduz/public_html/admin/templates/donations.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_67e1422b188a27_03867424',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3fe21ea4362906e0648b9be1f59fbdfe2f1a414d' => 
    array (
      0 => '/home/soskduz/public_html/admin/templates/donations.tpl',
      1 => 1580440080,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:tinymce_init.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_67e1422b188a27_03867424 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/function.html_options.php','function'=>'smarty_function_html_options',),));
$_smarty_tpl->compiled->nocache_hash = '3748570267e1422b113943_62649642';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('activeItem'=>"donations",'title'=>"Сумма пожертвования"), 0, false);
?>
<div class="page-content-wrap">
    <?php if (isset($_smarty_tpl->tpl_vars['messages']->value['saved'])) {?><span id="savedMessage" onclick="noty({ text: 'Сумма &laquo;<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['donation']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
&raquo; сохранена.', layout: 'topRight', type: 'success', timeout: 1500 });"></span><?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['access_denied'])) {?><span id="accessDeniedError" onclick="noty({ text: 'Доступ запрещен.', layout: 'topRight', type: 'error', timeout: 1500 });"></span><?php }?> 
	<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['name'])) {?><span id="titleError" onclick = "noty({ text: 'Введите заголовок.', layout: 'topRight', type: 'error', timeout: 1500 });"></span><?php }?>
	<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['not_saved'])) {?><span id="notSavedError" onclick="noty({ text: 'Сумма &laquo;<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['donation']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
&raquo; НЕ сохранена.', layout: 'topRight', type: 'error', timeout: 1500 });"></span><?php }?>
	<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['donation_not_found'])) {?><span id="articleNotFoundError" onclick="noty({ text: 'Сумма не найдена или доступ запрещен.', layout: 'topRight', type: 'error', timeout: 1500 });"></span><?php }?>

	<?php echo '<script'; ?>
>
    $(document).ready(function () {
        <?php if (isset($_smarty_tpl->tpl_vars['messages']->value['saved'])) {?> $('#savedMessage').click();<?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['access_denied'])) {?> $('#accessDeniedError').click();<?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['name'])) {?> $('#titleError').click(); <?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['not_saved'])) {?> $('#notSavedError').click();<?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['donation_not_found'])) {?> $('#articleNotFoundError').click();<?php }?>
    });

    function deleteMessage(){ noty({ text: 'Сумма удалена.', layout: 'topRight', type: 'success', timeout: 1500 }) }           
  <?php echo '</script'; ?>
>
  
<?php if (isset($_smarty_tpl->tpl_vars['action']->value['edit'])) {?>
	<div class="content-frame" style="margin-bottom:10px;">
        <div class="content-frame-top">
            <div class="col-md-3 nopadding_left"><h2>Сумма пожертвования</h2></div>
            <div class="col-md-4 content-frame-body-left">
                <div id="ajaxStatus" class="alert alert-warning col-md-6 info-box-img" role="alert"></div>
                <div class="upload-image alert" role="alert"></div>
                <span id="deletingStatus" class="alert alert-warning col-md-6 info-box-img" role="alert"></span>
		    </div>
		</div>
	</div>
  
	<form action="donations.php" method="post" id="donation">
	    <input type="hidden" name="donation[id]" value="<?php if (isset($_smarty_tpl->tpl_vars['donation']->value['id'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['donation']->value['id'], ENT_QUOTES, 'UTF-8', true);
}?>" />
        <input type="hidden" name="action[save]" value="1" />
        <div class="col-md-12">
            <div class="panel panel-default tabs">
                
                <ul class="nav nav-tabs nav-justified">
                    <li class="active"><a href="#general" data-toggle="tab" aria-expanded="true">Основное</a></li>
                    <li class=""><a href="#summary" data-toggle="tab" aria-expanded="false">Небольшое описание</a></li>
                    <li class=""><a href="#misc" data-toggle="tab" aria-expanded="false">Разное</a></li>
                </ul>
                
                <div class="panel-body tab-content nopadding">
	                <div class="tab-pane active" id="general">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                
                                <div class="col-md-6">
                                    <div class="col-md-6 nopadding_left">
                                        <div class="form-group">
                                            <label class="field_name">Сортировка</label>
                                            <input class="form-control" autocomplete="off" type="text" name="donation[orderBy]" value="<?php if (isset($_smarty_tpl->tpl_vars['donation']->value['orderBy'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['donation']->value['orderBy'], ENT_QUOTES, 'UTF-8', true);
}?>" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 nopadding_right">
                                        <div class="form-group">
                                            <label class="field_name">Статус</label>
                                            <?php if (isset($_smarty_tpl->tpl_vars['donation']->value['status'])) {?>
                                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['statuses']->value,'name'=>"donation[status]",'selected'=>$_smarty_tpl->tpl_vars['donation']->value['status'],'class'=>"form-control select"),$_smarty_tpl);?>

                                            <?php } else { ?>
                                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['statuses']->value,'name'=>"donation[status]",'class'=>"form-control select"),$_smarty_tpl);?>

                                            <?php }?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="field_name <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['name'])) {?>fError<?php }?>">Заголовок</label>
                                        <input class="form-control" autocomplete="off" type="text" name="donation[name]" id="title" value="<?php if (isset($_smarty_tpl->tpl_vars['donation']->value['name'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['donation']->value['name'], ENT_QUOTES, 'UTF-8', true);
}?>" />
                                    </div>

                                    <div class="form-group">
                                        <label class="field_name">Сумма пожертвования</label>
                                        <input class="form-control" autocomplete="off" type="text" name="donation[price]" value="<?php if (isset($_smarty_tpl->tpl_vars['donation']->value['price'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['donation']->value['price'], ENT_QUOTES, 'UTF-8', true);
}?>" />
                                    </div>
                                 	
    
                                    <?php if (isset($_smarty_tpl->tpl_vars['donation']->value['modifiedOn'])) {?>
                                    <div class="form-group">
                                        <label class="field_name">Изменено</label>
                                        <div class=""><i><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['donation']->value['modifiedOn'], ENT_QUOTES, 'UTF-8', true);?>
 (<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['donation']->value['modifiedBy']['loginName'])===null||$tmp==='' ? "Неизвестный пользователь" : $tmp), ENT_QUOTES, 'UTF-8', true);?>
)</i></div>
                                    </div>
                                    <?php }?>
                                    <?php if (isset($_smarty_tpl->tpl_vars['donation']->value['addedOn'])) {?>
                                    <div class="form-group">
                                        <label class="field_name">Создано</label>
                                        <div class=""><i><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['donation']->value['addedOn'], ENT_QUOTES, 'UTF-8', true);?>
 (<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['donation']->value['addedBy']['loginName'])===null||$tmp==='' ? "Неизвестный пользователь" : $tmp), ENT_QUOTES, 'UTF-8', true);?>
)</i></div>
                                    </div>
                                    <?php }?>
                                 
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="field_name">Описание</label>
                                        <textarea name="donation[summary]" class="description"><?php if (isset($_smarty_tpl->tpl_vars['donation']->value['summary'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['donation']->value['summary'], ENT_QUOTES, 'UTF-8', true);
}?></textarea> 
                                    </div>
                                </div>
                               
                            </div>
                        </div>
        	    	</div>                    
                </div>
            </div>                        
        </div>	
        <div class="clear"></div>
        <div align="center" class="col-md-12 main main_buttons">
            <input class="btn btn-primary" type="submit" name="action[save]" value="&nbsp; Сохранить &nbsp;" onclick="document.getElementById('donation').target='_self'; document.getElementById('donation').action='<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['GLOBAL_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/admin<?php if ($_smarty_tpl->tpl_vars['SITE_LANG']->value != '') {?>/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_LANG']->value, ENT_QUOTES, 'UTF-8', true);
}?>/donations.php'" />	&nbsp;
            <a class="btn btn-primary" href="donations.php">Отменить</a>
        </div>
    </form>

<?php } elseif (!isset($_smarty_tpl->tpl_vars['errors']->value['access_denied'])) {?>

    <div class="content-frame" style="margin-bottom:10px;">
        <div class="content-frame-top">                        
            <div class="col-md-6 col-xs-6 nopadding_left"><h2>Сумма пожертвования</h2></div>
            <div class="col-md-6 col-xs-6 nopadding_right">
                <a class="btn btn-danger pull-right" href="donations.php?action[edit]=true" data-toggle="tooltip" data-placement="left" data-original-title="Добавить"><i class="fa fa-plus"></i></a>
            </div>  
        </div>
    </div>

    <div class="col-md-12">
	    <form action="donations.php" method="post"> 
            <div class="panel panel-default">
                <div class="panel-body panel-body-table">
                    <div class="table-responsive">		
                        <table class="table table-striped table-actions table-hover" id="donations">
                            <thead>
                                <tr>
                                    <th class="" style="padding: 0px 0px">
                                        <input class="btn btn-primary" type="submit" name="action[reorder]" value="Сортировать" data-toggle="tooltip" data-placement="top" data-original-title="Порядок публикации на сайте"/>
                                    </th>
                                    <th class="">Сумма пожертвования</th>
                                    <th class="text-center" width="100">Статус</th>
                                    <th class="text-center" width="50">Действие</th>
                                </tr>
                            </thead>
                            <tbody>   
                                <?php if (isset($_smarty_tpl->tpl_vars['donations']->value)) {?>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['donations']->value, 'donation', false, NULL, 'donations', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['donation']->value) {
?>
                                <tr id="donation-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['donation']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
">
                                    <td class="text-center"><input type="text" name="donation[orderBys][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['donation']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['donation']->value['orderBy'], ENT_QUOTES, 'UTF-8', true);?>
" class="form-control text-center"/></td>
                                    <td width="100%"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['donation']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                                    <td style="" id="status-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['donation']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
" align="center"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['donation']->value['statusName'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                                    <td class="btn-link-action text-center">
                                        <a href="donations.php?action[edit]=true&donation[id]=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['donation']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
" class="btn btn-default btn-rounded"><span class="fa fa-pen"></span></a>
                                        <a class="btn btn-danger btn-rounded" onclick="deleteDonation(<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['donation']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
, '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['donation']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
');"><span class="fa fa-trash"></span></a>
                                    </td>
                                </tr>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                <?php } else { ?>
                                <tr class="odd"><td class="data none" colspan="7" align="center">- Не найдено -</td></tr>
                                <?php }?> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> 
	    </form>	
    </div>

<?php }?>
</div>

<?php $_smarty_tpl->_subTemplateRender('file:tinymce_init.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
