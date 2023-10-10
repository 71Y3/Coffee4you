$(document).ready(function() {
    $('.btn_add_of_basket,.btn_add_of_basket_for_description,.block-basket').click(function(){
                  
     var  tid = $(this).attr("tid");
    
     $.ajax({
      type: "POST",
      url: "addtocart.php",
      data: "id="+tid,
      dataType: "html",
      cache: false,
      success: function(data) { 
      loadcart();
      }
    });
    
    });
    
    function loadcart(){
         $.ajax({
      type: "POST",
      url: "loadcart.php",
      dataType: "html",
      cache: false,
      success: function(data) {
        
      if (data == "0")
      {
      
        $(".block-basket > a").html("Корзина пуста");
      
      }else
      {
        $(".block-basket > a").html(data);
    
      }  
        
          }
    });    
           
    }
    
    
     function fun_group_price(intprice) {  
        // Группировка цифр по разрядам
      var result_total = String(intprice);
      var lenstr = result_total.length;
      
        switch(lenstr) {
      case 4: {
      groupprice = result_total.substring(0,1)+" "+result_total.substring(1,4);
        break;
      }
      case 5: {
      groupprice = result_total.substring(0,2)+" "+result_total.substring(2,5);
        break;
      }
      case 6: {
      groupprice = result_total.substring(0,3)+" "+result_total.substring(3,6); 
        break;
      }
      case 7: {
      groupprice = result_total.substring(0,1)+" "+result_total.substring(1,4)+" "+result_total.substring(4,7); 
        break;
      }
      default: {
      groupprice = result_total;  
      }
    }  
        return groupprice;
        }
    
    
    
    $('.count-minus').click(function(){
    
      var iid = $(this).attr("iid");      
     
     $.ajax({
      type: "POST",
      url: "/include/count-minus.php",
      data: "id="+iid,
      dataType: "html",
      cache: false,
      success: function(data) {   
      $("#input-id"+iid).val(data);  
      loadcart();
      
      // переменная с ценной продукта
      var priceproduct = $("#tovar"+iid+" > p").attr("price"); 
      // Цену умножаем на колличество
      result_total = Number(priceproduct) * Number(data);
     
      $("#tovar"+iid+" > p").html(fun_group_price(result_total)+" руб");
      $("#tovar"+iid+" > h5 > .span-count").html(data);
      
      itog_price();
          }
    });
      
    });
    
    $('.count-plus').click(function(){
    
      var iid = $(this).attr("iid");      
      
     $.ajax({
      type: "POST",
      url: "/include/count-plus.php",
      data: "id="+iid,
      dataType: "html",
      cache: false,
      success: function(data) {   
      $("#input-id"+iid).val(data);  
      loadcart();
      
      // переменная с ценной продукта
      var priceproduct = $("#tovar"+iid+" > p").attr("price"); 
      // Цену умножаем на колличество
      result_total = Number(priceproduct) * Number(data);
     
      $("#tovar"+iid+" > p").html(fun_group_price(result_total)+" руб");
      $("#tovar"+iid+" > h5 > .span-count").html(data);
      
      itog_price();
          }
    });
      
    });
    
     $('.count-input').keypress(function(e){
        
     if(e.keyCode==13){
         
     var iid = $(this).attr("iid");
     var incount = $("#input-id"+iid).val();        
     
     $.ajax({
      type: "POST",
      url: "/include/count-input.php",
      data: "id="+iid+"&count="+incount,
      dataType: "html",
      cache: false,
      success: function(data) {
      $("#input-id"+iid).val(data);  
      loadcart();
        
      // переменная с ценной продукта
      var priceproduct = $("#tovar"+iid+" > p").attr("price"); 
      // Цену умножаем на колличество
      result_total = Number(priceproduct) * Number(data);
    
    
      $("#tovar"+iid+" > p").html(fun_group_price(result_total)+" руб");
      $("#tovar"+iid+" > h5 > .span-count").html(data);
      itog_price();
    
          }
    }); 
      }
    });
    
    function  itog_price(){
     
     $.ajax({
      type: "POST",
      url: "/include/itog_price.php",
      dataType: "html",
      cache: false,
      success: function(data) {
    
      $(".itog-price > strong").html(data);
    
    }
    }); 
           
    }
    
    
    $('#button-send-review').click(function(){
                    
       var name = $("#name_review").val();
       var good = $("#good_review").val();
       var bad = $("#bad_review").val();
       var comment = $("#comment_review").val();
       var iid = $("#button-send-review").attr("iid");
    
        if (name != "")
         {
              name_review = '1';
              $("#name_review").css("borderColor","#DBDBDB");
          }else {
               name_review = '0';
               $("#name_review").css("borderColor","#FDB6B6");
          }
                      
        if (good != "")
           {
              good_review = '1';
              $("#good_review").css("borderColor","#DBDBDB");
          }else {
              good_review = '0';
              $("#good_review").css("borderColor","#FDB6B6");
          }
                
        if (bad != "")
         {
              bad_review = '1';
              $("#bad_review").css("borderColor","#DBDBDB");
         }else {
              bad_review = '0';
              $("#bad_review").css("borderColor","#FDB6B6");
         } 
                                             
                
                // Глобальная проверка и отправка отзыва
                
        if ( name_review == '1' && good_review == '1' && bad_review == '1')
          {
             $("#button-send-review").hide();
             $("#reload-img").show();
                      
          $.ajax({
             type: "POST",
             url: "/include/add_review.php",
             data: "id="+iid+"&name="+name+"&good="+good+"&bad="+bad+"&comment="+comment,
             dataType: "html",
             cache: false,
             success: function() {
             setTimeout("$.fancybox.close()", 1000);
             }
             });  
             }         
    });
    
    $('#likegood').click(function(){
              
     var tid = $(this).attr("tid");
     
     $.ajax({
      type: "POST",
      url: "/include/like.php",
      data: "id="+tid,
      dataType: "html",
      cache: false,
      success: function(data) {  
      
      if (data == 'no')
      {
        alert('Вы уже голосовали!');
      }  
       else
       {
        $("#likegoodcount").html(data);
       }
    
    }
    });
    });
    
    });