<?php 
	include("header.php");
?>



<body>

 <?php 
		include("module/mod_head.php");
	?>
 
<div class="clear"></div>
  <section class="tr_main">
	<!-- -->
	<div class="container">
         
      <div class="row">
        <?php 
			include("module/mod_left.php");
		?>
		 
		<div class="col-md-9 tr_block_content">    	
          
		    	
				<div class="tr_tin_tuc">
				   
				    <?php 
					 $cater = get_queried_object();					     
						$taxonomy=$cater->taxonomy;
						$tendm=$cater->name;	

						$tongsotin=get_count_query_child($taxonomy,$cater->term_id);
					
				?>
					<h1 class="tr_tieu_de"><?php echo $tendm  ?></h1>
			 
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

									$so_tin=5;
 
									 

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
								$kq=lay_post_thuoc_danh_muc_taxmonomy($taxonomy,$cater->term_id,'menu_order asc',$start,$end);				
												
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
						 
									<div class="noi_dung">
										<div class="img"><a href="<?php echo $link?>"><img src="<?php echo $img?>" class="hvr-grow"/></a></div>
											<h4><a href="<?php echo $link?>"><?php echo $name?></a></h4>
											<p class="expert"> <?php echo $expert?></p>
											 <a href="<?php echo $link?>" class="xem_the"><?php echo $lang_xem_them?></a>
										<div class="clear"></div>	
									</div>
									<div class="clear"></div>
							 
						<?php 
									}
						?>
					 
				<div class="tr_phan_trang">
						<?php if($tongsotin !=0)
									{?>
										<nav class="woocommerce-pagination">
										<?php 
											$url="";
											if(is_home())
											{
												$url=home_url()."/";					  
											}
											else
											{
											 	$url=get_term_link($cater->slug,$taxonomy)."/";
											}			
										?>
											<ul class="page-numbers">	
												<?php 
													if($page > 1)
													{ ?>
														<li><a href="<?php echo $url.$page_pre?>" class="prev page-numbers">←</a></li>						
												<?php 
													}
													for($i=1;$i<=$page_cuoi;$i++)
													{ 		
														if($i==$page)
														{				   
														?>
															<li><span class="page-numbers current"><?php  echo $i ?></span></li>
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
													<li><a href="<?php echo  $url.$page_next?>" class="next page-numbers">→</a></li>
												</ul> 						
										</nav>
									<?php 
									}
									?>
						
					</div>
				
						<?php 
					   
					}
					
 
					
				?>
					<div class="clear"></div>
					<div class="tin_khac">
						  
					
					</div>
					
				</div>
		
		</div>	
		</div>
	</div>
	<!-- -->
	<div class="clear"></div>
</div>	
    <?php 
		include("footer.php");
	?>
  

 </body>
 