<?php 
 global $wpdb;        
 $_SESSION["tr_security"]="on";
$url = plugins_url();
$url=$url."/quantridonhang";
$duongdan=home_url().'/wp-content/uploads/';
$id=$_REQUEST["id"];

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
	.khach_hang_dang_ky ,.table_tr_gio_hang
	{
	    width:1100px;
		background:#fff;
	} 
	.khach_hang_dang_ky tr td ,.khach_hang_dang_ky , .table_tr_gio_hang tr td,.table_tr_gio_hang
	{
	  border:solid 1px #ccc;
	  border-collapse:collapse;
	  padding:10px;
	}
	.khach_hang_dang_ky thead tr td , table_tr_gio_hang  thead tr td
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
	<?php 
		$kq=get_post_with_id_post($id);	
		foreach($kq as $result)
		{
				$name=$result->post_title;
				$id_post=$result->ID;
				$img=get_image_size($result->ID,'images','medium');
				$content=wpautop($result->post_content);
				
				$link = get_permalink($result->ID );
				$date=$result->post_date;
				$date=tep_convert_mysqldate_to_stringdate($date);
				$user = get_userdata($result->post_author);					
				$email=$user->user_email;
				$ho_ten=$user->display_name;
				$txt_so_dt=get_usermeta($result->post_author,'dien_thoai');	
				$txt_dia_chi=get_usermeta($result->post_author,'dia_chi');	
			
		}		
	?>
     <h3>Mã đơn hàng : <?php echo $name?> </h3>
	  <table class="khach_hang_dang_ky"  cellpadding="10" cellspacing="0">
	     <thead>
			<tr>
			
			<td>Mã đơn hàng</td>
			<td>Ngày đặt </td>
			<td>Người đặt </td>
			<td>Email </td>
			<td>Số điện thoại </td>
			<td>Địa chỉ </td>			
			<td>Lịch sử mua hàng </td>	
				
			
			<td width="20px"></td>
			</tr>
		 </thead>
		 <tbody>
		<tr>				
				<td><?php echo $name?></td>											
				<td><?php echo $date?> </td>
				<td><?php echo $ho_ten?> </td>
				<td><?php echo $email?> </td>
				<td><?php echo $txt_so_dt?> </td>
				<td><?php echo $txt_dia_chi?> </td>		
					<td><a href="admin.php?page=lich_su_mua_hang&id=<?php echo $result->post_author?>">Xem chi tiết </a> </td>				
				
				<td><a href="admin.php?page=khach_hang_dat_hang&task=delete&id=<?php echo $id_post?>" onclick="return confirm('Bạn muốn xóa thông tin này');" ><img src="<?php echo $url?>/images/x.png" /></a></td>
		</tr>
		 </tbody>
			
	 </table>
	 <div class="export_csv">
		 <a href="admin.php?page=khach_hang_dat_hang">Quay lại danh sách đơn hàng</a>
	 </div>
	  <h3>Thông tin chi tiết : </h3>
	 <?php 
		echo $content;
	 ?>
	
</div>