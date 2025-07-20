{include file="header.tpl" activeItem="payments" title="{payments:title}"} 
<div class="page-content-wrap">

    {if isset($errors.access_denied)}<span id="accessDeniedError" onclick = "noty({ text: '{payments:errors:0}', layout: 'topRight', type: 'error' });"></span>{/if}
	{if isset($errors.name)}<span id="titleError" onclick = "noty({ text: '{payments:errors:1}', layout: 'topRight', type: 'error' });"></span>{/if}
	{if isset($errors.not_saved)}<span id="notSavedError" onclick = "noty({ text: '{payments:errors:3}', layout: 'topRight', type: 'error' });"></span>{/if}
	{if isset($errors.no_sections)}<span id="noSectionsError" onclick = "noty({ text: '{payments:errors:4}', layout: 'topRight', type: 'error' });"></span>{/if} 
	{if isset($errors.payment_not_found)}<span id="paymentNotFoundError" onclick = "noty({ text: '{payments:errors:6}', layout: 'topRight', type: 'error' });"></span>{/if}
	{if isset($errors.fileName)}<span id="fileNameError" onclick = "noty({ text: '{payments:errors:7}', layout: 'topRight', type: 'error' });"></span>{/if} 
	{if isset($errors.fileNameExists)}<span id="fileNameExistsError" onclick = "noty({ text: '{payments:errors:8}', layout: 'topRight', type: 'error' });"></span>{/if}
	
	<script>
  	
    $(document).ready(function () {
      
      {if isset($errors.access_denied)} $('#accessDeniedError').click();{/if}
      {if isset($errors.name)} $('#titleError').click(); {/if}
      {if isset($errors.not_saved)} $('#notSavedError').click();{/if}
      {if isset($errors.payment_not_found)} $('#paymentNotFoundError').click();{/if}
      {if isset($errors.fileName)} $('#fileNameError').click();{/if}
      {if isset($errors.fileNameExists)} $('#fileNameExistsError').click();{/if}
      {if isset($errors.fileNameProhibited)} $('#fileNameProhibitedError').click();{/if}
      {if isset($errors.fileNameCharacters)} $('#fileNameCharactersError').click();{/if}
      
    });
    function deletePaymentMessage(){ noty({ text: '{payments:messages:1}',layout: 'topRight',type: 'success' }) }
          
  </script>
  
{if isset($action.edit)}
	<script>
    	{literal}
    	$(function () {function e() {
        	fileName_touched || $("#fileName").val(n())
        }
        function m() {
            return name = $("#name").val()
        }
        function n() {
            return fileName = $("#name").val(), 
            fileName = fileName.replace(/[\s]+/gi, "{/literal}{$config.filename_word_separator}{literal}"), 
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
        {/literal}
        </script>
	<div class="content-frame" style="margin-bottom:10px;">
        <div class="content-frame-top"> 
            <div class="col-md-3 col-xs-3 nopadding_left"><h2>{payments:title}</h2></div>                                          
            <div class="col-md-6 col-xs-6 content-frame-body-left">
                <div id="ajaxStatus" class="alert alert-warning col-md-6 info-box-img" role="alert"></div>
            </div>                            
        </div>
	</div>
  	
	<form action="payments.php" method="post" id="payment" enctype="multipart/form-data">
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
                                        <div class="form-group"><label class="field_name {if isset($errors.name)}fError{/if}">{payments:general:title}</label>
                                            <input class="form-control" autocomplete="off" id="name" type="text" name="payment[name]" value="{if isset($payment.name)}{$payment.name}{/if}" onblur="proposeFileName('name', 'fileName', 'payment', '{$config.filename_word_separator}', '{$config.convert_filename_to_lowercase}');" />      
                                  
                                            <input autocomplete="off" id="fileName" type="hidden" name="payment[fileName]" value="{if isset($payment.fileName)}{$payment.fileName}{/if}" />              
                                        </div>
                                    </div>
                                    <div class="col-md-6 nopadding_right">
                                        <div class="form-group">
                                            <label class="field_name">{payments:status}</label> 
                                            {if isset($payment.status)}                                                                                       
                                            {html_options options=$statuses name="payment[status]" id=status selected=$payment.status class="form-control select"}
                                            {else}
                                            {html_options options=$statuses name="payment[status]" id=status class="form-control select"}
                                            {/if}
                                            
                                        </div>
                                    </div>
                                    {if !empty($payment.fileName)}
                                        {include file="payment_$templateName.tpl"}
                                    {/if}
                                    
                                    <div class="form-group">
                                        <label class="field_name">Описание</label>
                                        <textarea name="payment[summary]" class="description">{if isset($payment.summary)}{$payment.summary}{/if}</textarea>
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
		    <input class="btn btn-primary" type="submit" name="action[save]" value="&nbsp; {general:save} &nbsp;" onclick="document.getElementById('payment').target='_self'; document.getElementById('payment').action='{$GLOBAL_URL}/admin{if $SITE_LANG != ''}/{$SITE_LANG}{/if}/payments.php?{if isset($page)}page={$page}{/if}'" /> &nbsp; 		
            <a class="btn btn-primary" href="payments.php?{if isset($page)}page={$page}{/if}">{general:cancel}</a>
        </div>
    </form>

{else}
  
     
    <div class="content-frame" style="margin-bottom:10px;">
        <div class="content-frame-top">                        
            <div class="col-md-6 col-xs-6 nopadding_left"><h2>{payments:title}</h2></div> 
            <div class="col-md-6 col-xs-6 nopadding_right">                                                
                <div class="pull-right"> 
                    <a class="btn btn-danger" href="payments.php?action[edit]=true" data-toggle="tooltip" data-placement="left" data-original-title="{payments:addPayment}"><i class="fa fa-plus"></i></a>
      				        
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
                                <th width="100">{general:status}</th>
                                <th width="140">{general:action}</th>
                            </tr>
                        </thead>
                        {if isset($payments)}
                        <tbody>
                        {foreach item=payment from=$payments name=payments}
                            <tr id="payment-{$payment.paymentId}">
                                <td style="line-height: 58px;" class="text-center" nowrap="nowrap">{$payment.paymentId}</td>
                            
                                <td style="line-height: 58px;" width="100%">{$payment.name}</a></td>
                             
                                <td style="line-height: 58px;min-width: 120px;">{$payment.statusName}</td>
                                <td class="btn-link-action text-center">
                                    <a class="btn btn-rounded" href="payments.php?action[edit]=true&payment[paymentId]={$payment.paymentId}&page={$page}"><span class="fa fa-pen"></span></a>  
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
                                        <li class="active"><a href="payments.php?page={$number}">{$number}</a></li>
                                        {elseif $number eq '...'}
                                        ...
                                        {else}
                                        <li><a href="payments.php?page={$number}">{$number}</a></li>
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