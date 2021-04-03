<?php 
	include("header.php");
?>


<body>
 
 	<?php 
	 global $wpdb;  
	include("module/mod_head.php"); 
	the_post(); 
	$id_post_bai=$post->ID;
	$loai="";
	$id_loai="";
	$flag=0;
	$ketqua=get_all_post_with_name_custom_post("acf-field-group","menu_order asc",0,100);
	foreach($ketqua as $result)						
	{							
		  
		 $mang_content=unserialize($result->post_content);  
		 $loai=$mang_content["location"][0][0]["param"];
		 $id_loai=$mang_content["location"][0][0]["value"];
		  if($id_loai==$id_post_bai)
		  {
			  /*
			echo "<pre>";
			print_r($mang_content);
			echo "</pre>";
			*/
			$flag=1;
			$id_acf=$result->ID;
		 }
	  
	}
	if($flag==1)
	{
		$query1="    select  * FROM $wpdb->posts where 
				(post_status = 'publish' OR post_status = 'private')";
		$query1.=" AND post_parent=".$id_acf." order by menu_order asc ";	 
		 
		$kq1 = $wpdb->get_results($query1);
		 
		foreach($kq1 as $result1)						
		{
			/*
			$mang_content=unserialize($result->post_content);  
			echo "<pre>";
			print_r($mang_content);
			echo "</pre>";
			*/
			
			$meta_post=$result1->post_excerpt;
			$mang_key= explode("_", $meta_post);
			$loai_block=$mang_key[0];
			if($loai_block=="td")
			{
				$value=wpautop(lay_gia_tri_postmeta($id_post_bai,$meta_post));
					$value=qtranxf_use($lang, $value,false);
				?> 
 				<section class="page-title tr_tieu_de_top">
					<div class="auto-container">		
						 <?php echo $value;?>
					</div>
				  <div class="clear"></div></section>
				<?php 
			}
			if($loai_block=="block")
			{
				$value=wpautop(lay_gia_tri_postmeta($id_post_bai,$meta_post));
				?> 
 				 	<section class="about-section1 tr_tieu_de_dv tr_section tr_content_table">
						<div class="auto-container">
							 <div class="sec-title list-style-one"> 
								<?php echo $value ?> 
							  </div>
						</div>
					  <div class="clear"></div></section>
				<?php 
			}
			if($loai_block=="banggia")
			{
				 
				 $noi_dung_top=$meta_post."_noi_dung_top";
				 $noi_dung_top=wpautop(lay_gia_tri_postmeta($id_post_bai,$noi_dung_top));
				 	$noi_dung_top=qtranxf_use($lang, $noi_dung_top,false);
				?> 
 				  <section class="tr_section">
						<div class="auto-container">
							<div class="sec-title centered">
								  <?php echo $noi_dung_top?>
							</div>
							<div class="outer-container pricing-tabs tabs-box">
								<div class="clear"></div> 
								   <!-- -->
								   <section class="body cover tabunix" rel="unix">
      
		<?php 
		    $bang_gia=$meta_post."_bang_gia";
			$goi=lay_gia_tri_postmeta($id_post_bai,$bang_gia); 
			 
			$goi=unserialize($goi);  
			if(is_array($goi))
			{
				for($i=0;$i<count($goi);$i++) 
				{
						
				    if(count($goi)==1)
					{						
				  ?>
				     <ul class="package server row">
		    
				  <?php 
						$ketqua=lay_post_thuoc_danh_muc_taxmonomy("nhom-goi",$goi[$i]," menu_order asc ",0,100);
						 $class="";
						
						 if(count($ketqua)%2==0)
						 {
							 $class="col-md-6";
						 }
						 else 
						 {
							 $class="col-md-4";
						 }
						  if(count($ketqua)==1)
						 {
							 $class="col-md-12";
						 }
						 foreach($ketqua as $result)
						  {
								  $name=$result->post_title;
								  $name = qtranxf_use($lang, $name,false); 
								 $thong_so=wpautop(lay_gia_tri_postmeta($result->ID,"thong_so"));
								  $thong_so = qtranxf_use($lang, $thong_so,false);	 
								  
								  $gia=wpautop(lay_gia_tri_postmeta($result->ID,"gia"));
								  $gia = qtranxf_use($lang, $gia,false);	
								  $id_post= $result->ID;
		?>	
              <li class="<?php echo $class?>">  
			<div class="tr_sever_content">
			  <div class="left">
				<h2><?php echo $name ?></h2>
				<div class="clear"></div>
					<?php 
						echo $thong_so;
					?>	
			   </div>
			  <div class="right">
				<div class="pricing">         
				 <div class="price"><?php echo $lang_gia?></div>
				 
				  <div class="clear"></div>
				  <div class="listplan">
					<div class="list_plan">
							 
							<?php 
						echo $gia;
					?>	
							
							</div>              </div>
				  <div class="clear"></div>              
				</div>            
			  </div> 
			  <div class="right2">
							<a class="theme-btn btn-style-two wow bounce animated" rel="nofollow" href="<?php echo get_permalink($page_thanh_toan)?>?id=<?php echo $id_post;?>"><?php echo $lang_dang_ky?></a>
											
			  </div> 
			  <div class="clear"></div>
			</div>
	   </li>
					<?php 
						  }
						  ?>
					</ul>
					<?php 
					}
					else
					{
						 
						 
						?>
					<div class="tr_center">	
						<div class="title-column">
							<div class="inner-column">
								
								<!--Tab Btns-->
								<ul class="tab-buttons clear">
								<?php 
									for($i=0;$i<count($goi);$i++) 
									{
									  $category = get_term_by('id',$goi[$i],'nhom-goi');
								   ?>
									  <li data-tab="#prod_<?php echo $category->slug?>" class="tab-btn <?php if($i==0) echo ' active-btn ' ?> "><?php echo $category->name ?></li>
									 <?php 
									}
									 ?>
								</ul>
								
							</div>
						</div>
						<div class="clear"></div>
					</div>	
						 <section class="body cover tabunix pricing-tabs" rel="unix">
						   <div class="tabs-content">
						  <?php 
						      
									for($i=0;$i<count($goi);$i++) 
									{
									  $category = get_term_by('id',$goi[$i],'nhom-goi');
								   ?>
								   
										<div class="tab <?php if($i==0) echo " active-tab " ?>" id="prod_<?php echo $category->slug?>">
											<div class="content">
											
											<ul class="package server row">
		    
										  <?php 
												$ketqua=lay_post_thuoc_danh_muc_taxmonomy("nhom-goi",$goi[$i]," menu_order asc ",0,100);
												 foreach($ketqua as $result)
												  {
														  $name=$result->post_title;
														  $name = qtranxf_use($lang, $name,false); 
														 $thong_so=wpautop(lay_gia_tri_postmeta($result->ID,"thong_so"));
														  $thong_so = qtranxf_use($lang, $thong_so,false);	 
														  
														  $gia=wpautop(lay_gia_tri_postmeta($result->ID,"gia"));
														  $gia = qtranxf_use($lang, $gia,false);	
														  $id_post= $result->ID;
								?>	
									  <li class="col-md-4">  
									<div class="tr_sever_content">
									  <div class="left">
										<h2><?php echo $name ?></h2>
										<div class="clear"></div>
											<?php 
												echo $thong_so;
											?>	
									   </div>
									  <div class="right">
										<div class="pricing">         
										 <div class="price"><?php echo $lang_gia?></div>
										 
										  <div class="clear"></div>
										  <div class="listplan">
											<div class="list_plan">
													 
													<?php 
												echo $gia;
											?>	
													
													</div>              </div>
										  <div class="clear"></div>              
										</div>            
									  </div> 
									  <div class="right2">
													<a class="theme-btn btn-style-two wow bounce animated" rel="nofollow" href="<?php echo get_permalink($page_thanh_toan)?>?id=<?php echo $id_post;?>"><?php echo $lang_dang_ky?></a>
																	
									  </div> 
									  <div class="clear"></div>
									</div>
							   </li>
											<?php 
												  }
												  ?>
											</ul>
											</div>
										</div>
									<?php 
									}
									 ?>
									 <div class="clear"></div>
						   </div> 
						   
						   
 <div class="clear"></div>
 
 
						  <div class="clear"></div></section>
						
						
						<?php
						}
						
					}
					 
				}
		 
					?>
         
       <div class="clear"></div>
        
	<div class="ghi_chu_them list-style-one"> 
			<?php

				$noi_dung_top=$meta_post."_noi_dung_footer";
				 $noi_dung_top=wpautop(lay_gia_tri_postmeta($id_post_bai,$noi_dung_top));
				 echo $noi_dung_top;
			?> 
	</div>		
		 <div class="clear"></div>
   <div class="clear"></div></section>
                   
								   <!-- -->
							</div>
						</div>
        <div class="clear"></div>
				  <div class="clear"></div></section>				   
				<?php 
			}
			 if($loai_block=="bosung")
			{
				 $noi_dung_top=$meta_post."_noi_dung_top";
				 $noi_dung_top=wpautop(lay_gia_tri_postmeta($id_post_bai,$noi_dung_top));
				?>
		 <section class="tr_section plans-section">
        <div class="auto-container">
        	<div class="sec-title centered">
            	  <?php echo $noi_dung_top ?> 
              
            </div>
        	<div class="outer-container pricing-tabs tabs-box">
                <div class="clear"></div>
                    
                   
                <section class="body cover tabunix" rel="unix">
				<div class="plans-outer">
				  <div class="plans-table">
					<table class="dich_vu_bo_sung table">
						<?php 
						    $bang_gia=$meta_post."_bang_gia";
							$goi=lay_gia_tri_postmeta($id_post_bai,$bang_gia);  
							$goi=unserialize($goi);   
							if(is_array($goi))
							{
								 for($i=0;$i<count($goi);$i++) 
									{
										$ketqua=lay_post_thuoc_danh_muc_taxmonomy("nhom-bo-sung",$goi[$i]," menu_order asc ",0,100);
										 
										 foreach($ketqua as $result)
										  {
												  $name=$result->post_title;
												  $name = qtranxf_use($lang, $name,false); 
												  
												  $gia=wpautop(lay_gia_tri_postmeta($result->ID,"gia"));
												  $gia = qtranxf_use($lang, $gia,false);	
												  $id_post= $result->ID;
												  
												  ?>
												<tr>
													<td class="title"> <?php echo $name ?></td>
													<td><?php echo $gia ?></td>
													<td> 
													
														<a class="theme-btn btn-style-two wow bounce animated" rel="nofollow" href="<?php echo get_permalink($page_thanh_toan)?>?id=<?php echo $id_post;?>"><?php echo $lang_dang_ky?></a>
													</td>
												
												</tr>
												  
												  <?php 
												  
										  }
									}
							}
						?>
					</table>	
				
					</div>
				</div>	
				  <div class="clear"></div></section>
        
       <div class="clear"></div>
        
	<div class="ghi_chu_them list-style-one"> 
			<?php 
				 $noi_dung_top=$meta_post."_noi_dung_footer";
				 $noi_dung_top=wpautop(lay_gia_tri_postmeta($id_post_bai,$noi_dung_top));
				 echo $noi_dung_top;

			?> 
	</div>		
		 
 
            </div>        
        </div>          
            <div class="clear"></div>
			  <div class="clear"></div></section> 
		 
				<?php 
			}
			if($loai_block=="taisao")
			{
				?>
				<section class="info-listing-section tr_tai_sao">
				<div class="auto-container">
				 <?php 
					$value=wpautop(lay_gia_tri_postmeta($id_post_bai,$meta_post));
					echo $value;
				 ?>
			  </div>
			  <div class="clear"></div>
			  <div class="clear"></div></section>
			<div class="clear"></div>
				<?php 
			}
			
			
			if($loai_block=="yeucau")
			{
				 
				 $noi_dung_top=$meta_post."_noi_dung_top";
				 $noi_dung_top=wpautop(lay_gia_tri_postmeta($id_post_bai,$noi_dung_top));
				?> 
 				  <section class="tr_section">
						<div class="auto-container">
							<div class="sec-title centered">
								  <?php echo $noi_dung_top?>
							</div>
							<div class="outer-container pricing-tabs tabs-box">
								<div class="clear"></div> 
								   <!-- -->
								   <section class="body cover tabunix" rel="unix">
      
		<?php 
		    $bang_gia=$meta_post."_bang_gia";
			$goi=lay_gia_tri_postmeta($id_post_bai,$bang_gia); 
			 
			$goi=unserialize($goi);  
			if(is_array($goi))
			{
				for($i=0;$i<count($goi);$i++) 
				{
						
				    if(count($goi)==1)
					{						
					?>
				         
					
					<?php 
					}
					else
					{
						 
						 
						?>
					<div class="tr_center">	
						<div class="title-column">
							<div class="inner-column">
								
								<!--Tab Btns-->
								<ul class="tab-buttons clear">
								<?php 
									for($i=0;$i<count($goi);$i++) 
									{
									  $category = get_term_by('id',$goi[$i],'loai-he-thong');
								   ?>
									  <li data-tab="#prod_<?php echo $category->slug?>" class="tab-btn <?php if($i==0) echo ' active-btn ' ?> "><?php echo $category->name ?></li>
									 <?php 
									}
									 ?>
								</ul>
								
							</div>
						</div>
					</div>	
						 <section class="body cover tabunix pricing-tabs" rel="unix">
						   <div class="tabs-content">
						  <?php 
						      
									for($i=0;$i<count($goi);$i++) 
									{
									  $category = get_term_by('id',$goi[$i],'loai-he-thong');
								   ?>
								   
										<div class="tab <?php if($i==0) echo " active-tab " ?>" id="prod_<?php echo $category->slug?>">
											<div class="content">
											   <section class="tr_yeu_cau">
    	<div class="auto-container">
        	 
            
            	<!--Image Column-->
			<?php 
			$dem=0;
			$ketqua=lay_post_thuoc_danh_muc_taxmonomy("loai-he-thong",$goi[$i]," menu_order asc ",0,100);
			 foreach($ketqua as $result)
			  {
					  $name=$result->post_title;
					  $name = qtranxf_use($lang, $name,false); 
					  $expert=wpautop($result->post_excerpt);
					$expert=qtranxf_use($lang, $expert,false);
					$expert=wp_strip_all_tags($expert);
						$img=get_image_size($result->ID,'images','full');	
				  
					  $id_post= $result->ID;
					  $dem++;
					  
				?>
				<div class="tr_nhom_yeu_cau">
				  <div class="row clear">
				<?php 
				if($dem%2==1)
				{
			?>
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                	    <div class="image ">
                    	<img src="<?php echo $img ?>" alt="">
                    </div>
                </div>
            <?php 
				}
			?>    
                <!--Content Column-->
                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                	<div class="inner-column">
                        <h3><?php echo $name ?></h3>
                        <div class="text"><?php echo $expert ?></div>
                        </div>
                </div>
                
				
				<?php 
				if($dem%2==0)
				{
			?>
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                	<div class="image ">
                    	<img src="<?php echo $img ?>" alt="">
                    </div>
                </div>
            <?php 
				}
				?>
				  <div class="clear"></div>
				 </div>
				 </div>
				<?php 
			
			  }
			?>    
			
             
        </div>
    
	<div class="clear"></div>
	  <div class="clear"></div></section>
  
											 
											</div>
										</div>
									<?php 
									}
									 ?>
						   </div> 
							<div class="clear"></div>
						  <div class="clear"></div></section>
						
						
						<?php
						}
						
					}
					 
				}
		 
					?>
         
       <div class="clear"></div>
        
	<div class="ghi_chu_them list-style-one"> 
			<?php

				$noi_dung_top=$meta_post."_noi_dung_footer";
				 $noi_dung_top=wpautop(lay_gia_tri_postmeta($id_post_bai,$noi_dung_top));
				 echo $noi_dung_top;
			?> 
	</div>		
		 
   <div class="clear"></div></section>
                   
								   <!-- -->
							</div>
						</div>
					<div class="clear"></div>
				  <div class="clear"></div></section>	
			<div class="clear"></div>				
				<?php 
			}
			
		}
	}
	if($flag==0)
	{
	}
	 
	?>
	 
	  <?php 
		include("footer.php");
	?>
</body>
</html>