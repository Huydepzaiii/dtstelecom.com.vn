	<div class="sortable" id="layoutGroup1">
		<?php 
		    $dem=0;
			$taxonomy="loai-san-pham";
			$catergory = get_terms($taxonomy,array(		'orderby'    => 'custom_sort',		'parent'=> 0,		'order'    => 'desc',		'hide_empty' => 0	 )	); 	
		
		    foreach($catergory as $cater)	
			{
			    $dem++;
				$slug_term=$cater->slug;
		        $link_cater=get_term_link($cater->slug,$taxonomy) ; 	
				$id_term=$cater->term_id;
				$tong=($cater->count)/5;
				$du=($cater->count)%5;
				if($du!=0)
				{
				   $tong=floor($tong)+1;
				}
				
		?>	
			<div class="block" >
	<h2>
	  
    	<a class="title" href="<?php echo $link_cater?>" target="_blank" title="Sản phẩm bán chạy"><?php echo $cater->name?><span class="b-main__category-arrow"></span></a>
		<a class="more" href="<?php echo $link_cater?>" target="_blank" title="Xem tất cả">Xem tất cả</a>
    </h2>
	<div class="blockcontent">
    	<div style="position:relative; padding:0 20px; overflow:hidden; height:300px;">
        	<div id="module_danh_muc_<?php echo $dem?>" class="tr_m_danh_muc">
		<?php 	
		
	   $kq=lay_post_noi_bat_thuoc_danh_muc_taxmonomy($taxonomy,"hien-thi",$id_term,'post_date desc',0,5);				
		foreach($kq as $result)
		{
				
				$name=$result->post_title;
				$name=sub_string($name,30);
				$id_post=$result->ID;
				/*$content=wpautop($result->post_content);*/
				$expert=wpautop($result->post_excerpt);
				$expert=wp_strip_all_tags($expert);
				$expert=sub_string($expert,50);
				$img=get_image_size($result->ID,'images','medium');	
			 
				$terms = get_the_terms( $result->ID, 'tinh-trang-hang' );
				foreach($terms as $result1)
				{				
					$tinh_trang_hang=$result1->term_id;
					
					break;
				}
				if($terms!=null)
				{
				   if($tinh_trang_hang==$het_hang)
				   {
				      	$img=get_image_size($result->ID,'images_het_hang','medium');	
				   }
				   if($tinh_trang_hang==$hang_sap_ve)
				   {
				      	$img=get_image_size($result->ID,'images_hang_sap_ve','medium');	
				   }
				}
						
				$link = get_permalink($result->ID );
				$ma=lay_gia_tri_postmeta($result->ID,"ma_sp"); 	  
				 $price_km=lay_gia_tri_postmeta($result->ID,"gia_km");
				 $chuc_nang=lay_gia_tri_postmeta($result->ID,"chuc_nang");
				
				  $price=lay_gia_tri_postmeta($result->ID,"gia");
				   if($price_km!="")
				   {
						/*$price_km=$price-(($price*$price_km)/100);*/
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
				      $gia_tinh_thanh_vien=$gia_km;
						
					  $gia_thuc=$price_km;
					   
				  }
				  if($gia_km==""&& $gia_ban!="")
				  {
					  $gia_tinh_thanh_vien=$gia_ban;
					  $gia_thuc=$price;
					  
					 
				  }
				 if($gia_km==""&& $gia_ban=="")
				  {
					  $gia_thuc="Liên hệ";
					  $gia_tinh_thanh_vien="";
				  }
				  
				  $c_loai_khach_hang=0;
				  if($c_loai_khach_hang==0)
				  {
				    $price_km=$price_km;
					$gia_thuc=$gia_thuc;
					 if($gia_km!=""&& $gia_ban!="")
					{
						$phantram=100-round(($gia_km/$gia_ban*100),1);
					}	
				  }	
				  
				  if($gia_tinh_thanh_vien!="")
				  {
				   
				     $thanh_vien_vang=$gia_tinh_thanh_vien - $gia_tinh_thanh_vien*($c_thanh_vien_vang/100);
					 $thanh_vien_bach_kim=$gia_tinh_thanh_vien - $gia_tinh_thanh_vien*($c_thanh_vien_bach_kim/100);
					 $thanh_vien_kim_cuong=$gia_tinh_thanh_vien - $gia_tinh_thanh_vien*($c_thanh_vien_kim_cuong/100);
					 
					  if($c_loai_khach_hang==1)
					  {
						 $price_km = $thanh_vien_vang;
						 $gia_thuc=$thanh_vien_vang;
						 $phantram=100-round(($thanh_vien_vang/$gia_ban*100),1);
					  }
					   if($c_loai_khach_hang==2)
					  {
						 $price_km = $thanh_vien_bach_kim;
						 $gia_thuc=$thanh_vien_bach_kim;
						 $phantram=100-round(($thanh_vien_bach_kim/$gia_ban*100),1);
					  }	 
					   if($c_loai_khach_hang==3)
					  {
						 $price_km = $thanh_vien_kim_cuong;
						 $gia_thuc=$thanh_vien_kim_cuong;
						  $phantram=100-round(($thanh_vien_kim_cuong/$gia_ban*100),1);
					  }	
						if($c_loai_khach_hang!=0)
						{
						   $price_km=number_format($price_km, 0, ',', '.')." ₫";
						}
					 $thanh_vien_vang=number_format($thanh_vien_vang, 0, ',', '.')." ₫";
					 $thanh_vien_bach_kim=number_format($thanh_vien_bach_kim, 0, ',', '.')." ₫";
					 $thanh_vien_kim_cuong=number_format($thanh_vien_kim_cuong, 0, ',', '.')." ₫";
					 
				  }
				  	
				 			  
				 
	  ?>
	     <div class="product_contener">
				<div class="products ">
					<div class="image"><a href="<?php echo $link?>" target="_blank" title="<?php echo $name?>"><img src="<?php echo $img?>" alt="<?php echo $name?>" /></a>
					<?php 
						if($gia_km!="" && $phantram!="")
						{
					?>		
						<span class="saleprice">-<?php echo $phantram?>%</span>
						<?php 
						}
						?>
					</div>
					<div class="productname">
						<a href="<?php echo $link?>" target="_blank" title="<?php echo $name?>"><?php echo $name?></a>
					</div>
					
					
					
					<?php 
						if($gia_km!="")
						{
					?>			
								
								
									<div class="prices"><?php echo $price_km?></div>
					               <span class="rootprice"><?php echo $price?></span>
							
						
					<?php 
						}
						else 
						{
					?>      <div class="prices"><?php echo $gia_thuc?> </div>
						
					   <?php 
					   }
					   
					    if($gia_tinh_thanh_vien!="")
						{
						   ?>
						    <div class="rootprice_thanh_vien">TV vàng: <?php echo $thanh_vien_vang?> </div>
							<div class="rootprice_thanh_vien">TV bạch kim: <?php echo $thanh_vien_bach_kim?> </div>
							<div class="rootprice_thanh_vien">TV kim cương: <?php echo $thanh_vien_kim_cuong?> </div>
							
						   <?php 
						}
					   ?>
					   
					   
								

				
				</div>
		</div>
	    <?php 	
	    }
		?>
            </div>
            <div class="clear"></div>
            <div class="list_btn">
           		<a onclick="showproduct_<?php echo $dem?>(-1);" id="prevn_<?php echo $dem?>" class="prev" href="javascript:"><i class="fa fa-chevron-left"></i></a>
               <a onclick="showproduct_<?php echo $dem?>(1);" id="nextn_<?php echo $dem?>" class="next" href="javascript:"><i class="fa fa-chevron-right"></i></a>
            </div>
        </div>
	</div>
	<div class="clear"></div>
	<script>
	    
		var pagen = 1;
		var countn_<?php echo $dem?> = <?php echo $tong?>;
		$( "#prevn_<?php echo $dem?>" ).addClass( "disable" );
		if(countn_<?php echo $dem?> <= 1) $( "#nextn_<?php echo $dem?>" ).addClass( "ndisable" );
    	function showproduct_<?php echo $dem?>(step)
		{
		    
			if((pagen ==1 && step == -1) || (pagen ==countn_<?php echo $dem?> && step == 1)) return;
			 
			pagen = pagen + step;
			if(pagen < 1)
			{
				pagen = 1;
			}
			
			if(pagen == 1)
			{
				$( "#prevn_<?php echo $dem?>" ).addClass( "disable" );
			}else
			{
				$( "#prevn_<?php echo $dem?>" ).removeClass( "disable" );
			}
			
			if(pagen == countn_<?php echo $dem?> || pagen > countn_<?php echo $dem?>)
			{
				$( "#nextn_<?php echo $dem?>" ).addClass( "ndisable" );
			}else
			{
				$( "#nextn_<?php echo $dem?>" ).removeClass( "ndisable" );
			}
			
			address = '<?php echo $link_cater ?>?task=new';
			address = addQuery(address, 'page='+pagen);		
		
			$.ajax({
				url: address,
				dataType: "html",
				type: "GET",
				cache: false,
				error: function(e)
				{
					Boxy.alert('Lỗi ajax', null, {title: 'Lỗi'});
					return false;
				},
				success: function(data)
				{
					$("#module_danh_muc_<?php echo $dem?>").empty();
					$("#module_danh_muc_<?php echo $dem?>").append(data);
					i = 0;
					if(step == 1)
					{
						$(".hide").each(function(index)
						{
							$(this).delay(50 * i).fadeIn(100);
							i++;			
						});
					}
					else
					{
						$($(".hide").get().reverse()).each(function(index)
						{
							$(this).delay(50 * i).fadeIn(100);
							i++;			
						});
					}
					return true;
				}
			});
		}
    </script>
</div>

		<?php 
		     }
		?>
		 <div class="block " id="content_seohome"><div class="blockcontent"><h1>
	Mua sản phẩm tại <?php echo $ten_cong_ty?></h1>
</div></div>
		</div>
