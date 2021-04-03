<?php 
	include("header.php");
?>

<body>
 
 	<?php 
	include("module/mod_head.php");
	
	?>
	 <?php 
					$post_types = get_post_type();
					$tongsotin = wp_count_posts( $post_types )->publish;
					 
					
				?>
      <section class="page-title">
    	<div class="auto-container", align="center", style="color:#FFFFFF">

        	<h1><?php post_type_archive_title(); ?></h1>
        </div>
    </section>
	<section class="blog-grid-section">
    	<div class="auto-container">
        	<div class="row clearfix">
            	
                <!--News Block-->
				 <?php 
					if($tongsotin==0)
					{
					  ?>
					   Đang cập nhật thông tin 
					  <?php 
					}
					if($tongsotin==1)
					{ 
						 
					}
					if($tongsotin>=1) 
					{
					  
					  if ( get_query_var('paged') ) {	
								   $page = get_query_var('paged');

									} else if ( get_query_var('page') ) {

										$page = get_query_var('page');

									} else {

										$page = 1;

									}		

									$page_pre=1;

									$page_next=1;	

									$so_tin=6;
 
									 

									$page_cuoi=ceil($tongsotin/$so_tin);

									$page_next=$page_cuoi;

									if($page_cuoi==0)

									{

									  $page_cuoi=1;

									}

									if($page!=1)

									{

										$page_pre=$page-1;

									}

									if($page!=$page_cuoi)

									{

										$page_next=$page+1;

									}

									$page1=$page-1;

									$start=$page1*$so_tin;

									$end=$so_tin;

									$dem=0;

									$dem=$page*$so_tin-1;
									
						
								$dem=0;
								$kq=get_all_post_with_name_custom_post($post_types,'menu_order asc',$start,$end);				
												
									foreach($kq as $result)
									{
										 	 
										$id_post= $result->ID;
										$img=get_image_size($result->ID,"images","medium");		
										$link=get_permalink($result->ID); 
										$expert=wpautop($result->post_excerpt);
										$expert = qtranxf_use($lang, $expert,false); 
										$name=$result->post_title;
										$name = qtranxf_use($lang, $name,false);
										$expert=sub_string($expert,200);
										$link = get_permalink($result->ID );
										  
										 
								
							?>
                <div class="news-block col-lg-4 col-md-6 col-sm-12">
                	<div class="inner-box wow fadeInLeft animated" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInLeft;">
                    	<div class="image">
                        <a href="<?php echo $link ?>"><img src="<?php echo $img  ?>" alt=""></a>	
                        </div>
                      <div class="lower-content">
                        	<div class="upper-box">
                        	 
                            	<h2><a href="<?php echo $link?>"><?php echo $name?></a></h2>
                            	<div class="text"><?php echo $expert?></div>
                            </div>
                             
                        </div>
					
					</div>
                </div>
				
				<?php 
				   }
				   
				   
				   
				   
		 }
				?>
                
                 
            </div>
            <?php if($tongsotin !=0)
				{?>
					 
            <ul class="styled-pagination text-center wow flash" data-wow-delay="600ms" data-wow-duration="1500ms" style="visibility: hidden; animation-duration: 1500ms; animation-delay: 600ms; animation-name: none;">
            	
			
					<?php 
						$url="";
						if(is_home())
						{
							$url=home_url()."/";					  
						}
						else
						{
							$url=get_post_type_archive_link($post_types)."/";
						}			
			 	?>
				
				<li class="prev"><a href="<?php echo $url.$page_pre?>"><span class="fa fa-angle-left"></span></a></li>
				
				
				<?php 
					 
					for($i=1;$i<=$page_cuoi;$i++)
					{ 		
						if($i==$page)
						{				   
						?>
						<li><a class="active" href="<?php echo $url.$i ?>" class="page-numbers"><?php  echo $i ?></a></li>
						<?php 
						}
						if($i!=$page)
						{
						?>
							<li><a href="<?php echo $url.$i ?>" class="page-numbers"><?php  echo $i ?></a></li>
						<?php 
						}	
					}
					?>
             
                <li class="next"><a href="<?php echo  $url.$page_next?>"><span class="fa fa-angle-right"></span></a></li>
			</ul>
				<?php 
				}
				?>
                      
            <!--End Styled Pagination-->
            
        </div>
    </section>
    <?php 
		include("footer.php");
	?>
</body>
</html>