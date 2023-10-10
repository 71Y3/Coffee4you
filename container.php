<?php
include("db_connect.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Coffee4you - Интернет-магазин Кофе</title>
    <meta name="description" content="Coffee4you - Интернет-магазин Кофе" />
    <meta name="keywords" content="Кофе" />
  
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap&subset=cyrillic" rel="stylesheet">
 <link rel="stylesheet" href="assets\css\normalize.css">
 <link rel="stylesheet" href="assets\css\fonts.css">
  <link rel="stylesheet" href="assets\css\style.css" />
  <script type="text/javascript" src="shop_script.js"></script>
  
  </head>
  <body>
        <header class="header">
                <div class="header__top">
                    <div class="header__contact">
                        <div class="container">
                        <a class="header__email" href="#">Coffee4you@gmail.com</a>
                            <nav class="menu-top-right">
                                <ul>
                                  <li><a class="a" href="information_about_delivery.php" >Информация о доставке</a></li>
                                  <li><a class="a" href="about_company.php">О компании</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                    <div class="header__mid">
                        <div class="container">
                            <div class="header__logo">
                                <a href="index.php"><img width = "170px" src="assets\img\logo.png" alt="" /></a>
                                <div class="header_mid_right">
                                <a class="block_for_basket" href="cart.php" >Корзина</a>
                                            <?php
                                            if ($_SESSION['auth'] == 'yes_auth')
                                            {
                                            echo '<a class="header__authorization" href="profile.php">Здравствуйте, '.$_SESSION['auth_name'].'!</a>'; 
                                            echo '<a class="header__logout" href="logout.php">Выход</a>';       
                                            }
                                            else if ($_SESSION['auth'] == 'no_auth')
                                            {
                                            echo '<a class="header__authorization" href="registration.php">Войти/регистрация</a>';    
                                            }
                                            ?>
                                        </nav>
                                    </div>
                            </div> 
                            <div class="container">
                            <div class="search-extended">
                                <form method="GET" action="search.php?q=">
                                  <div>
                                   <input type="text" class="search-field" name="q" placeholder="Поиск товаров"> 
                                   <button type="submit" id="searchsubmit" value="Поиск"></button> 
                                 </div>
                               </form> 
                             </div> 
                             <div class="container">
                                    <ul>
                                      <li class="dropdown">
                                        <input type="checkbox" />
                                        <a href="#" id="title_for_dropdown" data-toggle="dropdown">Каталог товаров</a>
                                        <ul class="dropdown-menu">
                                          <li><a href="http://localhost/sait/item.php?orderby=popularity"><img class="img_menu" width = "40px"  src="assets\fonts\coffee-beans.svg"  alt="" />Кофе</a></li>
                                          <li><a href="#"><img class="img_menu" width = "40px"  src="assets\fonts\tea-bags.svg"  alt="" />Чай</a></li>
                                          <li><a href="#"><img class="img_menu" width = "40px"  src="assets\fonts\cupcake.svg"  alt="" />Сладости</a></li>
                                          <li><a href="#"><img class="img_menu" width = "40px"  src="assets\fonts\coffee-machine.svg"  alt="" />Кофемашины</a></li>
                                          <li><a href="#"><img class="img_menu" width = "40px"  src="assets\fonts\coffee-pot.svg"  alt="" />Кофеварки</a></li>
                                          <li><a href="#"><img class="img_menu" width = "40px"  src="assets\fonts\coffee-grinder.svg"  alt="" />Кофемокли</a></li>
                                        </ul>
                                      </li>
                                    </ul>
                                  </div>
                                </div> 
                                </header>                                  
                                </div>
                                <section>                              
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <meta http-equiv="content-type" content="text/html; charset=windows-1251" />
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="trackbar/trackbar.css" rel="stylesheet" type="text/css" />
    
    <script type="text/javascript" src="/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/js/jcarousellite_1.0.1.js"></script> 
    <script src="shop_script.js"></script>
    <script type="text/javascript" src="/js/jquery.cookie.min.js"></script>
    <script type="text/javascript" src="assets/js/trackbar/jquery.trackbar.js"></script>
    
    <script type="text/javascript" src="jquery.form.js"></script>
    <script type="text/javascript" src="jquery.validate.js"></script>  
    <script type="text/javascript" src="TextChange.js"></script>  
</body>
</html>