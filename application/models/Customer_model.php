<?php
class customer_model extends CI_Model { 
 
public function insert_customer($mail,$login,$password){
    $data = array(
		'mail' => $mail ,
		'login' => $login ,
		'password' => $password 
	);
    $this->db->insert('customers', $data); 
}
public function check_customer($login,$password){
	$this->db->select('id');
	$this->db->where('login', $login);
	$this->db->where('password', $password);
	$query = $this->db->get('customers');
	if($query->num_rows() > 0)
		return $query->result_array()[0]['id'];
	else
		return false;
}
public function get_all_cats(){
	$query = $this->db->get('categories');
	return $query->result_array();
}
public function get_cat_books($catid){
 	$this->db->select("`id`,`title_en`,`title_ru`, `price`, `author_en`, `author_ru`, `image`");
	$this->db->where('catid', $catid);
	$query = $this->db->get('books');
	return $query->result_array();
}
public function get_password(){
	$let=range('a','z');
	$let1=range('A','Z');
	$num=range(0,9);
	$pass=array_merge($let,$num,$let1);
	shuffle($pass);
	$p=implode($pass);
	return substr($p,0,rand(8,16));
}
public function update_password($password,$mail){
    $data = array(
    	'password' => $password
    );
	$this->db->where('mail', $mail);
	$this->db->update('customers', $data); 
}
public function find_mail($mail){
	$this->db->select('mail');
	$this->db->where('mail', $mail);
	$query = $this->db->get('customers');
	if($query->num_rows() > 0)
		return true;
	else
		return false;
}
public function change_password($password,$c_pass){
    $data = array(
    	'password' => $password
    );
	$this->db->where('password', $c_pass);
	$this->db->update('customers', $data); 
}
public function find_password($c_pass){
	$this->db->select('id');
	$this->db->where('password', $c_pass);
	$query = $this->db->get('customers');
	if($query->num_rows() > 0)
		return true;
	else
		return false;
}
public function buy($cust_id,$sum){
	if($sum>0){
	    $data = array(
			'customer_id' => $cust_id ,
			'sum' => $sum 
		);
	    $this->db->insert('orders', $data); 
	    return $this->db->insert_id();
	}
}
public function order_items($id,$book_id,$quantity){
    $data = array(
		'order_id' => $id ,
		'book_id' => $book_id ,
		'quantity' => $quantity 
	);
    $this->db->insert('order_items', $data); 
}
public function get_results($search_term){
	if($search_term!=""){
	        $this->db->select();
	        $this->db->from('books');
	        $this->db->where("title_".$this->session->userdata('lang')." LIKE '%$search_term%' or author_".$this->session->userdata('lang')." LIKE '%$search_term%'"); 
	        $query = $this->db->get();
	        return $query->result_array();
	    }
    }
}