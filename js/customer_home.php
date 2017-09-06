<script>
    $(document).ready(function(){
        var getUrl = window.location;
        var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
        var lang = "<?php echo $this->session->userdata('lang'); ?>";
        if(lang=="en"){
          var title = "Title";
          var price = "Price";
          var author = "Author";
          var image = "Image";
          var choose = "Choose";
        }
        if(lang=="ru"){
          var title = "Заглавие";
          var price = "Цена";
          var author = "Автор";
          var image = "Обложка";
          var choose = "Выбирать";
        }
         $(".cat").click(function(){
            var cat = $(this).attr('id');
         $.ajax({
              url:baseUrl+"/customer/get_books",
               type:"post",
               dataType:"json",
               data:{cat:cat},
                success:function(data){ 
                    
                    if(data.length>0){
                    $('#books').html("");
                    $('#books').append("<table id='tb'></table>");
                    $("#tb").append("<tr id='th'></tr>");
                    $('#tb').children(0).append("<td>"+title+"</td><td>"+price+"</td><td>"+author+"</td><td>"+image+"</td><td>"+choose+"</td>");
                    for(var j=0;j<data.length;j++){
                        $("#tb").append("<tr id="+data[j]['id']+"></tr>");
                        $('#tb').children().eq(j+1).append("<td id='title'>"+data[j]['title_'+lang]+"</td><td id='price'>"+data[j]['price']+"</td><td id='author'>"+data[j]['author_'+lang]+"</td><td id='image'><img src="+baseUrl+"/"+data[j]['image']+"></td><td><img class='cart' src="+baseUrl+"/img/buy.png></td>");
                    }
                    }
                    else{
                        $('#books').html("");
                        $('#books').append("Տվյալ կատեգորիայի գրքեր չկան:");
                    }
                    $(".cart").click(function(){
                        $(this).attr("src",baseUrl+"/img/buyed.jpg");
                        var id = $(this).closest("tr").attr('id');
                        var title = $(this).closest("tr").children().eq(0).text();
                        var price = $(this).closest("tr").children().eq(1).text();
                        var author = $(this).closest("tr").children().eq(2).text();
                        $.ajax({
                        url:baseUrl+"/index.php/customer/add_to_cart",
                        type:"post",
                        data:{id:id,title:title,price:price,author:author},
                        })
                    })
       }
        });
         })
         $("#search").click(function(){

            var keyword = $("#keyword").val();
         $.ajax({
              url:baseUrl+"/index.php/customer/search_books",
               type:"post",
               dataType:"json",
               data:{keyword:keyword},
                success:function(data){ 
                    if(data.length>0){
                    $('#search_books').html("");
                    $('#search_books').append("<table id='search_table'></table>");
                    $("#search_table").append("<tr id='th'></tr>");
                    $('#search_table').children(0).append("<td>"+title+"</td><td>"+price+"</td><td>"+author+"</td><td>"+image+"</td><td>"+choose+"</td>");
                    for(var j=0;j<data.length;j++){
                        $("#search_table").append("<tr id="+data[j]['id']+"></tr>");
                        $('#search_table').children().eq(j+1).append("<td id='title'>"+data[j]['title_'+lang]+"</td><td id='price'>"+data[j]['price']+"</td><td id='author'>"+data[j]['author_'+lang]+"</td><td id='image'><img src="+baseUrl+"/"+data[j]['image']+"></td><td><img class='cart' src="+baseUrl+"/img/buy.png></td>");
                    }
                    }
                    else{
                        $('#books').html("");
                        $('#books').append("<span>Այդպիսի գրքեր չկան:</span>");
                    }
                    $(".cart").click(function(){
                        $(this).attr("src",baseUrl+"/img/buyed.jpg");
                        var id = $(this).closest("tr").attr('id');
                        var title = $(this).closest("tr").children().eq(0).text();
                        var price = $(this).closest("tr").children().eq(1).text();
                        var author = $(this).closest("tr").children().eq(2).text();
                        $.ajax({
                        url:baseUrl+"/index.php/customer/add_to_cart",
                        type:"post",
                        data:{id:id,title:title,price:price,author:author},
                        })
                    })
       }
        });
         })
    });
</script>