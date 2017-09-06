<script src="<?php echo base_url('js/customer_cart.js')?>"></script>
<style>
	table,td{
		border: 1px solid ;
        border-radius: 3px;
        border-spacing: 5px;
	}
    table{
        position: absolute;
        width: 50%;
        border-collapse: separate;
        border-spacing: 5px 5px;
        height: 150px;
        margin-left: 24%;
        margin-top: 50px;
    }
    td{
        width: 380px;
        height: 30px;
        background-color: #F3A762;
        border: 0px solid;
        padding-left: 5px;
    } 
    th{
    	background-color: #BC643C;
        width: 12.5%;
        height: 30px;
        padding-left: 5px;
    }
    button,input{
        border: 0px solid ;
        border-radius: 3px;
        border-spacing: 5px;
        width: 80px;
        height: 30px;
        background-color: #F3A762;
    }
    input{
    	width: 180px;
        background-color: #EAD9A9;
    }
    #buy{
        width: 100%;
        height: 100%;
        font-size: 25px;
        cursor: pointer;
    }
    h1{
        text-align: center;
    }
</style>
<?php $i = 1; 
if($this->session->userdata('lang')=="en"){
    $QTY="QTY";
    $itemD="Item Description";
    $itemP="Item Price";
    $subtotal="Sub-Total";
    $buy="Buy";
    $total="Total";
    $author="author";
    $cart="Cart";
}
else if($this->session->userdata('lang')=="ru"){
    $QTY="Количество";
    $itemD="Описание";
    $itemP="Цена";
    $subtotal="Итого книги";
    $buy="Купить";
    $total="Итог";
    $author="автор";
    $cart="Корзина";
}
echo "<h1>$cart</h1>";
echo "<table cellpadding=6 cellspacing=1 border=0>";

echo "<tr><th>$QTY</th><th>$itemD</th><th>$itemP</th><th>$subtotal</th></tr>";

foreach ($this->cart->contents() as $items): ?>

	<?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>

	<tr class='id' id= "<?php echo $this->cart->format_number($items['id']) ;?>">
      <td><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'type' => 'number', 'size' => '5', 'class' => 'qty','min'=>'0')); ?></td>
	  <td>
		<?php echo $items['name']; ?>

			<?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

				<p>
					<?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

						<strong><?php echo $author; ?>:</strong> <?php echo $option_value; ?><br />

					<?php endforeach; ?>
				</p>

			<?php endif; ?>

	  </td>
	  <td><?php echo $this->cart->format_number($items['price']); ?></td>
	  <td><?php echo $this->cart->format_number($items['subtotal']); ?></td>
	</tr>

<?php $i++; ?>

<?php endforeach;

echo "<tr><td colspan=2><button id='buy'>$buy</button></td><td><strong>$total</strong></td><td id='total'>";
echo $this->cart->format_number($this->cart->total()); ?></td></tr></table>