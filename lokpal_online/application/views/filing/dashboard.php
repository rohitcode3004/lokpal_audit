<?php
//$elements = $this->label->view(1);
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
                    <th>Date of Last Entry</th>
                      <th>Action</th>
                    <th>Public Servant Name</th>
                
                </thead>
                <tbody>
                    <?php    

                   // echo "<pre>"; 
                  ///  print_r($user_comps_partcdata) ;             
                      $u = $user['id'];
                      $c = 1;
                        foreach($user_comps as $row):
                  ?>
                  <tr>
                    <td><?php echo $c++; ?></td>
                   <!-- <td><?php echo $r = $row->ref_no; ?></td>-->

                       <td><?php echo $row->created_at; ?></td>
                   <!-- <td><?php if($row->filing_no){
                      echo $row->filing_no;
                       } ?></td>-->
                    <!--<td><?php if($row->filing_status == 't'){
                                echo "Application submitted";
                              }elseif($row->filing_status == 'f'){
                                echo "Not submitted";
                              }
                        ?></td>-->
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
                     <?php
                    foreach($user_comps_partcdata as $row):                        
                      ?>
                        <td><?php echo $row->ps_first_name.' '.$row->ps_mid_name.' '.$row->ps_sur_name; ?></td>
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



