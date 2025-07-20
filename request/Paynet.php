<?php
    include_once('../includes/visitor.inc.php');
    include_once('../includes/Payment.php');

class Paynet
{
    public function form($order_id)
	{
		if (!$order_id) {
            return null;
        }

        return '<div class="row"><div class="col-lg-12" style="display: flex; justify-content: center; align-items: center"><a href="https://paynet.page.link/qbvQ"><img width="250" style="margin: 10px;" src="/themes/app/img/play_market.png" alt=""></a><a href="https://paynet.page.link/g576"><img style="margin: 20px" width="200" src="/themes/app/img/app_store.svg" alt=""></a></div></div>';
	}
}