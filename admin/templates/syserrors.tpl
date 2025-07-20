{include file="header.tpl" activeItem="$activeItem" title="$name"}
<div class="page-content-wrap">
	<div class="content-frame" style="margin-bottom:10px;">
		<div class="content-frame-top">
			<div class="content-frame-top">
				<div class="col-md-6 nopadding_left"><h2>{$name}</h2></div>
				<div class="col-md-6 nopadding_right"><a href="?act=clear_syserrors" class="pull-right btn btn-danger"><i class="far fa-fw fa-trash-alt"></i> Очистить лог</a></div>
			</div>
		</div>
	</div>
	<div class="col-md-12  about-help">   

    	<div class="panel panel-default">
        	<div class="panel-body panel-body-table">
            	<div class="table-responsive">
                	<table class="table table-bordered table-striped table-actions">
						<thead class="bg-light">
							<tr class="active">
								<th width="100%">Ошибка</th>
							</tr>
						</thead>
						{if !empty($error)}
						<tbody>
							{foreach from=$error item=e}
							<tr>
								<td>{$e}</td>
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