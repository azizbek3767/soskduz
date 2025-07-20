{include file="header.tpl" title=$section.meta_title keywords=$section.keywords description=$section.description}
<!-- Хлебные крошки -->
{include file="modules/you-are-here.tpl" class="breadcrumb-container"}

<div class="container">
    <div class="page-name donation-name">
        <h1 class="m-b-15">{$section.name}</h1>
        {$section.content nofilter}
    </div>
</div>

<div class="container team-wrapper m-b-35" id="tab-buttons">
    <div class="nav_tabs donation-tab">
        <ul class="nav" role="tablist">
            <li class="active"><a href="#month-donation" role="tab" class="clicked blocks" data-toggle="tab" aria-expanded="true">{$LANG.donation_tab1}</a></li>
            <li class=""><a href="#donation-tab" role="tab" class="blocks" data-toggle="tab" aria-expanded="false">{$LANG.donation_tab2}</a></li>
            <li class=""><a href="#month-cancel" role="tab" data-toggle="tab" aria-expanded="false">{$LANG.donation_tab3}</a></li>
        </ul>
    </div>
</div>

<div class="tab-content">
    <div role="tabpanel" class="tab-pane fade active in" id="month-donation">
        <div class="donations-page-wrapper m-b-70">
            <div class="container">
                <div class="p-h-110">
                    <form id="subscription" action="{$GLOBAL_URL}/subscription/subscription.php" method="post">
                        {$csrf_input nofilter}
                        <input type="hidden" name="lang" value="{$SITE_LANG}">
                        <div class="donation-amount">
                            <h2 id="subscription_amount" class="blue-header">{$LANG.step1}</h2>
                            <h2>{$LANG.select_amount}</h2>
                            <div class="form-wrapper">
                                <div class="row">
                                    <div id="sum_block" class="amount col-md-12">
                                        {fetch_donations assign=donations}
                                        {foreach from=$donations item=donation name=donations}
                                            <div id="sum_item" class="input-content">
                                                <input type="radio" name="form[amount]" value="{$donation.price}" class="hide sum"
                                                       id="price-sb-{$smarty.foreach.donations.iteration}"
                                                       data-error="#field_error">
                                                <label for="price-sb-{$smarty.foreach.donations.iteration}">
                                                    <div class="price-wrapper">{$donation.price|price|strip_tags}</div>
                                                </label>
                                            </div>
                                        {/foreach}
                                    </div>
                                    <div class="another-amount-wrapper col-md-12">
                                        <input type="number" min="1000" id="other-amount-sb" name="form[other-amount]" value=""
                                               class="another-amount" placeholder="{$LANG.donation_amount}"
                                               data-error="#field_error">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="donations-form">
                            <h2 class="blue-header" id="card-data">{$LANG.step2}</h2>
                            <h2>{$LANG.subscription_step_2}</h2>
                            <div class="form-wrapper">
                                <div class="row m-v-25">
                                    <div class="input-content col-md-6">
                                        <input type="text" name="form[email]" id="email" placeholder="{$LANG.donation_email}" class="input-control responsive-input" data-error="#subscription_email">
                                    </div>
                                </div>
                                <div class="row m-v-25">
                                    <div class="input-content col-md-6">
                                        <input type="text" name="form[card]" id="card" placeholder="{$LANG.subscription_card}" class="input-control responsive-input" data-error="#subscription_card">
                                    </div>
                                    <div class="input-content col-md-6">
                                        <input type="text" name="form[expire]" id="card_expire" value="" placeholder="{$LANG.subscription_card_expire}" class="input-control responsive-input" data-error="#subscription_card_expire">
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
                                                <div class="desc-content"><p id="subscribe-offer">{$LANG.subscription_offer} <span>
                                            {fetch_section assign=oferta section=54}{if $oferta.status eq 'visible'}<a
                                                                href="{$oferta.url}">{*$oferta.alias*}</a>{/if}</span></p></div>
                                            </div>
                                        </label>
                                        <button class="btn-def-2" type="submit" name="action" value="donation">{$LANG.continue}</button>
                                    </div>
                                    <p class="m-t-15 donation-payment-info">{$LANG.subscription_description}</p>
                                </div>
                            </div>
                        </div>
                    </form>

                    <form id="subscription-verify" action="{$GLOBAL_URL}/subscription/verify.php" method="post" style="display: none">
                        {$csrf_input nofilter}
                        <input type="hidden" name="lang" value="{$SITE_LANG}">
                        <input type="hidden" id="amount" name="form[amount]">
                        <input type="hidden" id="email" name="form[email]">
                        <input type="hidden" id="confirm_id" name="form[confirm_id]">
                        <div class="donations-form">
                            <h2 class="blue-header m-b-5">{$LANG.confirm_title}</h2>
                            <h2 class="m-b-15">{$LANG.subscription_step_3}</h2>
                            <div class="form-wrapper">
                                <div class="row">
                                    <div class="input-content m-t-10 col-md-5">
                                        <input type="number" name="form[code]" id="code" placeholder="{$LANG.subscription_code}" class="input-control" data-error="#subscription_card">
                                    </div>
                                    <div class="form-bottom col-md-7">
                                        <div class="input-content">
                                            <button class="btn-def-2" type="submit" name="action" value="donation">{$LANG.confirm}</button>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-link" id="resend" style="display: none">{$LANG.subscription_resend}</button>
                                <p class="timer"><img src="{$THEME_URL}/img/timer.png"> {$LANG.subscription_resend_timer nofilter}</p>
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
                    <div class="success-send"><h2>{$LANG.donation_successfully}</h2></div>
                    <h2 class="paynet_success" style="text-align: center; display: none">{$LANG.donation_paynet}</h2>
                    <form id="donation" action="{$GLOBAL_URL}/request/request.php" method="post">
                        {$csrf_input nofilter}
                        <input type="hidden" name="lang" value="{$SITE_LANG}">

                        <div class="donation-amount">
                            <h2 id="donation_amount" class="blue-header">{$LANG.step1}</h2>
                            <h2>{$LANG.select_amount}</h2>
                            <div class="form-wrapper">
                                <div class="row">
                                    <div class="m-t-15 team-wrapper m-b-10" id="tab-buttons">
                                        <div class="nav_tabs donation-tab">
                                            <ul class="nav" role="tablist">
                                                <li class="active in_sum">
                                                    <a href="#donation-uzs" role="tab" class="clicked blocks" data-toggle="tab" aria-expanded="true">
                                                        {$LANG.in_sum}
                                                    </a>
                                                </li>
                                                <li class="in_dollar">
                                                    <a href="#donation-usd" role="tab" class="blocks" data-toggle="tab" aria-expanded="false">
                                                        {$LANG.in_dollars}
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade active in" id="donation-uzs">
                                                <div id="sum_block" class="amount col-md-12">
                                                    {fetch_donations assign=donations}
                                                    {foreach from=$donations item=donation name=donations}
                                                        <div id="sum_item" class="input-content">
                                                            <input type="radio" name="form[amount]" value="{$donation.price}" class="hide sum"
                                                                   id="price-{$smarty.foreach.donations.iteration}"
                                                                   data-error="#field_error">
                                                            <label for="price-{$smarty.foreach.donations.iteration}">
                                                                <div class="price-wrapper">{$donation.price|price|strip_tags}</div>
                                                            </label>
                                                        </div>
                                                    {/foreach}
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
                                               class="another-amount other-amount-one-time" placeholder="{$LANG.donation_amount}"
                                               data-error="#field_error">
                                    </div>
                                    <input type="hidden" id="donation-currency" name="form[currency]" value="sum">
                                </div>
                            </div>
                        </div>

                        <div class="payment-wrapper donations-form">
                            <h2 id="payment_method" class="blue-header">{$LANG.step2}</h2>
                            <h2>{$LANG.donation_step_2}</h2>
                            <div class="form-wrapper">
                                {fetch_payments_method assign=payments}
                                {foreach from=$payments item=paymentMethod name=payments}
                                    <div class="input-content">
                                        <input type="radio" name="form[payment]" value="{$paymentMethod.fileName}"
                                               id="payment-{$paymentMethod.fileName}" data-payment="{$paymentMethod.name}" class="hide input-payment" data-error="#donation_payment">
                                        <label for="payment-{$paymentMethod.fileName}">
                                            <div class="payment-img"><img class="payment-method-img" src="{$THEME_URL}/img/{$paymentMethod.fileName}.png">
                                            </div>
                                            {* 						<div class="payment-desc"><p>{$paymentMethod.name}</p></div> *}
                                        </label>
                                    </div>
                                {/foreach}
                            </div>
                            <div class="form-wrapper m-m-8">
                                <div class="form-bottom">
                                    <div class="input-content offer">
                                        <input type="radio" name="form[offer]" class="hide" id="constancy-6"
                                               class="input-control" data-error="#offer">
                                        <label for="constancy-6" class="d-block">
                                            <div class="constancy-wrapper">
                                                <div class="circle"><span></span></div>
                                                <div class="desc-content"><p id="offer">{$LANG.donation_offer} <span>
                                                {fetch_section assign=oferta section=54}{if $oferta.status eq 'visible'}<a
                                                                href="{$oferta.url}">{*$oferta.alias*}</a>{/if}</span></p></div>
                                            </div>
                                        </label>
                                        <button class="btn-def-2" type="submit" name="action" value="donation">{$LANG.donation_submit}</button>
                                    </div>
                                    <p class="m-t-15 donation-payment-info">{$LANG.subscription_description}</p>
                                </div>
                            </div>
                        </div>

                        <script>
                        </script>

                        {*<div class="donations-form">
                            *}{*                <h2>{$LANG.donation_step_3}</h2>*}{*
                            <div class="form-wrapper">
                                <div class="row">
                                    *}{*                        <div class="form-top clearfix">*}{*
                                    *}{*                            <div class="input-content col-md-6">*}{*
                                    *}{*                                <input type="text" name="form[name]" placeholder="{$LANG.donation_name}" class="input-control" data-error="#donation_name">*}{*
                                    *}{*                            </div>*}{*
                                    *}{*                            <div class="input-content col-md-6">*}{*
                                    *}{*                                <input type="tel" name="form[phone]" id="phone" value="" placeholder="{$LANG.donation_phone}" class="input-control" data-error="#donation_phone">*}{*
                                    *}{*                            </div>*}{*
                                    *}{*                        </div>*}{*
                                    <div class="form-bottom">
                                        <div class="input-content">
                                            <input type="radio" name="form[offer]" class="hide" id="constancy-5"
                                                   class="input-control" data-error="#donation_offer">
                                            <label for="constancy-5">
                                                <div class="constancy-wrapper">
                                                    <div class="circle"><span></span></div>
                                                    <div class="desc-content"><p id="offer">{$LANG.donation_offer} <span>
                                            {fetch_section assign=oferta section=54}{if $oferta.status eq 'visible'}<a
                                                                    href="{$oferta.url}">*}{*$oferta.alias*}{*</a>{/if}</span></p></div>
                                                </div>
                                            </label>
                                            <button class="btn-def-2" type="submit" name="action" value="donation">{$LANG.donation_submit}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>*}
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
                    <form id="subscription-cancel" action="{$GLOBAL_URL}/subscription/subscriptionCancel.php" method="post">
                        {$csrf_input nofilter}
                        <input type="hidden" name="lang" value="{$SITE_LANG}">
                        <div class="donations-form">
                            <h2 class="remove-section-title">{$LANG.subscription_cancel_text}</h2>
                            <div class="form-wrapper">
                                <div class="row">
                                    <div class="input-content m-t-10 col-md-5 input-content-additional">
                                        <input type="text" name="form[phone]" id="phone" placeholder="+998" class="input-control phone-input" data-error="#subscription_phone">
                                    </div>
                                    <div class="form-bottom col-md-7">
                                        <div class="input-content">
                                            <button class="btn-def-2 subscribe-remove-btn" type="submit" name="action" value="donation">{$LANG.subscription_cancel}</button>
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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><img src="{$THEME_URL}/img/close.png"></span></button>
            </div>
            <div class="modal-body p-h-60 p-b-60">
                <img src="{$THEME_URL}/img/heart.png">
                <h2>{$LANG.confirm_modal_title}</h2>
                <p>{$LANG.confirm_modal_description nofilter}</p>
                <small>{$LANG.confirm_modal_extra}</small>
            </div>
        </div>
    </div>
</div>

<!-- Модаль отмены подписки-->
<div class="modal fade" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header p-b-0 p-t-5 p-r-5">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><img src="{$THEME_URL}/img/close.png"></span></button>
            </div>
            <div class="modal-body p-h-40 p-b-40">
                <img src="{$THEME_URL}/img/heart_cancel.png">
                <h3>{$LANG.confirm_modal_cancel_title}</h3>
            </div>
        </div>
    </div>
</div>


<script src="https://paysys.uz/application/resources/js/checkout.js"></script>

<script>
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

</script>
{include file="footer.tpl"}