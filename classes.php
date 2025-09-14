<?php
$con = new mysqli("localhost", "root", "", "dndsite");
if($con === false)
	die("Ошибка :".mysqli_connect_error());
mysqli_set_charset($con, 'utf8');

$catalogArray = mysqli_fetch_all($con->query("SELECT * FROM `classes`"), MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="dnd">
	<meta name="descriptoin" content="dnd_info">
	<link rel="stylesheet" type="text/css" href="main.css">
	<link type="images/png" rel="icon" href="images/logo.png">
	<title>Классы / Fortis Fortunae</title>
</head>
<body>
	<header>
		<div class="head">
			<p>Fortis Fortunae</p>
		</div>
	</header>
	<main>
		<div class="buttons">
			<a href="index.php"><button class="button2"><p>Назад</p></button></a>
		</div>
		<div class="placeholder">
			<?
                $sql = mysqli_query($con, "SELECT * FROM classes ORDER BY id");
                $rows = mysqli_fetch_assoc($sql);   //массив-запрос
                do {//цикл
            ?>
            		<? echo "<a href='classinfo.php?id=".$rows['id']."'>"?><div class="place" style="background-image: url(<?=$rows['image']?>);"><p><?=$rows['name']?></p></div></a>
            		<style type="text/css">
            			.place{
            				display: inline-block;
							margin-left: 25px;
							padding-top: 10px;
							margin-bottom: 30px;
							width: 240px;
							height: 180px;
							background-repeat: no-repeat;
    						background-size: cover;
							border-radius: 15px;
						}
            		</style>
            <?
                }
                while($rows = mysqli_fetch_assoc($sql));  //проверка условия
                mysqli_close($con);
            ?>
		</div>
	</main>
	<footer>
	</footer>
</body>
</html>