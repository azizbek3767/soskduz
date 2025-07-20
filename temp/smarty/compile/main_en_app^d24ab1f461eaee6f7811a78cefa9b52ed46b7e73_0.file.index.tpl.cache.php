<?php
/* Smarty version 3.1.33, created on 2025-07-17 17:14:11
  from '/home/soskduz/public_html/themes/app/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6878e913555e18_12166734',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd24ab1f461eaee6f7811a78cefa9b52ed46b7e73' => 
    array (
      0 => '/home/soskduz/public_html/themes/app/templates/index.tpl',
      1 => 1667818079,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:modules/slider.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6878e913555e18_12166734 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/soskduz/public_html/includes/smarty_plugins/function.fetch_sections.php','function'=>'smarty_function_fetch_sections',),1=>array('file'=>'/home/soskduz/public_html/includes/smarty_plugins/function.fetch_section.php','function'=>'smarty_function_fetch_section',),2=>array('file'=>'/home/soskduz/public_html/includes/smarty_plugins/function.fetch_articles.php','function'=>'smarty_function_fetch_articles',),3=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),4=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
$_smarty_tpl->compiled->nocache_hash = '14291475956878e9134ecb41_17186508';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('title'=>$_smarty_tpl->tpl_vars['section']->value['meta_title'],'keywords'=>$_smarty_tpl->tpl_vars['section']->value['keywords'],'description'=>$_smarty_tpl->tpl_vars['section']->value['description']), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender('file:modules/slider.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<section class="waw-wrapper">
    <div class="container">
        <div class="row">
            <div class="waw-more-info-wrapper col-md-4 counter-animate-container">
                <div class="waw-more-info">
                    <?php echo smarty_function_fetch_sections(array('assign'=>'facts','from'=>38,'status'=>"visible"),$_smarty_tpl);?>

                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['facts']->value, 'fact', false, NULL, 'facts', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['fact']->value) {
?>
                        <div class="desc-content">
                            <h3><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['fact']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</h3>
                            <h2 class="special-h1-class"><span class="counter-animate "><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['fact']->value['alias'], ENT_QUOTES, 'UTF-8', true);?>
</span>+</h2>
                            <?php echo $_smarty_tpl->tpl_vars['fact']->value['summary'];?>

                        </div>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
            </div>
            <?php echo smarty_function_fetch_section(array('assign'=>'about','section'=>2),$_smarty_tpl);
if ($_smarty_tpl->tpl_vars['about']->value['status'] == 'visible') {?>
                <div class="waw-main-info col-md-8">
                    <div class="section-name">
                        <h2><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['about']->value['alias'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
                        <h1><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['about']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</h1>
                    </div>
                    <div class="desc-content"><?php echo $_smarty_tpl->tpl_vars['about']->value['summary'];?>
</div>
                    <div class="waw-button"><span class="btn-def-2"><a
                                    href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['about']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['more_details'], ENT_QUOTES, 'UTF-8', true);?>
</a></span></div>
                </div>
            <?php }?>
        </div>


        <!-- PROGRAM CARDS SECTION -->


        <div class="row">
            <?php echo smarty_function_fetch_section(array('assign'=>'about','section'=>3),$_smarty_tpl);
if ($_smarty_tpl->tpl_vars['about']->value['status'] == 'visible') {?>
                <div class="waw-main-info col-md-8">
                    <div class="section-name">
                        <h2><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['about']->value['alias'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
                        <h2 class="special-h1-class"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['about']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
                    </div>
                </div>
            <?php }?></div>

        <div class="program-cards">
            <ul>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['TREE']->value, 'navItem1', false, NULL, 'navItems1', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['navItem1']->value) {
?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['navItem1']->value['subsections'], 'navItem2');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['navItem2']->value) {
?>
                        <?php if ($_smarty_tpl->tpl_vars['navItem2']->value['parentId'] == 3) {?>
                            <?php echo smarty_function_fetch_section(array('assign'=>'video','section'=>$_smarty_tpl->tpl_vars['navItem2']->value['sectionId'],'image'=>true),$_smarty_tpl);?>

                            <?php if ($_smarty_tpl->tpl_vars['video']->value['status'] == 'visible') {?>
                                <li class="program-card">
                                    <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['navItem2']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
" target="_self">
                        <span class="sr-only" role="img"
                              aria-label="People light candles during a demonstration in Bogota, Colombia"></span>
                                        <span class="img-container-wrap">
                                <span class="img-container"
                                      style="background-image: url('<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['video']->value['images']['medium']['url'], ENT_QUOTES, 'UTF-8', true);?>
');"></span>
                            </span>
                                        <span class="program-card-icon">
                                <img src="https://www.sos-kd.uz/uploads/articles/270/logo-SOS.png"
                                     alt="Civic Engagement and Government icon">
                                </span>
                                        <h3 style="color: #15706C;"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['navItem2']->value['alias'], ENT_QUOTES, 'UTF-8', true);?>
</h3>
                                    </a>
                                </li>
                            <?php }?>
                        <?php }?>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ul>
        </div>

        <?php echo smarty_function_fetch_section(array('assign'=>'video','section'=>8,'image'=>true),$_smarty_tpl);
if ($_smarty_tpl->tpl_vars['video']->value['status'] == 'visible') {?>
        <div class="section-name" style="margin-top:55px;">
            <h2>Видео</h2>
            <h2 class="special-h1-class" style="margin-bottom:55px;"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['video']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
            <div>
                <div class="waw-video-wrapper col-md-8">
                    <div class="waw-video" style="background-image: url('<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['video']->value['images']['medium']['url'], ENT_QUOTES, 'UTF-8', true);?>
');">
                        <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['video']->value['alias'], ENT_QUOTES, 'UTF-8', true);?>
" data-fancybox data-width="640" data-height="360"><span
                                    class="icmicon"></span></a>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>


        

    </div>
</section>


<?php echo smarty_function_fetch_section(array('assign'=>'news','section'=>7),$_smarty_tpl);
if ($_smarty_tpl->tpl_vars['news']->value['status'] == 'visible') {?>
    <section class="news-wrapper">
        <div class="container">
            <div class="section-name">
                <h2><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['news']->value['alias'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
                <h2 class="special-h1-class"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['news']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
                <div class="news-more-info"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['news']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
"><h2><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['all_news'], ENT_QUOTES, 'UTF-8', true);?>
</h2><i
                                class="icmangle-arrow-down"></i></a></div>
            </div>
            <div class="row">
                <div class="novelties clearfix">
                    <?php echo smarty_function_fetch_articles(array('assign'=>'sectionArticles','section'=>$_smarty_tpl->tpl_vars['news']->value['sectionId'],'limit'=>3,'type_content'=>"news"),$_smarty_tpl);?>

                    <?php if (isset($_smarty_tpl->tpl_vars['sectionArticles']->value)) {?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sectionArticles']->value, 'content', false, NULL, 'sectionArticles', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['content']->value) {
?>
                            <div class="novelty-wrapper col-md-4">
                                <div class="novelty">
                                    <div class="img-content">
                                        <div class="img"><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['content']->value['images']['medium']['url'], ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['content']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
">
                                        </div>
                                    </div>
                                    <div class="desc-content">
                                        <span> <i class="icmcalendar"></i> <?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['content']->value['publishedOn'],"%e.%m.%Y"), ENT_QUOTES, 'UTF-8', true);?>
</span>
                                        <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['content']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['content']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
</a>
                                        <p data-text-limit="150"><?php echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['content']->value['summary']),150);?>
</p>
                                    </div>
                                </div>
                            </div>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <?php }?>
                </div>
            </div>
        </div>
    </section>
<?php }
echo smarty_function_fetch_section(array('assign'=>'partners','section'=>5),$_smarty_tpl);
if ($_smarty_tpl->tpl_vars['partners']->value['status'] == 'visible') {?>
    <section class="partners-wrapper">
        <div class="container">
            <div class="section-name"><h2 class="special-h1-class"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['partners']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</h2></div>
            <div class="owl-carousel partners-carousel nav-style-2">
                <?php echo smarty_function_fetch_articles(array('assign'=>'sectionPartners','section'=>$_smarty_tpl->tpl_vars['partners']->value['sectionId'],'limit'=>30,'type_content'=>"partners"),$_smarty_tpl);?>

                <?php if (isset($_smarty_tpl->tpl_vars['sectionPartners']->value)) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sectionPartners']->value, 'partner', false, NULL, 'sectionPartners', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['partner']->value) {
?>
                        <div class="carousel-item">
                            <div class="partners-item">
                                <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['partner']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
">
                                    <div class="img-content">
                                        <div class="img"><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['partner']->value['images']['medium']['url'], ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['partner']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
">
                                        </div>
                                    </div>
                                    <div class="desc-content"><h4><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['partner']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
</h4></div>
                                </a>
                            </div>
                        </div>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}?>


            </div>
        </div>
    </section>
<?php }?>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
