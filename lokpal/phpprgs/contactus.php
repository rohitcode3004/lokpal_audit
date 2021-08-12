<?php if(!strstr(@SELF, strtolower($_SERVER['PHP_SELF']))) exit('No direct script access allowed'); ?>

	<div class="clearfix"></div>
	<div class="container white no-padding">
		<div class="row no-padding no-margin">

			<div class="col-12 inner-banner">
				<img src="images/inner-banners/banner2.jpg" class="img-responsive" alt="Inner Banner" style="max-height: 320px;" />
			</div>
			<div class="col-12 no-padding">
				<div class="inner-top">
					<ul class="breadcrumb">					    
						<li><a href="/">Home</a></li>
						<li><a href="#" class="active"><?= str_replace('_', ' ', IPVAR_ARRAY_1); ?></a></li>
						<!--<li><a href="#" class="active"><?= str_replace('_', ' ', IPVAR_ARRAY_2); ?></a></li>-->
					  </ul>
				</div>

			</div>

			<div class="col-9 inner-page-content">
				<div class="inner-content">
					<div class="row white no-margin padding-6">
						<div class="col-8 address-map d-none">
							<!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3503.086681330313!2d77.19363411504992!3d28.597176292431122!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce29fb44a031b%3A0xdf089a5045bdcdcc!2sThe+Ashok+Hotel!5e0!3m2!1sen!2sin!4v1556044935743!5m2!1sen!2sin" width="100%" height="300" frameborder="0" allowfullscreen></iframe>-->
						</div>
						<div class="col-12 mtop-12 pleft-22 text-center" style="margin: 0px auto !important; max-width: 70%;">
							<div class="p-1 bg-info text-white text-center">Contact Details</div>
							<div class="address-right-text">
								<span class="text-danger">LOKPAL OFFICE</span>
								<!-- on 21stFeb2020 <span>Oudh Corridor, Ashoka Hotel,<br>New Delhi - 110021 (India).</span>-->
								<span>Plot No-6, Vasant Kunj Institutional Area- Phase II,<br>New Delhi - 110070 (India).</span>
								<hr style="margin: -12px 0px 26px;" />							
							</div>
							<div class="conact-div mbottom-12 osd">						
								<span>+91 11 26125017</span>
								<span>js<font class="at">[dot]</font>lokpal<font class="dot">[at]</font>gov<font class="dot">[dot]</font>in</span>	
							</div>
							<div class="conact-div mbottom-12 ds">						
								<span class="d-none">-</span>	
								<span>mkmishra<font class="at">[at]</font>nic<font class="dot">[dot]</font>in</span>	
							</div>
							<div class="conact-div mbottom-12 us">						
								<span class="d-none">-</span>	
								<span>us<font class="at">[at]</font>lokpal<font class="dot">[dot]</font>gov<font class="dot">[dot]</font>in</span>	
							</div>
							<div class="conact-div mbottom-12 cs">						
								<span class="d-none">-</span>	
								<span>complaint-to-lokpal<font class="at">[at]</font>gov<font class="dot">[dot]</font>in</span>	
							</div>

						</div>
					</div>
				</div>
			</div>      

			<div class="col-3">
			<?php
			  if(!file_exists($fl_inner_right)) exit('File or directory not exists '.$fl_inner_right.' in line no. '.__LINE__);
			  else include $fl_inner_right;
			?>
			</div>

		</div>
	</div>
</div> <!-- ------ container_boxed class closed here ------->