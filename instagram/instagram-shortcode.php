<?php

if (!function_exists('garbo_instagram')) {

    function garbo_instagram($atts)
    {

        ob_start();
        ?>

        <section class="module">
            <div class="instagram">
                <div class="instagram__inner">
                    <?php if ($atts['garbo_instagram_title']) { ?>
                        <div class="instagram__header">
                            <a href="<?php echo $atts['garbo_instagram_title'] ?>" target="_blank" class="instagram__header-inner">
                                <h3 class="instagram__text"><?php echo get_sub_field('text') ?></h3>
                                <!-- <i class="instagram__icon fa fa-instagram" aria-hidden="true"></i> <span class="instagram__handle">Lowengripcarecolor</span>                 -->
                            </a>
                        </div>
                    <?php } ?>
                    <div class="instagram__feed">
                        <?php echo do_shortcode('[instagram-feed showcaption=false]'); ?>
                    </div>
                </div>
            </div>
        </section>

        <?php
        $output_string = ob_get_contents();
        ob_end_clean();
        wp_reset_postdata();
        return $output_string;
    }
    add_shortcode('garbo_instagram', 'garbo_instagram');
}
