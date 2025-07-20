{include file="header.tpl" activeItem="$activeItem" title="$name"}
<div class="page-content-wrap">
	<div class="content-frame" style="margin-bottom:10px;">
		<div class="content-frame-top">
			<div class="col-md-6 nopadding_left"><h2>{$name}</h2></div>
		</div>
	</div>
	<div class="col-md-12  about-help">
		<div class="card">
			<div class="panel panel-default">
				<div class="panel-body panel-body-table">
					<div class="table-responsive">
						<table class="table table-bordered table-striped table-actions">
							<thead class="bg-light">
								<tr class="active">
									<th>Параметр</th>
									<th>Локальное значение</th>
									<th class="d-none d-lg-table-cell">Значение на сервере</th>
									<th class="d-none d-sm-table-cell">Разрешения</th>
								</tr>
							</thead>
							<tbody>
							{foreach from=$inivars item=inival key=ininame}
								<tr{if $inival['local_value'] != $inival['global_value']} class="success"{/if}>
									<td class="" nowrap="nowrap">{$ininame}</td>
									<td class="{if $inival['local_value'] != $inival['global_value']} text-success font-weight-bold{/if} text-break">
										{$inival['local_value']|htmlspecialchars}{if $inival['local_value'] != $inival['global_value']}
											<small><br />{if trim($inival['global_value']) != ""}{$inival['global_value']}{else}пустое значение{/if}</small>{/if}
									</td>
									<td class="w-25 d-none d-lg-table-cell text-break">{$inival['global_value']|htmlspecialchars}</td>
									<td class="d-none d-sm-table-cell" nowrap="nowrap">
										{if $inival['access'] == 1}
											Через пользовательские скрипты
										{elseif $inival['access'] == 2 || $inival['access'] == 6}
											<code>.htaccess</code>, <code>php.ini</code> или <code>httpd.conf</code>
										{elseif $inival['access'] == 4}
											<code>php.ini</code> или <code>httpd.conf</code>
										{elseif $inival['access'] == 7}
											<span class="text-primary">Полный доступ</span>
										{else}
											{$inival['access']}
										{/if}
									</td>
								</tr>
							{/foreach}
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>

{include file="footer.tpl"}