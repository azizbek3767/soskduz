{include file="header.tpl" activeItem="donationSubscribers" title="{subscribers:title}"}
<div class="content-frame" style="margin-bottom:10px;">
    <div class="content-frame-top">                        
        <div class="page-title"><h2>{subscribers:title}</h2></div>
    </div>
</div>
<div class="clear"></div>
<div class="row">
    <div class="col-md-2">
        <div class="alert alert-info" style="position: relative">
            <h3>{subscribers:totalProfit}</h3>
            <div style="font-size: 16px"><b>{$totalProfit} {subscribers:sum}</b></div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="alert alert-info" style="position: relative">
            <h3>{subscribers:monthProfit}</h3>
            <div style="font-size: 16px"><b>{$monthProfit} {subscribers:sum}</b></div>
        </div>
    </div>
    <div class="col-md-3 col-md-offset-5 text-right">
        <form method="get">
            <div class="input-group" style="display: flex">
                <input type="text" name="search" class="form-control" value="{if isset($search)}{$search}{/if}" placeholder="{subscribers:search}" autocomplete="off" aria-describedby="basic-addon2">
                <button type="submit" class="btn btn-primary" id="basic-addon2">{subscribers:search}</button>
            </div>
        </form>
    </div>
</div>

<div class="form-group main" style="margin-top: 15px">
    <form method="get">
        <div class="col-md-12">
            <div class="col-md-6">
                <div class="form-group" style="display: flex">
                    <select name="status" class="form-control select">
                        <option value="">{subscribers:status}</option>
                        <option value="active" {if isset($status) && $status == 'active'}selected{/if}>Active</option>
                        <option value="inactive" {if isset($status) && $status == 'inactive'}selected{/if}>Inactive</option>
                    </select>
                    <select name="amount" class="form-control select">
                        <option value="">{subscribers:amount}</option>
                        {foreach item=amount from=$filterAmounts}
                            <option value="{$amount.amount}" {if isset($requestAmount) && $requestAmount == $amount.amount}selected{/if}>{$amount.amount}</option>
                        {/foreach}
                    </select>
                </div>
            </div>
            <div class="col-md-6 date text-right">
                {html_select_date start_year=2023 month_format="%b" time=$dateStart|strtotime field_array="newDateStart" prefix="" class="form-control select"} &nbsp;-&nbsp;
                {html_select_date start_year=2023 month_format="%b" time=$dateEnd|strtotime field_array="newDateEnd" prefix="" class="form-control select"}
                <input class="btn btn-warning" type="submit" value="{stats:show}" />
            </div>
        </div>
    </form>
</div>

<div class="clear"></div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body panel-body-table">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-actions">
                        <thead>
                        <tr>
                            <th class="text-center">{subscribers:date}</th>
                            <th class="text-center">{subscribers:name}</th>
                            <th class="text-center">{subscribers:phone}</th>
                            <th class="text-center">{subscribers:email}</th>
                            <th class="text-center">{subscribers:cardId}</th>
                            <th class="text-center">{subscribers:amount}</th>
                            <th class="text-center">{subscribers:status}</th>
                            <th class="text-center"></th>
                        </tr>
                        </thead>
                        <tbody>
                        {if !empty($subscribers)}
                            {foreach item=subscriber from=$subscribers}
                                <tr class="">
                                    <td nowrap="nowrap">{$subscriber.subscription_date}</td>
                                    <td>{$subscriber.name}</td>
                                    <td>{$subscriber.phone}</td>
                                    <td>{$subscriber.email}</td>
                                    <td>{$subscriber.uzcard_id}</td>
                                    <td>{$subscriber.amount}</td>
                                    <td>
                                        {if ($subscriber.is_active)}
                                            <span style="color: #009688">active</span>
                                        {else}
                                            <span style="color: #f10000">inactive</span>
                                        {/if}
                                    </td>
                                    <td>
                                        {if ($subscriber.is_active)}
                                            <form method="POST">
                                                <input type="hidden" name="action" value="stopsubscription">
                                                <input type="hidden" name="id" value="{$subscriber.id}">
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('{subscribers:stopConfirm}')">{subscribers:stop}</button>
                                            </form>
                                        {/if}
                                    </td>
                                </tr>
                            {/foreach}
                            <tr>
                                <td colspan="8">
                                    <div class="pull-left">{general:results}</div>
                                    {if isset($pageNums.pages)}
                                        <ul class="pagination pagination-sm pull-right push-down-10 push-up-10">
                                            {foreach from=$pageNums.pages item=number}
                                                {if $number eq $page}
                                                    <li class="active"><a
                                                                href="donation.subscribers.php?page={$number}{if isset($search)}&search={$search}{/if}{if isset($status)}&status={$status}{/if}{if isset($amount)}&amount={$amount}{/if}"
                                                                class="pageNum">{$number}</a></li>
                                                {else}
                                                    <li><a href="donation.subscribers.php?page={$number}{if isset($search)}&search={$search}{/if}{if isset($status)}&status={$status}{/if}{if isset($amount)}&amount={$amount}{/if}" class="pageNum">{$number}</a></li>
                                                {/if}
                                            {/foreach}
                                        </ul>
                                    {/if}
                                </td>
                            </tr>
                        {else}
                            <tr class="odd"><td class="data none" colspan="8" align="center">- {general:none} -</td></tr>
                        {/if}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{include file="footer.tpl"}