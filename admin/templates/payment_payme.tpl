<div class="col-md-6 nopadding_left">
    <div class="form-group">
	    <label class="field_name">ID Поставщика (MERCHANT_ID)</label>
        <input class="form-control" type="text" name="payment[settings][merchant]" value="{$payment.settings.merchant}">
    </div>
    
</div>
<div class="col-md-6 nopadding_right">
    <div class="form-group">
        <label class="field_name">Mode</label>
        <select class="form-control select" name="payment[settings][mode]">
            <option value="live" {if $payment.settings.mode eq 'live'}selected{/if}>Real payments</option>
            <option value="sandbox" {if $payment.settings.mode eq 'sandbox'}selected{/if}>Sandbox mode</option>
        </select>
    </div> 
</div>

{*
<div class="col-md-6 nopadding_right">
    <div class="form-group">
	    <label class="field_name">ID Пользователя Поставщика (MERCHANT_USER_ID)</label>
        <input class="form-control" type="text" name="payment[settings][clickuz_merchant_user_id]" value="{$payment.settings.clickuz_merchant_user_id}">
    </div>
</div>
*}
