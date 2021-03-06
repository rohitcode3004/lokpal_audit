<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('login_model');
		//$this->load->model('common_model');	
		$this->load->helper('url', 'form');
		$this->load->library('form_validation');
		$this->load->library('encryption');
		$this->load->library('session'); 
		$this->load->helper('url'); 
		$this->load->helper('common_helper'); 
		$this->load->library('Menus_lib');
		$this->load->helper('captcha');

		$this->isUserLoggedIn = $this->session->userdata('isUserLoggedIn'); 
	}
	
	public function login(){




		if($this->isUserLoggedIn){ 
			redirect('admin/dashboard'); 
		}else{ 

			$data['captcha'] =  $this->captcha();
			$this->load->view('admin/user/login', $data); 
		} 
	}
		
	public function authenticate(){				
		$data = array(); 
        // Get messages from the session 
		if($this->session->userdata('success_msg')){ 
			$data['success_msg'] = $this->session->userdata('success_msg'); 
			$this->session->unset_userdata('success_msg'); 
		} 
		if($this->session->userdata('error_msg')){ 
			$data['error_msg'] = $this->session->userdata('error_msg'); 
			$this->session->unset_userdata('error_msg'); 
		} 

        // If login request submitted 
		if($this->input->post('loginSubmit')){ 
			$this->form_validation->set_rules('username', 'Username', 'required'); 
			$this->form_validation->set_rules('password', 'password', 'required'); 
			$this->form_validation->set_rules('captcha', 'captcha', 'required');
			
			if($this->form_validation->run() == true){ 
				$data['username'] = strip_tags($this->input->post('username'));

				$current_failed = $this->login_model->current_failed(strip_tags($this->input->post('username')), date('Y-m-d'));
				$current_lock = $this->login_model->current_lock(strip_tags($this->input->post('username')), date('Y-m-d'));

				$password_encrypted = $this->input->post('password');
				$password_decrypted = decode($password_encrypted);
				$data['password'] = md5(strip_tags($password_decrypted));

				 $data['captcha_input'] = trim($this->input->post('captcha'));
			    $captcha_session = $this->session->all_userdata('captchaCode');
			   // print_r($data['captcha_input']);
			  
			    if($data['captcha_input'] == $captcha_session['captchaCode'])
			    {
			    	$checkcaptch='t';
			    }
			    else
			    {
				$checkcaptch='f';
			    }

				$checkLogin = $this->login_model->authenticate($data);
				$checkLock = $this->login_model->check_lock($data['username']);
				//print_r($checkLogin);die;
                //$checkStaff = $this->login_model->chkstf($data);
                //if($checkStaff){die('nn');}else{die('mm');}	
                //print_r($checkLogin);
                //echo "<br>";
                //print_r($checkLogin['is_staff']."2");
                //echo "<br>";
                //echo $checkcaptch."3";
                //echo "<br>";
                //print_r($checkLock['lock']."4");	
                //die;			

				if(!empty($checkLogin) && $checkLogin['is_staff'] == 't' && $checkcaptch == 't' && $checkLock['lock'] == 'N'){
          			$current_failed_upd = 0;
					$current_lock_upd = $checkLock['lock'];
					$log_data = array( 
					'user_id' => $checkLogin['id'], 
					'username' => strip_tags($this->input->post('username')),
					'form_type' => 'A',  
					'lock' => $current_lock_upd, 
					'failed' => $current_failed_upd, 
					'ip' => get_ip(),
					'datetime' => date('Y-m-d H:i:s', time()),
					'action_performed' => 'Login Page-Valid credentials',
					'status' => 'Login Success',
				); 
					$insert_log = $this->login_model->loginlog_ins($log_data); 
					if($insert_log){
					$this->session->set_userdata('isUserLoggedIn', TRUE); 
					$this->session->set_userdata('userId', $checkLogin['id']); 
					$this->session->set_userdata('is_staff', $checkLogin['is_staff']);
					$this->session->set_userdata('login_time_stamp', time());
					redirect('admin/dashboard/'); 
					}else{
					die('Unable to maintain your log.Go back and try again.');
					}
					}else{
					if(!empty($current_failed) && $current_failed[0]->failed >= 5){
						//print_r($current_failed[0]->failed);die('hassomething');
						$current_failed_upd = $current_failed[0]->failed;
						$log_data = array( 
							//'user_id' => $checkLogin['id'], 
							'username' => strip_tags($this->input->post('username')),
							'form_type' => 'A',  
							'lock' => 'Y',
							'failed' => $current_failed_upd,
							'ip' => get_ip(),
							'datetime' => date('Y-m-d H:i:s', time()),
							'action_performed' => 'Login Page-InValid credentials',
							'status' => 'Login Failure',
							); 
							$is_locked = 1;
					}elseif(!empty($current_failed) && $current_failed[0]->failed < 5){
							$current_failed_upd = $current_failed[0]->failed+1;
							//$current_lock_upd = $checkLock[0]->lock;
							$log_data = array( 
							//'user_id' => $checkLogin['id'], 
							'username' => strip_tags($this->input->post('username')),
							'form_type' => 'A',  
							//'lock' => $current_lock_upd,
							'failed' => $current_failed_upd,
							'ip' => get_ip(),
							'datetime' => date('Y-m-d H:i:s', time()),
							'action_performed' => 'Login Page-InValid credentials',
							'status' => 'Login Failure',
							); 
					}elseif(empty($current_failed)){
							//print_r($current_failed);die('nothing');
							$log_data = array( 
							//'user_id' => $checkLogin['id'], 
							'username' => strip_tags($this->input->post('username')),
							'form_type' => 'A',
							'ip' => get_ip(),
							'datetime' => date('Y-m-d H:i:s', time()),
							); 
					}else{
							die('no condition exception');
					}
					$insert_log = $this->login_model->loginlog_ins($log_data);
				if(isset($is_locked)){
								$data['error_msg'] = '<div class="alert alert-info"><h4 class="m-0">Your account is locked due to multiple entry of wrong credentials. Contact Admin to unlock.</h4></div>';
								$data['captcha'] =  $this->captcha();
							}else{
								$data['error_msg'] = '<div class="alert alert-info"><h4 class="m-0">Wrong email, password  or captcha, please try again.</h4></div>'; 
                $data['captcha'] =  $this->captcha();  
            }
							} 
			}else{ 
				$data['error_msg'] = '<div class="alert alert-danger"><h4 class="m-0">Please fill all the mandatory fields.</h4>'; 
				$data['captcha'] =  $this->captcha(); 
			} 
		} else{
			$data['captcha'] =  $this->captcha();
		}

        // Load view 
		$this->load->view('admin/user/login', $data); 			
	}

	public function captcha(){
        // Captcha configuration
        $config = array(
            'img_path'      => 'captcha_images/',
            'img_url'       => base_url().'captcha_images/',
            // 'font_path'     => 'system/fonts/texb.ttf',
            'font_path'     => realpath('system/fonts/texb.ttf'),
            'img_width'     => '160',
            'img_height'    => 50,
            'word_length'   => 6,
            'font_size'     => 18,
            'pool' => '23456789ABCDEFGHJKLMNPQRSTUVWXYZ',
            'colors'        => array(
                'background' => array(16, 56, 135),
                'border' => array(9, 48, 176),
                'text' => array(255, 255, 255),
                'grid' => array(81, 108, 164)
                )
        );
        $captcha = create_captcha($config);
        
        // Unset previous captcha and set new captcha word
        $this->session->unset_userdata('captchaCode');
        $this->session->set_userdata('captchaCode',$captcha['word']);
        
        // Display captcha image

        return $captcha;
    }

    public function refresh_captcha(){

        $captcha = $this->captcha();
        echo $captcha['image'];
    }

	public function save(){
		$data = $userData = array(); 

		if($this->isUserLoggedIn) 
		{

        // If registration request is submitted 
			if($this->input->post('submitform')){ 
				$this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]'); 
				$this->form_validation->set_rules('mobile', 'Mobile no', 'numeric');
				$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]'); 
				$this->form_validation->set_rules('password', 'password', 'required'); 
				$this->form_validation->set_rules('passweord2', 'confirm password', 'required|matches[password]'); 
				$this->form_validation->set_rules('role', 'Role', 'integer|required');

				$ts = date('Y-m-d H:i:s', time());
				$ip = $this->get_ip();
				$userData = array( 
					'username' => strip_tags($this->input->post('username')), 
					'email' => strip_tags($this->input->post('email')), 
					'password' => md5($this->input->post('password')),  
					'mobile' => strip_tags($this->input->post('mobile')), 
					'role' => $this->input->post('role'), 
					'is_staff' => TRUE,
					'display' => TRUE,
					'create_date' => $ts,
					'ip' => $ip,
				); 

				if($this->form_validation->run() == true){ 
					$insert = $this->login_model->register($userData); 
					if($insert){ 
						$this->session->set_flashdata('success_msg', 'Account registration has been successful.'); 
						redirect('admin/add_user'); 
					}else{ 
						$data['error_msg'] = 'Some problems occured, please try again.'; 
					} 
				}else{ 
            	//echo validation_errors();
					$data['error_msg'] = 'Please fill all the mandatory fields.'; 
				} 
			} 

			$con = array( 
				'id' => $this->session->userdata('userId') 
			); 
			$data['user'] = $this->login_model->getRows($con);

        // Posted data 
			$data['roles'] = $this->login_model->get_roles();
			//echo json_encode($data->result_array());
			$this->load->view('admin/user/add_user', $data);
		}else{
			redirect('admin/login'); 
		}
	}

	private function get_ip()
	{
		if(!empty($_SERVER['HTTP_CLIENT_IP'])){
			return $ip=$_SERVER['HTTP_CLIENT_IP'];
		}
		elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
			return $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		else{
			return $ip=$_SERVER['REMOTE_ADDR'];
		}
	}


	public function dashboard(){	
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
				$this->load->view('admin/templates/admin_header', $data);	
				$this->load->view('admin/dashboard/dashboard');	
			}elseif($data['user']['role'] == 18){
				redirect('e-filing/form');
			}elseif($data['user']['role'] == 126){
				redirect('scrutiny');
			}elseif($data['user']['role'] == 161 || $data['user']['role'] == 162 || $data['user']['role'] == 163 || $data['user']['role'] == 164){
				redirect('scrutiny');
			}elseif($data['user']['role'] == 131){
				redirect('c-filing');
			}elseif($data['user']['role'] == 138){
				redirect('complaints/allocation-to-bench');
			}elseif($data['user']['role'] == 143){
				redirect('internal-filing/ack-rec-for-phisical-filing');
			}elseif($data['user']['role'] == 147 || $data['user']['role'] == 170){
				redirect('proceeding/complaint-bench-wise');
			}elseif($data['user']['role'] == 172){
				redirect('backlog');
			}elseif($data['user']['role'] == 173){
				redirect('backlog/legacy_pdf');
			}elseif($data['user']['role'] == 149 || $data['user']['role'] == 150 || $data['user']['role'] == 151 || $data['user']['role'] == 152 || $data['user']['role'] == 164){
				redirect('agency/dashboard_main');
			}else{
				redirect('home');
			}	
		}
		else{
			redirect('admin/login'); 
		}
	}

	public function dashboard2(){	
		if($this->isUserLoggedIn) 
		{
			$con = array( 
				'id' => $this->session->userdata('userId') 
			); 
			$data['user'] = $this->login_model->getRows($con);

			$data['menus'] = $this->menus_lib->get_menus($data['user']['role']);
			$this->load->view('templates/front/dashboard2.php',$data);
		}
		else{
			redirect('admin/login'); 
		}
	}

	public function logout(){ 
		$con = array( 
    			'id' => $this->session->userdata('userId') 
    		); 
    	$data['user'] = $this->login_model->getRows($con);

		$this->session->unset_userdata('isUserLoggedIn'); 
		$this->session->unset_userdata('userId'); 
		$this->session->sess_destroy(); 

		$log_data = array( 
          'user_id' => $data['user']['id'], 
          'username' => $data['user']['username'],
          'form_type' => 'Logout Form',  
          'ip' => get_ip(),
          'datetime' => date('Y-m-d H:i:s', time()),
          'action_performed' => 'Logout Performed',
          'status' => 'Logout Performed Successfully',
        ); 
          $insert_log = $this->login_model->loginlog_ins($log_data); 
          if($insert_log)
          {
			redirect('admin/login/'); 
	    	}
		else{
			$log_data = array( 
          'user_id' => $data['user']['id'], 
          'username' => $data['user']['username'],
          'form_type' => 'Logout Form',  
          'ip' => get_ip(),
          'datetime' => date('Y-m-d H:i:s', time()),
          'action_performed' => 'Logout Performed',
          'status' => 'Logout Performed Failed',
        ); 
          $insert_log = $this->login_model->loginlog_ins($log_data); 

		}
		
	}

	public function view_menus(){	
		if($this->isUserLoggedIn) 
		{
			$con = array( 
				'id' => $this->session->userdata('userId') 
			); 
			$data['user'] = $this->login_model->getRows($con);

			if(!($data['user']['role'] == 12))
				redirect('Error_controller/access_denied_error');

            //print_r($data);die('o');	
			$this->load->view('admin/dashboard/menus_view', $data);
		}
		else{
			redirect('admin/login'); 
		}
	}

	public function add_submenu(){	
		if($this->isUserLoggedIn) 
		{
			$con = array( 
				'id' => $this->session->userdata('userId') 
			); 
			$data['user'] = $this->login_model->getRows($con);
            //print_r($data);die('o');

            if(!($data['user']['role'] == 12))
				redirect('Error_controller/access_denied_error');

			$data['menus'] = $this->menu_model->fetch_menus();
			//echo json_encode($data->result_array());
			$this->load->view('admin/dashboard/add_submenu', $data);
		}
		else{
			redirect('admin/login'); 
		}
	}

	public function add_perm(){	
		if($this->isUserLoggedIn) 
		{
			$con = array( 
				'id' => $this->session->userdata('userId') 
			); 
			$data['user'] = $this->login_model->getRows($con);
            //print_r($data);die('o');
            if(!($data['user']['role'] == 12))
				redirect('Error_controller/access_denied_error');

			$data['roles'] = $this->menu_model->fetch_roles();
			$data['menus'] = $this->menu_model->fetch_menus();
			//echo json_encode($data->result_array());
			$this->load->view('admin/dashboard/add_perm', $data);
		}
		else{
			redirect('admin/login'); 
		}
	}

	function action()
	{
		if($this->input->post('data_action'))
		{
			$data_action = $this->input->post('data_action');
			//print_r($_POST);die($data_action);

			if($data_action == 'edit')
			{
				//die('great');
				$api_url = base_url()."label/update";

				$form_data = array(
					'level' => $this->input->post('level'),				
					'long_name' => $this->input->post('longname'),
					'short_name' => $this->input->post('shortname'),
					'display' => $this->input->post('display'),
					'description' => $this->input->post('description'),
					'id' => $this->input->post('element_id')
				);
				$client = curl_init($api_url);
				curl_setopt($client, CURLOPT_POST, true);
				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);
				echo $response;
			}

			if($data_action == 'fetch_single')
			{
				$api_url = base_url()."label/fetch_single";

				$form_data = array(
					'id' => $this->input->post('element_id')
				);

				$client = curl_init($api_url);
				curl_setopt($client, CURLOPT_POST, true);
				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);
				echo $response;

			}

			if($data_action == 'insert_menu')
			{
				//die('great');
				$api_url = base_url()."menu/insert_menu";

				$form_data = array(
					'menu_name' => $this->input->post('menuname'),				
					'priority' => $this->input->post('priority'),
					'display' => $this->input->post('display')
				);
				$client = curl_init($api_url);
				curl_setopt($client, CURLOPT_POST, true);
				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);
				echo $response;
			}

			if($data_action == 'fetch_all')
			{
				$api_url = base_url()."menu";
				$client = curl_init($api_url);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($client, CURLOPT_FOLLOWLOCATION, true);
				$response = curl_exec($client);
				curl_close($client);
				$result = json_decode($response);
				//print_r($result);die('k');
				$output = '';
				$count = 0;
				if (count($result) > 0) {
					foreach ($result as $row) {
						$count ++;
						/*if($row->level_master_id == '1')
							$level = 'filing';
						elseif ($row->level_master_id == '2')
						$level = 'scrutiny';*/
						$output .='
						<tr>
						<td>'.$count.'</td>
						<td>'.$row->menu_name.'</td>
						<td>'.$row->name.'</td>
						<td>'.$row->url.'</td>
						<td>'.$row->priority.'</td>
						<td>'.$row->display.'</td>
						<td><button type="button" name="edit" class="btn btn-warning btn-xs edit" id="'.$row->id.'">EDIT</button>
						</td>
						<td><button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row->id.'">DELETE</button>
						</td>
						</tr>
						'; 
					}
				}else{
					$output .='
					<tr>
					<td colspan="4" align="center">No Data Found</td>
					</tr>
					';
				}
				echo $output;
			}

		}
	}

	public function view_users(){	
		if($this->isUserLoggedIn) 
		{
			$con = array( 
				'id' => $this->session->userdata('userId') 
			); 
			$data['user'] = $this->login_model->getRows($con);
            //print_r($data);die('o');
            if(!($data['user']['role'] == 12))
				redirect('Error_controller/access_denied_error');

			$this->load->view('admin/dashboard/users_view', $data);
		}
		else{
			redirect('admin/login'); 
		}
	}

	function user_action()
	{
		if($this->input->post('data_action'))
		{
			$data_action = $this->input->post('data_action');
			//print_r($_POST);die($data_action);

			if($data_action == 'edit')
			{
				//die('great');
				$api_url = base_url()."label/update";

				$form_data = array(
					'level' => $this->input->post('level'),				
					'long_name' => $this->input->post('longname'),
					'short_name' => $this->input->post('shortname'),
					'display' => $this->input->post('display'),
					'description' => $this->input->post('description'),
					'id' => $this->input->post('element_id')
				);
				$client = curl_init($api_url);
				curl_setopt($client, CURLOPT_POST, true);
				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);
				echo $response;
			}

			if($data_action == 'fetch_single')
			{
				$api_url = base_url()."label/fetch_single";

				$form_data = array(
					'id' => $this->input->post('element_id')
				);

				$client = curl_init($api_url);
				curl_setopt($client, CURLOPT_POST, true);
				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);
				echo $response;

			}


			if($data_action == 'fetch_all')
			{
				$api_url = base_url()."user";
				$client = curl_init($api_url);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($client, CURLOPT_FOLLOWLOCATION, true);
				$response = curl_exec($client);
				curl_close($client);
				$result = json_decode($response);
				//print_r($result);die('k');
				$output = '';
				$count = 0;
				if (count($result) > 0) {
					foreach ($result as $row) {
						$count ++;
						/*if($row->level_master_id == '1')
							$level = 'filing';
						elseif ($row->level_master_id == '2')
						$level = 'scrutiny';*/
						$output .='
						<tr>
						<td>'.$count.'</td>
						<td>'.$row->username.'</td>
						<td>'.$row->email.'</td>
						<td>'.$row->is_staff.'</td>
						<td>'.$this->menus_lib->get_role_name($row->role).'</td>
						</tr>
						'; 
					}
				}else{
					$output .='
					<tr>
					<td colspan="4" align="center">No Data Found</td>
					</tr>
					';
				}
				echo $output;
			}
		}
	}

	public function add_user(){	
		if($this->isUserLoggedIn) 
		{
			$con = array( 
				'id' => $this->session->userdata('userId') 
			); 
			$data['user'] = $this->login_model->getRows($con);
            //print_r($data);die('o');
            if(!($data['user']['role'] == 12))
				redirect('Error_controller/access_denied_error');

			$data['roles'] = $this->login_model->get_roles();
			//echo json_encode($data->result_array());
			$this->load->view('admin/user/add_user', $data);
		}
		else{
			redirect('admin/login'); 
		}
	}

	public function view_roles(){	
		if($this->isUserLoggedIn) 
		{
			$con = array( 
				'id' => $this->session->userdata('userId') 
			); 
			$data['user'] = $this->login_model->getRows($con);
            //print_r($data);die('o');
            if(!($data['user']['role'] == 12))
				redirect('Error_controller/access_denied_error');

			$this->load->view('admin/dashboard/roles_view', $data);
		}
		else{
			redirect('admin/login'); 
		}
	}

	function roles_action()
	{
		if($this->input->post('data_action'))
		{
			$data_action = $this->input->post('data_action');
			//print_r($_POST);die($data_action);

			if($data_action == 'edit')
			{
				//die('great');
				$api_url = base_url()."label/update";

				$form_data = array(
					'level' => $this->input->post('level'),				
					'long_name' => $this->input->post('longname'),
					'short_name' => $this->input->post('shortname'),
					'display' => $this->input->post('display'),
					'description' => $this->input->post('description'),
					'id' => $this->input->post('element_id')
				);
				$client = curl_init($api_url);
				curl_setopt($client, CURLOPT_POST, true);
				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);
				echo $response;
			}

			if($data_action == 'fetch_single')
			{
				$api_url = base_url()."label/fetch_single";

				$form_data = array(
					'id' => $this->input->post('element_id')
				);

				$client = curl_init($api_url);
				curl_setopt($client, CURLOPT_POST, true);
				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);
				echo $response;

			}


			if($data_action == 'fetch_all')
			{
				$api_url = base_url()."menu/view_roles";
				$client = curl_init($api_url);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($client, CURLOPT_FOLLOWLOCATION, true);
				$response = curl_exec($client);
				curl_close($client);
				$result = json_decode($response);
				//print_r($result);die('k');
				$output = '';
				$count = 0;
				if (count($result) > 0) {
					foreach ($result as $row) {
						$count ++;
						/*if($row->level_master_id == '1')
							$level = 'filing';
						elseif ($row->level_master_id == '2')
						$level = 'scrutiny';*/
						$output .='
						<tr>
						<td>'.$count.'</td>
						<td>'.$row->name.'</td>
						<td>'.$row->display.'</td>
						<td><button type="button" name="edit" class="btn btn-warning btn-xs edit" id="'.$row->id.'">EDIT</button>
						</td>
						<td><button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row->id.'">DELETE</button>
						</td>
						</tr>
						'; 
					}
				}else{
					$output .='
					<tr>
					<td colspan="4" align="center">No Data Found</td>
					</tr>
					';
				}
				echo $output;
			}

			if($data_action == 'insert_role')
			{
				//die('great');
				$api_url = base_url()."menu/insert_role";

				$form_data = array(
					'role' => $this->input->post('role'),				
					'display' => $this->input->post('display')
				);
				$client = curl_init($api_url);
				curl_setopt($client, CURLOPT_POST, true);
				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);
				echo $response;
			}

			if($data_action == 'delete_role')
			{
				//die('great');
				$api_url = base_url()."menu/delete_role";

				$form_data = array(
					'id' => $this->input->post('role_id')
				);
				$client = curl_init($api_url);
				curl_setopt($client, CURLOPT_POST, true);
				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);
				echo $response;
			}
		}
	}

	public function view_permissions(){	
		if($this->isUserLoggedIn) 
		{
			$con = array( 
				'id' => $this->session->userdata('userId') 
			); 
			$data['user'] = $this->login_model->getRows($con);
            //print_r($data);die('o');
            if(!($data['user']['role'] == 12))
				redirect('Error_controller/access_denied_error');

			$this->load->view('admin/dashboard/permissions_view', $data);
		}
		else{
			redirect('admin/login'); 
		}
	}

	function permission_action()
	{
		//print_r($this->input->post('menu_id'));die('here');
		if($this->input->post('data_action'))
		{
			$data_action = $this->input->post('data_action');
			//print_r($_POST);die($data_action);

			if($data_action == 'edit')
			{
				//die('great');
				$api_url = base_url()."label/update";

				$form_data = array(
					'level' => $this->input->post('level'),				
					'long_name' => $this->input->post('longname'),
					'short_name' => $this->input->post('shortname'),
					'display' => $this->input->post('display'),
					'description' => $this->input->post('description'),
					'id' => $this->input->post('element_id')
				);
				$client = curl_init($api_url);
				curl_setopt($client, CURLOPT_POST, true);
				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);
				echo $response;
			}

			if($data_action == 'fetch_single')
			{
				$api_url = base_url()."label/fetch_single";

				$form_data = array(
					'id' => $this->input->post('element_id')
				);

				$client = curl_init($api_url);
				curl_setopt($client, CURLOPT_POST, true);
				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);
				echo $response;

			}

			if($data_action == 'fetch_all')
			{
				$api_url = base_url()."menu/view_permissions";
				$client = curl_init($api_url);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($client, CURLOPT_FOLLOWLOCATION, true);
				$response = curl_exec($client);
				curl_close($client);
				$result = json_decode($response);
				//print_r($result);die('k');
				$output = '';
				$count = 0;
				if (count($result) > 0) {
					foreach ($result as $row) {
						$count ++;
						$output .='
						<tr>
						<td>'.$count.'</td>
						<td>'.$this->menus_lib->get_role_name($row->role_id).'</td>
						<td>'.$this->menus_lib->get_menu_name($row->menu_id).'</td>
						<td>'.$this->menus_lib->get_submenu_name($row->submenu_id).'</td>
						<td>'.$row->display.'</td>
						<td><button type="button" name="edit" class="btn btn-warning btn-xs edit" id="'.$row->id.'">EDIT</button>
						</td>
						<td><button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row->id.'">DELETE</button>
						</td>
						</tr>
						'; 
					}
				}else{
					$output .='
					<tr>
					<td colspan="4" align="center">No Data Found</td>
					</tr>
					';
				}
				echo $output;
			}

			if($data_action == 'insert_perm')
			{
				//die('great');
				$api_url = base_url()."menu/insert_perm";

				$form_data = array(
					'role' => $this->input->post('role'),				
					'menus' => $this->input->post('menus'),				
					'submenu' => $this->input->post('submenu'),				
					'display' => $this->input->post('display')
				);
				$client = curl_init($api_url);
				curl_setopt($client, CURLOPT_POST, true);
				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);
				echo $response;
			}

			if($data_action == 'delete_perm')
			{
				//die('great');
				$api_url = base_url()."menu/delete_perm";

				$form_data = array(
					'id' => $this->input->post('perm_id')
				);
				$client = curl_init($api_url);
				curl_setopt($client, CURLOPT_POST, true);
				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);
				echo $response;
			}
		}
	}
}