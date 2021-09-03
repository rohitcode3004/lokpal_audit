<?php
//$elements = $this->label->view(1);
//print("<pre>".print_r($chklst,true)."</pre>");die('dd');
//print_r($user['role']);
?>

	<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap-datepicker.js"></script>
	<script src="<?php echo base_url();?>assets/bootstrap/js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
	  <script language="javascript"> 
    $().ready(function() {

    // validate signup form on keyup and submit
    $("#myForm").validate({

      onkeyup: false,

      rules: {  
        torole: "required",
        court_no:"required",   
        bench_nature: "required",
        newbench:"required",

        username: {
          required: true,
          minlength: 6,
          maxlength:12,     

        },

    messages: {
      torole: "Please select person to forward complaint",
      fname_err: "Please enter your firstname",
        //lname_err: "Please enter your lastname",
        username_err: {
          required: "Please enter a username",
          minlength: "Your username must consist of at least 6 characters",
          remote: "UserName Already Exist"
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
				<li class="breadcrumb-item"><a href="#">Dashboard for Scrutiny</a></li>
			</ol>
		</div>
		<div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
					<div class="panel-heading">
						Open for Edit Diary no. - <i><?php echo $filing_no; ?></i>
						<span class="pull-right">		
							<?php if(get_complaintno($filing_no) != 'n/a' ) { ?>
								Complaint no. - <i><?php echo get_complaintno($filing_no); ?></i>
							<?php } ?>
						</span>
					</div>

					<div class="panel-body">
						 <?php
              if($this->session->flashdata('success_msg'))
              {
               echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><h4 class="m-0">'.$this->session->flashdata('success_msg').'</h4></div>';
              }
              if($this->session->flashdata('error_msg'))
              {
               echo '<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">×</button>
               <h4 class="m-0">'.$this->session->flashdata('error_msg').'</h4></div>';
              }
              if($this->session->flashdata('upload_error'))
              {
               echo '<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">×</button>
               <h4 class="m-0">'.$this->session->flashdata('upload_error').'</h4></div>';
              }
            ?>
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h4 class="panel-title">Preview Complaint</h4>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-12">
									<ul class="form_list">
									<li><a target="_blank" href="<?php echo base_url().get_gadjet_report($filing_no);?>">C-<?php echo $filing_no;?></a></li>
									<?php
										$previous_gazzatte_reports = get_previous_gadjet_report(get_refno($filing_no));
									 if(!empty($previous_gazzatte_reports)) { 
										foreach ($previous_gazzatte_reports as $key => $value) {
										?>
									<li><a target="_blank" href="<?php echo base_url().$value->gazzette_notification_url; ?>">C-<?php echo $value->filing_no; ?></a></li>
									<?php } } ?>
								</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<iframe src="<?php echo base_url();?>cdn/scrutiny_df/<?php echo $filing_no; ?>.pdf" width="100%" height="600"></iframe>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<form id="myForm" class="form-horizontal" action="<?php echo base_url();?>scrutiny/openedit_submit" method="post" id="" enctype="multipart/form-data">						
									<div class="form-group">  
										<div class="col-md-4 col-sm-8 col-xs-8">
						    				<label class="control-label " for="doc_upload">Upload document if any</label>
						    				<input type="file" class="form-control order_upload" name="doc_upload" id="doc_upload">
						    			</div>
						    			<div class="col-md-4 col-sm-4 col-xs-4">
						    				<input type="hidden" name="filing_no" value="<?php echo  $filing_no; ?>">
											<button class="btn btn-lg btn-danger mt-30" type="submit" value="Submit">Submit</button>
						    			</div>
									</div>
									
									<div class="form-group">
 										
									</div>
								</form>

							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

		<script type="text/javascript">
			$(function ()
			{
				$("#myForm").on('submit', function (e)
				{
					if (document.getElementById("chbox").checked)
					{
						let frd_value = $('#torole').children("option:selected").val();
						var r = true;
						if(frd_value == 4){
								$("#myForm").submit();
						}else{
							$("#myForm").submit();
						}
					}
					else
					{
						e.preventDefault();
						alert('Please check the box before submitting the form');
					}
				});
			});
		</script>




