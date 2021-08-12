<?php  if(!strstr(@SELF, strtolower($_SERVER['PHP_SELF']))) exit('No direct script access allowed'); ?>

<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="icon" type="image/x-icon" href="favicon.ico">
		<link rel="stylesheet" href="css-js/bootstrap.min.css">
		<link rel="stylesheet" href="css-js/my-style.css">
		<link rel="stylesheet" href="css-js/all.css">
		<link rel="stylesheet" href="css-js/animate.css">
		<link rel="stylesheet" href="css-js/slide-menu.css">
    	<link rel="stylesheet" href="css-js/site.css">
    	<link rel="stylesheet" href="css-js/calendar-style.css">
		<link rel="stylesheet" href="css-js/jquery.fancybox.min.css" media="screen">


		<title>LOKPAL</title>
	</head>	

<?php 
	$flname='visitor.txt'; $new_counter=''; 
	session_start(); date_default_timezone_set('Asia/Kolkata');	
	/*session_id(); session_regenerate_id(true); session_id();*/
	
	/*if(isset($_SESSION['visitor-no'])) {
		$visitor_no=$_SESSION['visitor-no'];
	}
	else {
		$flopen=fopen($flname, 'a') or die("Can't Open visitor file");
		$new_counter=date('d-m-Y h:i:s').' | '.$_SERVER['SERVER_ADDR'];
		fputs($flopen, $new_counter."\n");
		$visitor_no=count(file($flname));
		$_SESSION['visitor-no']=$visitor_no;
		fclose($flopen);
	}*/
?>					
<body>
	<div class="container_boxed white">
	<div class="container">
		<div class="row">
			 <?php
                $uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
                $uri_parts2 = explode('/', $uri_parts[0]);
        	?>
			<div class="header-part-top">
				<span class="col-6">
					<?php
						date_default_timezone_set('Asia/Kolkata');
						echo'<span id="date_time"></span>';
					?>
						<img src="images/infl.jpg" alt="Indian Flag" style="vertical-align:middle;width:20px;height:14px;">
				</span>
				<span class="col-6 float-right text-right mtop--4">
					<span class="dp-login" title="Click here to go main content."><a class="text-black" href="<?php echo "http://" . $_SERVER['SERVER_NAME'] ."/". $uri_parts2[1] ."/". $uri_parts2[2]; ?>/lokpal_online/admin/authenticate">Departmental Login</a></span>
					<span id="skip-content" title="Click here to go main content.">Skip to main content</span>
					<span class="size-sm" title="Click here for small size">A<sup>-</sup></span>
					<span class="size-normal" title="Click here for normal size">A</span>
					<span class="size-larg" title="Click here for larg size">A<sup>+</sup></span>
					<span class="bg-black" title="Click here for black background">A</span>
					<span class="bg-normal" title="Click here for normal background">A</span>
					<!--<select class="text-danger font-weight-bold" id="change-lang">
						<option selected>Langauge</option>
						<option value="hindi">&#2361;&#2367;&#2306;&#2342;&#2368;</option>
						<option disabled="true" style="color: #28a745;">English</option>
					</select>-->
				</span>
			</div>

		</div>
	</div>

	<div class="clearfix"></div>

	<div class="container no-padding">
		<div class="row header-part">

			<div class="col-10 d-none d-md-block">
				<img src="images/lokpal_logo.png" class="img-responsive main_logo">
			</div>

			<div class="col-2">
				<img src="images/logo_lokpal.png" alt="Logo" class="sb_logo">
			</div>

		    <div class="col-12 d-block d-sm-none mobile-logo">
				<img src="images/lokpal_logo_dual.png" alt="Logo" class="sb_logo_mobile">
			</div>			

			<div class="col-10 menu-bar d-none">
				<div class="header-button">

					<a href="#" class="auth-login text-danger">						
						<span>Login</span>
					</a>
					<a href="#" data-toggle="modal" data-target="#Modal-2" class="dashboard_login text-success">
						<span>Dashboard</span>
					</a>
				</div>											
				<div class="englis-right-text">Protector of People</div>
			</div>

		</div>
	</div>

	<div class="clearfix"></div>
	<div class="container">
		<div class="row">

			<div class="menu_container">
				<div id="menu_area" class="menu-area">
					<nav class="navbar navbar-light navbar-expand-lg mainmenu">

						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
						</button>

						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav mr-auto">

								<li><a href="/">Home</a></li>

								<li class="dropdown">
									
									<a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">About Us</a>
									<ul class="dropdown-menu" aria-labelledby="navbarDropdown">	
										<li><a href="?about_us?about_lokpal?0101">Introduction</a></li>
										<!--<li><a href="?about_us?Logo?0102">Logo and motto/slogan</a></li>-->
										<li><a href="/pdfs/working_calendar_2020.pdf" target="_0001">Working Calendar Year 2020</a></li>
										<li><a href="?about_us?Jurisdiction_and_Functions_of_Lokpal?0103">Jurisdiction and Functions of Lokpal</a></li>	
										<!--<li><a href="?about_us?jurisdiction?0104">Jurisdiction</a></li>-->	
										<li><a href="?about_us?organization_structure?0105">Organization Structure</a></li>	
										<li><a href="?about_us?members_directory">Directory</a></li>
										<li class="dropdown no-border">											
											<a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Related Websites</a>

											<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
												<li><a href="https://sci.gov.in" target="_sci_01" class="outside-link">Supreme Court of India</a></li>
												<li><a href="https://dopt.gov.in/" class="outside-link" target="_dopt_02">Department of Personnel and Training</a></li>
												<li><a href="http://lawmin.gov.in/" class="outside-link" target="_mlj_03">Ministry of Law and Justice</a></li>
												<li><a href="http://www.cvc.nic.in/" class="outside-link" target="_cvc_04">Central Vigilance Commission</a></li>
												<li><a href="http://cbi.gov.in/" class="outside-link" target="_cbi_05">Central Bureau of Investigation</a></li>
												<li><a href="https://www.india.gov.in/" class="outside-link" target="_ign_06">National Portal of India</a></li>
												<li><a href="https://indiacode.nic.in/" class="outside-link" target="_indiacode_07">Digital Repository of All Central and State Acts (India Code)</a></li>	
											</ul>
										</li> 		
									</ul>
								</li>

								<li class="dropdown">
									
									<a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Acts & Rules/ Regulations</a>
									<ul class="dropdown-menu" aria-labelledby="navbarDropdown">	
										<li>
											<a href="https://indiacode.nic.in/handle/123456789/2122?sam_handle=123456789/1362" target="_0201" class="outside-link">The Lokpal & Lokayuktas Act, 2013&nbsp;</a>
											<span class="fa fa-file-pdf pdf-download" onclick="download_pdf('act-2013')"></span>
										</li>
										<li>
											<a href="https://indiacode.nic.in/handle/123456789/1558?sam_handle=123456789/1362" target="_0202" class="outside-link">The Prevention of Corruption Act, 1988</a>
											<span class="fa fa-file-pdf pdf-download" onclick="download_pdf('act-1988')"></span>
										</li>

										<li>
											<a href="https://indiacode.nic.in/handle/123456789/2258?sam_handle=123456789/1362" target="_0203" class="outside-link">The Delhi Special Police Establishment Act, 1946</a>
										</li>

										<li class="dropdown no-border">											
											<a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Others</a>

											<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
												<li>
													<a href="https://indiacode.nic.in/handle/123456789/2067?sam_handle=123456789/1362" target="_0209" class="outside-link">The Central Vigilance Commission Act, 2003</a>
												</li>
												<li>
													<a href="https://indiacode.nic.in/handle/123456789/1611?sam_handle=123456789/1362" target="_0204" class="outside-link">The Code of Criminal Procedure Act, 1973</a>
												</li>
												<li>
													<a href="https://indiacode.nic.in/handle/123456789/2191?sam_handle=123456789/1362" target="_0205" class="outside-link">The Code of Civil Procedure Act, 1908</a>
												</li>
												<li>
													<a href="https://indiacode.nic.in/handle/123456789/2263?sam_handle=123456789/1362" target="_0206" class="outside-link">Indian Penal Code, 1860</a>
												</li>
												<li>
													<a href="https://indiacode.nic.in/handle/123456789/2188?sam_handle=123456789/1362" target="_0211" class="outside-link">The Indian Evidence Act.</a>
												</li>												
												<li>
													<a href="https://indiacode.nic.in/handle/123456789/2036?sam_handle=123456789/1362" target="_0212" class="outside-link">Prevention of Money Laundering Act. (PMLA)</a>
												</li>
											</ul>

										</li>	


									</ul>
								</li>

								<li class="dropdown">
									
									<a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Complaint Corner</a>
									<ul class="dropdown-menu" aria-labelledby="navbarDropdown">			    

										<li><a href="?menu_bar?guidelines_for_filing_complaint?0303">Guidelines for filing complaint</a></li>
										<li><a href="?menu_bar?complaints_statistics?0301">Complaints Statistics</a></li>
										<li><a href="?menu_bar?Nature_of_Complaints?0302">Nature of Complaints</a></li>    
										<li><a href="?menu_bar?Lodge_a_Complaint?0304">Lodge a Complaint</a></li>
										<li><a href="#">Check Status of Complaint</a></li> 
										<li class="no-border"><a href="?menu_bar?Frequently_Asked_Questions(FAQ)?0305">Frequently Asked Questions(FAQ)</a></li> 
										<!--<li><a href="#">Complaint Form</a></li>			                            	
										<li class="no-border"><a href="#">FAQs</a></li>-->
										
										<!--<li class="dropdown">
											<a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Judicial Members</a>

											<ul class="dropdown-menu" aria-labelledby="navbarDropdown">				                                	
												<li><a href="#">Member 1</a></li>
												<li><a href="#">Member 2</a></li>
												<li><a href="#">Member 3</a></li>
												<li><a href="#">Member 3</a></li>
											</ul>
										</li>-->
										
									</ul>
								</li>

								<!--<li class="dropdown">
									<a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Report</a>
									<ul class="dropdown-menu" aria-labelledby="navbarDropdown">	
										<li><a href="#">Annual Report</a></li>
										<li class="no-border"><a href="#">Circulars</a></li>
									</ul>
								</li>
								<li><a href="./?menu_bar?download?0401">Downloads</a></li>-->	
								<li><a href="./?contact_us">Contact Us</a></li>								
								<li><a href="./?media_gallery?photo_gallery">Photo Gallery</a></li>
								<!--<li><a href="/pdfs/wdayc_10032021.pdf" class="no-border" target="_new10032121">Women Day Celebration</a></li>-->
							</ul>
						</div>
					</nav>
					<form class="searchbox">
						<input type="search" placeholder="Search......" name="search" class="searchbox-input" onkeyup="buttonUp();" required>
						<input type="submit" class="searchbox-submit" value="">
						<span class="searchbox-icon btn btn-danger"><i class="fa fa-search"></i></span>
					</form>
				</div>
			</div>

		</div>
	</div>