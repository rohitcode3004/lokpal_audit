<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('login_model');
		$this->load->model('users_model');	
		$this->load->model('common_model');	
		$this->load->helper('url', 'form');
		$this->load->library('form_validation');
		$this->load->library('encryption');
		$this->load->library('session'); 
		$this->load->helper('url');
		$this->load->helper('common_helper');
		$this->load->helper('compno_helper');
		$this->load->helper('parts_status_helper');
		$this->load->helper("date_helper");
		$this->isUserLoggedIn = $this->session->userdata('isUserLoggedIn'); 
		$this->load->library('Menus_lib');
		$this->load->helper('captcha');
		$this->load->helper('email_helper');
	}

	function index()
	{
		$con = array( 
				'id' => $this->session->userdata('userId') 
			); 
			$data['user'] = $this->login_model->getRows($con);

		if(!($data['user']['role'] == 12))
			redirect('Error_controller/access_denied_error');
		$data = $this->login_model->fetch_all();
		echo json_encode($data->result_array());
	}

			

	
	public function login(){ 
		//print_r($this->session->all_userdata('captchaCode'));
		if(isset($_GET['page']))
			$data['page'] = $_GET['page'];
		else
			$data['page'] = 'na';
		if($this->session->userdata('success_msg')){ 
			$data['success_msg'] = $this->session->userdata('success_msg'); 
			$this->session->unset_userdata('success_msg'); 
		} 
		if($this->session->userdata('error_msg')){ 
			$data['error_msg'] = $this->session->userdata('error_msg'); 
			$this->session->unset_userdata('error_msg'); 
		} 

        // If login request submitted 
		if($this->input->post('userloginSubmit')){ 

			$this->form_validation->set_rules('username', 'Username', 'required'); 
			$this->form_validation->set_rules('password', 'password', 'required'); 
			$this->form_validation->set_rules('captcha', 'captcha', 'required'); 

			if($this->form_validation->run() == true){
				$data['username'] = $this->input->post('username');

				$current_failed = $this->login_model->current_failed(strip_tags($this->input->post('username')), date('Y-m-d'));
				$current_lock = $this->login_model->current_lock(strip_tags($this->input->post('username')), date('Y-m-d'));

			    $password_encrypted = $this->input->post('password');
				 $password_decrypted = decode($password_encrypted);
				 $data['password'] = md5(strip_tags($password_decrypted));

				$page = trim($this->input->post('page'));
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
				//$data['password'] = $this->input->post('password');

				$checkLogin = $this->login_model->authenticate($data);
				$checkLock = $this->login_model->check_lock($data['username']);
                //$checkStaff = $this->login_model->chkstf($data);
                //if($checkStaff){die('nn');}else{die('mm');}
                //print_r($checkLogin);die();
				if($checkLogin && $checkLogin['role'] == 18 && $checkLogin['display'] == 't' && $checkcaptch == 't'){

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
					//$parta_status = get_parts_status_onid($checkLogin['id'], 'A');
					$parta_status = 1;
					if($parta_status && $page == 'statuspage'){
						redirect('/e-filing/list-completed'); 
					}elseif($parta_status){
						redirect('/e-filing');
					}
					else{
						$user_id=$this->session->userdata('user_id');
						$ref_no = get_refno_latest($user_id);
						redirect('/e-filing/form/(:num)/'.$ref_no); 
					}
				}

				else{
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

				/*else{
				//die('here2'); 
					$data['error_msg'] = '<div class="alert alert-info"><h4 class="m-0">Wrong email, password  or captcha, please try again.</h4></div>';
					$data['captcha'] =  $this->captcha();  
				} */
			}else{ 
				//die('here');
				$data['captcha'] =  $this->captcha();
				$data['error_msg'] = '<div class="alert alert-danger"><h4 class="m-0">Please fill all the mandatory fields.</h4></div>	'; 
			} 
		} else{
			$data['captcha'] =  $this->captcha();
			//$data['captcha'] =  $this->captcha();   //this is completely wrong
		}


        // Load view 
		$this->load->view('front/user/login.php', $data); 			
	} 

	/*public function register()
	{					
		$data['state'] = $this->common_model->getStateName();
		$this->load->view('front/user/register',$data);			
	}*/

	public function register()
	{					
		if($this->isUserLoggedIn){ 
			redirect('user/dashboard'); 
		}else{ 
			$this->load->view('front/user/register_new');
		} 			
	}

	public function getdistrict()
	{
		$query = $this->common_model->getDistrictNameByID($this->input->post('stateid'));	
		$output = '';	 
		if(!empty($query))
		{		 	
			foreach($query as $value)
			{
				$output .= '<option value="'.$value->district_code.'"'.set_select("p_dist_id", $value->district_code).'>'.$value->name.'</option>';
			}
			 
		}else{
			//echo "rrrrrrrrrrrrrrrrrrrr";
			foreach($query as $value)
			{
				$output .= '<option value="'.$value->district_code.'"'.set_select("p_dist_id", $value->district_code).'>'.$value->name.'</option>';
			}
		}	
		echo $output;	
	}


	public function getComplain()
	{
		$query = $this->common_model->getComplainByID($this->input->post('stateid'));		 
		if(!empty($query))
		{
			foreach($query as $value)
			{
				echo '<option value="'.$value->ps_id.'">'.$value->ps_desc.'</option>';


			}		 
		}		
	}


	public function getModifyWitness()
	{

		 	//echo $this->input->post('mod_party');
		 	//echo "in here";
		 	//echo $mod_party;die;
		$query = $this->common_model->getAddWitnessBycat($this->input->post('mod_party'));
		 //echo "<pre>";
		// print_r($query);die;
		//return json_encode($query);	 

		echo json_encode($query);	 

	}

/*changes forserver side
	public function getdistrict1()
	{
		$query = $this->common_model->getDistrictNameByID($this->input->post('stateid'));		 
		if(!empty($query))
		{
			foreach($query as $value)
			{
				echo '<option value="'.$value->district_code.'">'.$value->name.'</option>';
			}		 
		}		
	}
*/

	public function getdistrict1()
	{
		$query = $this->common_model->getDistrictNameByID($this->input->post('stateid'));
			$output = '';		 
		if(!empty($query))
		{
			foreach($query as $value)
			{
				$output .= '<option value="'.$value->district_code.'"'.set_select("ps_pl_dist_id", $value->district_code).'>'.$value->name.'</option>';
			}		 
		}else{
			//echo "rrrrrrrrrrrrrrrrrrrr";
			foreach($query as $value)
			{
				$output .= '<option value="'.$value->district_code.'"'.set_select("ps_pl_dist_id", $value->district_code).'>'.$value->name.'</option>';
			}
		}	
		echo $output;	
	}




	public function getdistrict2()
	{
		$query = $this->common_model->getDistrictNameByID($this->input->post('stateid'));		 
		if(!empty($query))
		{
			foreach($query as $value)
			{
				echo '<option value="'.$value->b_district_code.'">'.$value->name.'</option>';
			}		 
		}		
	}




	public function getdistrict3()
	{
		$query = $this->common_model->getDistrictNameByID($this->input->post('stateid'));		 
		if(!empty($query))
		{
			foreach($query as $value)
			{
				echo '<option value="'.$value->district_code.'">'.$value->name.'</option>';
			}		 
		}		
	}

	public function getdistrict4()
	{
		$query = $this->common_model->getDistrictNameByID($this->input->post('stateid'));		 
		if(!empty($query))
		{
			foreach($query as $value)
			{
				echo '<option value="'.$value->b_co_district_code.'">'.$value->name.'</option>';
			}		 
		}		
	}


	public function getModifyParty()
	{

		 	//echo $this->input->post('mod_party');
		 	//echo "in here";
		 	//echo $mod_party;die;
		$query = $this->common_model->getAddpartyBycat($this->input->post('mod_party'));
		 //echo "<pre>";
		// print_r($query);die;
		//return json_encode($query);	 

		echo json_encode($query);	 

	}

	public function getModifyParty_C()
	{

		 	//echo $this->input->post('mod_party');
		 	//echo "in here";
		 	//echo $mod_party;die;
		$query = $this->common_model->getAddpartyBycat_C($this->input->post('mod_party'));
		 //echo "<pre>";
		// print_r($query);die;
		//return json_encode($query);	 

		echo json_encode($query);	 

	}

	public function getModifyOfficeBear()
	{

		 	//echo $this->input->post('mod_party');
		 	//echo "in here";
		 	//echo $mod_party;die;
		$query = $this->common_model->getAddOfficeBycat($this->input->post('mod_party'));
		 //echo "<pre>";
		// print_r($query);die;
		//return json_encode($query);	 
		$query[0]->ob_identity_proof_doi = get_displaydate($query[0]->ob_identity_proof_doi);
		$query[0]->ob_identity_proof_vupto = get_displaydate($query[0]->ob_identity_proof_vupto);
		$query[0]->ob_idres_proof_doi = get_displaydate($query[0]->ob_idres_proof_doi);
		$query[0]->ob_idres_proof_vupto = get_displaydate($query[0]->ob_idres_proof_vupto);
		echo json_encode($query);	 

	}





	public function save(){
		$data['state'] = $this->common_model->getStateName();		
		$username= ($this->input->post('UserName'));
		$fname= ($this->input->post('firstName'));
		$lname= ($this->input->post('lastName'));
		$email= ($this->input->post('email'));
		$password= ($this->input->post('password'));
		$mobile= ($this->input->post('mobileNo'));
		$state= ($this->input->post('state_code'));
		$city= ($this->input->post('district_code'));
		$address= ($this->input->post('address'));
		$phone= ($this->input->post('phone_no'));		 
		$users = array(
			'username' => $username,
			'fname' => $fname,
			'lname' => $lname,
			'email' => $email,
			'password' => $password,
			'mobile' => $mobile,
			'address' => $address,
			'phone'=> $phone,
			'state'=>$state,
			'city'=>$city,	   
			'is_staff'=>FALSE,	   
			'role'=>18	   
		);		 
		$res_user = $this->login_model->register($users);
		if($res_user== true)
		{
			$this->session->set_flashdata('msg', 'User Successfully registered!');				
		  // $this->load->view('user/register','refresh');
			redirect('user/register', 'refresh');
		}
		

	}
	public function destroy()
	{
 			// print_r($this->session->userdata());
    	//echo "yogendra here";
         // echo "complain id: ". $this->session->userdata('a_complainant_id');die;

		$this->session->sess_destroy();
		$this->load->view('front/user/login.php');


	}
	/* ---------------------------OTP------------------------------------- */

	
	public function email_validation()
	{
		$this->form_validation->set_rules('email', 'Mobile no', 'required|trim|numeric');
		if($this->form_validation->run()){
			$this->send_otp();
		}else{
			$return_arr[] = array("val" => 'false',
				"error" => form_error('email'));

			echo json_encode($return_arr);
		}
	}

	public function service_validation_new()
	{
		$this->load->helper('email_helper');
		$service_name = $this->input->post('service_name');
		$service_id = $this->input->post('service_id');
		//die($service_id);
		if($service_name == 'email')
			$this->form_validation->set_rules('service_id', 'Email-id', 'required|trim|is_unique[users.email]|valid_email', array('is_unique' => 'Your Email id. is already registered. Please login through email and password.'));
		elseif($service_name == 'mobile')
			$this->form_validation->set_rules('service_id', 'Mobile no', 'required|trim|numeric|is_unique[users.mobile]', array('is_unique' => 'Your mobile no. is already registered. Please login through mobile no.'));

		if($this->form_validation->run()){
			$this->send_otp_new($service_name, $service_id);
		}else{
			$return_arr[] = array("val" => 'false',
				"error" => form_error('service_id'), "service_name" => $service_name);

			echo json_encode($return_arr);
		}
	}

	private function send_otp()
	{
		$email = $this->input->post('email');
		
		$data = $this->login_model->checkUserExist($email);
		if($data == 1){
			$otp = rand(11111,99999);
			$_SESSION['email'] = $email;
			$result = $this->login_model->updateOtp2($email, $otp);
			if($result){
				$subject = "OTP for login";
				$html = "
				Hi <p>Visitor</p>
				<p>Your system generated otp for one time password login is".$otp."
				</p>
				<p>Thanks,</p>
				";
				//$sended = $this->send_mail($email,$subject,$html);
				$sended = 1;

				if($sended){
					$return_arr[] = array("val" => 'true');

					echo json_encode($return_arr);
				}else{
					echo show_error($this->email->print_debugger());
				}
			}else{
				die("unable to update otp to users");
			}
		}
		if ($data == 0) {
			$otp = rand(11111,99999);
			$_SESSION['email'] = $email;
			$result = $this->login_model->insert_email($email, $otp);
			if($result){
				$subject = "OTP for login";
				$html = "
				Hi <p>Visitor</p>
				<p>Your system generated otp for one time password login is".$otp."
				</p>
				<p>Thanks,</p>
				";
				//$sended = $this->send_mail($email,$subject,$html);
				$sended = 1;

				if($sended){
					$return_arr[] = array("val" => 'true');

					echo json_encode($return_arr);
				}else{
					echo show_error($this->email->print_debugger());
				}
			}else{
				die("unable to insert record to users");
			}
		}
	}

	private function send_otp_new($service_name, $service_id)
	{
		//echo $service_name." service is called for".$service_id;die(' here');


		$data = $this->login_model->checkUserExist_new($service_name, $service_id);

		if ($data == 0) {
			$otp = rand(11111,99999);
			#$_SESSION['service_name'] = $service_name;
			$_SESSION['session_service_id'] = $service_id;
			//print_r($service_name);die;
			$tag = 'R';
			$data_exists = $this->login_model->check_otp_requests($service_name, $service_id, $tag);
			if($data_exists == 0)
				$result = $this->login_model->insert_otp_new($service_name, $service_id, $tag, $otp);
			elseif($data_exists == 1)
				$result = $this->login_model->update_otp_new($service_name, $service_id, $tag, $otp);
			if($result){

			
				//common code for email start
				$subject = "OTP for login";
				$html = "
				Hi <p>Visitor</p>
				<p>Your system generated otp for one time password login is".$otp."
				</p>
				<p>Thanks,</p>
				";
				$sended = sendMail($service_id, $subject, $html);
				//common code for email end


				if($sended == 1){
					$return_arr[] = array("val" => 'true', "service_name" => $service_name);

					echo json_encode($return_arr);
				}else{
					echo show_error($this->email->print_debugger());
				}
			}else{
				die("unable to insert record to otp_validator");
			}
		}else{
			die('user already registered!');
		}
	}

	public function otp_validation()
	{
		$this->form_validation->set_rules('otp', 'OTP', 'required|trim');
		if($this->form_validation->run()){
			$this->check_otp();
		}else{
			$return_arr[] = array("val" => 'false',
				"error" => form_error('otp'));

			echo json_encode($return_arr);
		}
	}

	public function otp_validation_new()
	{
		$service_name = $this->input->post('service_name');
		$otp = $this->input->post('otp');

		if($service_name == 'email')
			$this->form_validation->set_rules('otp', 'OTP', 'required|trim');
		elseif($service_name == 'mobile')
			$this->form_validation->set_rules('otp', 'OTP', 'required|trim');

		if($this->form_validation->run()){
			$tag = 'R';
			$this->check_otp_new($service_name, $otp, $tag);
		}else{
			$return_arr[] = array("val" => 'false',
				"error" => form_error('otp'), "service_name" => $service_name);

			echo json_encode($return_arr);
		}
	}

	public function check_otp()
	{
		$otp = $this->input->post('otp');
		$email = $_SESSION['email'];
		
		$data = $this->login_model->varifyOtp($email, $otp);
		if($data == 1){
			//$_SESSION['is_login'] = $email;
			$pub_data = $this->login_model->get_public_data($email);
			//print_r($pub_data['id']);die();

			$this->session->set_userdata('isUserLoggedIn', TRUE); 
			$this->session->set_userdata('userId', $pub_data['id']); 
			//redirect('admin/dashboard/'); 

        	$otp = '';  //successfully varified so empty otp
        	$result = $this->login_model->updateOtp($email, $otp);
        	if($result){
        		$return_arr[] = array("val" => 'true',
        			"msg" => 'success'
        		);

        		echo json_encode($return_arr);
        	}else{
        		die("unable to empty otp in users");
        	}
        }
        if ($data == 0) {
        	$return_arr[] = array("val" => 'true',
        		"msg" => 'fail'
        	);

        	echo json_encode($return_arr);
        }
    }

    public function check_otp_new($service_name, $otp, $tag)
	{
		#$otp = $this->input->post('otp');
		#$email = $_SESSION['email'];
		#$service_name = $_SESSION['service_name'];
		$session_service_id = $_SESSION['session_service_id'];
		//echo $session_service_id;die;
		$data = $this->login_model->varifyOtp_new($session_service_id, $otp, $service_name, $tag);
		if($data == 1){
			//print_r('matched');die;
			//$_SESSION['is_login'] = $email;
			//$pub_data = $this->login_model->get_public_data($email);
			//print_r($pub_data['id']);die();

			//$this->session->set_userdata('isUserLoggedIn', TRUE); 
			//$this->session->set_userdata('userId', $pub_data['id']); 
			//redirect('admin/dashboard/'); 

        	//$otp = '';  //successfully varified so empty otp
        	$result = $this->login_model->update_otp_validator($session_service_id, $otp, $service_name, $tag
        	);
        	$this->session->unset_userdata('session_service_id');
        	if($result){
        		$return_arr[] = array("val" => 'true',
        			"msg" => 'success',
        			"service_name" => $service_name
        		);

        		echo json_encode($return_arr);
        	}else{
        		die("unable to empty otp in users");
        	}
        }
        if ($data == 0) {
        	$return_arr[] = array("val" => 'true',
        		"msg" => 'fail',
        		"service_name" => $service_name
        	);

        	echo json_encode($return_arr);
        }
    }

    public function update_user_pass()
    {	
    $data['captcha'] =  $this->captcha();

    	if($this->isUserLoggedIn){ 
    		$con = array( 
    			'id' => $this->session->userdata('userId') 
    		); 
    		$data['user'] = $this->login_model->getRows($con);

            //print_r($data['user']['id']);die;

    		$data['menus'] = $this->menus_lib->get_menus($data['user']['role']);
    		$this->load->view('templates/front/fheader.php',$data);
    		$this->load->view('front/user/upd_pass'); 
    		$this->load->view('templates/front/ffooter.php',$data); 
    	}else{ 
    		redirect('user/register');
    	} 			
    }

    public function submit_user_pass()
    {
    	$data = $userData = array(); 
		//print_r($_POST);die('k');

    	if($this->isUserLoggedIn) 
    	{
    		$con = array( 
    			'id' => $this->session->userdata('userId') 
    		); 
    		$data['user'] = $this->login_model->getRows($con);
    		
        // If registration request is submitted 
    		if($this->input->post('submitform')){ 
				//die('k');
    			//$this->form_validation->set_rules('username', 'Username', 'required');
    			$this->form_validation->set_rules('password_old', 'old password', 'required'); 
    			$this->form_validation->set_rules('password', 'password', 'required'); 
    			$this->form_validation->set_rules('password2', 'confirm password', 'required|matches[password]');
    			$this->form_validation->set_rules('captcha', 'captcha', 'required');  

    			$ts = date('Y-m-d H:i:s', time());
    			$ip = $this->get_ip();
    			$password_encrypted = $this->input->post('password');
				$password_decrypted = decode($password_encrypted);
    			$userData = array( 
    				//'username' => strip_tags($this->input->post('username')),
    				'password' => md5($password_decrypted),
    				'updated_at' => $ts,
    				'last_login_remark' => 'User Updated Password',
    			); 
    			$old_password_encrypted = strip_tags($this->input->post('password_old'));
				$old_password_decrypted = decode($old_password_encrypted);
    			$old_password = md5($old_password_decrypted);
    						//echo $old_password;die;

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


    			if($this->form_validation->run() == true && $checkcaptch == 't'){ 
    				$id = $this->session->userdata('userId');
    				//print_r($this->session->userdata());die;
    				$check_old_password = $this->login_model->check_old_password($old_password, $id);
    				if($check_old_password == 1){
    				$update = $this->login_model->upd_pass($userData, $id); 
    				if($update){

    						 $log_data = array( 
				              'user_id' => $data['user']['id'], 
				              'username' => $data['user']['username'],
				              'form_type' => 'Update password form',  
				              'ip' => get_ip(),
				              'datetime' => date('Y-m-d H:i:s', time()),
				              'action_performed' => 'Change password',
				              'status' => 'Password Changed Successfully',
				              ); 
				              $insert_log = $this->login_model->loginlog_ins($log_data);   

				        $subject = "Changed Password Notification";
				$html = "
				Hello, 
				<p>Your Password has been changed.</p>
				<p>Regards,</p>				
				<p>Lokpal Of India</p>			
				<p>New Delhi</p>
				";

				$service_id= strip_tags($this->input->post('username'));
				
				$sended = sendMail($service_id, $subject, $html);

				if($sended == 1){
					$return_arr[] = array("val" => 'true', "service_name" => $service_name);

					echo json_encode($return_arr);
				}else{
					echo show_error($this->email->print_debugger());
				}




    					$this->session->set_flashdata('success_msg', '<div class="alert alert-success text-center"><h4 class="m-0">Username and password successfully updated.</h4></div>'); 
    					$data['captcha'] =  $this->captcha();
    					redirect('user/update_user_pass',$data); 
    				}else{ 					
    					
    					$this->session->set_flashdata('error_msg', '<div class="alert alert-danger text-center"><h4 class="m-0">Some problems occured, please try again.</h4></div>');
    					$data['captcha'] =  $this->captcha();
						redirect('user/submit_user_pass/',$data); 
						
    				}
    				} else{

    					//echo " at esle";die('@@@');

    						$log_data = array( 
				              'user_id' => $data['user']['id'], 
				              'username' => $data['user']['username'],
				              'form_type' => 'Update password form',  
				              'ip' => get_ip(),
				              'datetime' => date('Y-m-d H:i:s', time()),
				              'action_performed' => 'Change password',
				              'status' => 'Password Changed Failed',
				              ); 
				              $insert_log = $this->login_model->loginlog_ins($log_data); 
    					$this->session->set_flashdata('error_msg', '<div class="alert alert-danger text-center"><h4 class="m-0">Please enter all the mandatory fields.</h4></div>');
    					$data['captcha'] =  $this->captcha();
						redirect('user/submit_user_pass/',$data);
    				}
    			}else{ 
            	//echo validation_errors();
    				$this->session->set_flashdata('error_msg', '<div class="alert alert-danger text-center"><h4 class="m-0">Please fill all the mandatory fields.</h4></div>');
    				$data['captcha'] =  $this->captcha();
					redirect('user/submit_user_pass/',$data);
    			} 
    		} 

    		$con = array( 
    			'id' => $this->session->userdata('userId') 
    		); 
    		$data['user'] = $this->login_model->getRows($con);

    		$data['menus'] = $this->menus_lib->get_menus($data['user']['role']);
    		$data['captcha'] =  $this->captcha();
    		$this->load->view('templates/front/fheader.php',$data);
    		$this->load->view('front/user/upd_pass', $data); 
    		$this->load->view('templates/front/ffooter.php',$data);
    	}else{
    		redirect('user/register'); 
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

    public function logout(){     	
    		$con = array( 
    			'id' => $this->session->userdata('userId') 
    		); 
    		$data['user'] = $this->login_model->getRows($con);
            //print_r($data['user']['id']);die;
		$this->session->unset_userdata('isUserLoggedIn'); 
		$this->session->unset_userdata('userId'); 
		$status=$this->session->sess_destroy();	
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
			redirect('user/login/'); 
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

	//-----------------------------------------------------------------//

	public function otp_see()
	{
		$email = $this->input->post('email');
		
		if($email){
			$result = $this->login_model->see_otp($email);
			if($result){
					echo json_encode($result);
			}else{
				die("No otp found!");
			}
		}
	}

	//----------------------------------------------------------//




public function user_register(){
	$data['salution'] = $this->common_model->getSalution();
	$data['captcha'] =  $this->captcha();
	$this->load->view('front/user/user_registration.php',$data);
	
	/*
	if($this->isUserLoggedIn) 
		{
			echo "here";die;
			$con = array( 
				'id' => $this->session->userdata('userId') 
			); 
			$data['user'] = $this->login_model->getRows($con);
            //print_r($data);die('o');

			
			//echo json_encode($data->result_array());
			$this->load->view('front/user/user_registration.php', $data);
		}
		else{
			redirect('user/login'); 
		}*/
}


	public function new_user_save(){
		$data['salution'] = $this->common_model->getSalution();
		$ref_no=mt_rand();



		//if($this->isUserLoggedIn) 
		//{

        // If registration request is submitted 
			if($this->input->post('submitform')){ 
				$this->form_validation->set_rules('salutation_id', 'Tilte', 'required'); 
				$this->form_validation->set_rules('first_name', 'First Name', 'required'); 	
							
				$this->form_validation->set_rules('mobile', 'Mobile Number ', 'is_unique[users.mobile]|regex_match[/^[0-9]{10}$/]');
				$this->form_validation->set_rules('service_id', 'Email', 'valid_email|is_unique[users.email]|required'); 
				
				$this->form_validation->set_rules('password2', 'Confirm Password', 'required'); 
				$this->form_validation->set_rules('password', 'password', 'trim|required'); 
				$this->form_validation->set_rules('captcha_code', 'Captcha Code', 'required');
				//print_r($this->input->post());die;
				if($this->input->post('password')){
					$this->form_validation->set_rules('password2', 'confirm password', 'trim|matches[password]'); 			
				}

				$captcha_session = $this->session->all_userdata('captchaCode');

			 $password_encrypted = $this->input->post('password'); 
			  	$password_decrypted = decode($password_encrypted);

			   $data['password'] = md5(strip_tags($password_decrypted));
			   $password_md5=$data['password']; 


				//print_r($captcha_session['captchaCode']);die;
				//echo $data['captcha']['word'];
				
				$ts = date('Y-m-d H:i:s', time());
				$ip = $this->get_ip();
				$userData = array( 
					'username' => strip_tags($this->input->post('service_id')), 
					'email' => strip_tags($this->input->post('service_id')), 
					'password' =>  $password_md5,  
					'mobile' => strip_tags($this->input->post('mobile')), 
					'role'=>18,					
					'is_staff' => FALSE,
					'display' => TRUE,
					'create_date' => $ts,
					'ip' => $ip,
				); 
				if($this->form_validation->run() == true){
					//echo "here";die('@@@@');
					$captcha_code=$this->input->post('captcha_code');

					if($captcha_code == $captcha_session['captchaCode'])
			   		{
			    		$checkcaptch='t';
			    	}
			    	else
			    	{
						$checkcaptch='f';
			    	}

					if($checkcaptch == 't')
					{
						$insert = $this->users_model->user_register($userData); 
				
						if($insert){ 

				 			$user_id=$this->db->insert_id();

				 			$user_profile_data = array( 
								'salutation_id' => strip_tags($this->input->post('salutation_id')),
								'first_name' => strip_tags($this->input->post('first_name')), 
								'middle_name' => strip_tags($this->input->post('mid_name')), 
								'last_name' => strip_tags($this->input->post('sur_name')),
								'user_id' => $user_id,									
								'created_at' => $ts,
								'ip' => $ip,
								); 
							$user_profile = $this->users_model->user_profile_insert($user_profile_data); 

							if($user_profile){
								$partaData = array( 
									'ref_no'=>$ref_no,
									'salutation_id' => strip_tags($this->input->post('salutation_id')),
									'first_name' => strip_tags($this->input->post('first_name')), 
									'mid_name' => strip_tags($this->input->post('mid_name')), 
									'sur_name' => strip_tags($this->input->post('sur_name')), 
									'email_id' => strip_tags($this->input->post('service_id')),
									'mob_no' => strip_tags($this->input->post('mobile')),
									'user_id' => $user_id,
					 				'filing_status' => 'false',
					 				'flag'=>'EF',										
									'created_at' => $ts,
									'ip' => $ip,
									); 

							
								$partaData = $this->users_model->user_parta_data_insert($partaData); 

								if($partaData){

									$this->session->set_flashdata('success_msg', '<div class="alert alert-success text-center"><h4 class="m-0">Account registration has been successful. Please login to lodge a complaint.</h4></div>');
									redirect('user/login');
								}else{
									$data['error_msg'] = '<div class="alert alert-danger text-center"><h4 class="m-0">Some problems occured, please try again.</h4></div>';
									$data['captcha'] =  $this->captcha();
								}

								}else{
									$data['error_msg'] = '<div class="alert alert-danger text-center"><h4 class="m-0">Some problems occured, please try again.</h4></div>';
									$data['captcha'] =  $this->captcha();  
								}

								}else{
									$data['error_msg'] = '<div class="alert alert-danger text-center"><h4 class="m-0">Some problems occured, please try again.</h4></div>';
									$data['captcha'] =  $this->captcha();  
								}
					}

					else{
						$data['error_msg'] = '<div class="alert alert-danger text-center"><h4 class="m-0">Captcha is incorrect. Try Again</h4></div>';
						$data['captcha'] =  $this->captcha(); 

					}

				}
					
                else{
            		//echo validation_errors();
					$data['salution'] = $this->common_model->getSalution();
					$data['error_msg'] = '<div class="alert alert-info text-center"><h4 class="m-0">Please fill all the mandatory fields.</h4></div>';
					$data['captcha'] =  $this->captcha();  
					}
			}else{
				$data['captcha'] =  $this->captcha(); 
				$captcha_session = $this->session->all_userdata('captchaCode');
				echo $captcha_session['captchaCode'];
			}
				
			$this->load->view('front/user/user_registration', $data);
		
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

    public function forget_password(){
	$data['captcha'] =  $this->captcha();

	if($this->session->userdata('success_msg')){ 
			$data['success_msg'] = $this->session->userdata('success_msg'); 
			$this->session->unset_userdata('success_msg'); 
		} 
		if($this->session->userdata('error_msg')){ 
			$data['error_msg'] = $this->session->userdata('error_msg'); 
			$this->session->unset_userdata('error_msg'); 
		} 

	$this->load->view('front/user/forget_password.php',$data);
}

    public function forget_password_action(){ 
    	//print_r($_POST);die;

    	//echo "forget";die('forget_password_action');
		//print_r($this->session->all_userdata('captchaCode'));
    	$ts = date('Y-m-d H:i:s', time());
    	//$query1 = $this->scrutiny_model->upd_scrutiny_data_as_undefective_his($id);	
		if($this->session->userdata('success_msg')){ 
			$data['success_msg'] = $this->session->userdata('success_msg'); 
			$this->session->unset_userdata('success_msg'); 
		} 
		if($this->session->userdata('error_msg')){ 
			$data['error_msg'] = $this->session->userdata('error_msg'); 
			$this->session->unset_userdata('error_msg'); 
		} 

        // If login request submitted 
		if($this->input->post('userloginSubmit')){ 

			//print_r($_POST);die;
			$this->form_validation->set_rules('username', 'Username', 'trim|required|valid_email'); 

			$this->form_validation->set_rules('captcha', 'captcha', 'required'); 

			if($this->form_validation->run() == true){
				//print_r($_POST);die;
				$data['username'] = $this->input->post('username');
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

				//$data['password'] = $this->input->post('password');
		
			 	$username_exist=$data['username'];
			 	//print_r($username_exist);die;
				$checkUserNameExistance = $this->login_model->checkUserName($username_exist);			
				 $myArray=(array)$checkUserNameExistance;
  				 $id= $myArray[0]->id ?? '';
  				$username= $myArray[0]->username ?? '';	

  				$service_name = 'email';
  				$service_id = $username;
  				$tag = 'FP';
  				$otp = rand(11111,99999);
  				$data_exists = $this->login_model->check_otp_requests($service_name, $service_id, $tag);
					if($data_exists == 0)
				$result = $this->login_model->insert_otp_new($service_name, $service_id, $tag, $otp);
					elseif($data_exists == 1)
				$result = $this->login_model->update_otp_new($service_name, $service_id, $tag, $otp);
				if (!empty($id) && $checkcaptch == 't')
				{
					//email code
					//common code for email start
					$_SESSION['session_service_id'] = $username;
					$subject = "OTP for forget password";
					$html = "
					Hi <p>Visitor</p>
					<p>Your system generated otp for one time password change is".$otp."
					</p>
					<p>Thanks,</p>
					";
					$sended = sendMail($username, $subject, $html);
					//echo $sended;die;
					//common code for email end
			if($sended == 1){
				//die('ff');
			$this->session->set_flashdata('success_msg', '<div class="alert alert-success text-center"><h4 class="m-0">OTP is successfully sent to your email id.</h4></div>');  
			redirect('user/forget_password_step2'); 
			}   
			else{
    					$this->session->set_flashdata('error_msg', '<div class="alert alert-danger text-center"><h4 class="m-0">Some problems occured, please try again.</h4></div>');
						redirect('user/forget_password/'); 
						$data['captcha'] =  $this->captcha();  
    				}    

				}elseif(empty($id)){
					$this->session->set_flashdata('error_msg', '<div class="alert alert-danger text-center"><h4 class="m-0">Email id is not registered.</h4></div>');
						redirect('user/forget_password/'); 
						$data['captcha'] =  $this->captcha();
				}else{
					$this->session->set_flashdata('error_msg', '<div class="alert alert-danger text-center"><h4 class="m-0">Captcha is wrong! Please try again.</h4></div>');
						redirect('user/forget_password/'); 
						$data['captcha'] =  $this->captcha();

				}						
		} 

		else{
				//die('here2'); 
						$this->session->set_flashdata('error_msg', '<div class="alert alert-danger text-center"><h4 class="m-0">Email or capcha is invalid.</h4></div>');						
							redirect('user/forget_password/'); 					
					redirect('user/forget_password'); 
						$data['captcha'] =  $this->captcha();  
				} 

        // Load view 
				$data['captcha'] =  $this->captcha();  
		$this->load->view('front/user/forget_password.php', $data); 			
	} 
}

    public function forget_password_step2(){
	$data['captcha'] =  $this->captcha();

	if($this->session->userdata('success_msg')){ 
			$data['success_msg'] = $this->session->userdata('success_msg'); 
			$this->session->unset_userdata('success_msg'); 
		} 
		if($this->session->userdata('error_msg')){ 
			$data['error_msg'] = $this->session->userdata('error_msg'); 
			$this->session->unset_userdata('error_msg'); 
		} 

	$this->load->view('front/user/forget_password_step2.php',$data);
}

    public function forget_password_step2_action(){ 

    	//echo "forget";die('forget_password_action');
		//print_r($this->session->all_userdata('captchaCode'));
    	$ts = date('Y-m-d H:i:s', time());
    	//$query1 = $this->scrutiny_model->upd_scrutiny_data_as_undefective_his($id);	
		if($this->session->userdata('success_msg')){ 
			$data['success_msg'] = $this->session->userdata('success_msg'); 
			$this->session->unset_userdata('success_msg'); 
		} 
		if($this->session->userdata('error_msg')){ 
			$data['error_msg'] = $this->session->userdata('error_msg'); 
			$this->session->unset_userdata('error_msg'); 
		} 

        // If login request submitted 
		if($this->input->post('userloginSubmit')){ 

			$this->form_validation->set_rules('password2', 'Confirm Password', 'required'); 
				$this->form_validation->set_rules('password', 'password', 'trim|required');  
			$this->form_validation->set_rules('captcha', 'captcha', 'required'); 
			$this->form_validation->set_rules('otp', 'OTP', 'required'); 
			if($this->input->post('password')){
					$this->form_validation->set_rules('password2', 'confirm password', 'trim|matches[password]'); 			
				}


			if($this->form_validation->run() == true){
			    $password_encrypted = $this->input->post('password');
				$password_decrypted = decode($password_encrypted);
			    $data['password'] = md5(strip_tags($password_decrypted));
			    $password_md5=$data['password'];
			    $data['captcha_input'] = trim($this->input->post('captcha'));
			    $captcha_session = $this->session->all_userdata('captchaCode');
			    $otp = trim($this->input->post('otp'));
			   // print_r($data['captcha_input']);		  
			    if($data['captcha_input'] == $captcha_session['captchaCode'])
			    {
			    	$checkcaptch='t';
			    }
			    else
			    {
				$checkcaptch='f';
			    }	  
				
				if ($checkcaptch == 't')
				{
					$service_name = 'email';
					$tag = 'FP';
					$session_service_id = $_SESSION['session_service_id'];
					$data = $this->login_model->varifyOtp_new($session_service_id, $otp, $service_name, $tag);
					if($data == 1){
        				$result = $this->login_model->update_otp_validator($session_service_id, $otp, $service_name, $tag);
        				$this->session->unset_userdata('session_service_id');

        				if($result){
						$user_data = array( 									
						'password'	=>$password_md5,														
						'updated_at' => $ts,
						'ip' => $ip,
						);
						$query1 = $this->login_model->forget_pass_his_ins($session_service_id);				
						$update = $this->login_model->forget_pass_change($user_data,$session_service_id); 
						if($update){
							$this->session->set_flashdata('success_msg', '<div class="alert alert-success text-center"><h4 class="m-0">Password successfully updated.</h4></div>');  
							redirect('user/login'); 
						}   
						else{
    						$this->session->set_flashdata('error_msg', '<div class="alert alert-danger text-center"><h4 class="m-0">Some problems occured, please try again.</h4></div>');
							redirect('user/forget_password_step2/'); 
							$data['captcha'] =  $this->captcha();  
    					}
    				}else{
    					$this->session->set_flashdata('error_msg', '<div class="alert alert-danger text-center"><h4 class="m-0">Some problems occured, please try again.</h4></div>');
							redirect('user/forget_password_step2/'); 
							$data['captcha'] =  $this->captcha();
    				}    

				}else{
					$this->session->set_flashdata('error_msg', '<div class="alert alert-danger text-center"><h4 class="m-0">OTP does not match. Please try again.</h4></div>');
							redirect('user/forget_password_step2/'); 
							$data['captcha'] =  $this->captcha();
				}
				
						
		} 

		else{
				//die('here2'); 
						$this->session->set_flashdata('error_msg', '<div class="alert alert-danger text-center"><h4 class="m-0">Captcha does not match.</h4></div>');						
							redirect('user/forget_password_step2/'); 					
					redirect('user/forget_password'); 
						$data['captcha'] =  $this->captcha();  
				} 
		
	}else{
		$this->session->set_flashdata('error_msg', '<div class="alert alert-danger text-center"><h4 class="m-0">Password, Confirm, OTP or Captcha is invalid. Please try again.</h4></div>');						
							redirect('user/forget_password_step2/'); 					
					redirect('user/forget_password'); 
						$data['captcha'] =  $this->captcha();  

	}	 
}
		        // Load view 
				$data['captcha'] =  $this->captcha();  
		$this->load->view('front/user/forget_password_step2.php', $data); 
}


}

