<?php 
/**
*   Template Name: Template page_lien_he
* 
* @package ITGREEN Ho Chi Minh
*
*/
?>
<?php 
	include("header.php");
	
if(isset($_REQUEST["bt_gui"]))
{
	$ten=$_REQUEST["txt-name"];
	$email=$_REQUEST["txt-email"];
	$sdt=$_REQUEST["txt-tel"];
	$noidung=$_REQUEST["txt-message"];
 
	

	$today = date("j/n/Y"); 
	$html="<b>Người gửi :</b> :".$ten."<br/>";
	$html.="<b>Ngày gửi :</b> :".$today."<br/>";	
	$html.="<b>Số điện thoại :</b> :".$sdt."<br/>";	
	$html.="<b>Email :</b> ".$email."<br/>";
	$html.="<b>Nội dung :</b> ".$noidung."<br/>";
	
	$html="Tên:".$ten.'<br>'. 	"Email:".$email.'<br>'.		"sdt:".$sdt.'<br>'.		"Nội dung:".$noidung ;
	$my_post = array(
	'post_title'    => 'Liên hệ',
	'post_content'  => $html,
	'post_status'   => 'private', 
	'post_type'     => 'kh-lien-he',
	);
	wp_insert_post( $my_post );
	$headers = 'From : '. $email . "\r\n" .
	'Reply-To: '. $email . "\r\n" .
	'X-Mailer: PHP/' . phpversion();
	$headers .= 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";	
 	
	wp_mail("sales@dtstelecom.com.vn","Thông tin liên hệ từ website", $html,$headers);		 
	
	wp_redirect(get_permalink($page_lien_he) );
}
?>
 
 
 
<body>
 
 	<?php 
	include("module/mod_head.php");
	?>
    <section class="page-title">
    	<div class="auto-container", align="center", style="color:#FFFFFF">
        	<h1><?php echo $lang_lien_he?></h1>
        </div>
    </section>
    <!--Main Slider-->
    <section class="main-banner1 tr_contact container">
    	<div class=" clearfix   ">
        	 
            	  	<div class="row-fluid" style="height:420px;">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.4295063817453!2d106.68347685074538!3d10.778379192282564!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f4cac4849b5%3A0x598e217d3cc00978!2sC%C3%B4ng%20ty%20TNHH%20DTS%20Telecom!5e0!3m2!1sen!2sus!4v1616128206925!5m2!1sen!2sus" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>				
										
										</div>
										<div class="clear"></div>
									</div> 		
									
									 	<article class="clearfix content-contact"> 
									  									
									<div class="clear"></div>
									<div class="row-fluid">
										<div class="column_container">
											<header class="sectionTitle clearfix">
													<h3><strong><?php echo $lang_lien_he?></strong></h3>
											</header> 
											<section class="rbText clearfix autop" style="line-height:20px">		
                                               <h3><strong><?php echo $ten_cong_ty?></strong></h3>
													
											
								<?php echo $thong_tin  ?>
									 
												
											 
											</section> 
										</div>  
										
										<div class="column_container form">
											<header class="sectionTitle clearfix con-none">
													<h2><strong><?php echo $lang_gui_thong_tin_lien_he?></strong></h2>
													
											</header> 
											<section class="rbForm full autop">
												<form method="POST">
													<div class="column_container2 span4">
														<label for="name"><?php echo $lang_ho_ten?></label>
														<input type="text" id="txt-name" name="txt-name" class="name" required>
													</div>
													<div class="column_container2 span4">
														<label for="email">Email</label>
														<input type="email" id="txt-email" name="txt-email" class="email" required>
													</div>
													<div class="column_container2 span4">
														<label for="tel"><?php echo $lang_dien_thoai?></label>
														<input type="text" id="txt-tel"  name="txt-tel" class="tel" required>
													</div>
													<div class="column_container2 span12">
														<label for="message"><?php echo $lang_noi_dung?> </label>
														<textarea type="text" id="txt-message" name="txt-message" class="message" required></textarea>
													</div>													
													<div class="column_container2 span12">
														<input type="submit" class="submit1" name="bt_gui" value="<?php echo $lang_gui?>" >
													</div>
												</form>
											</section> 
										</div> 
									</div>
									
								</article>	
					

	   </div>
    </section>
    <!--End Main Slider-->
    
    <?php 
		include("footer.php");
	?>
</body>
</html>