<?php
/* Smarty version 3.1.33, created on 2025-04-24 16:44:25
  from '/home/soskduz/public_html/admin/templates/payments.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_680a2419cadfc5_19651021',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2cccf99b0c9af7a33b9ae21f421d54c64841be34' => 
    array (
      0 => '/home/soskduz/public_html/admin/templates/payments.tpl',
      1 => 1580434694,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:payment_".((string)$_smarty_tpl->tpl_vars[\'templateName\']->value).".tpl' => 1,
    'file:tinymce_init.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_680a2419cadfc5_19651021 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/function.html_options.php','function'=>'smarty_function_html_options',),));
$_smarty_tpl->compiled->nocache_hash = '1817705663680a2419c2a5b8_38637790';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('activeItem'=>"payments",'title'=>"Способы оплаты"), 0, false);
?> 
<div class="page-content-wrap">

    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['access_denied'])) {?><span id="accessDeniedError" onclick = "noty({ text: 'Доступ запрещен.', layout: 'topRight', type: 'error' });"></span><?php }?>
	<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['name'])) {?><span id="titleError" onclick = "noty({ text: 'Введите заголовок.', layout: 'topRight', type: 'error' });"></span><?php }?>
	<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['not_saved'])) {?><span id="notSavedError" onclick = "noty({ text: 'Способ оплаты &laquo;<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
&raquo; НЕ сохранена.', layout: 'topRight', type: 'error' });"></span><?php }?>
	<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['no_sections'])) {?><span id="noSectionsError" onclick = "noty({ text: 'Перед добавлением статей, добавьте хотя бы один раздел.', layout: 'topRight', type: 'error' });"></span><?php }?> 
	<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['payment_not_found'])) {?><span id="paymentNotFoundError" onclick = "noty({ text: 'Введите URL.', layout: 'topRight', type: 'error' });"></span><?php }?>
	<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['fileName'])) {?><span id="fileNameError" onclick = "noty({ text: 'Способ оплаты с таким URL уже существует. Введите другой URL.', layout: 'topRight', type: 'error' });"></span><?php }?> 
	<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['fileNameExists'])) {?><span id="fileNameExistsError" onclick = "noty({ text: 'Способ оплаты НЕ удален', layout: 'topRight', type: 'error' });"></span><?php }?>
	
	<?php echo '<script'; ?>
>
  	
    $(document).ready(function () {
      
      <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['access_denied'])) {?> $('#accessDeniedError').click();<?php }?>
      <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['name'])) {?> $('#titleError').click(); <?php }?>
      <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['not_saved'])) {?> $('#notSavedError').click();<?php }?>
      <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['payment_not_found'])) {?> $('#paymentNotFoundError').click();<?php }?>
      <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['fileName'])) {?> $('#fileNameError').click();<?php }?>
      <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['fileNameExists'])) {?> $('#fileNameExistsError').click();<?php }?>
      <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['fileNameProhibited'])) {?> $('#fileNameProhibitedError').click();<?php }?>
      <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['fileNameCharacters'])) {?> $('#fileNameCharactersError').click();<?php }?>
      
    });
    function deletePaymentMessage(){ noty({ text: 'Способ оплаты удален.',layout: 'topRight',type: 'success' }) }
          
  <?php echo '</script'; ?>
>
  
<?php if (isset($_smarty_tpl->tpl_vars['action']->value['edit'])) {?>
	<?php echo '<script'; ?>
>
    	
    	$(function () {function e() {
        	fileName_touched || $("#fileName").val(n())
        }
        function m() {
            return name = $("#name").val()
        }
        function n() {
            return fileName = $("#name").val(), 
            fileName = fileName.replace(/[\s]+/gi, "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['filename_word_separator'], ENT_QUOTES, 'UTF-8', true);?>
"), 
            fileName = l(fileName), fileName = fileName.replace(/[^0-9a-z_\-]+/gi, "").toLowerCase()
        }
        function l(e) {
            for (var a = "А-а-Б-б-В-в-Ґ-ґ-Г-г-Д-д-Е-е-Ё-ё-Є-є-Ж-ж-З-з-И-и-І-і-Ї-ї-Й-й-К-к-Л-л-М-м-Н-н-О-о-П-п-Р-р-С-с-Т-т-У-у-Ф-ф-Х-х-Ц-ц-Ч-ч-Ш-ш-Щ-щ-Ъ-ъ-Ы-ы-Ь-ь-Э-э-Ю-ю-Я-я".split("-"), i = "A-a-B-b-V-v-G-g-G-g-D-d-E-e-E-e-E-e-ZH-zh-Z-z-I-i-I-i-I-i-J-j-K-k-L-l-M-m-N-n-O-o-P-p-R-r-S-s-T-t-U-u-F-f-H-h-TS-ts-CH-ch-SH-sh-SCH-sch-'-'-Y-y-'-'-E-e-YU-yu-YA-ya".split("-"), t = "", n = 0, l = e.length; l > n; n++) {
                var o = e.charAt(n),c = a.indexOf(o);t += c >= 0 ? i[c] : o
                
            }
            return t
        }
        fileName_touched = !0, 
            
        ($("#fileName").val() == n() || "" == $("#fileName").val()) && (fileName_touched = !1), 
        $("#fileName").change(function () {fileName_touched = !0}), 
        $("#name").keyup(function () {e()})});
        
        <?php echo '</script'; ?>
>
	<div class="content-frame" style="margin-bottom:10px;">
        <div class="content-frame-top"> 
            <div class="col-md-3 col-xs-3 nopadding_left"><h2>Способы оплаты</h2></div>                                          
            <div class="col-md-6 col-xs-6 content-frame-body-left">
                <div id="ajaxStatus" class="alert alert-warning col-md-6 info-box-img" role="alert"></div>
            </div>                            
        </div>
	</div>
  	
	<form action="payments.php" method="post" id="payment" enctype="multipart/form-data">
		<input type="hidden" name="payment[paymentId]" value="<?php if (isset($_smarty_tpl->tpl_vars['payment']->value['paymentId'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['payment']->value['paymentId'], ENT_QUOTES, 'UTF-8', true);
}?>"/>
		<input type="hidden" name="action[save]" value="1" />
        <div class="col-md-12">
            <div class="panel panel-default tabs">                                   
    		    <div class="panel-body tab-content nopadding">
                    <div class="tab-pane active" id="general">
                        <div class="panel panel-default" style="margin-bottom: 0px;">
                            <div class="panel-body"> 
                                <div class="col-md-12">
                                    
                                    <div class="col-md-6 nopadding_left">
                                        <div class="form-group"><label class="field_name <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['name'])) {?>fError<?php }?>">Название</label>
                                            <input class="form-control" autocomplete="off" id="name" type="text" name="payment[name]" value="<?php if (isset($_smarty_tpl->tpl_vars['payment']->value['name'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['payment']->value['name'], ENT_QUOTES, 'UTF-8', true);
}?>" onblur="proposeFileName('name', 'fileName', 'payment', '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['filename_word_separator'], ENT_QUOTES, 'UTF-8', true);?>
', '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['convert_filename_to_lowercase'], ENT_QUOTES, 'UTF-8', true);?>
');" />      
                                  
                                            <input autocomplete="off" id="fileName" type="hidden" name="payment[fileName]" value="<?php if (isset($_smarty_tpl->tpl_vars['payment']->value['fileName'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['payment']->value['fileName'], ENT_QUOTES, 'UTF-8', true);
}?>" />              
                                        </div>
                                    </div>
                                    <div class="col-md-6 nopadding_right">
                                        <div class="form-group">
                                            <label class="field_name">Cтатус</label> 
                                            <?php if (isset($_smarty_tpl->tpl_vars['payment']->value['status'])) {?>                                                                                       
                                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['statuses']->value,'name'=>"payment[status]",'id'=>'status','selected'=>$_smarty_tpl->tpl_vars['payment']->value['status'],'class'=>"form-control select"),$_smarty_tpl);?>

                                            <?php } else { ?>
                                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['statuses']->value,'name'=>"payment[status]",'id'=>'status','class'=>"form-control select"),$_smarty_tpl);?>

                                            <?php }?>
                                            
                                        </div>
                                    </div>
                                    <?php if (!empty($_smarty_tpl->tpl_vars['payment']->value['fileName'])) {?>
                                        <?php $_smarty_tpl->_subTemplateRender("file:payment_".((string)$_smarty_tpl->tpl_vars['templateName']->value).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                                    <?php }?>
                                    
                                    <div class="form-group">
                                        <label class="field_name">Описание</label>
                                        <textarea name="payment[summary]" class="description"><?php if (isset($_smarty_tpl->tpl_vars['payment']->value['summary'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['payment']->value['summary'], ENT_QUOTES, 'UTF-8', true);
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
        <div class="col-md-12 main main_buttons text-center">
		    <input class="btn btn-primary" type="submit" name="action[save]" value="&nbsp; Сохранить &nbsp;" onclick="document.getElementById('payment').target='_self'; document.getElementById('payment').action='<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['GLOBAL_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/admin<?php if ($_smarty_tpl->tpl_vars['SITE_LANG']->value != '') {?>/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_LANG']->value, ENT_QUOTES, 'UTF-8', true);
}?>/payments.php?<?php if (isset($_smarty_tpl->tpl_vars['page']->value)) {?>page=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value, ENT_QUOTES, 'UTF-8', true);
}?>'" /> &nbsp; 		
            <a class="btn btn-primary" href="payments.php?<?php if (isset($_smarty_tpl->tpl_vars['page']->value)) {?>page=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value, ENT_QUOTES, 'UTF-8', true);
}?>">Отменить</a>
        </div>
    </form>

<?php } else { ?>
  
     
    <div class="content-frame" style="margin-bottom:10px;">
        <div class="content-frame-top">                        
            <div class="col-md-6 col-xs-6 nopadding_left"><h2>Способы оплаты</h2></div> 
            <div class="col-md-6 col-xs-6 nopadding_right">                                                
                <div class="pull-right"> 
                    <a class="btn btn-danger" href="payments.php?action[edit]=true" data-toggle="tooltip" data-placement="left" data-original-title="Добавить"><i class="fa fa-plus"></i></a>
      				        
                </div>              
            </div>                           
        </div>
    </div>

	
    <div class="col-md-12"> 
        <div class="panel panel-default">
            <div class="panel-body panel-body-table">
                <div class="table-responsive">
                    <table class="table table-striped table-actions table-hover" id="payments">
                        <thead>
                            <tr>
                                <th width="50">Id</th>
                                <th>Название</th>
                                <th width="100">Статус</th>
                                <th width="140">Действие</th>
                            </tr>
                        </thead>
                        <?php if (isset($_smarty_tpl->tpl_vars['payments']->value)) {?>
                        <tbody>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['payments']->value, 'payment', false, NULL, 'payments', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['payment']->value) {
?>
                            <tr id="payment-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['payment']->value['paymentId'], ENT_QUOTES, 'UTF-8', true);?>
">
                                <td style="line-height: 58px;" class="text-center" nowrap="nowrap"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['payment']->value['paymentId'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                            
                                <td style="line-height: 58px;" width="100%"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['payment']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</a></td>
                             
                                <td style="line-height: 58px;min-width: 120px;"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['payment']->value['statusName'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                                <td class="btn-link-action text-center">
                                    <a class="btn btn-rounded" href="payments.php?action[edit]=true&payment[paymentId]=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['payment']->value['paymentId'], ENT_QUOTES, 'UTF-8', true);?>
&page=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value, ENT_QUOTES, 'UTF-8', true);?>
"><span class="fa fa-pen"></span></a>  
                                    <a class="btn btn-danger btn-rounded" onclick="deletePayment(<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['payment']->value['paymentId'], ENT_QUOTES, 'UTF-8', true);?>
, '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['payment']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
');"><span class="fa fa-trash"></span></a>
                                </td>
                            </tr>
  						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4">
                                    <div class="pull-left">Результаты с <b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pageNums']->value['startIteration'], ENT_QUOTES, 'UTF-8', true);?>
</b> по <b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pageNums']->value['endIteration'], ENT_QUOTES, 'UTF-8', true);?>
</b> из <b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pageNums']->value['totalItems'], ENT_QUOTES, 'UTF-8', true);?>
</b></div>
                                    <?php if (isset($_smarty_tpl->tpl_vars['pageNums']->value['pages'])) {?>             
                                    <ul class="pagination pagination-sm pull-right push-down-10 push-up-10">
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pageNums']->value['pages'], 'number');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['number']->value) {
?>
                                        <?php if ($_smarty_tpl->tpl_vars['number']->value == $_smarty_tpl->tpl_vars['page']->value) {?>
                                        <li class="active"><a href="payments.php?page=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['number']->value, ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['number']->value, ENT_QUOTES, 'UTF-8', true);?>
</a></li>
                                        <?php } elseif ($_smarty_tpl->tpl_vars['number']->value == '...') {?>
                                        ...
                                        <?php } else { ?>
                                        <li><a href="payments.php?page=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['number']->value, ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['number']->value, ENT_QUOTES, 'UTF-8', true);?>
</a></li>
                                        <?php }?>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    </ul>  
                                    <?php }?>
                                </td>
                            </tr>
                        </tfoot>
                        <?php } else { ?>
                        <tbody><tr class="odd"><td class="data none" colspan="4" align="center">- Не найдено -</td></tr></tbody>
                        <?php }?>   
                    </table>
                </div>
            </div>
        </div> 	
    </div>
  <?php }?>
</div>




<?php $_smarty_tpl->_subTemplateRender('file:tinymce_init.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
