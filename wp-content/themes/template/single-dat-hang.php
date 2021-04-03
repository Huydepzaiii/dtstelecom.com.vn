<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
</head>
<body style="color: #000000;font: normal 12px Tahoma; line-height:20px; margin: 0;padding: 0;">
<style>
	a
	{
	  text-decoration:none;
	  color: #00cc66;
	  font-size:14px;
	}
</style>
<?php 
  $kq=get_all_post_with_name_custom_post('quan-tri-chung','post_date desc',0,1);
		foreach($kq as $result)
		{
		   $logo=get_image_size($result->ID,'logo','full');				   
		   $ten_cong_ty=lay_gia_tri_postmeta($result->ID,"ten_cong_ty");	
		   $c_dia_chi=lay_gia_tri_postmeta($result->ID,"dia_chi");	
		   $c_dien_thoai=lay_gia_tri_postmeta($result->ID,"dien_thoai");	
		   $hot_line=lay_gia_tri_postmeta($result->ID,"hot_line");	
		   $fax=lay_gia_tri_postmeta($result->ID,"fax");	
		   $map=lay_gia_tri_postmeta($result->ID,"map");	
		   $fanpage=lay_gia_tri_postmeta($result->ID,"fanpage");	
		   $c_email=lay_gia_tri_postmeta($result->ID,"email");	
		    $c_ten_mien=lay_gia_tri_postmeta($result->ID,"ten_mien");	
			$c_thong_tin_ck=lay_gia_tri_postmeta($result->ID,"chuyen_khoan");	
			$c_mail_don_hang=lay_gia_tri_postmeta($result->ID,"mail_don_hang");	
			
		}
		
		
				$id_post=$post->ID;
					$ma_don_hang=$post->post_title;
					$nguoi_nhan=lay_gia_tri_postmeta($post->ID,"nguoi_nhan");
					$tong_tien=lay_gia_tri_postmeta($post->ID,"tong_tien");
					$ly_do_huy=lay_gia_tri_postmeta($post->ID,'ly_do_huy');	
				
					$link=get_permalink($post->ID );
					$date=$post->post_date;
					$date=tep_convert_mysqldate_to_stringdate($date);
					 $terms = get_the_terms( $post->ID, 'nhom-don-hang' );
					foreach($terms as $result1)
					{
						$tinh_trang= $result1->name;			
						break;
					}
					 $content=wpautop($post->post_content);
		 
?>		
<table width="100%" cellspacing="0" cellpadding="0">
	<tbody><tr>
		<td align="center" style="background-color:#fff;">
			<table width="80%"   style=" margin: 0 auto" cellspacing="5" cellpadding="5">
                <tbody><tr>
                    <td width="50%" style="font-size:30px; font-weight:bold; padding:0">
                        <a title="<?php echo $ten_cong_ty?>" href="<?php echo home_url();?>"><img border="0" src="<?php echo $logo?>" width="210px"></a>					
                    </td>
                    <td nowrap="" align="center" style="font-size:12px; padding:0; font-weight:bold">
                    	<div style="font-size:15px"><p><?php echo $ten_cong_ty?></p></div>
                        <p>Hỗ trợ khách hàng: <?php echo $c_dien_thoai?> - Email: <?php echo $c_email?></p>
                    </td>
                </tr>
             </tbody></table>
        </td>
   </tr>
</tbody></table>
<table width="80%"   style=" margin: 0 auto"  cellspacing="0" cellpadding="0">
	<tbody><tr>
		<td align="center">
             <table width="100%" cellspacing="2" cellpadding="2" style="background-color:#ffffff;">
                <tbody><tr id="printoder">
                    <td align="right" colspan="2">
                    	<a href="javascript:printorder()" style="background-color:#00cc66; font-weight:bold; color:#fff; padding:2px 5px; text-decoration:none">In đơn hàng</a>
                    </td>
                </tr>
				<tr>
					<td style="font-size:12px;" colspan="2">
						Mã đơn hàng: <?php echo $ma_don_hang?>  - <strong><?php echo $tinh_trang?></strong>
						
						
					</td>
				</tr>
                <tr>
                	<td style="font-size:12px;" colspan="2">
                    	Ngày đặt hàng: <?php echo $date?>
                    </td>
                </tr>
				<?php 
							if($result1->term_id=111)
							{
							  ?>
							 <tr>
								<td style="font-size:12px;" colspan="2">
									<b>Lý do hủy đơn hàng :</b> <?php echo $ly_do_huy?>
								</td>
							</tr>
							  
							  <?php
								
							}
						?>
                
			</tbody>
			</table>
            <div>&nbsp;</div>
			<?php 
				 
				 
				 $content=str_replace("<a", "<a target='blank'",$content);
				 echo $content;
			?>
            <div>&nbsp;</div>
			
		</td>
	</tr>
</tbody></table>


<script type="text/javascript">
	function printorder()
	{
		document.getElementById('printoder').style.display = "none";
		window.print();
	}
</script></body></html>