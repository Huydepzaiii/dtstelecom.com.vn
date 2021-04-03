<div id="banner-st">
<img src="<?php echo plugins_url("/images/banner-strawbarry-jam.png", __FILE__);?>" />
</div>
<div class="wrap postbox">
<h3><span><strong>News Jam Plugin General Option</strong></span></h3>
<?php
    if(!isset($_REQUEST['act']))
    {
        $newsjam_opts =newsjam_getall_data();
?>
<form method="post" action="">
    <?php //settings_fields( 'newsjam-settings-group' );?>
    <div class="jamnews-topm-block">
        <div class="jamnews-topm-cls">
            <li class="title">Name Post Type</li>
            <li class="title">Custom Post Type</li>
            <li class="title">Include</li>
            <li class="title" style="width: 80px;">Action</li>
            <li class="title">Taxonomy</li>
        </div>
        <div style="clear: both;"></div>
<?php
        if(is_array($newsjam_opts))
        {
            foreach($newsjam_opts as $newsjam_opt)
            {
                $editor=$newsjam_opt->editor;
                $excerpt=$newsjam_opt->excerpt;
                $thumnail=$newsjam_opt->thumnail;
                $comment=$newsjam_opt->comment;
                $author=$newsjam_opt->author;
                if($editor == 'on')
                {
                    $editor=" editor |";
                }
                if($excerpt == 'on')
                {
                    $excerpt=" excerpt |";
                }
                if($thumnail == 'on')
                {
                    $thumnail=" thumbnail |";
                }
                if($comment == 'on')
                {
                    $comment=" comments |";
                }
                if($author == 'on')
                {
                    $author=" author |";
                }
                $str_type=$editor.$excerpt.$thumnail.$comment.$author;
                $str_term='';
                for($d=1;$d<=9;$d++)
                {
                    $khoa_type='taxonomy-type'.$d;
                    $term_slug=newsjam_get_relate_data($newsjam_opt->id,$khoa_type);
                    if($term_slug[0]->giatri !='')
                    {
                        $str_term.=' | '.$term_slug[0]->giatri;
                    }
                }
                $str_term=substr($str_term,3);
?>
        <div class="jamnews-topm-cls">
            <li><?php echo $newsjam_opt->name;?></li>
            <li><?php echo $newsjam_opt->custom_type;?></li>
            <li>title |<?php echo $str_type;?></li>
            <li style="width: 80px;"><a href="admin.php?page=jamnews-top-level-handle&act=delete&id=<?php echo $newsjam_opt->id;?>">delete</a></li>
        </div>
        <div class="jamnews-topm-cls">
            <li><span><?php echo $str_term?></span></li>
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
                <strong>Name Post Type</strong>
            </td>
            <td>
                <strong>Custom Post Type</strong>
            </td>
        </tr>
        <tr valign="top">
            <td>
                <input type="text" name="name_custom" size="40" />
            </td>
            <td>
                <input type="text" name="type_custom" size="40"/>
            </td>
        </tr>
        <tr valign="top">
            <td colspan="2">
                <input type="checkbox" name="editor"/>
                <label>Editor</label>
            </td>
        </tr>
        <tr valign="top">
            <td colspan="2">
                <input type="checkbox" name="excerpt"/>
                <label>Excerpt</label>
            </td>
        </tr>
        <tr valign="top">
            <td colspan="2">
                <input type="checkbox" name="thumnail"/>
                <label>Thumnail</label>
            </td>
        </tr>
        <tr valign="top">
            <td colspan="2">
                <input type="checkbox" name="author"/>
                <label>Author</label>
            </td>
        </tr>
        <tr valign="top">
            <td colspan="2">
                <input type="checkbox" name="comments"/>
                <label>Comments</label>
            </td>
        </tr>
    </table>
    <p class="submit" style="margin: 0;padding:0;">
    <input type="hidden" name="page" value="jamnews-top-level-handle" />
    <input type="hidden" name="act" value="insert" />
    <input type="submit" class="button-primary" value="<?php _e('Creat New') ?>" />
    <input type="button" onclick=" return backup_db('<?php echo plugins_url("/jamnews-backup.php", __FILE__)?>');" class="button-primary" value="<?php _e('Backup Database') ?>" />
    </p>
</form>
<?php
    }
    elseif($_REQUEST['act']== 'insert')
    {
        $name_custom=$_REQUEST['name_custom'];
        $type_custom=$_REQUEST['type_custom'];
        $editor=$_REQUEST['editor'];
        $excerpt=$_REQUEST['excerpt'];
        $thumnail=$_REQUEST['thumnail'];
        $author=$_REQUEST['author'];
        $comments=$_REQUEST['comments'];
        $optionID=newsjam_isert_data($name_custom,$type_custom,$editor,$excerpt,$thumnail,$author,$comments);
        if ($optionID)
        {
            //wp_redirect('admin.php?page=jamnews-top-level-handle&noheader=true');
            echo '<script type="text/javascript">
            window.location = "admin.php?page=jamnews-top-level-handle";
            </script>';
        }
    }
    elseif($_REQUEST['act']== 'delete')
    {
        $optionID=$_REQUEST['id'];
        $result=newsjam_delete_data($optionID);
        //print_r($result);
        if ($result>0)
        {
            newsjam_relate_delete_data($optionID);
            //wp_redirect('admin.php?page=jamnews-top-level-handle&noheader=true');
            echo '<script type="text/javascript">window.location = "admin.php?page=jamnews-top-level-handle"; </script>';
        }
    }
?>
</div>