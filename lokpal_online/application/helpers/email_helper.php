<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('convertToBase64'))
 {
function sendMail($email,$subject,$html)
 {
  $config = Array(
  	'protocol' => 'smtp',
  	'smtp_host' => 'ssl://smtp.googlemail.com',
  	'smtp_port' => 465,
  	'smtp_user' => '007rohit.bisht@gmail.com', // change it to yours
  	'smtp_pass' => '01382.ktd', // change it to yours
  	'mailtype' => 'html',
  	'charset' => 'iso-8859-1',
  	'wordwrap' => TRUE
	);

    $message = $html;
      $CI =& get_instance();
      $CI->load->library('email', $config);
      $CI->email->set_newline("\r\n");
      $CI->email->from('007rohit.bisht@gmail.com'); // change it to yours
      $CI->email->to($email);// change it to yours
      $CI->email->subject($subject);
      $CI->email->message($message);
      if($CI->email->send())
     	{
      	return 1;
     	}
      else
    	{
     	show_error($CI->email->print_debugger());
    }
 }
 
}