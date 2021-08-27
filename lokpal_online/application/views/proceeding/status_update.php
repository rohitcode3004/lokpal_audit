<!-- Bootstrap Datepicker  Css -->
<link href="<?php echo base_url();?>assets/admin_material/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <div class="app-content">
      <div class="main-content-app">
        <div class="clearfix"></div>

        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                Status Update
                <ul class="more-action">
                  <li><a href="<?php echo base_url(); ?>proceeding/dashboard_main_level2/0" class="previous">&laquo; Back</a></li>
                </ul>
                
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
                <div class="panel panel-primary">
                  <div class="panel-heading form-inline">
                    <div class="form-group">
                      <label>Search Case by Complaint no.:</label>
                      <input type="text" class="form-control" id="user_input">
                    </div>
                    <button type="submit" class="btn btn-lg btn-default" id="search_complaint_details">Submit</button>
                  </div>
                  <div class="panel-body">
                    <div class="table-responsive">
                           <form id="complaint_allotment" class="form-horizontal" role="form" method="post" action='<?= base_url();?>proceeding/update_backlog_status_submit'  name="complaint_allotment" enctype="multipart/form-data">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>S.No.</th>
                            <th>Filing No.</th>
                            <th>Hearing Date</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody id="data-table">
                        </tbody>                        
                      </table>

                      <table class="table table-bordered table-mm-width">
                        <body>
                          <div class="col-md-4 mb-15">
                            <label>Hearing Date</label>
                            <input type="text" class="form-control" name="listing_date" id="listing_date" value="<?php echo set_value('listing_date', @$myArray[0]->listing_date); ?>"placeholder="">
                          </div>
                          <!--<div class="col-md-4 mb-15">
                            <label>Bench no.</label>
                            <input type="text" class="form-control" name="listing_date" id="listing_date" value="<?php echo set_value('listing_date', @$myArray[0]->listing_date); ?>"placeholder="">
                          </div>-->
              <div class="col-md-4 mb-15">
                <label for="order_type" ><span style="color: red;">*</span>Order Type</label>    
                <select type="text" class="form-control order_type chosen-single chosen-default" name="order_type" id="order_type" onchange="javascript:concerned_agency();">
                  <option value="">-- Select Order Type --</option>
                  <?php foreach($order_type as $row):?>              
                   <option value="<?php echo $row->ordertype_code;?>"> <?php echo $row->ordertype_name; ?> </option>
                 <?php endforeach;?>
                </select> 
                <div class="error"><?php echo form_error('order_type'); ?></div>
              </div>

              <div class="col-md-4 mb-15" id="other_action_div" style="display: none;">
                <label for="other_action" ><span style="color: red;">*</span>Other Action</label>    
                <select type="text" class="form-control other_action chosen-single chosen-default" name="other_action" id="other_action" onchange="javascript:concerned_agency();">
                  <option value="">-- Select Other Action --</option>
                  <?php foreach($other_action  as $row):?>              
                   <option value="<?php echo $row->ordertype_code;?>"> <?php echo $row->ordertype_name; ?> </option>
                 <?php endforeach;?>
                </select> 
                <div class="error"><?php echo form_error('other_action'); ?></div>
              </div>

              <div class="col-md-4 mb-15" id="status_rep_dept_div" style="display: none;">
                <label for="status_rep_dept"><span style="color: red;">*</span>Concerned Department/Agency</label>
                <input type="text" class="form-control" name="status_rep_dept" id="status_rep_dept">
              </div>

              <div class="col-md-4 mb-15" id="additional_doc_div" style="display: none;">
                <label for="additional_doc"><span style="color: red;">*</span>Additional Documents</label>
                <input type="text" class="form-control" name="additional_doc" id="additional_doc">
              </div>

              <div class="col-md-4 mb-15" id="others_ordertype_div" style="display: none;">
                <label for="others_ordertype"><span style="color: red;">*</span>Detail of Action</label>
                <input type="text" class="form-control" name="others_ordertype" id="others_ordertype">
              </div>


              <div class="col-md-4 mb-15" id="conce_agencydiv" style="display: none;">   
                <label for="conce_agency" ><span style="color: red;">*</span>Concerned Agency</label>    
                <select type="text" class="form-control chosen-single chosen-default" name="conce_agency" id="conce_agency" onchange="javascript:other_agn();">
                  <option value="">Select concerned agency</option>
                </select> 
                <div class="error"><?php echo form_error('conce_agency'); ?></div>
              </div>

              <div class="col-md-4 mb-15" id="psdetailsdiv" style="display: none;">   
                <label for="conce_agency" ><span style="color: red;">*</span>PS Details</label>    
                <textarea class="form-control" id="psdetails" name="psdetails" rows="4" cols="50" readonly>
                </textarea> 
                <div class="error"><?php echo form_error('psdetails'); ?></div>
              </div>

              <div class="col-md-4 mb-15" id="otheragndiv" style="display: none;">
                <label for="other_agency_name"><span style="color: red;">*</span>Name of Department</label>
                <input type="text" class="form-control" name="other_agency_name" id="other_agency_name">
              </div>

              <div class="col-md-4 mb-15" id="duedate_div" style="display: none;">   
                <label for="duedate">Due Date</label>
                <input type="text" class="form-control duedate datepicker" name="duedate" id="duedate"  placeholder="dd-mm-yyyy">
                <div class="error"><?php echo form_error('duedate'); ?></div>
              </div>

              <div class="col-md-4 mb-15" id="closure_div" style="display: none;">   
                <label for="closure_type"><span style="color: red;">*</span>Do you want to proceed against the complainant under section 46?</label>    
                <select type="text" class="form-control chosen-single chosen-default" name="closure_type" id="closure_type">
                  <option value="">Select</option>
                  <option value="no">No</option>
                  <option value="yes">Yes</option>
                </select> 
                <div class="error"><?php echo form_error('closure_type'); ?></div>
              </div>

              <div class="col-md-4 mb-15" id="adj_div" style="display: none;">   
                <label for="adj_date"><span style="color: red;">*</span>Next date of hearing</label>
                <input type="text" class="form-control adj_date datepicker" name="adj_date" id="adj_date"  placeholder="dd-mm-yyyy">
                <div class="error"><?php echo form_error('adj_date'); ?></div>
              </div>
                          <div class="col-md-4 mb-15">
                <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                          </div>
                        </body>
                      </table>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap-datepicker.js"></script>
  <script src="<?php echo base_url();?>assets/bootstrap/js/jquery.validate.min.js"></script>
  <script src="<?php echo base_url();?>assets/bootstrap/js/additional-methods.min.js"></script>

      <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
             autoclose: true,  
             $('#listing_date').datepicker({
              format: "dd-mm-yyyy"
            }); 
            $('#duedate').datepicker({
              format: "dd-mm-yyyy"
            });  

             $(document).ready(function() {
                $("#search_complaint_details").click(function() {
                    var cn = $("#user_input").val();
                    $.post("<?php echo site_url('proceeding/update_backlog_status_action'); ?>", {
                        n3: cn
                    }, function(data) {
                        //$("#msg").html(data);
                        $('#data-table').html(data);
                    });
  
                });
            });
             
           });
      </script>
      <script type="text/javascript">
      function concerned_agency()
    {
      otheragndiv.style.display="none";
      let concerned_div = document.getElementById('conce_agencydiv');
      let psdetails_div = document.getElementById('psdetailsdiv');
      let order_type = $('#order_type').children("option:selected").val();
      //alert(order_type);
      let order_type_2 = $('#other_action').children("option:selected").val();
      let filing_no = document.getElementById("filing_no");
      if(order_type == 1 || order_type == 2){
        status_rep_dept_div.style.display="none";
        additional_doc_div.style.display="none";
        other_action_div.style.display="none";
          closure_div.style.display="none";
          psdetails_div.style.display="none";
          adj_div.style.display="none";
          others_ordertype_div.style.display="none";
          concerned_div.style.display="";
          duedate_div.style.display="";
          jQuery.ajax({
            url: baseURL+'proceeding/get_concer_agency',
            cache: false,
            type : 'post',
            data : 'order_type='+order_type,
            dataType : 'JSON',
            success: function(data) {
              console.log(data);
              var agencyOptions = "";
              for (key in data) {
                agencyOptions += "<option value="+data[key]['agency_code']+">" + data[key]['agency_name'] + "</option>";
              }
              document.getElementById("conce_agency").innerHTML = agencyOptions;
            }
          });
         }
         else if(order_type == 3 || order_type == 7){
          //alert(filing_no.value);
          status_rep_dept_div.style.display="none";
          additional_doc_div.style.display="none";
          other_action_div.style.display="none";
          closure_div.style.display="none";
          concerned_div.style.display="none";
          adj_div.style.display="none";
          others_ordertype_div.style.display="none";
          psdetails_div.style.display="";
          duedate_div.style.display="";
          jQuery.ajax({
            url: baseURL+'proceeding/get_ps_data',
            cache: false,
            type : 'post',
            data : 'filing_no='+filing_no.value,
            dataType : 'JSON',
            success: function(data) {
              console.log(data.fullname);
              var content = "Name: "+data.fullname+"\n Designation: "+data.desg+"\n Organisation: "+data.org;
              $("#psdetails").val(content);
            }
          });
         }
         else if(order_type == 4){
          status_rep_dept_div.style.display="none";
          additional_doc_div.style.display="none";
          other_action_div.style.display="none";
          concerned_div.style.display="none";
          psdetails_div.style.display="none";
          closure_div.style.display="none";
          others_ordertype_div.style.display="none";
          duedate_div.style.display="none";
          adj_div.style.display="";
         }
         else if(order_type == 5 || order_type == 8 || order_type == 9){
          status_rep_dept_div.style.display="none";
          additional_doc_div.style.display="none";
          other_action_div.style.display="none";
          concerned_div.style.display="none";
          psdetails_div.style.display="none";
          adj_div.style.display="none";
          others_ordertype_div.style.display="none";
          duedate_div.style.display="none";
          closure_div.style.display="";
         }
         else if(order_type_2 == 6){
          status_rep_dept_div.style.display="none";
          additional_doc_div.style.display="none";
          other_action_div.style.display="";
          additional_doc_div.style.display="none";
          concerned_div.style.display="none";
          psdetails_div.style.display="none";
          adj_div.style.display="none";
          closure_div.style.display="none";
          duedate_div.style.display="";
          others_ordertype_div.style.display="";
         }
        else if(order_type_2 == 12){
          concerned_div.style.display="none";
          psdetails_div.style.display="none";
          adj_div.style.display="none";
          closure_div.style.display="none";
          duedate_div.style.display="none";
          others_ordertype_div.style.display="none";
          other_action_div.style.display="";
          status_rep_dept_div.style.display="";
          additional_doc_div.style.display="none";
         }
        else if(order_type_2 == 13){
          concerned_div.style.display="none";
          psdetails_div.style.display="none";
          adj_div.style.display="none";
          closure_div.style.display="none";
          duedate_div.style.display="none";
          others_ordertype_div.style.display="none";
          status_rep_dept_div.style.display="none";
          other_action_div.style.display="";
          additional_doc_div.style.display="";
          duedate_div.style.display="";
         }
        else if(order_type == 14){
          concerned_div.style.display="none";
          psdetails_div.style.display="none";
          adj_div.style.display="none";
          closure_div.style.display="none";
          duedate_div.style.display="none";
          others_ordertype_div.style.display="none";
          other_action_div.style.display="";
         }
         else{
          status_rep_dept_div.style.display="none";
          additional_doc_div.style.display="none";
          other_action_div.style.display="none";
          concerned_div.style.display="none";
          psdetails_div.style.display="none";
          closure_div.style.display="none";
          adj_div.style.display="none";
          others_ordertype_div.style.display="none";
          duedate_div.style.display="none";
         }
        }

  function other_agn()
    {
      let agn_name = $('#conce_agency').children("option:selected").val();
      if(agn_name == 4 || agn_name == 8){
          //alert(filing_no.value);
          //concerned_div.style.display="none";
          otheragndiv.style.display="";
         }
         else{
          //concerned_div.style.display="none";
          otheragndiv.style.display="none";
         }
        }

  function an_option()
    {
      let option_sel = $('#select_an_option').children("option:selected").val();
      let incomplete_div = document.getElementById('incomplete_div');
      if(option_sel == 1){   //complete
        incomplete_div.style.display="none";
        complete_div.style.display="";
        }
        else if(option_sel == 2){
          complete_div.style.display="none";
          incomplete_div.style.display="";
        }
      }
</script>