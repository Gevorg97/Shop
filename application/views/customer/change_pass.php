<style>
    button,input{
        font-size: 16px;
        border: 1px solid ;
        border-radius: 3px;
        border-spacing: 5px;
        width: 180px;
        height: 40px;/*
        background-color: aquamarine;
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
    form{
        position: absolute;
        margin-left: 42%;
        margin-top: 50px;
        text-align: center;
    }
    h1{
        margin-left: -5%;
        text-align: center;
    }
</style>
<?php
if($this->session->userdata('lang')=="en"){
    $current_p="Current password";
    $new_p="New password";
    $repeat_p="Repeat password";
    $c_pass="Change password";
}
else if($this->session->userdata('lang')=="ru"){
    $current_p="Текущий пороль";
    $new_p="Новый пороль";
    $repeat_p="Повторите пороль";
    $c_pass="Изменить пароль";
}
echo "<h1>$c_pass</h1>";
echo validation_errors(); 
if(isset($message)){
    echo $message;
}
echo form_open("customer/change_pass"); ?>
	<?php echo $current_p;?><br><input type='password' name='c_pass'><br><br>
    <?php echo $new_p;?><br><input type='password' name='pass1'><br><br>
    <?php echo $repeat_p;?><br><input type='password' name='pass2'><br><br>
	<button type='submit' name="send">OK</button>
</form>