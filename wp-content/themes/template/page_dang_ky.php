<?php
/**
*   Template Name: Template trang-dang-ky
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
					   

 <div class="dv-form-lienhe form_dang_ky">

			<form method="post">

					<div class=" ">

						<li class="li_lienhe_name"><input type="text" name="ho_ten" class="ip_lienhe_name" value="" placeholder="<?php echo $lang_ho_ten?>" required ></li>
 
						<li class="li_lienhe_dienthoai"><input type="text" name="txt_dien_thoai" class="ip_lienhe_dienthoai" value="" required  placeholder="<?php echo $lang_dien_thoai?>"></li>
						
						<li class="li_lienhe_diachi"><input type="text" name="txt_dia_chi"  class="ip_lienhe_diachi" value="" required placeholder="Địa chỉ"></li>
						<li class="li_lienhe_email"><input type="text" name="txt_email" class="ip_lienhe_email" value="" placeholder="Email" required></li>
 	 
						<li class="li_lienhe_login"><input type="password" name="txt_pass"  class="ip_lienhe_diachi" value="" required placeholder="Mật khẩu"></li>

					</div>

					 

					<div class="clear"></div>



					<div class="dv-lienhe-button">

						 

					 

						  <button type="submit"  name="txt_dang_ky" ><?php echo $lang_gui?></button>

					

					</div>

			</form>		

		 </div>

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
 