<?php
//$elements = $this->label->view(1);
?>
<div class="app-content">
    <div class="main-content-app">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
					<div class="panel-heading">Dashboard for Complaint Entry</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-4">
								<a href="<?php echo base_url('counter/dashboard_registry'); ?>" class="widgets-card gd-blueviolet">
							  		<div class="widgets-icon"><span id="ContentPlaceHolder1_lblTotalRegistration"><?php echo $pend_log; ?></span></div>
							  	<div class="widgets-content">Acknowledgement Issued from Reception Counter and Complaint Entry is to be done</div>
							  		<i class="fa fa-address-card-o transparent_icon" aria-hidden="true"></i>
							  	</a>
							</div>

							<div class="col-md-4">
								<a href="<?php echo base_url('Filing/dashboard_re_entry_complaint'); ?>" class="widgets-card gd-blueviolet">
							  		<div class="widgets-icon"><span id="ContentPlaceHolder1_lblTotalRegistration"><?php echo $re_entry_complaint; ?></span></div>
							  	<div class="widgets-content">List of Complaint open for editing</div>
							  		<i class="fa fa-address-card-o transparent_icon" aria-hidden="true"></i>
							  	</a>
							</div>

							<!--<div class="col-md-4">
								<a href="<?php echo base_url('counter/dashboard_registry'); ?>" class="widgets-card gd-hotpink">
									<div class="widgets-icon"><span><span id="ContentPlaceHolder1_lblTotalPending"><?php echo $pend_log; ?></span></div>
									<div class="widgets-content">Pending for Filing</div>
									<i class="fa fa-hourglass-end transparent_icon" aria-hidden="true"></i>
								</a>
							</div>-->
							<!--<div class="col-md-4">
								<a href="#" class="widgets-card gd-goldyellow">
									<div class="widgets-icon"><span id="ContentPlaceHolder1_lblNoOfSuMotoCases"><?php echo $scr_log;  ?></span></div>
									<div class="widgets-content">Forwarded to Scrutiny</div>
									<i class="fa fa-share transparent_icon" aria-hidden="true"></i>
								</a>
							</div>-->
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>


