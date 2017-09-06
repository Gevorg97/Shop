<style>
    button,input{
        font-size: 16px;
        border: 1px solid ;
        border-radius: 3px;
        border-spacing: 5px;
        width: 180px;
        height: 40px;
        /*background-color: aquamarine;
        border-color: aquamarine;*/
    }
    button{
        font-size: 16px;
        /*margin-left: 25%;*/
    }
    input{
        font-size: 20px;
        width: 180px;
        height: 25px;
    }
    div{
        position: absolute;
        /*margin-left: 42%*/
    }
    h1{
        margin-left: 7%;
        text-align: center;
        margin-bottom: 50px;
    }
    #fg{
        width: 100%;
        margin-top: 100px;
    }
    #form,p{
        align-items: center;
        width: 100%;
        text-align: center;
    }
</style>
<?php
if($this->session->userdata('lang')=="en"){
    $wye="Write your mail";
    $forgot_password='Forgot Password';
}
else if($this->session->userdata('lang')=="ru"){
    $wye="Напишите свою электронную почту";
    $forgot_password='Забыли пароль';
}
echo "<div class='row' id='fg'><div class='col-sm-4'></div><div class='col-sm-4'>";
echo "<h1>$forgot_password</h1>";
echo "<div id='form'><p>$wye</p>";
echo validation_errors(); 
if(isset($message)){
    echo $message;
}
echo form_open("customer/forgot_password"); 
echo 	"<input type='text' name='mail'><br><br>
    <button type='submit'>OK</button>
</form></div>
</div><div class='col-sm-4'></div>
</div>
";