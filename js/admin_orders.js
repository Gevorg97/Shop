	$(document).ready(function(){
        var getUrl = window.location;
        var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
        $(".status").click(function(){
            var idd = $(this).parent().parent().attr('id');
            $.ajax({
			url:baseUrl+"/index.php/admin/delete_order",
            type:"post",
            data:{id:idd},
            success:function(){
            document.location.reload();
            },
        });
        });
        $(".books").click(function(){
            var id = $(this).closest("tr").attr('id');
            $.ajax({
			url:baseUrl+"/index.php/admin/show_order_books",
            type:"post",
            dataType:"json",
            data:{id:id},
            success:function(data){

                $("#order_books").remove();
                $("div").append("<table id='order_books'></table>");
                $("#order_books").append("<tr></tr>");
                $("#order_books").children().eq(0).append("<th>Title</th><th>Price</th><th>Author</th><th>Image</th><th>Quantity</th>")
                for(var i=0;i<data.length;i++){
                    $("#order_books").append("<tr></tr>");
                    $("#order_books").children().eq(i+1).append("<td>"+data[i]['title']+"</td><td>"+data[i]['price']+"</td><td>"+data[i]['author']+"</td><td><img src="+baseUrl+"/"+data[i]['image']+"></td><td>"+data[i]['quantity']+"</td>");
                }
            }
        });
        })
    });