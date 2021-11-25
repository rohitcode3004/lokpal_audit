<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('convertToBase64'))
 {

 function log_status_update($filing_no,$user_id, $lk_status, $comp_status)
{
	 $CI =& get_instance();
	$ts = date('Y-m-d H:i:s', time());

		/*echo $filing_no;
		echo $user_id;
		echo  $lk_status;
		echo $comp_status;*/


			  $CI->load->model('scrutiny_model');
			 $log_status_exist = $CI->scrutiny_model->log_status_exists($filing_no);
			if($log_status_exist)
			{
				//echo "";die('hee1');
				$query1 =$CI->scrutiny_model->log_status_history_insert($filing_no);
				if($query1)	{

					
					$query2 = $CI->scrutiny_model->log_status_delete($filing_no);
					if($query2){
							$log_status_data = array(
								'filing_no' => $filing_no,
								'user_id' => $user_id,
								'lk_status' => $lk_status,
								'comp_status' => $comp_status,
								'created_at' => $ts,
								'updated_at' => $ts,
								'ip' => get_ip(),
						);
						$query3 = $CI->scrutiny_model->log_status_insert($log_status_data);
					}else{
						die('unable to delete');
					}
				}else{
					die('error');
				}		
			}
			else
			{
				//echo "here";die('hee2');
				$log_status_data = array(
								'filing_no' => $filing_no,
								'user_id' => $user_id,
								'lk_status' => $lk_status,
								'comp_status' => $comp_status,
								'created_at' => $ts,
								'ip' => get_ip(),
						);
			$query2 = $CI->scrutiny_model->log_status_insert($log_status_data);
			}

			}
}