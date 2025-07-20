{include file="header.tpl" activeItem="$activeItem" title="$name"}
<div class="page-content-wrap">
	<div class="content-frame" style="margin-bottom:10px;">
		<div class="content-frame-top">
			<div class="col-md-6 nopadding_left"><h2>{$name}</h2></div>
			<div class="col-md-6 nopadding_right"><a href="?act=clear_lowerrors" class="pull-right btn btn-danger"><i class="far fa-fw fa-trash-alt"></i> Очистить лог</a></div>
		</div>
	</div>
	<div class="col-md-12  about-help">
		<div class="panel panel-default">
			<div class="panel-body panel-body-table">
				<div class="table-responsive">
					<table class="table table-striped table-actions table-hover">
						<thead class="bg-light">
							<tr class="active">
								<th width="10%">Дата</th>
								<th width="12%">Тип ошибки </th>
								<th width="3%" class="text-center">№</th>
								<th width="75%">Ошибка</th>
							</tr>
						</thead>
						{if !empty($error)}
						<tbody>
							{foreach from=$error item=e}
							<tr>
								<td class="small align-middle">{$e[0]} </td>
								<td class="align-middle" nowrap="nowrap">{$e[3]} | {$e[8]}</td>
								<td class="text-center align-middle">{$e[4]}</td>
								<td class="align-middle">
									<b class="small">Файл:</b> {$e[7]} <b class="small">Строка:</b> {$e[6]}
									<br /><mark class="my-1">{$e[5]}</mark>
									<span class="small text-gray">IP: <b class="text-info">{$e[1]}</b> URI: <b>{$e[2]}</b></span>
								</td>
							</tr>
							{/foreach}
						</tbody>
						{else}
						<tbody>
							<tr>
								<td colspan="4" class="text-center">В Логе нет записей.</td>
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