<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Complaint_no_bug extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->library('Menus_lib');
		$this->load->model('login_model');
		$this->load->model('complaint_no_bug_model');
		$this->load->library('session');
		$this->isUserLoggedIn = $this->session->userdata('isUserLoggedIn');

		if($this->isUserLoggedIn) 
		{
			if(time()-$_SESSION["login_time_stamp"] > 900) 
    		{
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
    		}else{
    			$this->session->set_userdata('login_time_stamp', time());
    		}
    			$this->con = array( 
				'id' => $this->session->userdata('userId') 
			);
    	}
		else
		{
			redirect('admin/login'); 
		}
	}

	public function compare_counter()
	{	
			$data['user'] = $this->login_model->getRows($this->con);

			if(!($data['user']['role'] == 161 || $data['user']['role'] == 162 || $data['user']['role'] == 163 || $data['user']['role'] == 164 || $data['user']['role'] == 147))
				redirect('Error_controller/access_denied_error');

            //print_r($data['user']['id']);die;

			$data['menus'] = $this->menus_lib->get_menus($data['user']['role']);

			$check_year = '2021';
			$context1 = $this->complaint_no_bug_model->get_year_counter($check_year);
			$data['year_ini_counter'] = $context1['0']->complaint_counter;
			//print_r($data['year_ini_counter']['0']->complaint_counter);die;
			$context2 = $this->complaint_no_bug_model->get_max_comp_no($check_year);
			$data['max_comp_no'] = $context2['0']->max;
			//print_r($data['max_comp_no']['0']->max);die;

			$this->load->view('templates/front/dheader.php',$data);

			$this->load->view('complaint_bug/dashboard_main.php',$data);

			$this->load->view('templates/front/dfooter.php',$data);
		
	}	
}