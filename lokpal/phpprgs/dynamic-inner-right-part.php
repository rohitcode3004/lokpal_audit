<?php  if(!strstr(@SELF, strtolower($_SERVER['PHP_SELF']))) exit('No direct script access allowed'); ?>

<span class="btn btn-warning btn-block btn-xs btn-sm link-heading"><?= str_replace('_', ' ', IPVAR_ARRAY_1); ?></span>
<ul class="links-ul">
	<?php
		$li='<li>';
		if(strtolower(IPVAR_ARRAY_2)=='about_lokpal') $li='<li class="active">';
			echo $li.'<a href="?about_us?about_lokpal?0101">Introduction</a></li>';
		
		$li='<li>';
		if(strtolower(IPVAR_ARRAY_2)=='logo') $li='<li class="active">';
		 echo $li.'<a href="?about_us?logo?0102">Logo and motto/slogan</a></li>';
		
		$li='<li>';
		if(strtolower(IPVAR_ARRAY_2)=='jurisdiction_and_functions_of_lokpal') $li='<li class="active">';
		 echo $li.'<a href="?about_us?Jurisdiction_and_Functions_of_Lokpal?0103">Jurisdiction and Functions of Lokpal</a></li>';
		
		/*$li='<li>';
		if(strtolower(IPVAR_ARRAY_2)=='jurisdiction') $li='<li class="active">';	
			echo $li.'<a href="?about_us?jurisdiction?0104">Jurisdiction</a></li>';*/
		
		$li='<li>';
		if(strtolower(IPVAR_ARRAY_2)=='organization_structure') $li='<li class="active">';
			echo $li.'<a href="?about_us?organization_structure?0105">Organization Structure</a></li>';

		echo'<li><a href="?about_us?members_directory">Directory</a></li>';	
	?>
</ul>