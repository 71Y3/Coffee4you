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
<p id="nav-breadcrumbs"><a href="item.php?orderby=popularity">Все товары</a> \ <span>Поиск по параметрам </span></p>
<aside class="sidebar-container col-sm-3 col-sm-pull-9 sidebar-left area-sidebar-shop" role="complementary">
    <div class="sidebar-inner basel-sidebar-scroll">
        <div class="widget-area basel-sidebar-content">
            <div id="basel-woocommerce-sort-by-4" class="sidebar-widget basel-woocommerce-sort-by">
                    <div id="basel-woocommerce-layered-nav-34" class="sidebar-widget basel-woocommerce-layered-nav"><h3 class="widget-title">Тип</h3>
                    <?php
                    $result = mysql_query("SELECT category.id,category.type_product FROM category where type='coffee' ");
                    echo $cat;
                    echo $type;
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
                    
                    <div id="basel-woocommerce-layered-nav-39" class="sidebar-widget basel-woocommerce-layered-nav"><h3 class="widget-title">Состав кофе</h3>
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


                <div href= "type" id="basel-woocommerce-layered-nav-39" class="sidebar-widget basel-woocommerce-layered-nav"><h3 class="widget-title">Производитель</h3>
                    <?php
                    $result2 = mysql_query("SELECT * FROM brand where type='coffee'");
                    echo mysql_error();
                    if (mysql_num_rows($result2)>0)
                    {
                        $row2=mysql_fetch_array($result2);
                        do
                        {
                        echo '
                        <li class="wc-layered-nav-term "><a href="brand.php?cat='.strtolower($row2["brand"]). '&type=' .$row2["type"].'">' .$row2["brand"]. '</a></link>';
                        
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
                    </div>                                           
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
if ($_GET["type_product"]) 
{ 
$check_type_product = implode(',',$_GET["type_product"]); 
} 
if ($_GET["structure"]) 
{ 
$check_structure = implode(',',$_GET["structure"]); 
} 
if ($_GET["brand"]) 
{ 
$check_brand = implode(',',$_GET["brand"]); 
} 

if (!empty($check_type_product) or !empty($check_structure) or !empty($check_brand))
{ 
    if (!empty($check_type_product)) $query_type_product = "AND type_product_id IN ($check_type_product)";
    if (!empty($check_structure)) $query_structure = "AND structure_id IN ($check_structure)"; 
    if (!empty($check_brand)) $query_brand = "AND brand_id IN ($check_brand)"; 
} 

$result1=mysql_query("SELECT * FROM table_product WHERE visible='0' $query_type_product $query_structure $query_brand order by $orderby");
echo mysql_error();

if (mysql_num_rows($result1) == 0)
 {
  echo '<div class="container_for_product">
  <h2><br><br><br><center>Товары не найдены.</h2>
  </div>
  </div>';
  exit;
 }
if (mysql_num_rows($result1) > 0)
{
$row=mysql_fetch_array($result1);
do
{
echo  '
<div class="container_for_product">
<div class="product_coffee">
<div class="product_coffee_sail">'.$row["discount_procent"].'%</div>
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
?>
