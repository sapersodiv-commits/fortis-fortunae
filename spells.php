<?php
$con = new mysqli("localhost", "root", "", "dndsite");
if($con === false)
	die("Ошибка :".mysqli_connect_error());
mysqli_set_charset($con, 'utf8');

$catalogArray = mysqli_fetch_all($con->query("SELECT * FROM `spells`"), MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="dnd">
	<meta name="descriptoin" content="dnd_info">
	<link rel="stylesheet" type="text/css" href="spell.css">
	<link type="images/png" rel="icon" href="images/logo.png">
	<title>Заклинания / Fortis Fortunae</title>
</head>
<body>
	<header>
		<div class="head">
			<p>Fortis Fortunae</p>
		</div>
	</header>
	<main>
		<div class="buttons">
			<a href="index.php"><button class="button3"><p>Назад</p></button></a>
		</div>
		<div class="searchbar">
			<input type="text" id="place" name="searchBar" placeholder="Поиск">
		</div>
		<div class="placeholder">
			<?
                $sql = mysqli_query($con, "SELECT * FROM spells ORDER BY id");
                $rows = mysqli_fetch_assoc($sql);   //массив-запрос
                do {//цикл
            ?>
            		<? echo "<a class='spell' href='spellinfo.php?id=".$rows['id']."'>"?><div class="place"><p>[ <?=$rows['level']?> ] <?=$rows['name']?></p></div></a>
            		<style type="text/css">
            			.place{
            				display: inline-block;
							margin-left: 25px;
							padding-top: 10px;
							padding-left: 10px;
							padding-bottom: 5px;
							margin-bottom: 10px;
							width: 320px;
							height: 20px;
							border-radius: 15px;
							border-bottom: 1px solid white;
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
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<script src="search.js"></script>
</body>
</html>