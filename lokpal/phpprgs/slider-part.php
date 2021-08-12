<?php  if(!strstr(@SELF, strtolower($_SERVER['PHP_SELF']))) exit('No direct script access allowed'); ?>

	<div class="clearfix"></div>
	<div class="container">
		<div class="row">


				<div class="col-12 slider-div no-padding no-margin">					
					<div class="carousel slide carousel-fade" data-ride="carousel" id="carouselExampleFade">
						<ol class="carousel-indicators">
							<li class="active" data-slide-to="0" data-target="#carouselExampleFade"></li>
							<!--<li data-slide-to="1" data-target="#carouselExampleFade"></li>-->
						</ol>
						<div class="carousel-inner">
							<div class="carousel-item active">
								<img alt="Second slide" class="d-block w-100" src="images/members/banner1.jpg" style="max-height: 100%;">
							</div>

							<!--<div class="carousel-item">
								<img alt="Second slide" class="d-block w-100" src="images/members/banner2.jpg" style="max-height: 100%;">
							</div>-->
						</div>
						<a class="carousel-control-prev" data-slide="prev" href="#carouselExampleFade" role="button">
							<span aria-hidden="true" class="carousel-control-prev-icon"></span> 
							<span class="sr-only">Previous</span>
						</a> 
						<a class="carousel-control-next" data-slide="next" href="#carouselExampleFade" role="button">
							<span aria-hidden="true" class="carousel-control-next-icon"></span> 
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>

				<div class="col-12 notification-marquee">
					<div class="notice-head">Notifications</div>
					<div class="notice-text">
						<marquee onmouseover='this.stop();' onmouseout='this.start();'>
							<!--<a target="_blank" href="#">Former Supreme Court Judge Justice Pinaki Chandra Ghose is the First Lokpal </a>
							<a href="/pdfs/gazzette_notification.pdf" target="_0001">Gazzette Notification of Lokpal Complaint Rules, 2020</a>-->
							<span class="text-white">As the&nbsp;
								<a href="/pdfs/gazzette_notification.pdf" target="_0001" style="text-decoration: underline; color: #ffffff;font-size: 16px;">format for filing</a>
								&nbsp;complaints has been notified by the Government, complaints should be filed only in the format prescribed. The Office of Lokpal of India will not process complaints received that are not in the prescribed format.
							</span>
						</marquee>
					</div>
				</div>

		</div>
	</div>