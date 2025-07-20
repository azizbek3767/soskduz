{include file="header.tpl" activeItem="subscribers" title="Подписчики - {header:administration}"}
<script>
function deleteUserMessage(){ noty({ text: 'Подписчик удален', layout: 'topRight', type: 'success' }) }           
</script>
    
<div class="page-content-wrap">

	<div class="content-frame" style="margin-bottom:10px;">
        <div class="content-frame-top">                        
            <div class="col-md-3 col-xs-3 nopadding"><h2>Подписчики</h2></div>
            <div class="col-md-6 col-xs-6 content-frame-body-left">
                <div id="ajaxStatus" class="alert alert-warning col-md-6 info-box-img" role="alert"> </div> 
            </div>
            <div class="col-md-3 col-xs-3 nopadding">                                                  
                <div class="pull-right"> 
{*                     <a class="btn btn-danger" href="users.php?action[edit]=true" data-toggle="tooltip" data-placement="left" data-original-title="{users:addUser}"><i class="fa fa-plus"></i></a> *}
                </div>
            </div>
        </div>
	</div>

    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body panel-body-table">
                <div class="table-responsive">
                    <table class="table table-striped table-actions table-hover" id="users">
                        <thead>
                            <tr>
                                <th width="40">{general:table:id}</th>
                                <th>{users:email}</th>
                                <th width="100">Дата подписки</th>
                                <th class="text-center" width="100">Удалить</th>
                            </tr>
                        </thead>
                        {if $subscribeUsers}
                        <tbody>
                        {foreach item=user from=$subscribeUsers name=subscribeUsers}                                    
                            <tr id="user-{$user.userId}">
                                <td class="text-center">{$user.userId}</td>
                                <td nowrap="nowrap">{if $user.email != ''}{$user.email}{else}Email не указан{/if}</td>  
                                <td nowrap="nowrap">{$user.addedOn|date_format:"%d.%m.%Y %H:%M"}</td> 
                                <td class="btn-link-action text-center">
                                    <a onclick="deleteSubscribe({$user.userId}, '{$user.email}')" class="btn btn-danger btn-rounded"><span class="fa fa-trash"></span></a>
                                </td>
                            </tr>
                        {/foreach}
                        </tbody>
                        <tfoot>
                            <tr>
                                <td align="right" colspan="4">
                                    {if isset($pageNums.pages)}
                                    <div class="pull-left">{general:results}</div>
                                    <ul class="pagination pagination-sm pull-right push-down-10 push-up-10">
                                    
                                    {foreach from=$pageNums.pages item=number}
                						{if $number eq $page}
                						    <li class="active"><a href="subscribers.php?page={$number}" class="pageNum">{$number}</a></li>
                						{elseif $number eq '...'}
                						    ...
                						{else}
                						    <li><a href="subscribers.php?page={$number}" class="pageNum">{$number}</a></li>
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


</div>
{include file="footer.tpl"}