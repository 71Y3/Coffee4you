<?php
session_start();
include("container.php");
$data=$_POST;

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap&subset=cyrillic" rel="stylesheet">
  
  <link rel="stylesheet" href="assets\css\normalize.css">
  <link rel="stylesheet" href="assets\css\fonts.css">
   <link rel="stylesheet" href="assets\css\style.css" />
 
	<title>Форма регистрации и авторизации</title>
</head>
<body>
	<div class="container_form_registration">
	<div class="personal__account">Личный кабинет</div>
	<div class="title_reg_auth">Форма регистрации</div>
			<div class="row">
			<div class="col1">	
			<form action="check.php" method="post">
				<input type="text" class="form-control"  name="name"
				id="name" placeholder="Введите имя">
				<input type="text" class="form-control"  name="email"
				id="email" placeholder="Введите E-mail">
				<input type="text" class="form-control"  name="phone"
				id="phone" placeholder="Введите номер телефона">
				<input type="text" class="form-control"  name="address"
				id="address" placeholder="Введите адресс">
				<input type="text" class="form-control"  name="login"
				id="login" placeholder="Введите логин">
				<input type="text" class="form-control"  name="password"
				id="password" placeholder="Введите пароль">
				
				<button class="btn__reg">Зарегистрироваться</button>
			</form>
	</div>
	</div>
	<div class="col">
	<div class="title_reg_auth">Форма авторизации</div>
			<form action="auth.php" method="post">
				<input type="text" class="form-control"  name="login"
				id="login" placeholder="Введите логин">
				<input type="text" class="form-control"  name="password"
				id="password" placeholder="Введите пароль">
				<button class="btn__auth">Войти</button>
	</div>
</div>
</div>
</body>
</html>
