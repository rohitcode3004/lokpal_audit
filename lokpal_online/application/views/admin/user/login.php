<script src="<?php echo base_url();?>assets/customjs/password_encryption.js"></script>
<?php include(APPPATH.'views/templates/front/fheader.php'); ?>

<div class="login-box">
  <div class="login-form">
    <div class="login-main">
      <h6 class="sec-one">Departmental User, <br> Please Enter Here! <i class="fa fa-hand-o-down" aria-hidden="true"></i></h6>
      <div class="speci-login first-look">
        <img src="<?php echo base_url(); ?>assets/my_assets/images/user.png" alt="">
      </div>
    </div>
    <div class="login-content">
        <div class="row">
            <div class="col-md-12">
            <?php  
                if(!empty($success_msg)){ 
                    echo ''.$success_msg.''; 
                }elseif(!empty($error_msg)){ 
                    echo ''.$error_msg.''; 
                } 
            ?>
            </div>
        </div>
      <form class="form-horizontal login_wapper" role="form" action="<?php echo base_url('admin/authenticate') ?>" method="post" autocomplete="off">
        <input class="input-form" placeholder="username" name="username" type="text" autofocus>
        <input class="input-form" placeholder="Password" name="password" type="password" value="" id="pwd">


        <div class="captcha-box">
          <div id="captImg" style="float: left; margin-right: 15px;"><?php echo $captcha['image'];?></div>
          <div style="font-size: 18px;">Can't read the image? 
            <a href="javascript:void(0);" class="refreshCaptcha"><strong>click here</strong></a> to refresh.
          </div>
        </div>
        <input type="text" class="input-form" name="captcha" value="" placeholder="Enter the captcha code "/>

        <input class="loginhny-btn btn" type="submit" name="loginSubmit" value="login" onclick="encode(this)"/>

         <div class="login-divider"><span>OR</span></div>

        <p class="text-orange">Forgot password <br> 
          <a href="<?php echo base_url(); ?>user/forget_password"><strong>Please Click Here</strong></a>  </p>

        <p class="text-orange">If you want to go Home page <br><a href="<?php echo base_url(); ?>home/index"><strong>Please click here!</strong></a></a></p>
      </form>
    </div>
  </div>
</div>

<!-- End of Features Section-->
<?php include(APPPATH.'views/templates/front/ffooter.php'); ?>