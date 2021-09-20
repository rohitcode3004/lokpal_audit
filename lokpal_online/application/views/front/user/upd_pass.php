<?php
//$r = $this->session->userdata('ref_no');
//$u = $user['id'];
//echo get_complaint_no($r, $u);
//$elements = $this->label->view(1);
//print "<pre>";
//print_r($elements);
//print "</pre>";
//print_r($this->label->view(1));
?>

<script src="<?php echo base_url();?>assets/customjs/password_encryption.js"></script>
<div class="login-box">
  <div class="login-form">
    <div class="login-main">
      <h6 class="sec-one">Update Your Password! <i class="fa fa-hand-o-down" aria-hidden="true"></i></h6>
      <div class="speci-login first-look">
        <img src="<?php echo base_url(); ?>assets/my_assets/images/user.png" alt="">
      </div>
    </div>
    <div class="login-content">
      <div class="row">
        <div class="col-md-12">
          <?php
            if($this->session->flashdata('success_msg'))
            {
             echo '<div>'.$this->session->flashdata('success_msg').'</div>';
            }
            if($this->session->flashdata('error_msg'))
            {
             echo '<div>'.$this->session->flashdata('error_msg').'</div>';
            }
          ?>
        </div>
      </div>
      <form id="upd-pass-form" class="form-horizontal password_form_upd" role="form" method="post" action='<?= base_url();?>user/submit_user_pass'  name="upd-pass-form" enctype="multipart/form-data">
          <?php echo validation_errors(); ?>
        <div class="box-group">
          <label for="exampleInputEmail1">Email Id</label>
          <input type="text" name="username" class="input-form" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email Id" value="<?php echo $user['username']; ?>" readonly>
        </div>

        <div class="box-group">
          <label for="exampleInputPassword1">Old Password <span class="text-danger">*</span></label>
          <input type="password" name="password_old" class="input-form" id="pwd_old" placeholder="Old Password">
        </div>

        <div class="box-group">
          <label for="exampleInputPassword1">New Password <span class="text-danger">*</span></label>
          <!--<input type="password" name="password" class="input-form password_Strength" id="pwd" placeholder="New Password" onKeyUp="checkPasswordStrength();" data-toggle="popover" title="Password Must include" data-content="Minimum 6 characters, At least one capital letter, At least one number" data-placement="bottom">-->
          <input id="pwd" type="password" class="input-form password_Strength" placeholder="Enter Password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#\$%\^&\*]).{6,}" onKeyUp="checkPasswordStrength();" data-toggle="tooltip" data-placement="bottom" title="Password must contain minimum of 6 characters, At least one capital letter, one small letter, one number, and one special character!">
          <div id="password-strength-status"></div>
        </div>

        <div class="box-group">
          <label for="exampleInputPassword1">Confirm Password <span class="text-danger">*</span></label>
          <input type="password" name="password2" class="input-form" id="pwd2" placeholder="Confirm Password">
        </div>

        <div class="box-group">
          <label for="captcha_code">Captcha<span class="text-danger">*</span></label>
          <div class="captcha-box">
            
            <div id="captImg" style="float: left; margin-right: 15px;"><?php echo $captcha['image'];?></div>
            <div style="font-size: 18px;">Can't read the image?  
              <a href="javascript:void(0);" class="refreshCaptcha"><strong>click here</strong></a> to refresh.
            </div>
          </div>
          <input type="text" class="form-control" id="captcha" name="captcha" value="" placeholder="Enter the captcha code : " autocomplete="off"/>
          <?php echo form_error('captcha','<div class="text-danger">','</div>'); ?>
        </div>



              
        <button type="submit" class="loginhny-btn btn" name="upd-pass-form" value="upd" onclick="encode_upd_pass('pwd_old', 'pwd', 'pwd2')">Submit</button>
        
        <div class="login-divider"><span><i class="fa fa-hand-o-down" aria-hidden="true"></i></span></div>
        
        <p class="text-orange">If you want to go back? <a href="<?php echo base_url(); ?>e-filing">Please click here!</a></a></p>
      </form>
    </div>
  </div>
</div>



