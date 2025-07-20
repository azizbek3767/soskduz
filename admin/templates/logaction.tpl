{include file="header.tpl" activeItem="$activeItem" title="$name"}
<div class="page-content-wrap">
	<div class="content-frame" style="margin-bottom:10px;">
		<div class="content-frame-top">
			<div class="col-md-6 nopadding_left"><h2>{$name}</h2></div>
			<div class="col-md-6 nopadding_right"><a href="?act=clear_logaction" class="pull-right btn btn-danger"><i class="far fa-fw fa-trash-alt"></i> Очистить лог</a></div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body panel-body-table">
				<div class="table-responsive">
					<table class="table table-striped table-actions table-hover">
						<thead class="bg-light">
							<tr class="active">
								<th width="11%">Дата</th>
								<th width="9%" class="text-center">Тип события </th>
								<th width="10%" class="text-center">Пользователь</th>
								<th width="72%">Запись</th>
							</tr>
						</thead>
						{if !empty($datalog)}
						<tbody>
							{foreach from=$datalog item=r}
							<tr>
								<td class="small align-middle" nowrap="nowrap">{$r.date_log}<div class="small text-info">{if !empty($r.user_ip)}{$r.user_ip}{/if}</div></td>
								<td class="text-center align-middle"><span class="badge badge-{if $r.type_log eq "error"}danger{elseif $r.type_log eq "info"}info{else}light{/if}">{$r.type_log}</span></td>
								<td class="text-center align-middle">
									{if $r.userId ne 0}
										<span class="badge badge-light">{$r.loginName}</span>
									{else}
										<span class="badge badge-light">Гость</span>
									{/if}
								</td>
								<td class="align-middle" nowrap="nowrap">
									<mark>{$r.message}</mark>
								</td>
							</tr>
							{/foreach}
						</tbody>
							<tfoot>
							<tr>
								<td colspan="4">
									<div class="pull-left">{general:results}</div>
									{if isset($pageNums.pages)}
										<ul class="pagination pagination-sm pull-right push-down-10 push-up-10">
											{foreach from=$pageNums.pages item=number}
												{if $number eq $page}
													<li class="active"><a href="logaction.php?page={$number}">{$number}</a></li>
												{elseif $number eq '...'}
													...
												{else}
													<li><a href="logaction.php?page={$number}">{$number}</a></li>
												{/if}
											{/foreach}
										</ul>
									{/if}
								</td>
							</tr>
							</tfoot>
						{else}
						<tbody>
							<tr>
								<td colspan="4" class="text-center">Лог не содержит записей</td>
							</tr>
						</tbody>
						{/if}
					</table>
				</div>
			</div>
		</div>
	</div>	
</div>
{include file="footer.tpl"}