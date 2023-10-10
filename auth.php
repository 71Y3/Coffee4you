<?php
session_start();
$login = $_POST['login'];
$password = $_POST['password'];
$_SESSION['auth'] = 'no_auth';
$_SESSION['auth_id'] = '99';
if (!$login || !$password) {
echo 'Введите Логин и пароль! <br>';
exit;
}
mysql_connect('localhost', 'root','');
mysql_query("SET CHARACTER SET cp1251");
mysql_query("SET NAMES cp1251");
mysql_SELECT_db('sait');

if (mysql_errno()) {
echo 'Ошибка: Не удалось установить соединение с базой данных.';
exit;
}
$result1=mysql_query(
"SELECT *
FROM users
WHERE login='$login' or email='$login' AND password='$password'");
$row = mysql_fetch_row($result1);

if ($row[0] <= 0)
{
echo '<h3>Логин и пароль неверны! </h3>
<script type="text/javascript">document.location.href = "registration.php"</script>';
exit;
}

if ($row[0]>0){
$result2=mysql_query(
"SELECT name
FROM users
WHERE login='$login' AND password='$password'");
$row2 = mysql_fetch_row($result2); 
echo '<h3>Добро пожаловать, '.$row[1].'!</h3>';
$_SESSION['auth'] = 'yes_auth'; 
$_SESSION['auth_id']=$row[0];
$_SESSION['auth_name']=$row[1];
$_SESSION['auth_email']=$row[2];
$_SESSION['auth_phone']=$row[3];
$_SESSION['auth_address']=$row[4];
$_SESSION['auth_login']=$row[5];
$_SESSION['auth_password']=$row[6];


$result3=mysql_query(
    "SELECT name
    FROM carts
    WHERE login='$login' AND password='$password'");

if ($_SESSION['auth'] = 'yes_auth')
{?>
    <script type="text/javascript">document.location.href = "index.php"</script>
<?php 
}else
{
    $_SESSION['auth'] = 'no_auth';
}    
}
?>