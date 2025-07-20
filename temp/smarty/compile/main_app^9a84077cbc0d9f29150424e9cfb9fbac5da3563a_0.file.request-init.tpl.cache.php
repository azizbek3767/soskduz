<?php
/* Smarty version 3.1.33, created on 2025-07-17 17:35:12
  from '/home/soskduz/public_html/themes/app/templates/init/request-init.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6878ee00a780e0_92321178',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9a84077cbc0d9f29150424e9cfb9fbac5da3563a' => 
    array (
      0 => '/home/soskduz/public_html/themes/app/templates/init/request-init.tpl',
      1 => 1684232204,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6878ee00a780e0_92321178 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '7607217826878ee00a12913_09844685';
echo '<script'; ?>
 src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/js/validate.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/js/messages.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/js/maskedinput.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/js/bootbox/bootbox.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>

    var Request = function() {
        // mask input
        var _componentMask = function() {
            $.mask.definitions['~'] = "[+-]";
            $(".phone").mask('+998 11111-11-11');
            $("#card").mask('1111 1111 1111 1111');
            $("#card_expire").mask('11/11');
        };
        var _selectChangeForm = function () {
            $("select").on("change", function () {
                $(this).valid();
            });
        };
        var _radioChangeForm = function () {
            $('#donation input[name="form[amount]"]').on('change', function() {
                $(this).valid();
                $('#donation_amount').css('color', '');
                var nameField = $('#donation input[name="form[other-amount]"]');
                if ($(this).is(':checked')) {
                    nameField.val('');
                    nameField.valid();
                } else {
                    nameField.valid();
                }
            });
            $('#subscription input[name="form[amount]"]').on('change', function() {
                $(this).valid();
                $('#subscription_amount').css('color', '');
                var nameField = $('#subscription input[name="form[other-amount]"]');
                if ($(this).is(':checked')) {
                    nameField.valid();
                    nameField.val('');
                } else {
                    nameField.valid();
                }
            });
            $('input[name="form[payment]"]').on('change', function() {
                $(this).valid();
                $('#payment_method').css('color', '');
            });
            $('input[name="form[offer]"]').on('change', function() {
                $(this).valid();
                $('#offer').css('color', '');
            });
            $('#donation input[name="form[other-amount]"]').keyup(function () {
                if ($(this).val() >= $(this).attr('min')) {
                    $(this).valid();
                    $('#donation_amount').css('color', '');
                }
            });
            $('#subscription input[name="form[other-amount]"]').keyup(function () {
                if ($(this).val() >= $(this).attr('min')) {
                    $(this).valid();
                    $('#subscription_amount').css('color', '');
                }
            });
        };

        var _donationForm = function () {
            var  donationForm = $('#donation');

                // $("#request").focus();
                // $("#request #form-anti-bot, #request .form-anti-bot-2").hide();
                // var answer = $("#form-anti-bot input#anti-bot-a").val();
                // $("#form-anti-bot input#anti-bot-q").val( answer );
                //
                // if ( $("form#request input#anti-bot-q").length == 0 ) {
                // 	var current_date = new Date();
                // 	var current_year = current_date.getFullYear();
                // 	$("form#request").append('<input type="hidden" name="anti-bot-q" id="anti-bot-q" value="' + current_year + '" />');
                // }

            // форма
            donationForm.validate({
                ignore: [],
                errorElement: 'span',
                errorClass: 'error',
                rules: {
                    "form[name]": { required: true },
                    "form[phone]": { required: true },
                   // "form[email]": { required: true },
                    "form[other-amount]": {
                        required: function () {
                            return !$('#donation input[name="form[amount]"]').is(':checked');
                        }
                    },
                    "form[payment]": { required: true },
                    "form[offer]": { required: true },
                },
                messages: {
                    "form[name]": { required: "" },
                    "form[phone]": { required: "" },
                   // "form[email]": { required: "" },
                    "form[other-amount]": { required: "" },
                    "form[payment]": { required: "" },
                    "form[offer]": { required: "" },

                },
                errorPlacement: function (error, element) {
                    //console.log(element)
                    var placement = $(element).attr('data-error');
                    if (placement) {
                        $(placement).append(error)
                    } else {
                        error.insertAfter(element);
                    }
                    if ( element.attr('name') === 'form[amount]' || element.attr('name') === 'form[other-amount]') {
                        $('#donation_amount').css('color', 'red');
                    }
                    if ( element.attr('name') === 'form[payment]') {
                        $('#payment_method').css('color', 'red');
                    }
                    if (element.attr('name') === 'form[offer]') {
                        $('#offer').css('color', 'red');
                    }

                },
                submitHandler: function () {
                    $.post(donationForm.attr("action"), donationForm.serialize()).done(function (data) {
                        console.log(data)
                        if (data.code === true) {
                            $('#donation').fadeOut();
                            $('.form_payment').html(data.form);
                            if (data.msg != 'paynet'){
                                $('.success-send').fadeIn();
                            } else if (data.msg == 'paynet'){
                                $('.paynet_success').fadeIn();
                            }
                        }
                    });

                }
            });

        };

        var _subscribeForm = function () {
            var  subscribeForm = $('#subscription');

            // форма
            subscribeForm.validate({
                ignore: [],
                errorElement: 'span',
                errorClass: 'error',
                rules: {
                    "form[email]": { email: true },
                    "form[card]": { required: true },
                    "form[expire]": { required: true },
                    "form[other-amount]": {
                        required: function () {
                            return !$('#subscription input[name="form[amount]"]').is(':checked');
                        }
                    },
                    "form[offer]": { required: true },
                },
                messages: {
                    "form[card]": { required: "" },
                    "form[expire]": { required: "" },
                    "form[other-amount]": { required: "" },
                    "form[offer]": { required: "" },
                },
                errorPlacement: function (error, element) {
                    //console.log(element)

                    var placement = $(element).attr('data-error');
                    if (placement) {
                        $(placement).append(error)
                    } else {
                        error.insertAfter(element);
                    }
                    if ( element.attr('name') === 'form[amount]' || element.attr('name') === 'form[other-amount]') {
                        $('#subscription_amount').css('color', 'red');
                    }
                    if ( element.attr('name') === 'form[card]' || element.attr('name') === 'form[expire]' || element.attr('name') === 'form[email]') {
                        $('#card-data').css('color', 'red');
                    }
                    if (element.attr('name') === 'form[offer]') {
                        $('#subscribe-offer').css('color', 'red');
                    }

                },
                submitHandler: function () {
                    $.post(subscribeForm.attr("action"), subscribeForm.serialize()).done(function (data) {
                        if (data.success === true) {
                            $('#errors span').remove();
                            $('#tab-buttons').fadeOut();
                            $('#subscription').fadeOut();
                            $('#amount').val(data.data.amount);
                            $('#subscription-verify #email').val(data.data.email);
                            $('#confirm_id').val(data.data.ConfirmId);
                            $('#subscription-verify').fadeIn();
                            window.scrollTo(0, 0);
                            startTimer(60 * 2.5, document.querySelector('#timer'));
                        } else {
                            $('#errors span').remove();
                            $('#errors').append('<span>' + data.message + '</span>');
                        }
                    });
                }
            });

        };

        var _subscribeConfirmForm = function () {
            var  subscribeConfirmForm = $('#subscription-verify');

            // форма
            subscribeConfirmForm.validate({
                ignore: [],
                errorElement: 'span',
                errorClass: 'error',
                rules: {
                    "form[code]": { required: true },
                },
                messages: {
                    "form[code]": { required: "" },
                },
                errorPlacement: function (error, element) {
                    //console.log(element)
                    var placement = $(element).attr('data-error');
                    if (placement) {
                        $(placement).append(error)
                    } else {
                        error.insertAfter(element);
                    }
                },
                submitHandler: function () {
                    $.post(subscribeConfirmForm.attr("action"), subscribeConfirmForm.serialize()).done(function (data) {
                        if (data.success === true) {
                            $('#subscription').trigger('reset');
                            $('#errors-verify span').remove();
                            $('#confirmModal #modal_amount').text(data.data.amount);
                            $('#confirmModal').modal('show');
                            $('#tab-buttons').fadeIn();
                            $('#subscription').fadeIn();
                            $('#subscription-verify').fadeOut();
                            $('#subscription-verify #code').val('');
                        } else {
                            $('#errors-verify span').remove();
                            $('#errors-verify').append('<span>' + data.message + '</span>');
                        }
                    });
                }
            });

        };

        var _subscribeConfirmResendForm = function () {
            var  subscribeForm = $('#subscription');
            var  subscribeConfirmForm = $('#subscription-verify');
            var resendButton = $('#resend');

            resendButton.click(function () {
                $('#subscription-verify').trigger('reset');
                $.post(subscribeForm.attr("action"), subscribeForm.serialize()).done(function (data) {
                    if (data.success === true) {
                        $('#subscription-verify #code').val('');
                        $('#errors span').remove();
                        $('#confirm_id').val(data.data.ConfirmId);
                        startTimer(60 * 2.5, document.querySelector('#timer'));
                        $('.timer').css('display', 'block');
                        $('#resend').css('display', 'none');
                    } else {
                        $('#errors-verify span').remove();
                        $('#errors-verify').append('<span>' + data.message + '</span>');
                    }
                });
                /*$.post('<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['GLOBAL_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/subscription/resend.php', subscribeConfirmForm.serialize()).done(function (data) {
                    if (data.success === true) {
                        $('#subscription-verify #code').val('');
                    } else {
                        $('#errors-verify span').remove();
                        $('#errors-verify').append('<span>' + data.message + '</span>');

                    }
                });*/
            });

        };

        var _subscribeCancelForm = function () {
            var  subscribeCancelForm = $('#subscription-cancel');

            // форма
            subscribeCancelForm.validate({
                ignore: [],
                errorElement: 'span',
                errorClass: 'error',
                rules: {
                    "form[phone]": { required: true },
                },
                messages: {
                    "form[phone]": { required: "" },
                },
                errorPlacement: function (error, element) {
                    //console.log(element)
                    var placement = $(element).attr('data-error');
                    if (placement) {
                        $(placement).append(error)
                    } else {
                        error.insertAfter(element);
                    }
                },
                submitHandler: function () {
                    $.post(subscribeCancelForm.attr("action"), subscribeCancelForm.serialize()).done(function (data) {
                        if (data.success == true) {
                            $('#subscription-cancel-errors span').remove();
                            $('#subscription-cancel').trigger('reset');
                            $('#cancelModal').modal('show');
                        } else {
                            $('#subscription-cancel-errors span').remove();
                            $('#subscription-cancel-errors').append('<span>' + data.message + '</span>');
                        }
                    });
                }
            });

        };


        var _feedbackForm = function () {

            var feedbackForm = $('#send_feedback');
            $(feedbackForm).focus();
            $("#send-anti-bot").hide();
            $("#send_feedback .send-anti-bot-2").hide();
            var answer = $("#feedback-form-anti-bot input#feedback-anti-bot-a").val();
            $("#feedback-form-anti-bot input#feedback-anti-bot-q").val(answer);

            if ( $("form#send_feedback input#feedback-anti-bot-q").length == 0 ) {
            	var current_date = new Date();
            	var current_year = current_date.getFullYear();
            	$("form#send_feedback").append('<input type="hidden" name="anti-bot-q" id="feedback-anti-bot-q" value="' + current_year + '" />');
            }


            // форма
            feedbackForm.validate({
                ignore: [],
               //  errorElement: 'span',
                // errorClass: 'error',
                rules: {
                    name: { required: true },
                    email: { required: true },
                    subject: { required: true },

                },
                messages: {
                    name: { required: "" },
                    email: { required: "" },
                    subject: { required: "" },
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
                    $.post(feedbackForm.attr("action"), feedbackForm.serialize()).done(function (data) {
                       console.log(data)
                        if (data.code === true) {
                            $('#send_feedback').fadeOut();
                            $('.success-send').css('display', 'block');
                        }
                    })
                }
            });


        };

        var _sendMessageForm = function () {

            var feedbackForm = $('#send_question');
            $(feedbackForm).focus();
            $("#send-anti-bot").hide();
            $("#send_question .send-anti-bot-2").hide();
            var answer = $("#feedback-form-anti-bot input#feedback-anti-bot-a").val();
            $("#feedback-form-anti-bot input#feedback-anti-bot-q").val(answer);

            if ( $("form#send_question input#feedback-anti-bot-q").length == 0 ) {
                var current_date = new Date();
                var current_year = current_date.getFullYear();
                $("form#send_question").append('<input type="hidden" name="anti-bot-q" id="feedback-anti-bot-q" value="' + current_year + '" />');
            }


            // форма
            feedbackForm.validate({
                ignore: [],
                //  errorElement: 'span',
                // errorClass: 'error',
                rules: {
                    name: { required: true },
                    email: { required: true },
                    subject: { required: true },

                },
                messages: {
                    name: { required: "" },
                    email: { required: "" },
                    subject: { required: "" },
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
                    $('.message-send-wait').css('display', 'block');
                    $.post(feedbackForm.attr("action"), feedbackForm.serialize()).done(function (data) {
                        console.log(data)
                        if (data.code === true) {
                            $('#send_question').trigger("reset");
                            $('.success-send').css('display', 'block');
                            setTimeout(function(){
                                $('.success-send').css('display', 'none');
                            }, 3000);
                        }
                        $('.message-send-wait').css('display', 'none');
                    })
                }
            });


        };

        var _requestVacancyForm = function () {

            var requestVacancyForm = $('#request_vacancy');
            $(requestVacancyForm).focus();
            $("#send-anti-bot").hide();
            $("#request_vacancy .send-anti-bot-2").hide();
            var answer = $("#feedback-form-anti-bot input#feedback-anti-bot-a").val();
            $("#feedback-form-anti-bot input#feedback-anti-bot-q").val(answer);

            if ( $("form#request_vacancy input#feedback-anti-bot-q").length == 0 ) {
                var current_date = new Date();
                var current_year = current_date.getFullYear();
                $("form#request_vacancy").append('<input type="hidden" name="anti-bot-q" id="feedback-anti-bot-q" value="' + current_year + '" />');
            }


            // форма
            requestVacancyForm.validate({
                ignore: [],
                //  errorElement: 'span',
                // errorClass: 'error',
                rules: {
                    subject: { required: true },
                    name: { required: true },
                    phone: { required: true },
                    email: { required: true },
                    message: { required: true },

                },
                messages: {
                    subject: { required: "" },
                    name: { required: "" },
                    phone: { required: "" },
                    email: { required: "" },
                    message: { required: "" },

                },
                errorPlacement: function (error, element) {
                     console.log(element)
                    var placement = $(element).data('error');
                    if (placement) {
                        $(placement).append(error)
                    } else {
                        error.insertAfter(element);
                    }

                },
                submitHandler: function (form) {
                    var formData = new FormData($(form)[0]);

                    $.ajax({
                        url: requestVacancyForm.attr("action"),
                        type: 'POST',
                        data: formData,
                        dataType: 'json',
                        async: false,
                        success: function (data) {
                            console.log(data)
                            if (data.code === true) {
                                $('#request_vacancy').fadeOut();
                                $('.success-send').css('display', 'block');
                            }

                        },
                        cache: false,
                        contentType: false,
                        processData: false
                    });
                }

            });


        };

        var _newsletterForm = function () {

            var newsletterForm = $('#newsletter');
            // форма
            newsletterForm.validate({
                ignore: [],
                rules: { email: { required: true }, },
                messages: { email: { required: "" }, },
                errorPlacement: function (error, element) {
                    var placement = $(element).data('error');
                    if (placement) { $(placement).append(error) } else { error.insertAfter(element); }

                },
                submitHandler: function () {
                    $.post(newsletterForm.attr("action"), newsletterForm.serialize()).done(function (data) {
                        console.log(data)
                        if (data.code === true) {
                            bootbox.alert({
                                title: "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['newsletter_success'], ENT_QUOTES, 'UTF-8', true);?>
",
                                message: '<h4>'+data.info+'</h4>',
                            });
                        }
                        if (data.code === false) {
                            bootbox.alert({
                                title: "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['newsletter_error'], ENT_QUOTES, 'UTF-8', true);?>
",
                                message: '<h4>'+data.info+'</h4>',
                            });

                        }
                    })
                }
            });


        };

        // Возврат объектов, назначенных модулю
        return {
            init: function() {
                _componentMask();
                _selectChangeForm();
                _radioChangeForm();
                _donationForm();
                _subscribeForm();
                _subscribeConfirmForm();
                _subscribeConfirmResendForm();
                _subscribeCancelForm();
                _feedbackForm();
                _sendMessageForm();
                _requestVacancyForm();
                _newsletterForm();
            }
        }
    }();

    // Инициализировать модуль
    document.addEventListener('DOMContentLoaded', function() {
        Request.init();
    });

<?php echo '</script'; ?>
>
<?php }
}
