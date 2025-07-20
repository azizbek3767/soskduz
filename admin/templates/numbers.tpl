{include file="header.tpl" activeItem="numbers" title="{sections:title}"}
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

            <form action="numbers.php" method="post" id="section" enctype="multipart/form-data">
                <input type="hidden" name="section[sectionId]" value="{if isset($section.sectionId)}{$section.sectionId}{/if}" />
                <input type="hidden" name="parentId" value="{$section.parentId}" />
                <input type="hidden" name="action[save]" value="1" />
                <div class="panel panel-default tabs">
                    <ul class="nav nav-tabs nav-justified">
                        <li class="active"><a href="#general" data-toggle="tab" aria-expanded="true">{sections:tabs:general}</a></li>
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

                                    <div class="col-md-8 col-xs-12 nopadding_left">
                                        <div class="form-group">
                                            <input type="hidden" name="section[parentId]" value="{$section.parentId}"/>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div align="center" class="col-md-12 main main_buttons">
                    <input class="btn btn-primary" type="submit" name="action[save]" value="&nbsp; {general:save} &nbsp;" /> &nbsp;
                    <a class="btn btn-primary" href="numbers.php{if isset($parentId)}?parentId={$parentId}{/if}">{general:cancel}</a>
                </div>
            </form>
        </div>
    {else}

        <div class="content-frame" style="margin-bottom:10px;">
            <div class="content-frame-top">
                <div class="col-md-3 col-xs-3 nopadding_left"><h2>{sections:title}</h2></div>
                <div class="col-md-6 col-xs-6 content-frame-body-left"><div id="ajaxStatus" class="alert alert-success col-md-6 info-box-img" role="alert"></div></div>
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
                                                <a href="numbers.php?parentId={$section.sectionId}" style="border-bottom: 1px dashed;">{$section.name|strip_tags|truncate:25}</a>
                                            {else}
                                                {$section.name|strip_tags|truncate:25}
                                            {/if}
                                        </td>
                                        <td  nowrap="nowrap">{$section.alias|strip_tags|truncate:25}</td>
                                        <td nowrap="nowrap"><a href="{$section.url}" target="_blank">{if $section.fileName eq 'index'}/{else}/{$section.fileName}/{/if}</a></td>
                                        <td class="" nowrap="nowrap">{$section.typeName}</td>
                                        <td class="" nowrap="nowrap">{$section.typeContentName}</td>
                                        <td class="btn-link-action" nowrap="nowrap">
                                            <a class="btn btn-rounded" href="numbers.php?action[edit]=true&section[sectionId]={$section.sectionId}{if $parentId}&parentId={$parentId}{/if}">
                                                <span class="fa fa-pen" data-toggle="tooltip" data-placement="top" data-original-title="Редактировать"></span>
                                            </a>
                                        </td>
                                    </tr>
                                {/foreach}
                                </tbody>
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
            url: "numbers.php",
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
        $.post('numbers.php', { id: id, check: ckVal, action: 'menu' }, function(data){
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
        $.post('numbers.php', { id: id, choice: choiceVal, action: 'status' }, function(data){
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
        $.post('numbers.php', { id: id, desc: desc, link: link, action: 'editimage' }, function(data){
            if (data.update == 1){
                $('.gallery-item.item-'+id+' .im_desc').text(desc);
                $('.gallery-item.item-'+id+' .im_link').text(link);
            }

        }, 'json');
    });

</script>

{include file="footer.tpl"}