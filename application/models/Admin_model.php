<?php
class admin_model extends CI_Model {
public function check_admin($login,$password){
	$this->db->select();
	$this->db->where('login', $login);
	$this->db->where('password', $password);
	$query = $this->db->get('admin');
	if($query->num_rows() > 0)
	return 1;
}
public function counts_cat(){
    $this->db->select('COUNT(`id`) as total');
	$query = $this->db->get('`categories`');
    return $query->result_array()[0]['total']; 
}
public function get_all_cat($num, $seg){
   // $limit=$num*3;
	$this->db->limit(3,$num*3-3);
    $this->db->order_by('id','asc');
 	$query = $this->db->get('categories');
 	return $query->result_array();
 	// return $num;
}
public function insert_category($name_en,$name_ru){
	$data = array(
		'name_en' => $name_en,
		'name_ru' => $name_ru
	);
    $this->db->insert('categories', $data); 
	return $this->db->insert_id();
}
public function update_category($name_en,$name_ru,$id){
    $data = array(
    'name_en' => $name_en,
    'name_ru' => $name_ru
   );
	$this->db->where('id', $id);
	$this->db->update('categories', $data); 
}
public function delete_category($id){
    $this->db->delete('categories', array('id' => $id)); 
    $this->db->delete('books', array('catid' => $id)); 
}
public function get_cat_books($id){
	$this->db->select('id, title_en,title_ru, price, author_en,author_ru, image');
	$this->db->where('catid', $id);
	$query = $this->db->get('books');
    return $query->result_array();
}
public function insert_book($catid,$title_en,$title_ru,$price,$author_en,$author_ru){
    $data = array(
		'catid' => $catid ,
		'title_en' => $title_en ,
		'title_ru' => $title_ru ,
		'price' => $price ,
		'author_en' => $author_en ,
		'author_ru' => $author_ru 
	);
    $this->db->insert('books', $data); 
    return $this->db->insert_id();
}
public function set_image($image,$id){
	$data = array(
	    'image' => $image
    );
	$this->db->where('id', $id);
	$this->db->update('books', $data); 
}
public function delete_book($idd){
	$this->db->delete('books', array('id' => $idd)); 
}
public function update_book($id,$title_en,$title_ru,$price,$author_en,$author_ru){
    $data = array(
		'title_en' => $title_en ,
		'title_ru' => $title_ru ,
		'price' => $price ,
		'author_en' => $author_en ,
		'author_ru' => $author_ru 
	);
	$this->db->where('id', $id);
	$this->db->update('books', $data); 
}
public function show_orders(){
	$this->db->select('orders.id, login, mail, time, sum');
    $this->db->from('customers, orders');
	$this->db->where('customers.id = orders.customer_id');
    $this->db->where('status',0); 
	$query = $this->db->get();
    return $query->result_array();
}
public function delete_order($id){
    $data = array(
		'status' => 1
	);
	$this->db->where('id', $id);
	$this->db->update('orders', $data); 
}
public function get_order_books($id){
    $this->db->select('title_en,title_ru,price,author_en,author_ru,image,quantity');
    $this->db->from('order_items,orders,books');
	$this->db->where('orders.id=order_items.order_id');
	$this->db->where('books.id=order_items.book_id');
	$this->db->where("order_items.order_id='$id'");
    $this->db->where('status=0'); 
	$query = $this->db->get();
    return $query->result_array();
}
public function get_image_name($id){
	$this->db->select('id, title_en,title_ru, price, author_en,author_ru, image');
	$this->db->where('id', $id);
	$query = $this->db->get('books');
    return $query->result_array()[0]['image'];
}
}