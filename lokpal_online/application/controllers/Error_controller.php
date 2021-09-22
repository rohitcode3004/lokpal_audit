<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error_controller extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('login_model');
		$this->load->library('session');
		$this->isUserLoggedIn = $this->session->userdata('isUserLoggedIn'); 
	}

	public function index()
	{	
		if($this->isUserLoggedIn) 
		{
			$con = array( 
				'id' => $this->session->userdata('userId') 
			); 
			$data['user'] = $this->login_model->getRows($con);

			//if(!($data['user']['role'] == 12))
				//die('Access Denied!');

            //print_r($data);die('o');
			if($data['user']['id'] == 1255){
				$data['url'] = 'admin/dashboard';	
			}elseif($data['user']['role'] == 18){
				$data['url'] = 'filing/dashboard';
			}elseif($data['user']['role'] == 126){
				$data['url'] = 'scrutiny/dashboard_main';
			}elseif($data['user']['role'] == 161 || $data['user']['role'] == 162 || $data['user']['role'] == 163 || $data['user']['role'] == 164){
				$data['url'] = 'scrutiny/dashboard_main';
			}elseif($data['user']['role'] == 131){
				$data['url'] = 'counter/counterfiling';
			}elseif($data['user']['role'] == 138){
				$data['url'] = 'complaints/allocation-to-bench';
			}elseif($data['user']['role'] == 143){
				$data['url'] = 'counter/dashboard_registry';
			}elseif($data['user']['role'] == 147 || $data['user']['role'] == 170){
				$data['url'] = 'proceeding/dashboard_main';
			}elseif($data['user']['role'] == 172){
				$data['url'] = 'backlog';
			}elseif($data['user']['role'] == 173){
				$data['url'] = 'backlog/legacy_pdf';
			}elseif($data['user']['role'] == 149 || $data['user']['role'] == 150 || $data['user']['role'] == 151 || $data['user']['role'] == 152 || $data['user']['role'] == 164){
				$data['url'] = 'agency/dashboard_main';
			}else{
				$data['url'] = 'home';
			}	
		}
		else{
			if($_SESSION["is_staff"] == 't')
    		{
        		session_unset();
        		$this->session->sess_destroy();
        		redirect('admin/login'); 
        	}else{
        		session_unset();
        		$this->session->sess_destroy();
        		redirect('user/login'); 
        	} 
		}
		$this->load->view('errors/error.php', $data);
	}

		public function access_denied_error()
	{	
		if($this->isUserLoggedIn) 
		{
			$con = array( 
				'id' => $this->session->userdata('userId') 
			); 
			$data['user'] = $this->login_model->getRows($con);

			//if(!($data['user']['role'] == 12))
				//die('Access Denied!');

            //print_r($data);die('o');
			if($data['user']['id'] == 1255){
				$data['url'] = 'admin/dashboard';	
			}elseif($data['user']['role'] == 18){
				$data['url'] = 'filing/dashboard';
			}elseif($data['user']['role'] == 126){
				$data['url'] = 'scrutiny/dashboard_main';
			}elseif($data['user']['role'] == 161 || $data['user']['role'] == 162 || $data['user']['role'] == 163 || $data['user']['role'] == 164){
				$data['url'] = 'scrutiny/dashboard_main';
			}elseif($data['user']['role'] == 131){
				$data['url'] = 'counter/counterfiling';
			}elseif($data['user']['role'] == 138){
				$data['url'] = 'complaints/allocation-to-bench';
			}elseif($data['user']['role'] == 143){
				$data['url'] = 'counter/dashboard_registry';
			}elseif($data['user']['role'] == 147 || $data['user']['role'] == 170){
				$data['url'] = 'proceeding/dashboard_main';
			}elseif($data['user']['role'] == 172){
				$data['url'] = 'backlog';
			}elseif($data['user']['role'] == 173){
				$data['url'] = 'backlog/legacy_pdf';
			}elseif($data['user']['role'] == 149 || $data['user']['role'] == 150 || $data['user']['role'] == 151 || $data['user']['role'] == 152 || $data['user']['role'] == 164){
				$data['url'] = 'agency/dashboard_main';
			}else{
				$data['url'] = 'home';
			}	
		}
		else{
			if($_SESSION["is_staff"] == 't')
    		{
        		session_unset();
        		$this->session->sess_destroy();
        		redirect('admin/login'); 
        	}else{
        		session_unset();
        		$this->session->sess_destroy();
        		redirect('user/login'); 
        	} 
		}
		$this->load->view('errors/access_denied.php', $data);
	}
}