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
		<h1 class="tr_tieu_de"><?php the_title();?></h1>
		 <?php
			if(lay_gia_tri_postmeta($post->ID,"is_tin")==1)		 
			{
				 ?>
				   <div class="tr_content">
					<?php the_content();?>
				   </div>
				 <?php 
				 
			}
			else 
			{

		 ?>
         <?php 
			$tintuc=get_post_with_id_post($post->ID);
			foreach($tintuc as $result)
			{

					$name=$result->post_title; 
					$id_post=$result->ID; 
					$expert=wpautop($result->post_excerpt);
					$expert=wp_strip_all_tags($expert);
					$expert=sub_string($expert,50);
					$img=get_image_size($result->ID,'images','medium');	
					 
				$link = get_permalink($result->ID );
				$ma=lay_gia_tri_postmeta($result->ID,"ma_sp"); 	  
				
				  
					if($flag_dang_nhap==0)
							{
							  $price=lay_gia_tri_postmeta($result->ID,"gia");
							  $price_km=lay_gia_tri_postmeta($result->ID,"gia_km");				  
						  
							   if($price_km!="")
							   { 	 
									$price_km=number_format($price_km, 0, ',', '.');
									$price_km=$price_km." ₫";
							   }
							  
							 
							   if($price!="")
							   {
								$price=number_format($price, 0, ',', '.');
								$price=$price." ₫";
								 
							   }
							   
							   
							  $gia_km=lay_gia_tri_postmeta($result->ID,"gia_km");
							  $gia_ban=lay_gia_tri_postmeta($result->ID,"gia");
							 
							  if($gia_km!=""&& $gia_ban!="")
							  { 
								  $gia_thuc=$price_km; 
							  }
							  if($gia_km==""&& $gia_ban!="")
							  {
								  
								  $gia_thuc=$price;
								  
								 
							  }
							 if($gia_km==""&& $gia_ban=="")
							  {
								  $gia_thuc="Liên hệ";
								  
							  }
							  
							  if($gia_km!=""&& $gia_ban!="")
								{
									$phantram=100-round(($gia_km/$gia_ban*100),0);
								}	
							}
							else 
							{
								 $price=lay_gia_tri_postmeta($result->ID,"gia_usd");
								$price_km=lay_gia_tri_postmeta($result->ID,"gia_km_usd");				  

								if($price_km!="")
								{ 	 
									 
									$price_km="$".$price_km;
								}


								if($price!="")
								{
								 
								$price="$".$price;
								 
								}


								$gia_km=lay_gia_tri_postmeta($result->ID,"gia_km_usd");
								$gia_ban=lay_gia_tri_postmeta($result->ID,"gia_usd");

								if($gia_km!=""&& $gia_ban!="")
								{ 
								  $gia_thuc=$price_km; 
								}
								if($gia_km==""&& $gia_ban!="")
								{
								  
								  $gia_thuc=$price;
								  
								 
								}
								if($gia_km==""&& $gia_ban=="")
								{
								  $gia_thuc="Liên hệ";
								  
								}

								if($gia_km!=""&& $gia_ban!="")
								{
									$phantram=100-round(($gia_km/$gia_ban*100),0);
								}	
							}								
							  
				  
		$ma_so=lay_gia_tri_postmeta($result->ID,"ma");
		$cong_dung=wpautop(lay_gia_tri_postmeta($result->ID,"cong_dung"));
        $cach_su_dung=wpautop(lay_gia_tri_postmeta($result->ID,"cach_su_dung"));
		$chu_y=wpautop(lay_gia_tri_postmeta($result->ID,"chu_y"));
		$luy_y=wpautop(lay_gia_tri_postmeta($result->ID,"luy_y"));
		$dung_tich=(lay_gia_tri_postmeta($result->ID,"dung_luong"));
		$luot_xem=lay_gia_tri_postmeta($result->ID,"luot_xem");
		 if($luot_xem=="")
		 {
		   $luot_xem=1;
			update_post_meta($post->ID,"luot_xem",$luot_xem);
		}
		 else
		 {
		   $luot_xem++;
			update_post_meta($post->ID,"luot_xem",$luot_xem);
		 }	
		  
		 
		  
	}
    $images_medium=get_image_size($post->ID,'images','medium');
	$images_large=get_image_size($post->ID,'images','full');
	$images_icon=get_image_size($post->ID,'images','medium'); 
	 
	
	?>
			<div class="blockcontent">
			
	<div class="content">	
        <div class="tr-md-4">
				<?php 
					$afc="acf-field-album";
					$acf_photo_gallery_attachments = get_post_meta($post->ID, str_replace('acf-field-', '',$afc), true );
					$acf_photo_gallery_attachments = explode(',', $acf_photo_gallery_attachments);
			         $class="";
					 
					 if($acf_photo_gallery_attachments[0]!="")
					 {
						 $class="tr_aloha";
					 }
					
				?>
             		 <div class="<?php echo $class?>"> 
										   <div class="item">
											  <div class="tr_ct_img">
														<img   src="<?php echo $images_large ?>"  alt="<?php echo $name ?>"/>
												 
											   </div>
											</div>
												 
														  <?php 
												  
												  if($acf_photo_gallery_attachments[0]!="")
												  {
													   foreach($acf_photo_gallery_attachments as $img1)
													   {
														   
														   $img=wp_get_attachment_url( $img1 );
														   if($img!="")
														   {
														   ?>
																<div class="item">
																  <div class="tr_ct_img">
																		 <img   src="<?php echo $img ?>"  alt="<?php echo $img ?>"/>
																			 
																	</div>	
																</div>  
															
															
															<?php
														   }
													   }
												   }
														  
								 
													?> 
						 
											  </div>
									

		 </div>
      
        <div class="tr-md-6">
             
		 
			<h1 class="tr_tieu_de_sp"><?php the_title()?></h1>
            <div class="deal_detail_name_long"><?php the_excerpt();?>
			
		 	</div>
			
            <div class="detail_bar">
                <p class="bg_price">
					<?php 
						if($gia_km!="")
						{
					?>			
								
								
							
								   <span class="detail_trueprice" data-name="marketprice"><del><?php echo $price?></del></span>
								<br>
								<span class="detail_price" data-name="price"><?php echo $price_km?></span>
					<?php 
						}
						else 
						{
					?>    
						    <span class="detail_price" data-name="price"><?php echo $gia_thuc?></span>
						
					   <?php 
					   }
					   ?>
                   
                </p>
				<?php 
						if($gia_km!="" && $phantram!="")
						{
					?>		
					
						   <p data-name="percent" class="detail_precent"> - <?php echo $phantram?>%</p>
						<?php 
						}
						?>
            
                
            </div>
            <br class="clean">
			<div class="clear"></div>
	         <div class="detail_co">

			 
				
				<?php
				  include("page_value_id.php");
		  $tintuc=get_post_with_id_post($post->ID);
		foreach($tintuc as $result)
		{
			$name=$result->post_title;
							$name=qtranxf_use($lang, $name,false);
							$id_post=$result->ID; 							
							$expert=wpautop($result->post_excerpt);
							$expert=qtranxf_use($lang, $expert,false);
							$expert=wp_strip_all_tags($expert);
							$expert=sub_string($expert,50);
							
							$img=get_image_size($result->ID,'images','medium');	 
							$link=get_permalink($result->ID);
							
								if($flag_dang_nhap==0)
							{
							  $price=lay_gia_tri_postmeta($result->ID,"gia");
							  $price_km=lay_gia_tri_postmeta($result->ID,"gia_km");				  
						  
							   if($price_km!="")
							   { 	 
									$price_km=number_format($price_km, 0, ',', '.');
									$price_km=$price_km." ₫";
							   }
							  
							 
							   if($price!="")
							   {
								$price=number_format($price, 0, ',', '.');
								$price=$price." ₫";
								 
							   }
							   
							   
							  $gia_km=lay_gia_tri_postmeta($result->ID,"gia_km");
							  $gia_ban=lay_gia_tri_postmeta($result->ID,"gia");
							 
							  if($gia_km!=""&& $gia_ban!="")
							  { 
								  $gia_thuc=$price_km; 
							  }
							  if($gia_km==""&& $gia_ban!="")
							  {
								  
								  $gia_thuc=$price;
								  
								 
							  }
							 if($gia_km==""&& $gia_ban=="")
							  {
								  $gia_thuc="Liên hệ";
								  
							  }
							  
							  if($gia_km!=""&& $gia_ban!="")
								{
									$phantram=100-round(($gia_km/$gia_ban*100),0);
								}	
							}
							else 
							{
								 $price=lay_gia_tri_postmeta($result->ID,"gia_usd");
								$price_km=lay_gia_tri_postmeta($result->ID,"gia_km_usd");				  

								if($price_km!="")
								{ 	 
									 
									$price_km="$".$price_km;
								}


								if($price!="")
								{
								 
								$price="$".$price;
								 
								}


								$gia_km=lay_gia_tri_postmeta($result->ID,"gia_km_usd");
								$gia_ban=lay_gia_tri_postmeta($result->ID,"gia_usd");

								if($gia_km!=""&& $gia_ban!="")
								{ 
								  $gia_thuc=$price_km; 
								}
								if($gia_km==""&& $gia_ban!="")
								{
								  
								  $gia_thuc=$price;
								  
								 
								}
								if($gia_km==""&& $gia_ban=="")
								{
								  $gia_thuc="Liên hệ";
								  
								}

								if($gia_km!=""&& $gia_ban!="")
								{
									$phantram=100-round(($gia_km/$gia_ban*100),0);
								}	
							}								
							 
						   
		}		  	
				?>
				
				
   
                
            </div>
			
		<!-- -->
		<?php 
			$khuyen_mai=wpautop(lay_gia_tri_postmeta($post->ID,"khuyen_mai"));
			if($khuyen_mai!="")
			{
				?>
				<div class="giam_gia">
					<?php 
						echo $khuyen_mai;
					?>
				</div>
				<?php 
			}
		?>
		<!-- -->
		<div class="glo-right-spdetail glo-right-spdetail-cart">
				 <form method="post" action="<?php echo get_permalink($page_gio_hang)?>">
	                <label for="">
	                	<input type="number" name="so_luong" class="cls_soluong"  id="so_luong" value="1">
	                  	<button    type="submit" class="addcart">
						<?php echo $lang_mua_ngay?></button>
	                </label>
	                <div class="clear"></div>
					<input type="hidden" name="product_id" value="<?php echo $post->ID?>">
	                <input type="hidden" name="task" value="add">
				</form>
           	</div>
			
			<div class="glo-right-spdetail">
				 <div id="sharelink" class="tr_pc">
				    <div class="addthis_toolbox addthis_default_style "> <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a> <a class="addthis_button_tweet"></a> <a class="addthis_button_google_plusone" g:plusone:size="medium"></a> <a class="addthis_counter addthis_pill_style"></a> </div>
				    <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-502225fb496239a5"></script>
				</div>
			</div>
		<!-- --> 
       
        </div>
       <div class="clear"></div>
    </div>
					 <!-- -->
					<!-- detail-->
					<div class="clear"></div>
				    <div class=" content_detail">
					
				 
					 <div class="tr_binh_luan fr_col">
					 	 	<div class="tabs">
						
						
							<div id="parentHorizontalTab" style="margin-top:20px" class="content_holder">
									<ul class="resp-tabs-list hor_1">
										 <li><?php echo $lang_duoi_day_la_thong_tin?></li>
										 
									 
									</ul>
									  <div class="resp-tabs-container hor_1">
											 <div>	
											   <?php the_content(); ?>
											 </div>
											 
											 
											 
											 
									  </div>
							</div>
				 </div>
  
					
					 
				 		</div>
			 <h2 class="tr_tieu_de"><?php echo $lang_sp_cung_loai?> </h2>			
	 <div class="tr_sp_cung_loai tr_list_sp">
             
           
                <div class="dv-spbc ow-spngang  tr_d_product row">
				 
					<?php		
					$dem=0;						
					$terms = get_the_terms( $post->ID, 'danh-muc' );			
					if(is_array($terms))			
					{					
					foreach($terms as $result)		
					{							
					$pare=$result->parent;		
					if($pare == 0)				
					{			 			
						$slug=$result->slug;		
						$term=$result->term_id;	 	
					}
					if($pare!=0)
					{
					   $slug=$result->slug;		
					   $term=$result->term_id;	 	
					}	
									
									
					$ketqua=lay_post_thuoc_danh_muc_taxmonomy("danh-muc",$term," menu_order asc  ",0,8) ;	
					foreach($ketqua as $result)					
					{								 
						
				           	
						 $name=$result->post_title;
					$name=qtranxf_use($lang, $name,false);
					$id_post=$result->ID; 							
					$expert=wpautop($result->post_excerpt);
					$expert=qtranxf_use($lang, $expert,false);
					$expert=wp_strip_all_tags($expert);
					$expert=sub_string($expert,50);
					
					$img=get_image_size($result->ID,'images','medium');	 
					$link=get_permalink($result->ID);
					
					  $price=lay_gia_tri_postmeta($result->ID,"gia");
					  $price_km=lay_gia_tri_postmeta($result->ID,"gia_km");
					   if($price_km!="")
					   { 	 
							$price_km=number_format($price_km, 0, ',', '.');
							$price_km=$price_km." ₫";
					   }
					  
					 
					   if($price!="")
					   {
						$price=number_format($price, 0, ',', '.');
						$price=$price." ₫";
						 
					   }
					   
					   
					  $gia_km=lay_gia_tri_postmeta($result->ID,"gia_km");
					  $gia_ban=lay_gia_tri_postmeta($result->ID,"gia");
					 
					  if($gia_km!=""&& $gia_ban!="")
					  { 
						  $gia_thuc=$price_km; 
					  }
					  if($gia_km==""&& $gia_ban!="")
					  {
						  
						  $gia_thuc=$price;
						  
						 
					  }
					 if($gia_km==""&& $gia_ban=="")
					  {
						  $gia_thuc="Liên hệ";
						  
					  }
					  
					  if($gia_km!=""&& $gia_ban!="")
						{
							$phantram=100-round(($gia_km/$gia_ban*100),0);
						}								
							
							   
						 if(1==1)
						 {
				?>
		<div class="dv-cont-ds-sp dv-cont-ds-sp-ds">
													  <div class='ow-spngang-cont'>
                                                            <div class='carsou-img '>
															   <?php 
																		if($gia_km!="")
																		 {
																	 ?>
																	 
																		<div class="sale-top-right">-<?php echo $phantram?>%</div>
																	<?php 
																		 }
																	?>
                                                              <div class="sp-img glo-hieu-ung-17-cont">
																
															 
																<a href='<?php echo $link?>'><img src='<?php echo $img ?>' 
																alt='<?php echo $name  ?>'></a> 
																
																 
                                                                   
                                                                </div>
																
																<div class="dv-con-sp">
                                                                <h3><a href='<?php echo $link?>'><?php echo $name ?></a></h3>
                                                                <div class="dv-price">
																<?php 
																			if($gia_km!="")
																			{
																				
																			?>	
																		 
																			 <span class="price">			
																<?php echo $price?>&nbsp;	
																</span><span class="price-km">
																<?php echo  $price_km?>	
																</span>
																			<?php 
																			}
																			else 
																			{
																			   ?>
																				
																			 <span class="price">			
																			 &nbsp;	
																				</span><span class="price-km">
																				<?php echo  $gia_thuc?>	
																				</span>
																			   
																			   <?php 
																			}
																			?>   
																 
																
																
																</div>
																</div> 
															 
                                                            </div>
                                                        </div>
                                                   
												</div>	
											<?php 	
			 
					}
						}						
						
						 break;		
						}
						
						}
						
						?>									
	    

</div>
        </div>
					</div>
						
				  <!-- -->
			
			</div>  
			<?php 
			}
			?>
            

		</div>	
		</div>
	</div>
	<!-- -->
	<div class="clear"></div>
</div>	

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/js/tab/easy-responsive-tabs.css " />

	   <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>
	    <script src="<?php bloginfo('template_directory'); ?>/js/tab/easyResponsiveTabs.js"></script>
	<script type="text/javascript">
		jQuery.noConflict()(function($) {
    
       
        $('#parentHorizontalTab').easyResponsiveTabs({
            type: 'default', 
            width: 'auto',  
            fit: false,  
            tabidentify: 'hor_1',  
            activate: function(event) { 
				
            }
        });

        
    });
</script>	
    <?php 
		include("footer.php");
	?>
 
</body>
</html>

 