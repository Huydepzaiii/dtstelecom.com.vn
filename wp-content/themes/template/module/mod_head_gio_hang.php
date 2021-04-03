  <div class="top_header">
        <div id="container">          
           <div class="mainlogo">
                <div class="block banner " id="banner_mainlogo"><div class="blockcontent"><a href="<?php echo home_url();?>" title="Logo  <?php echo $ten_cong_ty?>" target="_self">
				<img src="<?php echo $logo?>" border="0" title="Logo <?php echo $ten_cong_ty?>" width="162" height="44"></a></div></div>
            </div>
           <div class="rightheader">
                <div class="orderstep">
                	<ul>
					<?php 
						if(is_user_logged_in()) 
						{
						  ?>
						  	<li class="over active"><a href="javascript:"><?php echo $lang_dang_nhap?></a></li>
							<li  <?php if(is_page($page_gio_hang_dia_chi_giao_hang) || is_page($page_gio_hang_hinh_thuc_thanh_toan)) echo ' class="active"  ' ?>
							><a href="<?php echo get_permalink($page_gio_hang_dia_chi_giao_hang);?>"><?php echo $lang_dia_chi_giao_hang?></a></li>
							<li <?php if(is_page($page_gio_hang_hinh_thuc_thanh_toan)) echo ' class="active"  ' ?>><a href="javascript:"><?php echo $lang_hinh_thuc_thanh_toan?></a></li>
						  <?php 
						}
						else 
						{
						  ?>
						  	<li class="over active"><a href="javascript:"><?php echo $lang_dang_nhap ?></a></li>
							<li  <?php if(is_page($page_gio_hang_dia_chi_giao_hang) || is_page($page_gio_hang_hinh_thuc_thanh_toan)) echo ' class="active"  ' ?>><a href="<?php echo get_permalink($page_gio_hang_dia_chi_giao_hang);?>"><?php echo $lang_dia_chi_giao_hang?></a></li>
							<li <?php if(is_page($page_gio_hang_hinh_thuc_thanh_toan)) echo ' class="active"  ' ?>><a href="javascript:"><?php echo $lang_hinh_thuc_thanh_toan?></a></li>
						  <?php 
						}
					?>
                    
                    </ul>
                    <div class="shoppingover">
                    	<div <?php 
						 if(is_page($page_gio_hang_hinh_thuc_thanh_toan))
							{ 
								echo ' style="width:90%;"  ';
							} 
							 if(is_page($page_gio_hang_dia_chi_giao_hang))
							{ 
								echo ' style="width:45%;"  ';
							} 
							 if(is_page($page_gio_hang_chua_dang_nhap))
							{ 
								echo ' style="width:6%;"  ';
							} 
						   

						?>  class="shoppingin"><i></i></div>
                    </div>
                </div>
            </div>

			<div class="clear"></div>
        </div>
    </div>
    <div class="clear"></div>
	
	<!-- -->
	 <div id="mainmenu">
        <div id="container">
            <div class="mainmenu_contener">
                <div class="mainmenu">
                	<span class="while"></span>
                    <span><h2><i class="fa fa-bars"></i><?php echo $lang_danh_muc?></h2></span>
					
					 <ul id="submenu0" class="submenu0 <?php if(!is_home()) echo" hidden" ?>" >
						<?php 
							$taxonomy="danh-muc";
							$catergory = get_terms($taxonomy,array(		'orderby'    => 'custom_sort',		'parent'=> 0,		'order'    => 'desc',		'hide_empty' => 0	 )	); 	
							foreach($catergory as $cater)	
							{	
							  $link=get_term_link( $cater->slug, $taxonomy);
							   $termchildren = get_terms($taxonomy,array(	
								'orderby'    => 'custom_sort',		
								'parent'=>$cater->term_id,	
								'order'    => 'desc',	
								'hide_empty' => 0		
								 )	
								);
								$slug_parent=$cater->slug;	
								$result=get_term_by("slug", $slug_parent,$taxonomy) ; 	
								$link=get_term_link( $result->slug,$taxonomy);		
								if( $termchildren==NULL)		
								{	
								
							  ?>
							    <li><a  href="<?php echo $link ?>"> <?php echo $result->name ?></a></li>
							  <?php
								}
								else 
								{
								    
								  ?>
								  <li>
								      <a  href="<?php echo $link ?>"> <?php echo $result->name ?></a>
								      <ul>
									    <?php 
											for($i=0;$i<=3;$i++)
											{
										?> 
									     <li class="li_sub">
										    <ul>
											   <?php 
												 $termchildren1 = get_terms($taxonomy,array(	
												'orderby'    => 'custom_sort',		
												'parent'=>$result->term_id,	
												'order'    => 'desc',	
												'hide_empty' => 0		
												 )	
												);			
												$dem=3;
												$result1=get_term_by("slug", $slug_parent,$taxonomy) ; 	
												$link1=get_term_link( $result1->slug,$taxonomy);
												foreach ($termchildren as $child)	
												{
												   $dem++;
												   if($dem%4==$i)
												   {
												 
														echo get_henchircal_1($taxonomy,$child->term_id,$child->slug,$hmtl);
													  ?>
													    
													  </li>
													  
												  <?php 
												  }
												}
												?>
											</ul>
										 </li>
										 <?php 
											}
										 ?>
									
									  </ul>
								  </li>
								  <?php 
								}
							  
							}
						?>
					 </ul>
					

                </div>
                <div class="hotline">
                    <div class="block " id="content_SupportOnline"><div class="blockcontent"><div>
	        <strong><span style="color:#000000;"><span style="font-size:14px;"><?php echo $lang_hot_line?>: <?php echo $hot_line?></span></span></strong></div>
</div></div>
                </div>
            </div>
             <div class="clear"></div>
        </div>
    </div>
	
	
	<script language="javascript" type="text/javascript">
	function checksearch()
	{
		kw = gde("keyword");
		if(kw.value == "" || kw.value == "Tìm...")
		{
			Boxy.alert("Vui lòng nhập từ khóa để tìm kiếm", null , {title: 'Thông báo'});
			kw.focus();
			return false;
		}
	}
	
	function clearText(field)
	{
		if (field.defaultValue == field.value) field.value = '';
		else if (field.value == '') field.value = field.defaultValue;
	
	}	
	
	$(document).mouseup(function (e)
	{
		var container = $(".search");	
		if (!container.is(e.target) && container.has(e.target).length === 0) 
		{
			$("#autocomplete").hide();
		}
	});
	
	$(document).keydown(function(e)
	{
		if(e.which == 38 || e.which == 40)
		{
			var pid = 0;
			var pvalue = 0;
			var active = 0;
			if($('#autocomplete').length > 0)
			{
				i = 0;
				$( ".vsmall_products" ).each(function( index )
				{
					if($(this).hasClass("headerpactive" ))
					{
						pid = i;
						active = 1;
						$(this).removeClass("headerpactive");
					}
					i++;
				});
									
				if(e.which == 38)
				{
					pid --;
				}
				
				if(e.which == 40 && active == 1)
				{
					pid++;
				}
				
				if(pid < 0)
				{
					$("#productid").val(0);
				}
				
				if(pid == i)
				{
					$("#productid").val(0);
				}
				
				i = 0;
				$( ".vsmall_products" ).each(function( index )
				{					
					if(pid == i)
					{
						$("#productid").val(this.id);
						$(this).addClass("headerpactive");
					}
					i++;
				});
			}
			e.preventDefault();
		}
	});
	
	$( "#keyword" ).keyup(function(e)
	{
		if(e.which == 38 || e.which == 40)
		{
			return true;
		}
		
		kw = gde("keyword");
		if(kw == '')
		{
			$("#autocomplete").hide();
			return true;
		}
		address = '<?php echo get_permalink($page_search );?>';
		address = addQuery(address, 'keywords='+kw.value);
		$.ajax({
			url: address,
			dataType: "html",
			type: "GET",
			cache: false,
			error: function(e)
			{
				/*Boxy.alert('Lỗi ajax 1', null, {title: 'Lỗi'});*/
				return false;
			},
			success: function(data)
			{
				if(data)
				{
					$("#autocomplete").empty();
					$("#autocomplete").append(data);
					$('#autocomplete').stop(true, true).slideDown("normal");
				}
				else
				{
					$("#autocomplete").hide();
				}
			}
		});		
	});
	
	function getcartnumber()
	{					
		address = '/home/cartnumber/index.html';
		$.ajax({
			url: address,
			dataType: "json",
			type: "GET",
			cache: false,
			error: function(e)
			{
				Boxy.alert('Lỗi ajax 5', null, {title: 'Thông báo'});
				return;
			},
			success: function(data)
			{
				$('.shownumber').empty();
				$('.shownumber').append(data.id);
				if(data.id > 0)
				{
					getcartslist();
				}
				else
				{					
					$('#showcartlink').hide();
					$('#cartslist').empty();
					$('#cartslist').append('<span class="empty">Giỏ hàng chưa có sản phẩm</span>');
				}
			}
		});
	}
	
	
	
</script>