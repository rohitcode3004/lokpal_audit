<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('convertToBase64'))
 {
function sendMail($email,$subject,$html)
 {
  $config = Array(
  	'protocol' => 'smtp',
  	'smtp_host' => 'ssl://smtp.googlemail.com',
  	'smtp_port' => 465,
  	'smtp_user' => 'cietrohit@gmail.com', // change it to yours
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

 function sendMail_2($email,$subject,$html)
 {
      $CI =& get_instance();
      $CI->load->library('PHPMailer_Lib');

      $objMail = $CI->phpmailer_lib->load();
        // SMTP configuration
        $objMail->isSMTP();
        $objMail->Host     = 'ssl://smtp.googlemail.com';
        $objMail->SMTPAuth = true;
        $objMail->Username = '007rohit.bisht@gmail.com';
        $objMail->Password = '01382.ktd';
        $objMail->SMTPSecure = 'ssl';
        $objMail->Port     = 465;
        
        $objMail->setFrom('info@example.com', 'CodexWorld');
        $objMail->addReplyTo('info@example.com', 'CodexWorld');
        
        // Add a recipient
        $objMail->addAddress($email);
        
        // Add cc or bcc 
        $objMail->addCC('cc@example.com');
        $objMail->addBCC('bcc@example.com');
        
        // Email subject
        $objMail->Subject = $subject;
        
        // Set email format to HTML
        $objMail->isHTML(true);
        
        // Email body content
        //$mailContent = "<h1>Send HTML Email using SMTP in CodeIgniter</h1>
            //<p>This is a test email sending using SMTP mail server with PHPMailer.</p>";
        $objMail->Body = $html;
        
        // Send email
        if(!$objMail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $objMail->ErrorInfo;
        }else{
            return 1;
        }
 }
 
}