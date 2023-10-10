<?php
include("container.php");
include("db_connect.php");
include("function.php");
$id = ($_GET["id"]);
$title = ($_GET["title"]);

?>
<div class="container_for_item">
<div class="head_title_about_company">Кофе</div>
<div id="block-content">
<div id="block-sorting">
<p id="nav-breadcrumbs"><a href="#" onclick="javascript:history.back(); return false; cursor: pointer;">Назад</a></p>
    <p id="nav-breadcrumbs"><a href="index.php">Главная страница</a> \ <span> <?php echo $title;?> </span></p>
<div id="block-sorting">
<p id="nav-breadcrumbs">

<?php
$result1=mysql_query("SELECT * FROM table_product WHERE products_id='$id' and visible='0'");
echo mysql_error();
if (mysql_num_rows($result1)>0)
{
$row1=mysql_fetch_array($result1);
do
{
echo'
<div class="block-content-information_1">
    <div class"block-content-info">
    <div class="img-content-information"><img width="380" height="460" src="assets/upload_img/coffee/'.$row1["image"].'" /></div>
        <div class ="block-mini-description">
            <div class="content-title-mini-description">'.$row1["title"].'</div>
            <div class="content-old_price-mini-description"><s>' .group_numerals($row1["old_price"]). ' Р </s></div>
            <div class="content-new_price-mini-description">' .group_numerals($row1["new_price"]). ' Р</div>
            <div class="content-description-mini-description">' .$row1["description"]. '</div>
            <div class="quantity"> <input type="button" value="-" class="minus"> <label class="screen-reader-text" for="quantity_5e0af3667fa26">Количество</label> <input type="number" id="quantity_5e0af3667fa26" class="input-text qty text" step="1" min="1" name="quantity" value="1" title="Кол-во" size="4" pattern="[0-9]*" inputmode="numeric" aria-labelledby="Количество Кофе Lavazza Gran Crema Espresso в чалдах 150 шт."> <input type="button" value="+" class="plus"> </div>
            <button class="btn_add_of_basket_for_description" href="#">В корзину</button>
        </div>
        
    </div>

    <div class="container_for_product">
    <div class="content-title-for-main-description">Характеристика</div>
    <div class="container-main-description">
        <table class="table-main-description"> 
            <tr><th>Тип</th>
            <td><p>'.$row1["type_product"].'</p> </td> </tr>   

            <tr><th>Производитель</th>
            <td><p>'.$row1["brand"].'</p> </td> </tr> 

            <tr><th>Упаковка</th>
            <td><p>'.$row1["packaging"].'</p> </td> </tr> 

            <tr><th>Обжарка</th>
            <td><p>'.$row1["roasters"].'</p> </td> </tr> 

            <tr><th>Состав кофе</th>
            <td><p>'.$row1["structure"].'</p> </td> </tr> 

            <tr><th>Страна</th>
            <td><p>'.$row1["country"].'</p> </td> </tr> 

            <tr><th>Содержание арабики  </th>
            <td><p>'.$row1["arabika_procent"].' %</p> </td> </tr> 
         </table> 
         </div>
         </div>
         </div>
</div>';
}
while ($row1 = mysql_fetch_array($result1));
}
?>
</div>
</div>
</div>