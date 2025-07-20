{include file="header.tpl" activeItem="customers" title="{customers:title}"}
<div class="page-content-wrap">	
    
    {if isset($messages.saved)}<span id="savedMessage" onclick="noty({ text: '{customers:messages:0}', layout: 'topRight', type: 'success' });"></span>{/if}
  
    {if isset($errors.email1)}<span id="email1Error" onclick="noty({ text: '{customers:errors:0}', layout: 'topRight', type: 'error' });"></span>{/if} 
	{if isset($errors.email2)}<span id="email2FoundError" onclick="noty({ text: '{customers:errors:1}', layout: 'topRight', type: 'error' });"></span>{/if}
    {if isset($errors.email_correct)}<span id="emailCorrectError" onclick="noty({ text: '{customers:errors:16}', layout: 'topRight', type: 'error' });"></span>{/if}

	{if isset($errors.password)}<span id="passwordError" onclick="noty({ text: '{customers:errors:2}', layout: 'topRight', type: 'error' });"></span>{/if}
	{if isset($errors.phone)}<span id="phoneError" onclick="noty({ text: '{customers:errors:3}', layout: 'topRight', type: 'error' });"></span>{/if}
	{if isset($errors.name)}<span id="firstNameError" onclick="noty({ text: '{customers:errors:4}', layout: 'topRight', type: 'error' });"></span>{/if} 
	{if isset($errors.address)}<span id="addressError" onclick="noty({ text: '{customers:errors:6}', layout: 'topRight', type: 'error'});"></span>{/if}
	{if isset($errors.city)}<span id="cityError" onclick="noty({ text: '{customers:errors:7}', layout: 'topRight', type: 'error' });"></span>{/if} 
	{if isset($errors.postcode)}<span id="postcodeError" onclick="noty({ text: '{customers:errors:8}', layout: 'topRight', type: 'error' });"></span>{/if}
	{if isset($errors.country)}<span id="countryError" onclick="noty({ text: '{customers:errors:9}', layout: 'topRight', type: 'error' });"></span>{/if}
	{if isset($errors.site_user_not_found)}<span id="siteUserNotFoundError" onclick="noty({ text: '{customers:errors:10}', layout: 'topRight', type: 'error' });"></span>{/if}
	{if isset($errors.not_saved)}<span id="notSavedError" onclick="noty({ text: '{customers:errors:11}', layout: 'topRight', type: 'error' });"></span>{/if}
    {if isset($errors.login)}<span id="loginError" onclick="noty({ text: '{customers:errors:12}', layout: 'topRight', type: 'error' });"></span>{/if} 
	{if isset($errors.login_correct)}<span id="loginCorrectError" onclick="noty({ text: '{customers:errors:13}', layout: 'topRight', type: 'error' });"></span>{/if}
    {if isset($errors.phone_correct)}<span id="phoneCorrectError" onclick="noty({ text: '{customers:errors:14}', layout: 'topRight', type: 'error' });"></span>{/if}
    {if isset($errors.image_not_saved)}<span id="imageNotSavedError" onclick="noty({ text: '{customers:errors:15}', layout: 'topRight', type: 'error' });"></span>{/if}
 

  <script>
    $(document).ready(function () {
        
        {if isset($errors.login)} $('#loginError').click();{/if}
        {if isset($errors.login_correct)} $('#loginCorrectError').click();{/if}
        {if isset($errors.name)} $('#firstNameError').click();{/if}
        {if isset($errors.phone)} $('#phoneError').click();{/if}
        {if isset($errors.phone_correct)} $('#phoneCorrectError').click();{/if}
        {if isset($errors.email1)} $('#email1Error').click();{/if}
        {if isset($errors.email2)} $('#email2FoundError').click(); {/if}
        {if isset($errors.email_correct)} $('#emailCorrectError').click(); {/if}
        {if isset($errors.password)} $('#passwordError').click();{/if}
        {if isset($errors.address)} $('#addressError').click();{/if}
        {if isset($errors.city)} $('#cityError').click();{/if}
        {if isset($errors.postcode)} $('#postcodeError').click();{/if}
        {if isset($errors.country)} $('#countryError').click();{/if}
        {if isset($errors.site_user_not_found)} $('#siteUserNotFoundError').click();{/if}
        {if isset($errors.not_saved)} $('#notSavedError').click();{/if}
        {if isset($errors.image_not_saved)} $('#imageNotSavedError').click();{/if}
        
        {if isset($messages.saved)} $('#savedMessage').click();{/if}
    
    });
    
    function deleteUserImageMessage(){ noty({ text: '{customers:messages:2}', layout: 'topRight', type: 'success' }) }
    function deleteSiteUserMessage(){ noty({  text: '{customers:messages:1}', layout: 'topRight', type: 'success' }) }
             
  </script>
  

{if isset($action.edit)}

	<div class="content-frame" style="margin-bottom:10px;">
        <div class="content-frame-top"> 
            <div class="col-md-3 nopadding"><h2>{customers:title}</h2></div> 
            <div class="col-md-6 content-frame-body-left">
                <div id="ajaxStatus"> </div> 
            </div>
        </div>
	</div>
	
	<div class="col-md-12">
	    <div class="page-content-wrap">
            <form action="customers.php" method="post" id="customer" enctype="multipart/form-data" class="form-horizontal">
                <input type="hidden" name="customer[userId]" value="{if isset($customer.userId)}{$customer.userId}{/if}" />
                <input type="hidden" name="action[save]" value="1" />            
                <div class="row">                        
                    <div class="col-md-4 col-sm-4 col-xs-5">
                        <div class="panel panel-default">                                
                            <div class="panel-body"><h3>{if isset($customer.name)}{$customer.name}{/if}</h3></div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-md-12 col-xs-12 nopadding">
                                        <label class="field_name">{customers:general:avatar}</label>
                                        {if isset($customer.hasImage) and $customer.hasImage eq '1'}
                                        <div class="file-previewzo-obzor" id="imageOptions">
                                            <div class="close fileinput-remove text-right" onclick="return deleteCustomerImage({$customer.userId})" data-toggle="tooltip" data-placement="left" data-original-title="Удалить картинку">×</div>
                                            <div class="file-preview-thumbnails">
                                                <div class="file-preview-frame" id="imageOptions">
                                                    <img src="{$customer.images.medium.url}" class="file-preview-image" alt="ФОТО">
                                                </div>
                                                <div id="ajaxStatus"></div>
                                                <span id="deletingStatus"></span>
                                                <span id="errorBlock"></span>
                                            </div>
                                        </div>
                                        {/if}
                                        <div class=""><input type="file" name="image" id="file-simple" data-preview-file-type="any"></div>
                                    </div>
    						    </div>
    						    {if isset($customer.registredOn)}
                                <div class="form-group">
                                    <div class="col-md-6 nopadding_left"><label class="field_name">{customers:general:registrationDate}</label></div>
                                    <div class="col-md-6 nopadding_right">{$customer.registredOn|date_format:"%d.%m.%Y"}</div>
                                </div>
                                {/if}
                                {if isset($customer.birth)}
                                {if $customer.birth > '0000-00-00'}
                                <div class="form-group">
                                    <div class="col-md-6 nopadding_left"><label class="field_name">{customers:general:birth}</label></div>
                                    <div class="col-md-6 nopadding_right">{$customer.birth}</div>
                                </div>
                                {/if}
                                {/if}
                               
                                {if $adminUser.accessLevel eq "developer"}
                                {if isset($customer.userId)}
                                <div class="form-group">
                                    <div class="col-md-3 nopadding_left"><label class="field_name">{customers:general:uderID}</label></div>
                                    <div class="col-md-9 nopadding_right">{$customer.userId}</div>
                                </div>
                                {/if}
                                {if isset($customer.ip)}
                                <div class="form-group">
                                    <div class="col-md-3 nopadding_left"><label class="field_name">{customers:general:uderIP}</label></div>
                                    <div class="col-md-9 nopadding_right">{$customer.ip}</div>
                                </div>
                                {/if}
                                {/if}
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-8 col-sm-8 col-xs-7">
                    
                        <div class="panel panel-default">
                            <div class="panel-body"><h3>{customers:editProfile}</h3></div>
                            
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-md-3 nopadding_left"><label class="field_name">{customers:general:gender}</label></div>
                                    <div class="col-md-9 nopadding_right">
                                        <select name="customer[gender]" class="form-control select">
                                            <option value="0" {if isset($customer.gender) and $customer.gender eq 0}selected{/if}></option>
                                            <option value="1" {if isset($customer.gender) and $customer.gender eq 1}selected{/if}>{customers:general:male}</option>
                                            <option value="2" {if isset($customer.gender) and $customer.gender eq 2}selected{/if}>{customers:general:female}</option>
                                        </select>
    								</div>
    						    </div>
						    
                                <div class="form-group">
                                    <div class="col-md-3 nopadding_left"><label class="field_name {if isset($errors.login) or isset($errors.login_correct)}fError{/if}">{customers:general:login}</label></div>
                                    <div class="col-md-9 nopadding_right"><input class="form-control" autocomplete="off" type="text" name="customer[login]" value="{if isset($customer.login)}{$customer.login}{/if}" /></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3 nopadding_left"><label class="field_name {if isset($errors.name)}fError{/if}">{customers:general:fio}</label></div>
                                    <div class="col-md-9 nopadding_right"><input class="form-control" autocomplete="off" type="text" name="customer[name]" value="{if isset($customer.name)}{$customer.name}{/if}" /></div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-md-3 nopadding_left"><label class="field_name {if isset($errors.phone)}fError{/if}">{customers:general:phone}</label></div>
                                    <div class="col-md-9 nopadding_right"><input class="form-control phone" autocomplete="off" type="text" name="customer[phone]" value="{if isset($customer.phone)}{$customer.phone}{/if}" /></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3 nopadding_left"><label class="field_name {if isset($errors.email1) or isset($errors.email2)}fError{/if}">{customers:general:email}</label></div>
                                    <div class="col-md-9 nopadding_right"><input class="form-control" autocomplete="off" type="text" name="customer[email]" value="{if isset($customer.email)}{$customer.email}{/if}" /></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3 nopadding_left"><label class="field_name {if isset($errors.password)}fError{/if}">{customers:general:password}</label></div>
                                    <div class="col-md-9 nopadding_right"><input class="form-control" autocomplete="off" type="text" name="customer[password]" value="{if isset($customer.password)}{$customer.password}{/if}" /></div>
                                </div>  
                                <div class="form-group">
                                    <div class="col-md-3 nopadding_left"><label class="field_name">{customers:general:status}</label></div>
                                    <div class="col-md-9 nopadding_right">
                                        {if isset($customer.status)}
                                            {html_options options=$statuses name="customer[status]" selected=$customer.status class="form-control select"}
                                        {else}
                                            {html_options options=$statuses name="customer[status]" class="form-control select"}
                                        {/if}
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <div class="col-md-3 nopadding_left"><label class="field_name">{customers:general:newsletter}</label></div>
                                    <div class="col-md-9 nopadding_right">
                                        {if isset($customer.subscribe)}
                                            {html_options options=$subscribes name="customer[subscribe]" selected=$customer.subscribe class="form-control select"}
                                        {else}
                                            {html_options options=$subscribes name="customer[subscribe]" class="form-control select"}
                                        {/if}
                                    </div>
                                </div> 
                                <div class="form-group text-center">
                                    <div class="col-md-12 nopadding">
                                        <input class="btn btn-primary" type="submit" name="action[save]" value="&nbsp; {general:save} &nbsp;" onclick="document.getElementById('customer').target='_self'; document.getElementById('customer').action='{$GLOBAL_URL}/admin{if $SITE_LANG != ''}/{$SITE_LANG}{/if}/customers.php{if isset($page)}?page={$page}{/if}'" />
                                        <a class="btn btn-primary" href="customers.php{if isset($page)}?page={$page}{/if}">{general:cancel}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
                <div align="center" class="col-md-12 main main_buttons"></div>
		    </form>
        </div>
	</div>

{elseif !isset($errors.access_denied)}

    <div class="content-frame" style="margin-bottom:10px;">
        <div class="content-frame-top">                        
            <div class="col-md-6 nopadding"><h2>{customers:title}</h2></div>
            <div class="col-md-6 nopadding">                                                  
                <div class="pull-right">
                    <a class="btn btn-danger" href="customers.php?action[edit]=true" data-toggle="tooltip" data-placement="left" data-original-title="{customers:addSiteUser}"><i class="fa fa-plus"></i></a>
                    <span>
                        {if isset($query) || isset($status)}
                            <a class="btn btn-primary" href="customers.php" ><span class="fa fa-mail-reply"></span></a>
                        {else}
                            <span class="action btn btn-danger" onclick="showSearchForm();"><span class="fa fa-search"></span></span>
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
                    <div class="panel-body">
                        <div class="col-md-5 col-xs-12 nopadding_left"><input class="form-control" type="text" name="query" value="{if isset($query)}{$query}{/if}" autocomplete="off" /></div>
                        <div class="col-md-5 col-xs-12">
                            {if isset($status)}
                                {html_options options=$statuses selected=$status name="status" class="form-control select"}
                            {else}
                                {html_options options=$statuses name="status" class="form-control select"}
                            {/if}
                        </div>
                        <div class="col-md-2 col-xs-12 nopadding_right text-right"><input class="btn btn-primary" type="submit" value="{general:search}" /></div>
			        </div>
		        </div>
	        </form>
        </div>
    </div>
  
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-body panel-body-table">
        <div class="table-responsive">
          <table class="table table-striped table-actions table-hover" id="customers">
            <thead>
              <tr>
                <th class="text-center" width="50">{customers:table:id}</th>
                <th class="text-center" width="50">{customers:table:date}</th>
                <th class="">{customers:table:login}</th>
                <th class="text-center" width="100">{general:status}</th>
                <th class="text-center" width="50">{general:action}</th>
              </tr>
            </thead>
              
            {if isset($customers)}
            <tbody> 
              {foreach item=customer from=$customers name=customers}
				<tr id="customer-{$customer.userId}">
					<td class="text-center" nowrap="nowrap">{$customer.userId}</td>
					<td class="text-center" nowrap="nowrap">{$customer.registredOn nofilter}</td>
					<td class="">{$customer.login}</td>
					<td id="status-{$customer.userId}" class="text-center">{$customer.statusName nofilter}{if $adminUser.accessLevel != 'writer' && ($customer.status eq 'waiting' or  $customer.status eq 'blocked')}<p class="act-deistvie action" onclick="return approveCustomer({$customer.userId});">({customers:approve})</p>{/if}
					</td>
					<td  class="btn-link-action">
						<a class="btn btn-rounded" href="customers.php?action[edit]=true&customer[userId]={$customer.userId}&page={$page}"><span class="fa fa-pen"></span></a>
						<a class="btn btn-danger btn-rounded" onclick="deleteCustomer({$customer.userId}, '{$customer.name nofilter}')"><span class="fa fa-trash"></span></a>
					</td>
				</tr>
				{/foreach}
				<tbody>
  				<tfoot>
					<tr>
						<td align="right" colspan="5">
    						<div class="small pull-left">{general:results}</div>
							{if isset($pageNums.pages)}
							<ul class="pagination pagination-sm pull-right push-down-10 push-up-10">
							{foreach from=$pageNums.pages item=number}
								{if $number eq $page}
									<li class="active"><a href="customers.php?page={if isset($number)}{$number}{/if}{if isset($query)}&query={$query}{/if}{if isset($status)}&status={$status}{/if}" class="pageNum">{if isset($number)}{$number}{/if}</a></li>
								{elseif $number eq '...'}
									...
								{else}
									<li><a href="customers.php?page={if isset($number)}{$number}{/if}{if isset($query)}&query={$query}{/if}{if isset($status)}&status={$status}{/if}" class="pageNum">{if isset($number)}{$number}{/if}</a></li>
								{/if}
							{/foreach}
							</ul>
							{/if}
						</td>
					</tr>
  				</tfoot>
				{else}
				<tbody><tr><td class="none" colspan="7" align="center">- {general:none} -</td></tr> </tbody>
				{/if} 
            </table>
  		  </div>
  		</div>
    </div> 
	<script>{if isset($query) || isset($status)}showSearchForm(true);{/if}</script>                                                 
{/if}
</div>

<script>

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
    maxFileSize: 1000
});

</script>
{include file="footer.tpl"}