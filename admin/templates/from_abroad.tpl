{include file="header.tpl" activeItem="from_abroad" title="{from_abroad:title}"}
<div class="page-content-wrap">

    {if isset($errors.access_denied)}<span id="accessDeniedError" onclick = "noty({ text: '{from_abroad:errors:0}', layout: 'topRight', type: 'error' });"></span>{/if}
    {if isset($errors.name)}<span id="titleError" onclick = "noty({ text: '{from_abroad:errors:1}', layout: 'topRight', type: 'error' });"></span>{/if}
    {if isset($errors.not_saved)}<span id="notSavedError" onclick = "noty({ text: '{from_abroad:errors:3}', layout: 'topRight', type: 'error' });"></span>{/if}
    {if isset($errors.no_sections)}<span id="noSectionsError" onclick = "noty({ text: '{from_abroad:errors:4}', layout: 'topRight', type: 'error' });"></span>{/if}
    {if isset($errors.fullName)}<span id="fullNameError" onclick = "noty({ text: '{from_abroad:errors:3}', layout: 'topRight', type: 'error' });"></span>{/if}

    <script>

        $(document).ready(function () {

            {if isset($errors.access_denied)} $('#accessDeniedError').click();{/if}
            {if isset($errors.name)} $('#titleError').click(); {/if}
            {if isset($errors.not_saved)} $('#notSavedError').click();{/if}
            {if isset($errors.payment_not_found)} $('#paymentNotFoundError').click();{/if}
            {if isset($errors.fullName)} $('#fullNameError').click();{/if}
            {if isset($errors.fullNameExists)} $('#fullNameExistsError').click();{/if}
            {if isset($errors.fullNameProhibited)} $('#fullNameProhibitedError').click();{/if}
            {if isset($errors.fullNameCharacters)} $('#fullNameCharactersError').click();{/if}

        });
        function deletePaymentMessage(){ noty({ text: '{from_abroad:messages:1}',layout: 'topRight',type: 'success' }) }

    </script>
    {if isset($action.edit)}
        <script>
            {literal}
            $(function () {function e() {
                fullName_touched || $("#fullName").val(n())
            }
                function m() {
                    return name = $("#name").val()
                }
                function n() {
                    return fullName = $("#name").val(),
                        fullName = fullName.replace(/[\s]+/gi, "{/literal}{$config.fullName_word_separator}{literal}"),
                        fullName = l(fullName), fullName = fullName.replace(/[^0-9a-z_\-]+/gi, "").toLowerCase()
                }
                function l(e) {
                    for (var a = "А-а-Б-б-В-в-Ґ-ґ-Г-г-Д-д-Е-е-Ё-ё-Є-є-Ж-ж-З-з-И-и-І-і-Ї-ї-Й-й-К-к-Л-л-М-м-Н-н-О-о-П-п-Р-р-С-с-Т-т-У-у-Ф-ф-Х-х-Ц-ц-Ч-ч-Ш-ш-Щ-щ-Ъ-ъ-Ы-ы-Ь-ь-Э-э-Ю-ю-Я-я".split("-"), i = "A-a-B-b-V-v-G-g-G-g-D-d-E-e-E-e-E-e-ZH-zh-Z-z-I-i-I-i-I-i-J-j-K-k-L-l-M-m-N-n-O-o-P-p-R-r-S-s-T-t-U-u-F-f-H-h-TS-ts-CH-ch-SH-sh-SCH-sch-'-'-Y-y-'-'-E-e-YU-yu-YA-ya".split("-"), t = "", n = 0, l = e.length; l > n; n++) {
                        var o = e.charAt(n),c = a.indexOf(o);t += c >= 0 ? i[c] : o

                    }
                    return t
                }
                fullName_touched = !0,

                ($("#fullName").val() == n() || "" == $("#fullName").val()) && (fullName_touched = !1),
                    $("#fullName").change(function () {fullName_touched = !0}),
                    $("#name").keyup(function () {e()})});
            {/literal}
        </script>
        <div class="content-frame" style="margin-bottom:10px;">
            <div class="content-frame-top">
                <div class="col-md-3 col-xs-3 nopadding_left"><h2>{from_abroad:title}</h2></div>
                <div class="col-md-6 col-xs-6 content-frame-body-left">
                    <div id="ajaxStatus" class="alert alert-warning col-md-6 info-box-img" role="alert"></div>
                </div>
            </div>
        </div>

        <form action="from_abroad.php" method="post" id="payment" enctype="multipart/form-data">
            <input type="hidden" name="payment[paymentId]" value="{if isset($payment.paymentId)}{$payment.paymentId}{/if}"/>
            <input type="hidden" name="action[save]" value="1" />
            <div class="col-md-12">
                <div class="panel panel-default tabs">
                    <div class="panel-body tab-content nopadding">
                        <div class="tab-pane active" id="general">
                            <div class="panel panel-default" style="margin-bottom: 0px;">
                                <div class="panel-body">
                                    <div class="col-md-12">

                                        <div class="col-md-6 nopadding_left">
                                            <div class="form-group"><label class="field_name {if isset($errors.fullName)}fError{/if}">{from_abroad:fullName}</label>
                                                <input class="form-control" autocomplete="off" id="fullName" type="text" name="payment[fullName]" value="{if isset($payment.fullName)}{$payment.fullName}{/if}"/>
                                            </div>
                                            <div class="form-group"><label class="field_name {if isset($errors.actualAddress)}fError{/if}">{from_abroad:actualAddress}</label>
                                                <input class="form-control" autocomplete="off" id="actualAddress" type="text" name="payment[actualAddress]" value="{if isset($payment.actualAddress)}{$payment.actualAddress}{/if}"/>
                                            </div>
                                            <div class="form-group"><label class="field_name {if isset($errors.legalAddress)}fError{/if}">{from_abroad:legalAddress}</label>
                                                <input class="form-control" autocomplete="off" id="legalAddress" type="text" name="payment[legalAddress]" value="{if isset($payment.legalAddress)}{$payment.legalAddress}{/if}" />
                                            </div>
                                            <div class="form-group"><label class="field_name {if isset($errors.inn)}fError{/if}">{from_abroad:inn}</label>
                                                <input class="form-control" autocomplete="off" id="inn" type="text" name="payment[inn]" value="{if isset($payment.inn)}{$payment.inn}{/if}" />
                                            </div>
                                            <div class="form-group"><label class="field_name {if isset($errors.bank)}fError{/if}">{from_abroad:bank}</label>
                                                <input class="form-control" autocomplete="off" id="bank" type="text" name="payment[bank]" value="{if isset($payment.bank)}{$payment.bank}{/if}" />
                                            </div>
                                            <div class="form-group"><label class="field_name {if isset($errors.rs)}fError{/if}">{from_abroad:rs}</label>
                                                <input class="form-control" autocomplete="off" id="rs" type="text" name="payment[rs]" value="{if isset($payment.rs)}{$payment.rs}{/if}" />
                                            </div>
                                            <div class="form-group"><label class="field_name {if isset($errors.mfo)}fError{/if}">{from_abroad:mfo}</label>
                                                <input class="form-control" autocomplete="off" id="mfo" type="text" name="payment[mfo]" value="{if isset($payment.mfo)}{$payment.mfo}{/if}" />
                                            </div>
                                            <div class="form-group"><label class="field_name {if isset($errors.oked)}fError{/if}">{from_abroad:oked}</label>
                                                <input class="form-control" autocomplete="off" id="oked" type="text" name="payment[oked]" value="{if isset($payment.oked)}{$payment.oked}{/if}" />
                                            </div>
                                        </div>
                               {*         {if !empty($payment.fullName)}
                                            {include file="from_abroad.tpl"}
                                        {/if}*}

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <div class="col-md-12 main main_buttons text-center">
                <input class="btn btn-primary" type="submit" name="action[save]" value="&nbsp; {general:save} &nbsp;" onclick="document.getElementById('payment').target='_self'; document.getElementById('payment').action='{$GLOBAL_URL}/admin{if $SITE_LANG != ''}/{$SITE_LANG}{/if}/from_abroad.php?{if isset($page)}page={$page}{/if}'" /> &nbsp;
                <a class="btn btn-primary" href="from_abroad.php?{if isset($page)}page={$page}{/if}">{general:cancel}</a>
            </div>
        </form>

    {else}


        <div class="content-frame" style="margin-bottom:10px;">
            <div class="content-frame-top">
                <div class="col-md-6 col-xs-6 nopadding_left"><h2>{from_abroad:title}</h2></div>
                <div class="col-md-6 col-xs-6 nopadding_right">
                    <div class="pull-right">
                        <a class="btn btn-danger" href="from_abroad.php?action[edit]=true" data-toggle="tooltip" data-placement="left" data-original-title="{from_abroad:add}"><i class="fa fa-plus"></i></a>

                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body panel-body-table">
                    <div class="table-responsive">
                        <table class="table table-striped table-actions table-hover" id="from_abroad">
                            <thead>
                            <tr>
                                <th width="50">Id</th>
                                <th>Название</th>
                                <th width="100">{general:status}</th>
                                <th width="140">{general:action}</th>
                            </tr>
                            </thead>

                            {if isset($abroad_requisits)}
                                <tbody>
                                {foreach item=payment from=$abroad_requisits name=from_abroad}
                                    <tr id="payment-{$payment.paymentId}">
                                        <td style="line-height: 58px;" class="text-center" nowrap="nowrap">{$payment.paymentId}</td>

                                        <td style="line-height: 58px;" width="100%">{$payment.name}</a></td>

                                        <td style="line-height: 58px;min-width: 120px;">{$payment.statusName}</td>
                                        <td class="btn-link-action text-center">
                                            <a class="btn btn-rounded" href="from_abroad.php?action[edit]=true&payment[paymentId]={$payment.paymentId}&page={$page}"><span class="fa fa-pen"></span></a>
                                            <a class="btn btn-danger btn-rounded" onclick="deletePayment({$payment.paymentId}, '{$payment.name}');"><span class="fa fa-trash"></span></a>
                                        </td>
                                    </tr>
                                {/foreach}
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="4">
                                        <div class="pull-left">{general:results}</div>
                                        {if isset($pageNums.pages)}
                                            <ul class="pagination pagination-sm pull-right push-down-10 push-up-10">
                                                {foreach from=$pageNums.pages item=number}
                                                    {if $number eq $page}
                                                        <li class="active"><a href="from_abroad.php?page={$number}">{$number}</a></li>
                                                    {elseif $number eq '...'}
                                                        ...
                                                    {else}
                                                        <li><a href="from_abroad.php?page={$number}">{$number}</a></li>
                                                    {/if}
                                                {/foreach}
                                            </ul>
                                        {/if}
                                    </td>
                                </tr>
                                </tfoot>
                            {else}
                                <tbody><tr class="odd"><td class="data none" colspan="4" align="center">- {general:none} -</td></tr></tbody>
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


{include file="footer.tpl"}