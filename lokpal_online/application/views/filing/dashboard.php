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
              <li><a href="<?php echo base_url(); ?>e-filing" class="previous">&laquo; Back</a></li>
            </ul>
          </div>
          <div class="panel-body">

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

            <div class="table-responsive">
              <span id="success_message"></span>
              <table id="mytable" class="table table-bordred table-striped">                               
                <thead>                
                  <th>S.No.</th>             
                    <th>Date of Last Entry</th>                     
                    <th>Public Servant Name</th>
                     <th>Action</th> 
                     <th>Delete</th>                
                </thead>
                <tbody>
                    <?php    

                    //echo "<pre>"; 
                   //print_r($user_comps_partcdata) ; 


                      $u = $user['id'];
                      $c = 1;
                        foreach($user_comps as $row):
                          $r = $row->ref_no ?? '';
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
                   

                     <td><?php
                   $sql = "select ps_sur_name,ps_mid_name,ps_first_name from public_servant_partc where ref_no =".$row->ref_no."";
             $query  = $this->db->query($sql)->result();
            
             $fn=$query[0]->ps_first_name ?? '';
            $mn=$query[0]->ps_mid_name ?? '';
            $ls=$query[0]->ps_sur_name ?? ''; 
                 echo $fn.' '.$mn.' '.$ls;

          ?></td>

              


                  <td>
                      <?php
                      $comp_no=get_filing_no($r, $u);
                      $status = $comp_no['status'];
                      if($status == 't'){ ?>
                      <a href="<?php echo base_url().'complaint/preview/'.$r ?>">Go to application</a>
                      <?php }else{ ?>
                      <a href="<?php echo base_url().'e-filing/form/'.$r ?>">Go to application</a>
                      <?php } ?>
                    </td>
                     <td><a style="font-size: 18px"><i class="fa fa-trash-o" aria-hidden="true" onclick="checkconfirm(this.form,<?php echo $r ?>)"></i></a></td>


                       <?php endforeach;?>
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

<script type="text/javascript">

function checkconfirm(r)
{ 

var r = "<?php echo $r;?>";

if (confirm('Are you sure you want to delete this draft complaint?')) {
 location.href="<?php echo base_url().'filing/deleteby_ref/'.$r ?>";
} else {
  console.log('Thing was not saved to the database.');
}
}
</script>