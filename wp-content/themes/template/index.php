<?php 
	include("header.php");
?>
<body>
 	<?php 
	include("module/mod_head.php");
	?> 
    <section class="main-banner1">
    	<div class=" clearfix">
        	<!--Curve Box-->
           
            
        	<div class="clearfix">
            	<!--Content Column-->
            	      <div class="d_slide">					 
				<div class="slider-wrapper theme-default">	
					<div class="mt_slide nivoSlider">		 
						  <?php 
							  $ketqua=get_all_post_with_name_custom_post("banner","menu_order asc",0,100);
								  foreach($ketqua as $result)						
								  {							
									$name=$result->post_title;
								$name=qtranxf_use($lang, $name,false);
									$img=get_image_size($result->ID,"images","full");
									$link =lay_gia_tri_postmeta($result->ID,"link");	
									?>
										<a href="<?php echo $link ?>" target="_self"><img src="<?php echo $img?>"  alt="<?php echo $name?>"></a> 
									<?php 
								 }	
							?> 			
					</div>											
					<div id="htmlcaption" class="nivo-html-caption"></div>										
				</div>									
			</div>
            
            </div>
        </div>
    </section>
    <!--End Main Slider-->
    
    <!--Services Section-->
    <section class="services-section">
    	<div class="auto-container">
        	<div class="sec-title centered">
            	<h2><?php echo $lang_tong_quan?></h2>
                <div class="text"><?php echo $lang_dts?></div>
            </div>
            
            <div class="row clearfix tr_dich_vu">
            	
                <!--Services Block-->
				
					 <?php 
						  $ketqua=get_all_post_with_name_custom_post("tong-quan","menu_order asc",0,5);		
							foreach($ketqua as $result) 			
							{				
										$name=$result->post_title;
							$name=qtranxf_use($lang, $name,false);
									 	$id_post=$result->ID; 
										$expert=wpautop($result->post_excerpt);
										$expert=qtranxf_use($lang, $expert,false);
										$expert=wp_strip_all_tags($expert);
										$link = lay_gia_tri_postmeta($result->ID,"link");
										$img=get_image_size($result->ID,'images','full');	
					   
					   ?>
                <div class="service-block col-xl-3 col-lg-6 col-md-6 col-sm-12">
                	<div class="inner-box wow fadeInLeft animated" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInLeft;">
                    	<div class="icon-box">
                        	<span class="icon"><img src="<?php echo $img ?>" alt=""></span>
                        </div>
                        <h3><a href="#"><?php echo $name ?></a></h3>
                        <div class="text"><?php echo $expert
						?></div>
                        
                    </div>
                </div>
					<?php 
						}	
					?>
            </div>
            
        </div>
    </section>
    <!--End Services Section-->
    

	<!--Domain Section-->
    <section class="domain-section">
        <div class="auto-container">
        	<div class="cloud-one"></div>
            <div class="cloud-two"></div>
        	<div class="sec-title light centered", style="color:#FFFFFF">
            	<h1><?php echo $lang_tim_kiem_ten_mien?></h1>
                <div class="text"><?php echo $lang_chon_ten_mien?></div>
            </div>
            <!--Domain Form-->
            <div class="domain-form">
                <form method="get" action="<?php echo get_permalink($page_tim_kiem_domain)?>">
                    <div class="form-group clearfix">
                        <input type="text" name="domain" value="" placeholder="<?php echo $lang_ten_mien_ban_muon_mua?>" required="">
                        <button type="submit" class="theme-btn checked-btn"><?php echo $lang_kiem_tra?><span class="arrow fa fa-angle-right"></span></button>
                    </div>
                </form>
            </div>
             
        </div>
    </section>
    <!--End Domain Section-->
    
    <!--Hosting Section-->
	
	<?php 
	
		$taxonomy="danh-muc";
							$catergory = get_terms($taxonomy,array(		'orderby'    => 'custom_sort',	
		'parent'=> 0,		'order'    => 'desc',		'hide_empty' => 0		 )	); 	
		$dem=0;	 
		foreach($catergory as $cater)	
		{	    										
			 
			if($cater->parent==0 &&	get_field('show_home', $taxonomy . '_' . $cater->term_id)==1)
			{
				$img_cat = get_field('hinh_danh_muc', $taxonomy . '_' . $cater->term_id);
					
				$img=$img_cat["url"];
				$link_cater=get_term_link($cater->slug,$taxonomy) ; 		
				$dem++;
				$name=$cater->name;
				$dec=$cater->description;
				$dec=qtranxf_use($lang, $dec,false);
	?>
    <section class="hosting-section">
    	<div class="auto-container">
        	<div class="row clearfix">
            
            	<!--Image Column-->
			<?php 
				if($dem%2==1)
				{
			?>
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                	<div class="image wow slideInLeft animated" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: slideInLeft;">
                    	<img src="<?php echo $img ?>" alt="">
                    </div>
                </div>
            <?php 
				}
			?>    
                <!--Content Column-->
                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                	<div class="inner-column">
                        <h1><?php echo $name ?></h1>
                        <div class="text"><?php echo $dec ?></div>
                        <ul class="list-style-one">
						  <?php 
							$taxonomy="danh-muc";
							$catergory1= get_terms($taxonomy,array(		'orderby'    => 'custom_sort',	
							'parent'=> $cater->term_id,		'order'    => 'desc',		'hide_empty' => 0		 )	); 	
							 
							foreach($catergory1 as $cater1)	
							{	    
								$link_cater1=get_term_link($cater1->slug,$taxonomy) ; 	
							  ?>
								<li><a href="<?php echo $link_cater1?>"><?php echo $cater1->name?></a></li>
							  <?php 
							}
						  ?>
                            
                        </ul>
                        <a href="https://dtstelecom.com.vn/lien-he" class="theme-btn btn-style-two wow bounce animated" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: bounce;"><?php echo $lang_lien_he?><span class="arrow fa fa-angle-right"></span></a>
                    </div>
                </div>
                
				
				<?php 
				if($dem%2==0)
				{
			?>
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                	<div class="image wow slideInLeft animated" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: slideInLeft;">
                    	<img src="<?php echo $img ?>" alt="">
                    </div>
                </div>
            <?php 
				}
			?>    
            </div>
        </div>
    </section>
    <?php 
			}
	}
	?>
	<!--End Hosting Section-->
 
    <!--Testimonial Section-->
    <section class="testimonial-section">
    	<div class="auto-container">
        	<div class="sec-title centered">
            	<h2><?php echo $lang_danh_gia_khach_hang?></h2>
            </div>
            <div class="single-item-carousel owl-carousel owl-theme">
            	
                <!--Testimonial Block-->
				<?php 
					 
				  $ketqua=get_all_post_with_name_custom_post("y-kien-khach-hang","menu_order asc",0,20);		
					foreach($ketqua as $result) 			
					{				
							$name=$result->post_title;
							$name=qtranxf_use($lang, $name,false);
							$id_post=$result->ID; 							
							$expert=wpautop($result->post_excerpt);
							$expert=qtranxf_use($lang, $expert,false);
							$expert=wp_strip_all_tags($expert);
							 
							$link = get_permalink($result->ID );
							$img=get_image_size($result->ID,'images','full');	
				?>    
                <div class="testimonial-block">
                	<div class="inner-box">
                    	<div class="text"><?php echo $expert?></div>
                        <div class="author-image">
                        	<img src="<?php echo $img?>" alt="" />
                        </div>
                        <h3><?php echo $name?></h3>
                       
                    </div>
                </div>
				<?php 
					}
				?>
                 
            </div>
        </div>
    </section>
    <!--End Testimonial Section-->
    
   
    
    <!--Sponsors Section-->
    <section class="sponsors-section">
    	<div class="auto-container">
        	<div class="sec-title centered">
            	<h2><?php echo $lang_doi_tac?></h2>
                <!-- <div class="text"></div> -->
            </div>
            <div class="sponsors-outer">
                <!--Sponsors Carousel-->
                <ul class="sponsors-carousel owl-carousel owl-theme">
				
				
				 <?php 
						  $ketqua=get_all_post_with_name_custom_post("lien-ket","menu_order asc",0,100);		
							foreach($ketqua as $result) 			
							{				
										$name=$result->post_title;
									 	$id_post=$result->ID; 
									 
										$link = lay_gia_tri_postmeta($result->ID,"link");
										$img=get_image_size($result->ID,'images','full');	
					   
					   ?>
					   
                    <li class="slide-item"><figure class="image-box"><a href="<?php echo $link?>">
					<img src="<?php echo $img ?>" alt=""></a></figure></li>
					
					<?php 
							}
					?>
                    
                </ul>
            </div>
            
        </div>
    </section>
    <!--End Sponsors Section-->

    <?php 
		include("footer.php");
	?>
</body>
</html>