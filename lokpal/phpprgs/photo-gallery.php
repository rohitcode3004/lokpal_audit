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

					<div class="row" style="border-bottom: 4px solid #fff; margin-bottom: 30px;">
						<h2 class="col-md-12 text-success">Webinar on Lokpal Day</h2>
					<?php
						for ($i=1; $i <= 16; $i++) :;
							if($i<=9)	$pic='webinar_00'.$i.'.jpg';
							else 		$pic='webinar_0'.$i.'.jpg';
							echo'<div class="col-lg-3 col-md-4 col-xs-6 thumb">
					                <a href="images/pgallery/'.$pic.'?auto=compress&cs=tinysrgb&h=650&w=940" class="fancybox" rel="ligthbox">
					                    <img src="images/pgallery/'.$pic.'?auto=compress&cs=tinysrgb&h=650&w=940" class="zoom img-fluid "  alt="">	
					                </a>
				            	</div>';
			        	endfor;
			        ?>

					</div>

					<div class="row" style="border-bottom: 4px solid #fff; margin-bottom: 30px;">
						<h2 class="col-md-12 text-success">Women day celebration</h2>
					<?php
						for ($i=0; $i <= 10; $i++) :;
							if($i<=9)	$pic='IMG_0'.$i.'.JPG';
							else 		$pic='IMG_'.$i.'.JPG';
							echo'<div class="col-lg-3 col-md-4 col-xs-6 thumb">
					                <a href="images/women_day_celebration/'.$pic.'?auto=compress&cs=tinysrgb&h=650&w=940" class="fancybox" rel="ligthbox">
					                    <img src="images/women_day_celebration/'.$pic.'?auto=compress&cs=tinysrgb&h=650&w=940" class="zoom img-fluid "  alt="">	
					                </a>
				            	</div>';
			        	endfor;
			        ?>

					</div>

					<div class="row">
					<?php
						for ($i=1; $i <= 17; $i++) :;
							switch (strlen($i)) {
								case 1: $pic='p000'.$i.'.jpg'; break;
								case 2: $pic='p00'.$i.'.jpg'; break;
								case 3: $pic='p0'.$i.'.jpg'; break;								
								default: $pic='p'.$i.'.jpg'; break;
							}
							echo'<div class="col-lg-3 col-md-4 col-xs-6 thumb">
					                <a href="images/pgallery/'.$pic.'?auto=compress&cs=tinysrgb&h=650&w=940" class="fancybox" rel="ligthbox">
					                    <img src="images/pgallery/'.$pic.'?auto=compress&cs=tinysrgb&h=650&w=940" class="zoom img-fluid "  alt="">	
					                </a>
				            	</div>';
			        	endfor;
			        ?>

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