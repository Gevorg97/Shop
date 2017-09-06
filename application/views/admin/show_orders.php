<script src="<?php echo base_url().'js/jquery-3.1.1.min.js'?>"></script>
<script src="<?php echo base_url().'js/admin_orders.js'?>"></script><style>
    body{
        font-family: Tahoma;
        background-image: url("<?php echo base_url('img/book.jpg')?>");
    }
	table,td,th{
		text-align: center;
		border: 1px solid ;
        border-radius: 3px;
        border-spacing: 5px;
	}
    table{
        background-color: azure;
    }
    td{
        background-color:aquamarine;
        width: 85px;
        height: 80px;
    }
    th{
    	background-color:grey;
    }
    *{
        font-family: Tahoma;
    }
    img{
        width: 85px;
        height: 80px;
    }
    #order_books{
        float:left;
        margin-left: 20px;
    }
    #orders{
        float:left;
    }
    button{
        border: 1px solid ;
        border-radius: 3px;
        border-spacing: 5px;
        width: 100px;
        height: 30px;
        background-color: aquamarine;
        border-color: aquamarine;
    }
    td button{
        height: 100%;
    }
    a{
        float: right;
    }
</style>
<?php
if($orders==null){
    echo "Bolor patvernery katarvel en";
}
else{
    echo '<div><table id=orders><tr>';
    echo "<th>login</th><th>mail</th><th>time</th><th>sum</th><th>status</th><th>Books</th>";
    echo '</tr>';
    foreach($orders as $row){
        echo "<tr id=".$row['id'].">";
            echo "<td>".$row['login']."</td><td>".$row['mail']."</td><td>".$row['time']."</td><td>".$row['sum']."</td><td><button class='status'>OK</button></td><td><button class='books'>Show Books</button></td>";
        echo '</tr>';
    }
    echo "</table></div>"; 
}

?>
<a href='home'><button id='home'>Home</button></a>