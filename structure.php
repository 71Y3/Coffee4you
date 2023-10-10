<?php
include("container.php");
include("db_connect.php");
include("function.php");

$cat = ($_GET["cat"]);
$type = ($_GET["type"]);

$orderby = ($_GET["orderby"]);


switch ($orderby)
{
    case 'price-asc';
    $orderby = 'new_price asc';
    $orderby_name = 'Цена: сначала дешевые';
    break;

    case 'price-desc';
    $orderby = 'new_price desc';
    $orderby_name = 'Цена: сначала дорогие';
    break;

    case 'popularity';
    $orderby = 'count';
    $orderby_name = 'Популярные';
    break;

    case 'date';
    $orderby = 'datetime';
    $orderby_name = 'Новинки';
    break;

    default:
    $orderby = 'count';
    $orderby_name = 'Ничего не выбрано';
    break;
}
?>

<div class="container_for_item">
<div class="head_title_about_company">Кофе</div>
<div id="block-content">
<div id="block-sorting">
<p id="nav-breadcrumbs"><a href="#" onclick="javascript:history.back(); return false; cursor: pointer;">Назад</a></p>
    <p id="nav-breadcrumbs"><a href="index.php">Главная страница</a> \ <span> Все товары </span></p>
<aside class="sidebar-container col-sm-3 col-sm-pull-9 sidebar-left area-sidebar-shop" role="complementary">
    <div class="sidebar-inner basel-sidebar-scroll">
        <div class="widget-area basel-sidebar-content">
            <div id="basel-woocommerce-sort-by-4" class="sidebar-widget basel-woocommerce-sort-by">
                <h3 class="widget-title">Сортировать</h3>
                    
                        <?php
                        echo'
                        <form class="woocommerce-ordering with-list" method="get">
                        <ul>
                        <li><a class="selected-order">'.$orderby_name.'</a></li>
                        <div class="order_main">
                        <li><a href="structure.php?cat='.$cat.'&type='.$type.'&orderby=popularity" >Популярные</a></li>
                        <li><a href="structure.php?cat='.$cat.'&type='.$type.'&orderby=date" >Новинки</a></li>
                        <li><a href="structure.php?cat='.$cat.'&type='.$type.'&orderby=price-asc" >Цена: сначала дешевые</a></li>
                        <li><a href="structure.php?cat='.$cat.'&type='.$type.'&orderby=price-desc" >Цена: сначала дорогие</a></li></ul>
                        </form> 
                        </div>
                        </div>';
                        ?>


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
                        <li class="wc-layered-nav-term "><a href="type.php?cat='.($row["type_product"]). '&type=' .$row["type"].'">' .$row["type_product"]. '</a></link>
                        ';
                        }
                        while ($row = mysql_fetch_array($result));
                    }
                    ?>
                    </div>
                    </div>
                    
                    <div id="basel-woocommerce-layered-nav-39" class="sidebar-widget basel-woocommerce-layered-nav"><h3 class="widget-title">Состав кофе</h3>
                    <li><a class="selected-order"><?php echo $cat;?></a></li>
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
                        <li class="wc-layered-nav-term "><a href="structure.php?cat='.($row1["structure"]). '&type=' .$row1["type"].'">' .$row1["structure"]. '</a></link>
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
                        <li class="wc-layered-nav-term "><a href="brand.php?cat='.($row2["brand"]). '&type=' .$row2["type"].'">' .$row2["brand"]. '</a></link>
                        ';
                        }
                        while ($row2 = mysql_fetch_array($result2));
                    }
                    ?>
                    </div>
                    </div> <div id="basel-woocommerce-layered-nav-39" class="sidebar-widget basel-woocommerce-layered-nav">
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
  
                                                                            </div>
                                                                        </div>							
                                                                    </div><!-- .widget-area -->
                                                            
        </div>
        </div>
        </div>
        </div>
        </div><!-- .sidebar-inner -->
         </aside>

<?php
$num = 9; // Здесь указываем сколько хотим выводить товаров.
$page = (int)$_GET['page'];              

$count = mysql_query("SELECT COUNT(*) FROM table_product");
$temp = mysql_fetch_array($count);


if ($temp[0] > 0) 
	{ 
	$tempcount = $temp[0];

	// Находим общее число страниц
    $total = (($tempcount - 1) / $num) + 1;
    
	$total =  intval($total);

	$page = intval($page);

    if(empty($page) or $page < 0) $page = 1;
    
       
	if($page > $total) $page = $total;
	 
	// Вычисляем начиная с какого номера
    // следует выводить товары 
	$start = $page * $num - $num;

    $qury_start_num = " LIMIT $start, $num"; 
    }
if(!empty($cat) && !empty($type))
{
    $querycat = "AND structure='$cat' AND category='$type'";
}else

{
if (!empty ($type))
{
    $querycat = "AND category='$type'";
}else
{
    $querycat = "";
}

}

$result1=mysql_query("SELECT * FROM table_product where visible='0' $querycat order by $orderby $qury_start_num");
echo mysql_error();

if (mysql_num_rows($result1) > 0)
{
$row=mysql_fetch_array($result1);
do
{
echo  '
<div class="container_for_product">
<div class="product_coffee">
<div class="product_coffee_sail">-'.$row["discount_procent"].'%</div>
<div class="product_coffee_photo"><a href="view_content.php?id='.$row["products_id"].'"> <img width="260" height="340" src="assets/upload_img/coffee/'.$row["image"].'"</div></a>
<div class="product_coffee_title">'.$row["title"].'</div>
<span class="old_price"><del>'.group_numerals($row["old_price"]).'Р</br></del></span>
<span class="new_price">'.group_numerals($row["new_price"]).'Р</span>
</div>
<button class="btn_add_of_basket" href="#">В корзину</button>
</div>
</div>';
}
while ($row=mysql_fetch_array($result1));  
}
if ($page != 1){ $pstr_prev = '<li><a class="pstr-prev" href="structure.php?cat='.$cat.'&type='.$type.'&page='.($page - 1).'">&lt;</a></li>';}
if ($page != $total) $pstr_next = '<li><a class="pstr-next" href="structure.php?cat='.$cat.'&type='.$type.'&page='.($page + 1).'">&gt;</a></li>';

// Формируем ссылки со страницами
if($page - 5 > 0) $page5left = '<li><a href=structure.php?cat='.$cat.'&type='.$type.'&page='.($page - 5).'">'.($page - 5).'</a></li>';
if($page - 4 > 0) $page4left = '<li><a href=structure.php?cat='.$cat.'&type='.$type.'&page='.($page - 4).'">'.($page - 4).'</a></li>';
if($page - 3 > 0) $page3left = '<li><a href=structure.php?cat='.$cat.'&type='.$type.'&page='.($page - 3).'">'.($page - 3).'</a></li>';
if($page - 2 > 0) $page2left = '<li><a href=structure.php?cat='.$cat.'&type='.$type.'&page='.($page - 2).'">'.($page - 2).'</a></li>';
if($page - 1 > 0) $page1left = '<li><a href=structure.php?cat='.$cat.'&type='.$type.'&page='.($page - 1).'">'.($page - 1).'</a></li>';

if($page + 5 <= $total) $page5right = '<li><a href="structure.php?cat='.$cat.'&type='.$type.'&page='.($page + 5).'">'.($page + 5).'</a></li>';
if($page + 4 <= $total) $page4right = '<li><a href="structure.php?cat='.$cat.'&type='.$type.'&page='.($page + 4).'">'.($page + 4).'</a></li>';
if($page + 3 <= $total) $page3right = '<li><a href="structure.php?cat='.$cat.'&type='.$type.'&page='.($page + 3).'">'.($page + 3).'</a></li>';
if($page + 2 <= $total) $page2right = '<li><a href="structure.php?cat='.$cat.'&type='.$type.'&page='.($page + 2).'">'.($page + 2).'</a></li>';
if($page + 1 <= $total) $page1right = '<li><a href="structure.php?cat='.$cat.'&type='.$type.'&page='.($page + 1).'">'.($page + 1).'</a></li>';


if ($page+5 < $total)
{
    $strtotal = '<li><p class="nav-point">...</p></li><li><a href="structure.php?cat='.$cat.'&type='.$type.'&page='.$total.'">'.$total.'</a></li>';
}else
{
    $strtotal = ""; 
}

if ($total > 1)
{
    echo '
    <div class="container_for_product">
    <div class="pstrnav">
    
    <ul>
    ';
    echo $pstr_prev.$page5left.$page4left.$page3left.$page2left.$page1left."<li><a class='pstr-active' href='structure.php?cat='.$cat.'&type='.$type.'&page=".$page."'>".$page."</a></li>".$page1right.$page2right.$page3right.$page4right.$page5right.$strtotal.$pstr_next;
    echo '
    </ul>
    </div>
    </div>
    ';
}
?>