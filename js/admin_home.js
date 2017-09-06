$(document).ready(function(){
        $("#add").click(function(){
            var name1 = $('#cat_en').val();
            var name2 = $('#cat_ru').val();
            if(name1=="" || name2==""){
                alert("mutqagrel bolor dashtery");
            }
            else{
// alert(name1);
                $.ajax({
            url:"../admin/add",
            type:"post",            
            data:{cat_en:name1,cat_ru:name2},
            success:function(){
                document.location.reload();
            }
            })
        }
             
        });
        $(".update").click(function(){
            var id = $(this).parent().parent().attr('id');
            var name_en = $(this).parent().parent().find('.name_en').text();
            var name_ru = $(this).parent().parent().find('.name_ru').text();
            $.ajax({
            url:"../admin/update",
            type:"post",
            data:{name_en:name_en,name_ru:name_ru,id:id},
        });
    })
        $(".delete").click(function(){
            var idd = $(this).parent().parent().attr('id');
            $.ajax({
            url:"../admin/delete",
            type:"post",
            data:{id:idd},
            success:function(){
                $("#"+idd).remove();
                
            }
        });
            document.location.reload();
        })
        // $(".pages").click(function(){
        //     $("table").remove();
        // })
        });