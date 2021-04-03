   <?php 
		 $list_product=get_total_price();
		 $dem=0;
		 if(is_array($list_product))
		 {
			  foreach($list_product as $result)
			 {
				$dem++;
			 }
		 }
	?>
   <div id="layoutGroup6" class="sortable">
   
   <?php 
       $m_loai_quan=-1;
		if(isset($_REQUEST["address"]))
		{
		        
				?>
			 <div class="block" id="module_orderadress">
				<div class="blockcontent">
					<table class="orderproducts" cellpadding="0" cellspacing="0" width="100%">
						<tbody><tr>
							<th class="mtitle" width="90%">
								<span><?php echo $lang_dia_chi_giao_hang?></span>
							</th>
							<th class="mtitle"><a href="<?php  echo get_permalink($page_gio_hang_dia_chi_giao_hang);?>"><?php echo $lang_sua?></a></th>
							
						</tr>
						<tr>
							<td colspan="2"><b>Họ Tên:</b>  <?php echo $_SESSION["fullname"] ?> </td>
						</tr>
						<tr>
							<td colspan="2"><b>Địa chỉ:</b> <?php echo $_SESSION["dia_chi"] ?>  </td>
						</tr>
						<tr>
							<td colspan="2"><b>Điện thoại: </b> <?php echo $_SESSION["telephone"] ?> </td>
						</tr>
					</tbody></table>
				</div>
			</div>
				<?php 
		}
		if(isset($_REQUEST["txt_luu_khong_dang_nhap"]))
		{ 
		
				$gender=$_REQUEST["gender"];
				$fullname=$_REQUEST["fullname"];
				$telephone=$_REQUEST["telephone"];
				$province=$_REQUEST["province"];
				$districts=$_REQUEST["districts"];
				$wardid=$_REQUEST["wardid"];
				$street=$_REQUEST["street"];
		
				$gioi_tinh=$gender;
				$ho_ten=$fullname;
				$dien_thoai=$telephone;
				$tinh=$province;
				$quan_huyen=$districts;
				$phuong_xa=$wardid;
				$dia_chi=$street;
			
				$name_tinh=lay_name_tinh($tinh);
				$name_quan=lay_name_quan($quan_huyen);
				$name_phuong=lay_name_phuong($phuong_xa);
				$ten_dia_chi=$dia_chi." , ".$name_phuong." , ".$name_quan." , ".$name_tinh;
				?>
				<div class="block" id="module_orderadress">
					<div class="blockcontent">
					<table class="orderproducts" cellpadding="0" cellspacing="0" width="100%">
						<tbody><tr>
							<th class="mtitle" width="90%">
								<span><?php echo $lang_dia_chi_giao_hang?></span>
							</th>
							<th class="mtitle"><a href="<?php  echo get_permalink($page_gio_hang_dia_chi_giao_hang);?>">
							<?php echo $lang_sua?> </a></th>
						</tr>
						<tr>
							<td colspan="2"><?php echo $gioi_tinh ?>  <?php echo $ho_ten ?> </td>
						</tr>
						<tr>
							<td colspan="2"><?php echo $ten_dia_chi ?>  </td>
						</tr>
						<tr>
							<td colspan="2"><?php echo $lang_dien_thoai?>: <?php echo $dien_thoai ?> </td>
						</tr>
					</tbody></table>
					</div>
				</div>
				<?php 
		}
		$_SESSION["tr_phone"]=$dien_thoai;
   ?>
  
        	<div id="module_ordercart" class="block">
	<div class="blockcontent">
    	<table width="100%" cellspacing="0" cellpadding="0" class="orderproducts">
        	<tbody><tr>
            	<th width="90%" class="mtitle">
                	<span><?php echo $lang_don_hang?></span>
                	( <?php echo $dem ?> <?php echo $lang_sp?> )
                </th>
                <th class="mtitle">
                	<a   href="<?php echo get_permalink($page_gio_hang);?>"  ><?php echo $lang_sua?></a>
                </th>
            </tr>
        </tbody></table>
        <div class="ordercartmin">
        <table width="100%" cellspacing="0" cellpadding="0" class="orderproducts">
		
			<tbody>
			
			 <?php  
									    
			
				 foreach($list_product as $result)
					{
						$permalink = get_permalink($result["id"] );
				 
				 
				 ?>
			
			<tr>
	
	<?php

	$price_km=$result["gia_km"];
												
												  $price=$result["gia"];
												   /*
												   if($price_km!="")
												   {
														
														$price_km=number_format($price_km, 0, ',', ',');
														$price_km=$price_km." đ";
												   }
												  
												 
												   if($price!="")
												   {
													$price=number_format($price, 0, ',', ',');
													$price=$price." đ";
													 
												   }
												   */
												   
												  $gia_km=$result["gia_km"];
												  $gia_ban=$result["gia"];
												 
												  if($gia_km!=""&& $gia_ban!="")
												  {
													  $gia_tinh_thanh_vien=$gia_km;
														
													  $gia_thuc=$price_km;
													   
												  }
												  if($gia_km==""&& $gia_ban!="")
												  {
													  $gia_tinh_thanh_vien=$gia_ban;
													  $gia_thuc=$price;
													  
													 
												  }
												 if($gia_km==""&& $gia_ban=="")
												  {
													  $gia_thuc=$lang_lien_he;
													  $gia_tinh_thanh_vien="";
												  }
												  
												  if($c_loai_khach_hang==0)
												  {
													$price_km=$price_km;
													$gia_thuc=$gia_thuc;
													
													 if($gia_km!=""&& $gia_ban!="")
													{
														$phantram=100-round(($gia_km/$gia_ban*100),1);
													}	
												  }	
												 
												  if($gia_tinh_thanh_vien!="")
												  {
												   
													 $thanh_vien_vang=$gia_tinh_thanh_vien - $gia_tinh_thanh_vien*($c_thanh_vien_vang/100);
													 $thanh_vien_bach_kim=$gia_tinh_thanh_vien - $gia_tinh_thanh_vien*($c_thanh_vien_bach_kim/100);
													 $thanh_vien_kim_cuong=$gia_tinh_thanh_vien - $gia_tinh_thanh_vien*($c_thanh_vien_kim_cuong/100);
													 
													  if($c_loai_khach_hang==1)
													  {
														 $price_km = $thanh_vien_vang;
														 $gia_thuc=$thanh_vien_vang;
														 $phantram=100-round(($thanh_vien_vang/$gia_ban*100),1);
													  }
													   if($c_loai_khach_hang==2)
													  {
														 $price_km = $thanh_vien_bach_kim;
														 $gia_thuc=$thanh_vien_bach_kim;
														 $phantram=100-round(($thanh_vien_bach_kim/$gia_ban*100),1);
													  }	 
													   if($c_loai_khach_hang==3)
													  {
														 $price_km = $thanh_vien_kim_cuong;
														 $gia_thuc=$thanh_vien_kim_cuong;
														  $phantram=100-round(($thanh_vien_kim_cuong/$gia_ban*100),1);
													  }	
														if($c_loai_khach_hang!=0)
														{
														   $price_km=number_format($price_km, 0, ',', ',')." đ";
														}
													 $thanh_vien_vang=number_format($thanh_vien_vang, 0, ',', ',')." đ";
													 $thanh_vien_bach_kim=number_format($thanh_vien_bach_kim, 0, ',', ',')." đ";
													 $thanh_vien_kim_cuong=number_format($thanh_vien_kim_cuong, 0, ',', ',')." đ";
													
													  $thanh_tien=$gia_thuc*$result["soluong"];
													 $thanh_tien=number_format($thanh_tien, 0, ',', ',')." đ";
													  $gia_thuc=number_format($gia_thuc, 0, ',', ',')." đ";
												  }

													 ?>
	<td valign="top">
    	<a title="	<?php echo $result["title"]?> " href="	<?php echo $permalink ?>">	<?php echo $result["title"]?>    
		( <?php echo $gia_thuc ?>  X <?php echo $result["soluong"] ?> ) </a>
        
    </td>											
    <td valign="top" nowrap="nowrap" align="right">	<?php echo $thanh_tien?></td>	
</tr>
	<?php 
	}
	if($_SESSION["ma_giam_gia"]!=0)
	{
	  $tong_tien=$_SESSION['tong']-($_SESSION['tong']*$_SESSION["ma_giam_gia"])/100;
	
	}
	else 
	{
	   $tong_tien=$_SESSION["tong"];
	  
	}	
	?>
		</tbody></table>
        </div>
        <table width="100%" cellspacing="0" cellpadding="0" class="orderproducts">      
        	<tbody>
			
			<tr class="subtotal">
            	<td><?php echo $lan_tam_tinh?></td>
                <td nowrap="nowrap" align="right" id="subtotalvl"><?php echo number_format($_SESSION["tong"], 0, ',', ',')." đ"; ?></td>
            </tr>
			<tr class="tr_none">
            	<td><?php echo $lang_phi_van_chuyen ?> <br/>
					<?php 
					   
						if($m_loai_quan==1)
						{
						  echo $lang_noi_thanh;
						}						
						if($m_loai_quan==0)
						{
						  echo $lang_ngoai_thanh;
						}
					?>
				 </td>
                <td nowrap="nowrap" align="right" style="display:none" >
					<font color="">  
					<?php 
					    $phi_van_chuyen=0;
						if($_SESSION["tong"]>$mien_phi_ship)
						{
						  ?>
						  <label class="do">Free ship </label> 
						  <?php 
						}
						else 
						{
						   if($m_loai_quan==1)
						   {
						      $phi_van_chuyen=$phi_noi_thanh;
							  echo " + ".number_format($phi_noi_thanh, 0, ',', ',')." đ";
							 ?>
						   
							<?php 
						   }
						   if($m_loai_quan==0)						   
						   {
							  $phi_van_chuyen=$phi_ngoai_thanh;
							  echo " + ".number_format($phi_ngoai_thanh, 0, ',', ',')." đ";
							 ?>
						   
							<?php 
						   }
						  if($m_loai_quan==-1)						   
						   {
						     ?>
							 <label class="do">Free ship </label> 
							 <?php 
						   
						   }
						}
					?>
					</font>
				</td>
            </tr>
			<?php 
				if($_SESSION["ma_giam_gia"]!=0)
				{
					 $uu_dai=($_SESSION['tong']*$_SESSION["ma_giam_gia"])/100;
					 $uu_dai=number_format( $uu_dai, 0, ',', ',')." đ"
			?>
			<tr class="tr_none">
				<td><?php echo $lang_giam_gia_cupon?></td>
				<td nowrap="nowrap" align="right"  ><font color="">  <?php  echo $uu_dai?></font></td>
			</tr>
			<?php 
			}
				else 
				{
				  ?>
				  <tr>
			<td><?php echo $lang_giam_gia_cupon?></td>
			<td nowrap="nowrap" align="right"  ><font color="#f00">  0 đ </font></td>
			</tr>
				  <?php 
				}
				$tong_tien=$tong_tien+$phi_van_chuyen;
			?>			
			
			
			
			
        	<tr class="total">
            	<td><?php echo $lang_tong_tien?></td>
                <td nowrap="nowrap" align="right" id="totalcacul"><?php echo  number_format($tong_tien, 0, ',', ',')." đ";?> </td>
            </tr>
        </tbody></table>
    </div>
</div>
<script type="text/javascript">
	$(function()
	{
		$('#codfeeshow').hide();
		$('#giffeeshow').hide();
			
		$('.cboxy').boxy({afterHide: function()
		{
			location.reload();
		},ovlay:true});
		
		if ($('input:radio[name="payment"]').length)
		{
			getcartvalue();
		}
		
		$('input:radio[name="payment"]').change(function()
		{
			getcartvalue();
		});
		
		$('input:checkbox[name="gift"]').change(function()
		{
			getcartvalue();
		});		
				
		function getcartvalue()
		{
			var gifvalue = 0;
			var codvalue = 0;
			var giftfeevalue = gde('giftfeevalue');
			var fp = gde("coe").elements;
			
			if(gde("gift").checked==true)
			{
				gifvalue = 1;
			}
						
			for(i = 0; i < fp.length; i++)
			{
				if(fp[i].type == "radio" && fp[i].name == 'payment')
				{
					if(fp[i].checked)
					{
						codvalue = fp[i].value;
						$('#menthodinfo'+codvalue).show();
					}else
					{
						$('#menthodinfo'+fp[i].value).hide();
					}
				}
			}
			
			url = addQuery('/orders/getcartvalue/index.html', 'gifvalue=' + gifvalue);
			url = addQuery(url, 'giftfee=' + giftfeevalue.value);
			url = addQuery(url, 'codvalue=' + codvalue);
			
			$.ajax({
				dataType: "json",
				url: url,
				success: function (data, status)
				{
					codfee = data.codfee;
					if(codfee != '')
					{								
						$('#codfeeshow').show();
						$('#codfee').empty();
						$('#codfee').append(codfee);
					}else
					{
						$('#codfeeshow').hide();
					}	
									
					giffee = data.giffee;					
					if(giffee != '')
					{								
						$('#showgif').show();
						$('#giffeeshow').show();						
						$('#giftfee').empty();
						$('#giftfee').append(giffee);
					}else
					{
						$('#showgif').hide();
						$('#giffeeshow').hide();
					}
					
					$('#subtotalvl').empty();
					$('#subtotalvl').append(data.subtotal);
					$('#shipfeevl').empty();
					$('#shipfeevl').append(data.shipfee);
					$('#couponvl').empty();
					$('#couponvl').append(data.coupon);							
					$('#totalcacul').empty();
					$('#totalcacul').append(data.totalam);
				},
				
			});	
		
		}		
	});
</script>
        </div>
	