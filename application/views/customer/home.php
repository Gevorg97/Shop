<?php include "js/customer_home.php";?>
<style>
    button{
        border: 0px solid ;
        border-radius: 3px;
        border-spacing: 5px;
        width: 112.5px;
        height: 40px;
        /*background-color: rgba(0, 0, 255, 0); */
        cursor: pointer;
    } 
    table,td{
        border: 1px solid ;
        border-radius: 3px;
        text-align: center;
    }
    table{
        border-collapse: separate;
        border-spacing: 5px 5px;
        max-width: 225px;
        position: absolute;
        box-shadow: inset 0 1px 2px rgba(0,0,0, .55), 0px 1px 1px rgba(255,255,255,.5);
    }
    td{
        border: 0px solid ;
        /*background-color:#F3A762;*/
        width: 80px;
        height: 30px;
        border-spacing: 10px;
        margin: 10px;
        box-shadow: inset 0 1px 2px rgba(0,0,0, .55), 0px 1px 1px rgba(255,255,255,.5);
    } 
    th{
        /*background-color:#00FF00;*/
        width: 80px;
        height: 30px;
        box-shadow: inset 0 1px 2px rgba(0,0,0, .55), 0px 1px 1px rgba(255,255,255,.5);
    }
    
    form{
        position: relative;
    }
    img{
        width: 120px;
        height: 80px;
    }
    #books tr,#books td{
        border: 0px solid;
        border-radius: 3px;
        text-align: center;
    }
    #books td{
        width: 85px;
    }
    #books{
        position: relative;
        width: 600px;
        float: left;
        margin-top: 10px;
    }
    #th{
        font-weight: bold;
        background: #CACACA;
    }
    .cart{
        cursor: pointer;
    }
    #search_table{
        width: 500px;
        position: absolute;
        float: left;
        margin-top: 70px;
    }
    #search_form{
        margin-top: 10px;
    }
    #cats{
        margin-left: 20px;
        margin-top: 10px;
       position: absolute;
       vertical-align: 54px;
    }
    #search{
        background-image: url("<?php echo base_url('img/search.jpg')?>");
        opacity: 0.85;
        color: black;
        height: 20px;
        border-width: 0;
    }
    #keyword{
        border-radius: 1px;
        border:0.5px solid #AFAFAF;
        box-shadow: inset 0 0 0 rgba(0,0,0, .55), 0px 0px 0px rgba(255,255,255,.5);
        height: 25px;
    }
    #row{
        margin-top: -100px;
    }
</style>
<?php
if($this->session->userdata('lang')=="en"){
    $show='Show';
    $search='Search';
}
else if($this->session->userdata('lang')=="ru"){
    $show='Показать';
    $search='Поиск';
}
    echo "<div class='col-sm-3'><table id='cats'>";
    foreach($cats as $row){
        $id=$row['id'];
        echo "<tr id=$id>";
            echo "<td class='name'>".$row["name_".$this->session->userdata('lang')]."</td>";
            echo "<td><button class='cat' id=$id>$show</button></td>";
        echo '</tr>';
    }
    echo"</table></div>";
    echo"<div class='col-sm-4'>
            <div id='books'></div>
        </div>";
    echo "<div class='col-sm-3'></div>
    <div class='col-sm-1'></div>";
echo "</div>";
echo "<div class='row'>
        <div class='col-sm-8'></div>
        <div class='col-sm-4' id='search_form'>
            <input type='text' id = 'keyword' class='sf'>
            <input type='submit' value = '$search' id='search' class='sf'>
            <div id='search_books'></div>
        </div>
       
    </div>";
?>