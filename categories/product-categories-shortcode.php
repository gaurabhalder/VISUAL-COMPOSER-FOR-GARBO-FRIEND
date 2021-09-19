<?php
if (!function_exists('garbo_category_products')) {
    function garbo_category_products($atts)
    {
        global $post;
        $category_products =  explode(',', $atts['ids']);
        ob_start();
        ?>
        <section class="module module--no-margin-top module--no-margin-bottom explore" style="padding-bottom: 1px">
            <div class="container">
                <div class="horizontally-align-children">
                    <span class="container__header explore__header text-white">Explore</span>
                </div>

                <div class="row">

                    <?php

                    $field = get_field('modules', get_option('page_on_front'));

                    $categories = $field[3]['categories'];

                    for ($i = 0; $i < count($category_products); $i++) {

                        $id    = $category_products[$i];
                        $product_cat = get_term_by('id', $id, 'product_cat');
                        // var_dump($product_cat);
                        $title = $product_cat->name;
                        $thumb_id = get_woocommerce_term_meta($id, 'thumbnail_id', true);

                        $image_url = wp_get_attachment_image_src($thumb_id, 'bu_large')[0];
                        if ($i == 0) {
                            $image_url = wp_get_attachment_image_src($thumb_id, 'bu_slideshow')[0];
                        }

                        $link_url   = get_term_link($product_cat, 'product_cat');
                        if ($link_url) : ?>
                            <a href="<?php echo $link_url ?>">
                            <?php endif; ?>
                            <?php if ($i === 0) { ?>
                                <div class="col-lg-12 col-md-12 col-sm-12 explore__block in-view-fade hide_on_small_screen">
                                <?php } else { ?>
                                    <div class="col-lg-6 col-md-6 col-sm-6 explore__block in-view-fade">
                                    <?php } ?>

                                    <img src="<?php echo $image_url ?>">
                                    <div class="vertically-align-children vertically-align-children-small row explore__content__wrapper" style="text-align: center;">
                                        <?php if ($i === 0) { ?>
                                            <div class="col-md-4 slideshow__offset-position slideshow__offset-position__left col-xs-12 slideshow__text-container vertically-align-children col-sm-12 col-xs-12">
                                            <?php } else { ?>
                                                <div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
                                                <?php } ?>
                                                <?php if ($title) : ?>
                                                    <h2 class="full-width-image__title text-white"><?php echo $title ?></h2>
                                                <?php endif; ?>
                                                <p class="product__shop-now text-text-white">Shop Now</p>
                                            </div>
                                        </div>
                                    </div>
                                <?php };
                                ?>
                            </div>
                            <?php if ($link_url) : ?>
                        </a>
                    <?php endif; ?> 
        </section>


        <?php
        $output_string = ob_get_contents();
        ob_end_clean();
        wp_reset_postdata();
        return $output_string;
    }
    add_shortcode('garbo_category_products', 'garbo_category_products');
}
