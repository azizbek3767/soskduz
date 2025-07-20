{include file="header.tpl" activeItem="sections" title="{sections:title}"}
<div class="page-content-wrap">
    
    {if isset($messages.saved)}<span id="savedMessage" onclick="noty({ text: '{sections:messages:0}', layout: 'topRight', type: 'success', timeout: 1500 });"></span>{/if}
    {if isset($messages.deleted)}<span id="deletedMessage" onclick="noty({ text: '{sections:messages:1}', layout: 'topRight', type: 'success', timeout: 1500 });"></span>{/if}
    {if isset($messages.sorted)}<span id="sortedMessage" onclick="noty({ text: '{sections:messages:2}', layout: 'topRight', type: 'success', timeout: 1500 });"></span>{/if}
    
    {if isset($errors.not_saved)}<span id="notSavedError" onclick="noty({ text: '{sections:errors:0}', layout: 'topRight', type: 'error', timeout: 1500 });"></span>{/if}
    {if isset($errors.section_not_found)}<span id="sectionNotFoundError" onclick="noty({ text: '{sections:errors:1}', layout: 'topRight', type: 'error', timeout: 1500 });"></span>{/if}
    {if isset($errors.name)}<span id="nameError" onclick="noty({ text: '{sections:errors:2}', layout: 'topRight', type: 'error', timeout: 1500 });"></span>{/if}
    {if isset($errors.fileName)}<span id="fileNameError" onclick="noty({ text: '{sections:errors:3}', layout: 'topRight', type: 'error', timeout: 1500 });"></span>{/if} 
    {if isset($errors.fileNameExists)}<span id="fileNameExistsError" onclick="noty({ text: '{sections:errors:4}', layout: 'topRight', type: 'error' });"></span>{/if}
    {if isset($errors.htaccess)}<span id="htaccessError" onclick="noty({ text: '{sections:errors:5}', layout: 'topRight', type: 'error', timeout: 1500 });"></span>{/if}
    {if isset($errors.serializations)}<span id="serializationsError" onclick="noty({ text: '{sections:errors:6}', layout: 'topRight', type: 'error', timeout: 1500 });"></span>{/if}
    {if isset($errors.fileNameProhibited)}<span id="fileNameProhibitedError" onclick="noty({ text: '{sections:errors:7}', layout: 'topRight', type: 'error', timeout: 1500 });"></span>{/if}
    {if isset($errors.fileNameCharacters)}<span id="fileNameCharactersError" onclick="noty({ text: '{sections:errors:8}', layout: 'topRight', type: 'error', timeout: 1500 });"></span>{/if}
    {if isset($errors.sectionType)}<span id="sectionTypeError" onclick="noty({ text: '{sections:errors:13}', layout: 'topRight', type: 'error', timeout: 1500 });"></span>{/if}
    {if isset($errors.error_parent_type_content)}<span id="errorParentTypeContent" onclick="noty({ text: '{sections:errors:15}', layout: 'topRight', type: 'error', timeout: 1500 });"></span>{/if}
    {if isset($errors.error_parent_type)}<span id="errorParentType" onclick="noty({ text: '{sections:errors:16}', layout: 'topRight', type: 'error', timeout: 1500 });"></span>{/if}
    <script>
    
        $(document).ready(function () {

            {if isset($errors.not_saved)} $('#notSavedError').click();{/if}
            {if isset($errors.section_not_found)} $('#sectionNotFoundError').click();{/if}
            {if isset($errors.name)} $('#nameError').click(); {/if}
            {if isset($errors.fileName)} $('#fileNameError').click();{/if}
            {if isset($errors.fileNameExists)} $('#fileNameExistsError').click();{/if}
            {if isset($errors.htaccess)} $('#htaccessError').click();{/if}
            {if isset($errors.serializations)} $('#serializationsError').click();{/if}
            {if isset($errors.fileNameProhibited)} $('#fileNameProhibitedError').click();{/if}
            {if isset($errors.fileNameCharacters)} $('#fileNameCharactersError').click();{/if}
            {if isset($errors.error_type_content)} $('#errorTypeContent').click();{/if}
            {if isset($errors.error_parent_type_content)} $('#errorParentTypeContent').click();{/if}
            {if isset($errors.error_parent_type)} $('#errorParentType').click();{/if}
            
            {if isset($messages.saved)} $('#savedMessage').click(); {/if}
            {if isset($messages.deleted)} $('#deletedMessage').click();{/if}
            {if isset($messages.sorted)} $('#sortedMessage').click();{/if}

        });
        
        function deleteImageError(){ noty({ text: '{sections:errors:14}', layout: 'topRight', type: 'error', timeout: 1500 } )}
        function deleteImageMessage(){ noty({ text: '{sections:messages:5}', layout: 'topRight', type: 'success', timeout: 1500 } )}
        function successImageMessage(){ noty({ text: '{sections:messages:10}', layout: 'topRight', type: 'success', timeout: 1500 } )}
        function moveUpMessage(){ noty({ text: '{sections:messages:3}', layout: 'topRight', type: 'warning', timeout: 1500 } )}
        function moveDownMessage(){ noty({ text: '{sections:messages:4}', layout: 'topRight', type: 'warning', timeout: 1500 } )}
        function topMenuMessage(){ noty({ text: '{sections:messages:6}', layout: 'topRight', type: 'warning', timeout: 1500 } )}
        function downMenuMessage(){ noty({ text: '{sections:messages:7}', layout: 'topRight', type: 'warning', timeout: 1500 } )}    
        function sectionVisibleMessage(){ noty({ text: '{sections:messages:8}', layout: 'topRight', type: 'warning', timeout: 1500 } )}
        function sectionHiddenMessage(){ noty({ text: '{sections:messages:9}', layout: 'topRight', type: 'warning', timeout: 1500 } )}

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
                    <div class="form-group">
                        <label class="field_name">{general:editDescImadeGallery}</label>
                        <input class="form-control" autocomplete="off" id="image_description" type="text" name="image_description" value=""/> 
                    </div>
                    <div class="form-group">
                        <label class="field_name">{general:editLinkImadeGallery}</label>
                        <input class="form-control" id="image_url" type="text" name="image_url" value="" /> 
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
                <div class="col-md-3 nopadding_left"><h2>{sections:title}</h2></div>
                <div class="col-md-6 content-frame-body-left">
                    <div id="ajaxStatus" class="alert alert-warning col-md-6 info-box-img" role="alert"></div>
                    <div class="upload-image alert message" role="alert"></div>
                </div>                          
            </div>
        </div>

        <div class="col-md-12">
            
            <script> 
                $(function () { function e() { alias_touched || $("#alias").val(a()), meta_title_touched || $("#meta_title").val(m()), keywords_touched || $("#keywords").val(i()), description_touched || $("#description").val(t()), fileName_touched || $("#fileName").val(n()) } function a() { return name = $("#name").val() } function m() { return name = $("#name").val() } function i() { return name = $("#name").val() } function t() { return name = $("#name").val() } function n() { return fileName = $("#name").val(), fileName = fileName.replace(/[\s]+/gi, "{$config.filename_word_separator}"), fileName = l(fileName), fileName = fileName.replace(/[^0-9a-z_\-]+/gi, "").toLowerCase() } function l(e) { for (var a = "А-а-Б-б-В-в-Ґ-ґ-Г-г-Д-д-Е-е-Ё-ё-Є-є-Ж-ж-З-з-И-и-І-і-Ї-ї-Й-й-К-к-Л-л-М-м-Н-н-О-о-П-п-Р-р-С-с-Т-т-У-у-Ф-ф-Х-х-Ц-ц-Ч-ч-Ш-ш-Щ-щ-Ъ-ъ-Ы-ы-Ь-ь-Э-э-Ю-ю-Я-я".split("-"), i = "A-a-B-b-V-v-G-g-G-g-D-d-E-e-E-e-E-e-ZH-zh-Z-z-I-i-I-i-I-i-J-j-K-k-L-l-M-m-N-n-O-o-P-p-R-r-S-s-T-t-U-u-F-f-H-h-TS-ts-CH-ch-SH-sh-SCH-sch-'-'-Y-y-'-'-E-e-YU-yu-YA-ya".split("-"), t = "", n = 0, l = e.length; l > n; n++) {
                        var o = e.charAt(n),c = a.indexOf(o);t += c >= 0 ? i[c] : o
                    } return t }
                    alias_touched = !0, 
                    meta_title_touched = !0, 
                    keywords_touched = !0, 
                    description_touched = !0, 
                    fileName_touched = !0, 
                    ($("#alias").val() == a() || "" == $("#alias").val()) && (alias_touched = !1), 
                    ($("#meta_title").val() == i() || "" == $("#meta_title").val()) && (meta_title_touched = !1), 
                    ($("#keywords").val() == i() || "" == $("#keywords").val()) && (keywords_touched = !1),  
                    ($("#description").val() == t() || "" == $("#description").val()) && (description_touched = !1), 
                    ($("#fileName").val() == n() || "" == $("#fileName").val()) && (fileName_touched = !1), 
                    $("#alias").change( function () { alias_touched = !0 }), 
                    $("#meta_title").change( function () { meta_title_touched = !0 }),
                    $("#keywords").change( function () { keywords_touched = !0 }), 
                    $("#description").change( function () { description_touched = !0 }), 
                    $("#fileName").change( function () { fileName_touched = !0 }), 
                    $("#name").keyup( function () { e() })
                }); 
            </script>

            <form action="sections.php" method="post" id="section" enctype="multipart/form-data">
                <input type="hidden" name="section[sectionId]" value="{if isset($section.sectionId)}{$section.sectionId}{/if}" />
                <input type="hidden" name="parentId" value="{if isset($parentId)}{$parentId}{/if}" />
                <input type="hidden" name="action[save]" value="1" />
                <div class="panel panel-default tabs">                   
                    <ul class="nav nav-tabs nav-justified">
                        <li class="active"><a href="#general" data-toggle="tab" aria-expanded="true">{sections:tabs:general}</a></li>
                        <li class=""><a href="#summary" data-toggle="tab" aria-expanded="false">{sections:tabs:summary}</a></li>
                        <li class=""><a href="#content" data-toggle="tab" aria-expanded="false">{sections:tabs:content}</a></li>
                        {if isset($section.photo_gallery) and $section.photo_gallery eq 1}<li class=""><a href="#gallery" data-toggle="tab" aria-expanded="false">{sections:tabs:images}</a></li>{/if}
                        <li class=""><a href="#advanced" data-toggle="tab" aria-expanded="false">{sections:tabs:advanced}</a></li>
                        <li class=""><a href="#misc" data-toggle="tab" aria-expanded="false">{sections:tabs:misc}</a></li>
                    </ul>                  
                    
                    <div class="panel-body tab-content nopadding">
                        <div class="tab-pane active" id="general">
                            <div class="panel panel-default">
                                <div class="panel-body"> 
                                    <div class="col-md-6 col-xs-12 nopadding_left">
                                        <div class="col-md-6 col-xs-12 nopadding_left">
                                            <div class="form-group">
                                                <label class="field_name">{sections:sectionType}</label>
                                                {if isset($section.type)}
                                                    {html_options options=$types selected=$section.type name="section[type]" class="form-control select" id="type"}
                                                {else}
                                                    {html_options options=$types name="section[type]" class="form-control select" id="type"}
                                                {/if}
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-12 nopadding_right">
                                            <div class="form-group">
                                                <label class="field_name {if isset($errors.error_parent_type_content) || isset($errors.error_type_content)}fError{/if}">{sections:contentType}</label>
                                                {if isset($section.type_content)}
                                                    {html_options options=$typeContents selected=$section.type_content name="section[type_content]" class="form-control select" id="type_content"}
                                                {else}
                                                    {html_options options=$typeContents name="section[type_content]" class="form-control select" id="type_content"}
                                                {/if}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="field_name">{sections:status}</label>
                                            {if isset($section.status)}
                                                {html_options options=$statuses selected=$section.status name="section[status]" class="form-control select" id="status"}
                                            {else}
                                                {html_options options=$statuses name="section[status]" class="form-control select" id="status"}
                                            {/if}
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xs-12 nopadding_right">
                                        <div class="col-md-12 col-xs-12 nopadding"><label class="field_name">{sections:settingSection}</label></div>
                                        <div class="col-md-6 col-xs-12 nopadding_left">
                                            <div class="form-group">
                                                <div class="checkbox-material">

                                                    <input type="checkbox" id="top_menu" name="section[top_menu]" value="1" {if isset($section.top_menu) and $section.top_menu eq 1}checked{/if}/>
                                                    <label for="top_menu"><span class="chk-span"></span><i>{sections:mainMenu}</i></label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="checkbox-material">
                                                    <input type="checkbox" id="footer_menu" name="section[footer_menu]" value="1" {if isset($section.footer_menu) and $section.footer_menu eq 1}checked{/if}/>
                                                    <label for="footer_menu"><span class="chk-span"></span><i>{sections:footerMenu}</i></label>
                                                </div>
                                            </div> 
                                        </div>
                                        <div class="col-md-6 col-xs-12 nopadding_right">
                                            <div class="form-group">
                                                <div class="checkbox-material">
                                                    <input type="checkbox" id="photo_gallery" name="section[photo_gallery]" value="1" {if isset($section.photo_gallery) and $section.photo_gallery eq 1}checked{/if}/>
                                                    <label for="photo_gallery"><span class="chk-span"></span><i>{sections:photoGallery}</i></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-8 col-xs-12 nopadding_left"> 
                                        <div class="form-group">
                                            <label class="field_name">{sections:general:parent}</label>
                                            {if isset($parents)}
                                                {if isset($parentId)}
                                                    {html_options options=$parents selected=$parentId|default:$parentId id="parentId" name="section[parentId]" class="form-control select"}
                                                {else}
                                                    {html_options options=$parents id="parentId" name="section[parentId]" class="form-control select"}
                                                {/if}

                                            {else}
                                                <label class="field_name">{sections:general:na}</label>
                                                <input type="hidden" name="section[parentId]" value="0"/>
                                            {/if}
                                        </div>                                                             
                                        <div class="form-group">
                                            <label class="field_name {if isset($errors.name)}fError{/if}">{sections:general:name}</label>                                         
                                            <input class="form-control" autocomplete="off" id="name" type="text" name="section[name]" value="{if isset($section.name)}{$section.name}{/if}"/>
                                        </div>
                                        <div class="form-group">
                                            <label class="field_name {if isset($errors.fileName) || isset($errors.fileNameExists) || isset($errors.fileNameProhibited) || isset($errors.fileNameCharacters)}fError{/if}">{sections:general:filename}</label>
                                            <input class="form-control" id="fileName" type="text" name="section[fileName]" value="{if isset($section.fileName)}{$section.fileName}{/if}" /> 
                                        </div>
                                        <div class="form-group">
                                            <label class="field_name">{sections:general:alias}</label>
                                            <input class="form-control" autocomplete="off" id="alias" type="text" name="section[alias]" value="{if isset($section.alias)}{$section.alias}{/if}"/>
                                        </div>

                                            <input type="hidden" name="section[oldUrl]" value="{$section.url}"/>

                                        <div class="form-group">
                                            <label class="field_name">{sections:icon}</label>
                                            <input class="form-control" autocomplete="off" id="section_icon" type="text" name="section[icon]" value="{if isset($section.icon)}{$section.icon}{/if}"/>
                                        </div>
                                        <div class="form-group">
                                            <label class="field_name">Прикрепить файл</label>
                                            <input class="form-control" id="file" type="file" name="doc" value="" /><br>
                                            {if isset($section.files)} <span id="delFile" onclick="return deleteFileSection({$section.sectionId}, '{$section.files.fileName nofilter}','sections');" data-toggle="tooltip" data-placement="top" data-original-title="Удалить файл" style="cursor: pointer;">{$section.files.fileName} <span style="color: red">Удалить файл</span></span>{/if}
                                        </div>
                                    </div>

                                    <div class="col-md-4 nopadding_right">
                                        <div class="form-group">
                                            <div class="col-md-12 col-xs-12 nopadding">
                                                <label class="field_name">{sections:primaryImage}</label>
                                                {if isset($section.hasImage) and $section.hasImage eq '1'}   
                                                <div class="file-previewzo-obzor" id="imageOptions">
                                                    <div class="close fileinput-remove text-right" onclick="return deleteSectionImage({$section.sectionId})" data-toggle="tooltip" data-placement="left" data-original-title="Удалить картинку">×</div>
                                                    <div class="file-preview-thumbnails">
                                                        <div class="file-preview-frame" id="imageOptions">
                                                            <h4>im here</h4>
                                                            <img src="{$section.images.medium.url}" class="file-preview-image" alt="{$section.name}">
                                                        </div>
                                                        <div id="ajaxStatus"></div>
                                                        <span id="deletingStatus"></span>
                                                        <span id="errorBlock"></span>
                                                    </div>
                                                </div>
                                                {/if}
                                                <div><input type="file" name="image" id="file-simple" data-preview-file-type="any"></div>
                                            </div>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="summary"><textarea name="section[summary]" class="description">{if isset($section.summary)}{$section.summary}{/if}</textarea></div>
                        <div class="tab-pane" id="content"><textarea name="section[content]" class="description">{if isset($section.content)}{$section.content}{/if}</textarea></div> 

                        {if isset($section.photo_gallery) and $section.photo_gallery eq 1}
                        <div class="tab-pane" id="gallery">
                            <div class="panel-body">  
                                <div class="col-md-8 col-xs-12 nopadding">
                                    <div id="fileList">
                                        <div class="body-gallery">
                                            <div class="pull-left push-up-10 col-md-12 col-xs-12"><label class="field_name">{sections:uploadedImages}</label></div>
                                            <div class="gallery" id="links">
                                            {if isset($fileList)}
                                                {assign var=a value=1}
                                                {foreach item=file from=$fileList name=fileList}
                                                <div class="gallery-item item-{$file.imageId}">
                                                    <div class="image" id="image-{$file.imageId}">                              
                                                        <img src="{$SITE_URL}/uploads/gallery/medium-{$file.fileName}" alt="{$file.alt}"/>                                        
                                                        <ul class="gallery-item-controls">
                                                            <li><span class="edit_image" data-id="{$file.imageId}" data-desc="{$file.description}" data-link="{$file.link}" data-toggle="modal" data-target="#edit_image"><i class="fa fa-pen"></i></span></li>
                                                            <li><span class="remove_image" data-id="{$file.imageId}"><i class="fa fa-times"></i></span></li>
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
                                    <div class="col-md-12 col-xs-12 nopadding"><label class="field_name push-up-10  push-down-10 control-label">{sections:addToGallery}</label></div>
                                    <div class="col-md-12 col-xs-12 nopadding">
                                        <div id="dZUpload" class="dropzone dropzone-mini"><div class="dz-default dz-message"></div></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {/if}
                            
                        <div class="tab-pane" id="advanced">
                            {if isset($section.modifiedOn)}
                            <div class="panel-heading" style="margin-bottom: 10px;"><h5 class="panel-title">{general:status}</h5></div>
                            <div class="clearfix">
                                <div class="col-md-3 col-xs-12 control-label control_text_right"><label class="field_name">{general:modified}</label></div>
                                <div class="col-md-6 col-xs-12" style="padding-top:5px;">
                                    <i>{$section.modifiedOn nofilter} ({$section.modifiedBy.loginName|default:"unknown user"})</i>
                                </div>
                            </div>
                            {/if}
                            {if isset($section.addedOn)}
                            <div class="clearfix">
                                <div class="col-md-3 col-xs-12 control-label control_text_right"><label class="field_name">{general:created}</label></div>
                                <div class="col-md-6 col-xs-12" style="padding-top:7px;">
                                    <i>{$section.addedOn nofilter} ({$section.addedBy.loginName|default:"unknown user"})</i>
                                </div>
                            </div>
                            {/if}
                            <div class="panel-heading" style="margin-bottom: 10px;"><h5 class="panel-title">Применение для данного {general:section}</h5></div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label control_text_right"><label class="field_name">{general:template}</label></label>
                                <div class="col-md-3 col-xs-12">
                                    {if isset($section.templateName)}
                                        {html_options values=$templates output=$templates selected=$section.templateName name="section[templateName]" class="form-control select"}
                                    {else}
                                        {html_options values=$templates output=$templates name="section[templateName]" class="form-control select"}
                                    {/if}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3 col-xs-12 control-label control_text_right"><label class="field_name">{general:caching}</label></div>
                                <div class="col-md-3 col-xs-12">
                                    <select name="section[isCached]" class="form-control select">
                                        <option value="0" {if isset($section.isCached) and $section.isCached == 0}selected{/if}>{general:cachingDefault}</option>
                                        <option value="-1" {if isset($section.isCached) and $section.isCached == -1}selected{/if}>{general:cachingDisabled}</option>
                                        <option value="1" {if isset($section.isCached) and $section.isCached == 1}selected{/if}>{general:enableCachingFor}</option>
                                    </select>

                                </div>
                                <div class="col-md-3 col-xs-12 nopadding">
                                    <div class="col-md-3 col-xs-2 nopadding">
                                        {if isset($section.cacheTime)}
                                            {html_options options=$cachingTimeOptions selected=$section.cacheTime|default:1 name="section[cacheTime]" class="form-control select"}
                                        {else}
                                            {html_options options=$cachingTimeOptions name="section[cacheTime]" class="form-control select"}
                                        {/if}
                                    </div>
                                    <div class="col-md-4 col-xs-2 nopadding">
                                        {if isset($section.cachePeriod)}
                                            {html_options options=$cachingPeriodOptions selected=$section.cachePeriod|default:86400 name="section[cachePeriod]" class="form-control select"}
                                        {else}
                                            {html_options options=$cachingPeriodOptions name="section[cachePeriod]" class="form-control select"}
                                        {/if}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3 col-xs-12 control-label control_text_right"><label class="field_name">{general:comments}</label></div>
                                <div class="col-md-3 col-xs-12">
                                    <select name="section[commentsEnabled]" class="form-control select">
                                        <option value="0" {if isset($section.commentsEnabled) and $section.commentsEnabled == 0}selected{/if}>{general:defaultComments}</option>
                                        <option value="-1" {if isset($section.commentsEnabled) and $section.commentsEnabled == -1}selected{/if}>{general:disableComments}</option>
                                        <option value="1" {if isset($section.commentsEnabled) and $section.commentsEnabled == 1}selected{/if}>{general:enableComments}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="panel-heading" style="margin-bottom: 10px;"><h5 class="panel-title">Применение для подразделов данного раздела</h5></div>
                            <div class="form-group">
                                <div class="col-md-3 col-xs-12 control-label control_text_right"><label class="field_name">{general:template}</label></div>
                                <div class="col-md-3 col-xs-12">
                                    {if isset($section.subTemplateName)}
                                        {html_options values=$templates output=$templates selected=$section.subTemplateName|default:'' name="section[subTemplateName]" class="form-control select"}
                                    {else}
                                        {html_options values=$templates output=$templates name="section[subTemplateName]" class="form-control select"}
                                    {/if}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3 col-xs-12 control-label control_text_right"><label class="field_name">{general:caching}</label></div>
                                <div class="col-md-3 col-xs-12">
                                    <select name="section[subIsCached]" class="form-control select">
                                        <option value="0" {if isset($section.subIsCached) and $section.subIsCached == 0}selected{/if}>{general:cachingDefault}</option>
                                        <option value="-1" {if isset($section.subIsCached) and $section.subIsCached == -1}selected{/if}>{general:cachingDisabled}</option>
                                        <option value="1" {if isset($section.subIsCached) and $section.subIsCached == 1}selected{/if}>{general:enableCachingFor}</option>
                                    </select>
                                </div>
                                <div class="col-md-3 col-xs-12 nopadding">
                                    <div class="col-md-3 col-xs-2 nopadding">
                                        {if isset($section.subCacheTime)}
                                            {html_options options=$cachingTimeOptions selected=$section.subCacheTime name="section[subCacheTime]" class="form-control select"}
                                        {else}
                                            {html_options options=$cachingTimeOptions name="section[subCacheTime]" class="form-control select"}
                                        {/if}
                                    </div>
                                    <div class="col-md-4 col-xs-2 nopadding">
                                        {if isset($section.subCachePeriod)}
                                            {html_options options=$cachingPeriodOptions selected=$section.subCachePeriod|default:86400 name="section[subCachePeriod]" class="form-control select"}
                                        {else}
                                            {html_options options=$cachingPeriodOptions name="section[subCachePeriod]" class="form-control select"}
                                        {/if}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3 col-xs-12 control-label control_text_right"><label class="field_name">{general:comments}</label></div>
                                <div class="col-md-3 col-xs-12">
                                    <select name="section[subCommentsEnabled]" class="form-control select">
                                        <option value="0" {if isset($section.subCommentsEnabled) and $section.subCommentsEnabled == 0}selected{/if}>{general:defaultComments}</option>
                                        <option value="-1" {if isset($section.subCommentsEnabled) and $section.subCommentsEnabled == -1}selected{/if}>{general:disableComments}</option>
                                        <option value="1" {if isset($section.subCommentsEnabled) and $section.subCommentsEnabled == 1}selected{/if}>{general:enableComments}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="panel-heading" style="margin-bottom: 10px;"><h5 class="panel-title">Применение для контентента данного раздела</h5></div>
                            <div class="form-group">
                                <div class="col-md-3 col-xs-12 control-label control_text_right"><label class="field_name">{general:template}</label></div>
                                <div class="col-md-3 col-xs-12">
                                    {if isset($section.artTemplateName)}
                                        {html_options values=$templates output=$templates selected=$section.artTemplateName|default:'' name="section[artTemplateName]" class="form-control select"}
                                    {else}
                                        {html_options values=$templates output=$templates name="section[artTemplateName]" class="form-control select"}
                                    {/if}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3 col-xs-12 control-label control_text_right"><label class="field_name">{general:caching}</label></div>
                                <div class="col-md-3 col-xs-12">
                                    <select name="section[artIsCached]" class="form-control select">
                                        <option value="0" {if isset($section.artIsCached) and $section.artIsCached == 0}selected{/if}>{general:cachingDefault}</option>
                                        <option value="-1" {if isset($section.artIsCached) and $section.artIsCached == -1}selected{/if}>{general:cachingDisabled}</option>
                                        <option value="1" {if isset($section.artIsCached) and $section.artIsCached == 1}selected{/if}>{general:enableCachingFor}</option>
                                    </select>

                                </div>
                                <div class="col-md-3 col-xs-12 nopadding">
                                    <div class="col-md-3 col-xs-2 nopadding">
                                        {if isset($section.artCacheTime)}
                                            {html_options options=$cachingTimeOptions selected=$section.artCacheTime|default:1 name="section[artCacheTime]" class="form-control select"}
                                        {else}
                                            {html_options options=$cachingTimeOptions name="section[artCacheTime]" class="form-control select"}
                                        {/if}
                                    </div>
                                    <div class="col-md-4 col-xs-2 nopadding">
                                        {if isset($section.artCachePeriod)}
                                            {html_options options=$cachingPeriodOptions selected=$section.artCachePeriod|default:86400 name="section[artCachePeriod]" class="form-control select"}
                                        {else}
                                            {html_options options=$cachingPeriodOptions name="section[artCachePeriod]" class="form-control select"}
                                        {/if}
                                    </div> 
                                </div>
                            </div>
                            <div class="clear" style="margin-bottom: 10px;"></div>
                        </div>   
                        <div class="tab-pane" id="misc">
                            <div class="panel panel-default">
                                <div class="panel-body"> 
                                    <div class="form-group">
                                        <label class="field_name">{general:metaTitle}</label>
                                        <input class="form-control" autocomplete="off" id="meta_title" type="text" name="section[meta_title]" value="{if isset($section.meta_title)}{$section.meta_title}{/if}"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="field_name">{general:keywords}</label>
                                        <textarea name="section[keywords]" id="keywords" class="form-control" rows="4">{if isset($section.keywords)}{$section.keywords}{/if}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="field_name">{general:description}</label>
                                        <textarea name="section[description]" id="description" class="form-control" rows="4">{if isset($section.description)}{$section.description}{/if}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label class="field_name">Код карты региона</label>
                                        <textarea name="section[code_maps]" id="description" class="form-control" rows="4">{if isset($section.code_maps)}{$section.code_maps}{/if}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
                <div align="center" class="col-md-12 main main_buttons">
                    <input class="btn btn-primary" type="submit" name="action[save]" value="&nbsp; {general:save} &nbsp;" /> &nbsp;
                    <a class="btn btn-primary" href="sections.php{if isset($parentId)}?parentId={$parentId}{/if}">{general:cancel}</a>
                </div>
            </form>
        </div>
    {elseif isset($action.confirmDelete)}

        <div class="content-frame" style="margin-bottom:10px;"><div class="content-frame-top"><div class="page-title"><h2>{sections:title}</h2></div></div></div>
        <div class="col-md-12">
            <form action="sections.php" method="post" id="confirmDelete">
                <input type="hidden" name="section[sectionId]" value="{if isset($section.sectionId)}{$section.sectionId}{/if}" />
                <input type="hidden" name="parentId" value="{if isset($parentId)}{$parentId}{/if}" />
                <div class=" panel panel-colorful">
                    <div class="panel-heading" id="templateNav">{sections:deleting}</div>
                    <div class="panel-body">
                    {if isset($section.hasSubsections) || isset($section.hasArticles)}
                        {if isset($articleOptions)}
                        <div class="form-group">
                            <label class="field_name">{articles:title}</label>
                            {html_options options=$articleOptions name="action[moveArticlesTo]" class="form-control select"}
                        </div>
                        {/if}
                        {if isset($subsectionOptions)}
                        <div class="form-group">
                            <label class="field_name">{sections:subsectionsAndArticles}</label>
                            {html_options options=$subsectionOptions name="action[moveSubsectionsTo]" class="form-control select"}
                        </div>
                        {/if}
                    {/if}

                    {sections:deleteSectionQuestion}? 
                    </div>
                    <div class="panel-footer">
                        <input class="btn btn-danger" type="submit" name="action[deleteConfirmed]" value="&nbsp; {general:yes} &nbsp;" /> &nbsp;
                        <a class="btn btn-primary pull-right" href="sections.php{if isset($parentId)}?parentId={$parentId}{/if}">{general:cancel}</a>
                    </div>                            
                </div>
            </form>
        </div>	
        
    {else}

        <div class="content-frame" style="margin-bottom:10px;">
            <div class="content-frame-top">                        
                <div class="col-md-3 col-xs-3 nopadding_left"><h2>{sections:title}</h2></div>
                <div class="col-md-6 col-xs-6 content-frame-body-left"><div id="ajaxStatus" class="alert alert-success col-md-6 info-box-img" role="alert"></div></div>
                <div class="col-md-3 col-xs-3 nopadding_right">                                                  
                    <div class="pull-right"> 
                        <a class="btn btn-danger" href="sections.php?action[edit]=true{if isset($parentId)}&parentId={$parentId}{/if}" data-toggle="tooltip" data-placement="left" data-original-title="{sections:add}"><i class="fa fa-plus"></i></a>
                            {if isset($parent)}&nbsp;&nbsp; 
                                <a class="btn btn-primary" href="sections.php" data-toggle="tooltip" data-placement="bottom" data-original-title="{sections:upToRoot}"><i class="fa fa-reply-all"></i></a>
                                {if isset($parent.parentId)} &nbsp;&nbsp; 
                                    <a class="btn btn-primary" href="sections.php?parentId={$parent.parentId}" data-toggle="tooltip" data-placement="bottom" data-original-title="{if isset($parent.parent.name)}{$parent.parent.name}{/if}"><i class="fa fa-reply"></i></a>
                                {/if} 
                            {/if}                           
                    </div>   
                </div>                           
            </div>  
        </div>                     
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body panel-body-table">
                    <div class="table-responsive">
                        <table class="table table-striped table-actions table-hover" id="sections">
                            <thead>
                                <tr>
                                    <th class="text-center" width="50">{general:table:id}</th>
                                    <th class="">{general:table:name}</th>
                                    <th class="">{general:table:alias}</th>
                                    <th class="">{general:table:path}</th>
                                    <th class="" width="150">{general:table:type}</th>
                                    <th class="" width="150">{general:table:typeContent}</th>
                                    <th class="text-center" width="100">{general:table:action}</th>
                                </tr>
                            </thead>
                            {if isset($sections)}
                            <tbody>   
                            {foreach item=section from=$sections name=sections}                                      
                            <tr id="section-{$section.sectionId}" class="{if $section.status eq 'hidden'}opacity7{/if}">
                                <td class="text-center">{$section.sectionId}</td>
                                <td  nowrap="nowrap">
                                    {if isset($section.hasSubsections)}
                                        <a href="sections.php?parentId={$section.sectionId}" style="border-bottom: 1px dashed;">{$section.name|strip_tags|truncate:25}</a>
                                    {else}
                                        {$section.name|strip_tags|truncate:25}
                                    {/if}
                                </td>
                                <td  nowrap="nowrap">{$section.alias|strip_tags|truncate:25}</td>
                                <td nowrap="nowrap"><a href="{$section.url}" target="_blank">{if $section.fileName eq 'index'}/{else}/{$section.fileName}/{/if}</a></td>
                                <td class="" nowrap="nowrap">{$section.typeName}</td>
                                <td class="" nowrap="nowrap">{$section.typeContentName}</td>
                                <td class="btn-link-action" nowrap="nowrap">
                                    <a class="status_selection btn btn-rounded {if $section.status eq 'hidden'}btn-danger{else}btn-green{/if}" style="width: 35px" id="{$section.sectionId}" value="{$section.status}">
                                        <span class="fa fa-eye{if $section.status eq 'hidden'}-slash{/if}" style="font-size: 13px;" data-toggle="tooltip" data-placement="top" data-original-title="Поменять статуc"></span>
                                    </a>

                                    <div class="form-group" style="width: 25px">
                                        <div class="checkbox-material inline-block">
                                            <input class="up_menu{$section.sectionId}" type="checkbox" id="up_menu-{$section.sectionId}" {if $section.top_menu eq '1'}checked{/if} value="{$section.top_menu}"/>
                                            <label class="top_menu" id="t{$section.sectionId}" data-id="{$section.sectionId}" {if $section.top_menu eq '1'}data-val="0"{else}data-val="1"{/if} for="up_menu-{$section.sectionId}"><span class="chk-span" data-toggle="tooltip" data-placement="top" data-original-title="Показать в главном меню" style="margin:0px;"></span></label>
                                        </div>
                                    </div>
                                    <a class="btn btn-rounded" href="sections.php?action[edit]=true&section[sectionId]={$section.sectionId}{if $parentId}&parentId={$parentId}{/if}">
                                        <span class="fa fa-pen" data-toggle="tooltip" data-placement="top" data-original-title="Редактировать"></span>
                                    </a>
                                    <a class="btn btn-green btn-rounded" onclick="moveUp({$section.sectionId}, '{$section.name}')">
                                        <span class="fa fa-arrow-up" data-toggle="tooltip" data-placement="top" data-original-title="Поднять вверх"></span>
                                    </a>
                                    <a class="btn btn-green btn-rounded" onclick="moveDown({$section.sectionId}, '{$section.name}')">
                                        <span class="fa fa-arrow-down" data-toggle="tooltip" data-placement="top" data-original-title="Опустить вниз"></span>
                                    </a>
                                    {if $section.fileName ne 'index'} 
                                    <a class="btn btn-danger btn-rounded" href="sections.php?action[confirmDelete]=true&section[sectionId]={$section.sectionId}{if $parentId}&parentId={$parentId}{/if}">
                                        <span class="fa fa-trash" data-toggle="tooltip" data-placement="top" data-original-title="Удалить"></span>
                                    </a>
                                    {/if}
                                </td>
                            </tr>
                            {/foreach}
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td class="small" colspan="3">{general:results}</td>
                                    <td align="right" colspan="4">
                                        {if isset($pageNums.pages)}
                                        <ul class="pagination pagination-sm pull-right push-down-10 push-up-10">
                                        {foreach from=$pageNums.pages item=number}
                                            {if $number eq $page}
                                            <li class="active"><a href="sections.php?page={$number}{if $parentId}&parentId={$parentId}{/if}">{$number}</a></li>
                                            {elseif $number eq '...'}
                                                ...
                                            {else}
                                            <li><a href="sections.php?page={$number}{if $parentId}&parentId={$parentId}{/if}">{$number}</a></li>
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
    
    {/if}

</div>
{* Подключаем Tiny MCE *}
{include file='tinymce_init.tpl'}
<script>
    var sectionId = '{if isset($section.sectionId)}{$section.sectionId}{/if}';

    $(document).ready(function () {
        Dropzone.autoDiscover = false; 
        $("#dZUpload").dropzone({ 
            url: "sections.php", 
            addRemoveLinks: false, 
            uploadMultiple: false,
            maxFilesize: 2,
            parallelUploads: 1,
            acceptedFiles: "image/*",
            params: { 'action':'uploadImage', 'sectionId': sectionId },
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

    $('.top_menu').click(function(){	
        var id = $(this).attr("data-id");
        var ckVal = $(this).attr("data-val");
        $.post('sections.php', { id: id, check: ckVal, action: 'menu' }, function(data){
            console.log(data.check);
            $(".up_menu"+id).val(data.check);
            if (data.check == 1){
                downMenuMessage();
                $('label#t'+id).attr('data-val', data.check);
            }else{
                topMenuMessage();
                $('label#t'+id).attr('data-val', data.check);
            }
        }, 'json');
    });	

    $('.status_selection').click(function(e){	
        var id = $(this).attr("id");
        var choiceVal = $(this).attr('value');
        $.post('sections.php', { id: id, choice: choiceVal, action: 'status' }, function(data){
            //console.log(data.choice);
            if (data.choice == 'visible'){
                sectionVisibleMessage();
                $('.status_selection#'+id).attr('value', data.choice);
                $('.status_selection#'+id).attr('class', 'status_selection btn btn-rounded btn-green');
                $('.status_selection#'+id+' span').attr('class', 'fa fa-eye');
            }else{
                sectionHiddenMessage();
                $('.status_selection#'+id).attr('value', data.choice);
                $('.status_selection#'+id).attr('class', 'status_selection btn btn-rounded btn-danger');
                $('.status_selection#'+id+' span').attr('class', 'fa fa-eye-slash');
            }
        }, 'json');
    });

    $(document).ready(function(){  
        var type = $('#type :selected').val();
        if (type === 'plain') {
            $('#type_content').prop("disabled", true); 
        }
        $('#type').change(function() {
            var type_content = $(this).val();
            $('#type_content').prop("disabled", true); 
            if (type_content === 'tree') {
                //console.log(type_content);
                $('#type_content').prop("disabled", false);
                $('#type_content').selectpicker('refresh');
            } 
        });
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
        $.post('sections.php', { id: id, desc: desc, link: link, action: 'editimage' }, function(data){
            if (data.update == 1){            
                $('.gallery-item.item-'+id+' .im_desc').text(desc);
                $('.gallery-item.item-'+id+' .im_link').text(link);
            }

        }, 'json');
    });

</script>

{include file="footer.tpl"}