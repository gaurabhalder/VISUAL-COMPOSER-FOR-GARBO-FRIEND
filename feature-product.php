<?php
/*
 * Plugin Name: Feature Product
 * Description: This is an woocommerce feature porudct grid layout
 * Version: 0.1.0
 * Author: DevShawon
 * Author URI: https://www.devshawon.com
 * text-domain:feature-product
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

define('FEATURE_PRODUCT', '1.0');
define('FEATURE_PRODUCT_PLUGIN_DIR', plugin_dir_url(__FILE__));
define('FEATURE_PRODUCT_PLUGIN_PATH', plugin_dir_path(__FILE__));


add_image_size('bu_product_small', 310, 350, true, array('center', 'center')); // Favorite small / Categories small / Others also liked small
add_image_size('bu_product_large', 660, 350, true, array('center', 'center')); // Favorite large / Others also liked big
add_image_size('bu_slideshow', 1360, 577, true, array('center', 'center')); // Slideshow
add_image_size('bu_large', 695, 0, false);

include('newsletter-widget/newsletter-init.php');
include('login-widget/login-init.php');



add_action('vc_before_init', 'vc_before_init_actions');
function vc_before_init_actions()
{
    include('feature-product-init.php');
    include('feature-product-shortcode.php');

    include('categories/product-categories-init.php');
    include('categories/product-categories-shortcode.php');

    include('vision/vision-init.php');
    include('vision/vision-shortcode.php');

    include('connect/connect-init.php');
    include('connect/connect-shortcode.php');
    // Instagram Section 
    include('instagram/instagram-init.php');
    include('instagram/instagram-shortcode.php');
}
