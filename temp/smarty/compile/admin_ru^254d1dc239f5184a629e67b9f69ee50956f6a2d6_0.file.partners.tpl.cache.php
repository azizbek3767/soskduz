<?php
/* Smarty version 3.1.33, created on 2025-07-12 16:15:47
  from '/home/soskduz/public_html/admin/templates/partners.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_687243e34ffd27_06900149',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '254d1dc239f5184a629e67b9f69ee50956f6a2d6' => 
    array (
      0 => '/home/soskduz/public_html/admin/templates/partners.tpl',
      1 => 1580169692,
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
function content_687243e34ffd27_06900149 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/function.html_options.php','function'=>'smarty_function_html_options',),1=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/function.html_select_date.php','function'=>'smarty_function_html_select_date',),2=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/function.html_select_time.php','function'=>'smarty_function_html_select_time',),3=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
$_smarty_tpl->compiled->nocache_hash = '1779357613687243e33e7b08_33087289';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('activeItem'=>"partners",'title'=>"Наши партнеры"), 0, false);
?>
<div class="page-content-wrap">

    <?php if (isset($_smarty_tpl->tpl_vars['messages']->value['saved'])) {?><span id="savedMessage" onclick="noty({ text: 'Партнер &laquo;<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
&raquo; сохранен.', layout: 'topRight', type: 'success', timeout: 1500 });"></span><?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['access_denied'])) {?><span id="accessDeniedError" onclick="noty({ text: 'Доступ запрещен.', layout: 'topRight', type: 'error', timeout: 1500 });"></span><?php }?>
	<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['title'])) {?><span id="titleError" onclick="noty({ text: 'Введите заголовок.', layout: 'topRight', type: 'error', timeout: 1500 });"></span><?php }?>
	<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['sectionId'])) {?><span id="sectionIdError" onclick="noty({ text: 'Выберите раздел.', layout: 'topRight', type: 'error', timeout: 1500 });"></span><?php }?>
	<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['not_saved'])) {?><span id="notSavedError" onclick="noty({ text: 'Партнер &laquo;<?php if (isset($_smarty_tpl->tpl_vars['article']->value['title'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['title'], ENT_QUOTES, 'UTF-8', true);
}?>&raquo; НЕ сохранен.', layout: 'topRight', type: 'error', timeout: 1500 });"></span><?php }?>
	<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['no_sections'])) {?><span id="noSectionsError" onclick="noty({ text: 'Перед добавлением статей, добавьте хотя бы один раздел.', layout: 'topRight', type: 'error', timeout: 1500 });"></span><?php }?> 
	<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['image_not_saved'])) {?><span id="imageNotSavedError" onclick="noty({ text: 'Картинка НЕ сохранена.', layout: 'topRight', type: 'error', timeout: 1500 });"></span><?php }?> 
	<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['article_not_found'])) {?><span id="articleNotFoundError" onclick="noty({ text: 'Партнер не найден или доступ запрещен.', layout: 'topRight', type: 'error', timeout: 1500 });"></span><?php }?>
	<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['fileName'])) {?><span id="fileNameError" onclick="noty({ text: 'Введите URL.', layout: 'topRight', type: 'error', timeout: 1500 });"></span><?php }?> 
	<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['fileNameExists'])) {?><span id="fileNameExistsError" onclick="noty({ text: 'Партнер с таким URL уже существует. Введите другой URL.', layout: 'topRight', type: 'error', timeout: 1500 });"></span><?php }?>
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
    function deleteArticleMessage(){ noty({ text: 'Партнер удален.', layout: 'topRight', type: 'success', timeout: 1500 }) }
    function deleteImageError(){ noty({ text: 'Картинка не удалена.', layout: 'topRight', type: 'error', timeout: 1500 }) }
    function deleteImageMessage(){ noty({ text: 'Картинка удалена.', layout: 'topRight', type: 'success', timeout: 1500 }) }
    function successImageMessage(){ noty({ text: 'Картинка успешно загружена', layout: 'topRight', type: 'success', timeout: 1500 }) }

    function deleteFileMessage(){ noty({ text: 'Файл удален', layout: 'topRight', type: 'success', timeout: 1500 } )}
             
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
            <div class="col-md-3 col-xs-3 nopadding_left"><h2>Наши партнеры</h2></div>
            <div class="col-md-6 col-xs-6 content-frame-body-left">
                <div id="ajaxStatus" class="alert alert-warning col-md-6 info-box-img" role="alert"></div>
                <div class="upload-image alert message" role="alert"></div>
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

	<form action="partners.php" method="post" id="article" enctype="multipart/form-data">
		<input type="hidden" name="article[articleId]" value="<?php if (isset($_smarty_tpl->tpl_vars['article']->value['articleId'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['articleId'], ENT_QUOTES, 'UTF-8', true);
}?>" />
		<input type="hidden" name="action[save]" value="1" />
        <div class="col-md-12">
            <div class="panel panel-default tabs">
                <ul class="nav nav-tabs nav-justified">
                    <li class="active"><a href="#general" data-toggle="tab" aria-expanded="true">Основное</a></li>
                    <li><a href="#summary" data-toggle="tab" aria-expanded="false">Анонс</a></li>
                    <li class=""><a href="#other" data-toggle="tab" aria-expanded="false">Разное</a></li>
                    <li class=""><a href="#seo" data-toggle="tab" aria-expanded="false">Seo</a></li>
                </ul>
    		    <div class="panel-body tab-content nopadding">
                    <div class="tab-pane active" id="general">
                        <div class="panel panel-default" style="margin-bottom: 0px;">
                            <div class="panel-body">
                                <div class="col-md-8">
                                    <?php if ($_smarty_tpl->tpl_vars['adminUser']->value['accessLevel'] != "writer") {?>
                                    <div class="form-group">
                                        <label class="field_name">Cтатус</label>
                                        <?php if (isset($_smarty_tpl->tpl_vars['article']->value['status'])) {?>
                                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['statuses']->value,'selected'=>(($tmp = @$_smarty_tpl->tpl_vars['article']->value['status'])===null||$tmp==='' ? "visible" : $tmp),'name'=>"article[status]",'id'=>"status",'class'=>"form-control select"),$_smarty_tpl);?>

                                        <?php } else { ?>
                                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['statuses']->value,'name'=>"article[status]",'id'=>"status",'class'=>"form-control select"),$_smarty_tpl);?>

                                        <?php }?>

                                    </div>
                                    <?php }?>
                                    <div class="form-group">
                                        <label class="field_name <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['sectionId'])) {?>fError<?php }?>">Раздел</label>
                                        <?php if (isset($_smarty_tpl->tpl_vars['sections']->value)) {?>
                                            <?php if (isset($_smarty_tpl->tpl_vars['article']->value['sectionId'])) {?>
                                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['sections']->value,'selected'=>(($tmp = @$_smarty_tpl->tpl_vars['article']->value['sectionId'])===null||$tmp==='' ? "0" : $tmp),'name'=>"article[sectionId]",'id'=>"sectionId",'class'=>"form-control select"),$_smarty_tpl);?>

                                            <?php } else { ?>
                                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['sections']->value,'name'=>"article[sectionId]",'id'=>"sectionId",'class'=>"form-control select"),$_smarty_tpl);?>

                                             <?php }?>
                                        <?php } else { ?>
                                            Не доступно<input type="hidden" name="article[sectionId]" value="0"/>
                                        <?php }?>
                                    </div>
                                    <div class="form-group">
                                        <label class="field_name <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['title'])) {?>fError<?php }?>">Заголовок</label>
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
                                        <label class="field_name">Ссылка</label>
                                        <input class="form-control" autocomplete="off" id="alias" type="text" name="article[link]" value="<?php if (isset($_smarty_tpl->tpl_vars['article']->value['link'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['link'], ENT_QUOTES, 'UTF-8', true);
}?>" />
                                    </div>
                                  
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-12 nopadding">
                                            <label class="field_name">Основная картинка</label>
                                            <?php if (isset($_smarty_tpl->tpl_vars['article']->value['hasImage']) && $_smarty_tpl->tpl_vars['article']->value['hasImage'] == 1) {?>
                                            <div class="file-previewzo-obzor" id="imageOptions">
                                                <div class="close fileinput-remove text-right" onclick="return deleteArticleImage(<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['articleId'], ENT_QUOTES, 'UTF-8', true);?>
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
                                            <div class=""><input type="file" name="image" id="file-simple"></div>
                                        </div>
    								</div>
    						    </div>
    				        </div>
    				    </div>
    		    	</div>
                    <div class="tab-pane" id="summary"> <textarea name="article[summary]" class="description"><?php if (isset($_smarty_tpl->tpl_vars['article']->value['summary'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['summary'], ENT_QUOTES, 'UTF-8', true);
}?></textarea></div>
                    
                    <div class="tab-pane" id="other">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-md-6 nopadding_left"><label class="field_name">Дата публикации</label></div>
                                    <div class="col-md-6 nopadding_right date">
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

                            
                                <?php if (isset($_smarty_tpl->tpl_vars['article']->value['modifiedOn'])) {?>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding_left">Изменено</div>
                                    <div class="col-md-6 nopadding_right"><i><?php echo $_smarty_tpl->tpl_vars['article']->value['modifiedOn'];?>
 (<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['article']->value['modifiedBy']['loginName'])===null||$tmp==='' ? "Неизвестный пользователь" : $tmp), ENT_QUOTES, 'UTF-8', true);?>
)</i></div>
                                </div>
                                <?php }?>

                                <?php if (isset($_smarty_tpl->tpl_vars['article']->value['addedOn'])) {?>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding_left">Создано</div>
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
                                    Заголовок (Meta title)
                                    <input class="form-control" autocomplete="off" id="meta_title" type="text" name="article[meta_title]" value="<?php if (isset($_smarty_tpl->tpl_vars['article']->value['meta_title'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['meta_title'], ENT_QUOTES, 'UTF-8', true);
}?>"/>
                                </div>
                                <div class="form-group">
                                    Ключевые слова (Meta keywords)
                                    <textarea id="keywords" name="article[keywords]" class="form-control" rows="3"><?php if (isset($_smarty_tpl->tpl_vars['article']->value['keywords'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['keywords'], ENT_QUOTES, 'UTF-8', true);
}?></textarea>
                                </div>
                                <div class="form-group">
                                    Описание (Meta description)
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
        <div class="clear"></div>
        <div class="col-md-12 main main_buttons text-center">
		    <input class="btn btn-primary" type="submit" name="action[save]" value="&nbsp; Сохранить &nbsp;" onclick="document.getElementById('article').target='_self'; document.getElementById('article').action='<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['GLOBAL_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/admin<?php if ($_smarty_tpl->tpl_vars['SITE_LANG']->value != '') {?>/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_LANG']->value, ENT_QUOTES, 'UTF-8', true);
}?>/partners.php<?php if (isset($_smarty_tpl->tpl_vars['page']->value)) {?>?page=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value, ENT_QUOTES, 'UTF-8', true);
}?>'" /> &nbsp;
            <a class="btn btn-primary" href="partners.php<?php if (isset($_smarty_tpl->tpl_vars['page']->value)) {?>?page=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value, ENT_QUOTES, 'UTF-8', true);
}?>">Отменить</a>
        </div>
    </form>

<?php } elseif (!isset($_smarty_tpl->tpl_vars['errors']->value['access_denied'])) {?>
  
     
    <div class="content-frame" style="margin-bottom:10px;">
        <div class="content-frame-top">                        
            <div class="col-md-6 col-xs-6 nopadding_left"><h2>Наши партнеры</h2></div> 
            <div class="col-md-6 col-xs-6 nopadding_right">                                                
                <div class="pull-right"> 
                    <a class="btn btn-danger" href="partners.php?action[edit]=true" data-toggle="tooltip" data-placement="left" data-original-title="Добавить"><i class="fa fa-plus"></i></a>
      				        
                </div>              
            </div>                           
        </div>
    </div>

    <div id="searchRow" style="display:none">
        <div class="col-md-12">
            <form id="searchForm">
                <div class="panel panel-colorful">
                    <div class="panel-body">
                        <div class="search_block_art">
                            <div class="col-md-4 col-xs-12 nopadding_left">
                                <input id="quick-search" class="form-control" type="text" name="query" value="<?php if (isset($_smarty_tpl->tpl_vars['query']->value)) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['query']->value, ENT_QUOTES, 'UTF-8', true);
}?>" autocomplete="off"/>
                            </div>
                            <div class="col-md-4 col-xs-12 nopadding_left">
                                <?php if (isset($_smarty_tpl->tpl_vars['section']->value)) {?>
                                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['sections']->value,'selected'=>(($tmp = @$_smarty_tpl->tpl_vars['section']->value)===null||$tmp==='' ? "0" : $tmp),'name'=>"section",'class'=>"form-control select"),$_smarty_tpl);?>

                                <?php } else { ?>
                                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['sections']->value,'name'=>"section",'class'=>"form-control select"),$_smarty_tpl);?>

                                <?php }?>
                            </div>
                            <div class="col-md-3 col-xs-12 nopadding_left">
                                <?php if (isset($_smarty_tpl->tpl_vars['status']->value)) {?>
                                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['statuses']->value,'selected'=>(($tmp = @$_smarty_tpl->tpl_vars['status']->value)===null||$tmp==='' ? '' : $tmp),'name'=>"status",'class'=>"form-control select"),$_smarty_tpl);?>

                                <?php } else { ?>
                                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['statuses']->value,'name'=>"status",'class'=>"form-control select"),$_smarty_tpl);?>

                                <?php }?>
                            </div>
                            <div class="col-md-1 col-xs-12 nopadding_right"><input style="float:right;"class=" btn btn-danger" type="submit" value="Поиск"/></div>
                        </div>
                    </div>                              
       	         </div>
            </form>
        </div>
    </div>
	
    <div class="col-md-12"> 
        <div class="panel panel-default">
            <div class="panel-body panel-body-table">
                <div class="table-responsive">
                    <table class="table table-striped table-actions table-hover" id="articles">
                        <thead>
                            <tr>
                                <th width="50">Картинка</th>
                                <th>Название</th>
                                <th width="100">Раздел</th>
                                <th width="100">Статус</th>
                                <th width="140">Действие</th>
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
                                <td class="text-center">
                                    <?php if ($_smarty_tpl->tpl_vars['article']->value['hasImage'] == '1') {?>
                                    <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['images']['medium']['url'], ENT_QUOTES, 'UTF-8', true);?>
" class="article_img"/>
                                    <?php } else { ?>
                                    <img src="assets/img/no_images.jpg" class="article_img" style="width:45px;"/>
                                    <?php }?>
                                </td>
                                <td style="line-height: 58px;" width="100%"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
" target="_blank" class="artTitle"><?php echo htmlspecialchars(smarty_modifier_truncate($_smarty_tpl->tpl_vars['article']->value['title'],75), ENT_QUOTES, 'UTF-8', true);?>
</a></td>
                                <td style="line-height: 58px;" nowrap="nowrap" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['section']['fullName'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['section']['name'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                                <td style="line-height: 58px;min-width: 120px;" id="status-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['articleId'], ENT_QUOTES, 'UTF-8', true);?>
">
                                    <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['statusName'], ENT_QUOTES, 'UTF-8', true);?>

                                    <?php if ($_smarty_tpl->tpl_vars['adminUser']->value['accessLevel'] != 'writer' && $_smarty_tpl->tpl_vars['article']->value['status'] == 'pending') {?><br />
                                        <p class="act-deistvie action small" onclick="return approveContent(<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['articleId'], ENT_QUOTES, 'UTF-8', true);?>
, 'partners');">(Одобрить)</p>
                                    <?php }?>
                                </td>
                                <td class="btn-link-action text-center">
                                    <a class="btn btn-rounded" href="partners.php?action[edit]=true&article[articleId]=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['articleId'], ENT_QUOTES, 'UTF-8', true);?>
&page=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value, ENT_QUOTES, 'UTF-8', true);?>
"><span class="fa fa-pen"></span></a>  
                                    <a class="btn btn-danger btn-rounded" onclick="deleteContent(<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['articleId'], ENT_QUOTES, 'UTF-8', true);?>
, '<?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
', 'partners');"><span class="fa fa-trash"></span></a>
                                </td>
                            </tr>
  						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="small" colspan="4">Результаты с <b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pageNums']->value['startIteration'], ENT_QUOTES, 'UTF-8', true);?>
</b> по <b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pageNums']->value['endIteration'], ENT_QUOTES, 'UTF-8', true);?>
</b> из <b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pageNums']->value['totalItems'], ENT_QUOTES, 'UTF-8', true);?>
</b></td>
                                <td align="right" colspan="3">
                                    <?php if (isset($_smarty_tpl->tpl_vars['pageNums']->value['pages'])) {?>             
                                    <ul class="pagination pagination-sm pull-right push-down-10 push-up-10">
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pageNums']->value['pages'], 'number');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['number']->value) {
?>
                                        <?php if ($_smarty_tpl->tpl_vars['number']->value == $_smarty_tpl->tpl_vars['page']->value) {?>
                                        <li class="active"><a href="partners.php?page=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['number']->value, ENT_QUOTES, 'UTF-8', true);
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
                                        <li><a href="partners.php?page=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['number']->value, ENT_QUOTES, 'UTF-8', true);
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
                        <tbody><tr class="odd"><td class="data none" colspan="7" align="center">- Не найдено -</td></tr></tbody>
                        <?php }?>   
                    </table>
                </div>
            </div>
        </div> 	
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
            url: "partners.php", 
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
        $.post('partners.php', { id: id, desc: desc, link: link, action: 'editimage' }, function(data){
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
