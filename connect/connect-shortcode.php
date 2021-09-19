<?php

if (!function_exists('garbo_connect')) {

    function garbo_connect($atts)
    {

        ob_start();
        ?>

        <section class="module module--no-margin-top module--no-margin-bottom">

            <div class="container connect__wrapper in-view-fade">

                <div class="row">

                    <?php
                    $text = $atts['garbo_connect_title'];
                    $facebook = $atts['garbo_connect_facebook'];
                    $instagram = $atts['garbo_connect_instagram'];
                    $pinterest = $atts['garbo_connect_pinterest'];
                    $email = $atts['garbo_connect_email'];
                    ?>

                    <div class="horizontally-align-children">
                        <span class="container__header connect__header"><?php echo $text ?></span>
                    </div>


                    <div class="col-md-12 horizontally-align-children connect__icons">

                        <?php if ($facebook) : ?>
                            <a href="<?php echo $facebook ?>">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                        <?php endif; ?>

                        <?php if ($instagram) : ?>
                            <a href="<?php echo $instagram ?>">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                        <?php endif; ?>

                        <?php if ($pinterest) : ?>
                            <a href="<?php echo $pinterest ?>">
                                <i class="fa fa-pinterest" aria-hidden="true"></i>
                            </a>
                        <?php endif; ?>

                        <?php if ($email) : ?>
                            <a class="newsletter_signup" data-mfp-type="inline" data-mfp-src="#nm-lightbox-content" href="<?php echo $email ?>">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </a>
                        <?php endif; ?>
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
    add_shortcode('garbo_connect', 'garbo_connect');
}
