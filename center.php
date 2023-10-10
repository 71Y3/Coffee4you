<div class="container_for_item">
<div class="head_title_about_company">Корзина</div>
<div id="block-content">
<div id="block-sorting">
<p id="nav-breadcrumbs"><a href="#" onclick="javascript:history.back(); return false; cursor: pointer;">Назад</a></p>
    <p id="nav-breadcrumbs"><a href="index.php">Главная страница</a> \ <span>Корзина</span></p>
<aside class="sidebar-container col-sm-3 col-sm-pull-9 sidebar-left area-sidebar-shop" role="complementary">
    <div class="sidebar-inner basel-sidebar-scroll">
        <div class="widget-area basel-sidebar-content">
            <div id="basel-woocommerce-sort-by-4" class="sidebar-widget basel-woocommerce-sort-by">
                <h3 class="widget-title">Сортировать</h3>
                    
                    <form class="woocommerce-ordering with-list" method="get">
                      <ul>
                        <li><a class="selected-order"><?php echo $orderby_name;?></a></li>
                        <div class="order_main">
                        <li><a href="item.php?orderby=popularity">Популярные</a></li>
                        <li><a href="item.php?orderby=date">Новинки</a></li>
                        <li><a href="item.php?orderby=price-asc">Цена: сначала дешевые</a></li>
                        <li><a href="item.php?orderby=price-desc">Цена: сначала дорогие</a></li></ul>
                        </div>
                    </form>
                    </div>


                    <div id="basel-woocommerce-layered-nav-34" class="sidebar-widget basel-woocommerce-layered-nav"><h3 class="widget-title">Тип</h3>
                    <div class="order_main">
                    <?php
                    $result = mysql_query("SELECT * FROM category where type='coffee'");
                    echo mysql_error();
                    if (mysql_num_rows($result)>0)
                    {
                        $row=mysql_fetch_array($result);
                        do
                        {
                        echo '
                        <li class="wc-layered-nav-term "><a href="type.php?cat='.strtolower($row["type_product"]). '&type=' .$row["type"].'">' .$row["type_product"]. '</a></link>
                        ';
                        }
                        while ($row = mysql_fetch_array($result));
                    }
                    ?>
                    </div>
                    </div>

                    <div id="basel-woocommerce-layered-nav-39" class="sidebar-widget basel-woocommerce-layered-nav"><h3 class="widget-title">Состав кофе</h3>
                    <div class="order_main">
                    <?php
                     $result1 = mysql_query("SELECT * FROM structure where type='coffee'");
                     echo mysql_error();
                     if (mysql_num_rows($result1)>0)
                     {
                         $row1=mysql_fetch_array($result1);
                         do
                         {
                         echo '
                         <li class="wc-layered-nav-term "><a href="structure.php?cat='.strtolower($row1["structure"]). '&type=' .$row1["type"].'">' .$row1["structure"]. '</a></link>
                         ';
                         }
                         while ($row1 = mysql_fetch_array($result1));
                     }
                    ?>
                </div>
                </div> 
                <div id="basel-woocommerce-layered-nav-39" class="sidebar-widget basel-woocommerce-layered-nav"><h3 class="widget-title">Производитель</h3>
                <div class="order_main">
                    <?php
                    $result2 = mysql_query("SELECT * FROM brand where type='coffee'");
                    echo mysql_error();
                    if (mysql_num_rows($result2)>0)
                    {
                        $row2=mysql_fetch_array($result2);
                        do
                        {
                        echo '
                        <li class="wc-layered-nav-term "><a href="brand.php?cat='.strtolower($row2["brand"]). '&type=' .$row2["type"].'">' .$row2["brand"]. '</a></link>
                        ';
                        }
                        while ($row2 = mysql_fetch_array($result2));
                    }
                    ?>
                    </div>
                    </div>
                    <div id="basel-woocommerce-layered-nav-39" class="sidebar-widget basel-woocommerce-layered-nav">
                    <h3 class="widget-title">Поиск по параметрам <br><br>Тип</h3>
                    <form method="GET" action="search_filter.php">
                    <ul class="checkbox-type" >
                    <?php
                    $result = mysql_query("SELECT * FROM category WHERE type='coffee'");
                    echo mysql_error();
                    if (mysql_num_rows($result)>0)
                    {
                        $row=mysql_fetch_array($result);
                        do
                        {
                    echo '  <li><input type="checkbox" name="type_product[]" value="'.$row["id"].'" id="check_type'.$row["id"].'" />
                            <label for="check_type'.$row["id"].'"> '.$row["type_product"].'</label></li>';
                        }
                        while ($row = mysql_fetch_array($result));
                    }
                    ?>
                    <div id="basel-woocommerce-layered-nav-39" class="sidebar-widget basel-woocommerce-layered-nav"><h3 class="widget-title">Состав кофе</h3>
                    <?php
                    $result = mysql_query("SELECT * FROM structure WHERE type='coffee'");
                    echo mysql_error();
                    if (mysql_num_rows($result)>0)
                    {
                        $row=mysql_fetch_array($result);
                        do
                        {
                    echo '  <li><input type="checkbox" name="structure[]" value="'.$row["id"].'" id="check_structure'.$row["id"].'" />
                            <label for="check_structure'.$row["id"].'"> '.$row["structure"].'</label></li>';
                        }
                        while ($row = mysql_fetch_array($result));
                    }
                    ?>
                    <div id="basel-woocommerce-layered-nav-39" class="sidebar-widget basel-woocommerce-layered-nav"><h3 class="widget-title">Производитель</h3>
                    <?php
                    $result = mysql_query("SELECT * FROM brand WHERE type='coffee'");
                    echo mysql_error();
                    if (mysql_num_rows($result)>0)
                    {
                        $row=mysql_fetch_array($result);
                        do
                        {
                    echo '  <li><input type="checkbox" name="brand[]" value="'.$row["id"].'" id="check_brand'.$row["id"].'" />
                            <label for="check_brand'.$row["id"].'"> '.$row["brand"].'</label></li>';
                        }
                        while ($row = mysql_fetch_array($result));
                    }
                    ?>
                    </ul>
                    <input class="btn_submit" href="search-filter.php" type="submit" name="submit" id="button-param-search" value="Выбрать" />
                </form> 
                    <ul>
                    </div> 
                </div>
            </div>							
        </div>
                                                            
        </div>
        </div>
        </div>
        </div>
        </div>
         </aside>