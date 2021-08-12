<?php include(APPPATH.'views/templates/front/header.php'); ?>
<!DOCTYPE html>
<html lang="en">
 <head> 
  <link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.css" rel="stylesheet">
   <link href="<?php echo base_url();?>assets/bootstrap/css/chosen.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/bootstrap/css/custom_style.css" rel="stylesheet">
     <link href="<?php echo base_url();?>assets/bootstrap/css/font-awesome.min.css" rel="stylesheet">
      <link href="<?php echo base_url();?>assets/bootstrap/css/hover.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/css/prettify.css" rel="stylesheet">
  <script src="<?php echo base_url();?>assets/bootstrap/js/jquery.js"></script>
  <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap-datepicker.js"></script>
  <script src="<?php echo base_url();?>assets/bootstrap/js/jquery.validate.min.js"></script>
	
	<script language="javascript"> 
	
 function pageRefesh(value)
	{
	var post_url= '<?php echo base_url('user/getdistrict')?>';
	var request_method= 'POST';
	
			$.ajax({
				url : post_url,
				type: request_method,
				data : 'stateid='+value,
			}).success(function(response){ //
				$("#district_code").html(response);
				
			});
 	 }
	  
$(document).ready(function(){
    $("#submitbtn").click(function(){        
        $("#we").submit(); // Submit the form
    });
});

  $().ready(function() {
 
    // validate signup form on keyup and submit
    $("#registerform").validate({
 
      onkeyup: false,

      rules: {   

          
        UserName: "required",
        firstName: "required",
		lastName: "required",
		address: "required",
		pincode: "required",
		state_code: "required",
		district_code: "required",
        
        username: {
          required: true,
          minlength: 6,
          maxlength:12,		  
         
        },
        password: {
          required: true,
          minlength: 8
        },
        confirm_password: {
          //required: false,
         // minlength: 8,
          equalTo: "#password"
        },
        email: {
          required: true,
          email: true,          
        },
        topic: {
          required: "#newsletter:checked",
          minlength: 2
        },

        phone:{ 
          required:true,
          minlength:10,
          maxlength:10

      },
       gender: { // <- NAME of every radio in the same group
            required: true
        },

        agree: "required"
      },



      messages: {
        groups_err: "Please select roll",
        fname_err: "Please enter your firstname",
        //lname_err: "Please enter your lastname",
        username_err: {
          required: "Please enter a username",
          minlength: "Your username must consist of at least 6 characters",
          remote: "UserName Already Exist"
        },
        password_err: {
          required: "Please provide a password",
          minlength: "Your password must be at least 8 characters long"
        },
        cpassword_err: {
         // required: "Please provide a password",
          minlength: "Your confirm password must same as password",
          equalTo: "Please enter the same password as above"
        },
        email_err: {
          required: "Please provide a email address",
           email: "Please enter a valid email address",
           remote: "email address Already Exist"
        },
        phone_err: {
          required: "Please provide a phone no",
          minlength: "Your phone no must be at least 10 digit number",
          maxlength: "Your phone no must be at least 10 digit number"
        },
        gender_err: {
          required: "Please select at least one gender"
        }
      }
    });
    
  });
	 
			
 </script>
 
 
<?php 
$msg=$this->session->userdata('msg');

//echo $msg;

?>
 <style>
 
  
  #registerform label.error {
    /*
    margin-left: 10px;
    width: auto;
    color: red;
    display: inline;
    */

 color: red;
  margin-left: 80px;
  font-size:15px;
  padding: inherit;
  }
 
  </style>
 
 </head> 
 <body>
 <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
    
        
        <!-- /.box-header -->
        <div class="box-body">
 <div class="row"> 
 <div class="col-md-2">  </div>
   <div class="col-md-8"> 
 <fieldset >
          <div class="row">       
   <div class="panel-default">
                <div class="panel-heading">
                    <span id="ContentPlaceHolder1_search" class="searchComplaint" placeholder="Search"></span>
                    <h5 class="panel-title">
                       
                        User Registration Form
                    </h5>
                </div>
    <b><h2 class="searchComplaint"></h2></b>
    </div>


    <form class="form-horizontal" style="border: 1px solid #456073!important;" role="form" action="<?php echo base_url('user/save') ?>" method="post" id="registerform">

	<div class="form_error">
          <?php echo validation_errors(); ?>
        </div>




<div class="row">

      <div class="row">
        
       <div class="col-md-3 col-xs-12">                   
                   
      </div>

       <div class="col-md-3 col-xs-12">                   
                   
      </div>

        <?php if (isset($msg)) {?>

       <div class="col-md-4">                   
               
            <span style="color: red"><b>  <?php echo $msg; ?></b></span>  
                      
      </div>

    <?php } ?>

</div>
</div>




    <div class="row">
      <div class="col-md-6">
        <label for="UserName"> User Name<font color="red">*</font></label>
        
          <input type="text" class="form-control" name="UserName" id="UserName" placeholder="User Name">       
      </div>
      
    <div class="col-md-6">
        <label for="firstName">First Name <font color="red">*</font></label>
       
          <input type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name">
        
      </div>      
      </div>

       <div class="row">
      <div class="col-md-6">
        <label for="lastName">Last Name <font color="red">*</font></label>       
          <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Last Name">
       
      </div>
     <div class="col-md-6">
        <label for="email">Email <font color="red">*</font></label>        
          <input type="text" class="form-control" name="email" id="email" placeholder="Email">        
      </div>	  
	  </div>
	  
	<div class="row">
        <div class="col-md-6">
        <label for="phone_no">Phone Number</label>
       
          <input type="text" class="form-control" name="phone_no" id="phone_no" placeholder="Enter Phone Number">
        
      </div>
      
	
       <div class="col-md-6">
        <label for="mobileno">Mobile No</label>
        
          <input type="text" class="form-control" name="mobileNo" maxlength="10" id="mobileNo" placeholder="mobileno">
        
      </div>
	  </div>



      
	  <div class="row">
    <div class="col-md-6">
        <label for="address">Address <font color="red">*</font></label>
       
          <input type="text" class="form-control" name="address" id="address" placeholder="address">
       
      </div>
	  
	  <div class="col-md-6">
        <label for="pincode">Pincode <font color="red">*</font></label>
       
          <input type="text" class="form-control" name="pincode" id="pincode" maxlength="7" placeholder="Enter Pincode......">
       
      </div>
	  </div>




	  <div class="row">	  
	  <div class="col-md-6">
       <label for="firstName">State <font color="red">*</font></label>
       
          <select type="text" class="form-control" name="state_code" id="state_code" onChange="pageRefesh(this.value);">
		    <option value="">Select state</option>
                        <?php foreach($state as $row):?>
                        <option value="<?php echo $row->state_code;?>"><?php echo $row->name;?></option>
                        <?php endforeach;?>
                    </select>
        
      </div>
	  
	  <div class="col-md-6">
       <label for="firstName">District <font color="red">*</font></label>
        
		    <select type="text" class="form-control" name="district_code" id="district_code"> 
			
			<?php
			/*
										if(is_numeric($state_code)) {
											$sql = "select name,district_code from master_address where state_code=? and district_code!=0	and sub_dist_code=0 and village_code=0 and display='TRUE' order by name asc";
											$sth = $dbh->prepare($sql);
											$sth->execute(array($state_code));
											while ($row = $sth->fetch()) {
												$selected = '';
												if ($row[district_code] == $district_code) {
													$selected = 'selected';
												}
												echo '<option value="' . $row[district_code] . '" ' . $selected . '>' . $row[name] . '</option>';
											}
										}
										*/
										?>

									</select>
        </div>
	  
      </div>





	  
	  <div class="row">
    <div class="col-md-6">
        <label for="password">Password <font color="red">*</font></label>
       
          <input type="password" class="form-control" name="password" id="password" maxlength="8" placeholder="Enter Passwor....">
       
      </div>
	  
	  <div class="col-md-6">
        <label for="confirm_password">Confirm Password <font color="red">*</font></label>
       
          <input type="password" class="form-control" name="confirm_password" id="confirm_password" maxlength="8" placeholder="Enter Confirm Password......">
       
      </div>
	  </div>
	  <br>



      <div class="row">
        <div class="col-lg-offset-6 col-lg-10">
          <!--<button type="submit" class="btn btn-success">Save & next</button> <a href="<?= base_url();?>applet/appletfiling" class="btn btn-primary">Cancel</a>-->
       <button type="submit" class="btn btn-success" id="submitbtn">Register</button>      
        </div>
        
      </div>
      <br>

    </form>
   </fieldset>
        </div>
      </div>
    </div>
  </div>

</div>
</div>


</body></html>