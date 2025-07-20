{include file="header.tpl" activeItem="files" title="{fileManager:files}"}

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
    function uploadMessage(){ noty({ text: '{fileManager:messages:5}', layout: 'topRight', type: 'success' }) }  
  </script>


<div class="page-content-wrap">
    <div class="content-frame" style="margin-bottom:10px;">
        <div class="content-frame-top">                        
            <div class="col-md-3 col-xs-3 nopadding_left"><h2> Загрузка файлов на сервер</h2></div>
            <div class="col-md-6 col-xs-6 content-frame-body-left" >
                <div id="ajaxStatus" class="alert alert-warning col-md-6 info-box-img" role="alert"></div>
                <div class="upload-image alert" role="alert"></div>
		    </div>
            <div class="col-md-3 col-xs-3 nopadding_right"></div>
		</div>
	</div>
     
	<div id="fileUploadRow">
		<div class="col-md-12">
            <div class="panel panel-colorful" >
                <div class="panel-body">
                    <form action="functions.php" id="dropzone" class="dropzone" id="dropzonewidget" style="min-height: 140px;">
                        <input type="hidden" name="url" value="{$path}">
                    </form>
                    <script>
                        Dropzone.autoDiscover = false;
                            
                        $(function() {
                            var myDropzone = new Dropzone("#dropzone", '{$path}');
                             
                            myDropzone.on("complete", function(file) {
                                uploadMessage(); 
                                setTimeout(function(){ 
                                    location.reload(); 
                                }, 400); 
                            });
                        });        
					</script>	
                </div>
            </div>
		</div>
	</div>                  
  
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body panel-body-table">
                <div class="table-responsive">
                    <table class="table table-striped table-actions table-hover">
                        <thead>
                            <tr>
                                <th class="">{fileManager:file}</th>
                                <th class="">Путь к файлу</th>
                                <th class="text-center" width="80">{fileManager:size}</th>
                                <th class="text-center" width="120">Дата</th>
                                <th class="text-center" width="100">{general:delete}</th>
                            </tr>
                        </thead>
                        <tbody>   
                            {*{if $upPath ne $path}*}
                            {*<tr>*}
                                {*<td class="data" colspan="4">*}
                                    {*<a href="files.php{if isset($upPath)}?path={$upPath}{/if}" style="font-size: 14px;margin-right: 10px;color: #3c5a96;">*}
                                        {*<i class="fa fa-reply" aria-hidden="true"style="font-size: 16px;margin-right: 10px;color: #3c5a96;"></i> {fileManager:back}*}
                                    {*</a>*}
                                {*</td>*}
                            {*</tr>*}
                            {*{/if}*}
                            {if isset($list)}
                                {*{if isset($list.dirs)}*}
                                {*{foreach item=dir from=$list.dirs}*}
                                {*<tr>*}
                                    {*<td class="data">*}
                                        {*<a href="files.php?path={$path}{$dir.name}"><i class="fa fa-folder-open" style="font-size: 18px;margin-right: 10px;color: #da9101;"></i>{$dir.name}</a>*}
                                    {*</td>*}
                                    {*<td></td>*}
                                    {*<td></td>*}
                                    {*<td class="small text-center" nowrap="nowrap">{$dir.mtime|format_time:"d.m.Y H:i:s"}</td>*}
                                    {*<td class="text-center"><a class="btn btn-danger btn-rounded" onclick="deleteFile('{$path}', '{$dir.name}')" /><span class="fa fa-trash"></span></a>*}
                                    {*</td>*}
                                {*</tr>*}
                                {*{/foreach}*}
                                {*{/if}*}
                                {if isset($list.files)}
                                    {foreach item=file from=$list.files}
                                    <tr id="uploads">
                              			<td class=""><span class="ls-download"></span>&nbsp;&nbsp; {$file.name}</td>
                              			<td class="">{$SITE_URL}/uploads/files/{$file.name}</td>
                              			<td class="small" nowrap="nowrap" align="right">{$file.size|fsize_format}</td>
                              			<td class="small text-center" nowrap="nowrap">{$file.mtime|format_time:"d.m.Y H:i:s"}</td>
                              			<td class=" text-center"><a class="btn btn-danger btn-rounded" onclick="deleteAFile('{$path}', '{$file.name}')" /><span class="fa fa-trash"></span></a></td>
                  		            </tr>
                                    {/foreach}
                                {/if}
                                <tr><td colspan="5">&nbsp;</td></tr>
                            {/if}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{include file="footer.tpl"}