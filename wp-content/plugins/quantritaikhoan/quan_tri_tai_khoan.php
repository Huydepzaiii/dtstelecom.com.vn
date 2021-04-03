<?php 
 global $wpdb;        
 $_SESSION["tr_security"]="on";
$url = plugins_url();
$url=$url."/quantridonhang";
$duongdan=home_url().'/wp-content/uploads/';
if(isset($_REQUEST["task"]))
{
	$task=$_REQUEST["task"];
	if($task=="edit")
	{
		/*****/
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
			$c_face_ip=lay_gia_tri_postmeta($result->ID,"face_ip");	
			$c_face_key=lay_gia_tri_postmeta($result->ID,"face_key");

			$c_thanh_vien_vang=lay_gia_tri_postmeta($result->ID,"thanh_vien_vang");
			$c_thanh_vien_bach_kim=lay_gia_tri_postmeta($result->ID,"thanh_vien_bach_kim");
			$c_thanh_vien_kim_cuong=lay_gia_tri_postmeta($result->ID,"thanh_vien_kim_cuong");
			
			$c_tool_tip_vang=lay_gia_tri_postmeta($result->ID,"tool_tip_vang");
			$c_tool_tip_bach_kim=lay_gia_tri_postmeta($result->ID,"tool_tip_bach_kim");
			$c_tool_tip_kim_cuong=lay_gia_tri_postmeta($result->ID,"tool_tip_kim_cuong");
			
			$phi_noi_thanh=lay_gia_tri_postmeta($result->ID,"phi_noi_thanh");
			$phi_ngoai_thanh=lay_gia_tri_postmeta($result->ID,"phi_ngoai_thanh");
			$mien_phi_ship=lay_gia_tri_postmeta($result->ID,"mien_phi_ship");
			 
			
			
		}
		/*****/
		$id=$_REQUEST["id"];
		$user_info = get_userdata($id);
		$email=$user_info->user_email;
		$id_loai=$_REQUEST["loai_khach"]; 
		$user_loai_khach_hang=$id_loai;
		if($user_loai_khach_hang==0)
		{
		   $user_loai_khach_hang="Thành viên thường";
		}
		if($user_loai_khach_hang==1)
		{
		   $user_loai_khach_hang="Thành viên Mỹ";
		} 
		
	    update_usermeta( $id, 'loai_khach_hang', esc_attr($id_loai) );
		/*
		  $title='Thay đổi cấp độ thành viên tại  '.$c_ten_mien;					
					$html.='
						<table width="100%" cellspacing="0" cellpadding="0">
							<tbody><tr>
								<td align="center" style="padding:0;background-color:#666">
									<table width="700" cellspacing="0" cellpadding="0" style="font-weight:bold">
										<tbody><tr>
											<td style="padding:5px 0">
											<a target="_blank" href="'.home_url().'"><img height="34" border="0" src="'.$logo.'" class="CToWUd"></a>
											</td>
											<td valign="middle" nowrap="" align="right" style="color:#fff">
												<table>
												<tbody><tr>
												<td>
												<img width="25" height="25" border="0" src="https://ci4.googleusercontent.com/proxy/leT5l93kxxKFHw1Ao6Gz_YQJrzsHa0azkaJPp_DASzOgBhFIeAZ1t8VxKdqEy4IQsTXsFS7x7hZ0hyTCQFznxZ5U3CYxGyju=s0-d-e1-ft#http://nobita.vn/layouts/fontpage/images/email.png" class="CToWUd">
												</td>
												<td style="color:#fff"><strong> '.$hot_line.'</strong></td>
												<td>
												<a target="_blank" href="'.$fanpage.'"><img width="22" height="22" border="0" src="https://ci4.googleusercontent.com/proxy/VejttAryv5IlC9GbMZndH8Ptc36iRZMMftEmDu1ZpQVBozQjtKv_ieND95bsRdCTgyYlGIl0ApXpthdujkHKlYi1Zs7yd34qNbAKCFw=s0-d-e1-ft#http://nobita.vn/layouts/fontpage/images/face_email.png" class="CToWUd"></a>
												</td>
												</tr>
												</tbody></table>
											</td>
									   </tr>
									</tbody></table>
								</td>
							</tr>
							<tr>
								<td align="center">
									<table width="700" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
										<tbody><tr>
											<td style="padding:10px 0"><div style="padding:10px 0">
							<p style="color:#00cc66"><strong>Xin chào quý khách !</strong>,</p>
							<p></p><p>Cấp độ thành viên của quý khách hiện tại là : <b> '.$user_loai_khach_hang.'.</b></p>
						<p> </p>  
							<p style="margin:15px 0 0 0"><strong>Cảm ơn quý khách đã sử dụng dịch vụ của chúng tôi.</strong></p>
						</div>
						</td>
										</tr>
										<tr>
											<td style="padding:10px;background-color:#f2f2f2;text-align:center">
												<p>
						</p><p><b><a target="_blank" href="#">'.$c_ten_mien.'</a></b></p>
						<p>'.$c_dia_chi.'</p><p></p>
											</td>
										</tr>
									</tbody></table>
								</td>
							</tr>
						</tbody></table>
						';
						
			    $headers = 'From: '.$c_ten_mien.' <info@'.$c_ten_mien.'>' . "\r\n";
				wp_mail($email, $title, $html,$headers);							*/
			
		
	}
}
?>

<style>
	.quan_ly_new_letter
	{
	  
	 
	  
	}
	.quan_ly_new_letter h3 
	{
	    color: #67aa22;
		font-size: 18px;
		font-weight: bold;
		text-decoration: none;
		text-transform:uppercase;
	}
	.khach_hang_dang_ky 
	{
	    width:1100px;
		background:#fff;
	} 
	.khach_hang_dang_ky tr td ,.khach_hang_dang_ky
	{
	  border:solid 1px #ccc;
	  border-collapse:collapse;
	  padding:10px;
	}
	.khach_hang_dang_ky thead tr td 
	{
		background: none repeat scroll 0 0 #5db646;
		border: medium none;
		color: #fff;
		padding: 10px 0;
		text-align: center;
		text-transform: uppercase;
	}
	
	.woocommerce-pagination {    border-top: 1px solid #e8e8e8;    float: left;    margin-bottom: 20px;    margin-left: 1px;    padding-top: 10px;    width: 100%;}
.page-numbers {    float: right;    width: 100%;}
.woocommerce-pagination li {    float: left !important;    font-size: 15px;    height: 22px !important;    list-style: outside none none !important;    margin: 0 2px !important;    text-align: center !important;    text-decoration: none !important;    width: 26px !important;}
.woocommerce-pagination li .current {    background: none repeat scroll 0 0 #67aa22;    border-color: #e9e9e9;    color: #fff;}
.woocommerce-pagination li * {    border: 1px solid rgba(0, 0, 0, 0);    border-radius: 14px !important;    display: block !important;    font-weight: bold !important;  
  height: 22px !important;    list-style: outside none none !important;    padding-top: 4px !important;    text-decoration: none !important;    width: 26px !important;}
  .page-numbers:hover {}.woocommerce-pagination li a{  color:#757575;}
  .woocommerce-pagination li a:hover {    background: none repeat scroll 0 0 #67aa22;    color: #fff;}
  .next:hover, .prev:hover {    background: none repeat scroll 0 0 rgba(0, 0, 0, 0) !important;    color: #380c00 !important;}
  
  .export_csv
  {
     padding-top:25px;
  }
  .export_csv a 
  {
       background: none repeat scroll 0 0 #5db646;
color: #fff;
padding: 5px 20px;
font-weight: bold;
text-decoration: none;
font-size: 15px;
  }
  
</style>

<div class="quan_ly_new_letter">
     <h3>Danh sách khách hàng</h3>
	 <table class="khach_hang_dang_ky"  cellpadding="10" cellspacing="0">
	     <thead>
			<tr>
			<td width="50px">Số TT</td>
			<td>Tên user</td> 
			<td>Email </td>
			<td>Số điện thoại </td>
			<td>Loại khách hàng</td>
			<td> Lịch sử đơn hàng</td>			
			
			<td width="20px"></td>
			</tr>
		 </thead>
		 <tbody>
			<?php 				 								
			    if(isset($_REQUEST["trang"]))
				{
					$page=$_REQUEST["trang"];
				}
				else
				{
				  $page=1;
				}

									$page_pre=1;

									$page_next=1;	

									$so_tin=10;
									
									$ketqua=get_list_user(0,9999999);
					
									$tongsotin=count($ketqua);

									 

									$page_cuoi=ceil($tongsotin/$so_tin);

									$page_next=$page_cuoi;

									if($page_cuoi==0)

									{

									  $page_cuoi=1;

									}

									if($page!=1)

									{

										$page_pre=$page-1;

									}

									if($page!=$page_cuoi)

									{

										$page_next=$page+1;

									}

									$page1=$page-1;

									$start=$page1*$so_tin;

									$end=$so_tin;

									$dem=0;

									$dem=$page*$so_tin-1;
									
						
								$dem=0;
								$kq=get_list_user($start,$end);		
								foreach($kq as $result)
								{
										$userid = $result->ID;
										$user_email=$result->user_email;
										$user_ho_ten=$result->display_name;
										$user_dt=get_user_meta($userid, "dien_thoai");
										$user_dt=$user_dt[0];	
										
										$user_gioi_tinh=get_user_meta($userid, "gioi_tinh");
										$user_gioi_tinh=$user_gioi_tinh[0];
										
										$user_ngay_sinh=get_user_meta($userid, "ngay_sinh");
										$user_ngay_sinh=$user_ngay_sinh[0];
										
										$user_thang_sinh=get_user_meta($userid, "thang_sinh");
										$user_thang_sinh=$user_thang_sinh[0];
										
										
										$user_nam_sinh=get_user_meta($userid, "nam_sinh");
										$user_nam_sinh=$user_nam_sinh[0];
										
										
										
										$ngay_sinh=$user_ngay_sinh."/".$user_thang_sinh."/".$user_nam_sinh;
										
										$user_loai_khach_hang=get_user_meta($userid, "loai_khach_hang");
										$user_loai_khach_hang=$user_loai_khach_hang[0];
										
										
										$user_info = get_userdata($userid);
										if(implode(', ', $user_info->roles) !="administrator")
										{
											$dem++;
										?>	
				
										<tr>
											<td><?php echo $dem ?></td>
											<td><?php echo $user_gioi_tinh?> <?php echo $user_ho_ten?></td>											
										 
											<td><?php echo $user_email?> </td>
											<td><?php echo $user_dt?> </td>
											<td>
												<select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
												   
												   <option value='admin.php?page=quan_ly_tai_khoan&task=edit&id=<?php echo $userid ?>&loai_khach=0&trang=<?php echo $page ?>' 
												   <?php if($user_loai_khach_hang==0) echo ' selected="selected" ' ?>>Thành viên bình thường</option>
												     <option value='admin.php?page=quan_ly_tai_khoan&task=edit&id=<?php echo $userid ?>&loai_khach=1&trang=<?php echo $page ?>' 
												   <?php if($user_loai_khach_hang==1) echo ' selected="selected" ' ?>>Thành viên Mỹ</option>
												  
												</select>
											</td>
											
											
											
											<td><a href="admin.php?page=lich_su_mua_hang&id=<?php echo $userid?>" target="blank" >Xem chi tiết </a> </td>	
											
										
											
											<td><a href="user-edit.php?user_id=<?php echo $userid?>" target="blank"  >Sửa thông tin</a></td>
										</tr>
										<?php 
										}
										}
										?>
		 </tbody>
			
	 </table>
	 
	 <div class="export_csv">
		 <a href="<?php echo get_permalink(105)?>&task=danh_sach_tai_khoan" target="blank">Export</a>
	 </div>
	  <div class="tr_phan_trang">
						<?php if($tongsotin !=0)
									{?>
										<nav class="woocommerce-pagination">
										<?php 
											   $url="admin.php?page=quan_ly_tai_khoan&trang=";	
										?>
											<ul class="page-numbers">	
												<?php 
													if($page > 1)
													{ ?>
														<li><a href="<?php echo $url.$page_pre?>" class="prev page-numbers">←</a></li>						
												<?php 
													}
													for($i=1;$i<=$page_cuoi;$i++)
													{ 		
														if($i==$page)
														{				   
														?>
															<li><span class="page-numbers current"><?php  echo $i ?></span></li>
														<?php 
														}
														if($i!=$page)
														{
														?>
															<li><a href="<?php echo $url.$i ?>" class="page-numbers"><?php  echo $i ?></a></li>
														<?php 
														}	
													}
													?>
													<li><a href="<?php echo  $url.$page_next?>" class="next page-numbers">→</a></li>
												</ul> 						
										</nav>
									<?php 
									}
									?>
						
					</div>
</div>
<script>
	function openwin(add, name, w, h)
	{
		var l = screen.availWidth / 2 - 450;
		var t = screen.availHeight / 2 - 320;
		var win = window.open(add, name, 'width='+w+',height='+h+',left='+l+',top='+t+',scrollbars=1');
	}
</script>