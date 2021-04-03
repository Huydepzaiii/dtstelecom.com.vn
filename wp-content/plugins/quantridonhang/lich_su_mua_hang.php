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
     <h3>Danh sách đơn hàng</h3>
	 <table class="khach_hang_dang_ky"  cellpadding="10" cellspacing="0">
	     <thead>
			<tr>
			<td width="50px">Số TT</td>
			<td>Mã đơn hàng</td>
			<td>Ngày đặt </td>
			<td>Người đặt </td>
			<td>Email </td>
			<td>Số điện thoại </td>
			<td>Địa chỉ </td>			
			<td>Lịch sử mua hàng </td>	
			<td>Xem chi tiết </td>			
			
			<td width="20px"></td>
			</tr>
		 </thead>
		 <tbody>
			<?php 				 		
				$id=$_REQUEST["id"];
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
								
									$ketqua=get_my_post_with_name_custom_post('dat-hang',$id,'post_date asc',0,9999999);
					
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
								$kq=get_my_post_with_name_custom_post('dat-hang',$id,'post_date desc',$start,$end);		
								foreach($kq as $result)
								{
										$name=$result->post_title;
										$id_post=$result->ID;
										$img=get_image_size($result->ID,'images','medium');
										$expert=wpautop($result->post_excerpt);
										$expert=sub_string($expert,200);
										$link = get_permalink($result->ID );
										$date=$result->post_date;
										$date=tep_convert_mysqldate_to_stringdate($date);
										$user = get_userdata($result->post_author);
											
										$email=$user->user_email;
										$ho_ten=$user->display_name;
										$txt_so_dt=get_usermeta($result->post_author,'dien_thoai');	
										$txt_dia_chi=get_usermeta($result->post_author,'dia_chi');		
											$tong_tien=lay_gia_tri_postmeta($result->ID,"tong_tien");
										$tong_tien=number_format($tong_tien, 0, ',', '.')." đ";	
										$dem++;
										?>	
				
										<tr>
											<td><?php echo $dem ?></td>
											<td><?php echo $name?></td>											
											<td><?php echo $date?> </td>
											<td><?php echo $ho_ten?> </td>
											<td><?php echo $email?> </td>
											<td><?php echo $txt_so_dt?> </td>
											<td><?php echo $tong_tien?> </td>	
											<td>

											<?php 
												$terms = get_the_terms( $result->ID, 'nhom-don-hang' );
												foreach($terms as $result1)
												{
													$tinh_trang= $result1->term_id;			
													break;
												}
												
												
												?>
												<select name="txt_nhom_dong_hang"  onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
												<?php 
												  $catergory = get_terms("nhom-don-hang",array(		'orderby'    => 'custom_sort',	'order'    => 'desc',		'hide_empty' => 0		 )	); 		
													foreach($catergory as $cater)	
													{ 
													
													
													    $link_1="admin.php?page=khach_hang_dat_hang&task=edit&id=".$id_post."&id_loai=".$cater->term_id."&trang=".$page;
													   ?>
													   <option <?php if($cater->term_id==$tinh_trang) echo ' selected="selected" ' ?> value="<?php echo $link_1 ?>"><?php echo $cater->name?></option>
													   <?php 
													}
											?>
												</select>
											</td>			
											<td><a href="javascript:openwin('<?php echo $link;?>', 'vieworder', 800, 600)">Xem đơn hàng</a> </td>	
											
											<td><a href="admin.php?page=khach_hang_dat_hang&task=delete&id=<?php echo $id_post?>" onclick="return confirm('Bạn muốn xóa thông tin này');" ><img src="<?php echo $url?>/images/x.png" /></a></td>
										</tr>
										<?php 
										}
										?>
		 </tbody>
			
	 </table>
	 
	 <div class="export_csv">
		 <a href="<?php echo get_permalink(105)?>&task=lich_su_mua_hang&id=<?php echo $result->post_author?>" target="blank">Export</a>
	 </div>
	  <div class="tr_phan_trang">
						<?php if($tongsotin !=0)
									{?>
										<nav class="woocommerce-pagination">
										<?php 
											   $url="admin.php?page=khach_hang_dat_hang&trang=";	
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