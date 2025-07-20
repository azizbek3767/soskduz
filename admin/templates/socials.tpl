{include file="header.tpl" activeItem="socials" title="{settings:social}"}
<div class="page-content-wrap">

    {if isset($errors.errorName)}<span id="nameError" onclick="noty({ text: '{socials:errors:0}', layout: 'topRight', type: 'error', timeout: 1500 });"></span>{/if}
    {if isset($errors.fileNameEmpty)}<span id="fileNameEmpty" onclick="noty({ text: '{socials:errors:1}', layout: 'topRight', type: 'error', timeout: 1500 });"></span>{/if}
    {if isset($errors.fileNameError)}<span id="fileNameError" onclick="noty({ text: '{socials:errors:2}', layout: 'topRight', type: 'error', timeout: 1500 });"></span>{/if}
    {if isset($errors.not_saved)}<span id="notSavedError" onclick="noty({ text: '{socials:errors:3}', layout: 'topRight', type: 'error', timeout: 1500 });"></span>{/if}
    {if isset($messages.saved)}<span id="savedMessage" onclick="noty({ text: '{socials:messages:0}', layout: 'topRight', type: 'success', timeout: 1500 });"></span>{/if}
    <script>
        $(document).ready(function() {
            {if isset($errors.errorName)}$('#nameError').click(); {/if}
            {if isset($errors.fileNameEmpty)}$('#fileNameEmpty').click(); {/if}
            {if isset($errors.fileNameError)}$('#fileNameError').click(); {/if}
            {if isset($errors.not_saved)}$('#notSavedError').click(); {/if}
            {if isset($messages.saved)}$('#savedMessage').click(); {/if}
        });
        function deleteSocialMessage() { noty({ text: '{socials:messages:1}', layout: 'topRight', type: 'success', timeout: 1500 }) } 
    </script>

    {if isset($action.edit)}
    <div class="content-frame" style="margin-bottom:10px;"><div class="content-frame-top"><div class="col-md-4 nopadding_left">{settings:social}<h2></h2></div></div></div>
    <div class="col-md-12">
        <script>
            $(function () {
                function e() { fileName_touched || $("#fileName").val(n()) }
                function n() { return fileName = $("#name").val(), fileName = fileName.replace(/[\s]+/gi, "{$config.filename_word_separator}"), fileName = l(fileName), fileName = fileName.replace(/[^0-9a-z_\-]+/gi, "").toLowerCase() }
                function l(e) { for (var a = "А-а-Б-б-В-в-Ґ-ґ-Г-г-Д-д-Е-е-Ё-ё-Є-є-Ж-ж-З-з-И-и-І-і-Ї-ї-Й-й-К-к-Л-л-М-м-Н-н-О-о-П-п-Р-р-С-с-Т-т-У-у-Ф-ф-Х-х-Ц-ц-Ч-ч-Ш-ш-Щ-щ-Ъ-ъ-Ы-ы-Ь-ь-Э-э-Ю-ю-Я-я".split("-"), i = "A-a-B-b-V-v-G-g-G-g-D-d-E-e-E-e-E-e-ZH-zh-Z-z-I-i-I-i-I-i-J-j-K-k-L-l-M-m-N-n-O-o-P-p-R-r-S-s-T-t-U-u-F-f-H-h-TS-ts-CH-ch-SH-sh-SCH-sch-'-'-Y-y-'-'-E-e-YU-yu-YA-ya".split("-"), t = "", n = 0, l = e.length; l > n; n++) { var o = e.charAt(n),c = a.indexOf(o);t += c >= 0 ? i[c] : o } return t }
                fileName_touched = !0, ($("#fileName").val() == n() || "" == $("#fileName").val()) && (fileName_touched = !1), $("#fileName").change( function () { fileName_touched = !0 }), $("#name").keyup( function () { e() })
            });
        </script>
        <form action="socials.php" method="post" id="social">
            <input type="hidden" name="social[socialId]" value="{if isset($social.socialId)}{$social.socialId}{/if}" />
            <div class="panel panel-default tabs ">
                <ul class="nav nav-tabs nav-justified">
                    <li class="active"><a href="#status" data-toggle="tab" aria-expanded="true">{settings:social}</a></li>
                </ul>
                <div class="panel-body tab-content nopadding">
                    <div class="tab-pane active" id="status">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title"> {general:asterisk}</h5>
                            </div>
                            <div class="panel-body" id="generalPane">
                                <div class="form-group">
                                    <div class="col-md-3 nopadding_left"><label class="field_name {if isset($errors.errorName)}fError{/if}">{socials:name}</label></div>
                                    <div class="col-md-9 nopadding_right"><input class="form-control" autocomplete="off" id="name" type="text" name="social[name]" value="{if isset($social.name)}{$social.name}{/if}" /></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3 nopadding_left"><label class="field_name {if isset($errors.fileNameEmpty) or isset($errors.fileNameError)}fError{/if}">{socials:fileName}</label></div>
                                    <div class="col-md-9 nopadding_right"><input class="form-control" autocomplete="off" id="fileName" type="text" name="social[fileName]" value="{if isset($social.fileName)}{$social.fileName}{/if}" /></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3 nopadding_left"><label class="field_name">{socials:icon}</label></div>
                                    <div class="col-md-9 nopadding_right"><input class="form-control" autocomplete="off" id="icon" type="text" name="social[icon]" value="{if isset($social.icon)}{$social.icon}{/if}" /></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3 nopadding_left"><label class="field_name">{socials:url}</label></div>
                                    <div class="col-md-9 nopadding_right"><input class="form-control" autocomplete="off" id="url" type="text" name="social[url]" value="{if isset($social.url)}{$social.url}{/if}" /></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3 nopadding_left"><label class="field_name">{socials:status}</label></div>
                                    <div class="col-md-9 nopadding_right">
                                        {if isset($social.status)}
                                            {html_options options=$statuses name="social[status]" selected=$social.status class="form-control select"}
                                        {else}
                                            {html_options options=$statuses name="social[status]" class="form-control select"}
                                        {/if}
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 main main_buttons text-center">
                <input class="btn btn-primary" type="submit" name="action[save]" value="&nbsp; {general:save} &nbsp;" />
                <a class="btn btn-primary" href="socials.php">{general:cancel}</a>
            </div>
        </form>
    </div>

    {else}

    <div class="content-frame" style="margin-bottom:10px;">
        <div class="content-frame-top">
            <div class="col-md-4 nopadding_left"><h2>{settings:social}</h2></div>
            <div class="col-md-4 content-frame-body-left"><div id="ajaxStatus" class="alert alert-warning col-md-6 info-box-img" role="alert"> </div></div>
            <div class="col-md-4 nopadding_right"><div class="pull-right"> <a class="btn btn-danger" href="socials.php?action[edit]=true" data-original-title="{socials:add}"><i class="fa fa-plus"></i></a></div></div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body panel-body-table">
                <div class="table-responsive">
                    <table class="table table-striped table-actions table-hover" id="socials">
                        <thead>
                            <tr>
                                <th>{socials:title}</th>
                                <th>{socials:urlTable}</th>
                                <th class="text-center">{general:status}</th>
                                <th>{general:action}</th>
                            </tr>
                        </thead>

                        {if isset($socials)}
                            <tbody>
                                {foreach item=social from=$socials name=socials}
                                    <tr id="social-{$social.socialId}">
                                        <td class="" width="100%">{$social.name nofilter}</td>
                                        <td class="" align="left">{$social.url}</td>
                                        <td style="" class="" align="center">{$social.status nofilter}</td>
                                        <td class="btn-link-action text-center">
                                            <a class="btn btn-rounded" href="socials.php?action[edit]=true&social[socialId]={$social.socialId}"><span class="fa fa-pen"></span></a>
                                            <a class="btn btn-danger btn-rounded" onclick="deleteSocial({$social.socialId}, '{$social.name nofilter}');"><span class="fa fa-trash"></span></a>
                                        </td>
                                    </tr>
                                {/foreach}
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4">
                                        {if isset($pageNums.pages)}
                                            <div class="pull-left">{general:results}</div>
                                            <ul class="pagination pagination-sm pull-right push-down-10 push-up-10">
                                                {foreach from=$pageNums.pages item=number}
                                                    {if $number eq $page}
                                                        <li class="active"><a href="socials.php?page={$number}">{$number}</a></li>
                                                    {elseif $number eq '...'}
                                                        ...
                                                    {else}
                                                        <li><a href="socials.php?page={$number}">{$number}</a></li>
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
{include file="footer.tpl"}
