<?php
    if(isset($_REQUEST['act']))
    {
        if($_REQUEST['act'] == 'insert')
        {
            $name_size=$_REQUEST['name_size'];
            $width_size=$_REQUEST['width_resize'];
            $height_size=$_REQUEST['height_resize'];
            $crop=$_REQUEST['crop'];
            $images_size=$name_size.':'.$width_size.':'.$height_size.':'.$crop;
            $custom_post_type=$_REQUEST['type_custom'];
            $images_sizeID=newsjam_isert_relate_data($custom_post_type,'images-size',$images_size);
            if ($optionID)
            {
            //wp_redirect('admin.php?page=jamnews-top-level-handle&noheader=true');
            echo '<script type="text/javascript">
            window.location = "admin.php?page=images-size";
            </script>';
            }
        }
        if($_REQUEST['act'] == 'delete')
        {
            $resizeID=$_REQUEST['id'];
            $result=newsjam_delete_relate_data_byid($resizeID);
            //print_r($result);
            echo '<script type="text/javascript">
            window.location = "admin.php?page=images-size";
            </script>';
        }
    }
?>
<div id="banner-st">
<img src="<?php echo plugins_url("/images/banner-strawbarry-jam.png", __FILE__);?>" />
</div>
<div class="wrap postbox">
<h3><span><strong>News Jam Plugin Images resize</strong></span></h3>
<form method="post" action="">
    <div class="jamnews-topm-block">
        <div class="jamnews-topm-cls">
            <li class="title">Name size</li>
            <li class="title">Custom Post Type</li>
            <li class="title">Include</li>
            <li class="title">Action</li>
        </div>        
        <div style="clear: both;"></div>
<?php
        $size_array=newsjam_getall_relate_data_bykhoa('images-size');
        if(is_array($size_array))
        {
            foreach($size_array as $sizes)
            {
                list($name_size, $width_size, $height_size, $crop) = explode(":", $sizes->giatri);
                if($crop != '')
                {
                    $crop='(crop)';
                }
                $custom_post_type = get_option_by_id($sizes->option_id);
?>
        <div class="jamnews-topm-cls">
            <li><?php echo $name_size?></li>
            <li><?php echo $custom_post_type[0]->name;?></li>
            <li><?php echo $width_size?>x<?php echo $height_size;echo $crop;?></li>
            <li><a href="admin.php?page=images-size&act=delete&id=<?php echo $sizes->id;?>">delete</a></li>
        </div>
        <div style="clear: both;"></div>
<?php
            }
        }
?>        
    </div>
    <table>
        <tr valign="top">
            <td>
                <strong>Name size</strong>
            </td>
            <td>
                <strong>Max width (px)</strong>
            </td>
            <td>
                <strong>Max height (px)</strong>
            </td>
            <td>
                <strong>Custom Post Type</strong>
            </td>
        </tr>
        <tr valign="top">
            <td>
                <input type="text" name="name_size" size="40" />
            </td>
            <td>
                <input type="text" name="width_resize" size="40" />
            </td>
            <td>
                <input type="text" name="height_resize" size="40" />
            </td>
            <td>            
                <select name="type_custom" style="width: 200px;">
                    <option value="0">Chọn custom post type</option>
<?php
            $newsjam_opts =newsjam_getall_data();
            foreach($newsjam_opts as $newsjam_opt)
            {
?>                
                    <option value="<?php echo $newsjam_opt->id?>"> <?php echo $newsjam_opt->name;?></option>
<?php
            }
?>
                </select>
            </td>
        </tr>
        <tr valign="top">
            <td colspan="4">
                <input type="checkbox" name="crop"/>
                <label>Crop</label>
            </td>
        </tr>
        <tr>
            <td colspan="4"><font style="color: #C10101;font-style:italic">Chú ý: </font><font style="color: #666;font-style:italic">Không chọn Name size = thumbnail,medium,large,full...(các tên mặc định của wordpress)</font></td>
        </tr>
    </table>
    <p class="submit" style="margin: 0;padding:0;">
    <input type="hidden" name="page" value="images-size" />
    <input type="hidden" name="act" value="insert" />
    <input type="submit" class="button-primary" value="<?php _e('Creat New') ?>" />
    </p>
</form>
</div>