 <?php 
				if(is_user_logged_in()) 
				{
					get_currentuserinfo();
					$current_user = wp_get_current_user();
					$id_user=$current_user ->ID;
					$name_login=$current_user->display_name;
					$email=$current_user->user_email;
					
					
					$bhxh=get_user_meta($userid, "bhxh");
					$bhxh=$bhxh[0];
					
					}
				?>
<div class="clear"></div>
<div class="customer">
          
		   <div class="clear"></div>
		   <?php 
				$kq=get_my_post_with_name_custom_post("dia-chi",$id_user,"post_date desc",0,1000);
			
				if(count($kq>0))
				{
				    ?>
					<table width="100%" cellspacing="0" cellpadding="0" class="ordertable">
                <tbody> 
				<tr>
                	<th width="50%" align="left">
                    	<?php echo $lang_thong_tin_lien_he?>
                        <a title="<?php echo $lang_thay_doi?>" href="<?php echo get_permalink($page_sua_tai_khoan)?>" class="more"><?php echo $lang_thay_doi?></a>
                    </th>
                    <th align="left"><?php echo  $lang_danh_sach_dia_chi_giao_hang?>
                        
                    </th>
                </tr>
                <tr>
                	<td>
					<?php 
						$kq=get_my_post_with_name_custom_post("dia-chi",$id_user,"post_date desc",0,1000); 
			if(count($kq)>0 && is_user_logged_in() )
			{
				 
						foreach($kq as $result)
						{
							if(lay_gia_tri_postmeta($result->ID,"mac_dinh")=="on")
							{
								$id_post=$result->ID;
								$gioi_tinh=lay_gia_tri_postmeta($result->ID,"gioi_tinh");
								$ho_ten=lay_gia_tri_postmeta($result->ID,"ho_ten");
								$dien_thoai=lay_gia_tri_postmeta($result->ID,"dien_thoai");
								$tinh=lay_gia_tri_postmeta($result->ID,"tinh");
								$quan_huyen=lay_gia_tri_postmeta($result->ID,"quan_huyen");
								$phuong_xa=lay_gia_tri_postmeta($result->ID,"phuong_xa");
								$dia_chi=lay_gia_tri_postmeta($result->ID,"dia_chi");
								$dia_chi=lay_gia_tri_postmeta($result->ID,"dia_chi");
								$mac_dinh=lay_gia_tri_postmeta($result->ID,"mac_dinh");
								
								$name_tinh=lay_name_tinh($tinh);
								$name_quan=lay_name_quan($quan_huyen);
								$name_phuong=lay_name_phuong($phuong_xa);
								if($name_phuong!="")
								{
									$name_phuong=' , '.$name_phuong;
								}
								if($name_quan!="")
								{
									$name_quan=' , '.$name_quan;
								}
								$dia_chi_korea=lay_gia_tri_postmeta($result->ID,"dia_chi_korea");
								
								$zip=lay_gia_tri_postmeta($result->ID,"zip");
								$ten_dia_chi=$dia_chi;
							}
						}
			}
							
							
		 ?>
				 
           			<div class="cfield"> <b><?php echo $name_login?></b></div>
			           	<?php 
									$id_user=$current_user ->ID;
									$tong_diem_thuong=0;
									$kq_dt=get_my_post_with_name_custom_post("diem-thuong",$id_user,"post_date desc",0,100000);	
									 
									foreach($kq_dt as $result)
									{
										  
										   $tinh_trang=lay_gia_tri_postmeta($result->ID,"tinh_trang");
										   if($tinh_trang!=-1)
										   {
											    $diem_thuong=lay_gia_tri_postmeta($result->ID,"diem_thuong");
												$loai=lay_gia_tri_postmeta($result->ID,"loai");
												if($loai=="su_dung_diem")
												{
												$tong_diem_thuong=$tong_diem_thuong-$diem_thuong;
												}
												else 
												{
													$tong_diem_thuong=$tong_diem_thuong+$diem_thuong;
												}
										   }
										   
										   
										   
									}
									?>
					   <div class="cfield"><b><?php echo $lang_diem_thuong_cua_toi?> </b><label class="do">:   <?php echo $diem_thuong?></label></div>
						<div class="cfield"><?php echo $email?></div>
						<div class="cfield"><?php echo  $ten_dia_chi?></div>
									<div class="cfield"><?php echo $dien_thoai ?></div>
						  	 
                        <div class="cfield">
                        	<a title="<?php echo $lang_doi_mat_khau?>" href="<?php echo get_permalink($page_sua_tai_khoan)?>?task=edit_password"><?php echo $lang_doi_mat_khau ?></a>
                        </div>
                    </td>
                    <td valign="top" rowspan="3">
						<?php 
						$kq=get_my_post_with_name_custom_post("dia-chi",$id_user,"post_date desc",0,1000); 
							foreach($kq as $result)
							{
								 	$id_post=$result->ID;
							$gioi_tinh=lay_gia_tri_postmeta($result->ID,"gioi_tinh");
							$ho_ten=lay_gia_tri_postmeta($result->ID,"ho_ten");
							$dien_thoai=lay_gia_tri_postmeta($result->ID,"dien_thoai");
							$tinh=lay_gia_tri_postmeta($result->ID,"tinh");
							$quan_huyen=lay_gia_tri_postmeta($result->ID,"quan_huyen");
							$phuong_xa=lay_gia_tri_postmeta($result->ID,"phuong_xa");
							$dia_chi=lay_gia_tri_postmeta($result->ID,"dia_chi");
							$dia_chi=lay_gia_tri_postmeta($result->ID,"dia_chi");
							$mac_dinh=lay_gia_tri_postmeta($result->ID,"mac_dinh");
							
							$name_tinh=lay_name_tinh($tinh);
							$name_quan=lay_name_quan($quan_huyen);
							$name_phuong=lay_name_phuong($phuong_xa);
							if($name_phuong!="")
							{
								$name_phuong=' , '.$name_phuong;
							}
							if($name_quan!="")
							{
								$name_quan=' , '.$name_quan;
							}
							$dia_chi_korea=lay_gia_tri_postmeta($result->ID,"dia_chi_korea"); 
						 
							$ten_dia_chi=$dia_chi;
							if(lay_gia_tri_postmeta($result->ID,"mac_dinh")!="on")
							{
								?>
								<div class="address">
									<div class="cfield"> <b><?php echo $ho_ten?></b></div>
									<div class="cfield"><?php echo  $ten_dia_chi?></div>
									<div class="cfield"><?php echo $dien_thoai ?></div>
									<div class="cfield"></div>
									<div class="cfield">
										<a title="Sửa địa chỉ" href="?page_id=<?php echo $page_them_dia_chi?>&task=sua&id=<?php echo $id_post?>"><?php echo $lang_sua_dia_chi?></a>
										<span class="saparator">|</span>
										<a title="<?php echo $lang_xoa?>" href="?page_id=<?php echo $page_them_dia_chi?>&task=xoa&id=<?php echo $id_post?>"><?php echo $lang_xoa?></a>
									</div>
								</div>
								<?php 
							}
							}
						?>
                    	
						
						
						
											</td>
										</tr>
										 
								   </tbody></table>
					<?php 
				}
				else
				{
		   ?>
            <table width="100%" cellspacing="0" cellpadding="0" class="ordertable">
                <tbody><tr>
                	<th width="50%" align="left">
                    	Thông tin liên hệ
                        <a title="Thay đổi" href="<?php echo get_permalink($page_sua_tai_khoan)?>" class="more">Thay đổi</a>
                    </th>
                    <th align="left">Địa chỉ giao hàng mặc định
                        <a href="<?php echo get_permalink($page_so_dia_chi)?>" class="more">Sổ địa chỉ</a>
                    </th>
                </tr>
                <tr>
                	<td valign="top">
           				<div class="cfield"> <b><?php echo $name_login?></b></div>
			           	<div class="cfield"><?php echo $email?></div>
                        <div class="cfield">
                        	<a title="Sửa mật khẩu" href="<?php echo get_permalink($page_sua_tai_khoan)?>&task=edit_password">Sửa mật khẩu</a>
                        </div>
                    </td>
                	<td>
                    	<div style="display:none">
           				<div class="cfield"></div>
			           	<div class="cfield"></div>
                        <div class="cfield"></div>
                        <div class="cfield"></div>
                        <div class="cfield">
                        	<a title="Sửa địa chỉ" href="<?php echo get_permalink($page_so_dia_chi)?>">Sửa địa chỉ</a>
                        </div>
                        </div>
                    </td>
                </tr>
           </tbody>
		   </table>
		   <?php 
				}
		   ?>
        </div>