<script src="<?php echo base_url().'js/jquery-3.1.1.min.js'?>"></script>
<script src="<?php echo base_url().'js/admin_home.js'?>"></script>
<style>
	table,td{
		border: 1px solid ;
        border-radius: 3px;
        border-spacing: 5px;
	}
    table{
        background-color: azure;
    }
    td{
        background-color:aquamarine;
        width: 80px;
        height: 30px;
    } 
    button,input{
        border: 1px solid ;
        border-radius: 3px;
        border-spacing: 5px;
        width: 80px;
        height: 30px;
        background-color: aquamarine;
        border-color: aquamarine;
    }
    *{
        font-family: Tahoma;
    }
    #cat_en{
        margin-left: 22px;
    }
    #cat_ru{
        margin-left: 10px;
    }
    body{
        font-family: Tahoma;
        background-image: url("<?php echo base_url('img/book.jpg')?>");
    }
    .pg{
        height: 18px;
        width: 18px;
        background: #0097FF;
    }
    .fl{
        height: 18px;
        width: 28px;
        background: #00FFFF;
    }
    .cp{
        height: 18px;
        width: 18px;
        background: #004AFF;
    }
    .np{
        height: 18px;
        width: 18px;
        background: #0088FF;
    }
    span{
        margin:2px;
    }
</style>
<?php
echo form_open('admin/home'); ?>
Category<input placeholder="Category" id="cat_en" name="cat_en"><br><br>
Категория<input placeholder="Категория" id="cat_ru" name="cat_ru">
<button id='add'>ADD</button><br><br>
</form>
<a href="show_orders"><button id='show_orders'>ORDERS</button></a><br><br>
<?php
// print_r($this->session->all_userdata());
// echo base_url().'js/admin_home.js';
echo $this->pagination->create_links();
echo "<table>";
for($i=0;$i<count($cats);$i++){
    $id=$cats[$i]['id'];
    echo "<tr id=$id>";
        echo "<td contenteditable='true' class='name_en'>".$cats[$i]['name_en']."</td>";
        echo "<td contenteditable='true' class='name_ru'>".$cats[$i]['name_ru']."</td>";
        echo "<td><input type='button' class='update' value='update'></td>";
        echo "<td><input type='button' class='delete' value='delete'></td>";
        echo "<td><button><a href='books/$id'>show</a></button></td>";
    echo '</tr>';
}
echo "</table>";