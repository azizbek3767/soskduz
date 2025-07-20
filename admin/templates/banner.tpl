{include file="header.tpl" activeItem="banner" title="Баннер"}
<form action="" method="post" enctype="multipart/form-data">
	<table cellspacing="0" cellpadding="0" width="100%" background="images/mid-nav-bg.gif" bgcolor="#F5F5F5" class="main">
		<tr>
			<td background="images/mid-nav-lbg.gif" width="6"><table cellpadding="0" cellspacing="0" width="6"><tr><td></td></tr></table></td>
			<td width="100%" height="26">
				<table width="100%" cellpadding="5">
					<tr><td><table cellpadding="0" cellspacing="0" width="100%"><tr><td height="16" align="center">Ваши баннера</td></tr></table>
				</table>
			</td>
			<td background="images/mid-nav-rbg.gif" width="6"><table cellpadding="0" cellspacing="0" width="6"><tr><td></td></tr></table></td>
		</tr>
	</table>

	<table cellspacing="0" cellpadding="20" width="100%" border="1">
	 	<tr>
			<td align="center" valign="middle" class="data">
				{if $add_success}
					<font color="Green">{$add_success_top}</font><br><br>
					<font color="Green">{$add_success_left}</font><br><br>
					<font color="Green">{$add_success_right}</font><br><br>
					Пожалуйста перейдите по следующей ссылке <a href="./banner.php">обновить баннера</a>,<br>а затем нажмите кнопку "F5".<br><br>
				{/if}
				{if $err_no_files}<font color="red">{$err_no_files}</font><br><br>{/if}
			</td>
		</tr>
        <tr>
			<td align="center" valign="middle" class="data">
				{if $err_jpg_top}<font color="red">{$err_jpg_top}</font><br><br>{/if}
				{if $err_file_top}<font color="red">{$err_file_top}</font><br><br>{/if}
				<b>Верхний:</b><br><br>
				<img src="{$GLOBAL_URL}{$LOGO_DIR}banner_top.jpg" width="470" height="62" alt="">
				<br><br>
				Заменить Верхний баннер (470x62):<br><br>
				<input type="file" name="top" /><br><br>
			</td>
		</tr>
		<tr>
			<td align="center" valign="middle" class="data">
				{if $err_jpg_left}<font color="red">{$err_jpg_left}</font><br><br>{/if}
				{if $err_file_left}<font color="red">{$err_file_left}</font><br><br>{/if}
				<b>Левый:</b><br><br>
				<img src="{$GLOBAL_URL}{$LOGO_DIR}banner_left.jpg" width="250" height="300" alt="">
				<br><br>
				Заменить Левый баннер (250x300):<br><br>
				<input type="file" name="left" /><br><br>
			</td>
		</tr>
		<tr>
			<td align="center" valign="middle" class="data">
				{if $err_jpg_right}<font color="red">{$err_jpg_right}</font><br><br>{/if}
				{if $err_file_right}<font color="red">{$err_file_right}</font><br><br>{/if}
				<b>Правый:</b><br><br>
				<img src="{$GLOBAL_URL}{$LOGO_DIR}banner_right.jpg" width="250" height="300" alt="">
				<br><br>
				Заменить Правый баннер (250x300):<br><br>
				<input type="file" name="right" /><br><br>
			</td>
		</tr>
		<tr>
			<td align="center" valign="middle" class="data">
				Заменить Баннера:<br><br>
				<input type="hidden" name="action" value="add">
				<input type="submit" value="Заменить">
			</td>
		</tr>
	</table>
</form>

{include file="footer.tpl"}