<script src="<?php echo base_url();?>assets/customjs/password_encryption.js"></script>
<?php include(APPPATH.'views/templates/front/fheader.php'); ?>

<div class="login-box">
  <div class="login-form">
    <div class="login-main">
      <h6 class="sec-one">Forgot Password <i class="fa fa-hand-o-down" aria-hidden="true"></i></h6>
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
      <form class="form-horizontal password_form" action="<?php echo base_url('user/forget_password_step2_action') ?>" method="post" autocomplete="off" name="userloginSubmit">

        <!--<div class="box-group">
          <div class="otp_box">
            <input class="input-form" placeholder="Enter OTP Here" name="otp" type="text" value="" id="otp">
            <div class="otp_group_btn">
              <button class="submit_otp_btn btn-primary" id="submit-email-otp" type="button">Submit OTP</button>
            </div>
          </div>
          <div id="count_timer" class="text-orange">Your OTP will expire in : <span id="timer"></span></div>
          <div id="resend_otp" class="text-primary" style="display: none;">OTP expired. Please send new otp again.</div>
        </div>

        <div class="box-group" id="email-verified">
          <div class="alert alert-success"><i class="fa fa-check-square-o" aria-hidden="true"></i> Your Email id is <strong>Verifyed Successfully!</strong></div>
        </div>-->

        <div class="box-group">
          <input class="input-form" placeholder="Enter OTP Here" name="otp" type="text" value="" id="otp">
          <div id="count_timer" class="text-orange">Your OTP will expire in : <span id="timer"></span></div>
          <div id="resend_otp" class="text-primary" style="display: none;">OTP expired. Please send new otp again.</div>
        </div>
        <div class="box-group">
          <input id="pwd" type="password" class="input-form password_Strength" placeholder="Enter New Password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#\$%\^&\*]).{6,}" onKeyUp="checkPasswordStrength();" data-toggle="tooltip" data-placement="bottom" title="Password must contain minimum of 6 characters, At least one capital letter, one small letter, one number, and one special character!" onblur="CheckPassword(document.userloginSubmit.password)">
          <div id="password-strength-status"></div>

           <div id="show_msg" class="text-danger" style="display: none;">Password must use a combination of these! Minimum 6 characters, At least one capital letter, one small letter, one number and one spcial character.</div>

        </div>
        <div class="box-group">
          <input class="input-form" placeholder="Confirm New Password" name="password2" type="password" value="" id="pwd2">
        </div>

        <div class="captcha-box">
          <div id="captImg" style="float: left; margin-right: 15px;"><?php echo $captcha['image'];?></div>
          <div style="font-size: 18px;">Can't read the image? 
            <a href="javascript:void(0);" class="refreshCaptcha"><strong>click here</strong></a> to refresh.
          </div>
        </div>
        <div class="box-group">
          <input type="text" class="input-form" name="captcha" value="" placeholder="Enter the captcha code "/>
        </div>

        <input class="loginhny-btn btn" type="submit" name="userloginSubmit" value="submit" onclick="encode_dl_passport('pwd', 'pwd2',)" />

        <div class="login-divider"><span><i class="fa fa-hand-o-down" aria-hidden="true"></i></span></div>

       <!-- <p class="text-orange mt-50">If you want to go back? <br><a href="<?php echo "http://" . $_SERVER['SERVER_NAME']."/". $uri_parts2[1]; ?>/lokpal?menu_bar?Lodge_Your_Complaints?0304"><strong>Please click here!</strong></a></p>-->
        <p class="text-orange">If you want to go back <br> 
          <a href="<?php echo base_url(); ?>user/login"><strong>Please Click Here</strong></a>  </p>

      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
function CheckPassword(inputtxt) 
{ 
 
  var decimal=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{6,15}$/;
  if(inputtxt.value.match(decimal)) 
  { 
    $("#show_msg").hide();
    return true;
  }
  else
  { 
    $("#show_msg").show();
    $("#pwd").val(""); 
    event.preventDefault();
    return false;
  }
} 
</script>


<script type="text/javascript">
let timerOn = true;

function timer(remaining) {
  var m = Math.floor(remaining / 60);
  var s = remaining % 60;
  
  m = m < 10 ? '0' + m : m;
  s = s < 10 ? '0' + s : s;
  document.getElementById('timer').innerHTML = m + ':' + s;
  remaining -= 1;
  
  if(remaining >= 0 && timerOn) {
    setTimeout(function() {
        timer(remaining);
    }, 1000);
    return;
  }

  if(!timerOn) {
    // Do validate stuff here
    return;
  }
  
  // Do timeout stuff here
  alert('Timeout for otp');
}

timer(60);

</script>


 <script type="text/javascript">
function CheckPassword(inputtxt) 
{ 
 
  var decimal=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{6,15}$/;
  if(inputtxt.value.match(decimal)) 
  { 
    $("#show_msg").hide();
    return true;
  }
  else
  { 
    $("#show_msg").show();
    $("#pwd").val(""); 
    event.preventDefault();
    return false;
  }
} 
</script>


<!-- End of Features Section-->
<?php include(APPPATH.'views/templates/front/ffooter.php'); ?>