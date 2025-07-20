<?php
/* Smarty version 3.1.33, created on 2025-07-17 17:35:12
  from '/home/soskduz/public_html/themes/app/templates/init/app-init.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6878ee00a06b13_15604382',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '03a78402de4fed1614d4f570f3ae97bb3031ec84' => 
    array (
      0 => '/home/soskduz/public_html/themes/app/templates/init/app-init.tpl',
      1 => 1584726832,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6878ee00a06b13_15604382 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '12069555266878ee009d7527_21281191';
echo '<script'; ?>
>
var App = function() {

    var _cartAction = function () {
        // добавление в корзину
        var BtnAddToCart= $(".btn-addtocart");
        BtnAddToCart.on('click', function() {
            var id = $(this).attr("data-id"), action = $(this).attr('data-action'), amount = $('.cnt-input').val();
            console.log(amount);
            $.post('/public/app.php', { id: id, act: action, amount: amount, lang: '<?php if ($_smarty_tpl->tpl_vars['SITE_LANG']->value == '') {?>ru<?php } else {
echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_LANG']->value, ENT_QUOTES, 'UTF-8', true);
}?>' }, function(data) {
               console.log(data)
                _amountProductsCart();
            });
        });


        var InputCounter =  $('.input-counter');

        InputCounter.find('.minus, .plus').on('click',function(e) {
            var $input = $(this).parent().find('input');
            var count = parseInt($input.val(), 10) + parseInt(e.currentTarget.className === 'plus' ? 1 : -1, 10);
            $input.val(count).change();
        });
        InputCounter.find("input").change(function() {
            var _ = $(this);
            var min = 1;
            var val = parseInt(_.val(), 10);
            var max = parseInt(_.attr('size'), 10);
            val = Math.min(val, max);
            val = Math.max(val, min);
            _.val(val);
        })
        // прибавление, уменьшение кол-ва товара путем ввода в поле input
        .on("keypress", function( e ) {
            if (e.keyCode === 13) {
                e.preventDefault();
                var id = $(this).attr("data-id"), amount = parseInt($(this).val()), action = $(this).attr('data-action') ;
                $.post('/public/app.php', { id: id, amount: amount, act: action, lang: '<?php if ($_smarty_tpl->tpl_vars['SITE_LANG']->value == '') {?>ru<?php } else {
echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_LANG']->value, ENT_QUOTES, 'UTF-8', true);
}?>' }, function(data) {
                   // console.log(data)
                    if (data.code === true){
                        $('.subtotal_'+ id).text(data.subtotal);
                    }
                    _totalPriceCart();
                    _amountProductsCart();
                });
            }
        });



        /* Количество товара в карточке и корзине */
        $(document).on( 'click', '.input-counter span', function() {
            var input = $(this).parent().find('input'), action; // $(this).parent().find('input')
            if ($(this).hasClass('plus')) {
                action = 'plus';
            } else if ($(this).hasClass('minus')) {
                action = 'minus';
            }
            //console.log(input.val());
            _amount_change(input, action);
        });

        var _amount_change = function (input, action) {
           // console.log(input.attr('data-id'));
            var id = parseInt(input.attr('data-id')), amount = parseInt(input.val());
            $.post('/public/app.php', { id: id, amount: amount, act: action, lang: '<?php if ($_smarty_tpl->tpl_vars['SITE_LANG']->value == '') {?>ru<?php } else {
echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_LANG']->value, ENT_QUOTES, 'UTF-8', true);
}?>' }, function(data) {
                //console.log(data)
                if (data.code === false) {
                     $('.basket_message').removeClass('bg-success').addClass('bg-danger').text(data.info).fadeIn();
                    setTimeout(function () { $('.basket_message').fadeOut(); }, 2500);
                }
                if (data.code === true){
                    $('.subtotal_'+ id).text(data.subtotal);
                }
                _totalPriceCart();
                _amountProductsCart();
            });
        };

        // удаление товара из корзины
        $(".btn-remove").on('click', function() {
            $(this).closest('.basket-item').remove();
            $.post('/public/app.php', { id: $(this).attr("data-id"), act: $(this).attr('data-action'), lang: '<?php if ($_smarty_tpl->tpl_vars['SITE_LANG']->value == '') {?>ru<?php } else {
echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_LANG']->value, ENT_QUOTES, 'UTF-8', true);
}?>' }, function(data) {
               // console.log(data);
                if (data.code === true) {
                    _amountProductsCart();
                    _totalPriceCart();
                }
            });
        });

        // удаление товаров из корзины
        $('.remove-all-products').on('click', function() {
            $.post('/public/app.php', { act: $(this).attr('data-action'), lang: '<?php if ($_smarty_tpl->tpl_vars['SITE_LANG']->value == '') {?>ru<?php } else {
echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_LANG']->value, ENT_QUOTES, 'UTF-8', true);
}?>' }, function(data) {
               if (data.code === true) {
                   $('.basket-results, .total-sum').fadeOut();
                   $('.basket-empty').removeClass('hide');
                   _amountProductsCart();
                   _totalPriceCart();
               }
            });
        });


    };

    var _amountProductsCart = function () {
        $.post('/public/app.php', { act: 'cart_products_amount', lang: '<?php if ($_smarty_tpl->tpl_vars['SITE_LANG']->value == '') {?>ru<?php } else {
echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_LANG']->value, ENT_QUOTES, 'UTF-8', true);
}?>' }, function(data) {
            $('.badge-cart').text(data);
            if (data === 0) {
                $('.basket-results, .total-sum').fadeOut();
                $('.basket-empty').removeClass('hide');
            }
        });
    };

    var _totalPriceCart = function () {
        $.post('/public/app.php', { act: 'cart_total_price', lang: '<?php if ($_smarty_tpl->tpl_vars['SITE_LANG']->value == '') {?>ru<?php } else {
echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_LANG']->value, ENT_QUOTES, 'UTF-8', true);
}?>' }, function(data) {
            $('.total-price').html(data);
        });
    };



    var _orderForm = function () {
        var orderForm = $('#order');
        $(orderForm).focus();
        $("#send-anti-bot").hide();
        $("#order .send-anti-bot-2").hide();
        var answer = $("#feedback-form-anti-bot input#feedback-anti-bot-a").val();
        $("#feedback-form-anti-bot input#feedback-anti-bot-q").val(answer);

        if ( $("form#order input#feedback-anti-bot-q").length == 0 ) {
            var current_date = new Date();
            var current_year = current_date.getFullYear();
            $("form#order").append('<input type="hidden" name="anti-bot-q" id="feedback-anti-bot-q" value="' + current_year + '" />');
        }
        orderForm.validate({
            ignore: [],
            errorElement: 'span',
            errorClass: 'error',
            rules: {
                name: { required: true },
                phone: { required: true },
                email: { required: true },
            },
            messages: {
                name: { required: "" },
                phone: { required: "" },
                email: { required: "" },

            },
            errorPlacement: function (error, element) {
                var placement = $(element).data('error');
                if (placement) {
                    $(placement).append(error)
                } else {
                    error.insertAfter(element);
                }

            },
            submitHandler: function () {
                $.post(orderForm.attr("action"), orderForm.serialize()+"&lang=<?php if ($_smarty_tpl->tpl_vars['SITE_LANG']->value == '') {?>ru<?php } else {
echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_LANG']->value, ENT_QUOTES, 'UTF-8', true);
}?>").done(function (data) {
                    console.log(data)
                    if (data.code === true) {
                        orderForm.fadeOut();
                        $('.success-send').css('display', 'block');
                        $('.success-send span').text(data.name);
                        $('.basket-results, .total-sum').fadeOut();
                        $('.basket-empty').removeClass('hide');
                        _amountProductsCart();
                        _totalPriceCart();
                    }
                })
            }
        });
    };

    // Возврат объектов, назначенных модулю
    return {
        init: function() {
            _cartAction();
            _amountProductsCart();
            _orderForm();
        }
    }

}();

// Инициализировать модуль
document.addEventListener('DOMContentLoaded', function() {
    App.init();
});
<?php echo '</script'; ?>
><?php }
}
