<?php error_reporting(0);

	define('SELF', strtolower($_SERVER['PHP_SELF']));
	$inner_page_var=$_SERVER['REQUEST_URI'];
	$ip_var_array=explode('?', $inner_page_var);
	define('IPVAR_ARRAY_1', $ip_var_array[1]);
	define('IPVAR_ARRAY_2', $ip_var_array[2]);
	define('IPVAR_ARRAY_3', $ip_var_array[3]);


    $fl_inner_right='phpprgs/static-inner-right-part.php';
    $fl_dinner_right='phpprgs/dynamic-inner-right-part.php';
	$fl_header='phpprgs/header-part.php';
	$fl_slider='phpprgs/slider-part.php';
	$fl_center='phpprgs/center-part.php';
	$fl_footer='phpprgs/footer-part.php';
	$fl_inner='phpprgs/innerpage.php';
	$fl_pgallery='phpprgs/photo-gallery.php';
	$fl_vgallery='phpprgs/video-gallery.php';
	$fl_members='phpprgs/members-directory.php';
	$fl_mprofile='phpprgs/member-profile.php';
	$fl_feedback='phpprgs/feedback.php';
	$fl_sitemap='phpprgs/sitemap.php';
	$fl_disclaimer='phpprgs/disclaimer.php';
	$fl_news='phpprgs/news.php';
	$fl_contactus='phpprgs/contactus.php';
	$fl_wpolicies='phpprgs/website-policies.php';

	if(!file_exists($fl_header)) exit(__LINE__.' File or directory not exists!');
	else require_once($fl_header);

	if(IPVAR_ARRAY_1==NULL) {
		if(!file_exists($fl_slider)) exit(__LINE__.' File or directory not exists!');
		else require_once($fl_slider);

		if(!file_exists($fl_center)) exit(__LINE__.' File or directory not exists!');
		else require_once($fl_center);
	} 
	elseif(IPVAR_ARRAY_2=='photo_gallery'){	

		if(!file_exists($fl_pgallery)) exit(__LINE__.' File or directory not exists!');
		else require_once($fl_pgallery);
	} 
	elseif(IPVAR_ARRAY_2=='video_gallery'){	

		if(!file_exists($fl_vgallery)) exit(__LINE__.' File or directory not exists!');
		else require_once($fl_vgallery);
	}

	elseif(IPVAR_ARRAY_2=='members_directory'){	

		if(!file_exists($fl_members)) exit(__LINE__.' File or directory not exists!');
		else require_once($fl_members);
	}

	elseif(IPVAR_ARRAY_1=='contact_us'){	

		if(!file_exists($fl_contactus)) exit(__LINE__.' File or directory not exists!');
		else require_once($fl_contactus);
	}

	elseif(IPVAR_ARRAY_1=='member_profile'){	

		if(!file_exists($fl_mprofile)) exit(__LINE__.' File or directory not exists!');
		else require_once($fl_mprofile);
	}

	/*elseif(IPVAR_ARRAY_2=='feedback'){	

		if(!file_exists($fl_feedback)) exit(__LINE__.' File or directory not exists!');
		else require_once($fl_feedback);
	}*/

	elseif(IPVAR_ARRAY_2=='sitemap'){	

		if(!file_exists($fl_sitemap)) exit(__LINE__.' File or directory not exists!');
		else require_once($fl_sitemap);
	}

	elseif(IPVAR_ARRAY_2=='disclaimer'){	

		if(!file_exists($fl_disclaimer)) exit(__LINE__.' File or directory not exists!');
		else require_once($fl_disclaimer);
	}

	elseif(IPVAR_ARRAY_2=='news'){	

		if(!file_exists($fl_news)) exit(__LINE__.' File or directory not exists!');
		else require_once($fl_news);
	}

	elseif(IPVAR_ARRAY_2=='website_policies'){	

		if(!file_exists($fl_wpolicies)) exit(__LINE__.' File or directory not exists!');
		else require_once($fl_wpolicies);
	}

	else {		

		if(!file_exists($fl_inner)) exit(__LINE__.' File or directory not exists!');
		else require_once($fl_inner);
	}


	if(!file_exists($fl_footer)) exit(__LINE__.' File or directory not exists!');
	else require_once($fl_footer);

?>