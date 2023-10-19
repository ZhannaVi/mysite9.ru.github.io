<?php
	
load_template( get_template_directory() . '/inc/TGM/class-tgm-plugin-activation.php' );

/**
 * Recommended plugins.
 */
function boutique_designer_shop_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'WooCommerce', 'boutique-designer-shop' ),
			'slug'             => 'woocommerce',
			'required'         => false,
			'force_activation' => false,
		),
		
	);
	$config = array();
	boutique_designer_shop_tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'boutique_designer_shop_register_recommended_plugins' );