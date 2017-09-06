<style>
    body{
        font-size: 18px;
    }
    button,input{
        font-size: 16px;
        border: 1px solid ;
        border-radius: 3px;
        border-spacing: 5px;
        width: 180px;
        height: 40px;
    }
    button{
        font-size: 20px;
        color: black;
        border-color: #333333;
        /*text-align: center;*/
    }
    input{
        font-size: 20px;
        width: 180px;
        height: 25px;
    }
    #lg{
        height: 40px;
    }
    #rm{
        margin-left: 45px;
        margin-bottom: 10px;
    }
    label{
        cursor: pointer;
        display:inline-block;
    }
    form,.a{
        /*text-align: center;*/
        margin-left: 32%;

    }
    .a{
        /*margin-left: 31%;*/

    }
    #login:visited,#login:active{
        opacity: 0.8;
    }
    h1{
        text-align: center;
    }
    input[placeholder]{
        text-align: center;
        font-size: 19px;
    }
    #ind{
        align-items: center;
    }
    #row{
        position: absolute;
        width: 100%;
        /*margin-top: 90px;*/
    }​​​
    html {
    box-shadow: inset 0 0 100px hsla(0,0%,0%,.1);
    height: 100%;
    padding: 50px;
    -webkit-box-sizing: border-box;
    }
    input {
        display: block;
        margin-bottom: 20px;
    }
    input[type="checkbox"] {
        background-image: -webkit-linear-gradient(hsla(0,0%,0%,.1), hsla(0,0%,100%,.1)),
                          -webkit-linear-gradient(left, #f66 50%, #6cf 50%);
        background-size: 100% 100%, 200% 100%;
        background-position: 0 0, 5px 0;
        border-radius: 25px;
        box-shadow: inset 0 1px 4px hsla(0,0%,0%,.5),
                    inset 0 0 10px hsla(0,0%,0%,.5),
                    0 0 0 1px hsla(0,0%,0%,.1),
                    0 -1px 2px 1px hsla(0,0%,0%,.25),
                    0 2px 2px 1px hsla(0,0%,100%,.5),
                    0 -2px 10px 2px hsla(0,0%,100%,.75),
                    0 2px 10px 2px hsla(0,0%,0%,.25);
        cursor: pointer;
        height: 10px;
        padding-right: 10px;
        position: absolute;
        width: 20px;
        -webkit-appearance: none;
        -webkit-transition: .15s;
    }
    input[type="checkbox"]:after {
        background-color: #eee;
        background-image: -webkit-linear-gradient(hsla(0,0%,100%,.1), hsla(0,0%,0%,.1));
        border-radius: 25px;
        box-shadow: inset 0 1px 1px 1px hsla(0,0%,100%,1),
                    inset 0 -1px 1px 1px hsla(0,0%,0%,.25),
                    0 1px 3px 1px hsla(0,0%,0%,.5),
                    0 0 2px hsla(0,0%,0%,.25);
        content: '';
        display: block;
        height: 10px;
        left: 0;
        position: relative;
        top: 0;
        width: 10px;
    }
    input[type="checkbox"]:checked {
        background-position: 0 0, 15px 0;
        padding-left: 10px;
        padding-right: 0;
    }
    input[type="checkbox"]:hover:before {
        background: hsla(0,0%,0%,.25);
        border-radius: 10px;
        color: #e4ded4;
        content: '✘';
        font: 12px/20px sans-serif;
        height: 20px;
        left: 25px;
        letter-spacing: 1px;
        position: absolute;
        text-align: center;
        text-transform: uppercase;
        top: -5px;
        width: 20px;
    }
    input[type="checkbox"]:checked:hover:before {
        content: '✔';
    }

    /* Range */

    input[type="range"] {
        background-image: -webkit-linear-gradient(left, hsla(0,0%,100%,.1) 45%, transparent 45%),
                          -webkit-linear-gradient(hsla(0,0%,0%,.1), hsla(0,0%,100%,.1)),
                          -webkit-linear-gradient(left, #f66, #6cf);
        background-size: 3px 3px, 100% 100%, 100% 100%;
        border-radius: 25px;
        box-shadow: inset 0 1px 4px hsla(0,0%,0%,.5),
                    inset 0 0 10px hsla(0,0%,0%,.5),
                    0 0 0 1px hsla(0,0%,0%,.1),
                    0 -1px 2px 1px hsla(0,0%,0%,.25),
                    0 2px 2px 1px hsla(0,0%,100%,.5),
                    0 -2px 10px 2px hsla(0,0%,100%,.75),
                    0 2px 10px 2px hsla(0,0%,0%,.25);
        cursor: ew-resize;
        height: 10px;
        position: relative;
        width: 100px;
        -webkit-appearance: none;
        -webkit-transition: .15s;
    }
    input[type="range"]::-webkit-slider-thumb {
        background-color: #eee;
        background-image: -webkit-linear-gradient(hsla(0,0%,100%,.1), hsla(0,0%,0%,.1));
        border-radius: 25px;
        box-shadow: inset 0 1px 1px 1px hsla(0,0%,100%,1),
                    inset 0 -1px 1px 1px hsla(0,0%,0%,.25),
                    0 1px 3px 1px hsla(0,0%,0%,.5),
                    0 0 2px hsla(0,0%,0%,.25);
        content: '';
        display: block;
        height: 10px;
        left: 0;
        position: relative;
        top: 0;
        width: 10px;
        -webkit-appearance: none;
    }
    ​
​
</style>
<?php
if($this->session->userdata('lang')=="en"){
    $reg="Registration";
    $login="Login";
    $password="password";
    $rm="Remember me";
    $fp="Forgot password";
    $obs='Online book shop';
}
else if($this->session->userdata('lang')=="ru"){
    $reg="Регистрация";
    $login="логин";
    $password="пароль";
    $rm="Запомни меня";
    $fp="Забыл пароль";
    $obs='Интернет-магазин';
}
echo "<div class='row' id='row'><div class='col-sm-4'></div><div class='col-sm-4 col-centered' id='ind'>";
echo "<h1>$obs</h1>";
echo validation_errors();
echo "<a href='/ShopCi/customer/reg_form' class='a'><button id='reg'>$reg</button></a><br><br>";
echo form_open('customer/login'); 
echo	"<br><input name='login' placeholder='$login'><br><input type='password' placeholder='$password' name='password'><br>
<label><span id='rm'><input type='checkbox' name='rm'>$rm</span>
        </label><br><br>
    <button id='login'>$login</button><br><br>
</form>";
echo "<a href='/ShopCi/customer/forgot_password' class='a'><button id='forgot'>$fp</button></a>";
echo"</div><div class='col-sm-4'></div>
</div>
<div></div>";
//2 2 4 3 1 ,array('class' => 'form-horizontal')