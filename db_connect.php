<?php
 mysql_connect('localhost', 'root','');
 mysql_query("SET CHARACTER SET UTF-8");
 mysql_query("SET NAMES UTF-8");
 mysql_SELECT_db('sait');


 if (mysql_errno()) {
     echo 'Eror with BD.';
     exit;
 }
 session_start();
 ?>