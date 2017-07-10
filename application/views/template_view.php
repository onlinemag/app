<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 3.0 License

Name       : Accumen
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20120712

Modified by VitalySwipe
-->
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>Тестовое задание Light It</title>
		<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />
		<link href="http://fonts.googleapis.com/css?family=Kreon" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="/css/style.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		
	</head>
	<body>
		<div id="wrapper">
			<div id="header">
				
			</div>
			<div id="page">
				<?
				session_start();
				if (isset($_SESSION['id'])) 
				{
				?>
				<div id="sidebar">
					<div class="side-box">
					<!--
						Информация о пользователе
						-->
						<h3>Пользователь</h3>
						<ul class="list">
							<?
							echo '<li><img width="100%" src="' . $userInfo['picture'] . '" />'; echo "</li>";
							echo "<li class='first '>Социальный ID пользователя: " . $userInfo['id'] . '</li>';
							echo "<li>Имя пользователя: " . $userInfo['name'] . '</li>';
							echo "<li>Email: " . $userInfo['email'] . '</li>';
							?>	
							<form action='/' method="get">
							<input type='hidden' name='con' value='Message'>
							<input type="submit" name='out' value="Вийти">
							</form> 
						</ul>
					</div>
				</div><?
				}
				?>
				<div id="content">
					<div class="box">
					<!--
						Выводим содержимое страниц
						-->
						<?php include 'application/views/'.$content_view; ?>
						
					</div>
					<br class="clearfix" />
				</div>
				<br class="clearfix" />
			</div>
			<div id="page-bottom">
				<div id="page-bottom-sidebar">
				<!--
						Информация о разработчике
						-->
					<h3>Разработчик</h3>
					<ul class="list">
						<li class="first">Грабко Алексей</li>
						<li>телефон: +38(068)4069548</li>
						<li class="last">email: aleksejjgrabk@ukr.net</li>
					</ul>
				</div>
				<br class="clearfix" />
			</div>
		</div>
		<div id="footer">
			<a href="/">LIGHT IT</a> &copy; 2017</a>
		</div>
	</body>
</html>