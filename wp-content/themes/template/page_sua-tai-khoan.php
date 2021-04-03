<?php
/**
*   Template Name: Template trang-sua-tai-khoan
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
		
		 
		$email=$_REQUEST["txt_email"];

		$password=$_REQUEST["txt_pass"];

		$telephone=$_REQUEST["txt_dien_thoai"];
		$user_dia_chi=$_REQUEST["txt_dia_chi"];			

			$fullname=$_REQUEST["ho_ten"];
			$userdata = array(
			'ID'=> $id_user,	
			'display_name' => esc_attr($fullname),		
			
			); 
			$new_user = wp_update_user($userdata);	 
			
			update_usermeta( $new_user, 'dien_thoai', esc_attr($telephone) );

			update_usermeta( $new_user, 'dia_chi', esc_attr($user_dia_chi) );

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

						<li class="li_lienhe_name"><input type="text" name="ho_ten" class="ip_lienhe_name" value="<?php echo $user_ho_ten?>" placeholder="<?php echo $lang_ho_ten?>" required ></li>
 
						<li class="li_lienhe_dienthoai"><input type="text" name="txt_dien_thoai" class="ip_lienhe_dienthoai" value="<?php echo $user_dt?>" required  placeholder="<?php echo $lang_dien_thoai?>"></li>
						
						<li class="li_lienhe_diachi"><input type="text" name="txt_dia_chi"  class="ip_lienhe_diachi" value="<?php echo $user_dia_chi?>" required placeholder="Địa chỉ"></li>
						  
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
 