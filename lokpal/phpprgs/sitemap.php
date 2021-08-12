<?php if(!strstr(@SELF, strtolower($_SERVER['PHP_SELF']))) exit('No direct script access allowed'); ?>

	<div class="clearfix"></div>
	<link href="css-js/jquery-explr-1.4.css" rel="stylesheet" type="text/css">
	<div class="container white no-padding">
		<div class="row no-padding no-margin">

			<div class="col-12 inner-banner">
				<img src="images/inner-banners/banner2.jpg" class="img-responsive" alt="Inner Banner" style="max-height: 320px;" />
			</div>
			<div class="col-12 no-padding">
				<div class="inner-top">
					<ul class="breadcrumb">					    
						<li><a href="/lokpal">Home</a></li>
						<li><a href="#"><?= str_replace('_', ' ', IPVAR_ARRAY_1); ?></a></li>
						<li><a href="#" class="active"><?= str_replace('_', ' ', IPVAR_ARRAY_2); ?></a></li>
					  </ul>
				</div>

			</div>
			
			<div class="col-9 inner-page-content">
				<div class="inner-content">
					<h2 class="hr-bottom"> <span>Site Map</span></h2>
					
					<ul id="tree">
						<li class="icon-home"><a href="/">Home</a> </li>
						<li class="icon-user"><a href="#">About US</a> 
							<ul>
								<li class="icon-text"><a href="?about_us?about_lokpal?0101">Introduction</a></li>
								<li class="icon-text"><a href="?about_us?Logo?0102">Logo</a></li>
								<li class="icon-text"><a href="?about_us?Jurisdiction_and_Functions_of_Lokpal?0103">Jurisdiction and Functions of Lokpal</a></li>
								<li class="icon-text"><a href="?about_us?organization_structure?0105">Organization Structure</a></li>
								<li><a href="?about_us?members_directory">Directory</a></li>
							</ul>
						</li>
						<li class="icon-chain"><a href="#">Acts & Rules/ Regulations</a>
							<ul>					      
								<li class="icon-text"><a href="https://indiacode.nic.in/handle/123456789/2122?sam_handle=123456789/1362" target="_0201" class="outside-link">The Lokpal & Lokayuktas Act, 2013&nbsp;</a></li>
								<li class="icon-text"><a href="https://indiacode.nic.in/handle/123456789/1558?sam_handle=123456789/1362" target="_0202" class="outside-link">The Prevention of Corruption Act, 1988</a></li>	
								<li class="icon-text"><a href="https://indiacode.nic.in/handle/123456789/2258?sam_handle=123456789/1362" target="_0203" class="outside-link">The Delhi Special Police Establishment Act, 1946</a></li>
								<li class="icon-text"><a href="https://indiacode.nic.in/handle/123456789/2067?sam_handle=123456789/1362" target="_0209" class="outside-link">The Central Vigilance Commission Act, 2003</a></li>
								<li class="icon-text"><a href="https://indiacode.nic.in/handle/123456789/1611?sam_handle=123456789/1362" target="_0204" class="outside-link">The Code of Criminal Procedure Act, 1973</a></li>
								<li class="icon-text"><a href="https://indiacode.nic.in/handle/123456789/2191?sam_handle=123456789/1362" target="_0205" class="outside-link">The Code of Civil Procedure Act, 1908</a></li>
								<li class="icon-text"><a href="https://indiacode.nic.in/handle/123456789/2263?sam_handle=123456789/1362" target="_0206" class="outside-link">Indian Penal Code, 1860</a></li>
								<li class="icon-text"><a href="https://indiacode.nic.in/handle/123456789/2188?sam_handle=123456789/1362" target="_0211" class="outside-link">The Indian Evidence Act.</a></li>
								<li class="icon-text"><a href="https://indiacode.nic.in/handle/123456789/2036?sam_handle=123456789/1362" target="_0212" class="outside-link">Prevention of Money Laundering Act. (PMLA)</a></li>
							</ul>
						</li>

						<li class="icon-corner"> <a href="#">Citizen Corner</a>
							<ul>			                            	
								<li class="icon-text"><a href="?menu_bar?complaints_statistics?0301">Complaints Statistics</a></li>
							</ul>
						</li>
						<li class="icon-report mtop-12"> <a href="./?menu_bar?download?0401">Downloads</a></li>
						<li class="icon-photo"><a href="./?contact_us">Contact Us</a></li>								
						<li class="icon-photo"><a href="./?media_gallery?photo_gallery" class="no-border">Photo Gallery</a></li>

					</ul>

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