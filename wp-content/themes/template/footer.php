 <footer class="main-footer">
 	<div class="auto-container">
 		<div class="widgets-section">
 			<div class="row clearfix"> 
 				<div class="big-column col-lg-12 col-md-12 col-sm-12">
 					<div class="row clearfix">  
 						<div class="footer-column col-lg-4 col-md-6 col-sm-12">
 							<div class="footer-widget info-widget">
 								<h2><?php echo $lang_tru_so_chinh ?></h2>
 								<ul class="list-style-two">
 									<li><span class="icon flaticon-placeholder-2"></span>
 										<b><?php echo $dia_chi ?></b></li>
 									<li><span class="icon flaticon-letter"></span>sales@dtstelecom.com.vn</li>
 									<li><a href="tel:+84963087773"><span class="icon flaticon-smartphone-1"></span>+84 2839336868
</li>
<li><a href="tel:+84963087773"><span class="icon flaticon-pdf"></span>Fax: +84 2839306889

</li>
 								</ul>
 								<div class="bo_cong_thuong">
 									<a href="http://online.gov.vn/CustomWebsiteDisplay.aspx?DocId=55148"><img src="https://dtstelecom.com.vn/wp-content/uploads/2019/05/dathongbao-e1558933035839.png" /></a>
			</div>
 							</div>
 						</div>
 						<div class="footer-column col-lg-4 col-md-6 col-sm-12">
 							<div class="footer-widget info-widget">
 								<h2><?php echo $lang_trung_tam_ho_tro ?></h2>
 								<ul class="list-style-two">

 									<li><span class="icon flaticon-letter"></span>noc@dtstelecom.com.vn</li>
 									<li><a href=""><span class="icon flaticon-smartphone-1"></span>1800558820
</a></li>

 								</ul>
 							</div>
 						</div>



 						<div class="footer-column col-lg-4 col-md-6 col-sm-12">
 							<div class="footer-widget info-widget">
 								<h2><?php echo $lang_ket_noi_voi_chung_toi ?></h2>
									<ul class="list-style-two">
 									<li><span class="icon flaticon-placeholder-2"></span>
 										<b>Phòng kinh doanh và hỗ trợ khách hàng</b><br/>
										Tel: +84 2839336868  <br/>
										Email: sales@dtstelecom.com.vn <br/>
									</li>	
									<li><span class="icon flaticon-placeholder-2"></span>
 										<b>Trung tâm khai thác và vận hành mạng NOC</b><br/>
										Tel: 1800558820  <br/>
										Email: noc@dtstelecom.com.vn  <br/>
									</li>	
									</ul>
							</div>
 						</div>





 						<!--Footer Column-->


 					</div>
 				</div>

 				<!--Big Column-->


 			</div>
 		</div>

 	</div>

 	<!--Footer Bottom-->
 	<div class="footer-bottom">
 		<div class="auto-container">
 			<div class="clearfix umt_company">
 				<div class="umt_company_head">
 					<div class="copyright">© CÔNG TY TNHH DTS TELECOM
 | MST: 0316540932
 | Hotline : 1800558820
 | sales@dtstelecom.com.vn</div>

 				</div>
 				<div class="umt_company_bottom" , font size="8">
 					<ul class="social-icon-one">
 						<?php
							$ketqua = get_all_post_with_name_custom_post("ho-tro-kh", "menu_order asc", 0, 6);
							foreach ($ketqua as $result) {
								$name = $result->post_title;
								$name = qtranxf_use($lang, $name, false);

								$id_post = $result->ID;
								$link = get_permalink($result->ID);


							?>
 							<li><a href="<?php echo $link ?>"><?php echo $name  ?></a></li>
 						<?php
							}
							?>
 					</ul>
 				</div>
 			</div>
 		</div>
 	</div>

 </footer>
 <!--End Main Footer-->

 </div>
 <!--End pagewrapper-->

 <!--Scroll to top-->


 <script src="<?php bloginfo('template_directory'); ?>/js/jquery.js"></script>
 <script src="<?php bloginfo('template_directory'); ?>/js/popper.min.js"></script>
 <script src="<?php bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>
 <script src="<?php bloginfo('template_directory'); ?>/js/jquery.fancybox.js"></script>
 <script src="<?php bloginfo('template_directory'); ?>/js/jquery-ui.js"></script>
 <script src="<?php bloginfo('template_directory'); ?>/js/owl.js"></script>
 <script src="<?php bloginfo('template_directory'); ?>/js/wow.js"></script>
 <script src="<?php bloginfo('template_directory'); ?>/js/appear.js"></script>
 <script src="<?php bloginfo('template_directory'); ?>/js/script.js"></script>

 <script src="<?php bloginfo('template_directory'); ?>/js/nivo_repo/jquery.min.js"></script>
 <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/nivo_repo/jquery.nivo.slider.js"></script>
 <script type="text/javascript">
 	jQuery.noConflict()(function($) {
 		$(window).ready(function() {
 			$('.mt_slide').nivoSlider({
 				pauseTime: 5000,
 			});

 		});
 	});
 </script>

  