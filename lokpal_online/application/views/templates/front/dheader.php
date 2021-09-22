<!-- ================= Header for Chairperson ================= -->

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

<script type="text/javascript">
  	var baseURL= "<?php echo base_url();?>";
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
                		<div class="user-img"><img src="<?php echo base_url();?>assets/admin_material/dashboard/images/avatar.jpg" alt="logo"></div>
                		<h5><?php echo  $user['username']; ?></h5>
                		<p>Chairperson, Lokpal of India</p>
                		<a href="<?php echo base_url('admin/logout'); ?>"><i class="fa fa-power-off" aria-hidden="true"></i> Logout</a>
                	</div>

                	<div class="side-menu">
                		<ul class="sidebar-menu">
                			<li>
                				<a href="<?php echo base_url('complaints/allocation-to-bench'); ?>">
                					<i class="fa fa-dashboard side-menu_icon"></i> 
                					<span>Dashboard</span>
                				</a>
                			</li>
                			<li>
                				<a href="#">
                					<i class="fa fa-sitemap side-menu_icon" aria-hidden="true"></i>
                					<span>Complaints for Allocation to Benches</span> 
                					<i class="fa fa-angle-left icon-right"></i>
                				
                				</a>
                				<ul class="sidebar-submenu">
                					<li><a href="<?php echo base_url('bench/list-of-new-complaints'); ?>"><i class="fa fa-circle-o"></i> New complaints</a></li>
                					<li><a href="<?php echo base_url('bench/list-of-inquiry-report'); ?>"><i class="fa fa-circle-o"></i> Complaints for which Preliminary-Inquiry  Report has been Accepted</a></li>
                					<li><a href="<?php echo base_url('bench/list-of-investigaion-report'); ?>"><i class="fa fa-circle-o"></i> Complaints for which investigation Report has been Accepted</a></li>
                				</ul>
                			</li>
                			<li>
                				<a href="<?php echo base_url('bench/bench-composition-seprate'); ?>">
                					<i class="fa fa-pencil-square-o side-menu_icon" aria-hidden="true"></i> 
                					<span>Creation of new Bench</span> 
                				</a>
                			</li>
                			<li>
                				<a href="<?php echo base_url('list-of-bench'); ?>">
                					<i class="fa fa-cubes side-menu_icon" aria-hidden="true"></i> 
                					<span>List of Existing Benches</span> 
                				</a>
                			</li>
                			<li>
                				<a href="#">
                					<i class="fa fa-file-text-o side-menu_icon" aria-hidden="true"></i> 
                					<span>MIS Report</span> 
                					<i class="fa fa-angle-left icon-right"></i>
                				</a>
                				<ul class="sidebar-submenu">
                					<li><a href="<?php echo base_url('complaints-status'); ?>"><i class="fa fa-circle-o"></i> Status of all Complaints</a></li>
                					<li><a href="<?php echo base_url('complaints/list-of-complaints-considration-lokpal'); ?>"><i class="fa fa-circle-o"></i> Status of Complaints under consideration with Lokpal of India</a></li>
                					<li><a href="<?php echo base_url('category/report'); ?>"><i class="fa fa-circle-o"></i> Status of Complaints Category Wise</a></li>
                				</ul>
                			</li>
                			<li>
                				<a href="<?php echo base_url('bench/search_case'); ?>">
                					<i class="fa fa-search side-menu_icon" aria-hidden="true"></i>
                					<span>Search Status of Complaints</span> 
                				</a>
                			</li>

                            <li>
                                <a href="<?php echo base_url('order-report/list-of-order-report'); ?>">
                                    <i class="fa fa-search side-menu_icon" aria-hidden="true"></i>
                                    <span>View Order/Report</span> 
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
