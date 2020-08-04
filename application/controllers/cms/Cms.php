<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cms extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database('default');
		$this->load->model('cms_model');
		$this->data['slug_1'] = $this->uri->segment(2, '');
	}

	public function index()
	{
		if (!$this->is_admin_login())
		{
			redirect('cms/login', 'location');
		}

		$this->data['title'] = 'CMS';
		$this->load->view('cms/parts/header', $this->data);
		$this->load->view('cms/index/main', $this->data);
		$this->load->view('cms/parts/footer', $this->data);
    }
    
    public function login()
    {
		if ($this->is_admin_login())
		{
			redirect('cms/index', 'location');
		}

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		
		if ($this->form_validation->run())
		{
			$admin = $this->cms_model->lay_admin_theo_username_password($username, $password);

			if ($admin)
			{
				$this->login_admin($admin);
				redirect('cms', 'location');
			}
			else
			{
				$this->data['error_msg'] = 'Tên đăng nhập hoặc mật khẩu không đúng.';
				$this->load->view('cms/parts/header', $this->data);
				$this->load->view('cms/index/login', $this->data);
				$this->load->view('cms/parts/footer', $this->data);
			}
		}
		else
		{
			$this->load->view('cms/parts/header', $this->data);
			$this->load->view('cms/index/login', $this->data);
			$this->load->view('cms/parts/footer', $this->data);
		}
	}
	
	public function logout()
	{
		if ($this->is_admin_login())
		{
			$this->logout_admin();
			redirect('cms/login', 'location');
		}
	}
}
