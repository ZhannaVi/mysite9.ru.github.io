<?php
/**
 * Boutique Designer Shop functions and definitions
 *
 * @subpackage Boutique Designer Shop
 * @since 1.0
 */

//woocommerce//
//shop page no of columns
function boutique_designer_shop_woocommerce_loop_columns() {
	
	$retrun = get_theme_mod( 'boutique_designer_shop_archieve_item_columns', 3 );
    
    return $retrun;
}

add_filter( 'loop_shop_columns', 'boutique_designer_shop_woocommerce_loop_columns' );

function boutique_designer_shop_woocommerce_products_per_page() {

		$retrun = get_theme_mod( 'boutique_designer_shop_archieve_shop_perpage', 6 );
    
    return $retrun;
}
add_filter( 'loop_shop_per_page', 'boutique_designer_shop_woocommerce_products_per_page' );

// related products
function boutique_designer_shop_related_products_args( $args ) {
    $defaults = array(
        'posts_per_page' => get_theme_mod( 'boutique_designer_shop_related_shop_perpage', 3 ),
        'columns'        => get_theme_mod( 'boutique_designer_shop_related_item_columns', 3),
    );

    $args = wp_parse_args( $defaults, $args );

    return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'boutique_designer_shop_related_products_args' );

//woocommerce-end//

function boutique_designer_shop_sanitize_dropdown_pages( $page_id, $setting ) {
	$page_id = absint( $page_id );
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}
function boutique_designer_shop_sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
  }


function boutique_designer_shop_sanitize_select( $input, $setting ){
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function boutique_designer_shop_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}
if ( ! function_exists( 'boutique_designer_shop_sanitize_integer' ) ) {
	function boutique_designer_shop_sanitize_integer( $input ) {
		return (int) $input;
	}
}
function boutique_designer_shop_sanitize_number_absint( $number, $setting ) {

	// Ensure input is an absolute integer.
	$number = absint( $number );

	// Get the input attributes associated with the setting.
	$atts = $setting->manager->get_control( $setting->id )->input_attrs;

	// Get minimum number in the range.
	$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );

	// Get maximum number in the range.
	$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );

	// Get step.
	$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );

	// If the number is within the valid range, return it; otherwise, return the default
	return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}

// post format functions

//media post format
function boutique_designer_shop_get_media($type = array()){
	$content = apply_filters( 'the_content', get_the_content() );
  	$output = false;

  // Only get audio from the content if a playlist isn't present.
  if ( false === strpos( $content, 'wp-playlist-script' ) ) {
    $output = get_media_embedded_in_content( $content, $type );
    return $output;
  }

}

function boutique_designer_shop_notice(){
    global $pagenow;
    if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
        wp_safe_redirect( admin_url("themes.php?page=boutique-designer-shop-guide-page") );
    }
}
add_action('after_setup_theme', 'boutique_designer_shop_notice');

function boutique_designer_shop_add_new_page() {
  $edit_page = admin_url().'post-new.php?post_type=page';
  echo json_encode(['page_id'=>'','edit_page_url'=> $edit_page ]);

  exit;
}
add_action( 'wp_ajax_boutique_designer_shop_add_new_page','boutique_designer_shop_add_new_page' );

function boutique_designer_shop_callback_sanitize_switch( $value ) {
	
	// Switch values must be equal to 1 of off. Off is indicator and should not be translated.
	return ( ( isset( $value ) && $value == 1 ) ? 1 : 'off' );

}

function boutique_designer_shop_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf(
		'<div class="link-more text-center"><a href="%1$s" class="more-link py-2 px-4">%2$s</a></div>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Read More<span class="screen-reader-text"> "%s"</span>', 'boutique-designer-shop' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'boutique_designer_shop_excerpt_more' );

add_filter( 'woocommerce_add_to_cart_fragments', 'boutique_designer_shop_update_cart_count_items' );
function boutique_designer_shop_update_cart_count_items( $fragments ) {
    global $woocommerce;

    $fragments['.header-cart'] = '<a href="'.wc_get_cart_url().'" class="header-cart"><i class="fas fa-shopping-cart"></i><span>CART</span><span>('.$woocommerce->cart->cart_contents_count.')</span></a>';

    return $fragments;
}

function boutique_designer_shop_setup() {
	add_theme_support( 'woocommerce' );
	add_theme_support( "align-wide" );
	add_theme_support( "wp-block-styles" );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( "responsive-embeds" );
	add_theme_support( 'title-tag' );
	add_theme_support('custom-background',array(
		'default-color' => 'ffffff',
	));
	add_image_size( 'boutique-designer-shop-featured-image', 2000, 1200, true );
	add_image_size( 'boutique-designer-shop-thumbnail-avatar', 100, 100, true );

	$GLOBALS['content_width'] = 525;
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'boutique-designer-shop' ),
	) );

	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array('image','video','gallery','audio','quote',) );
	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', boutique_designer_shop_fonts_url() ) );
}
add_action( 'after_setup_theme', 'boutique_designer_shop_setup' );

function boutique_designer_shop_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'boutique-designer-shop' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'boutique-designer-shop' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'boutique-designer-shop' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your pages and posts', 'boutique-designer-shop' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'boutique-designer-shop' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'boutique-designer-shop' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'boutique-designer-shop' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'boutique-designer-shop' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'boutique-designer-shop' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'boutique-designer-shop' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'boutique-designer-shop' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'boutique-designer-shop' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'boutique-designer-shop' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'boutique-designer-shop' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'boutique_designer_shop_widgets_init' );

function boutique_designer_shop_fonts_url(){
	$font_url = '';
	$font_family = array();
	$font_family[] = 'Arsenal:ital,wght@0,400;0,700;1,400;1,700';
	$font_family[] = 'Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';

	$query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
	$contents = wptt_get_webfont_url( esc_url_raw( $fonts_url ) );
}

//Enqueue scripts and styles.
function boutique_designer_shop_scripts() {

	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'boutique-designer-shop-fonts', boutique_designer_shop_fonts_url(), array() );

	//Bootstarp
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri().'/assets/css/bootstrap.css' );

	// Theme stylesheet.
	wp_enqueue_style( 'boutique-designer-shop-style', get_stylesheet_uri() );

	wp_style_add_data('boutique-designer-shop-style', 'rtl', 'replace');

	// Theme Customize CSS.
	require get_parent_theme_file_path( 'inc/extra_customization.php' );
	wp_add_inline_style( 'boutique-designer-shop-style',$boutique_designer_shop_custom_style );

	//font-awesome
	wp_enqueue_style( 'font-awesome-style', get_template_directory_uri().'/assets/css/fontawesome-all.css' );

	// Block Style
	wp_enqueue_style( 'boutique-designer-shop-block-style', esc_url( get_template_directory_uri() ).'/assets/css/blocks.css' );

	//Custom JS
	wp_enqueue_script( 'boutique-designer-shop-custom.js', get_theme_file_uri( '/assets/js/theme-script.js' ), array( 'jquery' ), true );

	//Nav Focus JS
	wp_enqueue_script( 'boutique-designer-shop-navigation-focus', get_theme_file_uri( '/assets/js/navigation-focus.js' ), array( 'jquery' ), true );

	//Bootstarp JS
	wp_enqueue_script( 'bootstrap-js', get_theme_file_uri( '/assets/js/bootstrap.js' ), array( 'jquery' ),true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'boutique_designer_shop_scripts' );

function boutique_designer_shop_fonts_scripts() {
	$boutique_designer_shop_headings_font = esc_html(get_theme_mod('boutique_designer_shop_headings_text'));
	$boutique_designer_shop_body_font = esc_html(get_theme_mod('boutique_designer_shop_body_text'));

	if( $boutique_designer_shop_headings_font ) {
		wp_enqueue_style( 'boutique-designer-shop-headings-fonts', '//fonts.googleapis.com/css?family='. $boutique_designer_shop_headings_font );
	} else {
		wp_enqueue_style( 'boutique-designer-shop-source-sans', '//fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic');
	}
	if( $boutique_designer_shop_body_font ) {
		wp_enqueue_style( 'boutique-designer-shop-body-fonts', '//fonts.googleapis.com/css?family='. $boutique_designer_shop_body_font );
	} else {
		wp_enqueue_style( 'boutique-designer-shop-source-body', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,400italic,700,600');
	}
}
add_action( 'wp_enqueue_scripts', 'boutique_designer_shop_fonts_scripts' );

function boutique_designer_shop_enqueue_admin_script( $hook ) {

	// Admin JS
	wp_enqueue_script( 'boutique-designer-shop-admin.js', get_theme_file_uri( '/assets/js/boutique-designer-shop-admin.js' ), array( 'jquery' ), true );

	wp_localize_script('boutique-designer-shop-admin.js', 'boutique_designer_shop_scripts_localize',
        array(
            'ajax_url' => esc_url(admin_url('admin-ajax.php'))
        )
    );
}
add_action( 'admin_enqueue_scripts', 'boutique_designer_shop_enqueue_admin_script' );

function boutique_designer_shop_slider_dropdown(){
	if(get_option('boutique_designer_shop_slider_arrows') == true ) {
		return true;
	}
	return false;
}

function boutique_designer_shop_product_dropdown(){
	if(get_option('boutique_designer_shop_product_enable') == true ) {
		return true;
	}
	return false;
}

// Enqueue editor styles for Gutenberg
function boutique_designer_shop_block_editor_styles() {
	// Block styles.
	wp_enqueue_style( 'boutique-designer-shop-block-editor-style', trailingslashit( esc_url ( get_template_directory_uri() ) ) . '/assets/css/editor-blocks.css' );

	// Add custom fonts.
	wp_enqueue_style( 'boutique-designer-shop-fonts', boutique_designer_shop_fonts_url(), array() );
}
add_action( 'enqueue_block_editor_assets', 'boutique_designer_shop_block_editor_styles' );

function boutique_designer_shop_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'boutique_designer_shop_front_page_template' );

require get_parent_theme_file_path( '/inc/custom-header.php' );

require get_parent_theme_file_path( '/inc/template-tags.php' );

require get_parent_theme_file_path( '/inc/template-functions.php' );

require get_parent_theme_file_path( '/inc/customizer.php' );

require get_template_directory() .'/inc/TGM/tgm.php';

require get_parent_theme_file_path( '/inc/dashboard/dashboard.php' );

require get_parent_theme_file_path( '/inc/typofont.php' );

require get_template_directory() . '/inc/wptt-webfont-loader.php';

require get_parent_theme_file_path( '/inc/breadcrumb.php' );

# Load scripts and styles.(fontawesome)
add_action( 'customize_controls_enqueue_scripts', 'boutique_designer_shop_customize_controls_register_scripts' );

function boutique_designer_shop_customize_controls_register_scripts() {	
	wp_enqueue_style( 'boutique-designer-shop-ctypo-customize-controls-style', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/css/customize-controls.css' );
}