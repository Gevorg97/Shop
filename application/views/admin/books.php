<script src="<?php echo base_url('js/jquery-3.1.1.min.js')?>"></script>
<script src="<?php echo base_url('js/admin_book.js')?>"></script>
<style>
    body{
        font-family: Tahoma;
        background-image: url("<?php echo base_url('img/book.jpg')?>");
    }
	table,td,th{
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
        height: 80px;
        text-align: center;
    }
    th{ 
        background-color:aqua;
        width: 80px;
        height: 35px;
    }
    *{
        font-family: Tahoma;
    }
    button{
        border: 1px solid ;
        border-radius: 3px;
        border-spacing: 5px;
        width: 80px;
        height: 30px;
        background-color: aquamarine;
        border-color: aquamarine;
    }
    #logout{
        margin-left: 5px;
    }
    input{
        border: 1px solid ;
        border-radius: 3px;
        border-spacing: 5px;
        width: 110px;
        height: 20px;
        background-color: aquamarine;
        border-color: aquamarine;
        margin-left: 10px;
    }
    .delete,#delete{
        background-color: crimson;
        height: 100%;
    }
    button{
        cursor: pointer;
    }
    .update,#edit{
        background-color: green;
        height: 100%;
    }
    img{
        width: 80px;
        height: 80px;
    }
    #title_en{
        margin-left: 3.65%;
    }
    #ar{
        margin-left: 10.8%;
    }
</style>
<a href="<?php echo base_url('admin/home')?>"><button id='home'>Home</button></a>
<a href="<?php echo base_url('admin/index')?>"><button id='logout'>LogOut</button></a><br><br>
<?php
echo validation_errors(); 
if(isset($error)){
    echo $error['error'];
}
echo form_open_multipart("admin/insert_book"); ?>
    Title<input type="text" name="title_en" id='title_en'>
    Price<input type="text" name="price" id='price'>
    Author<input type="text" name="author_en" id='author_en'>
    Image<input type="file" name="userfile" size="20" >
    <input id='add' type="submit" name='action' value="add"><br><br>
    Возглавие<input type="text" name="title_ru" id='title_ru'>
    <span id="ar">Автор<input type="text" name="author_ru" id='author_ru'></span>
</form>
<?php
$in = strrpos(($_SERVER['REQUEST_URI']),"/");
$s = substr(($_SERVER['REQUEST_URI']),$in+1);  
echo "<table id='$s'><tr>";
    echo "<th>title</th><th>Возглавие</th><th>price</th><th>author</th><th>Автор</th><th>image</th><th id='edit'>Edit</th><th id='delete'>Delete</th>";
echo '</tr>';
foreach($books as $row){
    $id=$row['id'];
    echo "<tr id=$id>";
        echo "<td contenteditable='true' class='title_en'>".$row['title_en']."</td><td contenteditable='true' class='title_ru'>".$row['title_ru']."</td><td contenteditable='true' class='price'>".$row['price']."</td><td contenteditable='true' class='author_en'>".$row['author_en']."</td><td contenteditable='true' class='author_ru'>".$row['author_ru']."</td><td><img src=".base_url($row['image'])." ></td>";
    echo "<td><button class='update'>Update</button></td><td><button class='delete'>X</button></td>";
    echo '</tr>';
}
echo "</table>";
?>