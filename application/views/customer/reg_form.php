<style>
    body,button{
        font-size: 19px;
    }
    button,input{
        font-size: 16px;
        border: 1px solid ;
        border-radius: 3px;
        border-spacing: 5px;
        width: 180px;
        height: 40px;/*
        background-color: aquamarine;
        border-color: aquamarine;
*/    }
    input{
        width: 180px;
        height: 25px;
    }
    form{
        /*margin-left: 22%;*/
        text-align: center;
    }
    h1{
        /*margin-left: 11%;*/
    }
    #mail{
        margin-left: 5px;
    }
</style>
<?php

if($this->session->userdata('lang')=="en"){
    $reg='Registration';
    $login='Login';
    $password="Password";
    $repeat_p="Repeat password";
    $mail='Mail';
    $rg='Register';
}
else if($this->session->userdata('lang')=="ru"){
    $reg='Регистрация';
    $login='Логин';
    $password="Пароль";
    $repeat_p="Повторите пороль";
    $mail='Мейл';
    $rg='Зарегистрироватся';
}
echo validation_errors(); 
echo "<div class='row'><div class='col-sm-4'></div><div class='col-sm-4'>";
echo form_open('customer/register'); 
echo "<h1>$reg</h1><br>";
echo	"<p>$login</p>
	<input type='text' name='login'>
	<p>$password</p>
	<input type='password' name='pass1' id='pass1'>
    <p>$repeat_p</p>
	<input type='password' name='pass2' id='pass2'>
    <p>$mail</p>
	<input type='text' name='mail' id='mail'>
	<br><br>
	<button>$rg</button>
    </form></div>
    <div class='col-sm-4'></div>
</div>";