{include file="header.tpl" activeItem="donations" title="{donations:title}"}
<div class="page-content-wrap">
    {if isset($messages.saved)}<span id="savedMessage" onclick="noty({ text: '{donations:messages:0}', layout: 'topRight', type: 'success', timeout: 1500 });"></span>{/if}
    {if isset($errors.access_denied)}<span id="accessDeniedError" onclick="noty({ text: '{donations:errors:0}', layout: 'topRight', type: 'error', timeout: 1500 });"></span>{/if} 
	{if isset($errors.name)}<span id="titleError" onclick = "noty({ text: '{donations:errors:1}', layout: 'topRight', type: 'error', timeout: 1500 });"></span>{/if}
	{if isset($errors.not_saved)}<span id="notSavedError" onclick="noty({ text: '{donations:errors:3}', layout: 'topRight', type: 'error', timeout: 1500 });"></span>{/if}
	{if isset($errors.donation_not_found)}<span id="articleNotFoundError" onclick="noty({ text: '{donations:errors:6}', layout: 'topRight', type: 'error', timeout: 1500 });"></span>{/if}

	<script>
    $(document).ready(function () {
        {if isset($messages.saved)} $('#savedMessage').click();{/if}
        {if isset($errors.access_denied)} $('#accessDeniedError').click();{/if}
        {if isset($errors.name)} $('#titleError').click(); {/if}
        {if isset($errors.not_saved)} $('#notSavedError').click();{/if}
        {if isset($errors.donation_not_found)} $('#articleNotFoundError').click();{/if}
    });

    function deleteMessage(){ noty({ text: '{donations:messages:2}', layout: 'topRight', type: 'success', timeout: 1500 }) }           
  </script>
  
{if isset($action.edit)}
	<div class="content-frame" style="margin-bottom:10px;">
        <div class="content-frame-top">
            <div class="col-md-3 nopadding_left"><h2>{donations:title}</h2></div>
            <div class="col-md-4 content-frame-body-left">
                <div id="ajaxStatus" class="alert alert-warning col-md-6 info-box-img" role="alert"></div>
                <div class="upload-image alert" role="alert"></div>
                <span id="deletingStatus" class="alert alert-warning col-md-6 info-box-img" role="alert"></span>
		    </div>
		</div>
	</div>
  
	<form action="donations.php" method="post" id="donation">
	    <input type="hidden" name="donation[id]" value="{if isset($donation.id)}{$donation.id}{/if}" />
        <input type="hidden" name="action[save]" value="1" />
        <div class="col-md-12">
            <div class="panel panel-default tabs">
                
                <ul class="nav nav-tabs nav-justified">
                    <li class="active"><a href="#general" data-toggle="tab" aria-expanded="true">{donations:tabs:general}</a></li>
                    <li class=""><a href="#summary" data-toggle="tab" aria-expanded="false">{donations:tabs:summary}</a></li>
                    <li class=""><a href="#misc" data-toggle="tab" aria-expanded="false">{donations:tabs:misc}</a></li>
                </ul>
                
                <div class="panel-body tab-content nopadding">
	                <div class="tab-pane active" id="general">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                
                                <div class="col-md-6">
                                    <div class="col-md-6 nopadding_left">
                                        <div class="form-group">
                                            <label class="field_name">{donations:general:orderBy}</label>
                                            <input class="form-control" autocomplete="off" type="text" name="donation[orderBy]" value="{if isset($donation.orderBy)}{$donation.orderBy}{/if}" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 nopadding_right">
                                        <div class="form-group">
                                            <label class="field_name">{donations:general:status}</label>
                                            {if isset($donation.status)}
                                                {html_options options=$statuses name="donation[status]" selected=$donation.status class="form-control select"}
                                            {else}
                                                {html_options options=$statuses name="donation[status]" class="form-control select"}
                                            {/if}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="field_name {if isset($errors.name)}fError{/if}">{donations:general:title}</label>
                                        <input class="form-control" autocomplete="off" type="text" name="donation[name]" id="title" value="{if isset($donation.name)}{$donation.name}{/if}" />
                                    </div>

                                    <div class="form-group">
                                        <label class="field_name">{donations:title}</label>
                                        <input class="form-control" autocomplete="off" type="text" name="donation[price]" value="{if isset($donation.price)}{$donation.price}{/if}" />
                                    </div>
                                 	
    
                                    {if isset($donation.modifiedOn)}
                                    <div class="form-group">
                                        <label class="field_name">{general:modified}</label>
                                        <div class=""><i>{$donation.modifiedOn} ({$donation.modifiedBy.loginName|default:"{general:unknowUser}"})</i></div>
                                    </div>
                                    {/if}
                                    {if isset($donation.addedOn)}
                                    <div class="form-group">
                                        <label class="field_name">{general:created}</label>
                                        <div class=""><i>{$donation.addedOn} ({$donation.addedBy.loginName|default:"{general:unknowUser}"})</i></div>
                                    </div>
                                    {/if}
                                 
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="field_name">Описание</label>
                                        <textarea name="donation[summary]" class="description">{if isset($donation.summary)}{$donation.summary}{/if}</textarea> 
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
            <input class="btn btn-primary" type="submit" name="action[save]" value="&nbsp; {general:save} &nbsp;" onclick="document.getElementById('donation').target='_self'; document.getElementById('donation').action='{$GLOBAL_URL}/admin{if $SITE_LANG != ''}/{$SITE_LANG}{/if}/donations.php'" />	&nbsp;
            <a class="btn btn-primary" href="donations.php">{general:cancel}</a>
        </div>
    </form>

{elseif !isset($errors.access_denied)}

    <div class="content-frame" style="margin-bottom:10px;">
        <div class="content-frame-top">                        
            <div class="col-md-6 col-xs-6 nopadding_left"><h2>{donations:title}</h2></div>
            <div class="col-md-6 col-xs-6 nopadding_right">
                <a class="btn btn-danger pull-right" href="donations.php?action[edit]=true" data-toggle="tooltip" data-placement="left" data-original-title="{donations:addDonation}"><i class="fa fa-plus"></i></a>
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
                                        <input class="btn btn-primary" type="submit" name="action[reorder]" value="{general:sort}" data-toggle="tooltip" data-placement="top" data-original-title="Порядок публикации на сайте"/>
                                    </th>
                                    <th class="">{donations:title}</th>
                                    <th class="text-center" width="100">{general:status}</th>
                                    <th class="text-center" width="50">{general:action}</th>
                                </tr>
                            </thead>
                            <tbody>   
                                {if isset($donations)}
                                {foreach item=donation from=$donations name=donations}
                                <tr id="donation-{$donation.id}">
                                    <td class="text-center"><input type="text" name="donation[orderBys][{$donation.id}]" value="{$donation.orderBy}" class="form-control text-center"/></td>
                                    <td width="100%">{$donation.name}</td>
                                    <td style="" id="status-{$donation.id}" align="center">{$donation.statusName}</td>
                                    <td class="btn-link-action text-center">
                                        <a href="donations.php?action[edit]=true&donation[id]={$donation.id}" class="btn btn-default btn-rounded"><span class="fa fa-pen"></span></a>
                                        <a class="btn btn-danger btn-rounded" onclick="deleteDonation({$donation.id}, '{$donation.name}');"><span class="fa fa-trash"></span></a>
                                    </td>
                                </tr>
                                {/foreach}
                                {else}
                                <tr class="odd"><td class="data none" colspan="7" align="center">- {general:none} -</td></tr>
                                {/if} 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> 
	    </form>	
    </div>

{/if}
</div>

{* Подключаем Tiny MCE *}
{include file='tinymce_init.tpl'}

{include file="footer.tpl"}