{include file="header.tpl" activeItem="file-manager" title="{fileManager:title} - {header:administration}"}
<div class="page-content-wrap">
  
    {if isset($messages.folder)}<span id="folderMessage" onclick="noty({ text: '{fileManager:messages:0}', layout: 'topRight', type: 'success' });"></span>{/if}
    {if isset($messages.uploaded)}<span id="uploadedMessage" onclick="noty({ text: '{fileManager:messages:1}', layout: 'topRight', type: 'success' });"></span>{/if}
    {if isset($messages.deletedFile)}<span id="deletedFileMessage" onclick="noty({ text: '{fileManager:messages:2}', layout: 'topRight', type: 'success' });"></span>{/if}
    {if isset($messages.deletedFolder)}<span id="deletedFolderMessage" onclick="noty({ text: '{fileManager:messages:3}', layout: 'topRight', type: 'success' });"></span>{/if}
    {if isset($messages.saved)}<span id="savedMessage" onclick="noty({ text: '{fileManager:messages:4}', layout: 'topRight', type: 'success' });"></span>{/if}
  
  
    {if isset($errors.upload)}<span id="uploadError" onclick="noty({ text: '{fileManager:errors:0}', layout: 'topRight', type: 'error' });"></span>{/if} 
    {if isset($errors.folder)}<span id="folderError" onclick="noty({ text: '{fileManager:errors:1}', layout: 'topRight', type: 'error' });"></span>{/if}
    {if isset($errors.deleteFile)}<span id="deleteFileError" onclick="noty({ text: '{fileManager:errors:2}', layout: 'topRight', type: 'error' });"></span>{/if}
    {if isset($errors.deleteFolder)}<span id="deleteFolderError" onclick="noty({ text: '{fileManager:errors:3}', layout: 'topRight', type: 'error' });"></span>{/if}
    {if isset($errors.save)}<span id="saveError" onclick="noty({ text: '{fileManager:errors:4}', layout: 'topRight', type: 'error' });"></span>{/if} 
    {if isset($errors.fileNameCharacters)}<span id="fileNameCharactersError" onclick="noty({ text: '{fileManager:errors:5}', layout: 'topRight', type: 'error' });"></span>{/if} 
    {if isset($errors.fileNameNoDot)}<span id="fileNameNoDotError" onclick="noty({ text: '{fileManager:errors:6}', layout: 'topRight', type: 'error' });"></span>{/if}
    {if isset($errors.fileNameProhibited)}<span id="fileNameProhibitedError" onclick="noty({ text: '{fileManager:errors:7}', layout: 'topRight', type: 'error' });"></span>{/if} 
    {if isset($errors.accessDenied)}<span id="accessDeniedError" onclick="noty({ text: '{fileManager:errors:8}', layout: 'topRight', type: 'error' });"></span>{/if}
    {if isset($errors.fileNotFound)}<span id="fileNotFoundError" onclick="noty({ text: '{fileManager:errors:9}', layout: 'topRight', type: 'error' });"></span>{/if}
    	
    <script>
        $(document).ready(function () {
            {if isset($errors.upload)} $('#uploadError').click();{/if}
            {if isset($errors.folder)} $('#folderError').click(); {/if}
            {if isset($errors.deleteFile)} $('#deleteFileError').click();{/if}
            {if isset($errors.deleteFolder)} $('#deleteFolderError').click();{/if}
            {if isset($errors.save)} $('#saveError').click();{/if}
            {if isset($errors.fileNameCharacters)} $('#fileNameCharactersError').click();{/if}
            {if isset($errors.fileNameNoDot)} $('#fileNameNoDotError').click();{/if}
            {if isset($errors.fileNameProhibited)} $('#fileNameProhibitedError').click();{/if}
            {if isset($errors.accessDenied)} $('#accessDeniedError').click();{/if}
            {if isset($errors.fileNotFound)} $('#fileNotFoundError').click();{/if}
            
            {if isset($messages.folder)} $('#folderMessage').click();{/if}
            {if isset($messages.uploaded)} $('#uploadedMessage').click();{/if}
            {if isset($messages.deletedFile)} $('#deletedFileMessage').click();{/if}
            {if isset($messages.deletedFolder)} $('#deletedFolderMessage').click();{/if}
            {if isset($messages.saved)} $('#savedMessage').click();{/if}
        });           
    </script>
  
  
  
{if isset($action.edit)}
	<div class="content-frame" style="margin-bottom:10px;">
        <div class="content-frame-top"> 
		    <div class="col-md-3 nopadding"><h2>{fileManager:title}</h2></div>                                                
            <div class="col-md-6 content-frame-body-left">
	            <div id="ajaxStatus"> </div> 
            </div>                          
        </div>
    </div>

    <form action="file-manager.php" method="post" id="template">
		<input type="hidden" name="path" value="{if isset($path)}{$path}{/if}" />
		<input type="hidden" name="file[name]" value="{if isset($file.name)}{$file.name}{/if}" />
		<input type="hidden" name="action[save]" value="1" />
		<div class="col-md-12">
		    <div class="panel panel-default">
		        <div class="panel-heading"><h3 class="panel-title">{$file.name}</h3></div>
                <div class="panel-body" style="padding: 0px;">
                    <textarea id="codeEditor" name="file[content]" cols="102" rows="25" class="code" wrap="off">{if isset($file.content)}{$file.content}{/if}</textarea>
                </div>
		  </div>
		</div>
		<div align="center" class="col-md-12 main main_buttons">
		    <input class="btn btn-primary" type="submit" value="&nbsp; {general:save} &nbsp;" id="submitButton" /> 
		    <a class="btn btn-primary" href="file-manager.php{if isset($path)}?path={$path}{/if}">{general:cancel}</a>
	    </div>
	</form>

	<script type="text/javascript" src="assets/js/codemirror/codemirror.js"></script>
	<script type='text/javascript' src="assets/js/codemirror/mode/htmlmixed/htmlmixed.js"></script>
	<script type='text/javascript' src="assets/js/codemirror/mode/xml/xml.js"></script>
	<script type='text/javascript' src="assets/js/codemirror/mode/javascript/javascript.js"></script>
	<script type='text/javascript' src="assets/js/codemirror/mode/css/css.js"></script>
	<script type='text/javascript' src="assets/js/codemirror/mode/clike/clike.js"></script>
	<script type='text/javascript' src="assets/js/codemirror/mode/php/php.js"></script>
	<script>
	    var editor = CodeMirror.fromTextArea(document.getElementById("codeEditor"), {
	        lineNumbers: true,
	        matchBrackets: true,
	        mode: "application/x-httpd-php",
	        indentUnit: 4,
	        indentWithTabs: true,
	        enterMode: "keep",
	        tabMode: "shift"                                                
	    });
	    editor.setSize('100%','420px');
	</script>	
	
{else}
    
	<div class="content-frame" style="margin-bottom:10px;">
        <div class="content-frame-top">                        
            <div class="col-md-3 nopadding"><h2><span class="fa fa-files-o"></span> {fileManager:title}</h2></div>
            <div class="col-md-6 content-frame-body-left">
		        <div id="ajaxStatus"> </div> 
            </div>
	            
            <div class="col-md-3 nopadding">
                <div class="pull-right"> 
                    <div style="float: left;margin-right: 10px;" onclick="showActionRow('addFolder')" id="addFolderLabel" data-toggle="tooltip" data-placement="left" data-original-title="{fileManager:addFolder}">
                        <span class="action btn btn-danger"><i class="fa fa-plus"></i></span> 
                    </div>&nbsp;&nbsp;
                    <div style="float: left;" onclick="showActionRow('fileUpload')" id="fileUploadLabel" data-toggle="tooltip" data-placement="left" data-original-title="{fileManager:uploadFile}">
                        <span class="action btn btn-danger"><i class="fa fa-upload"></i></span> 
                    </div>
                    <script type="text/javascript">
                        rows = new Array('fileUpload', 'addFolder');
                    </script>
                </div> 
            </div>                          
        </div>
    </div>
      
   
	<div id="fileUploadRow" style="display:none">
		<div class="col-md-12">
		    <form method="post" enctype="multipart/form-data">
                <div class="panel panel-colorful">
                    <div class="panel-heading"></div>
                    <div class="panel-body form_select_4">
                        <div class="col-md-3"></div>
                        <div class="col-md-6"> 
                            <input type="hidden" name="action[upload]" value="1" />
                            <span class="file-input file-input-new">
                                <div class="btn btn-danger btn-file">
                                    <span class="fa fa-file"></span> &nbsp;Загрузить файл … <input multiple="" type="file" name="upload"/>
                                </div>
                                <input style="float:right;" class="btn btn-primary" type="submit" value="{fileManager:upload}" />
                            </span>
                        </div>
                        <div class="col-md-3"></div>	
                    </div>
                </div>
            </form>
        </div>
	</div>          
          
	<div id="addFolderRow" style="display:none">
		<div class="col-md-12">
  		    <form method="post">
                <div class="panel panel-colorful">
                    <div class="panel-heading"></div>
                    <div class="panel-body form_select_4">
                        <input type="hidden" name="action[add_folder]" value="1" />
                        <div class="col-md-3 control_text_right">{fileManager:folderName}</div>
                        <div class="col-md-6 nopadding"> <input class="form-control" type="text" name="folder[name]" size="30"></div>
                        <div class="col-md-3"><input class="btn btn-primary" type="submit" value="{fileManager:add}"/></div>	
                    </div>
                </div>
			</form>
		</div>
	</div>          
          
	<div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body panel-body-table">
                <div class="table-responsive">
                    <table class="table table-striped table-actions table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">{fileManager:file}</th>
                                <th class="text-center" width="80">{fileManager:size}</th>
                                <th class="text-center" width="120">{general:modified}</th>
                                <th class="text-center" width="100">{general:action}</th>
                            </tr>
                        </thead>
                        <tbody>   
                            {if $upPath ne $path}
                            <tr>
                                <td class="data" colspan="4">
                                    <a href="file-manager.php{if isset($upPath)}?path={$upPath}{/if}" style="font-size: 14px;margin-right: 10px;color: #3c5a96;">
                                        <i class="fa fa-reply" aria-hidden="true"style="font-size: 16px;margin-right: 10px;color: #3c5a96;"></i> {fileManager:back}
                                    </a>
                                </td>
                            </tr>
                            {/if}
                  
                            {if isset($list)}
                                {if isset($list.dirs)}
                                    {foreach item=dir from=$list.dirs}
                                    <tr>
                                        <td class="data">
                                            <a href="file-manager.php?path={$path}{$dir.name}">
                                                <i class="fa fa-folder-open" aria-hidden="true" style="font-size: 18px;margin-right: 10px;color: #da9101;"></i>{$dir.name}
                                            </a>
                                        </td>
                                        <td></td>
                                        <td class="text-center" nowrap="nowrap">{$dir.mtime|format_time:"d.m.Y H:i:s"}</td>
                                        <td align="right">
                                            <div class="btn btn-danger btn-rounded" onclick="deleteFile('{$path|escape:javascript|escape}', '{$dir.name|escape:javascript|escape}')" />
                                                <span class="fa fa-trash"></span>
                                            </div>
                                        </td>
                                    </tr>
                                    {/foreach}
                                {/if}
                        
                                {if isset($list.files)}
                                    {foreach item=file from=$list.files}
                                    <tr>
                                        <td><i class="fa fa-file-code" aria-hidden="true" style="font-size: 18px;margin-right: 10px;margin-left: 10px;color: #3c5a96;"></i> {$file.name}</td>
                                        <td nowrap="nowrap" align="right">{$file.size|fsize_format}</td>
                                        <td class="text-center" nowrap="nowrap">{$file.mtime|format_time:"d.m.Y H:i:s"}</td>
                                        <td>
                                            <a class="btn btn-default btn-rounded" href="file-manager.php?action[edit]=true&path={$path|escape:url}&file[name]={$file.name|escape:url}">
                                                <span class="fa fa-pen"></span>
                                            </a>
                                            <a style="float:right;" class="btn btn-danger btn-rounded" onclick="deleteFile('{$path|escape:javascript|escape}', '{$file.name|escape:javascript|escape}')" />
                                                <span class="fa fa-trash"></span>
                                            </a>
                                        </td>
                                    </tr>
                                    {/foreach}
                                {/if}
                                <tr><td colspan="2">&nbsp;</td></tr>
                            {/if}
                        </tbody>
                    </table>
                </div>                                
            </div>
        </div>                                                
	</div>
	
{/if}
</div>

{include file="footer.tpl"}