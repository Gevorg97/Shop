    $(document).ready(function(){
        var getUrl = window.location;
        var baseUrl = getUrl .protocol + "//" + getUrl.host;
         $("input").change(function(){
                qty=$(this).val();
                ind =$(this).index('input');
              rowid=$("input[type]").eq(ind-1).val();
              
         $.ajax({
              url:"/ShopCi/customer/update_cart",
              type:"post",
              data:{rowid:rowid,qty:qty}
        }); 
        location.reload();
         })
         $("#buy").click(function(){
          total=$('#total').text();
          // alert(total);
              $.ajax({
              url:"/ShopCi/customer/buy",
              type:"post",
              data:{total:total}
        });
              document.location.reload();
         })

});