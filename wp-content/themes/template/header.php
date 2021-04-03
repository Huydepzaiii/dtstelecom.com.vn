<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head >
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
<link href="<?php bloginfo('template_directory'); ?>/img/favicon.png" type="image/x-icon" rel="shortcut icon">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> 
	<?php
	global $page, $paged;

	wp_title( '|', true, 'right' );

	bloginfo( 'name' );

	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	if ( $paged >= 2 || $page >= 2 )

		echo ' | ' . sprintf( __( 'Page %s', 'DTS TELECOM' ), max( $paged, $page ) );

	?>  
	</title>
 <?php
   wp_head();
   ob_start();
    @session_start();	
	  
	 include("page_value_id.php");
	 
		 if(!isset($_SESSION["ma_giam_gia"]))
		 {
			
			 $_SESSION["ma_giam_gia"]=0;
			 $_SESSION["ten_ma"]="";
		 }
		   
	  
		if(isset($_REQUEST["subscribe"]))
		{
		    $txt_mail=$_REQUEST["newemail"];				  
					   $my_post = array(
						 'post_title' =>$txt_mail,
						 'post_type' => 'nhan-thu',					
						 'post_status' => 'publish',
					  );
					 wp_insert_post( $my_post );
				   wp_redirect("?page_id=".$page_thong_bao."&flag=14");	  
		}
		if(isset($_REQUEST["task"]))
			  {
				 $task=$_REQUEST["task"];
				 if($task=="logout")
				 {
					unset($_SESSION["ma_giam_gia"]);
					unset($_SESSION["ten_ma"]);
					session_destroy();
				   wp_logout();
				   wp_redirect(home_url());
				 }
			  }
		$lang=qtrans_getLanguage();	  
       include("language/".$lang.".php");  
		$ketqua=get_all_post_with_name_custom_post("quan-tri-chung","post_date desc",0,1);		
		foreach($ketqua as $result)												
		{																		
			  
			$logo=get_image_size($result->ID,'logo','full');	
			$ten_cong_ty=wpautop(lay_gia_tri_postmeta($result->ID,"ten_cong_ty")); 
			$ten_cong_ty=qtranxf_use($lang, $ten_cong_ty,false);
			$dia_chi=lay_gia_tri_postmeta($result->ID,"dia_chi_cty"); 
			$dia_chi=qtranxf_use($lang, $dia_chi,false);
			$thong_tin=wpautop(lay_gia_tri_postmeta($result->ID,"thong_tin")); 
			$thong_tin=qtranxf_use($lang, $thong_tin,false);
			$email=lay_gia_tri_postmeta($result->ID,"email"); 
			$hotline=lay_gia_tri_postmeta($result->ID,"hotline");
			$hotline_1=lay_gia_tri_postmeta($result->ID,"hotline_1");
			$hotline_2=lay_gia_tri_postmeta($result->ID,"hotline_2"); 
			$hinh_khach=get_image_size($result->ID,'hinh_khach','full');	
			$ten_khach=lay_gia_tri_postmeta($result->ID,"ten_khach"); 
			$ten_khach=qtranxf_use($lang, $ten_khach,false);
			$dia_chi_khach=wpautop(lay_gia_tri_postmeta($result->ID,"dia_chi_khach"));
			$dia_chi_khach=qtranxf_use($lang, $dia_chi_khach,false);
			$loi_danh_gia=wpautop(lay_gia_tri_postmeta($result->ID,"loi_danh_gia"));
			$loi_danh_gia=qtranxf_use($lang, $loi_danh_gia,false);
			$video=lay_gia_tri_postmeta($result->ID,"video"); 
			$video=str_replace("watch?v=","embed/",$video);
			$video=str_replace("http:","",$video);	
			$avtar=get_image_size($result->ID,'avtar','full');	
			$ten_khach=lay_gia_tri_postmeta($result->ID,"ten_khach"); 	
			$khach_hang_noi=wpautop(lay_gia_tri_postmeta($result->ID,"khach_hang_noi")); 
			$khach_hang_noi = qtranxf_use($lang, $khach_hang_noi,false);	
			$id_post_chu=$result->ID;
			$fanpage=lay_gia_tri_postmeta($result->ID,"fanpage");
			$google=lay_gia_tri_postmeta($result->ID,"google");
			$ins=lay_gia_tri_postmeta($result->ID,"ins");
			$youtube=lay_gia_tri_postmeta($result->ID,"youtube");
			
		} 
?>  
<link href="<?php bloginfo('template_directory'); ?>/css/bootstrap.css" rel="stylesheet">
<link href="<?php bloginfo('template_directory'); ?>/css/style.css" rel="stylesheet">
<link href="<?php bloginfo('template_directory'); ?>/css/responsive.css" rel="stylesheet">
<link href="<?php bloginfo('template_directory'); ?>/style.css" rel="stylesheet">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/js/nivo_repo/default.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/js/nivo_repo/nivo-slider.css" type="text/css" media="screen"/>
<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.png" type="image/x-icon">
<link rel="icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.png" type="image/x-icon">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v9.0" nonce="iRM5FCtF"></script>
</head>