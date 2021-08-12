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
						<li><a href="#"><?= str_replace('_', ' ', IPVAR_ARRAY_1); ?></a></li>
						<li><a href="#" class="active"><?= str_replace('_', ' ', IPVAR_ARRAY_2); ?></a></li>
					  </ul>
				</div>

			</div>

			<div class="col-9 inner-page-content">
				<div class="inner-content">
          <div class="row white no-margin padding-12-8">

            <?php  for($i=1; $i<=6; $i++) :; ?>

              <div class="col-4 mb-4">
                <div class="modal fade" id="modal<?= $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">

                      <div class="modal-header pltrt-20">
                        <h5 class="modal-title">Video Gallery</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <div class="modal-body mb-0 p-0">
                        <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">                          
                          <video controls="" name="media"><source src="images/videos/lokpal.mp4" type="video/mp4"></video>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <a><img class="img-fluid z-depth-1 vgallery-img" src="https://mdbootstrap.com/img/screens/yt/screen-video-1.jpg" alt="video"
                    data-toggle="modal" data-target="#modal<?= $i; ?>"></a>
              </div>

            <?php endfor; ?>

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