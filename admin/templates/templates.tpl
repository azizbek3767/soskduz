{include file="header.tpl" activeItem="templates" title="{templates:title}"}
<style>
    .CodeMirror {
        font-size: 12px;height: 100%;
    }
</style>
<script type="text/javascript" src="assets/js/jQueryFileTree.min.js"></script>
<script type="text/javascript" src="assets/js/codemirror/codemirror.js"></script>
<script type='text/javascript' src="assets/js/codemirror/mode/htmlmixed/htmlmixed.js"></script>
<script type='text/javascript' src="assets/js/codemirror/mode/xml/xml.js"></script>
<script type='text/javascript' src="assets/js/codemirror/mode/javascript/javascript.js"></script>
<script type='text/javascript' src="assets/js/codemirror/mode/css/css.js"></script>

<div class="page-content-wrap">
  
    {if isset($messages.saved)}<span id="savedMessage" onclick="noty({ text: '{templates:messages:0}', layout: 'topRight', type: 'success' });"></span>{/if}
    {if isset($messages.template_changed)}<span id="templateChangedMessage" onclick="noty({ text: '{templates:messages:3}', layout: 'topRight', type: 'success' });"></span>{/if}
    {if isset($messages.saved_new_file)}<span id="savedNewFiledMessage" onclick="noty({ text: '{templates:messages:4}', layout: 'topRight', type: 'success' });"></span>{/if}  
    
    {if isset($errors.not_found)}<span id="notFoundError" onclick="noty({ text: '{templates:errors:0}', layout: 'topRight', type: 'error' });"></span>{/if} 
    {if isset($errors.not_saved)}<span id="notSavedError" onclick="noty({ text: '{templates:errors:1}', layout: 'topRight', type: 'error' });"></span>{/if}
    {if isset($errors.fileName)}<span id="fileNameError" onclick="noty({ text: '{templates:errors:2}', layout: 'topRight', type: 'error' });"></span>{/if}
    {if isset($errors.fileNameExists)}<span id="fileNameExistsError" onclick="noty({ text: '{templates:errors:3}', layout: 'topRight', type: 'error' });"></span>{/if}
    {if isset($errors.fileNameCharacters)}<span id="fileNameCharactersError" onclick="noty({ text: '{templates:errors:4}', layout: 'topRight', type: 'error' });"></span>{/if}

    <script>
    $(document).ready(function () { 
        {if isset($errors.not_found)} $('#notFoundError').click();{/if}
        {if isset($errors.not_saved)} $('#notSavedError').click();{/if}
        {if isset($errors.fileName)} $('#fileNameError').click();{/if}
        {if isset($errors.fileNameExists)} $('#fileNameExistsError').click();{/if}
        {if isset($errors.fileNameCharacters)} $('#fileNameCharactersError').click();{/if}              
                                
        {if isset($messages.saved)} $('#savedMessage').click();{/if}
        {if isset($messages.template_changed)} $('#templateChangedMessage').click();{/if}
        {if isset($messages.saved_new_file)} $('#savedNewFiledMessage').click();{/if}
    });
    function notTemplateMessage(){
        noty({
            text: '{templates:messages:0}',
            layout: 'topRight',
            type: 'error'
        })
    }
    function saveTemplateMessage(){
        noty({
            text: '{templates:messages:0}',
            layout: 'topRight',
            type: 'success'
        })
    }           
    </script>

	<div class="content-frame" style="margin-bottom:10px;">
        <div class="content-frame-top">                        
            <div class="col-md-6 col-xs-6 nopadding_left"><h2>{templates:title}</h2></div>
            <div class="col-md-6 col-xs-6 content-frame-body-left">
                <div id="ajaxStatus" class="alert col-md-6 info-box-img" role="alert"></div>
            </div>                         
        </div>
	</div>
	
	<div class="col-md-12">       
        <div class="panel panel-default">
    	    <div class="panel-heading"><h3 class="panel-title">{templates:editTemplate}: <b>{$config.theme|capitalize}</b></h3></div>
            <div class="panel-body panel-body-table">  	
                <div class="col-md-2 nopadding"><div id="filetree" class="filetree"></div></div>
                <div class="col-md-10 nopadding">
                    <div id="fileedit" style="border: solid 1px #BBB;min-height: 565px; padding:5px;"></div>
                </div>
                <div class="col-md-12" style="margin-top: 20px;margin-bottom: 20px">
                    <a class="btn btn-primary" data-toggle="modal" data-target="#new_file"><i class="fa fa-plus-circle position-left"></i> {templates:newTemplateFile}</a>
                </div> 
	        </div>
        </div>                                 
	</div>
	
	<script>
    $(function($){
        $('#filetree').fileTree({ 
            root: '/', 
            script: 'jqueryFileTree.php', 
            folderEvent: 'click', 
            expandSpeed: 750, 
            collapseSpeed: 750, 
            multiFolder: false 
        }, 
        function(file) { 
            $.post('jqueryFileTree.php', { load: "load", file: file }, function(data) { 
                $('#fileedit').html(data); 
            }, 'html');
        });
    });
  
    function savefile(file) {
        var content = editor.getValue();
        $.post('jqueryFileTree.php', { action: "save", file: file, content: content }, function(data) {
            /*console.log(data); */
            if(data == 1){
    		    saveTemplateMessage();
  		    } else {
                notTemplateMessage();
            }
        });
    };
    </script>
  
    <div class="modal animated fadeIn" id="new_file" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><h4 class="modal-title" id="smallModalHead">{templates:newTemplate}</h4></div>
                <form action="templates.php" method="post" id="template">
                    <input type="hidden" name="template[isNew]" value="1" />
                    <input type="hidden" name="action[save]" value="0" />
                    <input type="hidden" name="action[checkTemplate]" value="1" />
                    <div class="col-md-12" style="margin-top: 20px;margin-bottom: 20px">
                        <div class="form-group">
                            <input class="form-control" autocomplete="off" id="fileName" type="text" name="template[fileName]" value="{if isset($template.fileName)}{$template.fileName}{/if}" placeholder="{templates:templateNewFile}"/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input class="btn btn-primary" type="button" value="&nbsp; {general:save} &nbsp;" onclick="testTemplate()" id="submitButton" />	&nbsp;
                        <button type="button" class="btn btn-primary" data-dismiss="modal">{general:cancel}</button>
                    </div>
                </form>     
            </div>
        </div>
    </div>

</div>
{include file="footer.tpl"}