<?php
/* Smarty version 3.1.33, created on 2025-07-17 16:41:55
  from '/home/soskduz/public_html/themes/app/templates/search.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6878e1839dbb93_73799286',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd8cdc14bac3b22936640ca7f4e84698b91fc065e' => 
    array (
      0 => '/home/soskduz/public_html/themes/app/templates/search.tpl',
      1 => 1607433438,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:modules/pagination.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6878e1839dbb93_73799286 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/soskduz/public_html/includes/smarty_plugins/function.fetch_articles.php','function'=>'smarty_function_fetch_articles',),1=>array('file'=>'/home/soskduz/public_html/includes/smarty_plugins/function.fetch_sections_search.php','function'=>'smarty_function_fetch_sections_search',),2=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/modifier.replace.php','function'=>'smarty_modifier_replace',),));
$_smarty_tpl->compiled->nocache_hash = '10348548526878e18399edc0_17752557';
ob_start();
echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['searching_results'], ENT_QUOTES, 'UTF-8', true);
$_prefixVariable1 = ob_get_clean();
ob_start();
echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['searching_results'], ENT_QUOTES, 'UTF-8', true);
$_prefixVariable2 = ob_get_clean();
ob_start();
echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['searching_results'], ENT_QUOTES, 'UTF-8', true);
$_prefixVariable3 = ob_get_clean();
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('title'=>$_prefixVariable1,'keywords'=>$_prefixVariable2,'description'=>$_prefixVariable3), 0, false);
?>

<?php echo smarty_function_fetch_articles(array('query'=>$_smarty_tpl->tpl_vars['query']->value,'page'=>$_smarty_tpl->tpl_vars['page']->value,'perPage'=>10,'assign'=>'searchResults','assignPagination'=>'pagination','fields'=>'title, url, summary, content, sectionId'),$_smarty_tpl);?>


<?php echo smarty_function_fetch_sections_search(array('query'=>$_smarty_tpl->tpl_vars['query']->value,'page'=>$_smarty_tpl->tpl_vars['page']->value,'perPage'=>10,'assign'=>'sectionsSearchResults','assignPagination'=>'sectionPagination','fields'=>'name, url, summary, content, sectionId'),$_smarty_tpl);?>


<div class="search-page-wrapper">
    <div class="container">

        <div class="page-name">
            <h1><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['searching_results'], ENT_QUOTES, 'UTF-8', true);?>
:<span><?php if (isset($_smarty_tpl->tpl_vars['query']->value)) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['query']->value, ENT_QUOTES, 'UTF-8', true);
}?></span></h1>
            <p><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['request'], ENT_QUOTES, 'UTF-8', true);?>

                <span><?php if (isset($_smarty_tpl->tpl_vars['query']->value)) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['query']->value, ENT_QUOTES, 'UTF-8', true);
}?></span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['found'], ENT_QUOTES, 'UTF-8', true);?>
 <?php if ((isset($_smarty_tpl->tpl_vars['pagination']->value['totalItems']) || isset($_smarty_tpl->tpl_vars['sectionPagination']->value['totalItems']))) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['pagination']->value['totalItems']+$_smarty_tpl->tpl_vars['sectionPagination']->value['totalItems'], ENT_QUOTES, 'UTF-8', true);
} else { ?>0<?php }?>
                :</p>
        </div>

        <?php if ($_smarty_tpl->tpl_vars['searchResults']->value) {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['searchResults']->value, 'article', false, NULL, 'searchResults', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
?>
                <div class="result">
                    <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
">
                        <span><?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['article']->value['title'],$_smarty_tpl->tpl_vars['query']->value,"<b>".((string)$_smarty_tpl->tpl_vars['query']->value)."</b>");?>
</span>
                        <p><?php echo smarty_modifier_replace(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['article']->value['summary']),$_smarty_tpl->tpl_vars['query']->value,"<b>".((string)$_smarty_tpl->tpl_vars['query']->value)."</b>");?>
</p>
                    </a>
                </div>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['sectionsSearchResults']->value) {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sectionsSearchResults']->value, 'section', false, NULL, 'sectionsSearchResults', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['section']->value) {
?>
                <div class="result">
                    <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
">
                        <span><?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['section']->value['name'],$_smarty_tpl->tpl_vars['query']->value,"<b>".((string)$_smarty_tpl->tpl_vars['query']->value)."</b>");?>
</span>
                        <p><?php echo smarty_modifier_replace(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['section']->value['summary']),$_smarty_tpl->tpl_vars['query']->value,"<b>".((string)$_smarty_tpl->tpl_vars['query']->value)."</b>");?>
</p>
                    </a>
                </div>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['searching_result']->value && $_smarty_tpl->tpl_vars['sectionsSearchResults']->value) {?>
            <div class="result text-center"><h4><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['not_found'], ENT_QUOTES, 'UTF-8', true);?>
</h4></div>
        <?php }?>
        <?php $_smarty_tpl->_subTemplateRender("file:modules/pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('class'=>"page-numbers"), 0, false);
?>

    </div>
</div>


<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
