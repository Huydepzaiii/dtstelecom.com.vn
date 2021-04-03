<?php
/**
*   Template Name: Template thanh_toan
* 
* @package Strawberry Jam Ho Chi Minh
* @subpackage JAM
*
*/
?>
<?php 
	include("header.php");
?>

<?php 
@session_start(); 
  if(isset($_REQUEST["tr_tranh_toan"]))
  {
    $san_pham_chon=get_total_price();				
    
	$today = date("j/n/Y"); 	

	$ho_ten=$_REQUEST["ho_ten"];
	$txt_ho_ten=$ho_ten;
	$txt_dien_thoai=$_REQUEST["txt_dien_thoai"];
	$txt_ngay_thang=$_REQUEST["txt_ngay_thang"];
	$so_nha=$_REQUEST["so_nha"];
	$ten_duong=$_REQUEST["ten_duong"];
	$txt_tinh=$_REQUEST["txt_quan"];
	$txt_thanh_pho=$_REQUEST["txt_thanh_pho"];
	$txt_email=$_REQUEST["txt_email"];
	$txt_yeu_cau=$_REQUEST["txt_yeu_cau"];
	$phuong_thuc=$_REQUEST["phuong_thuc"];
	$txt_dia_chi=$_REQUEST["txt_dia_chi"];
	$txt_dich_vu=$_REQUEST["txt_dich_vu"];
	$mahoadon="HD_".$txt_dien_thoai."_".rand(10000,1000000); 
 
	
	$html='
	  
		<table width="100%"   style=" margin: 0 auto"  cellspacing="0" cellpadding="0">
	<tbody><tr>
		<td align="center">
             <table width="100%" cellspacing="5" cellpadding="5" style="background-color:#ffffff">
				<tbody><tr>
					<td style="font-size:12px" colspan="2">
						<p style="
    border-bottom: solid 1px #ccc;
    padding-top: 10px;
    padding-bottom:  14px;
    /* text-align: center; */
"><a target="_blank" href="'.home_url().'"><img height="34" border="0" src="'.$logo.'" class="CToWUd"></a><br/></p>
										
							<p> <b>Cảm ơn anh/chị :  <b>'.$txt_ho_ten.'</b> đã đặt hàng  ! </b></p>';
							
				$html.=$c_mail_don_hang.'			

					</td>
				</tr>
                <tr>
                	<td style="font-size:12px;font-weight:bold" colspan="2">
					Thông tin đơn hàng của anh/chị đã được gửi đến chúng tôi. Nhân viên CSKH sẽ gọi điện và xác nhận lại đơn hàng với anh/chị 1 lần nữa trước khi gởi hàng.<br/>
                    	<b>Dưới đây là thông tin chi tiết đơn hàng </b>
                    </td>
                </tr>
                <tr>
                	<td>
                    	Đơn hàng <b>'.$mahoadon.'</b> đặt mua ngày : '.$today.'
                    </td>
                </tr>
				tr>
                	<td>
                    	Dịch vụ <b>'.$txt_dich_vu.'</b>;
                    </td>
                </tr>
			</tbody></table>';  
	 
   $thong_tin_don_hang.='
            <div>&nbsp;</div>
			<table width="100%"  style=" margin: 0 auto" cellspacing="0" cellpadding="0" style="background-color:#ffffff">
				<tbody><tr>
					<td valign="top" style="font-size:13px;border:1px solid #f2f2f2;padding:10px">';
					 
					 
					  $ghi_chu=$_REQUEST["txt_yeu_cau"];
					$thong_tin_don_hang.='
<p><b>Thông tin giao hàng:</b> <br/>
 <b>Họ Tên:</b>'.$gioi_tinh .' '.$txt_ho_ten .'<br/> <b>Địa chỉ:</b> '.$txt_dia_chi .'<br/> <b>Điện thoại: </b> '.$txt_dien_thoai .' 
 <br/>
 <b>Email:</b> <a target="_blank" href="mailto:'.$txt_email.'">'.$txt_email.'</a>
</p>
<p>
	 <b>Ghi chú đơn hàng :</b> '.$ghi_chu.' <br/>					
				 
</p>
					</td>
				</tr>
             </tbody></table>
             <div>&nbsp;</div>';
			 
			 $html.=$thong_tin_don_hang;
			 $html.='
             <table width="100%" cellspacing="0" cellpadding="0" style="background-color:#ffffff">
				<tbody> <tr>
											<td style="padding:10px;background-color:#f2f2f2;text-align:center">
												<p>
						</p><p><b><a target="_blank" href="'.home_url().'"></a></b></p>
						<p>'.$thong_tin.'</p><p></p>
											</td>
										</tr>
			</tbody></table>
		</td>
	</tr>
</tbody></table>
		
		';
		 
		 
	if(is_user_logged_in()) 	
	{
		$current_user = wp_get_current_user();
	    $id_user=$current_user ->ID;		
		$my_post = array(
			 'post_title' =>$mahoadon,
			 'post_type' => 'dat-hang',
			 'post_content' =>$thong_tin_don_hang,
			 'post_status' => 'public', 
			  'post_author'     => $id_user,
		  );
	}
	else 
	{
	$my_post = array(
			 'post_title' =>$mahoadon,
			 'post_type' => 'dat-hang',
			 'post_content' =>$thong_tin_don_hang,
			 'post_status' => 'public', 
			 
		  );
	}
		   
		  
   $san_pham_chon=get_total_price();
			
	if(is_array($san_pham_chon))
	 {	
		foreach($san_pham_chon as $result)
		{
		   delete_to_cart($result["id"]);
		
		}
	 }
	  
 	   unset($_SESSION["tong"]);
	   
	   
	 wp_insert_post( $my_post );
	 
	 
	$headers = 'From : '. $email . "\r\n" .
	'Reply-To: '. $email . "\r\n" .
	'X-Mailer: PHP/' . phpversion();
	$headers .= 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";	
	
	
	$tieude_email="Thông tin đơn hàng".$mahoadon;
	wp_mail("sales@dtstelecom.com.vn",$tieude_email, $html,$headers);		 
	 
       wp_redirect("?page_id=".$page_thong_bao."&flag=10");
	    return;	
       
		 
  }
?>




 
<body>
 
 <?php 
	include("module/mod_head.php");
?>
  <section class="page-title">
    	<div class="auto-container">
        	<h2><?php the_title(); ?></h2>
        </div>
    </section>
<div class="clear"></div>
  <section class="tr_main sidebar-page-container">  
 
	<div class="container">
         
      <div class="row"> 
		 
		<div class="col-md-12 tr_block_content">    	
             	 				<div class="tr_content">	
					     
						     	<div class="d_content">
							
								
			 <div class="group_tin">
									<!-- -->
									  <div class="red-line-under"></div>
	 
	 
	   <?php 
	     $list_product="";
		$list_product=get_total_price();
	   if($form!="" || $form!=NULL)
		{
		 
		  echo $form;
		}
		else
		{			   
	 ?>
	    <div class="tr_header"></div>
		<div class="tr_body">
          <form method="post" name="form_cart" id="form_cart">	  
              
               <div class="tr_chi_tite_gio_hang">
			   
			   <div class="dv-form-lienhe">
					<div class="lienhe-left">
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
						$id=$_REQUEST["id"];
						$tintuc=get_post_with_id_post($id);
						foreach($tintuc as $result)
						{

								$name=$result->post_title;
								$name = qtranxf_use($lang, $name,false); 
												  								
								$id_post=$result->ID; 
								 
						}
						if(isset($_REQUEST["loai"]))
						{
							$name=$lang_dang_ky_tm." ".$_REQUEST["id"];
						}
						
				 
					 ?>
						<li class="li_lienhe_name"><input type="text" name="ho_ten" class="ip_lienhe_name"  placeholder="<?php echo $lang_ho_ten?>"  value="<?php echo $user_ho_ten?>" ></li>

						<li class="li_lienhe_dienthoai"><input type="text" name="txt_dien_thoai" class="ip_lienhe_dienthoai"  required  placeholder="<?php echo $lang_dien_thoai?>" value="<?php echo $user_dt?>"></li>

						<li class="li_lienhe_email"><input type="text" name="txt_email" class="ip_lienhe_email"   placeholder="Email" value="<?php echo $user_email?>"></li>

						<li class="li_lienhe_diachi"><input type="text" name="txt_dia_chi" class="ip_lienhe_diachi"    placeholder="<?php echo $lang_dia_chi?>" value="<?php echo $user_dia_chi?>"></li>
					<li class="li_lienhe_captcha"><input type="text" name="txt_dich_vu" class="ip_lienhe_diachi"    placeholder="<?php echo $lang_dich_vu?>" value="<?php echo $name?>"></li>
					
					</div>
					<div class="lienhe-right">
						<li class="li_lienhe_noidung"><textarea name="txt_yeu_cau" class="ip_lienhe_noidung" placeholder="<?php echo $lang_noi_dung?>" ></textarea></li>

					 
					</div>
					<div class="clear"></div>

					<div class="dv-lienhe-button">
						 
					 
						  <button type="submit"  name="tr_tranh_toan" ><?php echo $lang_gui?></button>
					
					</div>
				</div> 
</div>

 
	  

          </form>	  
      </div>
   
	   <?php		
} ?>
									<!-- -->
								 
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
 
  