<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Security extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		$this->load->library('Menus_lib');
		$this->load->model('login_model');
		$this->load->model('bench_model');
		$this->load->model('agency_model');
		$this->load->model('report_model');
		$this->load->model('proceeding_model');
		$this->load->model('filing_model');
		$this->load->model('search_model');
		$this->load->model('scrutiny_model');
		$this->load->helper("parts_status_helper");
		$this->load->helper("compno_helper");
		$this->load->helper("common_helper");
		$this->load->library('html2pdf');
		$this->load->library('label');
		$this->load->helper("date_helper");
		$this->load->helper("bench_helper");
		$this->load->helper("report_helper");
		$this->load->helper("date_helper");
		$this->load->helper("proceeding_helper");
		$this->load->helper("reports_helper");
		$this->load->helper("scrutiny_helper");
		$this->load->model('order_report_model');
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
			redirect('user/login'); 
		}
	}



	function check_permissions(){
		//die('h');
		$path = $_GET['msg'];
		//print_r($_SESSION['userId']);die;
		$data['user'] = $this->login_model->getRows($this->con);
		//print_r($data['user']['id']);die;
		if($_SESSION['userId'] != $data['user']['id'])
			redirect('Error_controller/access_denied_error');
		else
			redirect($path.'?cou=1');
	}

}