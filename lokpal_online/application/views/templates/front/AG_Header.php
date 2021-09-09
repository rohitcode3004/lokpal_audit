<!-- ================= Header for Receipt Counter ================= -->

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Complaint Management System Lokpal of India</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="<?php echo base_url();?>assets/images/favicon.ico">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <link href="<?php echo base_url();?>assets/admin_material/dashboard/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/admin_material/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
      <!-- Animation Css -->
  <link href="<?php echo base_url();?>assets/admin_material/plugins/animate-css/animate.css" rel="stylesheet" />
  <link href="<?php echo base_url();?>assets/admin_material/dashboard/css/mystyle.css" rel="stylesheet">


  <script src="<?php echo base_url();?>assets/admin_material/dashboard/js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/admin_material/dashboard/js/bootstrap.min.js"></script>

  <script type="text/javascript">
  // preloader
    function loader() {
        $('#ctn-preloader').addClass('loaded');
        $("#loading").fadeOut(500);
        // Una vez haya terminado el preloader aparezca el scroll
    
        if ($('#ctn-preloader').hasClass('loaded')) {
            // Es para que una vez que se haya ido el preloader se elimine toda la seccion preloader
            $('#preloader').delay(900).queue(function () {
                $(this).remove();
            });
        }
    }
    
    $(window).on('load', function () {
        loader();
        wowanimation();
      mainSlider();
      counterOn()
    });
  </script>



  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal

function myFunction() {
    //modal.style.display = "block";
}
// When the user clicks on <span> (x), close the modal
/*span.onclick = function() {
    modal.style.display = "none";
}*/

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

var baseURL= "<?php echo base_url();?>";

function freshApp(){
        jQuery.ajax({
        url : baseURL+'filing/destroy_filing_session',
        success : function(result){
            console.log(result);
        },
            complete:function(data){
            }
    });
}

</script>

<!-- Avoid Clickjacking Code --> 
  <?php 
    header("X-Frame-Options: DENY");
  ?>
</head>
<body class="app sidebar-mini">

       <!-- preloader  -->
    <div id="preloader">
        <div id="ctn-preloader" class="ctn-preloader">
            <div class="animation-preloader">
                <div class="spinner"></div>
                <img width="100" src="<?php echo base_url();?>assets/my_assets/images/logo_lokpal.png" alt="logo lodar" />
                <div class="txt-loading">
                    <span data-text-preloader="P" class="letters-loading">
                        P
                    </span>
                    <span data-text-preloader="l" class="letters-loading">
                        l
                    </span>
                    <span data-text-preloader="e" class="letters-loading">
                        e
                    </span>
                    <span data-text-preloader="a" class="letters-loading">
                        a
                    </span>
                    <span data-text-preloader="s" class="letters-loading">
                        s
                    </span>
                    <span data-text-preloader="e" class="letters-loading">
                        e
                    </span>
                    <span data-text-preloader="" class="letters-loading">
                        &nbsp;&nbsp;
                    </span>
                    <span data-text-preloader="W" class="letters-loading">
                        W
                    </span>
                    <span data-text-preloader="a" class="letters-loading">
                        a
                    </span>
                    <span data-text-preloader="i" class="letters-loading">
                        i
                    </span>
                    <span data-text-preloader="t" class="letters-loading">
                        t
                    </span>
                    <span data-text-preloader="..." class="letters-loading">
                        ...
                    </span>

                </div>
            </div>
            <div class="loader">
                <div class="row">
                    <div class="col-3 loader-section section-left">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-left">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-right">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-right">
                        <div class="bg"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- preloader end -->
    
    <div class="page-main">
        <div class="main-wrapper">
        	<nav class="navbar">
			  <div class="container-fluid">
			    <div class="nav-header">
			      <ul>
			      	<li class="logo-left"><a href="#">
			      		<img src="<?php echo base_url();?>assets/admin_material/dashboard/images/lokpal_logo.png" alt="logo"></a>
			      	</li>
			      	<li>
			      		<a href="#" class="toggle"><i class="fa fa-bars" aria-hidden="true"></i></a>
			      	</li>
			      	<li class="logo-right">
			      		<a href="#"><img src="<?php echo base_url();?>assets/admin_material/dashboard/images/logo_lokpal.png" alt="logo"></a>
			      	</li>
			      </ul>
			    </div>
			  </div>
			</nav>

			<aside class="app-sidebar">
                <div class="app-sidebar_user">
                	<div class="user-box">
                		<!--<div class="user-img"><img src="<?php echo base_url();?>assets/admin_material/dashboard/images/avatar.jpg" alt="logo"></div>-->
                		<h5>
                            <?php if($user['username']){
                                echo $user['username'];
                              }else{
                                echo 'n/a';
                              }
                            ?>       
                        </h5>
                        <?php if($user['is_staff'] == 'f'){ ?> 
                        <a href="<?php echo base_url('user/logout'); ?>"><i class="fa fa-power-off" aria-hidden="true"></i> Logout</a>
                        <?php } else { ?>
                        <a href="<?php echo base_url('admin/logout'); ?>"><i class="fa fa-power-off" aria-hidden="true"></i> Logout</a>
                        <?php } ?>  
                	</div>

                	<div class="side-menu">
                		<ul class="sidebar-menu">
                			<li>
                				<a href="<?php echo base_url('agency/dashboard_main'); ?>">
                					<i class="fa fa-dashboard side-menu_icon"></i> 
                					<span>Dashboard</span>
                				</a>
                			</li>
                      <li>
                        <a href="<?php echo base_url('agency/dashboard'); ?>">
                          <i class="fa fa-share side-menu_icon" aria-hidden="true"></i>
                          <span>Complaints Received</span> 
                        </a>
                      
                      </li>
                			<li>
                				<a href="#">
                					<i class="fa fa-user-o side-menu_icon" aria-hidden="true"></i> 
                					<span>User Account Management</span> 
                					<i class="fa fa-angle-left icon-right"></i>
                				</a>
                				<ul class="sidebar-submenu">
                					<li><a href="#"><i class="fa fa-circle-o"></i> Edit Profile</a></li>
                					<li><a href="<?php echo base_url('user/update_user_pass'); ?>"><i class="fa fa-circle-o"></i> Update Password</a></li>
                				</ul>
                			</li>
                		</ul>
                	</div>
                </div>
            </aside>
