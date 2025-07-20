<div class="col-md-6 nopadding_left">
    <div class="form-group">
	    <label class="field_name">ID Поставщика (VENDOR_ID)</label>
        <input class="form-control" type="text" name="payment[settings][vendor_id]" value="{$payment.settings.vendor_id}">
    </div>
</div>
<div class="col-md-6 nopadding_right">
    <div class="form-group">
        <label class="field_name">Секретный ключ (SECRET_KEY)</label>
        <input class="form-control" type="text" name="payment[settings][secret_key]" value="{$payment.settings.secret_key}">
    </div>
</div>
<div class="col-md-6 nopadding_left">
    <div class="form-group">
	    <label class="field_name">Callback URL (RETURN_URL)</label>
        <input class="form-control" type="text" name="payment[settings][return_url]" value="{$payment.settings.return_url}">
    </div>
</div>