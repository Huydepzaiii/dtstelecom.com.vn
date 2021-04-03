<div class="page-wrapper">  
    <header class="main-header"> 
    	<div class="header-top">
        	<div class="auto-container">
            	<div class="inner-container clearfix">
                    
                    <!--Top Left-->
                    <div class="top-right">
                        <div class="language dropdownn"><a class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" href="#">
						<span class="icon fa fa-globe"></span>
						<?php 
							if($lang=="vi")
							{
								$name="Việt Nam";
							}
							else {
								$name="English";
							}
						?>
						&nbsp;<?php echo $name?></a>
                            <ul class="dropdown-menu style-one" aria-labelledby="dropdownMenu1">
                               <?php echo mwo_qtrans_language_flags_menu();?>
                               
                            </ul>
                        </div>
                    	<ul class="links clearfix">
                            <li><a href="tel:+1800558820
"><span class="icon fa fa-headphones"></span>Support : 1800558820
</a></li>
                        </ul>
                    </div>
                    
                    <!--Top Right-->
                    <div class="top-left clearfix">
                    	<!--social-icon-->
                        <div class="social-icon">
                        	<ul class="clearfix">
                            	<li><a href="<?php echo $fanpage ?>"><span class="fa fa-facebook"></span></a></li>
                                <li><a href="https://www.pinterest.com/channeldtstelecom/"><span class="fa fa-pinterest-p"></span></a></li>
                                </ul>
                        </div>
                    </div>
                    
                </div>
                
            </div>
        </div>
        <!-- Header Top End -->
        
        <!-- Main Box -->
    	<div class="main-box">
        	<div class="auto-container">
            	<div class="outer-container clearfix">
                    <!--Logo Box-->
                    <div class="logo-box">
                        <div class="logo"><a href="<?php echo home_url()?>"><img src="<?php echo $logo ?>" alt=""></a></div>
                    </div>
                    
                    <!--Nav Outer-->
                    <div class="nav-outer clearfix">
                    
                        <!-- Main Menu -->
                        <nav class="main-menu navbar-expand-md">
                            <div class="navbar-header">
                                <!-- Toggle Button -->    	
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            
                            <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                                <ul class="navigation">
                                    <li class="current"><a href="<?php echo home_url();?>"><?php echo $lang_trang_chu?></a> </li>
                                    <?php 
										echo $list_danh_muc=get_list_taxonomy("danh-muc",0,0);
									?>
                                    <li><a href="<?php echo get_permalink($page_lien_he)?>"><?php echo $lang_lien_he?></a></li>
                                 </ul>
                            </div>
                        </nav>
                        <!-- Main Menu End-->
                        <div class="outer-box">
                         
                        </div>
                    </div>
                    <!--Nav Outer End-->
                    
            	</div>    
            </div>
        </div>
    
    	<!--Sticky Header-->
        <div class="sticky-header">
            <div class="auto-container clearfix">
                <!--Logo-->
                <div class="logo pull-left">
                    <a href="<?php echo home_url()?>" class="img-responsive" title="DTS TELECOM"><img src="<?php echo $logo ?>" alt="DTS TELECOM" title="DTS TELECOM"></a>
                </div>
                
                <!--Right Col-->
                <div class="right-col pull-right">
                    <!-- Main Menu -->
                    <nav class="main-menu navbar-expand-md">
                        <button class="button navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                          <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                            <ul class="navigation navbar-nav default-hover">
                                <li class="current"><a href="<?php echo home_url()?>"><?php echo $lang_trang_chu?></a>
                                    
                                </li> 
                                 <?php 
										echo $list_danh_muc;
									?>
                                    <li><a href="<?php echo get_permalink($page_lien_he)?>"><?php echo $lang_lien_he?></a></li>
                            </ul>
                          </div>
                    </nav>
                    <!-- Main Menu End-->
                </div>
                
            </div>
        </div>
        <!--End Sticky Header-->
    
    </header>
    <!--End Main Header -->
    