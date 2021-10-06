<!DOCTYPE html>
<html lang="en">
<head>
  <title>Complaint Management System Lokpal of India</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="<?php echo base_url();?>assets/images/favicon.ico">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/my_assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/my_assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/my_assets/css/mystyle.css">

    <script src="<?php echo base_url(); ?>assets/my_assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/my_assets/js/bootstrap.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/my_assets/js/jquery.waypoints.js"></script>
    <script src="<?php echo base_url(); ?>assets/my_assets/js/jquery.rcounterup.js"></script>
  
<!-- Avoid Clickjacking Code --> 
  <?php 
    header("X-Frame-Options: DENY");
  ?>
</head>
<body>
  
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