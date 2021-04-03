<?php 
//kich hoat mail
if(isset($_REQUEST["uid"]))
{
		$userid=$_REQUEST['uid'];
		$keyactive=$_REQUEST['key'];
		if($userid == '')
		{
		   wp_redirect('?page_id='.$page_thong_bao.'&flag=4');
		  // $//flag=4;//tài khoan kkhong xac thuc
		}
		if($keyactive == '')
		{
		 
		    wp_redirect('?page_id='.$page_thong_bao.'&flag=4');
		}
		else
		{
			if(check_user_active($userid,$keyactive))
			{
				$usermeta=get_usermeta($userid,'active_key');
				if ($usermeta !='')
				{
					if (delete_usermeta($userid, 'active_key')) 
						{
							//$flag=5;//thanh cong
							  wp_redirect('?page_id='.$page_thong_bao.'&flag=5');
						} 
					else 
						{
							//wp_redirect('?page_id=49&flag=8');// that bai admin support
						}
					
				}
				else
				{
					//wp_redirect('?page_id=49&flag=9'); //da kich hoat roi
					//$flag=5;
					  wp_redirect('?page_id='.$page_thong_bao.'&flag=5');
				}
				
				

			}
			else
			{
				$usermeta=get_usermeta($userid,'active_key');
				if ($usermeta !='')
				{
					//wp_redirect('?page_id=49&flag=10'); // tk ko xac thuc
					//$flag=4;
					  wp_redirect('?page_id='.$page_thong_bao.'&flag=4');
				}
				else
				{
				   // $flag=5;
					//wp_redirect('?page_id=49&flag=9');
					  wp_redirect('?page_id='.$page_thong_bao.'&flag=5');
				}
			}
		}
}
//
  if(isset($_REQUEST["flag"]))
  {
    $flag=$_REQUEST["flag"];
	if($lang=="vi")
	{
		if($flag==1)
		{
		   $tieude="Đăng ký thành công";
		   $noidung="Chúng tôi đã gửi Email thông tin tài khoản đến email của bạn ! ";
		}
		if($flag==2)
		{
		   $tieude="Đăng ký thất bại";
		   $noidung="<div class='dk_err'> Vì lý do kỹ thuật đăng ký thất bại <br/> Xin vui lòng thử lại sau !</div>   ";
		}
		if($flag==3)
		{
		   $tieude="Tài khoản chưa kích hoạt";
		   $noidung="Chúng tôi đã gưi thư xác nhận đến hộp mail của bạn, 
		   vui lòng <font style='color:#ff0006'>Kiểm tra email để kích hoạt tài khoản</font>   ";
		}
		if($flag==4)
		{
		   $tieude="Tài khoản không xác thực";
		   $noidung="<font style='color:#ff0006'>Kích hoạt thất bại,tài khaorn không xác thực</font>   ";
		}
		if($flag==5)
		{
		   $tieude="Tài khoản đã kích hoạt";
		   $noidung="Tài khoản của bạn đã được kích hoạt    ";
		}
		if($flag==6)
		{
		   $tieude="Tài khoản đã kích hoạt";
		   $noidung="Tài khoản của bạn đã được kích hoạt    ";
		}
		if($flag==7)
		{
		   $tieude="Đã cập nhật tài khoản";
		   $noidung="Bạn đã cập nhật tài khoản thành công ";
		}
		if($flag==8)
		{
		   $tieude="Cập nhật tài khoản thất bại";
		   $noidung="<font style='color:#ff0006'>Vì lý do kỹ thuật cập nhật tài khoản thất bại <br/> Xin vui lòng thử lại sau ít phút</font>";
		}
		if($flag==9)
		{
		   $tieude="Chưa đăng nhập tài khoản";
		   $noidung="<font style='color:#ff0006'>Vui lòng đăng nhập để sử dụng chức năng này</font>";
		}
		if($flag==10)
		{
		   $tieude="Đã gửi đơn đặt  hàng";
		   $noidung="Đơn đặt hàng của bạn đã gửi đến chúng tôi.<br/> Chúng tôi sẽ liên lạc với bạn trong thời gian sớm nhất
		   
		   
		   ";
		}
		if($flag==12)
		{
		   $tieude="Giỏ hàng chưa có sản phẩm ";
		   $noidung="Hiện tại bạn chưa mua sản phẩm nào !";
		}
		if($flag==13)
		{
		   $tieude="Đã gửi thư thành công";
		   $noidung="Cảm ơn bạn đã gửi thông tin đến chúng tôi! <br/>Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất";
		}
		if($flag==14)
		{
		   $tieude="Đã gửi thư thành công";
		   $noidung="Cảm ơn bạn đã gửi thông tin đến chúng tôi! ";
		}
		if($flag==15)
		{
		   $tieude="Chưa đăng nhập";
		   $noidung="Vui lòng đăng nhập để xử dụng chức năng này! ";
		}
		if($flag==16)
		{
		   $tieude="Đổi thông tin thành công";
		   $noidung="Bạn đã thay đổi thông tin thành công! ";
		}
		if($flag==17)
		{
		   $tieude="Đăng nhập thành công";
		   $noidung="Quý khách đã đăng nhập thành công vào hệ thống";
		}
		if($flag==18)
		{
		   $tieude="Đăng nhập thất bại";
		   $noidung="Tài khoản của quý khách không chính xác";
		}
		if($flag==19)
		{
		   $tieude="Đăng xuất thành công";
		   $noidung="Cảm ơn quý khách đã sử dụng dịch vụ của chúng tôi";
		}
		if($flag==20)
		{
		   $tieude="Email không chính xác";
		   $noidung="Vui lòng kiếm tra lại Email !";
		}
		if($flag==21)
		{
		   $tieude="Đổi thông tin thất bại";
		   $noidung="Mã xác nhận không chính xác!";
		}
		if($flag==22)
		{
		   $tieude="Cập nhật tài khoản thành công";
		   $noidung="Chúng tôi đã gửi thư xác nhận đến hộp mail của bạn, 
		   vui lòng <font style='color:#ff0006'>Kiểm tra email để reset tài khoản</font>   ";
		}
		if($flag==23)
		{
		   $tieude="Đăng ký không thành công ";
		   $noidung=" Email đã được sử dụng  ";
		}
		
	}
	else 
	{
	   if($flag == 1)
{
$tieude= "Registration Success";
$noidung = "We have sent account information to your email!";
}
if($flag == 2)
{
$tieude= "Registration failed";
$noidung = '<div class =" ​​dk_err "> For technical reasons Registry failed <br/> Please try again! </ Div>';
}
if($flag == 3)
{
$tieude= "Account not active";
$noidung = 'We have sent a confirmation mail to your mail box,
please <font style = "color: # ff0006"> Check your email to activate your account </ font> ';
}
if($flag == 4)
{
$tieude= "No account validation";
$noidung = '<font style =" color: # ff0006 "> Activation fails, the account is not authenticated </ font>';
}
if($flag == 5)
{
$tieude= "Verified Account";
$noidung = "Your account has been activated ";
}
if($flag == 6)
{
$tieude= "Verified Account";
$noidung = "Your account has been activated";
}
if($flag == 7)
{
$tieude= "Renewed account";
$noidung = "You have successfully updated your account";
}
if($flag == 8)
{
$tieude= "Account Update failed";
$noidung = '<font style =" color: # ff0006 "> For technical reasons account update failed <br/> Please try again in a few minutes </ font>';
}
if($flag == 9)
{
$tieude= "No login account";
$noidung = '<font style =" color: # ff0006 "> Please log in to use this feature </ font>';
}
if($flag == 10)
{
$tieude= "Sent orders";
$noidung = "Your order has been sent to us. <br/> We will contact you !";
}
if($flag == 12)
{
$tieude= "Cart no products";
$noidung = "Currently you have not purchased the product yet!";
}
if($flag == 13)
{
$tieude= "Message sent successfully";
$noidung = "Thank you for submitting your information to us! <br/> We will contact you as soon as possible";
}
if($flag == 14)
{
$tieude= "Message sent successfully";
$noidung = "Thank you for submitting your information to us!";
}
if($flag == 15)
{
$tieude= "Not logged in";
$noidung = "Please log in to use this feature!";
}
if($flag == 16)
{
$tieude= "Change successful information";
$noidung = "You have changed the information successfully!";
}
if($flag == 17)
{
$tieude= "Login successful";
$noidung = "You have successfully logged into the system";
}
if($flag == 18)
{
$tieude= "Login failed";
$noidung = "Your account is not correct";
}
if($flag == 19)
{
$tieude= "Logout successful";
$noidung = "Thank you for using our services";
}
if($flag == 20)
{
$tieude= "Email is not correct";
$noidung = "Please check the email!";
}
if($flag == 21)
{
$tieude= "Change the information failure";
$noidung = "incorrect confirmation code!";
}
if($flag == 22)
{
$tieude= "Account Update successful";
$noidung = 'We have sent a confirmation mail to your mail box,
please <font style = "color: # ff0006"> Check your email to reset the account </ font> ';
}
    }	
  }
?>
<div class="form">
					   <div class="form_header">
					       <h3><?php echo($tieude)?></h3>
						</div>
					   <div class="form_body">
						     <div class="thong_bao">
							    <?php echo($noidung)?>
							 </div>
						 </div>					
					   <div class="form_footer"></div> 					   
			</div> 
