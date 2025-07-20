{include file="header.tpl" activeItem="subscribe" title="Рассылка письма"}

<div class="page-content-wrap">
    <script>
        function sendSuccessMessage(){ noty({ text: 'Письма отправлены!', layout: 'topRight', type: 'success', timeout: 1500 }) }
        function sendErrorMessage(){ noty({ text: 'Письма не отправлены!', layout: 'topRight', type: 'error', timeout: 1500 }) }
    </script>
	<div class="content-frame" style="margin-bottom:10px;">
        <div class="content-frame-top"><div class="col-md-12 nopadding"><h2>Рассылка письма</h2></div></div>
    </div>
	
    <div class="col-md-12">
        <div class="panel panel-default tabs ">
            <ul class="nav nav-tabs nav-justified"><li class="active"><a href="#tab1" data-toggle="tab" aria-expanded="true">Написать письмо</a></li></ul>
            <div class="panel-body tab-content nopadding">
                <div class="tab-pane active" id="tab1">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h5 class="panel-title">Письма рассылаются только зарегистрированным пользователям</h5></div>
                        <div class="panel-body" id="generalPane">
                            <div class="form-group">
                                <label class="field_name">Тема</label>
                                <input class="form-control" type="text" name="subject" id="subscribe_subject"/>
                            </div>
                            <div class="form-group"><textarea id="subscribe_message" name="message" class="description"></textarea> </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-12 main main_buttons text-center">
            <button class="btn btn-primary" type="submit" id="subscribe_send" >&nbsp; Разослать &nbsp;</button>
        </div>
	</div>
</div>	
	{* Подключаем Tiny MCE *}
{include file='tinymce_init.tpl'}


{include file="footer.tpl"}