{include file="header.tpl" activeItem="menu" title="{templates:title}"}
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
            <div class="col-md-6 col-xs-6 nopadding_left"><h2>Редактировать меню</h2></div>
            <div class="col-md-6 col-xs-6 content-frame-body-left">
                <div id="ajaxStatus" class="alert col-md-6 info-box-img" role="alert"></div>
            </div>                         
        </div>
	</div>




    <form action="menu.php" method="post" id="menu">
        <input type="hidden" name="action" value="save" />
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">menu.json</h3></div>
                <div class="panel-body" style="padding: 0px;">
                    <textarea id="codeEditor" name="file" cols="102" rows="25" class="code" wrap="off">{if isset($file)}{$file}{/if}</textarea>
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
            mode: "application/ld+json",
            indentUnit: 4,
            indentWithTabs: true,
            enterMode: "keep",
            tabMode: "shift"
        });
        editor.setSize('100%','420px');
    </script>

</div>
{include file="footer.tpl"}