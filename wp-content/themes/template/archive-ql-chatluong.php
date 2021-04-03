<?php
include("header.php");
?>

<body>

    <?php
    include("module/mod_head.php");

    ?>
    <?php
    $post_types = get_post_type();
    $tongsotin = wp_count_posts($post_types)->publish;


    ?>
    <section class="page-title">
        <div class="auto-container" , align="center" , style="color:#FFFFFF">
            <h1><?php post_type_archive_title(); ?></h1>
        </div>
    </section>
    <section class="blog-grid-section">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="quality_manager">
                        <?php
                        $d_taxonomy = "danh-muc-ql";
                        $custom_terms = get_term_by_taxonomy($d_taxonomy, 0, 'meta_value', 'tax-order', 'ASC', null);
                        if (!empty($custom_terms)) {
                            $dem = 0;

                            foreach ($custom_terms->terms as $custom_term) {

                                $term_name = $custom_term->name;
                                $term_link = get_taxonomy_link_custom($d_post_type, $custom_term, false);
                                $term_img = get_field('images', $d_taxonomy . '_' . $custom_term->term_id)["url"];
                                $term_description =  wpautop($custom_term->description);

                        ?>
                                <div class="d_cat_block" data-toggle="collapse" data-target="#cat_manager_<?php echo $dem ?>">
                                    <div class="d_cat_name"><?php echo $term_name ?></div>
                                    <div class="d_cat_icon d_down">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                    </div>
                                    <div class="d_cat_icon d_up">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z" />
                                        </svg>
                                    </div>
                                </div>
                                <div id="cat_manager_<?php echo $dem ?>" class="collapse d_cat_cont">
                                    <div class="d_cat_des"><?php echo $term_description?></div>
                                    <?php
                                    // $show_home = get_field('show_home', $d_taxonomy . '_' . $custom_term->term_id)
                                    $the_query = get_post_full_custom(array('OR', array(array($d_taxonomy, 'slug', $custom_term->slug, true, 'IN'))), 'ql-chatluong', 'menu_order', null, 'ASC', -1, 0, null);

                                    // The Loop
                                    if ($the_query->have_posts()) :
                                        while ($the_query->have_posts()) : $the_query->the_post();
                                            $result = get_post();
                                            $name = $result->post_title;
                                            $img = get_image_size($result->ID, "images", "full");
                                            //$link = get_post_meta( $result->ID, 'link', true );
                                            $link = get_permalink($result->ID);
                                            if ($link == "") {
                                                $link = "#";
                                            }
                                            $content = wpautop($result->post_content);
                                            $excerpt = wpautop($result->post_excerpt);
                                            $excerpt = wp_strip_all_tags($excerpt);
                                            $excerpt = sub_string($excerpt, 100);

                                    ?>

                                            <div class="product_title"><a href="<?php echo $link ?>"><?php echo $name ?></a></div>

                                    <?php
                                        endwhile;
                                    endif;

                                    $dem += 1;
                                    ?>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <?php
    include("footer.php");
    ?>

    <script>
        $(".d_cat_block").each(function(index) {
            $(this).click(function() {

            })
        });
    </script>
</body>

</html>