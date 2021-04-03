<?php 
	include("header.php");
?>


<body>
 
 	<?php 
	include("module/mod_head.php");
	
	?>
	 <?php 
				 the_post();
					 
					
				?>
      <section class="page-title">
    	<div class="auto-container", align="center", style="color:#FFFFFF">
        	<h1><?php the_title(); ?></h1>
        </div>
    </section>
	<div class="sidebar-page-container">
    	<div class="auto-container">
        	<div class="row clearfix">
            	
                <!--Content Side-->
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
                	<!--Blog Single-->
                	<div class="blog-single">
						<div class="inner-box">
                           
                            <div class="lower-content">
                                <div class="upper-box">
                                    <div class="post-date"><?php the_title();?></div>
                                   
                                    <div class="text">
                                         <?php the_content();?>
                                    </div>
                                    <div class="lower-box">
                                        <div class="clearfix">
                                            <div class="pull-left">
                                                <ul class="social-sharing">
                                                    <li class="share">Follow us on:</li>
                                                    <li><a href="https://www.facebook.com/dtstelecom.com.vn"><span class="fa fa-facebook"></span></a></li>
                                                    <li><a href="https://www.linkedin.com/company/14593913"><span class="fa fa-linkedin"></span></a></li>
                                                </ul>
                                            </div>
                                          
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                     
                </div>
                
                <!--Sidebar Side-->
                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                	<aside class="sidebar default-sidebar">
						
                               
                        <!-- Cat Links -->
                        <div class="sidebar-widget cat-links tr_sidebar">
                        	<div class="sidebar-title">
                                <h1>Danh mục </h1>
                            </div>
                            <ul>
                            	 <?php 
									echo $list_danh_muc;
								 ?>
                            </ul>
                        </div>
                        
                        <!-- Recent Posts -->
                        <div class="sidebar-widget ">
                        	<div class="sidebar-title">
                                <h1>Danh mục tin</h1>
                            </div>
                            <?php 
								 $ketqua=lay_post_thuoc_taxmonomy("tin-tuc","menu_order asc",0,4);		
									foreach($ketqua as $result) 			
									{				
												 $name=$result->post_title;
												$name=qtranxf_use($lang, $name,false);
												$id_post=$result->ID; 							
												$expert=wpautop($result->post_excerpt);
												$expert=qtranxf_use($lang, $expert,false);
												$expert=wp_strip_all_tags($expert);
												$expert=sub_string($expert,60); 
												$link = get_permalink($result->ID );
												$img=get_image_size($result->ID,'images','medium');	
												$date=$result->post_date;
												$date=tep_convert_mysqldate_to_stringdate($date);
							?>
                            <article class="post">
                                <figure class="post-thumb"><a href="<?php echo $link ?>"><img src="<?php echo $img  ?>" alt=""></a></figure>
                                <div class="text"><a href="<?php echo $link ?>"><?php echo $name ?></a></div>
                                 <div class="text"><a href="<?php echo $link ?>"><?php echo $expert ?></a></div>
                                
                            </article>
                             <?php
									}
							 ?>
                            
                        </div>
                        
                        
                       </aside>
                </div>
                
            </div>
        </div>
    </div>
   <?php 
		include("footer.php");
	?>
</body>
</html>