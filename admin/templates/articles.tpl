{include file="header.tpl" activeItem="articles" title="{articles:title}"}
<div class="page-content-wrap">

    {if isset($messages.saved)}<span id="savedMessage" onclick="noty({ text: '{articles:messages:0}', layout: 'topRight', type: 'success', timeout: 1500 });"></span>{/if}
    {if isset($errors.access_denied)}<span id="accessDeniedError" onclick="noty({ text: '{articles:errors:0}', layout: 'topRight', type: 'error', timeout: 1500 });"></span>{/if}
	{if isset($errors.title)}<span id="titleError" onclick="noty({ text: '{articles:errors:1}', layout: 'topRight', type: 'error', timeout: 1500 });"></span>{/if}
	{if isset($errors.sectionId)}<span id="sectionIdError" onclick="noty({ text: '{articles:errors:2}', layout: 'topRight', type: 'error', timeout: 1500 });"></span>{/if}
	{if isset($errors.not_saved)}<span id="notSavedError" onclick="noty({ text: '{articles:errors:3}', layout: 'topRight', type: 'error', timeout: 1500 });"></span>{/if}
	{if isset($errors.no_sections)}<span id="noSectionsError" onclick="noty({ text: '{articles:errors:4}', layout: 'topRight', type: 'error', timeout: 1500 });"></span>{/if} 
	{if isset($errors.image_not_saved)}<span id="imageNotSavedError" onclick="noty({ text: '{articles:errors:5}', layout: 'topRight', type: 'error', timeout: 1500 });"></span>{/if} 
	{if isset($errors.article_not_found)}<span id="articleNotFoundError" onclick="noty({ text: '{articles:errors:6}', layout: 'topRight', type: 'error', timeout: 1500 });"></span>{/if}
	{if isset($errors.fileName)}<span id="fileNameError" onclick="noty({ text: '{articles:errors:7}', layout: 'topRight', type: 'error', timeout: 1500 });"></span>{/if} 
	{if isset($errors.fileNameExists)}<span id="fileNameExistsError" onclick="noty({ text: '{articles:errors:8}', layout: 'topRight', type: 'error', timeout: 1500 });"></span>{/if}
	{if isset($errors.htaccess)}<span id="htaccessError" onclick="noty({ text: '{articles:errors:9}', layout: 'topRight', type: 'error', timeout: 1500 });"></span>{/if}
	{if isset($errors.serializations)}<span id="serializationsError" onclick="noty({ text: '{articles:errors:10}', layout: 'topRight', type: 'error', timeout: 1500 });"></span>{/if}
	{if isset($errors.fileNameProhibited)}<span id="fileNameProhibitedError" onclick="noty({ text: '{articles:errors:11}', layout: 'topRight', type: 'error', timeout: 1500 });"></span>{/if}
	{if isset($errors.fileNameCharacters)}<span id="fileNameCharactersError" onclick="noty({ text: '{articles:errors:12}', layout: 'topRight', type: 'error', timeout: 1500 });"></span>{/if}
	<script>
  	
    $(document).ready(function () {
      
      {if isset($errors.access_denied)} $('#accessDeniedError').click();{/if}
      {if isset($errors.title)} $('#titleError').click(); {/if}
      {if isset($errors.sectionId)} $('#sectionIdError').click();{/if}
      {if isset($errors.not_saved)} $('#notSavedError').click();{/if}
      {if isset($errors.no_sections)} $('#noSectionsError').click();{/if}
      {if isset($errors.image_not_saved)} $('#imageNotSavedError').click();{/if}
      {if isset($errors.article_not_found)} $('#articleNotFoundError').click();{/if}
      {if isset($errors.fileName)} $('#fileNameError').click();{/if}
      {if isset($errors.fileNameExists)} $('#fileNameExistsError').click();{/if}
      {if isset($errors.htaccess)} $('#htaccessError').click();{/if}
      {if isset($errors.serializations)} $('#serializationsError').click();{/if}
      {if isset($errors.fileNameProhibited)} $('#fileNameProhibitedError').click();{/if}
      {if isset($errors.fileNameCharacters)} $('#fileNameCharactersError').click();{/if}
      {if isset($messages.saved)} $('#savedMessage').click();{/if}
      {if isset($messages.saved)} $('#deleteImageMessage').click();{/if}
      
    });
    function deleteImageMessage(){ noty({ text: '{articles:messages:1}', layout: 'topRight', type: 'success', timeout: 1500 }) }
    function deleteArticleMessage(){ noty({ text: '{articles:messages:2}', layout: 'topRight', type: 'success', timeout: 1500 }) }
    function deleteImageError(){ noty({ text: '{sections:errors:14}', layout: 'topRight', type: 'error', timeout: 1500 }) }
    function deleteImageMessage(){ noty({ text: '{sections:messages:5}', layout: 'topRight', type: 'success', timeout: 1500 }) }
    function successImageMessage(){ noty({ text: '{sections:messages:10}', layout: 'topRight', type: 'success', timeout: 1500 }) }

    function deleteFileMessage(){ noty({ text: 'Файл удален', layout: 'topRight', type: 'success', timeout: 1500 } )}
             
  </script>
    <div class="modal" id="edit_image">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"></span></button>
                    <h4 class="modal-title" id="defModalHead">{general:editImadeGallery}</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">{general:editDescImadeGallery}<input class="form-control" autocomplete="off" id="image_description" type="text" name="image_description" value=""/>
                    </div>
                    <div class="form-group">{general:editLinkImadeGallery}<input class="form-control" id="image_url" type="text" name="image_url" value="" /> 
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary save_edit_image" type="submit" value="" data-dismiss="modal"> {general:save} </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">{general:cancel}</button>
                </div>
            </div>
        </div>
    </div>
  
{if isset($action.edit)}
	<div class="content-frame" style="margin-bottom:10px;">
        <div class="content-frame-top">
            <div class="col-md-3 col-xs-3 nopadding_left"><h2>{articles:title}</h2></div>
            <div class="col-md-6 col-xs-6 content-frame-body-left">
                <div id="ajaxStatus" class="alert alert-warning col-md-6 info-box-img" role="alert"></div>
                <div class="upload-image alert message" role="alert"></div>
            </div>
        </div>
	</div>

	<script>
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
                fileName = fileName.replace(/[\s]+/gi, "{$config.filename_word_separator}"),
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
        </script>

	<form action="articles.php" method="post" id="article" enctype="multipart/form-data">
		<input type="hidden" name="article[articleId]" value="{if isset($article.articleId)}{$article.articleId}{/if}" />
		<input type="hidden" name="action[save]" value="1" />
        <div class="col-md-12">
            <div class="panel panel-default tabs">
                <ul class="nav nav-tabs nav-justified">
                    <li class="active"><a href="#general" data-toggle="tab" aria-expanded="true">{articles:tabs:general}</a></li>
                    <li><a href="#summary" data-toggle="tab" aria-expanded="false">{articles:tabs:summary}</a></li>
                    <li><a href="#content" data-toggle="tab" aria-expanded="false">{articles:tabs:content}</a></li>
                    <li><a href="#gallery" data-toggle="tab" aria-expanded="false">{articles:tabs:gallery}</a></li>
                    <li class=""><a href="#other" data-toggle="tab" aria-expanded="false">{articles:tabs:misc}</a></li>
                    <li class=""><a href="#seo" data-toggle="tab" aria-expanded="false">{articles:tabs:seo}</a></li>
                </ul>
    		    <div class="panel-body tab-content nopadding">
                    <div class="tab-pane active" id="general">
                        <div class="panel panel-default" style="margin-bottom: 0px;">
                            <div class="panel-body">
                                <div class="col-md-8">
                                    {if $adminUser.accessLevel ne "writer"}
                                    <div class="form-group">
                                        <label class="field_name">{articles:status}</label>
                                        {if isset($article.status)}
                                            {html_options options=$statuses selected=$article.status|default:"visible" name="article[status]" id="status" class="form-control select"}
                                        {else}
                                            {html_options options=$statuses name="article[status]" id="status" class="form-control select"}
                                        {/if}

                                    </div>
                                    {/if}
                                    <div class="form-group">
                                        <label class="field_name {if isset($errors.sectionId)}fError{/if}">{articles:general:section}</label>
                                        {if isset($sections)}
                                            {if isset($article.sectionId)}
                                                {html_options options=$sections selected=$article.sectionId|default:"0" name="article[sectionId]" id="sectionId" class="form-control select"}
                                            {else}
                                                {html_options options=$sections name="article[sectionId]" id="sectionId" class="form-control select"}
                                             {/if}
                                        {else}
                                            {articles:general:notAvailable}<input type="hidden" name="article[sectionId]" value="0"/>
                                        {/if}
                                    </div>
                                    <div class="form-group">
                                        <label class="field_name {if isset($errors.title)}fError{/if}">{articles:general:title}</label>
                                        <input class="form-control" autocomplete="off" id="title" type="text" name="article[title]" value="{if isset($article.title)}{$article.title}{/if}" onblur="proposeFileName('title', 'fileName', 'article', '{$config.filename_word_separator}', '{$config.convert_filename_to_lowercase}');" />
                                    </div>
                                    <div class="form-group">
                                        <label class="field_name {if isset($errors.fileName) || isset($errors.fileNameExists) || isset($errors.fileNameProhibited) || isset($errors.fileNameCharacters)}fError{/if}">{articles:general:filename}</label>
                                        <input class="form-control" autocomplete="off" id="fileName" type="text" name="article[fileName]" value="{if isset($article.fileName)}{$article.fileName}{/if}" />
                                    </div>

                                    <div class="form-group">
                                        <label class="field_name">{general:alias}</label>
                                        <input class="form-control" autocomplete="off" id="alias" type="text" name="article[alias]" value="{if isset($article.alias)}{$article.alias}{/if}" />
                                    </div>
                                    <div class="form-group">
                                        <label class="field_name">Ссылка</label>
                                        <input class="form-control" autocomplete="off" id="alias" type="text" name="article[link]" value="{if isset($article.link)}{$article.link}{/if}" />
                                    </div>
                                    <div class="form-group">
                                        <label class="field_name">Прикрепить файл</label>
                                        <input class="form-control" id="file" type="file" name="doc" value="" /><br>
                                        {if isset($article.files)} <span id="delFile" onclick="return deleteFileContent({$article.articleId}, '{$article.files.fileName nofilter}','articles');" data-toggle="tooltip" data-placement="top" data-original-title="Удалить файл" style="cursor: pointer;">{$article.files.fileName} <span style="color: red">Удалить файл</span></span>{/if}
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label class="field_name">Текущий URL</label>
                                        <input class="form-control" readonly="true" type="text" value="{$article.url}" />
                                    </div>
                                    <div class="form-group">
                                        <label class="field_name">Прошлый URL (с этого URL будет 301 редирект на текущий URL)</label>
                                        <input class="form-control" type="text" name="article[oldUrl]" value="{$article.oldUrl}" />
                                    </div>
                                    <hr>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-12 nopadding">
                                            <label class="field_name">{articles:general:primaryImage}</label>
                                            {if isset($article.hasImage) and $article.hasImage eq 1}
                                            <div class="file-previewzo-obzor" id="imageOptions">
                                                <div class="close fileinput-remove text-right" onclick="return deleteArticleImage({$article.articleId});" data-toggle="tooltip" data-placement="left" data-original-title="Удалить картинку">×</div>
                                                <div class="file-preview-thumbnails">
                                                    <div class="file-preview-frame" id="imageOptions">
                                                        <img src="{$article.images.medium.url}" class="file-preview-image" alt="{$article.images.medium.fileName}">
                                                    </div>
                                                    <span id="deletingStatus"></span>
    								            </div>
    								        </div>
                                            {/if}
                                            <div class=""><input type="file" name="image" id="file-simple"></div>
                                        </div>
    								</div>
    						    </div>
    				        </div>
    				    </div>
    		    	</div>
                    <div class="tab-pane" id="summary"> <textarea name="article[summary]" class="description">{if isset($article.summary)}{$article.summary}{/if}</textarea></div>
                    <div class="tab-pane" id="content"> <textarea name="article[content]" class="description">{if isset($article.content)}{$article.content}{/if}</textarea></div>

                    <div class="tab-pane" id="gallery">
                        <div class="panel-body">
                            <div class="col-md-8 col-xs-12 nopadding">
                                <div id="fileList">
                                    <div class="body-gallery">
                                        <div class="pull-left push-up-10 col-md-12 col-xs-12">{sections:uploadedImages}</div>
                                        <div class="gallery" id="links">
                                            {if isset($fileList)}
                                            {assign var=a value=1}
                                            {foreach item=file from=$fileList name=fileList}
                                            <div class="gallery-item item-{$file.imageId}">
                                                <div class="image" id="image-{$file.imageId}">
                                                    <img src="{$SITE_URL}/uploads/gallery/medium-{$file.fileName}" alt="{$file.alt}"/>
                                                    <ul class="gallery-item-controls">
                                                        <li><span class="edit_image" data-id="{$file.imageId}" data-desc="{$file.description}" data-link="{$file.link}" data-toggle="modal" data-target="#edit_image"><i class="fa fa-pen"></i></span></li>
                                                        <li><span class="delete_image" data-id="{$file.imageId}"><i class="fa fa-times"></i></span></li>
                                                    </ul>
                                                </div>
                                                <div class="meta">
                                                    <strong>{$file.fileName}</strong>
                                                    <span class="im_desc">{$file.description}</span>
                                                    <span class="im_link">{$file.link}</span>
                                                </div>
                                            </div>
                                            {if $a eq 4}
                                            {assign var=a value=0}
                                            <div class="clearfix"></div>
                                            {/if}
                                            {assign var=a value=$a+1}
                                            {/foreach}
                                            {/if}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-12">
                                <div class="col-md-12 col-xs-12 nopadding"><label class=" push-up-10  push-down-10 control-label">{sections:addToGallery}</label></div>
                                <div class="col-md-12 col-xs-12 nopadding"><div id="dZUpload" class="dropzone dropzone-mini"><div class="dz-default dz-message"></div></div></div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="other">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-md-6 nopadding_left"><label class="field_name">{articles:misc:publishDate}</label></div>
                                    <div class="col-md-6 nopadding_right date">
                                        {if isset($article.publishedOn)}
                                            {html_select_date time=$article.publishedOn|default:$adjustedNow day_value_format="%02d" field_array="article" prefix="" start_year="-5" end_year="+1" class="form-control select"} -
                                        {else}
                                            {html_select_date day_value_format="%02d" field_array="article" prefix="" start_year="-5" end_year="+1" class="form-control select"} -
                                        {/if}
                                        {if $config.use_24_hours}
                                            {if isset($article.publishedOn)}
                                                {html_select_time display_seconds=false time=$article.publishedOn|default:$adjustedNow field_array="article" prefix="" class="form-control select"}
                                            {else}
                                                {html_select_time display_seconds=false field_array="article" prefix="" class="form-control select"}
                                            {/if}
                                        {else}
                                            {if isset($article.publishedOn)}
                                                {html_select_time display_seconds=false display_meridian=true use_24_hours=false time=$article.publishedOn|default:$adjustedNow field_array="article" prefix="" class="form-control select"}
                                            {else}
                                                {html_select_time display_seconds=false display_meridian=true use_24_hours=false field_array="article" prefix="" class="form-control select"}
                                            {/if}
                                        {/if}
                                    </div>
                                </div>

                                {if $adminUser.accessLevel ne "writer"}
                                <div class="form-group">
                                    <div class="col-md-6 nopadding_left"><label class="field_name">{articles:misc:featured}</label></div>
                                    <div class="col-md-6 nopadding_right">
                                        <select name="article[isFeatured]" class="form-control select">
                                            <option value="0" {if isset($article.isFeatured) and $article.isFeatured eq 0}selected{/if}>{general:no}</option>
                                            <option value="1" {if isset($article.isFeatured) and $article.isFeatured eq 1}selected{/if}>{general:yes}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding_left">
                                        <label class="field_name">{general:comments}</label>
                                    </div>
                                    <div class="col-md-6 nopadding_right">
                                        <select name="article[commentsEnabled]" class="form-control select">
                                            <option value="0" {if isset($article.commentsEnabled) and $article.commentsEnabled == 0}selected{/if}>{general:defaultComments}</option>
                                            <option value="-1" {if isset($article.commentsEnabled) and $article.commentsEnabled == -1}selected{/if}>{general:disableComments}</option>
                                            <option value="1" {if isset($article.commentsEnabled) and $article.commentsEnabled == 1}selected{/if}>{general:enableComments}</option>
                                        </select>
                                    </div>
                                </div>
                                {/if}

                                {if isset($article.modifiedOn)}
                                <div class="form-group">
                                    <div class="col-md-6 nopadding_left">{general:modified}</div>
                                    <div class="col-md-6 nopadding_right"><i>{$article.modifiedOn nofilter} ({$article.modifiedBy.loginName|default:"{general:unknowUser}"})</i></div>
                                </div>
                                {/if}

                                {if isset($article.addedOn)}
                                <div class="form-group">
                                    <div class="col-md-6 nopadding_left">{general:created}</div>
                                    <div class="col-md-6 nopadding_right"><i>{$article.addedOn nofilter} ({$article.addedBy.loginName|default:"{general:unknowUser}"})</i></div>
                                </div>
                                {/if}
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="seo">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="form-group">
                                    {general:metaTitle}
                                    <input class="form-control" autocomplete="off" id="meta_title" type="text" name="article[meta_title]" value="{if isset($article.meta_title)}{$article.meta_title}{/if}"/>
                                </div>
                                <div class="form-group">
                                    {general:keywords}
                                    <textarea id="keywords" name="article[keywords]" class="form-control" rows="3">{if isset($article.keywords)}{$article.keywords}{/if}</textarea>
                                </div>
                                <div class="form-group">
                                    {general:description}
                                    <textarea id="description" name="article[description]" class="form-control" rows="3">{if isset($article.description)}{$article.description}{/if}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
        <div class="col-md-12 main main_buttons text-center">
		    <input class="btn btn-primary" type="submit" name="action[save]" value="&nbsp; {general:save} &nbsp;" onclick="document.getElementById('article').target='_self'; document.getElementById('article').action='{$GLOBAL_URL}/admin{if $SITE_LANG != ''}/{$SITE_LANG}{/if}/articles.php{if isset($page)}?page={$page}{/if}'" /> &nbsp;
            <a class="btn btn-primary" href="articles.php{if isset($page)}?page={$page}{/if}">{general:cancel}</a>
        </div>
    </form>

{elseif !isset($errors.access_denied)}
  
     
    <div class="content-frame" style="margin-bottom:10px;">
        <div class="content-frame-top">                        
            <div class="col-md-6 col-xs-6 nopadding_left"><h2>{articles:title}</h2></div> 
            <div class="col-md-6 col-xs-6 nopadding_right">                                                
                <div class="pull-right"> 
                    <a class="btn btn-danger" href="articles.php?action[edit]=true" data-toggle="tooltip" data-placement="left" data-original-title="{articles:addArticle}"><i class="fa fa-plus"></i></a>
      				<span>
                        {if isset($query) || isset($status) || isset($section)}
                        <a class="btn btn-danger" href="articles.php" ><span class="fa fa-list-alt"></span> {articles:showAllArticles}</a>
                        {else}
                        <span class="action btn btn-danger" onclick="showSearchForm();" data-toggle="tooltip" data-placement="bottom" data-original-title="{general:search}"><span class="fa fa-search"></span></span>
                        {/if}
      				</span>         
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
                                <input id="quick-search" class="form-control" type="text" name="query" value="{if isset($query)}{$query}{/if}" autocomplete="off"/>
                            </div>
                            <div class="col-md-4 col-xs-12 nopadding_left">
                                {if isset($section)}
                                    {html_options options=$sections selected=$section|default:"0" name="section" class="form-control select"}
                                {else}
                                    {html_options options=$sections name="section" class="form-control select"}
                                {/if}
                            </div>
                            <div class="col-md-3 col-xs-12 nopadding_left">
                                {if isset($status)}
                                    {html_options options=$statuses selected=$status|default:"" name="status" class="form-control select"}
                                {else}
                                    {html_options options=$statuses name="status" class="form-control select"}
                                {/if}
                            </div>
                            <div class="col-md-1 col-xs-12 nopadding_right"><input style="float:right;"class=" btn btn-danger" type="submit" value="{general:search}"/></div>
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
                                <th width="50">{general:date}</th>
                                <th width="50">{articles:image}</th>
                                <th>{general:article}</th>
                                <th width="50">{articles:favorites}</th>
                                <th width="100">{general:section}</th>
                                <th width="100">{general:status}</th>
                                <th width="140">{general:action}</th>
                            </tr>
                        </thead>
                        {if isset($articles)}
                        <tbody>
                        {foreach item=article from=$articles name=articles}
                            <tr id="article-{$article.articleId}">
                                <td style="line-height: 58px;" class="text-center" nowrap="nowrap">{$article.publishedOn nofilter}</td>
                                <td class="text-center">
                                    {if $article.hasImage eq '1'}
                                    <img src="{$article.images.medium.url}" class="article_img"/>
                                    {else}
                                    <img src="assets/img/no_images.jpg" class="article_img" style="width:45px;"/>
                                    {/if}
                                </td>
                                <td style="line-height: 58px;" width="100%"><a href="{$article.url}" target="_blank" class="artTitle">{$article.title|truncate:75}</a></td>
                                <td style="line-height: 58px;" class="text-center" nowrap="nowrap">
                                    {if $article.isFeatured}<span style="color:yellow;" class="fa fa-star"></span>{elseif !$article.isFeatured}<span class="fa fa-star"></span>{/if}
                                </td>
                                <td style="line-height: 58px;" nowrap="nowrap" title="{$article.section.fullName}">{$article.section.name}</td>
                                <td style="line-height: 58px;min-width: 120px;" id="status-{$article.articleId}">
                                    {$article.statusName}
                                    {if $adminUser.accessLevel != 'writer' && $article.status eq 'pending'}<br />
                                        <p class="act-deistvie action small" onclick="return approveArticle({$article.articleId});">({articles:approve})</p>
                                    {/if}
                                </td>
                                <td class="btn-link-action text-center">
                                    <a class="btn btn-rounded" href="articles.php?action[edit]=true&article[articleId]={$article.articleId}&page={$page}"><span class="fa fa-pen"></span></a>  
                                    <a class="btn btn-danger btn-rounded" onclick="deleteArticle({$article.articleId}, '{$article.title nofilter}');"><span class="fa fa-trash"></span></a>
                                </td>
                            </tr>
  						{/foreach}
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="small" colspan="4">{general:results}</td>
                                <td align="right" colspan="3">
                                    {if isset($pageNums.pages)}             
                                    <ul class="pagination pagination-sm pull-right push-down-10 push-up-10">
                                        {foreach from=$pageNums.pages item=number}
                                        {if $number eq $page}
                                        <li class="active"><a href="articles.php?page={$number}{if isset($query)}&query={$query}{/if}{if isset($section)}&section={$section}{/if}{if isset($status)}&status={$status}{/if}">{$number}</a></li>
                                        {elseif $number eq '...'}
                                        ...
                                        {else}
                                        <li><a href="articles.php?page={$number}{if isset($query)}&query={$query}{/if}{if isset($section)}&section={$section}{/if}{if isset($status)}&status={$status}{/if}">{$number}</a></li>
                                        {/if}
                                        {/foreach}
                                    </ul>  
                                    {/if}
                                </td>
                            </tr>
                        </tfoot>
                        {else}
                        <tbody><tr class="odd"><td class="data none" colspan="7" align="center">- {general:none} -</td></tr></tbody>
                        {/if}   
                    </table>
                </div>
            </div>
        </div> 	
    </div>

    <script type="text/javascript">
        {if isset($query) || isset($status) || isset($section)}showSearchForm(true);{/if}
    </script>
  {/if}
</div>

{* Подключаем Tiny MCE *}
{include file='tinymce_init.tpl'}

<script>
    var articleId = '{if isset($article.articleId)}{$article.articleId}{/if}';
    
    $(document).ready(function () {
        Dropzone.autoDiscover = false; 
        $("#dZUpload").dropzone({ 
            url: "articles.php", 
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
        $.post('articles.php', { id: id, desc: desc, link: link, action: 'editimage' }, function(data){
            if (data.update == 1){            
                $('.gallery-item.item-'+id+' .im_desc').text(desc);
                $('.gallery-item.item-'+id+' .im_link').text(link);
            }

        }, 'json');
    });
           
</script>




{include file="footer.tpl"}