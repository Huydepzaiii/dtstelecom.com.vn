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
		$id=$_REQUEST["id"];
		$id_loai_quan=$_REQUEST["loaiquan"];
		update_loai_quan($id,$id_loai_quan);
	   
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
     <h3>Danh sách các quận nội thành TP.HCM</h3>
	 <table class="khach_hang_dang_ky"  cellpadding="10" cellspacing="0">
	     <thead>
			<tr>
			<td width="50px">Số TT</td>
			<td>Tên quận</td>
			<td>Loại</td>
		</tr>
		 </thead>
		 <tbody>
			<?php 				 								
			   

								$dem=0;  
								$kq=lay_quan(79);	
								
								foreach($kq as $result)
								{
								   $dem++;
									$name=$result->name;
								
									$type=$result->type;
								   $id=$result->districtid;	
								   $loaiquan=$result->loai_quan;
								?>
										<tr>
											<td> <?php echo $dem ?></td>
											<td>Quận <?php echo $name?></td>									
										    <td>
												<select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
												   
												   <option value='admin.php?page=quan_ly_phi_van_chuyen&task=edit&id=<?php echo $id ?>&loaiquan=0&trang=<?php echo $page ?>' 
												   <?php if($loaiquan=="" || $loaiquan==0) echo ' selected="selected" ' ?>>Quận ngoại thành </option>
												     <option value='admin.php?page=quan_ly_phi_van_chuyen&task=edit&id=<?php echo $id ?>&loaiquan=1&trang=<?php echo $page ?>' 
												   <?php if($loaiquan==1) echo ' selected="selected" ' ?>>Quận nội thành </option>
												    
												</select>
											</td>
											
											
								     </tr>
										<?php 
										
										}
								?>
		 </tbody>
			
	 </table>
	 
</div>
<script>
	function openwin(add, name, w, h)
	{
		var l = screen.availWidth / 2 - 450;
		var t = screen.availHeight / 2 - 320;
		var win = window.open(add, name, 'width='+w+',height='+h+',left='+l+',top='+t+',scrollbars=1');
	}
</script>