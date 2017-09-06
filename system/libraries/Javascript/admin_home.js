$(document).ready(function(){
		$("#add").click(function(){
            alert(5);
			var name = $('input').val();
			$.ajax({
			url:"admin/add_update_cat",
            type:"post",
            data:{name:name,action:'add'},
            success:function(){
                document.location.reload();
            }
			})
		});
        $(".update").click(function(){
            var id = $(this).parent().parent().attr('id');
            var name = $(this).parent().parent().find('.name').text();
			$.ajax({
			url:"add_update_cat.php",
            type:"post",
            data:{name:name,id:id,action:'update'},
        });
	})
        $(".delete").click(function(){
            var idd = $(this).parent().parent().attr('id');
            $.ajax({
			url:"add_update_cat.php",
            type:"post",
            data:{id:idd,action:'delete'},
            success:function(d){
                $("#"+idd).remove();
            }
        });
        })
        $(".pages").click(function(){
            $("table").remove();
        })
        });