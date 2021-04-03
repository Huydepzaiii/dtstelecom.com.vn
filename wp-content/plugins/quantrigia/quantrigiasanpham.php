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

if(isset($_REQUEST["imort_du_lieu"]))
{
	$upload='txt_file';
    $types = array('text/xml');
	$tmp_name = $_FILES[$upload]['tmp_name']; 
	$bien=rand(1,1000);
	$new_name = $bien."".$_FILES[$upload]['name'];  
	$uploadfiles = $_FILES[$upload];
	if (in_array($_FILES[$upload]['type'], $types))
	{ 							   
		$filename=$uploadfiles['name'];
		$upload_dir = wp_upload_dir();
		
		$filetmp = $uploadfiles['tmp_name'];
		$filetitle = preg_replace('/\.[^.]+$/', '', basename( $filename ) );
		$filetype = wp_check_filetype(basename($filename), null );
		$filename = $filetitle . '.' . $filetype['ext'];
		$bien=rand(1,1000);
		$filename = $filetitle . '_' . $bien . '.' . $filetype['ext'];
		$filedest = $upload_dir['path'] . '/' . $filename;
		move_uploaded_file($filetmp, $filedest);													
		$link_img= $upload_dir['url'] . '/' . $filename;
		
		
		/*****/
		$doc = new DOMDocument();
		  $doc->load( $link_img );
		  
		  $data = $doc->getElementsByTagName( "Data" );
		  $dem=0;
		  $du_lieu=array();
		  $dem_1=0;
		  foreach( $data as $node)
		  { 
			$dem++;
			if($dem==8)
			{
			  $dem=1;
			  $dem_1++;
			}
			if($dem==1)
			{
				$du_lieu[$dem_1]["STT"]=$node->nodeValue;	
			}
			if($dem==2)
			{
				$du_lieu[$dem_1]["ID"]=$node->nodeValue;	
			}
			if($dem==3)
			{
				$du_lieu[$dem_1]["Ma"]=$node->nodeValue;	
			}
			if($dem==4)
			{
				$du_lieu[$dem_1]["Gia"]=$node->nodeValue;	
			}
			if($dem==5)
			{
				$du_lieu[$dem_1]["Gia_KM"]=$node->nodeValue;	
			}
			
			if($dem==6)
			{
				$du_lieu[$dem_1]["TEN"]=$node->nodeValue;	
				 
			}
			if($dem==7)
			{
				$du_lieu[$dem_1]["HANG"]=$node->nodeValue;	
			}
			
			
		  }
		 
		 /*********/
		  for($i=1;$i<=count($du_lieu);$i++)
		  {
			 $id_post=$du_lieu[$i]["ID"];
			 
			 $gia=$du_lieu[$i]["Gia"];
			
			 $gia_km=$du_lieu[$i]["Gia_KM"];
			  $bien= $id_post."-".$gia."-".$gia_km."<br>";
			 
			 if($gia==0 || $gia=="")
			 {
			   $gia="";
			 }
			 if($gia_km==0 || $gia_km=="")
			 {
			   $gia_km="";
			 }
			  update_post_meta($id_post, 'gia', $gia);
			   update_post_meta($id_post, 'gia_km', $gia_km);
			 
			 
			 
		  }
		  echo "<h2 style='text-align:center'> Đã IMPORT THÀNH CÔNG </h2>";
		  
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
	float:left;
  }
</style>
<div class="Thêm mới">
	<div class="tr_left">
		<form method="post">
			<h3>Xuất file sản phẩm </h3>
				 
			<div class="export_csv">
				 <a href="<?php echo get_permalink(105)?>?task=file_san_pham" target="blank">Xuất file sản phẩm</a>
				 
			</div>
				
		</form>
	</div>
	<div class="tr_left">
	 <form method="post" enctype="multipart/form-data">
			<h3>Import file sản phẩm</h3>
			
				<table> 
					<tr>
						<td>File sản phẩm</td>
						<td>
						
						  <input type="file" class="inp_upload" name="txt_file" id="txt_file" />
			                  
						
						</td>
						
					</tr>
				 
				</table>
				<input type="submit" value="IMPORT Dữ Liệu" name="imort_du_lieu"/>
				
			</form>
	</div>
	<div class="clear"></div>
</div>
 