<?php
/**
*   Template Name: Template gio-hang
* 
* @package Strawberry Jam Ho Chi Minh
* @subpackage JAM
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
           <h1 class="tr_tieu_de" ><?php the_post();the_title();?></h1>
		    <div class="tr_content">
					     
				<div class="tr_content">
					  <div class="tr_content" id="list_gio_hang">
					 <?php include("page_ajax_list_gio_hang.php");?>
												<div class="clear"></div>
				 </div>
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
</html> 
 