<?php
/* Smarty version 3.1.33, created on 2025-07-02 13:40:18
  from '/home/soskduz/public_html/admin/templates/products.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6864f0724cfbe2_38932100',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '12f8a2729addcb7f4de3b89cf7f70ced94609967' => 
    array (
      0 => '/home/soskduz/public_html/admin/templates/products.tpl',
      1 => 1604265832,
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
function content_6864f0724cfbe2_38932100 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/function.html_options.php','function'=>'smarty_function_html_options',),1=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/function.html_select_date.php','function'=>'smarty_function_html_select_date',),2=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/function.html_select_time.php','function'=>'smarty_function_html_select_time',),3=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
$_smarty_tpl->compiled->nocache_hash = '9991785956864f0723485e2_84480050';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('activeItem'=>"products",'title'=>"Продукция"), 0, false);
?>
<div class="page-content-wrap">
  
    <?php if (isset($_smarty_tpl->tpl_vars['messages']->value['saved'])) {?><span id="savedMessage" onclick="noty({ text: 'Продукт &laquo;<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
&raquo; сохранен.', layout: 'topRight', type: 'success', timeout: 1500 });"></span><?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['access_denied'])) {?><span id="accessDeniedError" onclick="noty({ text: 'Доступ запрещен.', layout: 'topRight', type: 'error', timeout: 1500 });"></span><?php }?> 
	<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['title'])) {?><span id="titleError" onclick="noty({ text: 'Введите название продукта.', layout: 'topRight', type: 'error', timeout: 1500 });"></span><?php }?>
	<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['sectionId'])) {?><span id="sectionIdError" onclick="noty({ text: 'Выберите раздел.', layout: 'topRight', type: 'error', timeout: 1500 });"></span><?php }?>
	<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['not_saved'])) {?><span id="notSavedError" onclick="noty({ text: 'Продукт &laquo;<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
&raquo; НЕ сохранен.', layout: 'topRight', type: 'error', timeout: 1500 });"></span><?php }?>
	<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['no_sections'])) {?><span id="noSectionsError" onclick="noty({ text: 'Перед добавлением продукта, добавьте хотя бы один раздел.', layout: 'topRight', type: 'error', timeout: 1500 });"></span><?php }?> 
	<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['image_not_saved'])) {?><span id="imageNotSavedError" onclick="noty({ text: 'Картинка НЕ сохранена.', layout: 'topRight', type: 'error', timeout: 1500 });"></span><?php }?> 
	<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['article_not_found'])) {?><span id="articleNotFoundError" onclick="noty({ text: 'Продукт не найдена или доступ запрещен.', layout: 'topRight', type: 'error', timeout: 1500 });"></span><?php }?>
	<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['fileName'])) {?><span id="fileNameError" onclick="noty({ text: 'Введите URL.', layout: 'topRight', type: 'error', timeout: 1500 });"></span><?php }?> 
	<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['fileNameExists'])) {?><span id="fileNameExistsError" onclick="noty({ text: 'Продукт с таким URL уже существует. Введите другое имя.', layout: 'topRight', type: 'error', timeout: 1500 });"></span><?php }?>
	<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['htaccess'])) {?><span id="htaccessError" onclick="noty({ text: 'Невозможно сохранить файл .htaccess.', layout: 'topRight', type: 'error', timeout: 1500 });"></span><?php }?>
	<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['serializations'])) {?><span id="serializationsError" onclick="noty({ text: 'Невозможно сохранить сериальный файл.', layout: 'topRight', type: 'error', timeout: 1500 });"></span><?php }?>
	<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['fileNameProhibited'])) {?><span id="fileNameProhibitedError" onclick="noty({ text: 'Такое имя файла запрещено.', layout: 'topRight', type: 'error', timeout: 1500 });"></span><?php }?>
	<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['fileNameCharacters'])) {?><span id="fileNameCharactersError" onclick="noty({ text: 'URL может состоять только из следующих символов: A-Z a-z 0-9 . , - _', layout: 'topRight', type: 'error', timeout: 1500 });"></span><?php }?>
	<?php echo '<script'; ?>
>
    $(document).ready(function () {
      
        <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['access_denied'])) {?> $('#accessDeniedError').click();<?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['title'])) {?> $('#titleError').click(); <?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['sectionId'])) {?> $('#sectionIdError').click();<?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['not_saved'])) {?> $('#notSavedError').click();<?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['no_sections'])) {?> $('#noSectionsError').click();<?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['image_not_saved'])) {?> $('#imageNotSavedError').click();<?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['article_not_found'])) {?> $('#articleNotFoundError').click();<?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['fileName'])) {?> $('#fileNameError').click();<?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['fileNameExists'])) {?> $('#fileNameExistsError').click();<?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['htaccess'])) {?> $('#htaccessError').click();<?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['serializations'])) {?> $('#serializationsError').click();<?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['fileNameProhibited'])) {?> $('#fileNameProhibitedError').click();<?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['fileNameCharacters'])) {?> $('#fileNameCharactersError').click();<?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['messages']->value['saved'])) {?> $('#savedMessage').click();<?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['messages']->value['saved'])) {?> $('#deleteImageMessage').click();<?php }?>
    });
    function deleteImageMessage(){ noty({ text: 'Картинка удалена.', layout: 'topRight', type: 'success', timeout: 1500 }) }
    function deleteProductMessage(){ noty({ text: 'Продукт удален.', layout: 'topRight', type: 'success', timeout: 1500 }) }
    function deleteImageError(){ noty({ text: 'Картинка не удалена.', layout: 'topRight', type: 'error', timeout: 1500 }) }
    function deleteImageMessage(){ noty({ text: 'Картинка удалена.', layout: 'topRight', type: 'success', timeout: 1500 }) }
    function successImageMessage(){ noty({ text: 'Картинка успешно загружена', layout: 'topRight', type: 'success', timeout: 1500 }) }           
    <?php echo '</script'; ?>
>
    <div class="modal" id="edit_image">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"></span></button>
                    <h4 class="modal-title" id="defModalHead">Добавить описание к картинке</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">Описание к картинке<input class="form-control" autocomplete="off" id="image_description" type="text" name="image_description" value=""/>
                    </div>
                    <div class="form-group">Переход(ссылка) с картинки<input class="form-control" id="image_url" type="text" name="image_url" value="" /> 
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary save_edit_image" type="submit" value="" data-dismiss="modal"> Сохранить </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Отменить</button>
                </div>
            </div>
        </div>
    </div>
  
<?php if (isset($_smarty_tpl->tpl_vars['action']->value['edit'])) {?>

	<div class="content-frame" style="margin-bottom:10px;">
        <div class="content-frame-top"> 
            <div class="col-md-3 col-xs-3 nopadding_left"><h2>Продукция</h2></div>                                                
            <div class="col-md-6 col-xs-9 content-frame-body-left">
				<div id="ajaxStatus" class="alert alert-warning col-md-6 info-box-img" role="alert"></div>
				<div class="upload-image alert" role="alert"></div>
            </div>                            
        </div>
    </div>

    <?php echo '<script'; ?>
>
        $(function () {
            function e() {
                meta_title_touched || $("#meta_title").val(m()), 
                keywords_touched || $("#keywords").val(i()), 
                description_touched || $("#description").val(t()), 
                fileName_touched || $("#fileName").val(n())
            }
            function m() {
                return name = $("#title").val()
            }
            function i() {
                return name = $("#title").val()
            }
            function t() {
                return name = $("#title").val()
            }
            function n() {
                return fileName = $("#title").val(), 
                fileName = fileName.replace(/[\s]+/gi, "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['filename_word_separator'], ENT_QUOTES, 'UTF-8', true);?>
"), 
                fileName = l(fileName), 
                fileName = fileName.replace(/[^0-9a-z_\-]+/gi, "").toLowerCase()
            }
            function l(e) {
                for (var a = "А-а-Б-б-В-в-Ґ-ґ-Г-г-Д-д-Е-е-Ё-ё-Є-є-Ж-ж-З-з-И-и-І-і-Ї-ї-Й-й-К-к-Л-л-М-м-Н-н-О-о-П-п-Р-р-С-с-Т-т-У-у-Ф-ф-Х-х-Ц-ц-Ч-ч-Ш-ш-Щ-щ-Ъ-ъ-Ы-ы-Ь-ь-Э-э-Ю-ю-Я-я".split("-"), i = "A-a-B-b-V-v-G-g-G-g-D-d-E-e-E-e-E-e-ZH-zh-Z-z-I-i-I-i-I-i-J-j-K-k-L-l-M-m-N-n-O-o-P-p-R-r-S-s-T-t-U-u-F-f-H-h-TS-ts-CH-ch-SH-sh-SCH-sch-'-'-Y-y-'-'-E-e-YU-yu-YA-ya".split("-"), t = "", n = 0, l = e.length; l > n; n++) {
                    var o = e.charAt(n),c = a.indexOf(o);t += c >= 0 ? i[c] : o
                }
                return t
            }
            meta_title_touched = !0, 
            keywords_touched = !0, 
            description_touched = !0, 
            fileName_touched = !0, 
            ($("#meta_title").val() == i() || "" == $("#meta_title").val()) && (meta_title_touched = !1), 
            ($("#keywords").val() == i() || "" == $("#keywords").val()) && (keywords_touched = !1), 
            ($("#description").val() == t() || "" == $("#description").val()) && (description_touched = !1), 
            ($("#fileName").val() == n() || "" == $("#fileName").val()) && (fileName_touched = !1), 
            $("#meta_title").change(function () {
                meta_title_touched = !0
            }), 
            $("#keywords").change(function () {
                keywords_touched = !0
            }), 
            $("#description").change(function () {
                description_touched = !0
            }), 
            $("#fileName").change(function () {
                fileName_touched = !0
            }), 
            $("#title").keyup(function () {
                e()
            })
        });
    <?php echo '</script'; ?>
>

    <form action="products.php" method="post" id="article" enctype="multipart/form-data">
        <input type="hidden" name="article[articleId]" value="<?php if (isset($_smarty_tpl->tpl_vars['article']->value['articleId'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['articleId'], ENT_QUOTES, 'UTF-8', true);
}?>" />
        <input type="hidden" name="action[save]" value="1" />
    
        <div class="col-md-12">  
            <div class="panel panel-default tabs ">                   
                <ul class="nav nav-tabs nav-justified">
                    <li class="active"><a href="#general" data-toggle="tab" aria-expanded="true">Основные</a></li>
                    <li class=""><a href="#summary" data-toggle="tab" aria-expanded="false">Анонс</a></li>
                    <li class=""><a href="#content" data-toggle="tab" aria-expanded="false">Подробнее</a></li>
                    <li class=""><a href="#gallery" data-toggle="tab" aria-expanded="false">Галерея</a></li>
                    <li class=""><a href="#misc" data-toggle="tab" aria-expanded="false">Разное</a></li>
                    <li class=""><a href="#seo" data-toggle="tab" aria-expanded="false">Seo</a></li>
                </ul> 
                     
                <div class="panel-body tab-content nopadding">
                    <div class="tab-pane active" id="general">
                        <div class="panel panel-default" style="margin-bottom: 0px;">
                            <div class="panel-body">
                                <div class="col-md-8">
                                    <div class="col-md-6 nopadding_left">
                                        <div class="form-group"><label class="field_name">Cтатус</label>
                                            <?php if (isset($_smarty_tpl->tpl_vars['article']->value['status'])) {?>
                                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['statuses']->value,'name'=>"article[status]",'id'=>"status",'selected'=>$_smarty_tpl->tpl_vars['article']->value['status'],'class'=>"form-control select"),$_smarty_tpl);?>

                                            <?php } else { ?>
                                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['statuses']->value,'name'=>"article[status]",'id'=>"status",'class'=>"form-control select"),$_smarty_tpl);?>

                                            <?php }?>
                                        </div>
                                    </div>

                                    <div class="col-md-6 nopadding_right">
                                        <div class="form-group">
                                            <label class="field_name <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['sectionId'])) {?>fError<?php }?>">Раздел</label>
                                            <?php if (isset($_smarty_tpl->tpl_vars['article']->value['sectionId'])) {?>
                                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['sections']->value,'name'=>"article[sectionId]",'id'=>"sectionId",'selected'=>$_smarty_tpl->tpl_vars['article']->value['sectionId'],'class'=>"form-control select"),$_smarty_tpl);?>

                                            <?php } else { ?>
                                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['sections']->value,'name'=>"article[sectionId]",'id'=>"sectionId",'class'=>"form-control select"),$_smarty_tpl);?>

                                            <?php }?>
                                        </div> 
                                    </div>
                                    <div class="form-group">
                                        <label class="field_name <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['title'])) {?>fError<?php }?>">Название продукта</label>
                                        <input class="form-control" autocomplete="off" id="title" type="text" name="article[title]" value="<?php if (isset($_smarty_tpl->tpl_vars['article']->value['title'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['title'], ENT_QUOTES, 'UTF-8', true);
}?>" onblur="proposeFileName('title', 'fileName', 'article', '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['filename_word_separator'], ENT_QUOTES, 'UTF-8', true);?>
', '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['convert_filename_to_lowercase'], ENT_QUOTES, 'UTF-8', true);?>
');" />
                                    </div>
                                    <div class="form-group">
                                        <label class="field_name <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['fileName']) || isset($_smarty_tpl->tpl_vars['errors']->value['fileNameExists']) || isset($_smarty_tpl->tpl_vars['errors']->value['fileNameProhibited']) || isset($_smarty_tpl->tpl_vars['errors']->value['fileNameCharacters'])) {?>fError<?php }?>">URL</label>
                                        <input class="form-control" autocomplete="off" id="fileName" type="text" name="article[fileName]" value="<?php if (isset($_smarty_tpl->tpl_vars['article']->value['fileName'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['fileName'], ENT_QUOTES, 'UTF-8', true);
}?>" />
                                    </div>
                                    <div class="form-group">
                                        <label class="field_name">Размеры</label>
                                        <input class="form-control" autocomplete="off" id="alias" type="text" name="article[alias]" value="<?php if (isset($_smarty_tpl->tpl_vars['article']->value['alias'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['alias'], ENT_QUOTES, 'UTF-8', true);
}?>" />
                                    </div>
                                    <div class="col-md-12 nopadding">
                                        <div class="col-md-6 nopadding_left"> 
                                            <div class="form-group">                                        
                                                <label class="field_name">Артикул</label>
                                                <input class="form-control" autocomplete="off" type="text" name="article[articul]" value="<?php if (isset($_smarty_tpl->tpl_vars['article']->value['articul'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['articul'], ENT_QUOTES, 'UTF-8', true);
}?>" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 nopadding_right">  
                                            <div class="form-group">
                                                <label class="field_name">Цена продукта</label>
                                                <input class="form-control" autocomplete="off" type="text" name="article[price]" value="<?php if (isset($_smarty_tpl->tpl_vars['article']->value['price'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['price'], ENT_QUOTES, 'UTF-8', true);
}?>" />
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="col-md-12 nopadding_left">
                                        <div class="form-group">
                                            <label class="field_name">Дата публикации</label>
                                            <div class="date">
                                                <?php if (isset($_smarty_tpl->tpl_vars['article']->value['publishedOn'])) {?>
                                                    <?php echo smarty_function_html_select_date(array('time'=>(($tmp = @$_smarty_tpl->tpl_vars['article']->value['publishedOn'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['adjustedNow']->value : $tmp),'day_value_format'=>"%02d",'field_array'=>"article",'prefix'=>'','start_year'=>"-5",'end_year'=>"+1",'class'=>"form-control select"),$_smarty_tpl);?>
 -
                                                <?php } else { ?>
                                                    <?php echo smarty_function_html_select_date(array('day_value_format'=>"%02d",'field_array'=>"article",'prefix'=>'','start_year'=>"-5",'end_year'=>"+1",'class'=>"form-control select"),$_smarty_tpl);?>
 -
                                                <?php }?>
                                                <?php if ($_smarty_tpl->tpl_vars['config']->value['use_24_hours']) {?>
                                                    <?php if (isset($_smarty_tpl->tpl_vars['article']->value['publishedOn'])) {?>
                                                        <?php echo smarty_function_html_select_time(array('display_seconds'=>false,'time'=>(($tmp = @$_smarty_tpl->tpl_vars['article']->value['publishedOn'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['adjustedNow']->value : $tmp),'field_array'=>"article",'prefix'=>'','class'=>"form-control select"),$_smarty_tpl);?>

                                                    <?php } else { ?>
                                                        <?php echo smarty_function_html_select_time(array('display_seconds'=>false,'field_array'=>"article",'prefix'=>'','class'=>"form-control select"),$_smarty_tpl);?>

                                                    <?php }?>
                                                <?php } else { ?>
                                                    <?php if (isset($_smarty_tpl->tpl_vars['article']->value['publishedOn'])) {?>
                                                        <?php echo smarty_function_html_select_time(array('display_seconds'=>false,'display_meridian'=>true,'use_24_hours'=>false,'time'=>(($tmp = @$_smarty_tpl->tpl_vars['article']->value['publishedOn'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['adjustedNow']->value : $tmp),'field_array'=>"article",'prefix'=>'','class'=>"form-control select"),$_smarty_tpl);?>

                                                    <?php } else { ?>
                                                        <?php echo smarty_function_html_select_time(array('display_seconds'=>false,'display_meridian'=>true,'use_24_hours'=>false,'field_array'=>"article",'prefix'=>'','class'=>"form-control select"),$_smarty_tpl);?>

                                                    <?php }?>
                                                <?php }?>
                                            </div>
                                        </div>
                                        <hr>
                                    <div class="form-group">
                                        <label class="field_name">Текущий URL</label>
                                        <input class="form-control" readonly="true" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
" />
                                    </div>
                                    <div class="form-group">
                                        <label class="field_name">Прошлый URL (с этого URL будет 301 редирект на текущий URL)</label>
                                        <input class="form-control" type="text" name="article[oldUrl]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['oldUrl'], ENT_QUOTES, 'UTF-8', true);?>
" />
                                    </div>
                                    <hr>
                                    </div>
                                </div> 
                       
                                <div class="col-md-4">
        			                <div class="col-md-12 nopadding">
                                        <div class="form-group">
                                            <label class="field_name">Изображение продукта</label>                                                                                           
                                            <?php if (isset($_smarty_tpl->tpl_vars['article']->value['hasImage']) && $_smarty_tpl->tpl_vars['article']->value['hasImage'] == 1) {?>
                                            <div class="file-previewzo-obzor" id="imageOptions">
                                                <div class="close delete fileinput-remove text-right" onclick="return deleteProductImage(<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['articleId'], ENT_QUOTES, 'UTF-8', true);?>
);" data-toggle="tooltip" data-placement="left" data-original-title="Удалить картинку">×</div>
                                                <div class="file-preview-thumbnails">
                                                    <div class="file-preview-frame" id="imageOptions">
                                                        <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['images']['medium']['url'], ENT_QUOTES, 'UTF-8', true);?>
" class="file-preview-image" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['images']['medium']['fileName'], ENT_QUOTES, 'UTF-8', true);?>
">
                                                    </div>
                                                    <span id="deletingStatus"></span>
                                                </div>
                                            </div>
                                            <?php }?>
                                            <div class=""><input type="file" multiple="" name="image" id="file-simple"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="summary"><textarea name="article[summary]" class="description"><?php if (isset($_smarty_tpl->tpl_vars['article']->value['summary'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['summary'], ENT_QUOTES, 'UTF-8', true);
}?></textarea></div>
                    <div class="tab-pane" id="content"><textarea name="article[content]" class="description"><?php if (isset($_smarty_tpl->tpl_vars['article']->value['content'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['content'], ENT_QUOTES, 'UTF-8', true);
}?></textarea></div>

                    
                    <div class="tab-pane" id="gallery">
                        <div class="panel-body">  
                            <div class="col-md-8 col-xs-12 nopadding">
                                <div id="fileList">
                                    <div class="body-gallery">
                                        <div class="pull-left push-up-10 col-md-12 col-xs-12">
                                            <label class="field_name">Загруженные картинки</label>
                                        </div>
                                        <div class="gallery" id="links">
                                        <?php if (isset($_smarty_tpl->tpl_vars['fileList']->value)) {?>
                                            <?php $_smarty_tpl->_assignInScope('a', 1);?>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['fileList']->value, 'file', false, NULL, 'fileList', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['file']->value) {
?>
                                            <div class="gallery-item item-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['file']->value['imageId'], ENT_QUOTES, 'UTF-8', true);?>
">
                                                <div class="image" id="image-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['file']->value['imageId'], ENT_QUOTES, 'UTF-8', true);?>
">                              
                                                    <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/uploads/gallery/medium-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['file']->value['fileName'], ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['file']->value['alt'], ENT_QUOTES, 'UTF-8', true);?>
"/>                                        
                                                    <ul class="gallery-item-controls">
                                                        <li><span class="edit_image" data-id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['file']->value['imageId'], ENT_QUOTES, 'UTF-8', true);?>
" data-desc="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['file']->value['description'], ENT_QUOTES, 'UTF-8', true);?>
" data-link="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['file']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" data-toggle="modal" data-target="#edit_image"><i class="fa fa-pen"></i></span></li>
                                                        <li><span class="delete_image" data-id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['file']->value['imageId'], ENT_QUOTES, 'UTF-8', true);?>
"><i class="fa fa-times"></i></span></li>
                                                    </ul>                                                                     
                                                </div>
                                                <div class="meta">
                                                    <strong><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['file']->value['fileName'], ENT_QUOTES, 'UTF-8', true);?>
</strong>
                                                    <span class="im_desc"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['file']->value['description'], ENT_QUOTES, 'UTF-8', true);?>
</span>
                                                    <span class="im_link"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['file']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
</span>
                                                </div>                                
                                            </div>
                                            <?php if ($_smarty_tpl->tpl_vars['a']->value == 4) {?>
                                            <?php $_smarty_tpl->_assignInScope('a', 0);?>
                                            <div class="clearfix"></div>
                                            <?php }?>
                                            <?php $_smarty_tpl->_assignInScope('a', $_smarty_tpl->tpl_vars['a']->value+1);?>
                                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                        <?php }?>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-12">
                                <div class="col-md-12 col-xs-12 nopadding">
                                    <div class=" push-up-10  push-down-10 control-label"><label class="field_name"> Добавьте картинки</label></div><span class="dz-success"> </span>
                                </div>
                                <div class="col-md-12 col-xs-12 nopadding"><div id="dZUpload" class="dropzone dropzone-mini"><div class="dz-default dz-message"></div></div></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="misc">
                        <div class="panel panel-default">
                            <div class="panel-body"> 
                                <?php if ($_smarty_tpl->tpl_vars['adminUser']->value['accessLevel'] != "writer") {?>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding_left"><label class="field_name">Избранная</label></div>
                                    <div class="col-md-6 nopadding_right">
                                        <select name="article[isFeatured]" class="form-control select">
                                            <option value="0" <?php if (isset($_smarty_tpl->tpl_vars['article']->value['isFeatured']) && $_smarty_tpl->tpl_vars['article']->value['isFeatured'] == 0) {?> selected<?php }?>>Нет</option>
                                            <option value="1" <?php if (isset($_smarty_tpl->tpl_vars['article']->value['isFeatured']) && $_smarty_tpl->tpl_vars['article']->value['isFeatured'] == 1) {?> selected<?php }?>>Да</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding_left"><label class="field_name">Комментарии</label></div>
                                    <div class="col-md-6 nopadding_right">
                                        <select name="article[isFeatured]" class="form-control select">
                                            <option value="0" <?php if (isset($_smarty_tpl->tpl_vars['article']->value['commentsEnabled']) && $_smarty_tpl->tpl_vars['article']->value['commentsEnabled'] == 0) {?> selected<?php }?>>Настройки по умолчанию</option>
                                            <option value="-1" <?php if (isset($_smarty_tpl->tpl_vars['article']->value['commentsEnabled']) && $_smarty_tpl->tpl_vars['article']->value['commentsEnabled'] == -1) {?> selected<?php }?>>Отключить комментарии</option>
                                            <option value="1" <?php if (isset($_smarty_tpl->tpl_vars['article']->value['commentsEnabled']) && $_smarty_tpl->tpl_vars['article']->value['commentsEnabled'] == 1) {?> selected<?php }?>>Включить комментарии</option>
                                        </select>
                                    </div>
                                </div>
                                <?php }?>
                      
                                <?php if (isset($_smarty_tpl->tpl_vars['article']->value['modifiedOn'])) {?>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding_left"><label class="field_name">Изменено</label></div>
                                    <div class="col-md-6 nopadding_right"><i><?php echo $_smarty_tpl->tpl_vars['article']->value['modifiedOn'];?>
 (<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['article']->value['modifiedBy']['loginName'])===null||$tmp==='' ? "Неизвестный пользователь" : $tmp), ENT_QUOTES, 'UTF-8', true);?>
)</i></div>
                                </div>
                                <?php }?>
                                <?php if (isset($_smarty_tpl->tpl_vars['article']->value['addedOn'])) {?>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding_left"><label class="field_name">Создано</label></div>
                                    <div class="col-md-6 nopadding_right"><i><?php echo $_smarty_tpl->tpl_vars['article']->value['addedOn'];?>
 (<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['article']->value['addedBy']['loginName'])===null||$tmp==='' ? "Неизвестный пользователь" : $tmp), ENT_QUOTES, 'UTF-8', true);?>
)</i></div>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
        		        
                    <div class="tab-pane" id="seo">
                        <div class="panel panel-default">
                            <div class="panel-body"> 
                                <div class="form-group">
                                    <label class="field_name">Заголовок (Meta title)</label>
                                    <input class="form-control" autocomplete="off" id="meta_title" type="text" name="article[meta_title]" value="<?php if (isset($_smarty_tpl->tpl_vars['article']->value['meta_title'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['meta_title'], ENT_QUOTES, 'UTF-8', true);
}?>"/>
                                </div>
                                <div class="form-group">
                                    <label class="field_name">Ключевые слова (Meta keywords)</label>
                                    <textarea id="keywords" name="article[keywords]" class="form-control" rows="3"><?php if (isset($_smarty_tpl->tpl_vars['article']->value['keywords'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['keywords'], ENT_QUOTES, 'UTF-8', true);
}?></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="field_name">Описание (Meta description)</label>
                                    <textarea id="description" name="article[description]" class="form-control" rows="3"><?php if (isset($_smarty_tpl->tpl_vars['article']->value['description'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['description'], ENT_QUOTES, 'UTF-8', true);
}?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
            </div>                        
        </div>	
      	<div class="col-md-12 main main_buttons text-center">
      		<input class="btn btn-primary" type="submit" name="action[save]" value="&nbsp; Сохранить &nbsp;" onclick="document.getElementById('article').target='_self'; document.getElementById('article').action='<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['GLOBAL_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/admin<?php if ($_smarty_tpl->tpl_vars['SITE_LANG']->value != '') {?>/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_LANG']->value, ENT_QUOTES, 'UTF-8', true);
}?>/products.php?page=<?php if (isset($_smarty_tpl->tpl_vars['page']->value)) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value, ENT_QUOTES, 'UTF-8', true);
}
if (isset($_smarty_tpl->tpl_vars['query']->value)) {?>&query=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['query']->value, ENT_QUOTES, 'UTF-8', true);
}
if (isset($_smarty_tpl->tpl_vars['section']->value)) {?>&section=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value, ENT_QUOTES, 'UTF-8', true);
}
if (isset($_smarty_tpl->tpl_vars['status']->value)) {?>&status=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['status']->value, ENT_QUOTES, 'UTF-8', true);
}?>'" />	&nbsp;
      		<a class="btn btn-primary" href="products.php?page=<?php if (isset($_smarty_tpl->tpl_vars['page']->value)) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value, ENT_QUOTES, 'UTF-8', true);
}
if (isset($_smarty_tpl->tpl_vars['query']->value)) {?>&query=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['query']->value, ENT_QUOTES, 'UTF-8', true);
}
if (isset($_smarty_tpl->tpl_vars['section']->value)) {?>&section=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value, ENT_QUOTES, 'UTF-8', true);
}
if (isset($_smarty_tpl->tpl_vars['status']->value)) {?>&status=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['status']->value, ENT_QUOTES, 'UTF-8', true);
}?>">Отменить</a>
      	</div>
    </form>

    <?php echo '<script'; ?>
 type="text/javascript"><!--
    	document.getElementById('article').title.focus();
    //-->
    <?php echo '</script'; ?>
>
<?php } elseif (!isset($_smarty_tpl->tpl_vars['errors']->value['access_denied'])) {?>


    <div class="content-frame" style="margin-bottom:10px;">
        <div class="content-frame-top">                        
            <div class="col-md-6 col-xs-6 nopadding_left"><h2>Продукция</h2></div> 
            <div class="col-md-6 col-xs-6 nopadding_right">        
                <a class="btn btn-danger pull-right" href="products.php?action[edit]=true" data-toggle="tooltip" data-placement="left" data-original-title="Добавить"><i class="fa fa-plus"></i></a>
            </div>
        </div>
    </div>

    <div id="searchRow">
	    <div class="col-md-12">
	        <form id="searchForm">
	    	    <div class=" panel panel-colorful">
                    <div class="panel-body">
                        <div class="col-md-4 col-xs-12">
                            <label class="field_name">Поиск по названию</label>
                            <i data-toggle="tooltip" data-placement="top" title="" data-original-title="Поиск по названию" class="fa fa-question-circle"></i>  
                            <input id="quick-search" class="form-control" type="text" name="query" value="<?php if (isset($_smarty_tpl->tpl_vars['query']->value)) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['query']->value, ENT_QUOTES, 'UTF-8', true);
}?>" autocomplete="off" placeholder="Поиск по названию"/>
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <label class="field_name">Фильтровать по направлению</label>
                            <?php if (isset($_smarty_tpl->tpl_vars['section']->value)) {?>
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['sections']->value,'selected'=>$_smarty_tpl->tpl_vars['section']->value,'name'=>"section",'class'=>"form-control select",'onchange'=>"this.form.submit()"),$_smarty_tpl);?>

                            <?php } else { ?>
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['sections']->value,'name'=>"section",'class'=>"form-control select",'onchange'=>"this.form.submit()"),$_smarty_tpl);?>

                            <?php }?>
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <label class="field_name">Статус</label>
                            <i data-toggle="tooltip" data-placement="top" title="" data-original-title="Статус" class="fa fa-question-circle"></i>
                            <?php if (isset($_smarty_tpl->tpl_vars['status']->value)) {?>
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['statuses']->value,'selected'=>$_smarty_tpl->tpl_vars['status']->value,'name'=>"status",'class'=>"form-control select",'onchange'=>"this.form.submit()"),$_smarty_tpl);?>

                            <?php } else { ?>
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['statuses']->value,'name'=>"status",'class'=>"form-control select",'onchange'=>"this.form.submit()"),$_smarty_tpl);?>

                            <?php }?>
                        </div>
                        <div class="clear"></div>
                        <div class="col-md-12 col-xs-12 text-right"><input class=" btn btn-primary" type="submit" value="Фильтр"/></div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="col-md-12">
	    <form action="products.php<?php if ($_smarty_tpl->tpl_vars['page']->value) {?>?page=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value, ENT_QUOTES, 'UTF-8', true);
}?>" method="post"> 
            <div class="panel panel-default">
                <div class="panel-body panel-body-table">
                    <div class="table-responsive">
                        <table class="table table-striped table-actions table-hover" id="articles">
                            <thead>
                                <tr>
                                    <th class="text-center" width="50">ID</th>
                                    <th class="text-center" width="50">Дата</th>
                                    <th class="text-center" width="50">Картинка</th>
                                    <th>Наименование</th>
                                    <th>Раздел</th>
                                    <th class="text-center" width="50">Избраное</th>
                                    <th class="text-center">Статус</th>
                                    <th class="text-center" width="140">Действие</th>
                                </tr>
                            </thead>
                            <?php if (isset($_smarty_tpl->tpl_vars['articles']->value)) {?>
                                <tbody>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['articles']->value, 'article', false, NULL, 'articles', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
?>
                                        <tr id="article-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['articleId'], ENT_QUOTES, 'UTF-8', true);?>
">
                                             <td class="text-center" nowrap="nowrap"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['articleId'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                                            <td class="text-center" nowrap="nowrap"><?php echo $_smarty_tpl->tpl_vars['article']->value['publishedOn'];?>
</td>
                                            <td class="text-center">
                                                <?php if ($_smarty_tpl->tpl_vars['article']->value['hasImage'] == '1') {?>
                                                    <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['images']['medium']['url'], ENT_QUOTES, 'UTF-8', true);?>
" class="article_img" style="width: 50px"/>
                                                <?php } else { ?>
                                                    <img src="assets/img/no_images.jpg" class="article_img"/>
                                                <?php }?>
                                            </td>
                                            <td width="100%">
                                                <a href="<?php if ($_smarty_tpl->tpl_vars['article']->value['status'] == 'visible') {
echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['url'], ENT_QUOTES, 'UTF-8', true);
} else {
echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/preview.php?articleId=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['articleId'], ENT_QUOTES, 'UTF-8', true);
}?>" target="_blank"><?php echo htmlspecialchars(smarty_modifier_truncate($_smarty_tpl->tpl_vars['article']->value['title'],75), ENT_QUOTES, 'UTF-8', true);?>
</a>
                                            </td>
                                            <td nowrap="nowrap"><span data-toggle="tooltip" data-placement="top" data-original-title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['section']['name'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars(smarty_modifier_truncate($_smarty_tpl->tpl_vars['article']->value['section']['name'],25), ENT_QUOTES, 'UTF-8', true);?>
</span></td>
                                            <td class="text-center" nowrap="nowrap">
                                                <?php if ($_smarty_tpl->tpl_vars['article']->value['isFeatured']) {?><span style="color:yellow;" class="fa fa-star"></span><?php } elseif (!$_smarty_tpl->tpl_vars['article']->value['isFeatured']) {?><span class="fa fa-star"></span><?php }?>
                                            </td>
                                            <td id="status-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['articleId'], ENT_QUOTES, 'UTF-8', true);?>
">
                                                <?php echo $_smarty_tpl->tpl_vars['article']->value['statusName'];?>

                                                <?php if ($_smarty_tpl->tpl_vars['adminUser']->value['accessLevel'] != 'writer' && $_smarty_tpl->tpl_vars['article']->value['status'] == 'pending') {?><br />
                                                    <p class="act-deistvie action small" onclick="return approveProduct(<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['articleId'], ENT_QUOTES, 'UTF-8', true);?>
);">(Одобрить)</p>
                                                <?php }?>
                                            </td>
                                            <td class="btn-link-action text-center">
                                                <a class="btn btn-rounded" href="products.php?action[edit]=true&article[articleId]=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['articleId'], ENT_QUOTES, 'UTF-8', true);
if (isset($_smarty_tpl->tpl_vars['page']->value)) {?>&page=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value, ENT_QUOTES, 'UTF-8', true);
}
if (isset($_smarty_tpl->tpl_vars['query']->value)) {?>&query=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['query']->value, ENT_QUOTES, 'UTF-8', true);
}
if (isset($_smarty_tpl->tpl_vars['section']->value)) {?>&section=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value, ENT_QUOTES, 'UTF-8', true);
}
if (isset($_smarty_tpl->tpl_vars['status']->value)) {?>&status=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['status']->value, ENT_QUOTES, 'UTF-8', true);
}?>"><span class="fa fa-pen"></span></a>
                                                <a class="btn btn-danger btn-rounded" onclick="deleteProduct(<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['articleId'], ENT_QUOTES, 'UTF-8', true);?>
, '<?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
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
                                        <td colspan="9">
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
                                                            <li class="active"><a href="products.php?page=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['number']->value, ENT_QUOTES, 'UTF-8', true);
if (isset($_smarty_tpl->tpl_vars['query']->value)) {?>&query=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['query']->value, ENT_QUOTES, 'UTF-8', true);
}
if (isset($_smarty_tpl->tpl_vars['section']->value)) {?>&section=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value, ENT_QUOTES, 'UTF-8', true);
}
if (isset($_smarty_tpl->tpl_vars['status']->value)) {?>&status=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['status']->value, ENT_QUOTES, 'UTF-8', true);
}?>"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['number']->value, ENT_QUOTES, 'UTF-8', true);?>
</a></li>
                                                        <?php } elseif ($_smarty_tpl->tpl_vars['number']->value == '...') {?>
                                                            ...
                                                        <?php } else { ?>
                                                            <li><a href="products.php?page=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['number']->value, ENT_QUOTES, 'UTF-8', true);
if (isset($_smarty_tpl->tpl_vars['query']->value)) {?>&query=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['query']->value, ENT_QUOTES, 'UTF-8', true);
}
if (isset($_smarty_tpl->tpl_vars['section']->value)) {?>&section=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value, ENT_QUOTES, 'UTF-8', true);
}
if (isset($_smarty_tpl->tpl_vars['status']->value)) {?>&status=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['status']->value, ENT_QUOTES, 'UTF-8', true);
}?>"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['number']->value, ENT_QUOTES, 'UTF-8', true);?>
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
                                <tbody><tr class="odd"><td class="data none" colspan="8" align="center">- Не найдено -</td></tr></tbody>
                            <?php }?>
                        </table>
                    </div>                                
                </div>
            </div> 
        </form>	
    </div>

  <?php echo '<script'; ?>
 type="text/javascript">
    <?php if (isset($_smarty_tpl->tpl_vars['query']->value) || isset($_smarty_tpl->tpl_vars['status']->value) || isset($_smarty_tpl->tpl_vars['section']->value)) {?>showSearchForm(true);<?php }?>
  <?php echo '</script'; ?>
>
<?php }?>

</div> 

<?php $_smarty_tpl->_subTemplateRender('file:tinymce_init.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '<script'; ?>
>
    var articleId = '<?php if (isset($_smarty_tpl->tpl_vars['article']->value['articleId'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['articleId'], ENT_QUOTES, 'UTF-8', true);
}?>';
    
    $(document).ready(function () {
        Dropzone.autoDiscover = false; 
        $("#dZUpload").dropzone({ 
            url: "products.php", 
            addRemoveLinks: false, 
            maxFilesize: 2,
            acceptedFiles: "image/*",
            params: {
                'action':'uploadImage',
                'articleId': articleId
            },
            success: function (file, response) { 
                file.previewElement.classList.add("dz-success"); 
                successImageMessage()
                $('#links').html(response);
                setTimeout(function(){
                    $('.dz-success').fadeOut('slow');
                },2500);
            }, 
            error: function (file, response) { 
                file.previewElement.classList.add("dz-error"); 
            }
        }); 
    });
    
    $("#file-simple").fileinput({
      	showUpload: false,
      	uploadClass: "btn btn-success",
      	uploadLabel: "Upload",
      	showCaption: false,
      	showRemove: true,
      	removeClass: "btn btn-danger",
      	removeLabel: "Удалить",
      	browseClass: "btn btn-primary",
      	fileType: "any",
      	showPreview: true,
      	allowedFileTypes: ["image"],
        allowedFileExtensions: ["jpg", "jpeg", "gif", "png"],
        elErrorContainer: "#errorBlock",
        overwriteInitial: true,
        maxFileSize: 2000
    });
    
    $(".edit_image").click(function() {
        var id   = $(this).data('id');
        var link = $(this).data('link');
        var desc = $(this).data('desc');
        $('.save_edit_image').val(id);
        $('#image_description').val(desc);
        $('#image_url').val(link);
    });
    
    $('.save_edit_image').click(function(e){	
        var id = $('.save_edit_image').val();
        var desc = $('#image_description').val();
        var link = $('#image_url').val();
        $.post('products.php', { id: id, desc: desc, link: link, action: 'editimage' }, function(data){
            if (data.update == 1){            
                $('.gallery-item.item-'+id+' .im_desc').text(desc);
                $('.gallery-item.item-'+id+' .im_link').text(link);
            }

        }, 'json');
    });           
<?php echo '</script'; ?>
>


<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
