$(document).ready(function(){
        var getUrl = window.location;
        var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
        $(".delete").click(function(){
            var idd = $(this).parent().parent().attr('id');
            $.ajax({
			url:baseUrl+"/admin/delete_book",
            type:"post",
            data:{id:idd},
        });
            $(this).parent().parent().remove();
        })
        $(".update").click(function(){
            var id = $(this).parent().parent().attr('id');
            var title_en = $(this).parent().parent().find('.title_en').text();
            var title_ru = $(this).parent().parent().find('.title_ru').text();
            var price = $(this).parent().parent().find('.price').text();
            var author_en = $(this).parent().parent().find('.author_en').text();
            var author_ru = $(this).parent().parent().find('.author_ru').text();

            $.ajax({
            url:"../update_book",
            type:"post",
            data:{title_en:title_en,title_ru:title_ru,id:id,price:price,author_en:author_en,author_ru:author_ru},
        });
    })
        $("#add").click(function(){
            var id = $(this).parent().parent().attr('id');
            var title_en = $('#title_en').val();
            var title_ru = $('#title_ru').val();
            var price = $('#price').val();
            var author_en = $('#author_en').val();
            var author_ru = $('#author_ru').val();
            if(title_en=="" || title_ru=="" || price=="" || author_en=="" || author_ru=="")alert("Mutqagreq bolor dashtery");
        })
    });