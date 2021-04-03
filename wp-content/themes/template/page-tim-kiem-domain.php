<?php 
/**
*   Template Name: Template page_tim_kiem_domain
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
			$domain1=$_REQUEST["domain"];
	?>
 
<div class="clear"></div>

 <!--Domain Section-->
    <section class="domain-section">
        <div class="auto-container">
        	<div class="cloud-one"></div>
            <div class="cloud-two"></div>
        	<div class="sec-title light centered", style="color:#FFFFFF">
            	<h1><?php echo $lang_tim_kiem_ten_mien?></h1>
                <div class="text"><?php echo $lang_chon_ten_mien?></div>
            </div>
            <!--Domain Form-->
			
			
            <div class="domain-form">
                <form method="post" action="<?php echo get_permalink($page_tim_kiem_domain)?>">
                    <div class="form-group clearfix">
                        <input type="text" name="domain" value="<?php echo $domain1?>" placeholder="<?php echo $lang_ten_mien_ban_muon_mua?>" required="">
                        <button type="submit" class="theme-btn checked-btn"><?php echo $lang_kiem_tra?><span class="arrow fa fa-angle-right"></span></button>
                    </div>
                </form>
            </div>
             
        </div>
    </section>   
	   <section class="testimonial-section1">
    	<div class="auto-container">
		 <div class="tr_thong_bao_ten_mien "> 
<!-- -->
<?php
 
	$domain1= explode(".", $domain1); 
	include 'api_config.php';
	for($i=0;$i<=3;$i++)
	{
		if($domain1[$i]!="")
		{
			
			$domain.=$domain1[$i]; 
		}
		if($domain1[$i+1]!="")
		{
			
			$domain.="."; 
		}
	} 
	 
	
?>
<!-- -->
<div class="clear"></div>
<section class="tr_section plans-section">
<div class="row">
   
	<div class="col-md-4 tr_nen_domain">
	
	 
		<div class="group_check">
	        	<strong class="largetext upper" style="font-weight:bold"><?php echo $lang_danh_sach_tm?></strong>
	            <div class="clear5"></div>
	            <hr>
	            <div class="clear5"></div>
				
				
				<?php 
					$array_mang_chua=array();
					/*$mang_ten_mien=array(".vn",".com",".net",".com.vn",".org",".info",".me",
					".xyz");
					*/
					$mang_ten_mien=array(".vn",".com",".net",".com.vn",".org",".info",".me");
					foreach($mang_ten_mien as $result1)
					{
						$domain=$domain1[0].$result1;
						$result = file_get_contents(API_URL."?username=".USERNAME."&apikey=".API_KEY."&cmd=check_whois&domain=".$domain);
						if($result == '0') 
						{
							 ?>
							 <div class="ext_choose selected unavail">
								<div class="ext_status"></div>
								<div class="ext_text"><?php echo $domain?></div>
								<div class="clear"></div>
							</div>
							<div class="clear"></div>
							 <?php 
						}
						elseif($result == '1') 
						{
							 array_push($array_mang_chua, $domain);
							   ?>
							 <div class="ext_choose selected">
								<div class="ext_status"></div>
								<div class="ext_text"><?php echo $domain?></div>
								<div class="clear"></div>
							</div>
							<div class="clear"></div>
							 <?php 
							 
						}
					}
					
				?>
	         
				
				 
	            <div class="clear"></div>
	            				<div class="clear"></div>
			</div>
						
						</div>	
						
	 <div class="col-md-8 tr_nen_domain">	
	 <strong class="largetext upper" style="font-weight:bold"><?php echo $lang_dang_ky_tm?></strong>
	            <div class="clear5"></div>
	            <hr>
				<div class="plans-outer1">
							  <div class="plans-table">						
								<table class="dich_vu_bo_sung table">
									 <?php 
										foreach($array_mang_chua as $result)
										{
									 ?>
												<tr>
													<td class="title xanh"> <?php echo $result ?></td>
													<td>  
														<a class="theme-btn btn-style-two wow bounce animated" rel="nofollow" href="<?php echo get_permalink($page_thanh_toan)?>?id=<?php echo $domain;?>&loai=domain"><?php echo $lang_dang_ky?></a>
													</td>
												
												</tr>
															
										<?php 
										}
										?>					
															  
															 
								</table>	
						
						
						
						</div>
						</div>	 
								</div>
							
							
							</div>	
							
 </section>
		
		<?php 
		  $ketqua=get_all_post_with_name_custom_post("ten-mien","menu_order asc",0,1);		
			foreach($ketqua as $result) 			
			{				
					$name=$result->post_title;
					$name=qtranxf_use($lang, $name,false);
					$id_post=$result->ID; 							
					$expert=wpautop($result->post_content); 
					$expert=qtranxf_use($lang, $expert,false);
					$link = get_permalink($result->ID );
					$img=get_image_size($result->ID,'images','medium');		 
			   
		?>
        	<div class="sec-title centered">
            	<h2><?php echo $name?></h2>
            </div>
            <div class="tr_content tr_table_ten_mien">
            	 <?php 
					echo $expert;
				 ?>
            </div>
			
			<?php 
			}
			?>
        </div>
    </section>
  
	
	
	<?php 
		include("footer.php");
	?>
 
</body>


</html>


