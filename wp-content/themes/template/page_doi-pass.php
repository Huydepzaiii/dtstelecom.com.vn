<?php
/**
*   Template Name: Template trang-doi-pass
* 
* @package Strawberry Jam Ho Chi Minh
* @subpackage JAM
*
*/
?>
<?php 
	include("header.php");
	
	if(isset($_REQUEST["txt_cap_nhap"]))
	{
		$current_user = wp_get_current_user();
		$id_user=$current_user ->ID;
		
		 
		$password=$_REQUEST["txt_pass"]; 
			$userdata = array(
			'ID'=> $id_user,
			'user_pass' => esc_attr($password),			
		   );
			$new_user = wp_update_user($userdata);	 
	       wp_redirect("?page_id=".$page_thong_bao."&flag=16");  
	}
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
					   
                <?php 
					if(is_user_logged_in()) 	
					{
						$current_user = wp_get_current_user();
						$id_user=$current_user ->ID;
						
						$user_email=$current_user->user_email;
						$user_ho_ten=$current_user->display_name;
						 
						$user_dt=get_user_meta($id_user, "dien_thoai");
						$user_dt=$user_dt[0];	
						
						$user_dia_chi=get_user_meta($id_user, "dia_chi");
						$user_dia_chi=$user_dia_chi[0];	
						 
										
					}
					 
				?>
 <div class="dv-form-lienhe form_dang_ky">

			<form method="post">

					<div class=" "> 
					
					       
						<li class="li_lienhe_login"><input type="password" name="txt_pass"  class="ip_lienhe_diachi" value="" required placeholder="Nhập Mật khẩu Muốn Đổi"></li>

					</div>

					 

					<div class="clear"></div>



					<div class="dv-lienhe-button">

						 

					 

						  <button type="submit"  name="txt_cap_nhap" ><?php echo $lang_gui?></button>

					

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
 