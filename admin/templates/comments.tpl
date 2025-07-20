{include file="header.tpl" activeItem="comments" title="{comments:title}"}
<div class="page-content-wrap">
  
    {if isset($messages.saved)}<span id="savedMessage" onclick="noty({ text: '{comments:messages:0}', layout: 'topRight', type: 'success' });"></span>{/if}
    {if isset($messages.bulk_save)}<span id="bulkSaveMessage" onclick="noty({ text: '{comments:messages:1}', layout: 'topRight', type: 'success' });"></span>{/if}
	{if isset($errors.access_denied)}<span id="accessDeniedError" onclick="noty({ text: '{comments:errors:0}', layout: 'topRight', type: 'error' });"></span>{/if}
	{if isset($errors.not_saved)}<span id="notSavedError" onclick="noty({ text: '{comments:errors:1}', layout: 'topRight', type: 'error' });"></span>{/if}
	{if isset($errors.comment_not_found)}<span id="commentNotFoundError" onclick="noty({ text: '{comments:errors:2}', layout: 'topRight', type: 'error' });"></span>{/if}
    {if isset($errors.authorName)}<span id="authorNameError" onclick="noty({ text: '{comments:errors:4}', layout: 'topRight', type: 'error' });"></span>{/if}
    {if isset($errors.authorEmail)}<span id="authorEmailError" onclick="noty({ text: '{comments:errors:3}', layout: 'topRight', type: 'error' });"></span>{/if}
    {if isset($errors.content)}<span id="contentError" onclick="noty({ text: '{comments:errors:5}', layout: 'topRight', type: 'error' });"></span>{/if}
    {if isset($errors.authorEmailNot)}<span id="authorEmailNotError" onclick="noty({ text: '{comments:errors:6}', layout: 'topRight', type: 'error' });"></span>{/if}
    <script>
  	
    $(document).ready(function () {
      
      {if isset($errors.access_denied)} $('#accessDeniedError').click();{/if}
      {if isset($errors.not_saved)} $('#notSavedError').click(); {/if}
      {if isset($errors.comment_not_found)} $('#commentNotFoundError').click();{/if}
      {if isset($errors.authorName)} $('#authorNameError').click();{/if}
      {if isset($errors.authorEmail)} $('#authorEmailError').click();{/if}
      {if isset($errors.authorEmailNot)} $('#authorEmailNotError').click();{/if}
      {if isset($errors.content)} $('#contentError').click();{/if}
      
      {if isset($messages.saved)} $('#savedMessage').click();{/if}
      {if isset($messages.bulk_save)} $('#bulkSaveMessage').click();{/if}
    });           
  </script>

  
{if isset($action.edit)}

	<div class="content-frame" style="margin-bottom:10px;">                                    
        <div class="content-frame-top">
            <div class="col-md-3 nopadding"><div class="page-title"><h2><span class="fa fa-comments"></span> {general:comments}</h2></div></div>
            <div class="col-md-6 content-frame-body-left">
                <div id="ajaxStatus"> </div>  
            </div>                        
		</div>

		<div class="clear"></div>
		<div class="col-md-12">
            <form action="comments.php" method="post" id="comment">
                <input type="hidden" name="comment[commentId]" value="{if isset($comment.commentId)}{$comment.commentId}{/if}" />
                <input type="hidden" name="action[save]" value="1" />
                <div class="block">
                    <div class="form-group">
                        <div class="col-md-3 nopadding_left">
                            {comments:authorName}
                        </div>                                      
                        <div class="col-md-9 nopadding_right">
                            <input class="form-control" autocomplete="off" id="authorName" type="text" name="comment[authorName]" value="{if isset($comment.authorName)}{$comment.authorName}{/if}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3 nopadding_left">
                            {comments:authorEmail}
                        </div>                                   
                        <div class="col-md-9 nopadding_right">
                            <input class="form-control" autocomplete="off" id="authorEmail" type="text" name="comment[authorEmail]" value="{if isset($comment.authorEmail)}{$comment.authorEmail}{/if}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3 nopadding_left">
                            {comments:status}
                        </div>
                        <div class="col-md-9 nopadding_right">
                            {if isset($comment.status) and $comment.status ne ''}
                                {html_options options=$statuses name="comment[status]" id="status" selected=$comment.status class="form-control select"}
                            {else}
                                {html_options options=$statuses name="comment[status]" id="status" class="form-control select"}
                            {/if}
                        </div>
                    </div>
                    <div class="form-group">
                        {comments:commentMessage}
                        <textarea class="description"  name="comment[content]" id="content">{if isset($comment.content)}{$comment.content}{/if}</textarea>
                    </div>
                    <div class="form-group">
                        {comments:commentAnswer}
                        <textarea class="description"  name="comment[answer]" id="answer">{if isset($comment.answer)}{$comment.answer}{/if}</textarea>
                    </div>
                </div>
                <div align="center" class="main main_buttons">
    			    <input class="btn btn-primary" type="submit" name="action[save]" value="&nbsp; {general:save} &nbsp;" /> &nbsp;
                    <a class="btn btn-primary" href="comments.php{if isset($page)}?page={$page}{/if}">{general:cancel}</a>
  		   </div>
  		</form>
    </div> 
  </div>  
 
{elseif !isset($errors.access_denied)}

	<div class="content-frame" style="margin-bottom:10px;">
        <div class="content-frame-top">                        
            <div class="col-md-3 nopadding"><h2><span class="fa fa-comments"></span> {general:comments}</h2></div>
            <div class="col-md-6 content-frame-body-left">
                <div id="ajaxStatus"> </div>   
            </div>
            <div class="col-md-3 nopadding">
                <div class="pull-right"> 
                    <span id="searchLabel">
                    {if isset($query) || isset($status) || isset($section)}
                        <span class=" btn btn-danger" onclick="showSearchForm()" title="{general:search}"><span class="fa fa-search"></span></span> 
                        <a class=" btn btn-danger" href="comments.php">{comments:showAllComments}</a>
                    {else}
                        <span class=" btn btn-danger" onclick="showSearchForm()" title="{general:search}"><span class="fa fa-search"></span></span>
                    {/if}
                    </span>
                </div>
            </div>
        </div>
	</div>

	<div id="searchRow" style="display:none">
		<div class="col-md-12">
            <form id="searchForm">
		        <div class=" panel panel-colorful">
                    <div class="panel-heading"></div>
                    <div class="panel-body">
                        <div class="col-md-5 col-xs-12">
                            <input class="form-control" type="text" name="query" value="{if isset($query)}{$query}{/if}" autocomplete="off" />
                        </div>
                        <div class="col-md-5 col-xs-12">
                            {if isset($status) and $status ne ''}
						        {html_options options=$statuses selected=$status name="status" class="form-control select"}
						    {else}
						        {html_options options=$statuses name="status" class="form-control select"}
						    {/if}
                        </div>
                        <div class="col-md-2 col-xs-12">
                            <input style="float:right;"class=" btn btn-danger" type="submit" value="{general:search}" />
                        </div>
                    </div>
		        </div>
			</form>
		</div>
	</div>
	
	<div class="col-md-12">
		<form action="comments.php" method="post">
			<input type="hidden" name="action[bulk]" value="1">
			<input type="hidden" name="query" value="{if isset($query)}{$query}{/if}">
			<input type="hidden" name="status" value="{if isset($status)}{$status}{/if}">
            <div class="content-frame" id="comments">         
                <div class="panel panel-default" style="margin-bottom: 0px;">
                    <div class="panel-body mail">
                    {if $comments}
                        {foreach item=comment from=$comments name=comments}   
                        <div class="mail-item mail-warning"  id="comment-{$comment.commentId}">                                    
                            <div class="mail-star">
                                {if $comment.status eq "approved"}
                                    <button style="background:none;border:none;" name="bulk[{$comment.commentId}]" value="1">
                                        <span style="color:#fea223;" class="fa fa-star" title="{comments:approve}"></span>
                                    </button>
                                {elseif $comment.status eq "spam"}
                                    <button style="background:none;border:none;" name="bulk[{$comment.commentId}]" value="2">
                                        <span style="color:#FFE1B4;" class="fa fa-exclamation-circle" title="{comments:spam}"></span>
                                    </button>
                                {else $comment.status eq "pending" || $comment.status eq "unconfirmed"}
                                    <button style="background:none;border:none;" name="bulk[{$comment.commentId}]" value="0">
                                      <span class="fa fa-star-o" title="{comments:skip}"></span>
                                    </button>
                                {/if}
                            </div>
                            <div class="mail-user">
                                {if $comment.authorUrl|strlen > 10}
                                  <a title="{$comment.authorName}" href="{$comment.authorUrl}">{$comment.authorName|truncate:20}</a>
                                {else}
                                  {$comment.authorName|truncate:20}
                                {/if}&nbsp; 
                                <a href="mailto:{$comment.authorEmail}"> {$comment.authorEmail}</a>
                            </div>                                    
                            <a href="comments.php?action[edit]=true&comment[commentId]={$comment.commentId}{if isset($page)}&page={$page}{/if}" class="mail-text">{$comment.content|strip_tags|truncate:100}</a>                                    
                            <div class="mail-checkbox">
                                <a class="btn btn-green btn-rounded" href="comments.php?action[edit]=true{if isset($comment.commentId)}&comment[commentId]={$comment.commentId}{/if}{if isset($page)}&page={$page}{/if}"><span class="fa fa-pen"></span></a>
                                <button class="btn btn-danger btn-rounded" name="bulk[{$comment.commentId}]" value="3"><span class="fa fa-trash"></span></button>
  						    </div>
                            <div class="mail-date">{$comment.addedOn nofilter}</div>
                        </div>
                        {/foreach}
                    </div>
          
                    <div class="panel-footer">                                                               
                        <div class="btn-group"> {general:results}</div>
                            {if isset($pageNums.pages)}
                            <ul class="pagination pagination-sm pull-right">
                                {foreach from=$pageNums.pages item=number}
                                    {if $number eq $page}
                                        <li class="active"><a href="comments.php?page={$number}{if $query}&query={$query}{/if}{if $status}&status={$status}{/if}">{$number}</a></li>
                                    {elseif $number eq '...'}
                                    ...
                                    {else}
                                        <li><a href="comments.php?page={$number}{if $query}&query={$query}{/if}{if $status}&status={$status}{/if}">{$number}</a></li>
                                    {/if}
                                {/foreach}
                            </ul>
                            {/if}
                        </div>
          
                    {else}
                    <div class="panel panel-default" style="margin-bottom: 0px;"><div class="panel-body mail" align="center">- {general:none} -</div></div>
                    {/if}
                </div>
            </div>
        </form>
    </div>
    
{/if}

</div>


{include file="footer.tpl"}