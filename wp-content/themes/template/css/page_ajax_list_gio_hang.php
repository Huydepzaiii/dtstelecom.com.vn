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
include("page_value_id.php");  include("language/".$lang.".php");    $kq=get_all_post_with_name_custom_post("he-thong","post_date desc",0,1);foreach($kq as $result){		$bien="ship_1_".$lang;	$ship_name_1=lay_gia_tri_postmeta($result->ID,$bien);	$ship_price_1=lay_gia_tri_postmeta($result->ID,"ship_price_1");		$bien="ship_2_".$lang;	$ship_name_2=lay_gia_tri_postmeta($result->ID,$bien);	$ship_price_2=lay_gia_tri_postmeta($result->ID,"ship_price_2");		}
 $task=$_REQUEST["task"]; 
 $id_product=$_REQUEST["product_id"]; 
 $price_ship=$ship_price_1; $ma_cupon="";
 $tr_gia_coupon=0; 
 if($task=="ship") {      $_SESSION["price_ship"]=$id_product; } if(!isset($_SESSION["price_ship"])) {  	 $_SESSION["price_ship"]=$ship_price_1; }  
 $price_ship=$_SESSION["price_ship"]; 
 if($task=="coupon") {   $tr_coupon=$id_product;   $_SESSION["price_coupon"]=0; 
 $_SESSION["ma_coupon"]=""; 
 for($i=1;$i<=10;$i++) 
 {      $bien_1="coupon_".$i;	 
 $bien_2="coupon_gia_".$i;	
 $ma_cupon=lay_gia_tri_postmeta($result->ID,$bien_1);	
 if($tr_coupon==$ma_cupon)	
 {	    $_SESSION["price_coupon"]=lay_gia_tri_postmeta($result->ID,$bien_2);
 $_SESSION["ma_coupon"]=$tr_coupon;				break;	  }   } }
 if(!isset($_SESSION["price_coupon"])) {   	$_SESSION["price_coupon"]=0; } $tr_gia_coupon=$_SESSION["price_coupon"];  if(!isset($_SESSION["ma_coupon"])) {  	 $_SESSION["ma_coupon"]=""; }  $ma_cupon=$_SESSION["ma_coupon"];  
 if($task=="delete")
 {
    delete_to_cart($id_product);
 }
  if($task=="delete_1")
 {
    delete_to_cart_1($id_product);
 }
 if($task=="add")
 {
   /*add_to_cart($id_product);*/
    $so_luong_sp="so_luong_sp_".$id_product;
   if(isset($_SESSION[$so_luong_sp]))

   {


     


	 $_SESSION[$so_luong_sp] =$_SESSION[$so_luong_sp]+1;


   }

   else
   {


     $_SESSION[$so_luong_sp] =1;


   }
 }
  if($task=="giam_soluong")
 {
   giam_so_luong_cart($id_product);
 }
 if($task=="delete_all")
 {
    delete_all();
 }  
 if($task=="add_1")
 {   
   /*add_to_cart_1($id_product);*/
    $so_luong_sp="so_luong_tr_".$id_product;
   if(isset($_SESSION[$so_luong_sp]))
   {
  

	 $_SESSION[$so_luong_sp] =$_SESSION[$so_luong_sp]+1;

   }

   else

   {

     $_SESSION[$so_luong_sp] =1;

   }
 } 
 if($task=="giam_soluong_1") 
 {   giam_so_luong_cart_1($id_product); }
 if($task=="delete_all_1") 
 {    
 delete_all_1();
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
              
               <div class="tr_chi_tite_gio_hang">
	    <h3 class="tr_h3"><?php echo $lang_read_to_order?></h3>
     <table width="100%" class="table_gioi_hang" cellpadding="0" cellspacing="0">
	 
	   <?php 
	     if(is_array($list_product))
		{
		   foreach($list_product as $result)
		   {
		     $permalink = get_permalink($result["id"] );
		    ?>
			
  <tr class="table_gioi_hang_tr">
	 <td class="table_gioi_hang_td" width="165px" valign="top"><a href="<?php echo $permalink?>">
	 <img src="<?php echo( $result["images"]) ?>" class="img_table_cart"/> </a></td>
	 <td  class="table_gioi_hang_td" width="400px" valign="top">
	   <div class="tr_chi_tiet_ten"><a href="<?php echo $permalink?>"><?php echo( $result["title"]) ?></a></div>
	    <div class="clear"></div>
	   <div class="tr_chi_tiet_gio_hang_so_luong">
			<li class="tr_name_so_luong"><span class="tr_width"><?php echo $lang_quati?> : </span></li>
			<li><input type="text" class="text_soluong" name="so_luong_sp_<?php echo($result["id"]) ?> "  value="<?php echo( $result["soluong"]) ?>" readonly="true"/></li>
			<li class="tr_name_so_luong_buuton">
				<a  onclick="ajax_list_gio_hang(<?php echo($page_ajax_list_gio_hang) ?>,'add',<?php echo($result["id"]) ?>	)"><img src="<?php echo get_template_directory_uri(); ?>/images/img_cong.png"/></a>
				<a onclick="ajax_list_gio_hang(<?php echo($page_ajax_list_gio_hang) ?>,'giam_soluong',<?php echo($result["id"]) ?>	)"><img src="<?php echo get_template_directory_uri(); ?>/images/img_tru.png"/></a>
				<a   style="cursor:pointer" onclick="ajax_list_gio_hang(<?php echo($page_ajax_list_gio_hang) ?>,'delete',<?php echo($result["id"]) ?>	)"><img src="<?php echo get_template_directory_uri(); ?>/images/img_cong_1.png"/></a>

			</li>
	   </div>
	    <div class="clear"></div>
	     <div class="tr_chi_tiet_sp_gio_hang" >
			<li class="tr_name_so_luong"><span class="tr_width"> <?php echo $lang_size?> : </span></li>
			<li class="product_price">		
			   <?php echo $result['mau']?>
			   
			 
			</li>
		  </div>
		  <div class="clear"></div>
		   <div class="tr_chi_tiet_sp_gio_hang" >		 
				 <li class="tr_name_so_luong"><span class="tr_width">Special Request : </span></li>			 
				 <li class="product_price">					
						<?php echo $result['pr_comment']?>	
						<?php echo $result['comment']?>		
				 </li>    			
			 </div> 	
			 <div class="clear"></div> 
	    <div class="tr_chi_tiet_sp_gio_hang" >
			<li class="tr_name_so_luong"><span class="tr_width"><?php echo $lang_gia?>  : </span></li>
			<li class="product_price">
			
			<?php 
		
						     if($result['price']!=0)
							 {
							  
		                      $price="$".$result['price']*$result["soluong"];
							   
							 }
							 else
							 {
							   
							 }
							 echo($price);
			
			
		 ?>
			</li>
		  </div>
		   <div class="clear"></div>
	   
	 </td>
	 
  </tr>
			<?php 
		   }
		}
	   ?>
 
</table>
	 <h3 class="tr_h3"><?php echo $lang_made_to_order?></h3>    
	 <table width="100%" class="table_gioi_hang" cellpadding="0" cellspacing="0">	
	 <?php         
	 $list_product="";	
	 $list_product=get_total_price_1();	
     if(is_array($list_product))	
	 {		 
	 foreach($list_product as $result)	
	 {		
     $permalink = get_permalink($result["id"] );
	 ?>		
	 <tr class="table_gioi_hang_tr">	
	 <td class="table_gioi_hang_td" width="165px" valign="top">
	    <a href="<?php echo  $permalink?>"><img src="<?php echo( $result["images"]) ?>" class="img_table_cart"/> </a>
	 </td>
	 <td  class="table_gioi_hang_td" width="400px" valign="top">	
	 <div class="tr_chi_tiet_ten"><a href="<?php echo  $permalink?>"><?php echo( $result["title"]) ?></a></div>
	 <div class="tr_chi_tiet_gio_hang_so_luong">		
	 <li class="tr_name_so_luong"><span class="tr_width"><?php echo $lang_quati?> : </span></li>
	 <li><input type="text" class="text_soluong" name="so_luong_sp_tr_<?php echo($result["id"]) ?> "  value="<?php echo( $result["soluong"]) ?>" readonly="true"/></li>		
	 
	 <li class="tr_name_so_luong_buuton">		
	 <a  onclick="ajax_list_gio_hang(<?php echo($page_ajax_list_gio_hang) ?>,'add_1',<?php echo($result["id"]) ?>	)">
	 <img src="<?php echo get_template_directory_uri(); ?>/images/img_cong.png"/></a>		
	 <a onclick="ajax_list_gio_hang(<?php echo($page_ajax_list_gio_hang) ?>,'giam_soluong_1',<?php echo($result["id"]) ?>	)">
	 <img src="<?php echo get_template_directory_uri(); ?>/images/img_tru.png"/></a>	
      <a   style="cursor:pointer" onclick="ajax_list_gio_hang(<?php echo($page_ajax_list_gio_hang) ?>,'delete_1',<?php echo($result["id"]) ?>	)">
	   <img src="<?php echo get_template_directory_uri(); ?>/images/img_cong_1.png"/></a> 
	 
	 </li>	   
	 </div>	     
	 <?php
		   $flag=0;
			$terms = wp_get_post_terms( $result["id"],"products" );
			foreach($terms as $result_1)
			{
			  $term_id=$result_1->term_id;
			  if($term_id==6 || $result_1->parent==6)
			  {
				$flag=1;
			  }
			}
			if($flag==0)
			{
	
        ?>
	 <div class="tr_chi_tiet_sp_gio_hang" >		 
		 <li class="tr_name_so_luong"><span class="tr_width">Size Lug  : </span></li>			 
		 <li class="product_price">					
			<?php echo $result['size_lug']?>
		 </li>    			
	 </div>
	 <div class="clear"></div>
	<div class="tr_chi_tiet_sp_gio_hang" >		 
		 <li class="tr_name_so_luong"><span class="tr_width">Size Buckle  : </span></li>			 
		 <li class="product_price">					
			<?php echo $result['size_buckle']?>		
		 </li>    			
	 </div>
	  <div class="clear"></div>
	<div class="tr_chi_tiet_sp_gio_hang" >		 
		 <li class="tr_name_so_luong"><span class="tr_width">Length  Long Side  : </span></li>			 
		 <li class="product_price">					
			 	<?php echo $result['long_size']?>			
		 </li>    			
	 </div>   
	 <div class="clear"></div>  
	<div class="tr_chi_tiet_sp_gio_hang" >		 
		 <li class="tr_name_so_luong"><span class="tr_width">Length  Short Side  : </span></li>			 
		 <li class="product_price">					
			 	<?php echo $result['short_size']?>				
		 </li>    			
	 </div>     
	 <div class="clear"></div>
	 <div class="tr_chi_tiet_sp_gio_hang" >		 
		 <li class="tr_name_so_luong"><span class="tr_width">Color : </span></li>			 
		 <li class="product_price">					
				<?php echo $result['color']?>			
		 </li>    			
	 </div>     
	 <div class="clear"></div>
	 <div class="tr_chi_tiet_sp_gio_hang" >		 
		 <li class="tr_name_so_luong"><span class="tr_width">Stitching color : </span></li>			 
		 <li class="product_price">					
				<?php echo $result['stit']?>			
		 </li>    			
	 </div> 
	 <div class="clear"></div>
	 <div class="tr_chi_tiet_sp_gio_hang" >		 
		 <li class="tr_name_so_luong"><span class="tr_width">Buckle : </span></li>			 
		 <li class="product_price">					
				<?php echo $result['buckles_name']?>			
		 </li>    			
	 </div> 
	 <div class="clear"></div>
			  <div class="tr_chi_tiet_sp_gio_hang" >		 
					 <li class="tr_name_so_luong"><span class="tr_width">Material : </span></li>			 
					 <li class="product_price">					
						<?php echo $result['material_name']?>
					 </li>    			
				 </div>
				 
	<div class="clear"></div>
	 <div class="clear"></div>
	  <div class="tr_chi_tiet_sp_gio_hang" >		 
		 <li class="tr_name_so_luong"><span class="tr_width">Special Request : </span></li>			 
		 <li class="product_price">					
				<?php echo $result['comment']?>			
		 </li>    			
	 </div> 
	   <div class="clear"></div>
	 <?php 
	     }
		 else 
		 {
		   ?>
		     <div class="clear"></div>
		    <div class="tr_chi_tiet_sp_gio_hang" >		 
					 <li class="tr_name_so_luong"><span class="tr_width">Size    : </span></li>			 
					 <li class="product_price">					
						<?php echo $result['size_buckle']?>
					 </li>    			
				 </div>
			<div class="clear"></div>
			  <div class="tr_chi_tiet_sp_gio_hang" >		 
					 <li class="tr_name_so_luong"><span class="tr_width">Material : </span></li>			 
					 <li class="product_price">					
						<?php echo $result['material_name']?>
					 </li>    			
				 </div>
				<div class="clear"></div> 
			<div class="clear"></div>
			  <div class="tr_chi_tiet_sp_gio_hang" >		 
				 <li class="tr_name_so_luong"><span class="tr_width">Special Request : </span></li>			 
				 <li class="product_price">					
						<?php echo $result['pr_comment']?>	
						<?php echo $result['comment']?>		
				 </li>    			
			 </div> 	 
		   <?php 
		 }
	 ?>  
	 <div class="clear"></div>
	   <div class="tr_chi_tiet_sp_gio_hang" >		
	   <li class="tr_name_so_luong"><span class="tr_width"><?php echo $lang_gia?>  : </span></li>	
	   <li class="product_price">						
	   <?php 								    
	   if($result['price']!=0)						
	   {							  		     
	       $price="$".$result['price']*$result["soluong"];				
	   }							 else				
	   {							   							 }		
	   echo($price);								 ?>			
	   </li>		
	   </div>	 
	   
	   </td>	 
	  

	   </tr>
	   <?php 		   }		}	   ?> </table>	
	   <div class="coupon">		
	   <table class="tr_coupon">	
	   <tr>				
	   <td class="tr_01  tr_opactity <?php if($price_ship==$ship_price_1) echo'tr_opactity1';?>">
	      <input type="radio" <?php if($price_ship==$ship_price_1) echo'checked="true"';?> name="ship" VALUE="<?php echo $ship_price_1?>" onclick="ajax_list_gio_hang(<?php echo($page_ajax_list_gio_hang) ?>,'ship',<?php echo $ship_price_1?>)" >
		  <?php echo $ship_name_1?> : </td>	
		  <td class="tr_02 tr_opactity <?php if($price_ship==$ship_price_1) echo'tr_opactity1';?>">+ $<?php echo $ship_price_1?></td>							
		  </tr>			
		  <tr>				
		  <td class="tr_01  tr_opactity<?php if($price_ship==$ship_price_2) echo'tr_opactity1';?>"><input type="radio" name="ship" <?php if($price_ship==$ship_price_2) echo'checked="true"';?>  VALUE="<?php echo $ship_price_2?>"   onclick="ajax_list_gio_hang(<?php echo($page_ajax_list_gio_hang) ?>,'ship',<?php echo $ship_price_2?>)"><?php echo $ship_name_2?> : </td>		
		  <td class="tr_02  tr_opactity <?php if($price_ship==$ship_price_2) echo'tr_opactity1';?>">+ $<?php echo $ship_price_2?></td>								
		  </tr>				
		  <tr>			
		  <td class="tr_01">Coupon: </td>					<td class="tr_02"><input type="text" name="coupon" id="coupon" value="<?php echo $ma_cupon?>"/></td>									 </tr>				 <tr>					<td class="tr_01"> </td>					<td class="tr_02"><input type="button" value="CHECK  COUPON" name="bt_update" class="bt_mua_hang" style="margin-left:0px;" onclick="ajax_list_gio_hang(<?php echo($page_ajax_list_gio_hang) ?>,'coupon',coupon.value)"></td>									 </tr>		   </table>   </div>   <div class="clear"></div>
 <?php  if(1==1)
 {?>	
	<div class="tr_tong_gio_hang" >	  
	<div id="tr_id_tong_tien_ship">		       
	<div class="chi_tiet_tong_tien">			
	<ul>										
	
	
	<li class="tr_tong_gio_hang_title_tr" style="clear:both;display:none" >Ship :</li>					
	<li class="tr_tong_gio_hang_gia_tr" style="display:none" > + $<?php echo $price_ship?></li>		
	
	</ul>								
	</div>				
	<div class="chi_tiet_tong_tien">	
			
	<?php 		
	
	$tr_tong_1=$_SESSION['tong_1']+$_SESSION['tong_2'];				
	$price_giam_gia_cupon=($tr_tong_1*$tr_gia_coupon)/100;			
	if($tr_gia_coupon!=0)
	{
	?>		
		<ul>							
	<li class="tr_tong_gio_hang_title_tr" style="clear:both" >Coupon :</li>		
	<li class="tr_tong_gio_hang_gia_tr" > $<?php echo $tr_tong_1 ?> * <?php echo $tr_gia_coupon?>% = - $<?php echo $price_giam_gia_cupon?></li>	
	</ul>	
	<?php 
	}
	?>
									
	</div>
				<li class="tr_tong_gio_hang_title" > <?php echo $lang_tong_tien?> : </li>				
				<?php 					$tr_tong_price=$_SESSION['tong_1']+$_SESSION['tong_2'] + $price_ship - $price_giam_gia_cupon;				?>
				
				
				<li class="tr_tong_gio_hang_gia" >$<?php echo $tr_tong_price?> </li>        </div>
		<div class="tr_tong_gio_hang_buuton">
		        					<div class="table_thong_nguoi_mua">					
									<div class="thong_tin_left ">			
									<div class="content_tin_left">			
									<h2>Shipping Address </h2> 	
									<table class="table_tt_nguoi_ban">				
									<tr>											
									<td class="tr_col_1"> <?php echo $lang_ho_ten ?> </td>	
									<td class="tr_col_2"> <input type="text" name="txt_ten" id="txt_ten_1"/> </td>		
									</tr>												
									<tr>												
									<td class="tr_col_1"> <?php echo $lang_dien_thoai?> </td>	
									<td class="tr_col_2"> <input type="text" name="txt_dien_thoai" id="txt_dien_thoai_1"/> </td>		
									</tr>				
											
									<tr>							
									<td class="tr_col_1"> Shipping Address</td>				
									<td class="tr_col_2"> 
										<input type="text" name="txt_ship_adress" id="txt_shiping" placeholder="Shipping Address"/> <br/>
										<input type="text" class="tr_ship"  name="txt_ship_city" id="txt_shiping"  placeholder="Suburb/City" />
										<input type="text"  class="tr_ship" name="txt_ship_country" id="txt_shiping" placeholder="Country" /> 
										<input type="text"  class="tr_ship"  name="txt_ship_state" id="txt_shiping" placeholder="State/Province" /> 
										<input type="text"  class="tr_ship"  name="txt_ship_zip" id="txt_shiping" placeholder="Zip/Postcode" />
										
									
									</td>	
									</tr>
									<tr>	
									<tr>							
										<td class="tr_col_1"> </td>				
										<td class="tr_col_2"> 
											 <input type="checkbox" name="txt_ship_check"></input> <span style="font-weight:bold">Shipping address is billing address</span>
										
										</td>	
									</tr>
									<tr>				
									<td class="tr_col_1"> Billing Address</td>				
									<td class="tr_col_2"> 
										<input type="text" name="txt_bill_adress" id="txt_shiping" placeholder="Billing Address"/> <br/>
										<input type="text" class="tr_ship"  name="txt_bill_city" id="txt_shiping"  placeholder="Suburb/City" />
										<input type="text"  class="tr_ship" name="txt_bill_country" id="txt_shiping" placeholder="Country" /> 
										<input type="text"  class="tr_ship"  name="txt_bill_state" id="txt_shiping" placeholder="State/Province" /> 
										<input type="text"  class="tr_ship"  name="txt_bill_zip" id="txt_shiping" placeholder="Zip/Postcode" />
										
									
									</td>	
									</tr>
									<tr>													
										<td class="tr_col_1"> Email </td>							
										<td class="tr_col_2"> <input type="text" name="txt_email" id="txt_email_1"/> </td>	
										</tr>		
									<tr>													
										<td class="tr_col_1"> Message </td>							
										<td class="tr_col_2">
											 <textarea name="txt_message" class="text_area"></textarea>
										</td>	
									</tr>	
									<tr>										
									<td class="tr_col_1">  </td>							
									<td class="tr_col_2">							
									<input style="margin-left:0px;"type="submit" class="bt_mua_hang" onclick="return check_err('txt_ten_1','txt_dien_thoai_1','txt_email_1','txt_dia_chi_1')" class="thanh_toan_class" name="thanh_toan_paypal" value="<?php echo $lang_thanh_toan_pp?> " />					
									<input style="margin-left:0px;"type="submit" class="bt_mua_hang" onclick="return check_err('txt_ten_1','txt_dien_thoai_1','txt_email_1','txt_dia_chi_1')" class="thanh_toan_class" name="thanh_toan_tranfer" value="Bank Wire Transfer" />					





									</td>																								</tr>																																											  </table>													  </div>													</div>												</div>	
		 
						
		        <div class="clear"></div>
     </div>
	    <div class="clear"></div>
	</div>
 <?php } ?>	
	  
 </div>	
          </form>	  
      </div>
      <div class="tr_footer"></div>
	   <?php		
		} ?>