<?php  if(!strstr(@SELF, strtolower($_SERVER['PHP_SELF']))) exit('No direct script access allowed');
	    
	   $mheading=trim(str_replace('_', ' ', @IPVAR_ARRAY_1));
	   $active_heading=trim(str_replace('_', ' ', @IPVAR_ARRAY_2));
	   if(empty($active_heading)) $active_heading=$mheading;
?>

<span class="btn btn-warning btn-block btn-xs btn-sm link-heading"><?= $mheading; ?></span>
<ul class="links-ul">
  <li class="active"><a href="#"><?= $active_heading; ?></a></li>
  <li><a href="./?about_us?about_lokpal?0101">About US</a></li>
  <li><a href="#" onclick="download_pdf('act-2013')" target="_0011">Acts & Rules/ Regulations</a></li>
  <li><a href="?menu_bar?complaints_statistics?0301">Citizen Corner</a></li> 
  <!--<li><a href="?menu_bar?download?0401">Download</a></li>--> 

<?php
	
	$dnone1=''; $dnone2='';
	if(strtolower($active_heading)=='contact us') $dnone1=' class="d-none"';
	if(strtolower($active_heading)=='photo gallery') $dnone2=' class="d-none"';

  echo '<li'.$dnone1.'><a href="?contact_us">Contact Us</a></li> 
  		<li'.$dnone2.'><a href="?media_gallery?photo_gallery">Photo Gallery</a></li>'; 
?> 
</ul>