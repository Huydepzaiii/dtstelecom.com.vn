 <div id="module_customerMenu" class="block">
	<h2><?php echo $lang_tk_cua_ban?></h2>
	<div class="blockcontent">
    	<ul>
        	<li <?php if(is_page($page_quan_ly_tai_khoan)) echo 'class="bold"' ?>><a href="<?php echo get_permalink($page_quan_ly_tai_khoan);?>"><?php echo $lang_quan_ly_tk?></a></li>
			<li <?php if(is_page($page_sua_tai_khoan)) echo 'class="bold"' ?>><a href="<?php echo get_permalink($page_sua_tai_khoan);?>"><?php echo $lang_thong_tin_tk?></a></li>
       
             
            <li <?php if(is_page($page_quan_ly_don_hang)) echo 'class="bold"' ?>><a href="<?php echo get_permalink($page_quan_ly_don_hang);?>"><?php echo $lang_don_hang_cua_toi?></a></li> 
          
             <li ><a href="index.php?&task=logout"><?php echo $lang_dang_xuat?></a></li> 
                    
        </ul>    
    </div>
</div>