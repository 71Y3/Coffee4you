<?php
include("db_connect.php")

?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Coffie4you - Интернет-магазин Кофе</title>
    <meta name="description" content="Coffie4you - Интернет-магазин Кофе" />
    <meta name="keywords" content="Кофе" />
  </head>
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap&subset=cyrillic" rel="stylesheet">
  
 <link rel="stylesheet" href="assets\css\normalize.css">
 <link rel="stylesheet" href="assets\css\fonts.css">
  <link rel="stylesheet" href="assets\css\style.css" /> 
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
                                            echo '<a class="header__authorization" href="registration.php">Здравствуйте, '.$_SESSION['auth_name'].'!</a>'; 
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
                                </div>
                                <section>
                                  <div class="container">
                                  <div class="slider__mid">
                                    <input checked type="radio" name="respond" id="desktop">
                                      <article id="slider">
                                          <input checked type="radio" href="#" name="slider" id="switch1">
                                          <input type="radio" href="#" name="slider" id="switch2">
                                          <input type="radio" name="slider" id="switch3">
                                        <div id="slides">
                                          <div id="overflow">
                                            <div class="image">
                                              <article ><a href="#"><img src="assets\img\22424710.jpg"></a></article>
                                              <article><a href="#"><img src="assets\img\svezhkof.jpg"></a></article>
                                              <article><a href="#"><img src="assets\img\wmf-sale.jpg"></a></article>
                                            </div>
                                          </div>
                                        </div>
                                        <div id="controls">
                                          <label for="switch1"></label>
                                          <label for="switch2"></label>
                                          <label for="switch3"></label>
                                        </div>
                                        <div id="active">
                                          <label for="switch1"></label>
                                          <label for="switch2"></label>
                                          <label for="switch3"></label>
                                        </div>
                                      </article>
                                 
                                  <div class="image__mid">
                                    <a href="#" ><img width = "263px" src="assets\img\banner_02-office.jpg"> </a>
                                    <button class="btn_image_mid" href="#">Оставить отзыв</button>
                                  </div>
                                  <div class="image_mid_right">
                                    <div class="image_right">
                                    <a href="#"><img width = "275px" src="assets\img\banner_03-rent_06.jpg"></a>
                                  </div>
                                    <a href="#"><img width = "275px" src="assets\img\banner_04-free_delivery.jpg"></a>
                                  </div>
                                  </div>
                                </div>
                              </section> 

                              <section class="about">
                                <div class="container">
                                    <div class="about__top">
                                        <div class="about__title-box">
                                            <div class="about-title">
                                                Интересно
                                            </div>
                                            
                                    <div class="about__items">
                                        <div class="about__item">
                                            <img src="assets\img\about_1.jpg" alt="">
                                            <div class="about__item-title">
                                            Зеленый чай убивает рак
                                            </div>
                                        
                                        <div class="about__item-text">
                                        -
                                        </div>
                                        <div class="about__item-btn">
                                            <a class="about__item-link" href="#">Подробнее</a>
                                        </div>
                                    </div>
                                    <div class="about__item">
                                            <img src="assets\img\about_2.jpg" alt="">
                                            <div class="about__item-title">
                                            Кофейные рецепты
                                            </div>
                                        
                                        <div class="about__item-text">
                                        Существует огромное множество способов приготовления кофе. Рецепты отличаются как кардинально, так и незаметными (для обычного человека) нюансами, за которые настоящие ценители готовы идти войной.
                                        </div>
                                        <div class="about__item-btn">
                                            <a class="about__item-link" href="#">Подробнее</a>
                                        </div>
                                    </div>
                                    <div class="about__item">
                                            <img src="assets\img\about_3.jpg" alt="">
                                            <div class="about__item-title">
                                            История кофе
                                            </div>
                                        
                                        <div class="about__item-text">
                                        Кофе – один из древнейших и популярнейших напитков на земле. Практически каждый народ хранит свою историю знакомства с ним, однако о точном происхождении кофейных...
                                        </div>
                                        <div class="about__item-btn">
                                            <a class="about__item-link" href="#">Подробнее</a>
                                        </div>
                                    </div>
                                    
                                  </div>
                                </div>
                                </div>
                                <div class="about-title_bottom">О нас</div>
                                <div class="about__item-text_bottom">
                                Добро пожаловать в Coffee4you! Здесь, в одном месте, собраны лучшие сокровища стран и континентов. Мы внимательно отбираем оригинальную продукцию со всего мира, чтобы эти дары, насыщенные солнцем, ветром, традициями и непревзойденным колоритом разных миров стали частью вашего стола!</p> <p>Мы предлагаем вашему вниманию лучший, насыщенный кофе, обладающий непревзойденным ароматом, натуральные чаи, особый, изысканный шоколад и другие дополнения к вкуснейшему времяпрепровождению.</p> <p>Доступные цены, высокое качество, широкий ассортимент – это далеко не все, что вы получите, начав сотрудничество с нами!</p> <p>Мы продаем настроение романтики, счастья, спокойствия и гармонии! Мы дарим вам общее самочувствие безмятежности и радости, которое вы получаете, когда пробуете натуральную, качественную, свежую продукцию от производителя.
                                </div>
                            </section>

                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                   <!-- <footer class="footer-container">
                                   <div class="container_main-footer">
                                    <div class="text_custom">Coffee4you - кофейный маркет. Мы продаем только проверенный кофе.<br><br></div>
                                      <div class="footer_about_items">
                                        <div class="footer_about__item">
                                                </div>
                                              </div> 
                                            </div>
                                          </div>
                                                </footer>   -->

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