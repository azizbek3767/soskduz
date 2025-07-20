{php}
//<?
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if ($url = dbQuery('articles',DB_VALUE,array('fields'=>'url','where'=>"oldUrl = '$actual_link'"))) {
	header("Location: $url", true, 301);
} elseif($url = dbQuery('sections',DB_VALUE,array('fields'=>'url','where'=>"oldUrl = '$actual_link'"))) {
	header("Location: $url", true, 301);
}
{/php}
{include file="header.tpl" title="HTTP 404 Not found" keywords="HTTP 404 Not found" description="HTTP 404 Not found"}

<div class="wrapper-404">

	<div class="container">

		<div class="img-content"><img src="{$THEME_URL}/img/404.jpg"></div>

		<div class="desc-content"><h1>{$LANG.page_not_found}</h1></div>
		<div class="link-back">
			<h2>Вы можете начать с <a href="{$SITE_URL}">Главной страницы</a></h2>
		</div>
	</div>

</div>







{include file="footer.tpl"}