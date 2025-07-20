<div class="col-md-6 nopadding_left">
    <div class="form-group">
	    <label class="field_name">ID Поставщика (MERCHANT_ID)</label>
        <input class="form-control" type="text" name="payment[settings][merchant_id]" value="{$payment.settings.merchant_id}">
    </div>
</div>
<div class="col-md-6 nopadding_right">
    <div class="form-group">
	    <label class="field_name">ID Пользователя Поставщика (MERCHANT_USER_ID)</label>
        <input class="form-control" type="text" name="payment[settings][merchant_user_id]" value="{$payment.settings.merchant_user_id}">
    </div>
</div>
<div class="col-md-6 nopadding_left">
    <div class="form-group">
	    <label class="field_name">ID сервиса поставщика (SERVICE_ID)</label>
        <input class="form-control" type="text" name="payment[settings][service_id]" value="{$payment.settings.service_id}">
    </div>
</div>
<div class="col-md-6 nopadding_right">
    <div class="form-group">
	    <label class="field_name">Секретный ключ (SECRET_KEY)</label>
        <input class="form-control" type="text" name="payment[settings][secret_key]" value="{$payment.settings.secret_key}">
    </div>
</div>