<div class="col-md-4 nopadding_left">
    <div class="form-group">
        <label class="field_name">Merchant email</label>
        <input class="form-control" autocomplete="off" id="alias" type="text" name="payment[settings][merchant]" value="{$payment.settings.merchant}" />
    </div> 
</div>
<div class="col-md-4">
    <div class="form-group">
        <label class="field_name">Mode</label>
        <select class="form-control select" name="payment[settings][mode]">
            <option value="live" {if $payment.settings.mode eq 'live'}selected{/if}>Real payments</option>
            <option value="sandbox" {if $payment.settings.mode eq 'sandbox'}selected{/if}>Sandbox mode</option>
        </select>

    </div> 
</div>
<div class="col-md-4 nopadding_right">
    <div class="form-group">
        <label class="field_name">Валюта</label>
        <select class="form-control select" name="payment[settings][currency]">

            <option value="CZK" {if $payment.settings.currency eq 'USD'}selected{/if}>Czech koruna</option>
            <option value="USD" {if $payment.settings.currency eq 'USD'}selected{/if}>United States dollar</option>
            <option value="EUR" {if $payment.settings.currency eq 'EUR'}selected{/if}>Euro</option>
            <option value="RUB" {if $payment.settings.currency eq 'RUB'}selected{/if}>Russian ruble</option>
        </select>

    </div> 
</div>