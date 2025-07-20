<?php
/* Smarty version 3.1.33, created on 2025-07-17 10:28:46
  from '/home/soskduz/public_html/themes/app/templates/section-donations.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_68788a0e08be22_98763508',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c5e2ce8ba1d7558222c0e2d38e504bab0104bb1e' => 
    array (
      0 => '/home/soskduz/public_html/themes/app/templates/section-donations.tpl',
      1 => 1704437576,
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
function content_68788a0e08be22_98763508 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/soskduz/public_html/includes/smarty_plugins/function.fetch_donations.php','function'=>'smarty_function_fetch_donations',),1=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/modifier.price.php','function'=>'smarty_modifier_price',),2=>array('file'=>'/home/soskduz/public_html/includes/smarty_plugins/function.fetch_section.php','function'=>'smarty_function_fetch_section',),3=>array('file'=>'/home/soskduz/public_html/includes/smarty_plugins/function.fetch_payments_method.php','function'=>'smarty_function_fetch_payments_method',),));
$_smarty_tpl->compiled->nocache_hash = '7015081268788a0df29733_10560205';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('title'=>$_smarty_tpl->tpl_vars['section']->value['meta_title'],'keywords'=>$_smarty_tpl->tpl_vars['section']->value['keywords'],'description'=>$_smarty_tpl->tpl_vars['section']->value['description']), 0, false);
?>
<!-- Хлебные крошки -->
<?php $_smarty_tpl->_subTemplateRender("file:modules/you-are-here.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('class'=>"breadcrumb-container"), 0, false);
?>

<div class="container">
    <div class="page-name donation-name">
        <h1 class="m-b-15"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</h1>
        <?php echo $_smarty_tpl->tpl_vars['section']->value['content'];?>

    </div>
</div>

<div class="container team-wrapper m-b-35" id="tab-buttons">
    <div class="nav_tabs donation-tab">
        <ul class="nav" role="tablist">
            <li class="active"><a href="#month-donation" role="tab" class="clicked blocks" data-toggle="tab" aria-expanded="true"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['donation_tab1'], ENT_QUOTES, 'UTF-8', true);?>
</a></li>
            <li class=""><a href="#donation-tab" role="tab" class="blocks" data-toggle="tab" aria-expanded="false"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['donation_tab2'], ENT_QUOTES, 'UTF-8', true);?>
</a></li>
            <li class=""><a href="#month-cancel" role="tab" data-toggle="tab" aria-expanded="false"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['donation_tab3'], ENT_QUOTES, 'UTF-8', true);?>
</a></li>
        </ul>
    </div>
</div>

<div class="tab-content">
    <div role="tabpanel" class="tab-pane fade active in" id="month-donation">
        <div class="donations-page-wrapper m-b-70">
            <div class="container">
                <div class="p-h-110">
                    <form id="subscription" action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['GLOBAL_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/subscription/subscription.php" method="post">
                        <?php echo $_smarty_tpl->tpl_vars['csrf_input']->value;?>

                        <input type="hidden" name="lang" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_LANG']->value, ENT_QUOTES, 'UTF-8', true);?>
">
                        <div class="donation-amount">
                            <h2 id="subscription_amount" class="blue-header"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['step1'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
                            <h2><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['select_amount'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
                            <div class="form-wrapper">
                                <div class="row">
                                    <div id="sum_block" class="amount col-md-12">
                                        <?php echo smarty_function_fetch_donations(array('assign'=>'donations'),$_smarty_tpl);?>

                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['donations']->value, 'donation', false, NULL, 'donations', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['donation']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_donations']->value['iteration']++;
?>
                                            <div id="sum_item" class="input-content">
                                                <input type="radio" name="form[amount]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['donation']->value['price'], ENT_QUOTES, 'UTF-8', true);?>
" class="hide sum"
                                                       id="price-sb-<?php echo htmlspecialchars((isset($_smarty_tpl->tpl_vars['__smarty_foreach_donations']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_donations']->value['iteration'] : null), ENT_QUOTES, 'UTF-8', true);?>
"
                                                       data-error="#field_error">
                                                <label for="price-sb-<?php echo htmlspecialchars((isset($_smarty_tpl->tpl_vars['__smarty_foreach_donations']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_donations']->value['iteration'] : null), ENT_QUOTES, 'UTF-8', true);?>
">
                                                    <div class="price-wrapper"><?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', smarty_modifier_price($_smarty_tpl->tpl_vars['donation']->value['price'])), ENT_QUOTES, 'UTF-8', true);?>
</div>
                                                </label>
                                            </div>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    </div>
                                    <div class="another-amount-wrapper col-md-12">
                                        <input type="number" min="1000" id="other-amount-sb" name="form[other-amount]" value=""
                                               class="another-amount" placeholder="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['donation_amount'], ENT_QUOTES, 'UTF-8', true);?>
"
                                               data-error="#field_error">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="donations-form">
                            <h2 class="blue-header" id="card-data"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['step2'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
                            <h2><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['subscription_step_2'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
                            <div class="form-wrapper">
                                <div class="row m-v-25">
                                    <div class="input-content col-md-6">
                                        <input type="text" name="form[email]" id="email" placeholder="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['donation_email'], ENT_QUOTES, 'UTF-8', true);?>
" class="input-control responsive-input" data-error="#subscription_email">
                                    </div>
                                </div>
                                <div class="row m-v-25">
                                    <div class="input-content col-md-6">
                                        <input type="text" name="form[card]" id="card" placeholder="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['subscription_card'], ENT_QUOTES, 'UTF-8', true);?>
" class="input-control responsive-input" data-error="#subscription_card">
                                    </div>
                                    <div class="input-content col-md-6">
                                        <input type="text" name="form[expire]" id="card_expire" value="" placeholder="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['subscription_card_expire'], ENT_QUOTES, 'UTF-8', true);?>
" class="input-control responsive-input" data-error="#subscription_card_expire">
                                    </div>
                                </div>
                                <div id="errors" class="text-center errors"></div>
                                <div class="form-bottom">
                                    <div class="input-content">
                                        <input type="radio" name="form[offer]" class="hide" id="constancy-6-sb"
                                               class="input-control" data-error="#donation_offer">
                                        <label for="constancy-6-sb">
                                            <div class="constancy-wrapper">
                                                <div class="circle"><span></span></div>
                                                <div class="desc-content"><p id="subscribe-offer"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['subscription_offer'], ENT_QUOTES, 'UTF-8', true);?>
 <span>
                                            <?php echo smarty_function_fetch_section(array('assign'=>'oferta','section'=>54),$_smarty_tpl);
if ($_smarty_tpl->tpl_vars['oferta']->value['status'] == 'visible') {?><a
                                                                href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['oferta']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
"></a><?php }?></span></p></div>
                                            </div>
                                        </label>
                                        <button class="btn-def-2" type="submit" name="action" value="donation"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['continue'], ENT_QUOTES, 'UTF-8', true);?>
</button>
                                    </div>
                                    <p class="m-t-15 donation-payment-info"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['subscription_description'], ENT_QUOTES, 'UTF-8', true);?>
</p>
                                </div>
                            </div>
                        </div>
                    </form>

                    <form id="subscription-verify" action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['GLOBAL_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/subscription/verify.php" method="post" style="display: none">
                        <?php echo $_smarty_tpl->tpl_vars['csrf_input']->value;?>

                        <input type="hidden" name="lang" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_LANG']->value, ENT_QUOTES, 'UTF-8', true);?>
">
                        <input type="hidden" id="amount" name="form[amount]">
                        <input type="hidden" id="email" name="form[email]">
                        <input type="hidden" id="confirm_id" name="form[confirm_id]">
                        <div class="donations-form">
                            <h2 class="blue-header m-b-5"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['confirm_title'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
                            <h2 class="m-b-15"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['subscription_step_3'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
                            <div class="form-wrapper">
                                <div class="row">
                                    <div class="input-content m-t-10 col-md-5">
                                        <input type="number" name="form[code]" id="code" placeholder="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['subscription_code'], ENT_QUOTES, 'UTF-8', true);?>
" class="input-control" data-error="#subscription_card">
                                    </div>
                                    <div class="form-bottom col-md-7">
                                        <div class="input-content">
                                            <button class="btn-def-2" type="submit" name="action" value="donation"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['confirm'], ENT_QUOTES, 'UTF-8', true);?>
</button>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-link" id="resend" style="display: none"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['subscription_resend'], ENT_QUOTES, 'UTF-8', true);?>
</button>
                                <p class="timer"><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/img/timer.png"> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['subscription_resend_timer'];?>
</p>
                                <div id="errors-verify" class="text-center errors"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="donation-tab">
        <div class="donations-page-wrapper m-b-70">
            <div class="container">
                <div class="p-h-110">
                    <div class="success-send"><h2><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['donation_successfully'], ENT_QUOTES, 'UTF-8', true);?>
</h2></div>
                    <h2 class="paynet_success" style="text-align: center; display: none"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['donation_paynet'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
                    <form id="donation" action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['GLOBAL_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/request/request.php" method="post">
                        <?php echo $_smarty_tpl->tpl_vars['csrf_input']->value;?>

                        <input type="hidden" name="lang" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_LANG']->value, ENT_QUOTES, 'UTF-8', true);?>
">

                        <div class="donation-amount">
                            <h2 id="donation_amount" class="blue-header"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['step1'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
                            <h2><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['select_amount'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
                            <div class="form-wrapper">
                                <div class="row">
                                    <div class="m-t-15 team-wrapper m-b-10" id="tab-buttons">
                                        <div class="nav_tabs donation-tab">
                                            <ul class="nav" role="tablist">
                                                <li class="active in_sum">
                                                    <a href="#donation-uzs" role="tab" class="clicked blocks" data-toggle="tab" aria-expanded="true">
                                                        <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['in_sum'], ENT_QUOTES, 'UTF-8', true);?>

                                                    </a>
                                                </li>
                                                <li class="in_dollar">
                                                    <a href="#donation-usd" role="tab" class="blocks" data-toggle="tab" aria-expanded="false">
                                                        <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['in_dollars'], ENT_QUOTES, 'UTF-8', true);?>

                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade active in" id="donation-uzs">
                                                <div id="sum_block" class="amount col-md-12">
                                                    <?php echo smarty_function_fetch_donations(array('assign'=>'donations'),$_smarty_tpl);?>

                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['donations']->value, 'donation', false, NULL, 'donations', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['donation']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_donations']->value['iteration']++;
?>
                                                        <div id="sum_item" class="input-content">
                                                            <input type="radio" name="form[amount]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['donation']->value['price'], ENT_QUOTES, 'UTF-8', true);?>
" class="hide sum"
                                                                   id="price-<?php echo htmlspecialchars((isset($_smarty_tpl->tpl_vars['__smarty_foreach_donations']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_donations']->value['iteration'] : null), ENT_QUOTES, 'UTF-8', true);?>
"
                                                                   data-error="#field_error">
                                                            <label for="price-<?php echo htmlspecialchars((isset($_smarty_tpl->tpl_vars['__smarty_foreach_donations']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_donations']->value['iteration'] : null), ENT_QUOTES, 'UTF-8', true);?>
">
                                                                <div class="price-wrapper"><?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', smarty_modifier_price($_smarty_tpl->tpl_vars['donation']->value['price'])), ENT_QUOTES, 'UTF-8', true);?>
</div>
                                                            </label>
                                                        </div>
                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="donation-usd">
                                                <div id="sum_block" class="amount col-md-12">
                                                    <div id="sum_item" class="input-content">
                                                        <input type="radio" name="form[amount]" value="5" class="hide sum"
                                                               id="price-usd5"
                                                               data-error="#field_error">
                                                        <label for="price-usd5">
                                                            <div class="price-wrapper">5$</div>
                                                        </label>
                                                    </div>

                                                    <div id="sum_item" class="input-content">
                                                        <input type="radio" name="form[amount]" value="10" class="hide sum"
                                                               id="price-usd10"
                                                               data-error="#field_error">
                                                        <label for="price-usd10">
                                                            <div class="price-wrapper">10$</div>
                                                        </label>
                                                    </div>

                                                    <div id="sum_item" class="input-content">
                                                        <input type="radio" name="form[amount]" value="25" class="hide sum"
                                                               id="price-usd25"
                                                               data-error="#field_error">
                                                        <label for="price-usd25">
                                                            <div class="price-wrapper">25$</div>
                                                        </label>
                                                    </div>

                                                    <div id="sum_item" class="input-content">
                                                        <input type="radio" name="form[amount]" value="50" class="hide sum"
                                                               id="price-usd50"
                                                               data-error="#field_error">
                                                        <label for="price-usd50">
                                                            <div class="price-wrapper">50$</div>
                                                        </label>
                                                    </div>

                                                    <div id="sum_item" class="input-content">
                                                        <input type="radio" name="form[amount]" value="100" class="hide sum"
                                                               id="price-usd100"
                                                               data-error="#field_error">
                                                        <label for="price-usd100">
                                                            <div class="price-wrapper">100$</div>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="another-amount-wrapper col-md-12">
                                        <input type="number" min="1000" id="other-amount" name="form[other-amount]" value=""
                                               class="another-amount other-amount-one-time" placeholder="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['donation_amount'], ENT_QUOTES, 'UTF-8', true);?>
"
                                               data-error="#field_error">
                                    </div>
                                    <input type="hidden" id="donation-currency" name="form[currency]" value="sum">
                                </div>
                            </div>
                        </div>

                        <div class="payment-wrapper donations-form">
                            <h2 id="payment_method" class="blue-header"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['step2'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
                            <h2><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['donation_step_2'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
                            <div class="form-wrapper">
                                <?php echo smarty_function_fetch_payments_method(array('assign'=>'payments'),$_smarty_tpl);?>

                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['payments']->value, 'paymentMethod', false, NULL, 'payments', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['paymentMethod']->value) {
?>
                                    <div class="input-content">
                                        <input type="radio" name="form[payment]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['paymentMethod']->value['fileName'], ENT_QUOTES, 'UTF-8', true);?>
"
                                               id="payment-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['paymentMethod']->value['fileName'], ENT_QUOTES, 'UTF-8', true);?>
" data-payment="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['paymentMethod']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" class="hide input-payment" data-error="#donation_payment">
                                        <label for="payment-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['paymentMethod']->value['fileName'], ENT_QUOTES, 'UTF-8', true);?>
">
                                            <div class="payment-img"><img class="payment-method-img" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/img/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['paymentMethod']->value['fileName'], ENT_QUOTES, 'UTF-8', true);?>
.png">
                                            </div>
                                                                                    </label>
                                    </div>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </div>
                            <div class="form-wrapper m-m-8">
                                <div class="form-bottom">
                                    <div class="input-content offer">
                                        <input type="radio" name="form[offer]" class="hide" id="constancy-6"
                                               class="input-control" data-error="#offer">
                                        <label for="constancy-6" class="d-block">
                                            <div class="constancy-wrapper">
                                                <div class="circle"><span></span></div>
                                                <div class="desc-content"><p id="offer"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['donation_offer'], ENT_QUOTES, 'UTF-8', true);?>
 <span>
                                                <?php echo smarty_function_fetch_section(array('assign'=>'oferta','section'=>54),$_smarty_tpl);
if ($_smarty_tpl->tpl_vars['oferta']->value['status'] == 'visible') {?><a
                                                                href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['oferta']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
"></a><?php }?></span></p></div>
                                            </div>
                                        </label>
                                        <button class="btn-def-2" type="submit" name="action" value="donation"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['donation_submit'], ENT_QUOTES, 'UTF-8', true);?>
</button>
                                    </div>
                                    <p class="m-t-15 donation-payment-info"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['subscription_description'], ENT_QUOTES, 'UTF-8', true);?>
</p>
                                </div>
                            </div>
                        </div>

                        <?php echo '<script'; ?>
>
                        <?php echo '</script'; ?>
>

                                            </form>
                    <div class="form_payment" id="form_payment"></div>
                </div>
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="month-cancel">
        <div class="donations-page-wrapper m-b-70">
            <div class="container">
                <div class="p-h-110">
                    <form id="subscription-cancel" action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['GLOBAL_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/subscription/subscriptionCancel.php" method="post">
                        <?php echo $_smarty_tpl->tpl_vars['csrf_input']->value;?>

                        <input type="hidden" name="lang" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_LANG']->value, ENT_QUOTES, 'UTF-8', true);?>
">
                        <div class="donations-form">
                            <h2 class="remove-section-title"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['subscription_cancel_text'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
                            <div class="form-wrapper">
                                <div class="row">
                                    <div class="input-content m-t-10 col-md-5 input-content-additional">
                                        <input type="text" name="form[phone]" id="phone" placeholder="+998" class="input-control phone-input" data-error="#subscription_phone">
                                    </div>
                                    <div class="form-bottom col-md-7">
                                        <div class="input-content">
                                            <button class="btn-def-2 subscribe-remove-btn" type="submit" name="action" value="donation"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['subscription_cancel'], ENT_QUOTES, 'UTF-8', true);?>
</button>
                                        </div>
                                    </div>
                                </div>
                                <div id="subscription-cancel-errors" class="errors"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Модаль подтверждения подписки-->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header p-b-0 p-t-5 p-r-5">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/img/close.png"></span></button>
            </div>
            <div class="modal-body p-h-60 p-b-60">
                <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/img/heart.png">
                <h2><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['confirm_modal_title'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
                <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['confirm_modal_description'];?>
</p>
                <small><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['confirm_modal_extra'], ENT_QUOTES, 'UTF-8', true);?>
</small>
            </div>
        </div>
    </div>
</div>

<!-- Модаль отмены подписки-->
<div class="modal fade" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header p-b-0 p-t-5 p-r-5">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/img/close.png"></span></button>
            </div>
            <div class="modal-body p-h-40 p-b-40">
                <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/img/heart_cancel.png">
                <h3><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['confirm_modal_cancel_title'], ENT_QUOTES, 'UTF-8', true);?>
</h3>
            </div>
        </div>
    </div>
</div>


<?php echo '<script'; ?>
 src="https://paysys.uz/application/resources/js/checkout.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
    function f1(sumBlock) {
        const styles = window.getComputedStyle(sumBlock);
        const padding = Number(styles.paddingLeft.replace(/px/, "")) + Number(styles.paddingRight.replace(/px/, ""))
        const parentWidth = sumBlock.clientWidth - padding;
        let breakItems = 5;
        if (window.innerWidth < 992) {
            breakItems = 2;
        }
        const margin = 12;
        let sumItems = Array.from(sumBlock.querySelectorAll("#sum_item"));
        let count = 1;
        while (count < 100 && sumItems.length) {
            let a, b;
            if(sumItems.length > breakItems) {
                a = sumItems.slice(0, breakItems);
                b = breakItems;
            }else {
                a = sumItems;
                b = sumItems.length;
            }

            sumItems = sumItems.filter((item, index) => {
                return index > b - 1;
            })
            a.forEach((item, index) => {
                if(index === a.length - 1){
                    item.style.width = Math.floor(parentWidth / b) + "px";
                }else {
                    item.style.width = (Math.floor(parentWidth / b) - margin) + "px";
                    item.style.marginRight = margin + "px";
                }
            })
            count++
        }

        sumBlock.style.opacity = '1';
    }

    window.addEventListener("load", () => {
        const sumBlocks = document.querySelector("#sum_block");
        f1(sumBlocks);
    })
    document.querySelectorAll('a[data-toggle="tab"]').forEach(item => {
        item.addEventListener('click', (e) => {
            if(item.classList.contains('blocks') && !item.classList.contains("clicked")) {
                let id = item.getAttribute("href");
                let tabParent = document.querySelector(id)
                setTimeout(() => f1(tabParent.querySelector("#sum_block")), 200)
                item.classList.add("clicked");
            }
        })
    })

    function startTimer(duration, display) {
        var timer = duration, minutes, seconds;
        let interval = setInterval(function () {
            minutes = parseInt(timer / 60, 10)
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds;

            if (--timer < 0) {
                // timer = duration;
                clearInterval(interval);
                $('.timer').css('display', 'none');
                $('#resend').css('display', 'inline-block');
            }
        }, 1000);
    }

    $('.in_dollar').click(() => {
        $('.input-payment').each(function() {
            const isPsp = $(this).val() === 'psp';
            $(this).prop('disabled', !isPsp)
                .parent().toggleClass('disabled-payment-method', !isPsp)
                .find(isPsp ? ':radio' : ':disabled').click();
        });

        $('.other-amount-one-time').attr('min', 1)
        $('#donation-currency').val('usd')
    });

    $('.in_sum').click(() => {
        $('.input-payment').parent().removeClass('disabled-payment-method');
        $('.input-payment').prop('disabled', false);
        $('.input-payment[value="psp"]').prop('checked', false);
        $('.other-amount-one-time').attr('min', 1000)
        $('#donation-currency').val('sum')
    });

<?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
