<!DOCTYPE html>
<html lang="ru">
<head>
  <title>Сайт временно заблокирован!</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<link rel="shortcut icon" href="{$GLOBAL_URL}/maintenance/img/favicon/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" href="{$GLOBAL_URL}/maintenance/img/favicon/apple-touch-icon.png">
	<link rel="stylesheet" href="{$GLOBAL_URL}/maintenance/css/main.css">
	
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<div id="page">
		<header id="header"></header>
		<main>
			<div class="blank-content">
				<div class="bg-shadow"></div>
				<div class="container"><div class="content">{$config.maintenance_message nofilter}</div></div>
			</div>
		</main>
		<footer id="footer" class="text-center-sm"></footer>
	</div>
</body>

</html>