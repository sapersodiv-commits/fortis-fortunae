<?php
$con = new mysqli("localhost", "root", "", "dndsite");
if($con === false)
	die("Ошибка :".mysqli_connect_error());
mysqli_set_charset($con, 'utf8');
$sql = "SELECT * FROM `spells` WHERE `id` = ".$_GET['id'];
$rows = mysqli_fetch_all($con->query($sql), MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="dnd">
	<meta name="descriptoin" content="dnd_info">
	<link rel="stylesheet" type="text/css" href="spellinfo.css">
	<link type="images/png" rel="icon" href="images/logo.png">
	<title><?foreach ($rows as $value){?><?=$value['name']?><?}?> / Заклинания / Fortis Fortunae</title>
</head>
<body>
	<header>
		<div class="head">
			<p>Fortis Fortunae</p>
		</div>
	</header>
	<main>
		<div class="buttons">
			<a href="spells.php"><button class="button7"><p>Назад</p></button></a>
		</div>
			<div class="tabs_body">
				<div class="tabs_content"><div class="tabs_content1">
					<?foreach ($rows as $value){?>
						<h1><?=$value['name']?></h1>
						<p><?=$value['level']?> уровень, <?=$value['type']?></p>
						<p><b>Время накладывания:</b> <?=$value['ap']?></p>
						<p><b>Дистанция:</b> <?=$value['distance']?></p>
						<p><b>Компоненты:</b> <?=$value['components']?></p>
						<p><b>Длительность:</b> <?=$value['time']?></p><br>
						<p><?=$value['description']?></p>
					<?}?>
				</div></div>
			</div>
	</main>
	<footer>
	</footer>
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<script src="rules.js"></script>
</body>
</html>