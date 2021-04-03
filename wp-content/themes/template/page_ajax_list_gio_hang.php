<?php
/**
*   Template Name: Template ajax-list_gio-hang
* 
* @package Strawberry Jam Ho Chi Minh
* @subpackage JAM
*
*/
?>
<?php
 include("page_value_id.php");
 $task=$_REQUEST["task"];
 
 $id_product=$_REQUEST["product_id"];  
 
 if($task=="delete")
 {
    delete_to_cart($id_product);
	wp_redirect(get_permalink($page_gio_hang));
 }
 if($task=="add")
 {
    
    add_to_cart($id_product);
     $so_luong_sp="so_luong_sp_".$id_product;
	 if(isset($_REQUEST["so_luong"]))
	 {
		 $so_luong=$_REQUEST["so_luong"];
	 }
	 else 
	 {
		 $so_luong=1;
	 }
    $_SESSION[$so_luong_sp] =$_SESSION[$so_luong_sp] + $so_luong;
	wp_redirect(get_permalink($page_gio_hang));
 }
 if($task=="doi")
 {
      $so_luong_sp="so_luong_sp_".$id_product;
     
	  
    $_SESSION[$so_luong_sp] =$_REQUEST["so_luong"];
	wp_redirect(get_permalink($page_gio_hang));
 }
  if($task=="giam_soluong")
 {
   giam_so_luong_cart($id_product);
   wp_redirect(get_permalink($page_gio_hang));
 }
 if($task=="delete_all")
 {
    delete_all();
	wp_redirect(get_permalink($page_gio_hang));
 }
  $list_product="";
 $list_product=get_total_price();
 
 $dem=0;
 if(is_array($list_product))
 {
	  foreach($list_product as $result)
	 {
		$dem++;
	 }
 }
 else
 {
    
	$form='
	<div class="form">
					   <div class="form_header">
					       <h2>Chưa có giỏ hàng</h2>
						</div>
					   <div class="form_body">
						     <div class="thong_bao">
							    Hiện tại bạn chưa mua sản phẩm nào !							 </div>
						 </div>					
					   <div class="form_footer"></div> 					   
	</div>
	';
 }
 ?>
     <div class="red-line-under"></div>
	 
	 
	   <?php if($form!="" || $form!=NULL)
		{
		  echo $form;
		}
		else
		{			   
	 ?>
	    <div class="tr_header"></div>
		<div class="tr_body">
          <form method="post" name="form_cart" id="form_cart">	  
              
               <div class="table-responsive"  >
	    
     <table width="100%" class="glo-table-cart  table-bordered table-striped table-condensed cf" cellpadding="0" cellspacing="0">
	    <thead class="cf">
			<tr>
				 <th><?php echo $lang_san_pham?> </th>
				 <th>Số lượng </th>
				 <th><?php echo $lang_gia?></th>
				 <th><?php echo $lang_thanh_tien?></th>
				 <th><?php echo $lang_xoa ?></th>
			 
			</tr> 
		</thead>
		
		<tbody>
	   <?php 
	     if(is_array($list_product))
		{
		   foreach($list_product as $result)
		   {
		     $permalink = get_permalink($result["id"] );
		    ?>
			
			<tr>
				 <td  class="tr_mobile_center_1">
				   <a href="<?php echo $permalink?>"> <img src="<?php echo( $result["images"]) ?>" class="img_table_cart" width="100px;"/> </a>
				    <a  class="title_card" href="<?php echo $permalink?>"> <?php echo $result["title"]?> <br/> <br/><?php echo $result["chuc_nang"]?></a>
					

				 </td>
				 <td class="tr_mobile_center">
				<?php
				 	$linkchange=get_permalink($page_gio_hang).'?task=doi&product_id='.$result["id"]."&so_luong=";
				?>		
				 <input type="number" class="text_soluong"  onchange="ongchaner_redirect('<?php echo $linkchange?>',this.value)" name="so_luong_sp_<?php echo($result["id"]) ?> "  value="<?php echo( $result["soluong"]) ?>"  /> 
				 <a  href="<?php echo get_permalink($page_gio_hang)."?task=add&product_id=".$result["id"]?>"><img src="<?php echo get_template_directory_uri(); ?>/images/img_cong.png"/></a>
			     <a href="<?php echo get_permalink($page_gio_hang)."?task=giam_soluong&product_id=".$result["id"]?>"><img src="<?php echo get_template_directory_uri(); ?>/images/img_tru.png"/></a>
				
				 </td>
				 <td>
				   <?php 
				   
				   
				       if($flag_dang_nhap==0)
					   {
							$price_km=$result["gia_km"];
							$price=$result["gia"];
							if($price_km!="")
							{
								
								$tr_gia_km=$price_km;
								$price_km=number_format($price_km, 0, ',', '.');
								$price_km=$price_km." vnđ";
							}


							if($price!="")
							{
							$price=number_format($price, 0, ',', '.');
							$price=$price." vnđ";
							 
							}


							$gia_km=$result["gia_km"];
							$gia_ban=$result["gia"];

							if($gia_km!=""&& $gia_ban!="")
							{
							  $gia_thuc=$price_km;
							  $thanh_tien=$result["soluong"]*$tr_gia_km;
							  $thanh_tien=number_format($thanh_tien, 0, ',', '.')." vnđ";;
							}
							if($gia_km==""&& $gia_ban!="")
							{
							  $gia_thuc=$price;
							   $thanh_tien=$result["soluong"]*$result["gia"];
							   $thanh_tien=number_format($thanh_tien, 0, ',', '.')." vnđ";;
							}
							if($gia_km==""&& $gia_ban=="")
							{
							  $gia_thuc="Liên hệ";
								$thanh_tien="Liên hệ";
							}
					   }	
						else 
						{
							$price_km=$result["gia_km"];
							$price=$result["gia"];
							if($price_km!="")
							{
								
								$tr_gia_km=$price_km;
								 
								$price_km="$".$price_km;
							}


							if($price!="")
							{
							 
							$price="$".$price;
							 
							}


							$gia_km=$result["gia_km"];
							$gia_ban=$result["gia"];

							if($gia_km!=""&& $gia_ban!="")
							{
							  $gia_thuc=$price_km;
							  $thanh_tien=$result["soluong"]*$tr_gia_km;
							  $thanh_tien="$".$thanh_tien;
							}
							if($gia_km==""&& $gia_ban!="")
							{
							  $gia_thuc=$price;
							   $thanh_tien=$result["soluong"]*$result["gia"];
							   $thanh_tien="$".$thanh_tien;
							}
							if($gia_km==""&& $gia_ban=="")
							{
							  $gia_thuc="Liên hệ";
								$thanh_tien="Liên hệ";
							}
						}
						if($gia_km!="")
						{
					?>
						<span class="tr_gia_km"><?php echo $price_km?> </span><br/>
						<span class="tr_gia"><?php echo $price?> </span> 
					
						
					<?php 
						}
						else 
						{
					?>
						  <span class="tr_gia_km"><?php echo $gia_thuc?></span>
					   <?php 
					   }
					   ?>
					
							
						
				 </td>
				 <td class="">
				    <b>
				    <?php 
					
					
					
					echo $thanh_tien;
					?>		
					</b>
				 </td>
			 <td>	<a   style="cursor:pointer"
			 
			   href="<?php echo get_permalink($page_gio_hang)."?task=delete&product_id=".$result["id"]?>"
			><img src="<?php echo get_template_directory_uri(); ?>/images/img_cong_1.png"/></a></td>
			</tr> 
  
			<?php 
		   }
		}
	   ?>
	   
	   	</tbody>
 
</table>

</div>

 
	  
 <?php  if(is_array($list_product)){ ?>
	    <div class="glo-sum-tong-tien">
		   <div class="glo-sum-tong-tien"><?php echo $lang_tong_tien?>: <span class="sum-tong-tien">
		   
		   <?php 
		     if($flag_dang_nhap==0)
			 {
		   echo number_format($_SESSION['tong'], 0, ',', ' ') ?> vnđ 
		   <?php 
			 }
			 else 
			 {
				echo "$".$_SESSION['tong']; 
			 }
			?>
			 
		   
		   
		   </span></div>
			 	
		</div>
		
		 <?php } ?>	
		 <div class="dv-lienhe-button glo-right glo-top-20">
    
 
	  			<a href="<?php echo get_permalink($page_thanh_toan); ?>"  class="a_button"><?php echo $lang_don_hang?></a>
		</div>
       

          </form>	  
      </div>
   
	   <?php		
} ?>

<script>
    function ongchaner_redirect(link,value)
	{
		link=link+value;
		 
		 window.location = link;
	}
</script>