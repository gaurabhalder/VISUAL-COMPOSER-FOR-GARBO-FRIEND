<?php

if (!function_exists('garbo_products')) {
    function garbo_products($atts)
    {
        $products =  explode(',', $atts['ids']);
        ob_start();
        ?>
        <section class="module module--no-margin-top favorites__module">

            <div class="container">




                <div class="favorites__row favorites__slide-small row">
                    <?php

                    //$products = $atts['ids'];


                    for ($i = 0; $i < count($products); $i++) :
                        $id = $products[$i];
                        $p = wc_get_product($id);
                        $title = $p->get_name();

                        if ($i >= 4) {
                            $image_size = 'bu_product_large';
                        } else {
                            $image_size = 'bu_product_small';
                        }

                        $image_url = get_the_post_thumbnail_url($id, $image_size);

                        $link = get_post_permalink($id);
                        $price = $p->get_price_html();

                        $attachment_ids = $p->get_gallery_image_ids();

                        if (count($attachment_ids) > 0) {
                            $gallery_url = wp_get_attachment_image_src($attachment_ids[0], $image_size);
                        } else {
                            $gallery_url = $image_url;
                        }
                        ?>


                        <?php if ($i < 3) { ?>
                            <div class="col-md-3 col-sm-3 col-xs-12 favorites__product product__hover in-view-fade">
                                <a href="<?php echo $link ?>">

                                <?php } else if ($i == 3) { ?>
                                    <div class="col-md-3 col-sm-3 col-xs-12 favorites__product product__hover in-view-fade">
                                        <a href="<?php echo $link ?>">


                                        <?php } else if ($i == 4) { ?>
                                    </div>
                                    <div class="favorites__row favorites__slide-large row">
                                        <div class="col-md-6 col-sm-6 favorites__product product__hover in-view-fade">
                                            <a href="<?php echo $link ?>">

                                            <?php } else { ?>
                                                <div class="col-md-6 col-sm-6 favorites__product product__hover in-view-fade">
                                                    <a href="<?php echo $link ?>">

                                                    <?php } ?>

                                                    <div class="image-wrapper image-wrapper-hover">
                                                        <img src="<?php echo $gallery_url[0] ?>">
                                                        <img style="position: absolute;top: 0;left: 0;" src="<?php echo $image_url ?>">
                                                    </div>

                                                </a>

                                                <div>
                                                    <a href="<?php echo $link ?>">
                                                        <div class="favorites__product__info">
                                                            <span class="favorites__product__title">
                                                                <?php echo $title ?>
                                                            </span>
                                                            <!-- <hr class="underline-text"> -->

                                                            <p class="favorites__product__price"><?php echo $price ?></p>
                                                        </div>
                                                    </a>

                                                    <div class="favorites__product__info__cart hidden-sm hidden-xs width-fix">

                                                        <form class="cart" method="post" enctype='multipart/form-data'>
                                                            <?php do_action('woocommerce_before_add_to_cart_button'); ?>

                                                            <input type="hidden" name="add-to-cart" value="<?php echo esc_attr($id); ?>" />

                                                            <?php if ($i < 4) { ?>
                                                                <button type="submit" class="favorites__product__add-cart">
                                                                <?php } else { ?>
                                                                    <button type="submit" class="favorites__product__add-cart favorites__product__add-cart--large">
                                                                    <?php } ?>
                                                                    <span class="favorites__product__add-cart-button-text">ADD TO CART</span>
                                                                </button>


                                                                <?php do_action('woocommerce_after_add_to_cart_button'); ?>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php
                                        endfor;
                                        ?>
                                </div>
                            </div>

        </section>
        <?php
        $output_string = ob_get_contents();
        ob_end_clean();
        wp_reset_postdata();
        return $output_string;
    }
    add_shortcode('garbo_products', 'garbo_products');
}
