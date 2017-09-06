<?php
if($this->session->userdata('lang')=="en"){
    $title='The book shop';
}
else if($this->session->userdata('lang')=="ru"){
    $title='Kнижный магазин';
}
?>
<head>
<link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.min.css')?>">
<script src="<?php echo base_url('js/jquery-3.2.1.min.js')?>"></script>
<script src="<?php echo base_url('bootstrap/js/bootstrap.min.js')?>"></script>
<style>
    body{
        font-family: Tahoma;
        background-image: url("<?php echo base_url('img/bg.jpg')?>");
        background-attachment: fixed;
        background-size: cover;
        margin-left: 0px;
        margin-right: 0px;
    }
	#languagepicker {
		background-color: #FFF;
		display: inline-block;
		padding: 0;
		height: 40px;
		width: 130px;
		overflow: hidden;
		transition: all .3s ease;
		margin: 7px 50px 10px 0;
		vertical-align: top;
		float: right;
		border-radius: 5px;
		font-size: 17px;
		cursor: pointer;		
	}
	#languagepicker:hover {
		height: 81px;
	}
	#languagepicker a{
		color: #000;
		text-decoration: none;
	}
	#languagepicker li {
		display: block;
		padding: 0px 20px;
		line-height: 40px;
		border-top: 1px solid #EEE;
	}
	#languagepicker a:first-child li {
		border: none;
		background: #FFF !important;
	}
	#languagepicker li:hover{
		background-color: #EEE;
	}
	#languagepicker li img {
		width: 20px;
		height: 15px;
		margin-right: 5px;
		border-radius: 3px;
		margin-bottom: 5px;
	}
	#logo{
		margin-top: 12px;
		cursor: pointer;
		position: absolute;
		height: 75px;
		width: 75px;
		border-radius: 4px;
		margin-left: 14%;
	}
	#langs{
		height: 80px;
	}
	.clear{
		clear:both;
	}
	#header{
		height: 98px;
		width: 102%;
		background-image: url("<?php echo base_url('img/bgh.jpg')?>");
	}
	.button{
		color: black;
		margin-top: 30px;
		font-size: 14px;
		font-weight: bold;
		background-color: #DCD1BC;
        opacity: 0.78;
        cursor: pointer;
        float: right;
        position: absolute; 
	}
	.button:hover{
        background-color: #DCD1BC;
        opacity: 0.9;
        color: black;
        border-width: 0;
    }
	#chp{
        width: 25%;
    }
    #logout{
        width: 25%;
        margin-left : 60%;
    }
    #cart{
        width: 25%;
        margin-left : 30%;
    }
    h1{
		text-shadow: 0px 1px 2px rgba(155,0,255,.5);
	}
	input,button{
		box-shadow: inset 0 1px 2px rgba(0,0,0, .55), 0px 1px 1px rgba(255,255,255,.5);
	}
</style>
<link rel="icon" type="image/jpg" href="<?php echo base_url('img/logo.jpg')?>">
<title><?php echo $title ; ?></title>
</head>
<div class="row" id="header">
	<div class="col-sm-2"><a href="/ShopCi/customer/refresh_page"><img id='logo' src="<?php echo base_url('img/logo.jpg')?>"></a></div>
	<div class="col-sm-4"></div>
	<?php
	if($this->session->userdata('lang')=="en"){
    $change_p="Change Password";
    $logout="LogOut";
    $cart="Cart";
}
else if($this->session->userdata('lang')=="ru"){
    $change_p="Изменить пароль";
    $logout="Выйти";
    $cart="Корзина";
}
	echo "<div class='col-sm-3'><a href='/ShopCi/customer/change_pass'><button id='chp' class='button'>$change_p</button></a>
    <a href='/ShopCi/customer/cart'><button id='cart' class='button'>$cart</button></a>
    <a href='/ShopCi/customer/logout'><button id='logout' class='button'>$logout</button></a>
    </p></div><div class='col-sm-1'></div>";
	if($this->session->userdata('lang')=="en"){?>
		<div class="col-sm-2" id='langs'>
		    <ul id="languagepicker">
			<a><li value="en"><img src="<?php echo base_url('img/en.gif')?>"/>English</li></a>
		    <a><li value="ru"><img src="<?php echo base_url('img/ru.gif')?>"/>Русский</li></a>
			</ul>
		</div>
	<?php }
	else if($this->session->userdata('lang')=="ru"){ ?>
		<div class="col-sm-2">
		    <ul id="languagepicker" id='langs'>
		    <a><li value="ru"><img src="<?php echo base_url('img/ru.gif')?>"/>Русский</li></a>
			<a><li value="en"><img src="<?php echo base_url('img/en.gif')?>"/>English</li></a>
			</ul>
		</div>
	<?php }?>
</div><div class='clear'></div>
<script src="<?php echo base_url('js/jquery-3.1.1.min.js')?>"></script>
<script>
	$(document).ready(function(){
		$("li").click(function(){
            var lang = $(this).attr("value");
            $.ajax({
			url:"/ShopCi/customer/language",
            type:"post",
            data:{lang:lang},
        });  
            location.reload();
        })
	});
</script>