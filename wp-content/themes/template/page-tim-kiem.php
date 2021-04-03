<?php 
/**
*   Template Name: Template page_tim_kiem
* 
* @package ITGREEN Ho Chi Minh
*
*/
?>
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
          <div class=" ">
			 
	<h1 class="tr_tieu_de">Tìm kiếm </h1>
	<div class="intro"></div>
	<div class="clear"></div>
		<?php 
			   $key=$_REQUEST["key"];
					 
					$id_danh_muc=$_REQUEST["danh_muc"];
					$id_thuong_hieu=$_REQUEST["thuong_hieu"];
					
					$id_muc_gia=$_REQUEST["id_muc_gia"];
					$id_quan=$_REQUEST["id_quan"];
					   
					$ketqua=search_sp($key,"danh-muc",$id_danh_muc,"gia",$id_muc_gia,"menu_order asc",0,100000);
					 
					
					 $tongsotin=count($ketqua);
				
		  
	 ?>
	 <div class="clear"></div>
	<div class="blockcontent tr_list_sp">
	     <div class="row dv-spbc ow-spngang">
	 <!-- -->
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
								 
					$kq=search_sp($key,"danh-muc",$id_danh_muc,"gia",$id_muc_gia,"menu_order asc",$start,$end);	
											
				
					foreach($kq as $result)
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
		?>
	 <!-- -->
		</div>
	</div>
	<div class="clear">&nbsp;</div>
   	<!-- -->

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
											    
											    $url=get_permalink($page_tim_kiem)."?key=".$key."&danh_muc=".$id_danh_muc."&thuong_hieu=".$id_thuong_hieu
												."&page=";
											}			
										?>
											<ul class="pagenav">	
												<?php 
												 
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
												     
												</ul> 						
										</nav>
									<?php 
									}
									?>
						
					</div>
	<!-- -->
    <div class="clear"></div>
	<script type="text/javascript">
		function setOrder(ojb)
		{
			url = '<?php echo $link_tat_ca?>';
			order = ojb.value;
			url = addQuery(url, 'ordering='+order);
			document.location.href = url;			
		}
	</script>
	<div class="clear"></div>
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
</html>


