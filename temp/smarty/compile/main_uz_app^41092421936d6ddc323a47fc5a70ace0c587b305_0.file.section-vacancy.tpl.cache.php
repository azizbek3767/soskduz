<?php
/* Smarty version 3.1.33, created on 2025-07-16 12:56:15
  from '/home/soskduz/public_html/themes/app/templates/section-vacancy.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_68775b1f0874e6_70305476',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '41092421936d6ddc323a47fc5a70ace0c587b305' => 
    array (
      0 => '/home/soskduz/public_html/themes/app/templates/section-vacancy.tpl',
      1 => 1686549984,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:modules/you-are-here.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_68775b1f0874e6_70305476 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/soskduz/public_html/includes/smarty_plugins/function.fetch_sections.php','function'=>'smarty_function_fetch_sections',),1=>array('file'=>'/home/soskduz/public_html/includes/smarty_plugins/function.fetch_articles.php','function'=>'smarty_function_fetch_articles',),2=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/modifier.fsize_format.php','function'=>'smarty_modifier_fsize_format',),3=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->compiled->nocache_hash = '15676519768775b1ef07df9_64603294';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('title'=>$_smarty_tpl->tpl_vars['section']->value['meta_title'],'keywords'=>$_smarty_tpl->tpl_vars['section']->value['keywords'],'description'=>$_smarty_tpl->tpl_vars['section']->value['description']), 0, false);
?>
<!-- Хлебные крошки -->
<?php $_smarty_tpl->_subTemplateRender("file:modules/you-are-here.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('class'=>"breadcrumb-container"), 0, false);
?>

<div class="vacancy-wrapper">
	<div class="container">
		<div class="vacancy-top">
			<div class="image-content"><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value['images']['original']['url'], ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
"></div>
			<div class="desc-content"><?php echo $_smarty_tpl->tpl_vars['section']->value['summary'];?>
</div>
		</div>
		<div class="main-desc">
    		<div class="row">
        		<?php echo smarty_function_fetch_sections(array('assign'=>'catalogSections','from'=>$_smarty_tpl->tpl_vars['section']->value['sectionId'],'status'=>"visible"),$_smarty_tpl);?>

                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['catalogSections']->value, 'subvacancy', false, NULL, 'catalogSections', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['subvacancy']->value) {
?>
                <div class="col-md-6 h1"><h2><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subvacancy']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</h2><?php echo $_smarty_tpl->tpl_vars['subvacancy']->value['summary'];?>
</div>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
        </div>
	</div>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['TREE']->value, 'vacancy1', false, NULL, 'vacancys1', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['vacancy1']->value) {
if ($_smarty_tpl->tpl_vars['vacancy1']->value['sectionId'] == 25) {
if ($_smarty_tpl->tpl_vars['vacancy1']->value['status'] == 'visible') {?>
	<div class="get-wrapper">
		<div class="container">
			<div class="get-name h1"><h2><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['vacancy1']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</h2></div>
			<div class="get-content">
				<div class="row">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['vacancy1']->value['subsections'], 'vacancy2');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['vacancy2']->value) {
if ($_smarty_tpl->tpl_vars['vacancy2']->value['status'] == 'visible') {?>
					<div class="get-item col-md-4"><h2><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['vacancy2']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</h2><?php echo $_smarty_tpl->tpl_vars['vacancy2']->value['summary'];?>
</div>
					<?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				</div>
			</div>
			<div class="info-desc"><?php echo $_smarty_tpl->tpl_vars['vacancy1']->value['summary'];?>
</div>
		</div>
	</div>
	<?php }
}
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	
	
	
	<div class="vacancy-tab">
		<div class="container">
			<div class="vacancy-tab-name h1"><h2><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</h2></div>
			<?php echo smarty_function_fetch_articles(array('limit'=>30,'assign'=>'sectionVacancyes','section'=>$_smarty_tpl->tpl_vars['section']->value['sectionId']),$_smarty_tpl);?>

			<div class="nav_tabs">
				<div class="row">
					<div class="col-md-4">
					  <!-- Nav tabs -->
					    <ul class="nav" role="tablist">
    					    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sectionVacancyes']->value, 'vacancya', false, NULL, 'sectionVacancyes', array (
  'first' => true,
  'index' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['vacancya']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_sectionVacancyes']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_sectionVacancyes']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_sectionVacancyes']->value['index'];
?>
                            <li role="presentation" class="<?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_sectionVacancyes']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_sectionVacancyes']->value['first'] : null)) {?>active<?php }?>">
                                <a href="#vac-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['vacancya']->value['articleId'], ENT_QUOTES, 'UTF-8', true);?>
" role="tab" data-toggle="tab"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['vacancya']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
</a>
                            </li>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					    </ul>
					</div>
					<div class="tab-items col-md-8">
					  <!-- Tab panes -->
					    <div class="tab-content">
    					    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sectionVacancyes']->value, 'vacancya', false, NULL, 'sectionVacancyes', array (
  'first' => true,
  'index' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['vacancya']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_sectionVacancyes']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_sectionVacancyes']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_sectionVacancyes']->value['index'];
?>
                            <div role="tabpanel" class="tab-pane fade <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_sectionVacancyes']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_sectionVacancyes']->value['first'] : null)) {?>in active<?php }?>" id="vac-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['vacancya']->value['articleId'], ENT_QUOTES, 'UTF-8', true);?>
">
    					    	<div class="tab-desc"><?php echo $_smarty_tpl->tpl_vars['vacancya']->value['summary'];?>
</div>
    					    	<div class="tab-doc-wrapper">
    					    		<?php if (isset($_smarty_tpl->tpl_vars['vacancya']->value['files'])) {?>
    					    		<div class="img-content">
        					    		<?php if ($_smarty_tpl->tpl_vars['vacancya']->value['files']['ext'] == 'docx' || $_smarty_tpl->tpl_vars['vacancya']->value['files']['ext'] == 'doc') {?>
            							<div class="img"><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/img/doc.png"></div>
            							<?php } elseif ($_smarty_tpl->tpl_vars['vacancya']->value['files']['ext'] == 'xlsx' || $_smarty_tpl->tpl_vars['vacancya']->value['files']['ext'] == 'xls') {?>
            							<div class="img"><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/img/excel.png"></div>
            							<?php }?>
    					    		</div>
    					    		<div class="desc-content">
    					    			<p><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['vacancya']->value['files']['fileName'], ENT_QUOTES, 'UTF-8', true);?>
</p>
    					    			<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['vacancya']->value['files']['url'], ENT_QUOTES, 'UTF-8', true);?>
" download=""><i class="fa fa-download"></i><p> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['download'], ENT_QUOTES, 'UTF-8', true);?>
 | <?php echo htmlspecialchars(smarty_modifier_fsize_format($_smarty_tpl->tpl_vars['vacancya']->value['files']['size']), ENT_QUOTES, 'UTF-8', true);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['vacancya']->value['files']['ext'], ENT_QUOTES, 'UTF-8', true);?>
</p></a>
    					    		</div>
    					    		<?php }?>
    					    	</div>
    					    	
    					    </div>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            <div class="tab-form h1">
                                <div class="success-send"><h2><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['resume_sent_successfully'], ENT_QUOTES, 'UTF-8', true);?>
</h2></div>
					    		<form id="request_vacancy" action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['GLOBAL_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/public/feedback.php" method="post">
    					    		<?php echo $_smarty_tpl->tpl_vars['csrf_input']->value;?>

									<?php if ($_smarty_tpl->tpl_vars['config']->value['allow_recaptcha'] == 1) {?>
										<input type="hidden" id="recaptcha_token" name="recaptcha_token" />
									<?php }?>
									<h2><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['send_resume'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
					    			<div class="row">
						    			<div class="input-content col-md-6">
						    				<input type="text" class="input-control" name="subject" placeholder="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['job_title'], ENT_QUOTES, 'UTF-8', true);?>
" data-error="#vacancy_subject">
						    			</div>
						    			<div class="input-content col-md-6">
						    				<input type="text" class="input-control" name="name" placeholder="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['your_name'], ENT_QUOTES, 'UTF-8', true);?>
" data-error="#vacancy_name">
						    			</div>
						    			<div class="input-content col-md-6">
						    				<input type="email" class="input-control" name="email" placeholder="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['your_email'], ENT_QUOTES, 'UTF-8', true);?>
" data-error="#vacancy_email">
						    			</div>
						    			<div class="input-content col-md-6">
						    				<input type="tel" class="input-control" name="phone" placeholder="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['your_phone'], ENT_QUOTES, 'UTF-8', true);?>
" data-error="#vacancy_phone">
						    			</div>
					    			</div>
					    			<div class="about-you"> 
					    				<p><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['about_yourself'], ENT_QUOTES, 'UTF-8', true);?>
</p>
					    				<textarea name="message" data-error="#vacancy_message"></textarea>
					    			</div>
					    			<div class="buttons">
					    				<label for="file"><i class="fa fa-paperclip"></i><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['attach_resume'], ENT_QUOTES, 'UTF-8', true);?>
</label>
					    				<input type="file" id="file" name="file" class="hide" onchange="javascript:this.previousElementSibling.innerText = this.files[0].name">
					    				<span class="btn-def-2"><button type="submit" name="action" value="vacancy"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['send'], ENT_QUOTES, 'UTF-8', true);?>
</button></span>
					    			</div>
					    			<?php if ($_smarty_tpl->tpl_vars['config']->value['allow_recaptcha'] == 0) {?>
                						<div id="send-anti-bot">
                							<strong>Текущий <span style="display:inline;">ye@r</span> <span style="display:none;">month</span> <span style="display:none;">day</span></strong>
                							<span class="required">*</span>
                							<input type="hidden" name="anti-bot-a" id="feedback-anti-bot-a" value="<?php echo htmlspecialchars(smarty_modifier_date_format(time(),'%Y'), ENT_QUOTES, 'UTF-8', true);?>
" />
                							<input type="text" name="anti-bot-q" id="feedback-anti-bot-q" value="19" />
                						</div>
                						<div class="send-anti-bot-2"><input type="email" name="anti-email" value=""/></div>
                					<?php }?>
									<?php if ($_smarty_tpl->tpl_vars['config']->value['allow_recaptcha'] == 1) {?>
										<?php echo '<script'; ?>
 src="https://www.google.com/recaptcha/api.js?render=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['recaptcha_public_key'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo '</script'; ?>
>
										<?php echo '<script'; ?>
 type="text/javascript">
											grecaptcha.ready(function() {
												grecaptcha.execute(
														'<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['recaptcha_public_key'], ENT_QUOTES, 'UTF-8', true);?>
',
															{action: 'homepage'}
												).then(function(token) {
													console.log('token: ', token);
													document.getElementById('recaptcha_token').value=token;
												});
											});
										<?php echo '</script'; ?>
>
									<?php }?>
					    		</form>
					    	</div>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
