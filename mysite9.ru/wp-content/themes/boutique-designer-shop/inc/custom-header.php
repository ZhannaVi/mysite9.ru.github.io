<?php
/**
 * Custom header
 */

function boutique_designer_shop_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'boutique_designer_shop_custom_header_args', array(
		'default-image'          => get_parent_theme_file_uri( '/assets/images/header-img.jpg' ),
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 100,
		'flex-width'			 => true,
		'flex-height'			 => true,
		'wp-head-callback'       => 'boutique_designer_shop_header_style',
	) ) );

	register_default_headers( array(
		'default-image' => array(
			'url'           => '%s/assets/images/header-img.jpg',
			'thumbnail_url' => '%s/assets/images/header-img.jpg',
			'description'   => __( 'Default Header Image', 'boutique-designer-shop' ),
		),
	) );
}

add_action( 'after_setup_theme', 'boutique_designer_shop_custom_header_setup' );

if ( ! function_exists( 'boutique_designer_shop_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see boutique_designer_shop_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'boutique_designer_shop_header_style' );
function boutique_designer_shop_header_style() {
	if ( get_header_image() ) :
	$custom_css = "
        #header{
			background-image:url('".esc_url(get_header_image())."');
			background-position: top;
			height: auto !important;
			background-size:cover !important;
			background-repeat:no-repeat !important;

		}.header-image, .woocommerce-page .single-post-image {
			background-image:url('".esc_url(get_header_image())."');
			background-position: top;
			background-size:cover !important;
			background-repeat:no-repeat !important;
		}";
	   	wp_add_inline_style( 'boutique-designer-shop-style', $custom_css );
	endif;
}
endif;
