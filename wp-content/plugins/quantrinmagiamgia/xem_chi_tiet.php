<?php 
 global $wpdb;        
 $_SESSION["tr_security"]="on";
$url = plugins_url();
$url=$url."/quantrinewletter";
$duongdan=home_url().'/wp-content/uploads/';
if(isset($_REQUEST["task"]))
{
	$task=$_REQUEST["task"];
	if($task=="delete")
	{
		$id=$_REQUEST["id"];
		wp_delete_post($id);
	}
	
}

if(isset($_REQUEST["txt_submit_sever"]))
{
   
  $txt_ma_giam_gia=$_REQUEST["txt_ma_giam_gia"];
  $txt_giam_gia_pt=$_REQUEST["txt_giam_gia_pt"];
  $txt_giam_gia_tien=$_REQUEST["txt_giam_gia_tien"];
  $txt_so_lan_dung=$_REQUEST["txt_so_lan_dung"];
   if($txt_so_lan_dung!="")
	{
	   $my_post = array(
		'post_title'    => $txt_ma_giam_gia, 
		'post_status'   => 'publish',
		'post_type'     => 'ma-giam-gia'
		); 
		$id=wp_insert_post( $my_post );
		if($id >0)
		{
			update_post_meta($id, 'ten', $txt_ma_giam_gia); 
			update_post_meta($id, 'giam_gia', $txt_giam_gia_pt); 
			update_post_meta($id, 'giam_tien', $txt_giam_gia_tien); 
			update_post_meta($id, 'so_luong', $txt_so_lan_dung); 
			update_post_meta($id, 'da_su_dung', 0); 
		}
	}
}
if(isset($_REQUEST["txt_ma_tu_dong"]))
{
   
 
  $txt_giam_gia_pt=$_REQUEST["txt_giam_gia_pt"];
  $txt_giam_gia_tien=$_REQUEST["txt_giam_gia_tien"];
  $txt_so_lan_dung=$_REQUEST["txt_so_lan_dung"];
  $txt_so_ma_muon_tao=$_REQUEST["txt_so_ma_muon_tao"];
  for($i=1;$i<=$txt_so_ma_muon_tao;$i++)
  {
	 if($txt_so_lan_dung!="")
	{	
	  $today = date("j_n_Y"); 
	  $txt_ma_giam_gia=rand(10000,99999)."_Sankyo_".$today;	
			
	   $my_post = array(
		'post_title'    => $txt_ma_giam_gia, 
		'post_status'   => 'publish',
		'post_type'     => 'ma-giam-gia'
		); 
		$id=wp_insert_post( $my_post );
		if($id >0)
		{
			update_post_meta($id, 'ten', $txt_ma_giam_gia); 
			update_post_meta($id, 'giam_gia', $txt_giam_gia_pt); 
			update_post_meta($id, 'giam_tien', $txt_giam_gia_tien); 
			update_post_meta($id, 'so_luong', $txt_so_lan_dung);
			update_post_meta($id, 'da_su_dung', 0); 	
		}
	 }	
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
  .tr_left
  {
     float: left;
    width: 400px;
    border: solid 1px #ccc;
    padding: 10px;
    min-height: 252px;
    margin-top: 50px;
    margin-right: 50px;
  }
  .clear
  {
    clear:both;
  }
  .tr_left input[type="submit"]
  {
    background:repeat scroll 0 0 #5db646;
	color: #fff;
    padding: 5px 20px;
    font-weight: bold;
    text-decoration: none;
    font-size: 15px;
	cursor:pointer;
	float:right;
  }
</style>


<div class="quan_ly_new_letter">
     <h3>Danh sách mã giảm giá</h3>
	 <table class="khach_hang_dang_ky"  cellpadding="10" cellspacing="0">
	     <thead>
			<tr>
			<td width="50px">Số TT</td>	
			<td>Giới tính</td>	
			<td>Tên user</td>
			
			<td>Ngày sinh</td>
			<td>Email </td>
			<td>Số điện thoại </td>
			<td>Loại khách hàng</td>			
			<td>Mã giảm giá sử dụng </td> 
			<td>Ngày dùng mã </td>  
			
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

									$so_tin=100000;

									
									$ketqua=get_all_post_with_name_custom_post('kh-cupont','post_date asc',0,9999999);
					
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
								$kq=get_all_post_with_name_custom_post('kh-cupont','post_date desc',$start,$end);		
								foreach($kq as $result)
								{
										$name=$result->post_title;
										$id_post=$result->ID;
										$id_cupont=lay_gia_tri_postmeta($result->ID,"id_cupont");
										$userid=lay_gia_tri_postmeta($result->ID,"id_khach");
									 	$user_info = get_userdata($userid);
									if($id_cupont==$_REQUEST["id"])
									{	
										$user_email=$user_info->user_email;
										$user_ho_ten=$user_info->display_name;
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
										if($user_loai_khach_hang==0)
										{
										   $user_loai_khach_hang="Thành viên bình thường";
										}
										if($user_loai_khach_hang==1)
										{
										   $user_loai_khach_hang="Thành viên  Silver";
										}
										if($user_loai_khach_hang==2)
										{
										   $user_loai_khach_hang="Thành viên  Gold";
										}
										if($user_loai_khach_hang==3)
										{
										   $user_loai_khach_hang="Thành viên  Diamon";
										}
										$date=$result->post_date;
										$date=date("d/m/Y",strtotime($date));
										
										$kq1=get_post_with_id_post($id_cupont);
										foreach($kq1 as $result1)
										{ 
											$ten=lay_gia_tri_postmeta($result1->ID,"ten");
											$giam_gia=lay_gia_tri_postmeta($result1->ID,"giam_gia");
											$giam_tien=lay_gia_tri_postmeta($result1->ID,"giam_tien");
											$so_luong	=lay_gia_tri_postmeta($result1->ID,"so_luong");
											$da_su_dung=lay_gia_tri_postmeta($result1->ID,"da_su_dung");
											$date_tao=$result1->post_date;
											$date_tao=date("d/m/Y",strtotime($date_tao));
											if($da_su_dung=="")
											{
											  $da_su_dung=0;
											}
										}
										$dem++;
										?>	
				
										 <tr>
											<td><?php echo $dem ?></td>
											<td><?php echo $user_gioi_tinh?></td>	
											<td><?php echo $user_ho_ten?></td>
											<td><?php echo $ngay_sinh?> </td>
											<td><?php echo $user_email?> </td>
											<td><?php echo $user_dt?> </td>											
											<td><?php echo $user_loai_khach_hang?> </td>
											<td><?php echo $name?> </td> 	
											<td><?php echo $date?> </td> 
											
										<?php 
										}
									}	
										?>
		 </tbody>
			
	 </table>
	 
	 <div class="export_csv">
	     <a href="admin.php?page=quan-ly-ma-giam-gia" target="blank">Quay lại</a>
		 <a href="<?php echo get_permalink(105)?>&task=danh_sach_nguoi_dung_ma" target="blank">Danh sách người sử dụng</a>
	 </div>
	  <div class="tr_phan_trang">
						<?php if($tongsotin !=0)
									{?>
										<nav class="woocommerce-pagination">
										<?php 
											   $url="admin.php?page=quan-ly-ma-giam-gia&trang=";	
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