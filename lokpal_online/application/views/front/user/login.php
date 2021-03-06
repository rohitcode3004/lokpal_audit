<script src="<?php echo base_url();?>assets/customjs/password_encryption.js"></script>
<?php include(APPPATH.'views/templates/front/fheader.php'); ?>

<div class="login-box">
  <div class="login-form">
    <div class="login-main">
      <?php if($page == 'statuspage') { ?>
        <h6 class="sec-one">Check the Status of Your Complaint <i class="fa fa-hand-o-down" aria-hidden="true"></i></h6>  
        <?php } else { ?>    
        <h6 class="sec-one">Lodge a Complaint <i class="fa fa-hand-o-down" aria-hidden="true"></i></h6>
      <?php } ?>
      <div class="speci-login first-look">
        <img src="<?php echo base_url(); ?>assets/my_assets/images/user.png" alt="">
      </div>
    </div>
    <div class="login-content">
        <div class="row">
            <div class="col-md-12">
            <?php  
                if(!empty($success_msg)){ 
                    echo '<div>'.$success_msg.'</div>'; 
                }elseif(!empty($error_msg)){ 
                    echo '<div>'.$error_msg.'</div>'; 
                } 
            ?>
            </div>
        </div>
        <?php
                $uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
                $uri_parts2 = explode('/', $uri_parts[0]);
        ?>
      <form class="form-horizontal login_wapper" role="form" action="<?php echo base_url('user/login') ?>" method="post" autocomplete="off">
        <input class="input-form" placeholder="Email ID" name="username" type="text" autofocus>
        <input class="input-form" placeholder="Password" name="password" type="password" value="" id="pwd">

        <div class="captcha-box">
          <div id="captImg" style="float: left; margin-right: 15px;"><?php echo $captcha['image'];?></div>
          <div style="font-size: 18px;">Can't read the image? 
            <a href="javascript:void(0);" class="refreshCaptcha"><strong>click here</strong></a> to refresh.
          </div>
        </div>
        <input type="text" class="input-form" name="captcha" value="" placeholder="Enter the captcha code "/>

        <input type="hidden" value="<?php echo $page; ?>" name="page">
        <input class="loginhny-btn btn" type="submit" name="userloginSubmit" value="login" onclick="encode(this)" />

        

        <p class="text-orange mt-50">If you want to go back? <br><a href="<?php echo "http://" . $_SERVER['SERVER_NAME']."/". $uri_parts2[1]; ?>/lokpal?menu_bar?Lodge_Your_Complaints?0304"><strong>Please click here!</strong></a></p>

        <div class="login-divider"><span>OR</span></div>

        <p class="text-orange">Forgot password <br> 
          <a href="<?php echo base_url(); ?>user/forget_password"><strong>Please Click Here</strong></a>  </p>

          

          
      </form>
    </div>
  </div>
</div>

<!-- End of Features Section-->
<?php include(APPPATH.'views/templates/front/ffooter.php'); ?>