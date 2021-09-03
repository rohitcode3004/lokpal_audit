<?php
//$elements = $this->label->view(1);
$this->load->helper("date_helper"); 
 ?>

  
 
<div class="app-content">
  <div class="main-content-app">
    <!--<div class="page-header">
      <h4 class="page-title">View Cause List</h4>
      <ol class="breadcrumb"> 
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item">View Cause List</li>
      </ol>
    </div>-->
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">List of your complaints
            <ul class="more-action">
              <li><a href="<?php echo base_url(); ?>filing/dashboard" class="previous">&laquo; Back</a></li>
            </ul>
          </div>
          <div class="panel-body">

            <div class="table-responsive">
              <span id="success_message"></span>
              <table id="mytable" class="table table-bordred table-striped">
                               
                <thead>                
                  <th>S.No.</th>             
                    <th>Date of Filing</th>
                      <th>Diary No</th>                     
                    <th>Name of Public Servant</th>
                    <th>Defects Letter</th>
                     <th>Action</th>
                
                </thead>
                <tbody>
                    <?php           
                      $u = $user['id'];
                      $c = 1;
                        foreach($user_comps as $row):
                  ?>
                  <tr>
                    <td><?php echo $c++; ?></td>
                   <!-- <td><?php echo $r = $row->ref_no; ?></td>-->

                       <td><?php echo get_displaydate($row->dt_of_filing); ?></td>
                          <td><?php echo $row->filing_no; ?></td>


                            <td><?php echo $row->ps_first_name.' '.$row->ps_mid_name.' '.$row->ps_sur_name; ?></td>


                             <?php if($row->defects_pdf_url ?? '' !=''){?>
                  <td><a href="<?php echo base_url();?><?php echo $row->defects_pdf_url ?? ''; ?>" target="_blank" alt="">Show Defects pdf </a>
                  </td> 
                    <?php } ?>
                    <td>
                      <?php
                      $comp_no=get_filing_no($r, $u);
                      $status = $comp_no['status'];
                      if($status == 't'){ ?>
                      <a href="<?php echo base_url().'affidavit/affidavit_detail/'.$r ?>">Go to application</a>
                      <?php }else{ ?>
                   <a href="<?php echo base_url().'filing/filing/'.$r ?>">Go to application</a>
                      <?php } ?>
                    </td>
                 <?php endforeach; ?>
                     
                  </tr>
                  
                
                </tbody>       
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



