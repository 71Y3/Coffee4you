<?php
define('myeshop', true);
session_start();
include("container.php");


if ($_SESSION['auth'] == 'yes_auth')
{	
   include("db_connect.php");
   include("assets/function/functions.php");
 
   if ($_POST["save_submit"])
     {
        
    $_POST["info_name"] = clear_string($_POST["info_name"]);
    $_POST["info_address"] = clear_string($_POST["info_address"]);
    $_POST["info_phone"] = clear_string($_POST["info_phone"]);
    $_POST["info_email"] = clear_string($_POST["info_email"]);
    $_POST["info_login"] = clear_string($_POST["info_login"]);
    $_POST["info_password"] = clear_string($_POST["info_password"]);
              
    $error = array();
	
	if($_SESSION['auth_pass'] != $pass)
	{
		$error[]='Неверный текущий пароль!';
	}else
    {
        if(strlen($_POST["info_name"]) < 3 || strlen($_POST["info_name"]) > 15)
	{
		$error[]='Укажите Имя от 3 до 15 символов!';
	}
    
        if(!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i",trim($_POST["info_email"])))
	{
		$error[]='Укажите корректный email!';
	}
    
      if(strlen($_POST["info_phone"]) == "")
	{
		$error[]='Укажите номер телефона!';
	} 
    
      if(strlen($_POST["info_address"]) == "")
	{
		$error[]='Укажите адрес доставки!';
    }      

    if(strlen($_POST["info_login"]) == "")
	{
		$error[]='Укажите Логин!';
    }      
    
    if(strlen($_POST["info_password"]) == "")
	{
		$error[]='Укажите Пароль!';
	}        
    }
    
  if(count($error))
	{
		$_SESSION['msg'] = "<p align='left' id='form-error'>".implode('<br />',$error)."</p>";
	}else
    {
        $_SESSION['msg'] = "<p align='left' id='form-success'>Данные успешно сохранены!</p>";
           
        $dataquery = $newpassquery."name='".$_POST["info_name"]."',email='".$_POST["info_email"]."',phone='".$_POST["info_phone"]."',address='".$_POST["info_address"]."',login='".$_POST["info_login"]."',password='".$_POST["info_password"]."'";      
     
     $update = mysql_query("UPDATE users SET $dataquery WHERE login = '{$_SESSION['auth_login']}'");

      
    if ($newpass){ $_SESSION['auth_pass'] = $newpass; } 
    
    
    $_SESSION['auth_name'] = $_POST["info_name"];
    $_SESSION['auth_address'] = $_POST["info_address"];
    $_SESSION['auth_phone'] = $_POST["info_phone"];
    $_SESSION['auth_email'] = $_POST["info_email"]; 
    $_SESSION['auth_login'] = $_POST["info_login"];
    $_SESSION['auth_password'] = $_POST["info_password"];
        
    }
        
     }  
   
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=windows-1251" />
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="trackbar/trackbar.css" rel="stylesheet" type="text/css" />
    
    <script type="text/javascript" src="/js/jquery-1.8.2.min.js"></script> 
    <script type="text/javascript" src="/js/jcarousellite_1.0.1.js"></script> 
    <script type="text/javascript" src="js/shop-script.js"></script>
    <script type="text/javascript" src="/js/jquery.cookie.min.js"></script>
    <script type="text/javascript" src="/trackbar/jquery.trackbar.js"></script>
    <script type="text/javascript" src="/js/TextChange.js"></script>
    
	<title>Личный кабинет</title>
</head>
<body>
<div class="container">


<h3 class="title-h3" >Изменение профиля</h3>

<form method="post">

<ul id="info-profile">
<li>
<label for="info_login">Логин</label>
<span class="star">*</span>
<input type="text" name="info_login" id="info_name" value="<?php echo $_SESSION['auth_login']; ?>"  />
</li>

<li>
<label for="info_name">Имя</label>
<span class="star">*</span>
<input type="text" name="info_name" id="info_name" value="<?php echo $_SESSION['auth_name']; ?>"  />
</li>

<li>
<label for="info_email">E-mail</label>
<span class="star">*</span>
<input type="text" name="info_email" id="info_email" value="<?php echo $_SESSION['auth_email']; ?>" />
</li>

<li>
<label for="info_phone">Телефон</label>
<span class="star">*</span>
<input type="text" name="info_phone" id="info_phone" value="<?php echo $_SESSION['auth_phone']; ?>" />
</li>

<li>
<label for="info_address">Адрес доставки</label>
<span class="star">*</span>
<textarea name="info_address"  > <?php echo $_SESSION['auth_address']; ?> </textarea>
</li>

<li>
<label for="info_pass">Текущий пароль</label>
<span class="star">*</span>
<input type="text" name="info_pass" id="info_pass" value="" />
</li>

<li>
<label for="info_new_pass">Новый пароль</label>
<span class="star">*</span>
<input type="text" name="info_new_pass" id="info_new_pass" value="" />
</li>

</ul>

 <p align="right"><input type="submit" id="form_submit" name="save_submit" value="Сохранить" /></p>
</form>

</div>
</div>
</div>
</body>
</html>
<?php
};
?>