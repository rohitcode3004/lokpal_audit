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
					<h2 class="hr-bottom"> <span>Disclaimer:</span></h2>
					<div class="white mtop-20 wpolicy">
						This Website is designed & developed by National Informatics Center and contents are maintained by Lokpal Office, Government of India.<br><br>The contents of this website are for information purposes only, enabling the public at large to have a quick and an easy access to information and do not have any legal sanctity. Though every effort is made to provide accurate and updated information, it is likely that the some details such as telephone numbers, names of the officer holding a post, etc may have changed prior to their update in the website. Hence, we do not assume any legal liability on the completeness, accuracy or usefulness of the contents provided in this website.<br><br>The links are provided to other external sites in some web pages/documents. We do not take responsibility for the accuracy of the contents in those sites. The hyperlink given to external sites do not constitute an endorsement of information, products or services offered by these sites.<br><br>Despite our best efforts, we do not guarantee that the documents in this site are free from infection by computer viruses etc.
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