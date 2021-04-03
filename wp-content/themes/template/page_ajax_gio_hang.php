<?php
/**
*   Template Name: Template ajax-gio-hang
* 
* @package Strawberry Jam Ho Chi Minh
* @subpackage JAM
*
*/
?>
<?php
 
	$dem=0;
	$so_luong_1=0;
	$list_product=get_total_price();
	 if(is_array($list_product))
	 { 
		 foreach($list_product as $result)
		 {
			 if($result["soluong"]==0)
			 {
				  delete_to_cart($result["id"]);
			 }
			 else 
			 {
				  $id_pr="id_".$result["id"];						
				
			 }
			 $so_luong_1=$so_luong_1+ $result["soluong"];
		 }
	 }
?>

<?php echo $so_luong_1 ?>  

  
