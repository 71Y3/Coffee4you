<?php
session_start();
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$login = $_POST['login'];
$password = $_POST['password'];
$_SESSION['auth'] = 'no_auth';
$_SESSION['auth_id'] = '99';


if (mb_strlen($name) < 3 || mb_strlen($name) > 50)
{
    echo "Недопустимая длина имени!";
    exit;
}  else if (mb_strlen($email) < 5 || mb_strlen($email) > 50)
{
    echo "Недопустимая длина E-mail!";
    exit;  
}
else if (mb_strlen($phone) <= 10 || mb_strlen($phone) >= 13)
{
    echo "Недопустимая длина телефона!";
    exit;   
}
else if (mb_strlen($address) <= 5 || mb_strlen($address) >= 90)
{
    echo "Недопустимая длина адреса!";
    exit; 
} 
if(mb_strlen($login) < 5 || mb_strlen($login) > 90)
{
    echo "Недопустимая длина логина!";
    exit;
} 
else if (mb_strlen($password) < 6 || mb_strlen($password) > 50)
{
    echo "Недопустимая длина пароля! (от 6 до 50 символов)";
    exit;
} 

if (!$name || !$login || !$password )
{
    echo 'Вы ввели не все необходимые сведения! <br>';
    exit;
}

  mysql_connect('localhost', 'root', '');
  mysql_query("SET CHARACTER SET cp1251");
  mysql_query("SET NAMES cp1251");
  mysql_select_db('sait');

 if (mysql_errno())
{
   echo 'Ошибка: Не удалось установить соединение с базой данных.';
   exit;
}
$result=mysql_query("SELECT * FROM users where login='$login' and password='$password'");
$row = mysql_fetch_row($result);
 if ($row[0]>0)
 {
  echo '<h3>Такие логин и пароль уже существуют. Введите другие значения.</h3>';
  exit;
 }
 $result1=mysql_query("INSERT INTO users values(NULL, '$name', '$email', '$phone ', '$address', '$login' , SHA('$password'))");
 echo '<h3>Вы успешно зарегистрировались.</h3>';
 $_SESSION['auth'] = 'yes_auth';
 $_SESSION['auth_name']=$name;
 $_SESSION['auth_email']=$email;
 $_SESSION['auth_phone']=$phone;
 $_SESSION['auth_address']=$address;
 $_SESSION['auth_login']=$login;
 $_SESSION['auth_password']=$password;
 if ($_SESSION['auth'] = 'yes_auth')
 {?>
     <script type="text/javascript">document.location.href = "index.php"</script>
 <?php 
 }else
 {
     $_SESSION['auth'] = 'no_auth';
 }    
?>
