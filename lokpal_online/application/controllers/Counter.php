<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Counter extends CI_Controller {
	public function __construct(){
		parent::__construct();
		
		$this->load->library('Menus_lib');
		$this->load->model('login_model');
		$this->load->model('report_model');
		$this->load->model('filing_model');
		$this->load->helper("parts_status_helper");
		$this->load->helper("compno_helper");
		$this->load->library('html2pdf');
		$this->load->helper("date_helper");
		$this->load->library('label');
		$this->load->helper("user_helper");	
		$this->load->library('session');
		$this->load->helper("user_helper");	
		$this->load->helper("common_helper");	
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
        		$this->con = array( 
				'id' => $this->session->userdata('userId') 
			);
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

	public function dashboard()
	{	
		$data['user'] = $this->login_model->getRows($this->con);

            //print_r($data['user']['id']);die;

		$data['menus'] = $this->menus_lib->get_menus($data['user']['role']);

		$data['user_comps'] = $this->report_model->get_counter_complaints_status($data['user']['id']);

	  		//print_r($data['user_comps']);die('kk');
		$this->load->helper("compno_helper");
		$this->load->view('templates/front/header2.php',$data);

		$this->load->view('filing/dashboard_counter.php',$data);
	}

	public function dashboard_main()
	{	
		$data['user'] = $this->login_model->getRows($this->con);

            //print_r($data['user']['id']);die;

		$data['menus'] = $this->menus_lib->get_menus($data['user']['role']);

		$data['total_log'] = $this->filing_model->get_total_cfiling($data['user']['id']);
		$data['pend_log'] = $this->filing_model->get_pend_cfiling($data['user']['id']);
		$data['scr_log'] = $this->filing_model->get_scr_cfiling($data['user']['id']);

	  		//print_r($data['total_log']);die('kk');
		$this->load->helper("compno_helper");
		$this->load->view('templates/front/header2.php',$data);

		$this->load->view('filing/dashboard_main_counter.php',$data);
	}

	public function dashboard_registry()
	{	
		$data['user'] = $this->login_model->getRows($this->con);
		if(!($data['user']['role'] == 143))
			redirect('Error_controller/access_denied_error');
		
		$data['user'] = $this->login_model->getRows($this->con);

            //print_r($data['user']['id']);die;

		$data['menus'] = $this->menus_lib->get_menus($data['user']['role']);

		$data['user_comps'] = $this->filing_model->get_counter_complaints();

	  		//print_r($data['user_comps']);die('kk');
		$this->load->helper("compno_helper");


		$this->load->view('templates/front/CE_Header.php',$data);

		$this->load->view('filing/dashboard_registry.php',$data);

		$this->load->view('templates/front/CE_Footer.php',$data);
	}

	public function dashboard_main_registry()
	{	
		$data['user'] = $this->login_model->getRows($this->con);
		if(!($data['user']['role'] == 143))
			redirect('Error_controller/access_denied_error');

		$data['user'] = $this->login_model->getRows($this->con);
		$data['role'] = $data['user']['role'];

            $user_id=$data['user']['id'];

		$data['menus'] = $this->menus_lib->get_menus($data['user']['role']);

		$data['total_log'] = $this->filing_model->get_total_cfiling();
		$data['pend_log'] = $this->filing_model->get_pend_cfiling();
		$data['scr_log'] = $this->filing_model->get_scr_cfiling();

		$data['re_entry_complaint'] = $this->filing_model->get_re_entry($user_id);

	  		//print_r($data['total_log']);die('kk');
		$this->load->helper("compno_helper");
		//$data['user_comps'] = $this->filing_model->get_counter_complaints();
		if($data['user']['role'] == 143)
			$this->load->view('templates/front/CE_Header.php',$data);
		else if($data['user']['role'] == 161 || $data['user']['role'] == 162)
			$this->load->view('templates/front/SC_Header.php',$data);
		$this->load->view('filing/dashboard_main_registry.php',$data);

		$this->load->view('templates/front/CE_Footer.php',$data);
	}

	public function counterfiling($dash_ref_no=NULL){

		$data['user'] = $this->login_model->getRows($this->con);
		if(!($data['user']['role'] == 131 || $data['user']['role'] == 161 || $data['user']['role'] == 162))
			redirect('Error_controller/access_denied_error');

		$data['user'] = $this->login_model->getRows($this->con);
		$data['role'] = $data['user']['role'];

		$this->load->helper("date_helper");
		$this->load->helper("compno_helper");
		if($dash_ref_no == NULL ){
			$ref_no=$this->session->userdata('ref_no');
		}else{
		    //$ref_no=$this->session->userdata('ref_no');
			$ref_no = $dash_ref_no;
			$this->session->set_userdata('ref_no',$ref_no);
		}
		if($data['user']['role'] == 161 || $data['user']['role'] == 162)
		{
			$data['received'] = $this->filing_model->getRecieved_by($data['user']['role']);
		}
		else
		{
			$data['received'] = $this->filing_model->getRecieved_by($data['user']['role']);
		}

		$data['mode'] = $this->filing_model->getMode_by();
		$data['menus'] = $this->menus_lib->get_menus($data['user']['role']);
		 //print_r($data['menus']->result());die('kk');
		if($data['user']['role'] == 131)
			$this->load->view('templates/front/RC_Header.php',$data);
		else if($data['user']['role'] == 161 || $data['user']['role'] == 162)
			$this->load->view('templates/front/SC_Header.php',$data);
  		$this->load->view('filing/counterfiling.php',$data);
  		$this->load->view('templates/front/CE_Footer.php',$data);
		
	}


	public function countersave()
	{

		$data['user'] = $this->login_model->getRows($this->con);
		$userid=$data['user']['id'];

		$curYear = date('Y');
		$cur_year=$curYear;
		 $diary= $this->filing_model->getAckNo($cur_year);

		
		 $ack_no=$diary['max'];
		//echo $ack_no=$diary['max'];

		//die();
		if($ack_no=='')
		{
			$ack_no='1';
		}
		else
		{
			$ack_no=($ack_no+1);
		}

		//echo $ack_no;die;
		if($this->input->post('recieved_by') != '')
		{
			

			$complaint_no=mt_rand();	
			$ref_no=$complaint_no;
			$from= ($this->input->post('from'));
			$to= ($this->input->post('to'));
			$recieved_by= ($this->input->post('recieved_by'));

			$s_name= ($this->input->post('s_name'));
			if($s_name !='')
			{
				$sender_name=$s_name;
			}
			else
			{
				$sender_name= ($this->input->post('sender_name'));
			}
			$mode_id= ($this->input->post('mode_id'));
			if($mode_id=='')
			{
				$mode_id='0';


			}

			$counter_mob_no= ($this->input->post('counter_mob_no'));
			$dt_of_filing= ($this->input->post('dt_of_filing'));

			$email_from= ($this->input->post('email_from'));
			$email_to= ($this->input->post('email_to'));
			$email_date= ($this->input->post('email_date'));
			$email_date= get_entrydate($email_date);
			if($recieved_by=='1' OR $recieved_by=='2' )
			{
				$email_date=NULL;
			}


				//echo $recieved_by;
				//echo $email_date;die;
			$dt_of_filing= get_entrydate($dt_of_filing);

			$sys_date = date('Y-m-d');
			if($dt_of_filing!=$sys_date){
				die('date mismatch!');
			}

			$phisical_copy_received='0';

			$user_id=$userid;
			//$diary_no=$diary_no;
			$counter_filing = array( 
				'cur_year'=>$curYear,
				'ref_no'=>$ref_no,	
				'from' => $from,
				'to' => $to,
				'recieved_by' => $recieved_by,
				'sender_name' => $sender_name,
				'mode_id' => $mode_id,
				'counter_mob_no' => $counter_mob_no,
				'entry_date' => $dt_of_filing,
				'user_id'=>$userid,
				'ack_no' => $ack_no,
				'email_from' => $email_from,
				'email_to' => $email_to,
				'email_date' => $email_date,
				'phisical_copy_received'=>$phisical_copy_received,
			);
			$counter_filing = $this->filing_model->counterfilingadd($counter_filing);
			if($counter_filing)
			{
				$ins_data = array( 
					'ref_no'=>$ref_no,	
				//'user_id'=>$userid,
					'created_at' => $dt_of_filing,
					'flag'=>'CF',
					'filing_status'=>'f',
				);
				$add_compdet_parta = $this->filing_model->compdet_parta_ins($ins_data);
			}
			else
			{
				die('something went wrong');
			}
		}
		$data['diary_counter']=$this->filing_model->getCounterData($ref_no);		
		$this->session->set_userdata('counter_ref_no',$ref_no);
		if($counter_filing && $add_compdet_parta)
		{ 
			$log_data = array( 
					'user_id' => $userid, 
					'username' => $data['user']['username'],
					'form_type' => 'A',  
					'ip' => get_ip(),
					'datetime' => date('Y-m-d H:i:s', time()),
					'action_performed' => 'Ack Form Submitted',
					'status' => 'Ack Form Submitted Successfully',
				); 
					$insert_log = $this->login_model->loginlog_ins($log_data); 
			$this->session->set_flashdata('success_msg', 'Acknowledgement no generated successfully.'); 
		}else{
			$log_data = array( 
					'user_id' => $userid, 
					'username' => $data['user']['username'],
					'form_type' => 'A',  
					'ip' => get_ip(),
					'datetime' => date('Y-m-d H:i:s', time()),
					'action_performed' => 'Ack Form Submitted',
					'status' => 'Ack Form Submition Failed',
				); 
					$insert_log = $this->login_model->loginlog_ins($log_data); 
		}          
		redirect('/counter/counterfiling'); 
	}

	public function printacknowedment()
	{
		ob_clean();
		ob_flush(); 
		$ref_no=$this->session->userdata('counter_ref_no');
		$counterdata = $this->filing_model->getCounterFilingdata($ref_no);
		$ack_no=$counterdata['ack_no'];
		$cur_year=$counterdata['cur_year'];
		//$chkdate= date("l jS \of F Y");

		$curYear = date('Y');
		$curMonth = date('m');
		$curDay = date('d');
		$cur_date = $curDay.'/'.$curMonth.'/'.$curYear;
		$cur_date12 = $curDay.'/'.$curMonth.'/'.$curYear;
                      //  $comp_f_date="$curYear-$curMonth-$curDay"; 
		$cur_date="$curDay-$curMonth-$curYear";     

		ini_set('set_time_limit', 0);
		ini_set('memory_limit', '-1');
		ini_set('xdebug.max_nesting_level', 2000);
		$this->html2pdf->folder('./assets/');
		$this->html2pdf->paper('A4', 'portrait', 'fr');    
		$getallwidget =     '		
		<div align="right" font-size="10"><b> Date-</b> '.$cur_date.'</div>
		<br>
		<br></br>              
		<div><b> Sub: Acknowledgement of your letter.</b></div>
		<br></br><br></br>
		<div> Dear Sir/ Madam,</div>
		<br><br>
		<div><justify>Your letter has been received. For future communication please refer to the Acknowledgement <br>
		number '.$ack_no.'/'.$cur_year.'.</justify></div>
		<br></br><br></br>		
		Regards,                 
		<br><br>
		Receipt Counter <br>
		Lokpal of India
		<br></br><br></br>

		</div>


		</div>    
		';

                       //echo $getallwidget;die;

		$file                           =    $ref_no;
		$filename                       =     $file;
     // $this->data['main_content']           =     'view_widget_report_pdf';
		$html                       =     $getallwidget;
		$this->html2pdf->filename($filename.".pdf");
		$this->html2pdf->html($html);
		$this->html2pdf->create('open');

		exit;

	}

	public function counterfilingreport(){	

		$data['user'] = $this->login_model->getRows($this->con);

		$this->load->helper("date_helper");	
		$this->load->helper("compno_helper");
		$userid=$data['user']['id'];
		$data['menus'] = $this->menus_lib->get_menus($data['user']['role']);
		$data['counter_filing_data'] = $this->filing_model->getCounterFilingAllData($userid);
		$this->load->view('filing/counterfilingreport.php',$data);	
	}


	public function exportpdf(){ 
	//echo "in here";die;

		ob_clean();
		ob_flush(); 
		$con = array( 
			'id' => $this->session->userdata('userId') 
		); 
		$data['user'] = $this->login_model->getRows($con);

		$this->load->helper("date_helper");	
		$this->load->helper("compno_helper");
		$userid=$data['user']['id'];
		$datafilingcounter = $this->filing_model->getCounterFilingAllData($userid);
		$myArray=(array)$datafilingcounter;    
		$datafilingcounter=count($myArray);

//echo "<pre>";
//print_r($myArray);die;
		$counterList ='';
		$rowNo = 1;
		if($myArray){
			foreach ($myArray as $key => $value) {
				$counterList .= '
				<tr>  
				<td align="center">'.$rowNo.'<br> </td>   
				<td align="center">'.$value->from.'</td>  
				<td align="center">'.$value->to.'</td>
				<td align="center">'.$value->ack_no.'/'.$value->cur_year.'</td>
				<td align="center">'.$value->counter_mob_no.'</td>
				<td align="center">'.get_entrydate($value->entry_date).'</td>
				</tr>

				';
				$rowNo++;
			}
		}

		$chkdate= date("l jS \of F Y");

		ini_set('set_time_limit', 0);
		ini_set('memory_limit', '-1');
		ini_set('xdebug.max_nesting_level', 2000);
		$this->html2pdf->folder('./assets/');
		$this->html2pdf->paper('A4', 'portrait', 'fr');

		$getallwidget =     '<div><div align="center"><b>Submission of Complaint Report</b>
		</div><br><br>
		<table style="width: 100%; border:2px solid; border-collapse: collapse; padding: 0; margin: 0;">
		<tr style="background:#CCC">
		<th>Sr No</th>
		<th>From</th>
		<th>To</th>
		<th>Diary No</th>   
		<th>Mobile No</th>
		<th>Date of Filing</th>        
		</tr>
		';
		$getallwidget .=  $counterList;
		';
		</table>';
		$getallwidget .='           

		</div>    
		';

                       //echo $getallwidget;die;

		$file                           =    'counterfilingdata';
		$filename                       =     $file;
     // $this->data['main_content']           =     'view_widget_report_pdf';
		$html                       =     $getallwidget;
		$this->html2pdf->filename($filename.".pdf");
		$this->html2pdf->html($html);
		$this->html2pdf->create('open');
    //$html2pdf->Output('C:\Bitnami\wappstack-7.2.22-0\apache2\htdocs\.'.$filename. 'F');

		exit;


	}


	public function casestatus(){
		$data['user'] = $this->login_model->getRows($this->con);

		$this->load->helper("date_helper");	
		$this->load->helper("compno_helper");
		$userid=$data['user']['id'];
		$data['menus'] = $this->menus_lib->get_menus($data['user']['role']);
		$this->load->view('filing/case_status.php',$data);
	}


	public function searchcase(){
		$data['user'] = $this->login_model->getRows($this->con); 
		$data['menus'] = $this->menus_lib->get_menus($data['user']['role']);
		$this->load->helper("date_helper");	
		$this->load->helper("compno_helper");
		$userid=$data['user']['id'];
		$ack_no_year= ($this->input->post('ack_no_year'));
		$var = preg_split("#/#", $ack_no_year); 
		$ackno=$var['0'];
		$ackyear=$var['1'];
		$data['Receipt_Data']= $this->report_model->getStatus($ackno,$ackyear);
		if ($data['Receipt_Data'] == true){
			echo 'success';
		}else{
			$data['error'] = 'Acknowledgement not generated';
       //$this->load->view('filing/case_status.php',$data);
		}

//echo "<pre>";
//print_r($data['partyPartaPartC']);
	//echo "here";die;

 /*$ref_no=$data['diary'][0]->ref_no; 
$data['diary_no']= $this->report_model->getFilingno($ref_no);

//echo "<pre>";
//print_r($data['diary_no']);

 $filing_no=$data['diary_no'][0]->filing_no;

$data['partyPartaPartC']= $this->report_model->getPartyDetail($filing_no);


//echo "<pre>";
//print_r($data['partyPartaPartC']);
	//echo "here";die;
*/
	//$this->load->view('templates/front/header2.php',$data);
$this->load->view('filing/case_status_detail.php',$data);
}


public function update_counter_filing_data(){			
			//echo '<pre>';
	$value  = json_decode($_POST['allids']);
			//echo '<pre>';print_r($value);
	$flag = 0;
	for($i=0;$i<count($value);$i++){
		$data = explode(':::', $value[$i]);
		if(!empty($data[0])){
					//echo $data[0].' : '.$data[1];

			$id=$data[0];				
					// $listing_date=$data[1];			
					//echo $id." : ".$listing_date." ::: ";
					// $listing_date = get_entrydate($listing_date);
			$modifycounter = $this->report_model->upd_counter_filing($id);  
			$flag = 1;
		}

	}
	if($flag == 1){
			//echo 'success';
		echo json_encode(array('success' => 'success'));
	}else{
		echo json_encode(array('data'=>'fail'));
	}


}





}
?>