<style>
    body{
        font-family: Tahoma;
        background-image: url("<?php echo base_url('img/book.jpg')?>");
    }
    button,input{
        border: 1px solid ;
        border-radius: 3px;
        border-spacing: 5px;
        width: 90px;
        height: 40px;
        background-color: aquamarine;
        border-color: aquamarine;
    }
    input{
        width: 180px;
        height: 25px;
    }
    #rm{
        width: 14px;
        height: 14px;
        background: red;
    }
</style>
<?php echo validation_errors(); ?>

<?php echo form_open('admin/index'); ?>
    login<br><input name='login' value=<?php echo set_value('login'); ?>><br><br>
    password<br><input type="password" name='password' value=<?php echo set_value('password'); ?>><br><br>
    <button>LOG IN</button>
</form>