<?php //include(APPPATH.'views/templates/front/header2.php'); 
//$elements = $this->label->view(1);
?>

  <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap-datepicker.js"></script>
  <script src="<?php echo base_url();?>assets/bootstrap/js/jquery.validate.min.js"></script>
  
<?php

  $curYear = date('Y');
  $curMonth = date('m');
  $curDay = date('d');
  $cur_date = $curDay.'/'.$curMonth.'/'.$curYear;
  $cur_date12 = $curDay.'/'.$curMonth.'/'.$curYear;
  //echo $cur_date="$curYear-$curMonth-$curDay";
   $cur_date="$curDay-$curMonth-$curYear";
  // echo "<pre>";
   //print_r($data['diary_counter']);
?>
 
<script language="javascript"> 
    $().ready(function() {
 
    // validate signup form on keyup and submit
    $("#search_case").validate({
 
      onkeyup: false,

      rules: {  
        search_case: "required",
        agree: "required",
        name_of_complainant:"required",
        name_of_public_servant:"required",
        complaint_number:"required",
        summary_fact_allegation:"required",
        department_name:"required",
        dt_of_filing_from:"required",
        dt_of_filing_to:"required",
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
<div class="app-content">
  <div class="main-content-app">
    <div class="page-header">
      <h4 class="page-title">Dashboard for Scrutiny</h4>
      <ol class="breadcrumb"> 
        <li class="breadcrumb-item"><a href="<?php echo base_url('scrutiny'); ?>">Dashboard</a></li>
        <li class="breadcrumb-item">Search Case</li>
      </ol>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">Search Critaria
            <ul class="more-action">
              <li><a href="<?php echo base_url('scrutiny'); ?>" class="previous">&laquo; Back</a></li>
            </ul>
          </div>
          <div class="panel-body">

    <form id="search_case" class="form-horizontal" role="form" method="post" action='<?= base_url();?>search/search_case_detail_leg'  name="search_case" enctype="multipart/form-data">
      
     <?php
      //echo "<pre>";
      //print_r($error);

      //echo $error;
      ?>

      <?php  
       if(!empty($success_msg)){
         echo "hello";
         echo '<div>'.$success_msg.'</div>';
       }
       elseif(!empty($error_msg)){
         echo "Hi";
         echo '<div>'.$error_msg.'</div>';
         }
         echo '<div>'.$this->session->flashdata('success_msg').'</div>';
     ?>    
     
      <div class="row">       
        <div class="col-md-8 col-md-offset-2 mt-50 mb-15">
          <div class="form-group">
            <label class="col-sm-4" for="complaint_number"><span style="color: red;">*</span>Complaint Number</label>
           <div class="col-sm-8">
            <div class="text-danger">Please Enter Complaint Number / Year Format</div>
            <input type="text" class="form-control" name="complaint_number" maxlength="50" id="complaint_number" placeholder="">  
            <input type="hidden" value="judi" name="from_type">
            <button type="submit" class="btn btn-success mt-15" id="submitbtn">Submit</button>
           </div> 
          </div>      
        </div>  
      </div>

      <!--<div class="row">
        <div class="col-md-12 text-center">
          <button type="submit" class="btn btn-success" id="submitbtn">Submit</button>  
        </div>
      </div>-->
    </form>
          </div>
        </div>
      </div>
    </div>



        <div class="clearfix"></div>

<?php if(isset($case_detail)) { ?>
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <?php
                  echo 'Complaint details';
                ?>


                
              </div>
              <div class="panel-body">

    <?php
      if($this->session->flashdata('success_msg'))
      {
       echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><h4>'.$this->session->flashdata('success_msg').'</h4></div>';
      }
      if($this->session->flashdata('error_msg'))
      {
       echo '<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">×</button>
       <h4>'.$this->session->flashdata('error_msg').'</h4></div>';
      }
      if($this->session->flashdata('upload_error'))
      {
       echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button>
       <h4>'.$this->session->flashdata('upload_error').'</h4></div>';
      }
    ?>


      <form action="<?php echo base_url();?>recording_of_proceedings/bench-wise" method="post" id="myForm"></form>
      <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
          <thead>
            <tr>
             <th style="width: 10px;"><!--<input type="checkbox" id="checkall" />-->S.No.</th>
             <th style="width: 60px;">Complaint no.</th>
             <th style="width: 60px;">Diary no.</th>
             <th style="width: 150px;">Department of public servant</th>
             <th style="width: 130px;">Designation of public servant</th>
            </tr>
          </thead>
          <tbody>
            <?php
                $c = 1;
                foreach($case_detail as $row):
            ?>
           
                <tr>
                  <td><?php echo $c++.'.'; ?></td>
                  <td><b><?php echo get_complaintno($row->filing_no); ?></b></td>
                  <td><?php if($row->filing_no){
                    echo $row->filing_no;
                    //$against_name = get_against_name($row->filing_no);
                  } ?></td>

                  <?php //$full_name_comp = $row->first_name." ".$row->mid_name." ".$row->sur_name; ?>
                  <td> <?php if($row->ps_orgn){
                    echo $row->ps_orgn;
                  } ?>
                  </td>

                  <td>
                   <?php if($row->ps_desig){
                    echo $row->ps_desig;
                  } ?>
                </td>
              </tr>
          
            <?php endforeach;
              if(count($case_detail) == 0){ ?>
                <tr>
                  <td colspan="11">
                    <div class="alert alert-danger text-center">
                      <h3 class="m-0">No record available. </h3>
                    </div>
                  </td>
                </tr>
             <?php }
             ?>
          </tbody>
          <tfoot>
            <tr>
             <th style="width: 10px;"><!--<input type="checkbox" id="checkall" />-->S.No.</th>
             <th style="width: 60px;">Complaint no.</th>
             <th style="width: 60px;">Diary no.</th>
             <th style="width: 150px;">Department of public servant</th>
             <th style="width: 130px;">Designation of public servant</th>
            </tr>
          </tfoot>
        </table>
      </div>



      <div class="row mt-30">

              
     
<?php
          $curYear = date('Y');
          $curMonth = date('m');
          $curDay = date('d');
          $cur_date = $curDay.'/'.$curMonth.'/'.$curYear;
          $cur_date12 = $curDay.'/'.$curMonth.'/'.$curYear;
          //  $comp_f_date="$curYear-$curMonth-$curDay"; 
          $order_date="$curDay-$curMonth-$curYear";                        
          ?>

          <form id="myForm" class="form-horizontal" action="<?php echo base_url();?>scrutiny/upload_extra_doc" method="post" id="" enctype="multipart/form-data">  

        <div class="col-md-3">
           <label for="venue" >Date</label> 
           <input type="text" class="form-control" name="order_date" id="comp_f_date" value="<?php echo $order_date;?>" readonly="readonly" placeholder="Entet Date ...">
        </div>

        <div class="form-group">  
                    <div class="col-md-4 col-sm-8 col-xs-8">
                        <label class="control-label " for="doc_upload">Upload document</label>
                        <input type="file" class="form-control order_upload" name="doc_upload" id="doc_upload">
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-4">
                       <input type="hidden" name="filing_no" value="<?php echo  $row->filing_no; ?>">
                      <button class="btn btn-lg btn-danger mt-30" type="submit" value="Submit">Submit</button>
                      </div>
                  </div>
                </form>
    
      </div>
              </div>
            </div>
          </div>
        </div>
<?php } ?>
  </div>
</div>


<script type="text/javascript">
            // When the document is ready     
     function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
    }
    
    function ValidateAlpha(evt)
    {
        var keyCode = (evt.which) ? evt.which : evt.keyCode
        if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32)
         
        return false;
            return true;
    }

</script>


<script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                 autoclose: true,  
                $('#dt_of_filing_from').datepicker({
                    format: "dd-mm-yyyy"
                });  
            
            });
       

         $(document).ready(function () {
                 autoclose: true,  
                $('#dt_of_filing_to').datepicker({
                    format: "dd-mm-yyyy"
                });  
            
            });

                function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
    
    function ValidateAlpha(evt)
    {
        var keyCode = (evt.which) ? evt.which : evt.keyCode
        if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32)
         
        return false;
            return true;
    }


</script>