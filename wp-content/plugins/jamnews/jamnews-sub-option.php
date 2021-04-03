<?php
$option=get_option_by_type($_REQUEST['page']);
?>
<div id="banner-st">
<img src="<?php echo plugins_url("/images/banner-strawbarry-jam.png", __FILE__);?>" />
</div>
<?php
if(!isset($_REQUEST['action']))
{
?>
<div class="wrap postbox">
<h3><span>Custom Post Type: <strong><?php echo $option[0]->name;?></strong></span></h3>    
<form method="post" action="">    
    <div class="taxonomy-block">
        <li class="label">&nbsp;</li>
        <li class="label">Name Taxonomy</li>
        <li class="label">Type Taxonomy</li>
    </div>
    <div style="clear: both;"></div>
<?php
    if(!isset($_REQUEST['act']))
    {
    for($i=1;$i<=9;$i++)
    {
        $giatri_name='';
        $giatri_type='';
        $khoa_name='taxonomy-name'.$i;
        $khoa_type='taxonomy-type'.$i;
        $giatri_name=newsjam_get_relate_data($option[0]->id,$khoa_name);
        $giatri_type=newsjam_get_relate_data($option[0]->id,$khoa_type);
?>
    <div class="taxonomy-block">
        <li class="title">Taxonomy <?php echo $i;?>:</li>
        <li><input type="text" name="<?php echo $khoa_name;?>" value="<?php echo $giatri_name[0]->giatri;?>" /></li>
        <li><input type="text" name="<?php echo $khoa_type;?>" value="<?php echo $giatri_type[0]->giatri;?>" /></li>
<?php        
        if($giatri_name[0]->giatri !='')
        {
            $term_option_id=get_option_term_id($giatri_type[0]->giatri);
    
?>
        <li>            
            <a href="?page=<?php echo $_REQUEST['page']?>&term=<?php echo $giatri_type[0]->giatri?>&action=edit_term">Add Field</a>
<?php
            $str_span='';
            for( $t=1;$t<=30;$t++)
            {                
                $key_term_field_name='field_term_'.$term_option_id[0]->id.'_name'.$t;
                $giatri_term_field_name=newsjam_get_relate_data($option[0]->id,$key_term_field_name);
                if($giatri_term_field_name[0]->giatri !='')
                {
                    $str_span.= ','.$giatri_term_field_name[0]->giatri;
                }
            }
                $str_span=substr($str_span,1);
?>            
            <span>( <?php echo $str_span;?> )</span>
        </li>
<?php            
        }
?>        
    </div>
    <div style="clear: both;"></div>
<?php
    }
?>
    <hr />
    <p class="submit">
    <input type="hidden" name="act" value="save" />
    <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>
</form>
</div>
<?php
    }
    elseif( isset($_REQUEST['act']))
    {
        if($_REQUEST['act']=='save')
        {
            for($i=1;$i<=9;$i++)
            {
                $giatri_name='';
                $giatri_type='';
                $khoa_name='taxonomy-name'.$i;
                $giatri_name=$_REQUEST['taxonomy-name'.$i];
                $khoa_type='taxonomy-type'.$i;
                $giatri_type=$_REQUEST['taxonomy-type'.$i];
                $old_name=newsjam_get_relate_data($option[0]->id,$khoa_name);
                $old_type=newsjam_get_relate_data($option[0]->id,$khoa_type);
                if(($giatri_name !='')&&($giatri_type != ''))
                {
                    if($giatri_name != $old_name[0]->giatri)
                    {
                        newsjam_delete_relate_data($option[0]->id,$khoa_name);
                        newsjam_isert_relate_data($option[0]->id,$khoa_name,$giatri_name);
                    }
                    if($giatri_type != $old_type[0]->giatri)
                    {
                        newsjam_delete_relate_data($option[0]->id,$khoa_type);
                        newsjam_isert_relate_data($option[0]->id,$khoa_type,$giatri_type);
                    }

                }
                else
                {
                    newsjam_delete_relate_data($option[0]->id,$khoa_name);
                    newsjam_delete_relate_data($option[0]->id,$khoa_type);
                }
            }
            for ($a=1;$a<=40;$a++)
            {
                $giatri_field_name='';
                $giatri_field_custom_type='';
                $giatri_field_type='';
                $giatri_field_check='';
                $giatri_field_name_post_type='';
                $giatri_field_name_taxonomy_type='';

                $khoa_field_name='field-name'.$a;
                $khoa_field_custom_type='field-custom-type'.$a;
                $khoa_field_type='field-type'.$a;
                $khoa_field_check='field-view'.$a;
                $khoa_field_name_post_type='field-name-post-type'.$a;
                $khoa_field_name_taxonomy_type='field-name-taxonomy-type'.$a;
                
                $giatri_field_name=$_REQUEST['field-name'.$a];
                $giatri_field_custom_type=$_REQUEST['field-custom-type'.$a];
                $giatri_field_type=$_REQUEST['field-type'.$a];
                $giatri_field_check=$_REQUEST['field-view'.$a];
                $giatri_field_name_post_type=$_REQUEST['field-name-post-type'.$a];
                $giatri_field_name_taxonomy_type=$_REQUEST['field-name-taxonomy-type'.$a];
                
                $old_name=newsjam_get_relate_data($option[0]->id,$khoa_field_name);
                $old_custom_type=newsjam_get_relate_data($option[0]->id,$khoa_field_custom_type);
                $old_type=newsjam_get_relate_data($option[0]->id,$khoa_field_type);
                $old_view=newsjam_get_relate_data($option[0]->id,$khoa_field_check);
                $old_name_post_type=newsjam_get_relate_data($option[0]->id,$khoa_field_name_post_type);
                $old_name_taxonomy_type=newsjam_get_relate_data($option[0]->id,$khoa_field_name_taxonomy_type);
                if(($giatri_field_name !=''))
                {
                    if($giatri_field_name != $old_name[0]->giatri)
                    {
                        newsjam_delete_relate_data($option[0]->id,$khoa_field_name);
                        newsjam_isert_relate_data($option[0]->id,$khoa_field_name,$giatri_field_name);                        
                    }
                    if($giatri_field_custom_type != $old_custom_type[0]->giatri)
                    {
                        newsjam_delete_relate_data($option[0]->id,$khoa_field_custom_type);
                        newsjam_isert_relate_data($option[0]->id,$khoa_field_custom_type,$giatri_field_custom_type);                        
                    }
                     if(($giatri_field_type != '5')&&($giatri_field_type != '8'))
                     {
                        if($giatri_field_type != $old_type[0]->giatri)
                        {
                            newsjam_delete_relate_data($option[0]->id,$khoa_field_type);
                            newsjam_isert_relate_data($option[0]->id,$khoa_field_type,$giatri_field_type);
                            newsjam_delete_relate_data($option[0]->id,$khoa_field_name_post_type);
                        }
                     }
                     else
                     {
                        if($giatri_field_type != $old_type[0]->giatri)
                        {
                            newsjam_delete_relate_data($option[0]->id,$khoa_field_type);
                            newsjam_isert_relate_data($option[0]->id,$khoa_field_type,$giatri_field_type);
                            if(($giatri_field_name_post_type !='')&&($giatri_field_name_post_type != $old_name_post_type))
                            {
                                newsjam_delete_relate_data($option[0]->id,$khoa_field_name_post_type);
                                newsjam_isert_relate_data($option[0]->id,$khoa_field_name_post_type,$giatri_field_name_post_type);
                                if($old_name_taxonomy_type != '')
                                {
                                    newsjam_delete_relate_data($option[0]->id,$khoa_field_name_taxonomy_type);
                                }
                            }
                            elseif($giatri_field_name_post_type =='')
                            {
                                newsjam_delete_relate_data($option[0]->id,$khoa_field_name_post_type);
                                if(($giatri_field_name_taxonomy_type !='')&&($giatri_field_name_taxonomy_type != $old_name_taxonomy_type))
                                {
                                    newsjam_delete_relate_data($option[0]->id,$khoa_field_name_taxonomy_type);
                                    newsjam_isert_relate_data($option[0]->id,$khoa_field_name_taxonomy_type,$giatri_field_name_taxonomy_type);
                                }
                                elseif($giatri_field_name_taxonomy_type =='')
                                {
                                    newsjam_delete_relate_data($option[0]->id,$khoa_field_name_taxonomy_type);
                                }
                            }
                        }
                        else
                        {
                            if(($giatri_field_name_post_type !='')&&($giatri_field_name_post_type != $old_name_post_type))
                            {
                                newsjam_delete_relate_data($option[0]->id,$khoa_field_name_post_type);
                                newsjam_isert_relate_data($option[0]->id,$khoa_field_name_post_type,$giatri_field_name_post_type);
                                if($old_name_taxonomy_type != '')
                                {
                                    newsjam_delete_relate_data($option[0]->id,$khoa_field_name_taxonomy_type);
                                }
                            }
                            elseif($giatri_field_name_post_type =='')
                            {
                                newsjam_delete_relate_data($option[0]->id,$khoa_field_name_post_type);
                                if(($giatri_field_name_taxonomy_type !='')&&($giatri_field_name_taxonomy_type != $old_name_taxonomy_type))
                                {
                                    newsjam_delete_relate_data($option[0]->id,$khoa_field_name_taxonomy_type);
                                    newsjam_isert_relate_data($option[0]->id,$khoa_field_name_taxonomy_type,$giatri_field_name_taxonomy_type);
                                }
                                elseif($giatri_field_name_taxonomy_type =='')
                                {
                                    newsjam_delete_relate_data($option[0]->id,$khoa_field_name_taxonomy_type);
                                }
                            }
                        }
                     }
                    /*if($giatri_field_type != $old_type[0]->giatri)
                    {
                        if($giatri_field_type != '5')
                        {
                        newsjam_delete_relate_data($option[0]->id,$khoa_field_type);
                        newsjam_isert_relate_data($option[0]->id,$khoa_field_type,$giatri_field_type);
                        }
                        else
                        {
                            newsjam_delete_relate_data($option[0]->id,$khoa_field_type);
                            newsjam_isert_relate_data($option[0]->id,$khoa_field_type,$giatri_field_type);
                            if(($giatri_field_name_post_type !='')&&($giatri_field_name_post_type != $old_name_post_type))
                            {
                                newsjam_delete_relate_data($option[0]->id,$khoa_field_name_post_type);
                                newsjam_isert_relate_data($option[0]->id,$khoa_field_name_post_type,$giatri_field_name_post_type);
                            }
                            elseif($giatri_field_name_post_type =='')
                            {
                                newsjam_delete_relate_data($option[0]->id,$khoa_field_name_post_type);
                            }
                        }                        
                    }*/
                    if($giatri_field_check != $old_view[0]->giatri)
                    {
                        if($giatri_field_check == '')
                        {
                            newsjam_delete_relate_data($option[0]->id,$khoa_field_check);
                        }
                        else
                        {
                            newsjam_delete_relate_data($option[0]->id,$khoa_field_check);
                            newsjam_isert_relate_data($option[0]->id,$khoa_field_check,$giatri_field_check);
                        }                        
                    }
                }
                else
                {
                    newsjam_delete_relate_data($option[0]->id,$khoa_field_name);
                    newsjam_delete_relate_data($option[0]->id,$khoa_field_custom_type);
                    newsjam_delete_relate_data($option[0]->id,$khoa_field_type);
                    newsjam_delete_relate_data($option[0]->id,$khoa_field_check);
                    newsjam_delete_relate_data($option[0]->id,$khoa_field_name_post_type);
                }
            }
            echo '<script type="text/javascript">window.location = "admin.php?page='.$option[0]->custom_type.'";</script>';
        }
    }
}
else
{
    $term_option_id=get_option_term_id($_REQUEST['term']);    
?>
<div class="wrap postbox">
    <h3>
        <span><strong>Add extra field custom Taxonomy</strong></span>
        <span style="margin-left: 100px;">Custom Post Type: <strong><?php echo $option[0]->name;?></strong></span>
        <span style="margin-left: 100px;">Taxonomy: <strong><?php echo $_REQUEST['term'];?></strong></span>
    </h3>
    <div class="taxonomy-block" style="margin: 20px 0 0 85px;width:400px;padding:10px;background:#000;text-align:center;">
            <label style="color: #FFF;font:15px/21px Arial;">Note: </label><label style="color:#fff41a;font:15px/21px Arial;">get_tax_meta($term_id,$type)</label>
    </div>
    <div class="clear"></div>
    <div style="margin: 20px 0 0 10px;"><a href="?page=<?php echo $_REQUEST['page']?>" style="text-decoration: none;">Back</a></div>
    <form method="post" action="">    
    <div class="custom-field-block" style="margin: 20px 0 0;">
        <li class="label">&nbsp;</li>
        <li class="label1">Name Field</li>
        <li class="label2">Custom Type Field</li>
        <li class="label3">Type Field</li>               
    </div>
    <div style="clear: both;"></div>    
<?php    
    if($_REQUEST['save_term']=='save')
    {
        for($a=1;$a<=30;$a++)
        {                    
            $giatri_field_term_name='';
            $giatri_field_term_slug='';
            $giatri_field_term_type='';
            
            $key_term_name='field_term_'.$term_option_id[0]->id.'_name'.$a;
            $key_term_slug='field_term_'.$term_option_id[0]->id.'_slug'.$a;
            $key_term_type='field_term_'.$term_option_id[0]->id.'_type'.$a;
            
            $giatri_field_term_name=$_REQUEST['field_term_'.$term_option_id[0]->id.'_name'.$a];
            $giatri_field_term_slug=$_REQUEST['field_term_'.$term_option_id[0]->id.'_slug'.$a];
            $giatri_field_term_type=$_REQUEST['field_term_'.$term_option_id[0]->id.'_type'.$a];
            
            $old_name=newsjam_get_relate_data($option[0]->id,$key_term_name);
            $old_term_slug=newsjam_get_relate_data($option[0]->id,$key_term_slug);
            $old_term_type=newsjam_get_relate_data($option[0]->id,$key_term_type);
            
            if(($giatri_field_term_name !=''))
            {
                if($giatri_field_term_name != $old_name[0]->giatri)
                {
                    newsjam_delete_relate_data($option[0]->id,$key_term_name);
                    newsjam_isert_relate_data($option[0]->id,$key_term_name,$giatri_field_term_name);                        
                }
                if($giatri_field_term_slug != $old_term_slug[0]->giatri)
                {
                    newsjam_delete_relate_data($option[0]->id,$key_term_slug);
                    newsjam_isert_relate_data($option[0]->id,$key_term_slug,$giatri_field_term_slug);                        
                }                                 
                if($giatri_field_term_type != $old_term_type[0]->giatri)
                {
                    newsjam_delete_relate_data($option[0]->id,$key_term_type);
                    newsjam_isert_relate_data($option[0]->id,$key_term_type,$giatri_field_term_type);
                }
                     
            }
            else
            {
                newsjam_delete_relate_data($option[0]->id,$key_term_name);
                newsjam_delete_relate_data($option[0]->id,$key_term_slug);
                newsjam_delete_relate_data($option[0]->id,$key_term_type);
            }
        }
        echo '<script type="text/javascript">window.location = "admin.php?page='.$option[0]->custom_type.'&term='.$_REQUEST['term'].'&action=edit";</script>';
    }
    else
    {    
    for($i=1;$i<=30;$i++)
    {
        $f_term_name='field_term_'.$term_option_id[0]->id.'_name'.$i;
        $f_term_slug='field_term_'.$term_option_id[0]->id.'_slug'.$i;
        $f_term_type='field_term_'.$term_option_id[0]->id.'_type'.$i;
        
        $giatri_field_term_name=newsjam_get_relate_data($option[0]->id,$f_term_name);
        $giatri_field_term_slug=newsjam_get_relate_data($option[0]->id,$f_term_slug);
        $giatri_field_term_type=newsjam_get_relate_data($option[0]->id,$f_term_type);
        
        
        for($a=1;$a<=10;$a++)
        {
            $select='';
            if($giatri_field_term_type[0]->giatri == $a)
            {
                $select[$a]='selected="selected"';
                break;
            }
        }
?>    
    <div class="custom-field-block">
        <li class="title">Field <?php echo $i;?>:</li>
        <li><input type="text" name="<?php echo $f_term_name;?>" value="<?php echo $giatri_field_term_name[0]->giatri;?>" /></li>
        <li><input type="text" name="<?php echo $f_term_slug;?>" value="<?php echo $giatri_field_term_slug[0]->giatri;?>" /></li>        
        <li>
            <select name="<?php echo $f_term_type;?>">
                <option value="1" <?php echo $select['1'];?>>Text Box</option>                
                <option value="2" <?php echo $select['2'];?>>Text Area</option>
                <option value="3" <?php echo $select['3'];?>>Check Box</option>                
                <option value="4" <?php echo $select['4'];?>>Date</option>
                <option value="5" <?php echo $select['5'];?>>Time</option>
                <option value="6" <?php echo $select['6'];?>>Color</option>
                <option value="7" <?php echo $select['7'];?>>Upload Images</option>
                <option value="8" <?php echo $select['8'];?>>Upload File</option>
            </select>
        </li>
    </div> 
    <div style="clear: both;"></div>
<?php
    }
    }
?>       
    <p class="submit">
    <input type="hidden" name="save_term" value="save" />
    <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />    
    </p>
    </form>
</div>
<?php            
}
ob_flush();
?>