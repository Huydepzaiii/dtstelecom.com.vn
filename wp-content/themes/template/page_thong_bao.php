
<?php 
/**
*   Template Name: Template thong_bao
* 
* @package ITGREEN Ho Chi Minh
*
*/
	include("header.php");
?>

<?php 
/**
*   Template Name: Template thong_bao
* 
* @package ITGREEN Ho Chi Minh
*
*/
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
    	<div class="auto-container">
        	<h2><?php the_title(); ?></h2>
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
                                                    <li class="share">Share:</li>
                                                    <li><a href="https://www.facebook.com/dtstelecom.com.vn/"><span class="fa fa-facebook"></span></a></li>
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
                                <h2>Danh mục </h2>
                            </div>
                            <ul>
                            	 <?php 
									echo $list_danh_muc;
								 ?>
                            </ul>
                        </div>
                    
                            
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