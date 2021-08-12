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
					<h2 class="hr-bottom"> <span>Lokpal News</span></h2>
					<ul class="mtop-20 news">

						<li><a href="/pdfs/adv_31032021.pdf" target="_new31032021">Advertisement of various level of Consultants <img src="images/new.gif"></a></li>

						<li><a href="/?news?Annual_Report?9901">Presentation of Annual Report to President of India</a></li>
						
						<li><a href="/pdfs/adv_cuns_12032021.pdf" target="_new12032021">Advertisement for Consultant (Court Master).</a></li>

						<li><a href="/pdfs/wdayc_10032021.pdf" target="_new10032121">Women Day Celebration</a></li>

    					<li><a href="#" class="none">Former Supreme Court Judge Justice Pinaki Chandra Ghose is the First Lokpal.</a><br>
    					<!--<span>23<sup>rd</sup> March, 2019</span>-->
    					</li>

						<li><a href="/pdfs/gazzette_notification.pdf" target="_0001">Gazzette Notification of Lokpal Complaint Rules, 2020.</a></li>

						<!--<ul class="mtop-20 news">

							<li><a href="#" class="none">Lokpal website launched on 16 May, 2019&nbsp;&nbsp;<img src="images/new.gif"></a>
								<span>17th May, 2019</span>
							</li>
						</ul> Changed on 31stMay19 to insert ad for consultant-->

    					<!-- <li><a href="/pdfs/pr_off_ad.pdf" target="_pr_off_ad">Advertisement for the post of Protocol Officer (Contractual)&nbsp;&nbsp;<img src="images/new.gif"></a><br>&nbsp;
    					<span>19<sup>th</sup> August, 2019</span>
    					</li>
    
    					<li><a href="/pdfs/AdCon31May19.pdf" target="_new31stMay2019">Advertisement for the post of Consultant&nbsp;&nbsp;<img src="images/new.gif"></a><br>&nbsp;
    					<span>31 May, 2019</span>
    					</li>
						<li><a href="/pdfs/extention_cm_cs_01012021.pdf" target="_01012021">Extension date of submission of application for Court Master and Court Steno/Assistant Registrar by 31.01.2021</a></li>

						<li><a href="/pdfs/advconsextension_11122020.pdf" target="_11122020_2">Advertisement for Consultant (Extension of last date)</li>

						<li><a href="/pdfs/corradvyp_11122020.pdf" target="_11122020">Corrigendum for Advertisement for Young Professional</a></li>
						<li><a href="/pdfs/CAdv_young_07122020.pdf" target="_07122020">Corrigendum for Advertisement for Young Professional <img src="images/new.gif"></a></li>

						<li><a href="/pdfs/adv_yp_19112020.pdf" target="_19112020">Advertisement for Young Professional</a></li>
						<li><a href="/pdfs/adv_consultant_20102020.pdf" target="_20102020">Advertisement of Consultant</a></li>

    					<li><a href="/pdfs/adv_cm_cs_16102020.pdf" target="_16102020">Advertisement of Court Master and Court Steno/Assistant Registrar</a></li>

    					<li><a href="/pdfs/advt_reg_dreg_29092020.pdf" target="_29092020">Advertisement for Registrar, Deputy Registrar. (<font class="text-danger">last date as 20.11.2020</></font>)</a></li> -->
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
