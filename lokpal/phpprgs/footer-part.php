<?php if(!strstr(@SELF, strtolower($_SERVER['PHP_SELF']))) exit('No direct script access allowed');

/*$visitor_no=$_SESSION['visitor-no'];
switch(strlen($visitor_no)){
	case 1: 	$visitor_no='0000'.$visitor_no; break;
	case 2: 	$visitor_no='000'.$visitor_no; break;
	case 3: 	$visitor_no='00'.$visitor_no; break;
	case 4: 	$visitor_no='0'.$visitor_no; break;
	default: 	$visitor_no=$visitor_no; break;
} */

?>

	<!--========================== Footer ============================-->
	<div class="clearfix"></div>	

		<div class="container-fluid">
			<div class="row no-margin-bottom">
				<div class="footer-links">
					<span><a href="./?footer?website_policies">Website Policies</a></span>
					<span><a href="./?footer?news">News</a></span>
					<!--<span><a href="/pdfs/wdayc_10032021.pdf" target="_new10032121">Women Day Celebration</a></span>-->
					<span><a href="./?footer?disclaimer" class="no-border">Disclaimer</a></span>
					<!--<span><a href="./?footer?feedback">Feedback</a></span>
					<span><a href="./?footer?sitemap" class="no-border">Site Map</a></span>-->
				</div>
			</div>
		</div>

		<footer>
			<div class="container-fluid">
				<div class="row">
					<div class="col-2"> &nbsp;<br>&nbsp;
						<!--<span class="btn btn-danger btn-xs visitor">Visitors : </span>-->
						<!--<span class="visitor-no"><?= @$visitor_no; ?></span>-->
					</div>
					<div class="col-10">
						<div class="copyright_container">
							<span class="text">Copyright @ 2019 - <?php echo date('Y') ?>, All Rights Reserved, LOKPAL<br/>Website Content Managed by LOKPAL<br/>Designed, Developed and Hosted by National Informatics Centre</span>
							<img src="images/logo-nic.png" class="logo_nic">
						</div>
					</div>
				</div>
			</div>
		</footer>

		<div class="gototop" onclick="gototop();"><i class="fa fa-sort-up"></i></div>
		




<!-- Contact Us here -->
<div class="contact_widget show" onclick="open_panel()">Contact Us <i class="fa fa-sort-up"></i></div>
<div id="slider">
	<div id="sidebar" onclick="open_panel()">
		<div class="title">Contact Us <i class="fa fa-sort-up"></i></div>
	</div>
	<div id="header">
		<div class="address">
				<i class="fa fa-map-marker"></i>&nbsp;&nbsp;LOKPAL,<br>
				&nbsp;&nbsp;&nbsp;&nbsp;Plot No-6, Vasant Kunj Institutional Area- Phase II,<br>New Delhi <span class="text-success font-weight-bold">(India).</span><br><br>
				<span class="text-success">Joint Secretary and Web Information Manager</span><br>
				<i class="fa fa-phone"></i>&nbsp;&nbsp;+91 11 26125017<br>
				<!--<i class="fa fa-fax"></i>&nbsp;&nbsp;+91 11 24100181<br>-->
				<i class="fa fa-envelope"></i>&nbsp;&nbsp;js<font class="dot">[dot]</font>lokpal<font class="at">[at]</font>gov<font class="dot">[dot]</font>in
				<!--<i class="fa fa-envelope"></i>&nbsp;&nbsp;lokpal<small class="text-danger">[dot]</small>osd<small class="text-danger">[at]</small>nic<small class="text-danger">[dot]</small>in -->
				<br><br>
				<span class="text-success">Deputy Secretary</span><br>
				<!--<i class="fa fa-phone"></i>&nbsp;&nbsp;+91 11 24100080<br>
				<i class="fa fa-fax"></i>&nbsp;&nbsp;+91 11 24100080<br>-->
				<i class="fa fa-envelope"></i>&nbsp;&nbsp;mkmishra<small class="text-danger">[at]</small>nic<small class="text-danger">[dot]</small>in
				<br><br>
				<span class="text-success">Under Secretary</span><br>
				<!--<i class="fa fa-phone"></i>&nbsp;&nbsp;+91 11 24100081<br>
				<i class="fa fa-fax"></i>&nbsp;&nbsp;+91 11 24100081<br>-->
				<i class="fa fa-envelope"></i>&nbsp;&nbsp;us<font class="at">[at]</font>lokpal<font class="dot">[dot]</font>gov<font class="dot">[dot]</font>in
				<br><br>
				<span class="text-success">Complaint Section</span><br>
				<!--<i class="fa fa-phone"></i>&nbsp;&nbsp;+91 11 24100081<br>
				<i class="fa fa-fax"></i>&nbsp;&nbsp;+91 11 24100081<br>-->
				<i class="fa fa-envelope"></i>&nbsp;&nbsp;complaint-to-lokpal<font class="at">[at]</font>gov<font class="dot">[dot]</font>in
		</div>
	</div>
</div>



</body>	

<?php 
		if(IPVAR_ARRAY_1 == '') :
			echo'<script src="css-js/jquery.min.js"></script>
					<noscript>This guide will step you through the process of enabling JavaScript in browser</noscript>';
		endif; 

		if(IPVAR_ARRAY_1 != '') :
			echo'<script src="css-js/jquery_sitemap.js"></script>
					<noscript>This guide will step you through the process of enabling JavaScript in browser</noscript>';
		endif;
?>

<script src="css-js/jquery.fancybox.min.js"></script>
	<noscript>This guide will step you through the process of enabling JavaScript in browser</noscript>
<script src="css-js/bootstrap.min.js"></script>
	<noscript>This guide will step you through the process of enabling JavaScript in browser</noscript>
<script src="css-js/wow.js"></script>
	<noscript>This guide will step you through the process of enabling JavaScript in browser</noscript>
<script src="css-js/slide-menu.js"></script>
	<noscript>This guide will step you through the process of enabling JavaScript in browser</noscript>		
<script src="css-js/event-calendar.js"></script>
	<noscript>This guide will step you through the process of enabling JavaScript in browser</noscript>
<script src="css-js/jquery.marquee.js"></script>
	<noscript>This guide will step you through the process of enabling JavaScript in browser</noscript>
<script src="css-js/self-create-functions.js"></script>
	<noscript>This guide will step you through the process of enabling JavaScript in browser</noscript>

<?php 

	if(IPVAR_ARRAY_1 != '') :
		echo'<script src="css-js/jquery-explr-1.4.js"></script>
				<noscript>This guide will step you through the process of enabling JavaScript in browser</noscript>
			<script>
			  $(document).ready(function() {
			    $("#tree").explr();
			  });
			</script>';
	endif;
?>

</html>