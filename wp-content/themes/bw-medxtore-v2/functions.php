<?php
/**
 * frametheme functions and definitions
 *
 * @package WordPress
 * @subpackage frametheme
 * @since frametheme 1.0
 */
load_theme_textdomain( 'bw-medxtore-v2', get_template_directory() . '/languages' );
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}
require_once( trailingslashit( get_template_directory() ). '/inc/class-inc.php' );

add_action('woocommerce_after_single_product', 'add_shortcode_below_product');

function add_shortcode_below_product() {
    echo do_shortcode('[wc_photo_reviews_shortcode  products="13175"]');
}
