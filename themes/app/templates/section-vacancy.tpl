{include file="header.tpl" title=$section.meta_title keywords=$section.keywords description=$section.description}
<!-- Хлебные крошки -->
{include file="modules/you-are-here.tpl" class="breadcrumb-container"}

<div class="vacancy-wrapper">
	<div class="container">
		<div class="vacancy-top">
			<div class="image-content"><img src="{$section.images.original.url}" alt="{$section.name}"></div>
			<div class="desc-content">{$section.summary nofilter}</div>
		</div>
		<div class="main-desc">
    		<div class="row">
        		{fetch_sections assign=catalogSections from=$section.sectionId status="visible"}
                {foreach item=subvacancy from=$catalogSections name=catalogSections}
                <div class="col-md-6 h1"><h2>{$subvacancy.name}</h2>{$subvacancy.summary nofilter}</div>
                {/foreach}
            </div>
        </div>
	</div>
	{foreach item=vacancy1 from=$TREE name=vacancys1}{if $vacancy1.sectionId eq 25}{if $vacancy1.status eq 'visible'}
	<div class="get-wrapper">
		<div class="container">
			<div class="get-name h1"><h2>{$vacancy1.name}</h2></div>
			<div class="get-content">
				<div class="row">
					{foreach item=vacancy2 from=$vacancy1.subsections}{if $vacancy2.status eq 'visible'}
					<div class="get-item col-md-4"><h2>{$vacancy2.name}</h2>{$vacancy2.summary nofilter}</div>
					{/if}{/foreach}
				</div>
			</div>
			<div class="info-desc">{$vacancy1.summary nofilter}</div>
		</div>
	</div>
	{/if}{/if}{/foreach}
	
	
	
	<div class="vacancy-tab">
		<div class="container">
			<div class="vacancy-tab-name h1"><h2>{$section.name}</h2></div>
			{fetch_articles limit=30 assign=sectionVacancyes section=$section.sectionId}
			<div class="nav_tabs">
				<div class="row">
					<div class="col-md-4">
					  <!-- Nav tabs -->
					    <ul class="nav" role="tablist">
    					    {foreach item=vacancya from=$sectionVacancyes name=sectionVacancyes}
                            <li role="presentation" class="{if $smarty.foreach.sectionVacancyes.first}active{/if}">
                                <a href="#vac-{$vacancya.articleId}" role="tab" data-toggle="tab">{$vacancya.title}</a>
                            </li>
                            {/foreach}
					    </ul>
					</div>
					<div class="tab-items col-md-8">
					  <!-- Tab panes -->
					    <div class="tab-content">
    					    {foreach item=vacancya from=$sectionVacancyes name=sectionVacancyes}
                            <div role="tabpanel" class="tab-pane fade {if $smarty.foreach.sectionVacancyes.first}in active{/if}" id="vac-{$vacancya.articleId}">
    					    	<div class="tab-desc">{$vacancya.summary nofilter}</div>
    					    	<div class="tab-doc-wrapper">
    					    		{if isset($vacancya.files)}
    					    		<div class="img-content">
        					    		{if $vacancya.files.ext eq docx || $vacancya.files.ext eq doc}
            							<div class="img"><img src="{$THEME_URL}/img/doc.png"></div>
            							{elseif $vacancya.files.ext eq xlsx || $vacancya.files.ext eq xls}
            							<div class="img"><img src="{$THEME_URL}/img/excel.png"></div>
            							{/if}
    					    		</div>
    					    		<div class="desc-content">
    					    			<p>{$vacancya.files.fileName}</p>
    					    			<a href="{$vacancya.files.url}" download=""><i class="fa fa-download"></i><p> {$LANG.download} | {$vacancya.files.size|fsize_format} {$vacancya.files.ext}</p></a>
    					    		</div>
    					    		{/if}
    					    	</div>
    					    	
    					    </div>
                            {/foreach}
                            <div class="tab-form h1">
                                <div class="success-send"><h2>{$LANG.resume_sent_successfully}</h2></div>
					    		<form id="request_vacancy" action="{$GLOBAL_URL}/public/feedback.php" method="post">
    					    		{$csrf_input nofilter}
									{if $config.allow_recaptcha eq 1}
										<input type="hidden" id="recaptcha_token" name="recaptcha_token" />
									{/if}
									<h2>{$LANG.send_resume}</h2>
					    			<div class="row">
						    			<div class="input-content col-md-6">
						    				<input type="text" class="input-control" name="subject" placeholder="{$LANG.job_title}" data-error="#vacancy_subject">
						    			</div>
						    			<div class="input-content col-md-6">
						    				<input type="text" class="input-control" name="name" placeholder="{$LANG.your_name}" data-error="#vacancy_name">
						    			</div>
						    			<div class="input-content col-md-6">
						    				<input type="email" class="input-control" name="email" placeholder="{$LANG.your_email}" data-error="#vacancy_email">
						    			</div>
						    			<div class="input-content col-md-6">
						    				<input type="tel" class="input-control" name="phone" placeholder="{$LANG.your_phone}" data-error="#vacancy_phone">
						    			</div>
					    			</div>
					    			<div class="about-you"> 
					    				<p>{$LANG.about_yourself}</p>
					    				<textarea name="message" data-error="#vacancy_message"></textarea>
					    			</div>
					    			<div class="buttons">
					    				<label for="file"><i class="fa fa-paperclip"></i>{$LANG.attach_resume}</label>
					    				<input type="file" id="file" name="file" class="hide" onchange="javascript:this.previousElementSibling.innerText = this.files[0].name">
					    				<span class="btn-def-2"><button type="submit" name="action" value="vacancy">{$LANG.send}</button></span>
					    			</div>
					    			{if $config.allow_recaptcha eq 0}
                						<div id="send-anti-bot">
                							<strong>Текущий <span style="display:inline;">ye@r</span> <span style="display:none;">month</span> <span style="display:none;">day</span></strong>
                							<span class="required">*</span>
                							<input type="hidden" name="anti-bot-a" id="feedback-anti-bot-a" value="{$smarty.now|date_format:'%Y'}" />
                							<input type="text" name="anti-bot-q" id="feedback-anti-bot-q" value="19" />
                						</div>
                						<div class="send-anti-bot-2"><input type="email" name="anti-email" value=""/></div>
                					{/if}
									{if $config.allow_recaptcha eq 1}
										<script src="https://www.google.com/recaptcha/api.js?render={$config.recaptcha_public_key}"></script>
										<script type="text/javascript">
											grecaptcha.ready(function() {
												grecaptcha.execute(
														'{$config.recaptcha_public_key}',
															{literal}{action: 'homepage'}{/literal}
												).then(function(token) {
													console.log('token: ', token);
													document.getElementById('recaptcha_token').value=token;
												});
											});
										</script>
									{/if}
					    		</form>
					    	</div>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
{include file="footer.tpl"}