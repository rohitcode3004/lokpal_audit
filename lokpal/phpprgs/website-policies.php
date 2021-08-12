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
					<h2 class="hr-bottom"> <span>Website Policies</span></h2>
					<div class="white mtop-20 wpolicy"><strong>1. 1.Copyright Policy</strong>
						<p>The contents of this website may not be reproduced partially or fully, without due permission from Lokpal Office,. If referred to as a part of another publication, the source must be appropriately acknowledged. The contents of this website can not be used in any misleading or objectionable context.</p>
						<strong>2. 2.Hyperlinking Policy</strong><br><br>
						<span class="text-success font-weight-bold">Links to external websites/portals</span>
						<p>At many places in this Website, you shall find links to other websites/portals. This links have been placed for your convenience. Lokpal is not responsible for the contents and reliability of the linked websites and does not necessarily endorse the views expressed in them. Mere presence of the link or its listing on this website should not be assumed as endorsement of any kind. Lokpal cannot guarantee that these links will work all the time and it has no control over availability of linked pages.</p>
						<span class="text-success font-weight-bold">Link to Lokpal Website by other websites/portals</span>
						<p>Prior permission is required before hyperlinks are directed from any website/portal to this site. Permission for the same, stating the nature of the content on the pages from where the link has to be given and the exact language of the Hyperlink should be obtained by sending a request to Web Information Manager.</p>
						<strong>3. Privacy Policy</strong>
						<p>As a general rule, this website does not collect Personal Information about you when you visit the site. You can generally visit the site without revealing Personal Information, unless you choose to provide such information.</p>
						<span class="text-success font-weight-bold">Site Visit data:</span>
						<p>This website may record your visit and logs the following information for statistical purposes your server's address; the name of the top-level domain from which you access the Internet (for example, .gov, .com, .in, etc.); the type of browser you use; the date and time you access the site; the pages you have accessed and the documents downloaded and the previous Internet address from which you linked directly to the site.<br><br>Lokpal will not identify users or their browsing activities, except when a law enforcement agency may exercise a warrant to inspect the service provider's logs.</p>
						<span class="text-success font-weight-bold">Cookies:</span><br>
						<span>This site does not use cookies.</span><br><br>
						<span class="text-success font-weight-bold">Email management:</span>
						<p>Your email address may be recorded if you choose to send a message. It will only be used for the purpose for which you have provided it and will not be added to a mailing list. Your email address will not be used for any other purpose, and will not be disclosed, without your consent.</p>
						<span class="text-success font-weight-bold">Collection of Personal Information:</span>
						<p>If you are asked for any other Personal Information you will be informed how it will be used if you choose to give it. If at any time you believe the principles referred to in this privacy statement have not been followed, or have any other comments on these principles, please notify the Web Information Manager through the contact us page.<br><br>
							<strong>Note: </strong>The use of the term "Personal Information" in this privacy statement refers to any information from which your identity is apparent or can be reasonably ascertained.</p>
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