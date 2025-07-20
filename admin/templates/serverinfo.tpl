{include file="header.tpl" activeItem="$activeItem" title="$name"}
<div class="page-content-wrap">
	<div class="content-frame" style="margin-bottom:10px;">
		<div class="content-frame-top">
			<div class="col-md-6 nopadding_left"><h2>{$name}</h2></div>
		</div>
	</div>
	<div class="col-md-12  about-help">
		<div class="panel panel-default">
			<div class="panel-body panel-body-table">
				<div class="table-responsive">
					<table class="table table-bordered table-striped table-actions">
						<thead class="bg-light">
							<tr class="active">
								<th>Параметр</th>
								<th>Значение</th>
							</tr>
						</thead>
						<tbody>
							<tr> <td class="w-25" nowrap="nowrap">Версия PHP:</td> <td>{$data1['php']}</td> </tr>
							<tr> <td nowrap="nowrap">Версия Zend:</td> <td>{$data1['zend']}</td> </tr>
							<tr> <td nowrap="nowrap">Версия MySQL:</td> <td>{$data1['mysql']}</td> </tr>
							<tr> <td nowrap="nowrap">Версия Life Style CMS:</td> <td>{$data1['lscms']}</td> </tr>
							<tr> <td nowrap="nowrap">WebServer:</td> <td>{$data1['ws']}</td> </tr>
							<tr> <td nowrap="nowrap">Имя сервера:</td> <td>{$data1['sn']}</td> </tr>
							<tr> <td nowrap="nowrap">Адрес сервера:</td> <td>{$data1['sa']}</td> </tr>
							<tr> <td nowrap="nowrap">Протокол сервера:</td> <td>{$data1['sp']}</td> </tr>
							<tr> <td nowrap="nowrap">Операционная система:</td> <td>{$data1['os']}</td> </tr>
							<tr> <td nowrap="nowrap">Операционная система (build):</td> <td>{$data1['uname']}</td> </tr>
							<tr> <td nowrap="nowrap">Лимит памяти:</td> <td>{$data1['ml']}</td> </tr>
							<tr> <td nowrap="nowrap">Максимальный размер файлов для загрузки:</td> <td>{$data1['mfs']}</td> </tr>
							<tr> <td nowrap="nowrap">Максимальный размер постинга:</td> <td>{$data1['mps']}</td> </tr>
							<tr> <td nowrap="nowrap">Максимально допустимое время исполнения скрипта:</td> <td>{$data1['met']} секунд</td> </tr>
							<tr> <td nowrap="nowrap">Корневая директория сайта:</td> <td>{$data1['docroot']}</td> </tr>
							{if !empty($data1['apache_ver'])}
								<tr nowrap="nowrap"> <td>Apache версия:</td> <td>{$data1['apache_ver']}</td> </tr>
							{/if}
							{if !empty($data1['apache_mods'])}
								<tr> <td nowrap="nowrap">Apache модули:</td> <td>{foreach from=$data1['apache_mods'] item=mods}<span class="badge badge-light">{$mods}</span> {/foreach}</td> </tr>
							{/if}
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="card" style="margin-top: 20px">
			<div class="panel panel-default" style="margin-top: 20px">
				<div class="panel-heading"><h3>Предопределённые переменные сервера</h3></div>
				<div class="panel-body panel-body-table">

					<div class="table-responsive">
						<table class="table table-bordered table-striped table-actions">
							<thead class="bg-light">
								<tr class="active">
									<th>Параметр</th>
									<th>Значение</th>
								</tr>
							</thead>
							<tbody>
							{foreach from=$data2 item=svar}
								<tr>
									<td class="w-25">$_SERVER['{$svar['var']}']</td>
									<td class="col-sm-8 text-break {if $svar['value'] == "not found"}text-muted{/if}">{$svar['value']}</td>
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