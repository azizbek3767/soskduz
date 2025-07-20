{include file="header.tpl" activeItem="sliders" title="{sliders:title}"}
<div class="page-content-wrap">
    {if isset($messages.saved)}<span id="savedMessage" onclick="noty({ text: '{sliders:messages:0}', layout: 'topRight', type: 'success', timeout: 1500 });"></span>{/if}
    {if isset($errors.access_denied)}<span id="accessDeniedError" onclick="noty({ text: '{sliders:errors:0}', layout: 'topRight', type: 'error', timeout: 1500 });"></span>{/if} 
	{if isset($errors.title)}<span id="titleError" onclick = "noty({ text: '{sliders:errors:1}', layout: 'topRight', type: 'error', timeout: 1500 });"></span>{/if}
	{if isset($errors.sectionId)}<span id="sectionIdError" onclick="noty({ text: '{sliders:errors:2}', layout: 'topRight', type: 'error', timeout: 1500 });"></span>{/if}
	{if isset($errors.not_saved)}<span id="notSavedError" onclick="noty({ text: '{sliders:errors:3}', layout: 'topRight', type: 'error', timeout: 1500 });"></span>{/if}
	{if isset($errors.no_sections)}<span id="noSectionsError" onclick="noty({ text: '{sliders:errors:4}', layout: 'topRight', type: 'error', timeout: 1500 });"></span>{/if} 
	{if isset($errors.image_not_saved)}<span id="imageNotSavedError" onclick="noty({ text: '{sliders:errors:5}', layout: 'topRight', type: 'error', timeout: 1500 });"></span>{/if} 
	{if isset($errors.article_not_found)}<span id="articleNotFoundError" onclick="noty({ text: '{sliders:errors:6}', layout: 'topRight', type: 'error', timeout: 1500 });"></span>{/if}

	<script>
    $(document).ready(function () {
        {if isset($errors.access_denied)} $('#accessDeniedError').click();{/if}
        {if isset($errors.title)} $('#titleError').click(); {/if}
        {if isset($errors.sectionId)} $('#sectionIdError').click();{/if}
        {if isset($errors.not_saved)} $('#notSavedError').click();{/if}
        {if isset($errors.no_sections)} $('#noSectionsError').click();{/if}
        {if isset($errors.image_not_saved)} $('#imageNotSavedError').click();{/if}
        {if isset($errors.article_not_found)} $('#articleNotFoundError').click();{/if}
        {if isset($messages.saved)} $('#savedMessage').click();{/if}

    });
    function deleteImageMessage(){ noty({ text: '{sliders:messages:1}', layout: 'topRight', type: 'success', timeout: 1500 }) }
    function deleteSlidesMessage(){ noty({ text: '{sliders:messages:2}', layout: 'topRight', type: 'success', timeout: 1500 }) }           
  </script>
  
{if isset($action.edit)}
	<div class="content-frame" style="margin-bottom:10px;">
        <div class="content-frame-top">
            <div class="col-md-3 nopadding_left"><h2>{sliders:title}</h2></div>
            <div class="col-md-4 content-frame-body-left">
                <div id="ajaxStatus" class="alert alert-warning col-md-6 info-box-img" role="alert"></div>
                <div class="upload-image alert" role="alert"></div>
                <span id="deletingStatus" class="alert alert-warning col-md-6 info-box-img" role="alert"></span>
		    </div>
		</div>
	</div>
  
	<form action="sliders.php" method="post" id="slider" enctype="multipart/form-data">
	    <input type="hidden" name="slider[sliderId]" value="{if isset($slider.sliderId)}{$slider.sliderId}{/if}" />
        <input type="hidden" name="action[save]" value="1" />
        <div class="col-md-12">
            <div class="panel panel-default tabs">
                
                <ul class="nav nav-tabs nav-justified">
                    <li class="active"><a href="#general" data-toggle="tab" aria-expanded="true">{sliders:tabs:general}</a></li>
                    <li class=""><a href="#summary" data-toggle="tab" aria-expanded="false">{sliders:tabs:summary}</a></li>
                    <li class=""><a href="#misc" data-toggle="tab" aria-expanded="false">{sliders:tabs:misc}</a></li>
                </ul>
                
                <div class="panel-body tab-content nopadding">
	                <div class="tab-pane active" id="general">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                
                                <div class="col-md-8">
                                    <div class="col-md-6 nopadding_left">
                                        <div class="form-group">
                                            <label class="field_name">{sliders:general:orderBy}</label>
                                            <input class="form-control" autocomplete="off" type="text" name="slider[orderBy]" value="{if isset($slider.orderBy)}{$slider.orderBy}{/if}" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 nopadding_right">
                                        <div class="form-group">
                                            <label class="field_name">{sliders:general:status}</label>
                                            {if isset($slider.status)}
                                                {html_options options=$statuses name="slider[status]" selected=$slider.status class="form-control select"}
                                            {else}
                                                {html_options options=$statuses name="slider[status]" class="form-control select"}
                                            {/if}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="field_name {if isset($errors.title)}fError{/if}">{sliders:general:title}</label>
                                        <input class="form-control" autocomplete="off" type="text" name="slider[title]" id="title" value="{if isset($slider.title)}{$slider.title}{/if}" />
                                    </div>

                                    <div class="form-group">
                                        <label class="field_name">{sliders:alias}</label>
                                        <input class="form-control" autocomplete="off" type="text" name="slider[alias]" value="{if isset($slider.alias)}{$slider.alias}{/if}" />
                                    </div>
                                    <div class="form-group">
                                        <label class="field_name">{sliders:text}</label>
                                        <input class="form-control" autocomplete="off" type="text" name="slider[text]" value="{if isset($slider.text)}{$slider.text}{/if}" />
                                    </div>
                                    <div class="form-group">
                                        <label class="field_name">{sliders:links}</label>
                                        <input class="form-control" autocomplete="off" type="text" name="slider[url]" value="{if isset($slider.url)}{$slider.url}{/if}" />
                                    </div>
                                </div>
                                
                                <div class="col-md-4"> 
                                    <div class="form-group">
                                    <div class="col-md-12 nopadding">
                                        <label class="field_name">{sliders:general:primaryImage}</label>                                                                                          
                                        {if isset($slider.images)}
                                        <div class="file-previewzo-obzor" id="imageOptions">
                                            <div class="close fileinput-remove text-right" onclick="return deleteSliderImage({$slider.sliderId});" data-toggle="tooltip" data-placement="left" data-original-title="Удалить картинку">×</div>
                                            <div class="file-preview-thumbnails">
                                                <div class="file-preview-frame" id="imageOptions">
                                                    <img src="{$slider.images.medium.url}" class="file-preview-image" alt="{$slider.images.medium.fileName}">
  						                        </div>
  		                                    </div>
                                        </div>
                                        {/if}
                                        <div class=""><input type="file" multiple="" name="image" id="file-simple"></div>
                                    </div>
                                </div>
                                
                            </div>
                            </div>
                        </div>
        	    	</div>
                   
                    <div class="tab-pane" id="summary"><textarea name="slider[summary]" class="description">{if isset($slider.summary)}{$slider.summary}{/if}</textarea> </div>
            
                    
                    <div class="tab-pane" id="misc">
                        <div class="panel panel-default">
                            <div class="panel-body">  
                                <div class="col-md-8">

                                    <div class="form-group">
                                        <div class="col-md-6 nopadding_left"><label class="field_name">{sliders:misc:publishDate}</label></div>
                                        <div class="col-md-6 nopadding_right date">

                                            {if isset($slider.publishedOn)}
                                                {html_select_date time=$slider.publishedOn|default:$adjustedNow day_value_format="%02d" field_array="slider" prefix="" class="form-control select"} -
                                            {else}
                                                {html_select_date day_value_format="%02d" field_array="slider" prefix="" class="form-control select"} -
                                            {/if}
                                            {if $config.use_24_hours}
                                                {if isset($slider.publishedOn)}
                                                    {html_select_time display_seconds=false time=$slider.publishedOn|default:$adjustedNow field_array="slider" prefix="" class="form-control select"}
                                                {else}
                                                    {html_select_time display_seconds=false field_array="slider" prefix="" class="form-control select"}
                                                {/if}
                                            {else}
                                                {if isset($slider.publishedOn)}
                                                    {html_select_time display_seconds=false display_meridian=true use_24_hours=false time=$slider.publishedOn|default:$adjustedNow field_array="slider" prefix="" class="form-control select"}
                                                {else}
                                                    {html_select_time display_seconds=false display_meridian=true use_24_hours=false field_array="slider" prefix="" class="form-control select"}
                                                {/if}
                                            {/if}
                                        </div>
                                    </div>	
    
                                    {if isset($slider.modifiedOn)}
                                    <div class="form-group">
                                        <div class="col-md-6 nopadding_left"><label class="field_name">{general:modified}</label></div>
                                        <div class="col-md-6 nopadding_right"><i>{$slider.modifiedOn} ({$slider.modifiedBy.loginName|default:"{general:unknowUser}"})</i></div>
                                    </div>
                                    {/if}
                                    {if isset($slider.addedOn)}
                                    <div class="form-group">
                                        <div class="col-md-6 nopadding_left"><label class="field_name">{general:created}</label></div>
                                        <div class="col-md-6 nopadding_right"><i>{$slider.addedOn} ({$slider.addedBy.loginName|default:"{general:unknowUser}"})</i>   </div>
                                    </div>
                                    {/if}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>                        
        </div>	
        <div class="clear"></div>
        <div align="center" class="col-md-12 main main_buttons">
            <input class="btn btn-primary" type="submit" name="action[save]" value="&nbsp; {general:save} &nbsp;" onclick="document.getElementById('slider').target='_self'; document.getElementById('slider').action='{$GLOBAL_URL}/admin{if $SITE_LANG != ''}/{$SITE_LANG}{/if}/sliders.php'" />	&nbsp;
            <a class="btn btn-primary" href="sliders.php">{general:cancel}</a>
        </div>
    </form>

{elseif !isset($errors.access_denied)}

    <div class="content-frame" style="margin-bottom:10px;">
        <div class="content-frame-top">                        
            <div class="col-md-6 col-xs-6 nopadding_left"><h2>{sliders:title}</h2></div>
            <div class="col-md-6 col-xs-6 nopadding_right">
                <a class="btn btn-danger pull-right" href="sliders.php?action[edit]=true" data-toggle="tooltip" data-placement="left" data-original-title="{sliders:addSlider}"><i class="fa fa-plus"></i></a>
            </div>  
        </div>
    </div>

    <div class="col-md-12">
	    <form action="sliders.php" method="post"> 
            <div class="panel panel-default">
                <div class="panel-body panel-body-table">
                    <div class="table-responsive">		
                        <table class="table table-striped table-actions table-hover" id="sliders">
                            <thead>
                                <tr>
                                    <th class="" style="padding: 0px 0px">
                                        <input class="btn btn-primary" type="submit" name="action[reorder]" value="{general:sort}" data-toggle="tooltip" data-placement="top" data-original-title="Порядок публикации на сайте"/>
                                    </th>
                                    <th class="text-center" width="50">{sliders:image}</th>
                                    <th class="">{general:slider}</th>
                                    <th class="text-center" width="100">{general:status}</th>
                                    <th class="text-center" width="50">{general:action}</th>
                                </tr>
                            </thead>
                            <tbody>   
                                {if isset($sliders)}
                                {foreach item=slider from=$sliders name=sliders}
                                <tr id="slider-{$slider.sliderId}">
                                    <td class="text-center"><input type="text" name="slider[orderBys][{$slider.sliderId}]" value="{$slider.orderBy}" class="form-control text-center"/></td>
                                    <td class="text-center">
                                        {if $slider.hasImage eq '1'}
                                            <img src="{$slider.images.medium.url}" class="article_img"/>
                                        {else}
                                            <img src="img/no_images.jpg" class="article_img" style="width:45px;"/>
                                        {/if}
                                    </td>
                                    <td width="100%">{$slider.title|strip_tags|truncate:100}</td>
                                    <td style="" id="status-{$slider.sliderId}" align="center">{$slider.statusName}</td>
                                    <td class="btn-link-action text-center">
                                        <a href="sliders.php?action[edit]=true&slider[sliderId]={$slider.sliderId}" class="btn btn-default btn-rounded"><span class="fa fa-pen"></span></a>
                                        <a class="btn btn-danger btn-rounded" onclick="deleteSlide({$slider.sliderId}, '{$slider.title nofilter}');"><span class="fa fa-trash"></span></a>
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
        maxFileSize: 2000
    });         
</script>

{include file="footer.tpl"}