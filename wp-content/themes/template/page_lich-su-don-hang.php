<?php
/**
*   Template Name: Template trang-sua-tai-khoan
* 
* @package Strawberry Jam Ho Chi Minh
* @subpackage JAM
*
*/
?>
<?php 
	include("header.php");
	
	 
?>

 
<body>
 
 <?php 
	include("module/mod_head.php");
?>
<div class="clear"></div>
  <section class="tr_main">
	<!-- -->
	<div class="container">
         
      <div class="row">
        <?php 
			include("module/mod_left.php");
		?>
		 
		<div class="col-md-9 tr_block_content">    	
           <h1 class="tr_tieu_de" ><?php the_post();the_title();?></h1>
		    <div class="tr_content">
					     
				<div class="tr_content"> 
					 
	<div class="blockcontent">
    	<table width="100%" cellspacing="0" cellpadding="0" class="ordertable">
        	<tbody><tr>
               	<th width="2%" nowrap="nowrap">Đơn hàng#</th>
                <th align="left">Ngày mua</th>
                <th align="left">Gởi đến</th> 
                <th align="left" colspan="1">Chi tiết đơn hàng</th>
            </tr>
			<?php 
					$dem=0;
					get_currentuserinfo();
					$current_user = wp_get_current_user();
					$id_user=$current_user ->ID;
					$name_login=$current_user->display_name;
					$email=$current_user->user_email;
					$kq=get_my_post_with_name_custom_post("dat-hang",$id_user,"post_date desc",0,100000);	
					foreach($kq as $result)
				{
					$id_post=$result->ID;
					$ma_don_hang=$result->post_title;
					$nguoi_nhan=lay_gia_tri_postmeta($result->ID,"nguoi_nhan");
					$tong_tien=lay_gia_tri_postmeta($result->ID,"tong_tien");
					$link=get_permalink($result->ID );
					$date=$result->post_date;
					$date=tep_convert_mysqldate_to_stringdate($date);
					 $terms = get_the_terms( $result->ID, 'nhom-don-hang' );
					foreach($terms as $result1)
					{
						$tinh_trang= $result1->name;			
						break;
					}
					$dem++;
					
			?>
			<tr>
				<td nowrap="nowrap">
					<a href="javascript:openwin('<?php echo $link;?>', 'vieworder', 800, 600)"><?php echo $ma_don_hang;?></a>
				</td>
				<td>
					<?php echo $date;?>
				</td>
				<td>
					<?php echo $nguoi_nhan;?>
				</td>
			
				
				<td align="center">
					<a href="javascript:openwin('<?php echo $link;?>', 'vieworder', 800, 600)"><b>Xem đơn hàng</b></a>
				</td>
				
				
			</tr>
		<?php 
		  }
		?>
        </tbody></table>
        <div class="clear">&nbsp;</div>
        
        <div class="clear"></div>
	</div>
   
    
												<div class="clear"></div>
				 </div>
				</div>

				</div>	
			 
		</div>	
		</div>
	</div>
	<!-- -->
	<div class="clear"></div>
</div>	
<script>
	function openwin(add, name, w, h)
	{
		var l = screen.availWidth / 2 - 450;
		var t = screen.availHeight / 2 - 320;
		var win = window.open(add, name, 'width='+w+',height='+h+',left='+l+',top='+t+',scrollbars=1');
	}
</script>

 	 
<?php 
	include("footer.php");
?>
</html> 
 