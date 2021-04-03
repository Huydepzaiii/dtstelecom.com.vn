<div id="mainbanner">
			<div class="mainbaner">
			
<div id="slider-wrapper">
    <ul class="bxslider">
	
		<?php 
			  $ketqua=get_all_post_with_name_custom_post("banner","menu_order asc",0,100);
			  foreach($ketqua as $result)						
			  {							
			    $name=$result->post_title;
			    $img=get_image_size($result->ID,"images","full");
				$link =lay_gia_tri_postmeta($result->ID,"link");	
				?>
				    <li><a href="<?php echo $link ?>" target="_self"><img src="<?php echo $img?>" title="<?php echo $name?>" alt="<?php echo $name?>"></a></li>
				<?php 
			 }	
		?>
      
    </ul>
</div>
<div class="banner_chay" style="display:none">
	 <?php 
					$ketqua=get_all_post_with_name_custom_post("banner-phu","menu_order asc",0,2);		
				foreach($ketqua as $result)												
				{		
					$name=$result->post_title;
				$hinhanh=get_image_size($result->ID,"images","full");		
				$link=lay_gia_tri_postmeta($result->ID,"link");	 
				
				?> 		
					<div class="tr_home_km">	
					<a href="<?php echo $link?>"><img src="<?php echo $hinhanh ?>" alt="<?php echo $name?>"></a><div class="clear"></div>	
					</div>	
				<?php 
				}
		 
				?>	

</div>
			</div>
		</div>