{include file="header.tpl" activeItem="orders" title="{orders:title}"}
<div class="page-content-wrap">
    {if isset($messages.saved)}<span id="savedMessage" onclick="noty({ text: '{orders:messages:0}', layout: 'topRight', type: 'success', timeout: 1500 });"></span>{/if}
	
	<script>
    $(document).ready(function () {
      {if isset($messages.saved)} $('#savedMessage').click();{/if}
    });
    function deleteOrderMessage(){ noty({ text: '{orders:messages:1}',layout: 'topRight',type: 'success', timeout: 1500 }) }     
  
  </script>
  
{if isset($action.edit)}	

	<div class="content-frame" style="margin-bottom:10px;">
        <div class="content-frame-top">
            <div class="col-md-4"><h2>{orders:invoce} #{$order.id}</h2></div> 
            <div class="col-md-4 content-frame-body-left">
                <div id="ajaxStatus"> </div> 
            </div>                              
        </div>
    </div>
    
	<div class="row">
        <div class="col-md-12">
            <form action="orders.php" method="post" id="brand">
			    <input type="hidden" name="order[id]" value="{$order.id}"/>
                <input type="hidden" name="action[save]" value="1"/>
                <div class="panel panel-default">
                    <div class="panel-body">                            
                        {*<div class="push-down-10 pull-right"><button class="btn btn-default"><span class="fa fa-print"></span> Print</button></div> *}
                        <div class="invoice">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="invoice-address">
                                        <h5>Продавец</h5>
                                        <h6>{$config.company_name}</h6>
                                        <p>Адрес: {$config.address}</p>
                                        <p>Телефон: {$config.phone}</p>
                                        <p>Email: {$config.email}</p>
                                    </div>
                                </div>
                
                                <div class="col-md-4">
                                    <div class="invoice-address">
                                        <h5>Заказчик</h5>
                                        <h6>{$order.user_name}</h6>
                                        <p>Email: <a href="mailto:{$order.email}">{$order.email}</a></p>
                                        <p>Телефон: {$order.phone}</p>
                                    </div>                                        
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="invoice-address">
                                        <h5>Заказ</h5>
                                        <table class="table table-striped">
                                            <tr><td width="200">Номер заказа:</td><td class="text-right">#{$order.id}</td></tr>
                                            <tr><td>Дата заказа:</td><td class="text-right">{$order.created|date_format:"%e.%m.%Y %H:%M"}</td></tr>
                                            <tr><td><strong>Итого:</strong></td><td class="text-right"><strong>{if $order.amount ne 0}{$order.amount}{/if}</strong></td></tr>
                                        </table>
                                    </div>                                        
                                </div>
                            </div>
                            {if  isset($order.product)}
                            <div class="table-invoice">
                                <table class="table">
                                    <tr>
                                        <th>Артикул</th>
                                        <th>Наименование товара</th>
                                        <th class="text-center">Цена за товар</th>
                                        <th class="text-center">Кол-во</th>
                                        <th class="text-center">Итого за товар</th>
                                    </tr>
                                    {foreach from=$order.product item=orderProduct}
                                    <tr>
                                        <td>{$orderProduct.articul} </td>
                                        <td>{$orderProduct.title} </td>
                                        <td class="text-center">{$orderProduct.price}</td>
                                        <td class="text-center">{$orderProduct.amount}</td>
                                        <td class="text-center">{$orderProduct.count_price}</td>
                                    </tr>
                                    {/foreach}
                                </table>
                            </div>
                            {/if}
                            <div class="row">
                                
                                <div class="col-md-6">
                                    {if isset($order.message)}
                                    <h4>Комментарий к заказу</h4>
                                    <p>{$order.message nofilter}</p>
                                    {/if}
                                </div>
                
                                <div class="col-md-6">
                                    <h4>Сумма к оплате</h4>
                                    <table class="table table-striped">
                                        <tr class="total"><td>Общая сумма:</td><td class="text-right">{if $order.amount ne 0}{$order.amount}{/if}</td></tr>
                                    </table>  
                                    <div class="form-group">
                                        {orders:status}
                                        <select class="form-control select" name="order[state]">
                                            <option value="1" {if $order.state eq 1}selected{/if}>Не обработаный</option>
                                            <option value="2" {if $order.state eq 2}selected{/if}>Обработаный</option>
                                            <option value="3" {if $order.state eq 3}selected{/if}>Отмененный</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
              
                            <div class="row">
                                <div class="col-md-12"> 
                                    <div class="pull-right push-down-20">
                                        <input class="btn btn-primary" type="submit" name="action[save]" value="&nbsp; Изменить статус заказа &nbsp;" />
                                        <a class="btn btn-primary" href="orders.php">Вернуться к списку</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>


{else}

	<div class="content-frame" style="margin-bottom:10px;">
        <div class="content-frame-top">
    	    <div class="col-md-12 nopadding"><h2>{brands:title}</h2></div>
	    </div>
	</div>
	
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body panel-body-table">
				<div class="table-responsive">
					<table class="table table-striped table-actions table-hover" id="orders">
                        <thead>
                            <tr>
                                <th class="">Дата </th>
                                <th class="">{orders:general}</th>
                                <th class="" width="100%">Покупатель </th>
                                <th class="" width="100%">Сумма </th>
                                <th class="" width="100%">Статус </th>
								<th class="">{general:action}</th>
                            </tr>
                        </thead>
                        {if isset($orders)}
                        <tbody>
                            {foreach item=order from=$orders name=orders}
							<tr id="order-{$order.id}">
                                <td class="" nowrap="nowrap">{$order.created|date_format:"%e.%m.%Y %H:%M"}</td>
								<td class="text-center">{$order.id}</td>
								<td class="" width="100%">{$order.user_name nofilter}</td>
								<td class="" nowrap="nowrap">{if $order.amount ne 0}{$order.amount}{/if}</td>
                                <td class=""  nowrap="nowrap">
                                    {if $order.state eq 1}
                                        <span style="color: red">Не обработаный</span>
                                    {elseif $order.state eq 2}
                                        <span style="color: green">Обработаный</span>
                                    {elseif $order.state eq 3}
                                        <span style="color: #030aff">Отмененный</span>
                                    {/if}
                                </td>
								<td class="btn-link-action text-center">
								    <a class="btn btn-rounded" href="orders.php?action[edit]=true&order[id]={$order.id}"><span class="fa fa-pen"></span></a>
									<button class="btn btn-danger btn-rounded" onclick="deleteOrder({$order.id}, '{$order.id}');"><span class="fa fa-trash"></span></button>
								</td>
							</tr>
							{/foreach}
				        </tbody>
                        <tfoot>
                            <tr>
                                <td align="right" colspan="6">
                                    <div class="pull-left">{general:results}</div>
                                    {if isset($pageNums.pages)}             
                                    <ul class="pagination pagination-sm pull-right push-down-10 push-up-10">
                                    {foreach from=$pageNums.pages item=number}
                                        {if $number eq $page}
                                        <li class="active"><a href="orders.php?page={$number}">{$number}</a></li>
                                        {elseif $number eq '...'}
                                            ...
                                        {else}
                                        <li><a href="orders.php?page={$number}">{$number}</a></li>
                                        {/if}
                                    {/foreach}
                                    </ul>  
                                    {/if}
                                </td>
                            </tr>
                        </tfoot>
                        {else}
                        <tbody><tr class="odd"><td class="data none" colspan="7" align="center">- {general:none} -</td></tr></tbody>
                        {/if}       
                    </table>
                </div>                                
            </div>
		</div> 	
	</div>

{/if}
</div>
{include file="footer.tpl"} 