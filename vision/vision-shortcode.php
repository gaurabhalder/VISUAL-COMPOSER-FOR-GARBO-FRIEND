<?php

if (!function_exists('garbo_vision')) {

    function garbo_vision($atts)
    {
        ob_start();
        // var_dump($atts['garbo_vision_button_link']);

        ?>

        <section class="module module--no-margin-top-small-screen module--no-margin-bottom vision__module">
            <?php
            $title = $atts['garbo_vision_title'];
            $text = $atts['garbo_vision_text'];
            $button = $atts['garbo_vision_button'];
            $image = wp_get_attachment_image_src($atts['garbo_vision_image'], 'bu_vision')[0];
            $page_url = vc_build_link($atts['garbo_vision_button_link'])['url'];
            $thumbnail = wp_get_attachment_image_src($atts['garbo_vision_image'], 'bu_vision')[0];
            $text_color = $atts['garbo_vision_text_color'];
            ?>

            <div class="container vision__container in-view-fade">
                <!-- <div class="container "> -->
                <!-- <div class="row"> -->

                <div class="full-width-image full-width-image--bg- full-height vision__image" style="background-image: url(<?php echo $thumbnail ?>);">
                    <a href="<?php echo $page_url ?>">
                        <div class="vertically-align-children vertically-align-children-small">

                            <div class="col-md-4 col-md-offset-1 col-xs-12 vision">
                                <?php if ($title) : ?>
                                    <h2 class="vision__header full-width-image__title text-<?php echo $text_color ?>"><?php echo $title ?></h2>
                                <?php endif; ?>

                                <?php if ($text) : ?>
                                    <div class="full-width-image__text-inner vision__text text-<?php echo $text_color ?>">
                                        <?php echo $text ?>
                                    </div>
                                <?php endif; ?>

                                <form action="<?php echo $page_url ?>">
                                    <input class="vision__btn hej" type="submit" value="<?php echo $button ?>" />
                                </form>

                            </div>
                        </div>
                    </a>
                </div>
                <hr class="vision__hr hidden-sm hidden-xs">
                <!-- </div> -->

            </div>

        </section>

        <?php
        $output_string = ob_get_contents();
        ob_end_clean();
        wp_reset_postdata();
        return $output_string;
    }
    add_shortcode('garbo_vision', 'garbo_vision');
}
