<?php
class garbo_widget extends WP_Widget
{

    /**
     * Register widget with WordPress.
     */
    function __construct()
    {
        parent::__construct(
            'garbo_widget', // Base ID
            esc_html__('Garbo Newsletter', 'nm-framework'), // Name
            array('description' => esc_html__('Garbo Newsletter shortcode', 'nm-framework'),) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance)
    {
        echo $args['before_widget'];
        global $nm_theme_options;
        ?>

        <h4 class="footer__container__header"><?php echo $instance['title']; ?></h4>
        <div class="footer__input">
            <?php
            mc4wp_show_form();
            ?>
        </div>
        <?php
        if (isset($nm_theme_options['footer_bar_logo']) && strlen($nm_theme_options['footer_bar_logo']['url']) > 0) :

            $logo_src = (is_ssl()) ? str_replace('http://', 'https://', $nm_theme_options['footer_bar_logo']['url']) : $nm_theme_options['footer_bar_logo']['url'];
            ?>
            <div class="nm-footer-bar-logo">
                <img src="<?php echo esc_url($logo_src); ?>" />
            </div>
        <?php endif; ?>
        <?php
        echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : esc_html__('Newsletter', 'nm-framework');
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_attr_e('Title ', 'nm-framework'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
    <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';

        return $instance;
    }
}
add_action('widgets_init', 'register_garbo_widget');
function register_garbo_widget()
{
    register_widget('garbo_widget');
}
