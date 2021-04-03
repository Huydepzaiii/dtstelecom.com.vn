 <div class="col-md-3 tr_pc">
                                    <div class="global-left global-left-cus">
                                        <div class="glo-left glo-ykien-dm">
                                            <h3><span>Danh mục sản phẩm</span></h3>
                                            <div class="glo-left-nd glo-dv-menu-left">
                                                <ul class="ul-left-menu">
                                                     <?php 
														echo $list_sp;
													 ?>
												</ul>
                                            </div>
                                        </div>
                                        <!-- -->
										  <?php 
											$taxonomy="loai-sp";
											$catergory = get_terms($taxonomy,array(		'orderby'    => 'custom_sort',	
											'parent'=> 0,		'order'    => 'desc',		'hide_empty' => 0		 )	); 	
											$dem=0;	 
											foreach($catergory as $cater)	
											{	    								 
												if($cater->parent==0 && get_field('hien_thi_cot_trai', $taxonomy . '_' . $cater->term_id)==1 )
												{
												    	 $link_cater=get_term_link( $cater->slug, $taxonomy);
										 ?>  
                                        <div class="glo-left hide-991 glo-ykien-sphot">
                                            <h3><span><?php echo $cater->name  ?></span></h3>
                                            <div class="glo-left-nd">
                                                <div class="marquee">
                                                    <ul>
													     <?php 
															$kq= lay_post_thuoc_danh_muc_taxmonomy($taxonomy,$cater->term_id," menu_order asc ",0,1000);	
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
                                                        <li class='global-sp-left'>
                                                            <a href='<?php echo $link?>'>
															
															<img src='<?php echo $img?>' alt='<?php echo $name?>'></a>
                                                            <div class='clear'></div>
                                                            <h5><a href='<?php echo $link?>'><?php echo $name ?></a></h5>
															
															<?php 
							if($gia_km!="")
							{
								
							?>	
						                            <p class='price'><?php echo $price?>&nbsp;</p>
                                                            <p class='price-km'><?php echo $price_km?></p>
							 
							<?php 
							}
							else 
							{
							   ?>
								       
                                <p class='price-km'><?php echo $gia_thuc?></p>
							 
							   <?php 
							}
							?>   
							
						 
						 
                                                        </li>
														<?php 
															}
														?>
                                                        
                                                    </ul>
                                                </div>
                                                 
                                            </div>
                                        </div>
										<?php 
												}
											}
										?>
                                        <!-- -->
										
										
                                        <div class="glo-left glo-ykien-httt">
                                            <h3><span>Hỗ trợ trực tuyến</span></h3>
                                            <div class="glo-left-nd glo-left-nd-suppoer">
											<?php 
												$ketqua=get_all_post_with_name_custom_post("ho-tro","menu_order asc",0,3);		
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
													$mail=lay_gia_tri_postmeta($result->ID,"email");
													$phone=lay_gia_tri_postmeta($result->ID,"phone");		
								?>						
											 
                                                <li class="li_hotro_glo_left">
                                                    <div class="img"><img src="<?php echo $img?>" alt="Tư vấn khách hàng"    onError="$(this).attr('src','<?php bloginfo('template_directory'); ?>/img/no-image.png')"></div>
                                                    <div class="ht-right">
                                                        <h2><p><?php echo $name ?></p><span><a href="tel:<?php echo $phone ?>"><?php echo $phone ?></a></span></h2>
                                                        <p><a href="mailto:<?php echo $mail ?>"><?php echo $mail ?></a></p>
                                                    </div>
                                                    <div class="clear"></div>
                                                </li>
                                           <?php 
												}
										   ?>
                                            </div>
                                        </div>
                                        <!-- -->
                                        <div class="glo-left glo-ykien-news"  >
                                            <h3><span>Tin mới</span></h3>
											
                                            <div class="glo-left-nd">
                                                <div class="glo-tintuc-left">
												 <?php 
												  $ketqua=get_all_post_with_name_custom_post("tin-tuc","menu_order asc",0,4);		
													foreach($ketqua as $result) 			
													{				
																 $name=$result->post_title;
																$name=qtranxf_use($lang, $name,false);
																$id_post=$result->ID; 							
																$expert=wpautop($result->post_excerpt);
																$expert=qtranxf_use($lang, $expert,false);
																$expert=wp_strip_all_tags($expert);
																$expert=sub_string($expert,50); 
																$link = get_permalink($result->ID );
																$img=get_image_size($result->ID,'images','medium');	
											   
											   ?>
												<a href="<?php echo $link?>"><img src="<?php echo $img ?>" alt="<?php echo $name ?>"><h5> 
												<?php echo $name ?> <br/>
												<?php echo $expert?>
												</h5>
												 
												<div class="clear"></div></a>  
												<?php 
													}
												?>	
                                                </div>
                                            </div>
                                        </div>
										<!-- -->
										<div class="glo-left glo-ykien-kh">
											<h3><span>Ý kiến khách hàng</span></h3>
											<div class="glo-left-nd">
												<!-- -->
												<div id="owl-customer" class="owl-carousel owl-theme">
															
														 <?php 
															  $ketqua=get_all_post_with_name_custom_post("y-kien-khach-hang","menu_order asc",0,10);		
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
															<div class="item">
																<div class="item_khachhang"><img src="<?php echo $img ?>" alt="<?php echo $name ?>">
																	<p class="khachhang_cmt"> <?php echo $expert ?></p>
																	<p class="khachhang_name"><?php echo $name ?></p>
																</div>
															</div>
															<?php
																}
															?>
													  
													</div>
													
												</div>
												 
												<!-- -->
											</div>
										<!-- -->
										<?php 
											 if($video!="")
											{
										?>
                                        <div class="glo-left glo-ykien-kh">
                                            <h3><span>Video</span></h3>
                                            <div class="glo-left-nd">
                                                <iframe width="100%" height="315" src="<?php echo $video?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                                 
                                                <!-- -->
                                            </div>
                                        </div>
											<?php 
											}
											?>
											<?php 
											 if($fanpage!="")
											{
										?>
                                        <div class="glo-left glo-ykien-kh">
                                            <h3><span>Fanpage</span></h3>
                                            <div class="glo-left-nd">
<iframe frameborder="0" allowtransparency="true" style="border:none; overflow:hidden; width:100%; height:258px;" scrolling="no" src="//www.facebook.com/plugins/likebox.php?href=<?php echo $fanpage?>&amp;width=262&amp;height=258&amp;show_faces=true&amp;colorscheme=light&amp;stream=false&amp;show_border=true&amp;header=false"></iframe>
                                                <!-- -->
                                            </div>
                                        </div>
											<?php 
											}
											?>
                                        <!-- -->
                                        <!-- // -->
                                        <!-- -->
                                        <div class="glo-ykien-anhleft glo-ykien-anhleft-cus"><a href="#"><span class="glo-hieu-ung-2"><img src="<?php bloginfo('template_directory'); ?>/img/upload/40/_40_1494171558_banner-page-default.jpg" alt="Banner trái"></span></a>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </div>
                             