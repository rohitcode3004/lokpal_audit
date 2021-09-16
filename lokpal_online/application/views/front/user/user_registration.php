<?php include(APPPATH.'views/templates/front/fheader.php'); ?>

//ajax script
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<style type="text/css">
    .second-box{
      display:none;
    }
</style>

  <script type="text/javascript">
    var baseURL= "<?php echo base_url();?>";
  </script>
<script src="<?php echo base_url(); ?>assets/customjs/otp.js"></script>
  <div class="register-box">
    <div class="register-form">
      <div class="register-main">
        <h6 class="sec-one">Are you filing a complaint for first time <br>Please Register Here <i class="fa fa-hand-o-down" aria-hidden="true"></i></h6>
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
              echo '<div>'.$this->session->flashdata('success_msg').'</div>';

            ?>
            <!-- Image loader -->

            <form method="POST" action="<?php echo base_url(); ?>user/new_user_save" autocomplete="off">
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="salutation_id" >Title<span class="text-danger">*</span></label>    
                    <select type="text" class="form-control" name="salutation_id" id="salutation_id">
                      <option value="">Select Title</option>
                      <?php foreach($salution as $row):?>                 
                      <option value="<?php echo $row->salutation_id; ?>" <?php echo set_select('salutation_id',  $row->salutation_id); ?>><?php echo $row->salutation_desc; ?></option>                   
                      <?php endforeach;?>
                    </select>  
                    <div><?php echo form_error('salutation_id','<div class="text-danger">','</div>'); ?></div> 
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Surname</label>
                    <input type="text" class="form-control" placeholder="Enter Sur Name" name="sur_name" maxlength="25" onkeypress="return ValidateAlpha(event)" value="<?php echo set_value('sur_name'); ?>" oninput="this.value = this.value.toUpperCase()">
                    <?php echo form_error('sur_name','<div class="text-danger">','</div>'); ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Middle Name</label>
                    <input type="text" class="form-control" placeholder="Enter Middle Name" name="mid_name" maxlength="25" onkeypress="return ValidateAlpha(event)" value="<?php echo set_value('mid_name'); ?>" oninput="this.value = this.value.toUpperCase()">
                    <?php echo form_error('mid_name','<div class="text-danger">','</div>'); ?>
                  </div>
                </div>
              </div>

              <div class="row">            
                <div class="col-md-6">
                  <div class="form-group">
                    <label>First Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="Enter First Name" name="first_name" maxlength="50" onkeypress="return ValidateAlpha(event)" value="<?php echo set_value('first_name'); ?>" oninput="this.value = this.value.toUpperCase()">
                    <?php echo form_error('first_name','<div class="text-danger">','</div>'); ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Mobile no</label>
                    <input type="text" id="mob_no" class="form-control" placeholder="Enter Mobile no" name="mobile" onkeypress="return isNumberKey(event)" maxlength="10" value="<?php echo set_value('mobile'); ?>">
                  </div>
                </div>
              </div>



              <div class="row">
                <div class="col-md-6 first-box">
                  <div class="form-group">
                    <label>Email<span class="text-danger">*</span></label>
                    <div class="input-group mb-3">
                      <input type="text" id="emailid" class="form-control" placeholder="Enter Email" name="service_id" value="<?php echo set_value('email'); ?>">
                       
                      <div class="input-group-btn">
                        <button class="btn btn-primary" id="send-email-otp" type="button">Send OTP</button>
                      </div>
                    </div>
                    <?php echo form_error('email','<div class="text-danger">','</div>'); ?>
                    <div class="text-info" id="otp-reminder_email" role="alert"></div>
                    <span id="email-error" class="field-error"></span>
                   
                  </div>
                </div>
                <div class="col-md-6 second-box">
                  <div class="form-group">
                    <label>Enter Your Email OTP<span class="text-danger">*</span></label>
                    <div class="input-group mb-3">                     
                      <input type="text" class="form-control password_Strength" id="otp-email" placeholder="Enter OTP Here" name="otp">
                      <div class="input-group-btn">
                          <button class="btn btn-primary" id="submit-email-otp" type="button">Submit OTP</button>
                      </div>
                    </div>
                    <div class="text-orange">Your OTP will expire in : <span id="timer"></span></div>
                  <!--<p id="otp-reminder_email" class="text-info" role="alert"></p>-->
                  <div class="text-danger" id="email-otp-error"></div>
                  <div class="text-danger" id="email-otp-time"></div>
                  </div>
                </div>
                <div class="col-md-6 mt-30" id="email-verified" style="display: none">
                  <div class="alert alert-success"><i class="fa fa-check-square-o" aria-hidden="true"></i> Your Email id is <strong>Verifyed Successfully!</strong></div>
                </div>
              </div>

              
                
        

              <div class="row">
                <div class="col-md-6">                  
                  <div class="form-group">
                    <label>Password<span class="text-danger">*</span></label>
                    <!--<input type="password" name="password" class="form-control" id="pwd" placeholder="New Password" onKeyUp="checkPasswordStrength();" data-toggle="popover" title="Password Must include" data-content="Minimum 6 characters, At least one capital letter, At least one number" data-placement="bottom">-->
                    <input id="pwd" type="password" class="form-control" placeholder="Enter Password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#\$%\^&\*]).{6,}" onKeyUp="checkPasswordStrength();" data-toggle="popover" title="Password must use a combination of these" data-content="Minimum 6 characters, At least one capital letter, one small letter, one number and one spcial character" data-placement="bottom">
                    <div id="password-strength-status"></div>
                    <?php echo form_error('password','<div class="text-danger">','</div>'); ?>
                  </div>
                  <!--<span class="text-danger"><strong>Notes:</strong> Password must use a combination of these: Minimum 6 characters, At least one capital letter, one number and one spcial character</span>-->
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Confirm Password<span class="text-danger">*</span></label>
                    <input type="password" class="form-control" placeholder="Enter Confirm Password" name="password2">
                    <?php echo form_error('password2','<div class="text-danger">','</div>'); ?>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <label for="captcha_code">Captcha<span class="text-danger">*</span></label>
                  <div class="row">
                    <div class="col-md-6">
                      <div id="captImg" style="float: left; margin-right: 15px;"><?php echo $captcha['image'];?></div>
                      <div style="font-size: 18px;">Can't read the image?  
                        <a href="javascript:void(0);" class="refreshCaptcha"><strong>click here</strong></a> to refresh.
                      </div>
                    </div>
                    <div class="col-md-6">
                      <input type="text" class="form-control" id="captcha_code" name="captcha_code" value="" placeholder="Enter the captcha code : " autocomplete="off"/>
                      <?php echo form_error('captcha_code','<div class="text-danger">','</div>'); ?>
                    </div>
                  </div>
                </div>                
              </div>
              
              <div class="row">                   
                <div class="col-md-4 col-md-offset-4">
                  <button type="submit" class="loginhny-btn btn" name="submitform" value="subacc" align="center">Submit</button>
                </div>
              </div>
              <?php
                $uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
                $uri_parts2 = explode('/', $uri_parts[0]);
              ?>
              <hr>
              <p class="text-orange mt-50">If you want to go back <a href="<?php echo "http://" . $_SERVER['SERVER_NAME'] ."/". $uri_parts2[1]; ?>/lokpal?menu_bar?Lodge_Your_Complaints?0304"><strong>Please click here!</strong></a></p>
            </form>                                                                
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- End of Features Section-->

<script type="text/javascript">
  $("#send-email-otp").click(function(e) {
    e.preventDefault();
    var emailid = jQuery('#emailid').val();
   $.ajax({
     url : '<?php echo base_url(); ?>user/service_validation_new',
     type : 'POST',
     data: {
      service_name: 'email',
      service_id: emailid
     },
     beforeSend: function(){
    // Show image container
        $("#loader").show();
   },
     success : function (result) {
        var result = jQuery.parseJSON(result);
        console.log (result[0].val); // Here, you need to use response by PHP file.
        if (result[0].val == 'true') {
        $('#email-error').html('');
        $('.second-box').show();
      }
      if (result[0].val == 'false') {
        jQuery('#email-error').html(result[0].error);
        //jQuery('.first-box').hide();
      }
     },
             complete:function(data){
    // Hide image container
    $("#loader").hide();
   },
     error : function () {
        console.log ('error');
     }
   });
  });

  $("#submit-email-otp").click(function(e) {
    e.preventDefault();
    var otp = jQuery('#otp-email').val();
   $.ajax({
     url : '<?php echo base_url(); ?>user/otp_validation_new',
     type : 'POST',
     data: {
      service_name: 'email',
      otp: otp
     },
      beforeSend: function(){
    // Show image container
        $("#loader").show();
   },
     success : function (result) {
        var result = jQuery.parseJSON(result);
        console.log (result); // Here, you need to use response by PHP file.
        if (result[0].val == 'true' && result[0].msg == 'success') {
        jQuery('#email-otp-error').html(''); 
        $('.second-box').hide();  
        $('#email-verified').show();
        document.getElementById('emailid').readOnly = true;
        document.getElementById('send-email-otp').disabled = true;
        }
        if (result[0].val == 'true' && result[0].msg == 'fail') {
        //window.location = 'dashboard.php';
        jQuery('#email-otp-error').html('<i class="fa fa-exclamation-circle" aria-hidden="true"></i> <strong>Invalid Otp Entered!</strong>');
        console.log('WRONG OTP');
        }

        if (result[0].val == 'false') {
        jQuery('#email-otp-error').html(result[0].error);
        }
     },
        complete:function(data){
    // Hide image container
    $("#loader").hide();
   },
     error : function () {
        console.log ('error');
     }
   });
  });



// ================== OTP Timer ===============
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
<?php include(APPPATH.'views/templates/front/ffooter.php'); ?>