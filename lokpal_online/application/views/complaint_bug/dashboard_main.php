<?php
//$elements = $this->label->view(1);
?>
			<div class="app-content">
                <div class="main-content-app">
                	<div class="page-header">
                        <h4 class="page-title">Dashboard of Scrutiny Section</h4>
                        <ol class="breadcrumb"> 
                            <li class="breadcrumb-item"><a href="#">Dashboad</a></li> 
                            <li class="breadcrumb-item active" aria-current="page">Dashboard of Scrutiny Section</li> 
                        </ol>
                    </div>

                    <div class="clearfix"></div>
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
                    <div class="row">
                    	<div class="col-md-12">
                    		<div class="panel panel-default">
							  <div class="panel-heading">Complaint no counters</div>
							  <div class="panel-body">
							  	<div class="row">
							  		<div class="col-md-4 mb-15">
							  			<a href="" class="widgets-card gd-blueviolet">
							  				<div class="widgets-icon"><span><?php echo $year_ini_counter;  ?></span></div>
							  				<div class="widgets-content">Year Initialization Counter</div>
							  				<i class="fa fa-file-text-o transparent_icon" aria-hidden="true"></i>
							  			</a>
							  		</div>
							  		<div class="col-md-4 mb-15">
							  			<a href="" class="widgets-card gd-hotpink">
							  				<div class="widgets-icon"><span><?php echo $max_comp_no; ?></span></div>
							  				<div class="widgets-content">Case detail Counter</div>
							  				<i class="fa fa-file-text-o transparent_icon" aria-hidden="true"></i>
							  			</a>
							  		</div>
							  	</div>
							  </div>
							</div>
                    	</div>
                    </div>
                </div>
            </div>	

<script>
$(document).ready(function(){
 $('[data-toggle="tooltip"]').tooltip();  
});
</script>