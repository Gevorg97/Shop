<?php
class Customer extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('customer_model');
		if ( ! $this->migration->current())
		{
			show_error($this->migration->error_string());
		}
	} 
	public function index()
	{
		$this->session->unset_userdata('id');
		if($this->input->cookie('id'))
		{
			$newdata = array( 
				   'id'  => $this->input->cookie('id'),
				   'lang' => 'en'
				);
			$this->session->set_userdata($newdata);
			$data['idd']=$this->input->cookie('id');
			$data['cats']=$this->customer_model->get_all_cats();
			redirect("customer/home", 'refresh');
			$this->load->view("templates/customer_home_header");
			$this->load->view("customer/home",$data);
		}
		else
		{
			$res=$this->session->userdata('lang');
			if(!isset($res)){
				$newdata = array( 
					   'lang' => 'en'
					);
				$this->session->set_userdata($newdata);
			}
			$this->load->view("templates/customer_header");
			$this->load->view('customer/index');
		}
	}
	public function reg_form()
	{
		$this->load->view("templates/customer_header");
		$this->load->view('customer/reg_form');
	}
	public function register()
	{
		$this->form_validation->set_rules('login', 'login', 'trim|required|alpha|min_length[3]|max_length[30]');
        $this->form_validation->set_rules('mail', 'mail', 'trim|required|valid_email|is_unique[customers.mail]');
        $this->form_validation->set_rules('pass1', 'Password', 'trim|required|matches[pass2]');
        $this->form_validation->set_rules('pass2', 'Confirm Password', 'trim|required');
        if ($this->form_validation->run() == FALSE)
		{
			$this->load->view("templates/customer_header");
			$this->load->view("customer/reg_form");	
		}
		else
		{
			$this->customer_model->insert_customer($this->input->post('mail'),$this->input->post('login'),$this->input->post('pass1'));
			$this->load->view("templates/customer_header");
			$this->load->view('customer/index');
		}
	}
	public function login()
	{
		$this->form_validation->set_rules('login', 'Login', 'trim|required|min_length[3]|max_length[30]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == FALSE)
		{
			$this->load->view("templates/customer_header");
			$this->load->view("customer/index");	
		}
		else
		{
			$id=$this->customer_model->check_customer($this->input->post('login'),$this->input->post('password'));
			if($id)
			{	
				$data['id']=$id;
				$this->session->set_userdata(['id' => $id]);
				$data['cats']=$this->customer_model->get_all_cats();
				$data['idd']=$this->session->userdata('id');
				if($this->input->post('rm'))
				{	
					setcookie('id',$id,time()+600,'/');
				}
				redirect("customer/home", 'refresh');
			}
			else
			{
				$this->load->view("templates/customer_header");
				$this->load->view("customer/index");
			}
		}
	}
	public function home()
	{
		$res=$this->session->userdata('id');
		if(!isset($res)){
			redirect("customer/index", 'refresh');
		}
		else
		{
			$data['cats']=$this->customer_model->get_all_cats();
			$this->load->view("templates/customer_home_header");
			$this->load->view("customer/home",$data);
		}
	}
	public function get_books()
	{
		 echo json_encode($this->customer_model->get_cat_books($this->input->post('cat')));
	}
	public function forgot_password()
	{
        $this->form_validation->set_rules('mail', 'mail', 'trim|required|valid_email');
        if ($this->form_validation->run() == FALSE)
		{
			$this->load->view("templates/customer_header");
			$this->load->view("customer/forgot_password");	
		}
		else
		{
			if($this->customer_model->find_mail($this->input->post('mail')))
			{
				$this->customer_model->update_password($this->customer_model->get_password(),$this->input->post('mail'));
				// $config = Array(
				//   'protocol' => 'smtp',
				//   'smtp_host' => 'ssl://smtp.googlemail.com',
				//   'smtp_port' => 465,
				//   'smtp_user' => 'xxx@gmail.com', // change it to yours
				//   'smtp_pass' => 'xxx', // change it to yours
				//   'mailtype' => 'html',
				//   'charset' => 'iso-8859-1',
				//   'wordwrap' => TRUE
				// );

				  //       $message = '';
				  //       $this->load->library('email', $config);
				  //     $this->email->set_newline("\r\n");
				    //   $this->email->from('hoghmrtsyan.and@mail.ru'); // change it to yours
				    //   $this->email->to("hgevorg97@mail.ru");// change it to yours
				    //   $this->email->subject('Resume from JobsBuddy for your Job posting');
				    //   $this->email->message("message");
				    //   if($this->email->send())
				    //  {
				    //   echo 'Email sent.';
				    //  }
				    //  else
				    // {
				    //  show_error($this->email->print_debugger());
				    // }
				$this->load->view("templates/customer_header");
				$this->load->view('customer/index');
			}
			else
			{
				$data['message']="մեյլը գրանցված չէ";
				$this->load->view("templates/customer_header");
				$this->load->view("customer/forgot_password",$data);
			}
		}
	}
	public function change_pass()
	{
		$res=$this->session->userdata('id');
		if(!isset($res)){
			redirect("customer/index", 'refresh');
		}
		else
		{
			$this->form_validation->set_rules('c_pass', 'Curent Password', 'trim|required');
	        $this->form_validation->set_rules('pass1', 'Password', 'trim|required|matches[pass2]');
	        $this->form_validation->set_rules('pass2', 'Confirm Password', 'trim|required');
	        if ($this->form_validation->run() == FALSE)
			{
				$this->load->view("templates/customer_header");
				$this->load->view("customer/change_pass");	
			}
			else
			{
				if($this->customer_model->find_password($this->input->post('c_pass')))
				{
					$this->customer_model->change_password($this->input->post('pass1'),$this->input->post('c_pass'));
					$data['cats']=$this->customer_model->get_all_cats();
					$this->load->view("templates/customer_header");
					$this->load->view("customer/home",$data);
				}
				else
				{
					$data['message']="գաղտնաբառը սխալ է";
					$this->load->view("templates/customer_header");
					$this->load->view("customer/change_pass",$data);
				}
			}	
		}
        
	}
	public function logout()
	{
		
		setcookie('id',"",time()-1,'/');
		setcookie('id',"",time()-1);		
		$this->session->unset_userdata('id');
		redirect("customer/index", 'refresh');
	}
	public function add_to_cart()
	{
		$data = array(
               'id'      => $this->input->post('id'),
               'qty'     => 1,
               'price'   => $this->input->post('price'),
               'name'    => $this->input->post('title'),
               'options' => array('author' => $this->input->post('author'))
            );
		$this->cart->insert($data);
	}
	public function cart()
	{
		$res=$this->session->userdata('id');
		if(!isset($res)){
			redirect("customer/index", 'refresh');
		}
		else
		{
			$this->load->view("templates/customer_header");
			$this->load->view("customer/cart");
		}
	}
	public function update_cart()
	{
		$res=$this->session->userdata('id');
		if(!isset($res)){
			redirect("customer/index", 'refresh');
		}
		else
		{
			$rowid=$this->input->post('rowid');
			$qty=$this->input->post('qty');
				$data = array(
	               'rowid' => $rowid ,
	               'qty'   => $qty
	            );
			$this->cart->update($data); 
			$this->load->view("templates/customer_header");
			$this->load->view("customer/cart");
		}
	}
	public function buy()
	{
		$res=$this->session->userdata('id');
		if(!isset($res)){
			redirect("customer/index", 'refresh');
		}
		else
		{
			$id=$this->customer_model->buy($this->session->userdata('id'),$this->input->post('total'));
		    foreach ($this->cart->contents() as $key) {
		    	$this->customer_model->order_items($id,$key['id'],$key['qty']);
		    }
		    $this->cart->destroy();
		    $data['cats']=$this->customer_model->get_all_cats();
		    $this->load->view("templates/customer_home_header");
			$this->load->view("customer/home",$data);
		}
	}
	public function search_books()
	{	
		echo json_encode($this->customer_model->get_results($this->input->post('keyword')));
	}
	public function language()
	{
		$newdata = array( 
				   'lang'  => $this->input->post('lang')
				);
			$this->session->set_userdata($newdata);
	}
	public function refresh_page()
	{
		$res=$this->session->userdata('id');
		if(!isset($res)){
			redirect("customer/index", 'refresh');
		}
		else
		{
			$data['cats']=$this->customer_model->get_all_cats();
			redirect("customer/home", 'refresh');
			$this->load->view("templates/customer_home_header");
			$this->load->view("customer/home",$data);
		}
	}
} 