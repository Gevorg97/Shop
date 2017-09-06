<?php
class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->library('session');
		// $this->load->library('migration');

		// if ( ! $this->migration->current())
		// {
		// 	show_error($this->migration->error_string());
		// }
	}
	public function home() 
	{
		$dta['counts_cat']=$this->admin_model->counts_cat();
		$config['base_url'] = 'http://localhost/ShopCi/admin/home';
		$config['total_rows'] = $dta['counts_cat']/3;
		$config['per_page'] = 1; 
		$config['uri_segment'] = 1;
		$config['num_links'] = 1;
		$config['use_page_numbers'] = TRUE;
		$config['page_query_string'] = TRUE;
		$config['full_tag_open'] = "<div class='pagination'>";
		$config['full_tag_close'] = '</div><br>';
		$config['first_link'] = '<<  ';
		$config['first_tag_open'] = "<span class='fl'>";
		$config['first_tag_close'] = '</span>';
		$config['last_link'] = '  >>';
		$config['last_tag_open'] = "<span class='fl'>";
		$config['last_tag_close'] = '</span>';
		$config['next_link'] = ' > ';
		$config['next_tag_open'] = "<span class='np'>";
		$config['next_tag_close'] = '</span>';
		$config['prev_link'] = ' < ';
		$config['prev_tag_open'] = "<span class='np'>";
		$config['prev_tag_close'] = '</span>';
		$config['cur_tag_open'] = "<span class='cp'>";
		$config['cur_tag_close'] = '</span>';
		$config['num_tag_open'] = "<span class='pg'>";
		$config['num_tag_close'] = '</span>';
		$this->pagination->initialize($config); 
		if(isset($_GET['per_page'])){
			$config['per_page']=$_GET['per_page'];
		}
		// $this->form_validation->set_rules('login', 'Имя пользователя', 'trim|required|min_length[3]|max_length[12]');
		// $this->form_validation->set_rules('password', 'Пароль', 'trim|required');
		// if ($this->form_validation->run() == FALSE)
		// {
		// 	$this->load->view('admin/home');
		// }
		// else
		// {
		// 	if($this->admin_model->check_admin($this->input->post('login'),$this->input->post('password'))>0)
		// 	{
		// 		redirect("admin/home", 'refresh');
		// 	}
		// 	else
		// 	{
		// 		$this->load->view('admin/index');
		// 	}
		// }
		$dta['cats']=$this->admin_model->get_all_cat($config['per_page'],$this->uri->segment(3));
		$this->load->view("admin/home",$dta);
		// $this->load->view("templates/customer_home");
	}
	public function index()
	{
		$this->form_validation->set_rules('login', 'Имя пользователя', 'trim|required|min_length[3]|max_length[12]');
		$this->form_validation->set_rules('password', 'Пароль', 'trim|required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('admin/index');
		}
		else
		{
			if($this->admin_model->check_admin($this->input->post('login'),$this->input->post('password'))>0)
			{
				redirect("admin/home", 'refresh');
			}
			else
			{
				$this->load->view('admin/index');
			}
		}
	}
	public function add()
	{
		if($this->input->post('cat_en')!="" && $this->input->post('cat_ru')!=""){
		    $id=$this->admin_model->insert_category($this->input->post('cat_en'),$this->input->post('cat_ru'));
		    @mkdir("images/$id",$id);
		    echo $this->input->post('cat_en');
		    // $this->load->view("admin/home");
		}
	}
	public function update()
	{
			$name_en=$this->input->post('name_en');
			$name_ru=$this->input->post('name_ru');
		    $id=$this->input->post('id');
		    $this->admin_model->update_category($name_en,$name_ru,$id);
			$this->load->view("admin/home");
	}
	public function delete()
	{
		$id=$this->input->post('id');
	    $this->admin_model->delete_category($id);
	    rmdir("images/$id");
		$this->load->view("admin/home");	    
	}
	public function books($cat_id)
	{
		$data['books']=$this->admin_model->get_cat_books($cat_id);
		$newdata = array(
                   'catid'  => $cat_id
               );
		$this->session->set_userdata($newdata);
		$this->load->view("admin/books",$data);	    
	}
	public function insert_book()
	{	
		$this->form_validation->set_rules('title_en', 'title', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('title_ru', 'Возглавие', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('price', 'price', 'trim|required|numeric|min_length[3]|max_length[5]');
		$this->form_validation->set_rules('author_en', 'author', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('author_ru', 'автор', 'trim|required|min_length[2]');
		if ($this->form_validation->run() == FALSE)
		{
			$data['books']=$this->admin_model->get_cat_books($catid);
			$this->load->view("admin/books",$data);	
			redirect("admin/books/".$this->session->userdata('catid'), 'refresh');
		}
		else
		{
		    $id=$this->admin_model->insert_book($this->session->userdata('catid'),$this->input->post('title_en'),$this->input->post('title_ru'),$this->input->post('price'),$this->input->post('author_en'),$this->input->post('author_ru'));
		    $config['upload_path'] = "./images/".$this->session->userdata('catid')."/";
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			// $config['max_size']	= '1000';
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload())
			{
				$data['error'] = array('error' => $this->upload->display_errors());
				$data['books']=$this->admin_model->get_cat_books($this->session->userdata('catid'));
				$this->load->view('admin/books', $data);
				redirect("admin/books/".$this->session->userdata('catid'), 'refresh');
			}
			else
			{
				$this->admin_model->set_image("images/".$this->session->userdata('catid')."/".$this->upload->data()['file_name'],$id);
				$data = array('upload_data' => $this->upload->data());
				$data['books']=$this->admin_model->get_cat_books($this->session->userdata('catid'));
				$info = getimagesize("images/".$this->session->userdata('catid')."/".$this->upload->data()['file_name']);
				if($info[0]>150 || $info[1]>150){
					$config['image_library'] = 'gd2';
					$config['source_image']	= "images/".$this->session->userdata('catid')."/".$this->upload->data()['file_name'];
					$config['maintain_ratio'] = TRUE;
					$config['width'] = 150;
					$config['height'] = 150;
					$this->load->library('image_lib', $config); 
					$this->image_lib->resize();
				}
				$this->load->view('admin/books', $data);
				redirect("admin/books/".$this->session->userdata('catid'), 'refresh');
			}
		}  
	}
	public function delete_book()
	{
	    unlink($this->admin_model->get_image_name($this->input->post('id')));
	    $this->admin_model->delete_book($this->input->post('id'));
	}
	public function update_book()
	{
	    $this->admin_model->update_book($this->input->post('id'),$this->input->post('title_en'),$this->input->post('title_ru'),$this->input->post('price'),$this->input->post('author_en'),$this->input->post('author_ru'));
	    $this->load->view("admin/books");
	}
	public function show_orders()
	{
		$data['orders']=$this->admin_model->show_orders();
		$this->load->view("admin/show_orders",$data);
	}
	public function delete_order()
	{
		$this->admin_model->delete_order($this->input->post('id'));
		$data['orders']=$this->admin_model->show_orders();
		$this->load->view("admin/show_orders",$data);
	}
	public function show_order_books()
	{
		echo json_encode($this->admin_model->get_order_books($this->input->post('id')));
	}
}