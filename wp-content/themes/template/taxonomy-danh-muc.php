 <?php 
	include("header.php");
?>

<body> 
 	<?php 
	include("module/mod_head.php");
	 $cater = get_queried_object();					     
	$taxonomy=$cater->taxonomy;
	$tendm=$cater->name;	 
	$tongsotin=get_count_query_child($taxonomy,$cater->term_id);

	if($tongsotin==1)
	{
		$kq=lay_post_thuoc_danh_muc_taxmonomy($taxonomy,$cater->term_id,'menu_order asc',0,1);				
												
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
				wp_redirect($link);
			}
	}
	?> 
     <section class="page-title">
    	<div class="auto-container", align="center", style="color:#FFFFFF">
        	<h1><?php echo $tendm?></h1>
        </div>
    </section>
	<section class="hosting-links">
    	<div class="auto-container tr_list_dich_vu">
        	<ul>
			  <?php 
							$id_parent=get_parent_first_taxonomy($taxonomy,$cater->term_id);
							
							$taxonomy="danh-muc";
							$catergory1= get_terms($taxonomy,array(		'orderby'    => 'custom_sort',	
							'parent'=> $id_parent,		'order'    => 'desc',		'hide_empty' => 0		 )	); 	
							 
							foreach($catergory1 as $cater1)	
							{	    
								$link_cater1=get_term_link($cater1->slug,$taxonomy) ; 	
							  ?>
								<li <?php if($cater1->term_id==$cater->term_id) echo  ' class="active"  ' ?>><a href="<?php echo $link_cater1?>"><?php echo $cater1->name?></a></li>
							  <?php 
							}
						  ?>
            	
            </ul>
        </div>
    </section>
	
	 
    <?php 
		include("footer.php");
	?>
</body>
</html>