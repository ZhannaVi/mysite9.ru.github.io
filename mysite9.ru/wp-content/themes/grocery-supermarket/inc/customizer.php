<?php
/**
 * Grocery Supermarket Theme Customizer
 *
 * @link: https://developer.wordpress.org/themes/customize-api/customizer-objects/
 *
 * @package Grocery Supermarket
 */

if ( ! defined( 'GROCERY_SUPERMARKET_URL' ) ) {
    define( 'GROCERY_SUPERMARKET_URL', esc_url( 'https://www.themagnifico.net/themes/supermarket-wordpress-theme/', 'grocery-supermarket') );
}
if ( ! defined( 'GROCERY_SUPERMARKET_TEXT' ) ) {
    define( 'GROCERY_SUPERMARKET_TEXT', __( 'Grocery Supermarket Pro','grocery-supermarket' ));
}
if ( ! defined( 'GROCERY_SUPERMARKET_BUY_TEXT' ) ) {
    define( 'GROCERY_SUPERMARKET_BUY_TEXT', __( 'Buy Grocery Supermarket Pro','grocery-supermarket' ));
}

use WPTRT\Customize\Section\Grocery_Supermarket_Button;

add_action( 'customize_register', function( $manager ) {

    $manager->register_section_type( Grocery_Supermarket_Button::class );

    $manager->add_section(
        new Grocery_Supermarket_Button( $manager, 'grocery_supermarket_pro', [
            'title'       => esc_html( GROCERY_SUPERMARKET_TEXT,'grocery-supermarket' ),
            'priority'    => 0,
            'button_text' => __( 'GET PREMIUM', 'grocery-supermarket' ),
            'button_url'  => esc_url( GROCERY_SUPERMARKET_URL )
        ] )
    );

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

    $version = wp_get_theme()->get( 'Version' );

    wp_enqueue_script(
        'grocery-supermarket-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
        [ 'customize-controls' ],
        $version,
        true
    );

    wp_enqueue_style(
        'grocery-supermarket-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
        [ 'customize-controls' ],
        $version
    );

} );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function grocery_supermarket_customize_register($wp_customize){

    // Pro Version
    class Grocery_Supermarket_Customize_Pro_Version extends WP_Customize_Control {
        public $type = 'pro_options';

        public function render_content() {
            echo '<span>For More <strong>'. esc_html( $this->label ) .'</strong>?</span>';
            echo '<a href="'. esc_url($this->description) .'" target="_blank">';
                echo '<span class="dashicons dashicons-info"></span>';
                echo '<strong> '. esc_html( GROCERY_SUPERMARKET_BUY_TEXT,'grocery-supermarket' ) .'<strong></a>';
            echo '</a>';
        }
    }

    // Custom Controls
    function Grocery_Supermarket_sanitize_custom_control( $input ) {
        return $input;
    }

    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';

    $wp_customize->add_setting('grocery_supermarket_logo_title_text', array(
        'default' => true,
        'sanitize_callback' => 'grocery_supermarket_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'grocery_supermarket_logo_title_text',array(
        'label'          => __( 'Enable Disable Title', 'grocery-supermarket' ),
        'section'        => 'title_tagline',
        'settings'       => 'grocery_supermarket_logo_title_text',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('grocery_supermarket_theme_description', array(
        'default' => false,
        'sanitize_callback' => 'grocery_supermarket_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'grocery_supermarket_theme_description',array(
        'label'          => __( 'Enable Disable Tagline', 'grocery-supermarket' ),
        'section'        => 'title_tagline',
        'settings'       => 'grocery_supermarket_theme_description',
        'type'           => 'checkbox',
    )));

    //Logo
    $wp_customize->add_setting('grocery_supermarket_logo_max_height',array(
        'default'   => '24',
        'sanitize_callback' => 'grocery_supermarket_sanitize_number_absint'
    ));
    $wp_customize->add_control('grocery_supermarket_logo_max_height',array(
        'label' => esc_html__('Logo Width','grocery-supermarket'),
        'section'   => 'title_tagline',
        'type'      => 'number'
    ));

    // General Settings
     $wp_customize->add_section('grocery_supermarket_general_settings',array(
        'title' => esc_html__('General Settings','grocery-supermarket'),
        'priority'   => 30,
    ));

    $wp_customize->add_setting('grocery_supermarket_preloader_hide', array(
        'default' => 0,
        'sanitize_callback' => 'grocery_supermarket_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'grocery_supermarket_preloader_hide',array(
        'label'          => __( 'Show Theme Preloader', 'grocery-supermarket' ),
        'section'        => 'grocery_supermarket_general_settings',
        'settings'       => 'grocery_supermarket_preloader_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting( 'grocery_supermarket_preloader_bg_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'grocery_supermarket_preloader_bg_color', array(
        'label' => esc_html__('Preloader Background Color','grocery-supermarket'),
        'section' => 'grocery_supermarket_general_settings',
        'settings' => 'grocery_supermarket_preloader_bg_color'
    )));

    $wp_customize->add_setting( 'grocery_supermarket_preloader_dot_1_color', array(
        'default' => '#9BB935',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'grocery_supermarket_preloader_dot_1_color', array(
        'label' => esc_html__('Preloader First Dot Color','grocery-supermarket'),
        'section' => 'grocery_supermarket_general_settings',
        'settings' => 'grocery_supermarket_preloader_dot_1_color'
    )));

    $wp_customize->add_setting( 'grocery_supermarket_preloader_dot_2_color', array(
        'default' => '#4B2D3E',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'grocery_supermarket_preloader_dot_2_color', array(
        'label' => esc_html__('Preloader Second Dot Color','grocery-supermarket'),
        'section' => 'grocery_supermarket_general_settings',
        'settings' => 'grocery_supermarket_preloader_dot_2_color'
    )));

    $wp_customize->add_setting('grocery_supermarket_scroll_hide', array(
        'default' => false,
        'sanitize_callback' => 'grocery_supermarket_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'grocery_supermarket_scroll_hide',array(
        'label'          => __( 'Show Theme Scroll To Top', 'grocery-supermarket' ),
        'section'        => 'grocery_supermarket_general_settings',
        'settings'       => 'grocery_supermarket_scroll_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('grocery_supermarket_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'grocery_supermarket_sanitize_choices'
    ));
    $wp_customize->add_control('grocery_supermarket_scroll_top_position',array(
        'type' => 'radio',
        'section' => 'grocery_supermarket_general_settings',
        'choices' => array(
            'Right' => __('Right','grocery-supermarket'),
            'Left' => __('Left','grocery-supermarket'),
            'Center' => __('Center','grocery-supermarket')
        ),
    ) );

    // Product Columns
    $wp_customize->add_setting( 'grocery_supermarket_products_per_row' , array(
        'default'           => '3',
        'transport'         => 'refresh',
        'sanitize_callback' => 'grocery_supermarket_sanitize_select',
    ) );

   $wp_customize->add_control('grocery_supermarket_products_per_row', array(
       'label' => __( 'Product per row', 'grocery-supermarket' ),
       'section'  => 'grocery_supermarket_general_settings',
       'type'     => 'select',
       'choices'  => array(
           '2' => '2',
           '3' => '3',
           '4' => '4',
       ),
   ) );

    //Woocommerce Single Product page Sidebar
    $wp_customize->add_setting('grocery_supermarket_woocommerce_single_product_page_sidebar', array(
        'default' => true,
        'sanitize_callback' => 'grocery_supermarket_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'grocery_supermarket_woocommerce_single_product_page_sidebar',array(
        'label'          => __( 'Hide Single Product Page Sidebar', 'grocery-supermarket' ),
        'section'        => 'grocery_supermarket_general_settings',
        'settings'       => 'grocery_supermarket_woocommerce_single_product_page_sidebar',
        'type'           => 'checkbox',
    )));

  $wp_customize->add_setting('grocery_supermarket_single_product_sidebar_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'grocery_supermarket_sanitize_choices'
    ));
    $wp_customize->add_control('grocery_supermarket_single_product_sidebar_layout',array(
        'type' => 'select',
        'label' => __('Woocommerce Single Product Page Sidebar','grocery-supermarket'),
        'section' => 'grocery_supermarket_general_settings',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','grocery-supermarket'),
            'Right Sidebar' => __('Right Sidebar','grocery-supermarket'),
        ),
    ) );

    //Woocommerce shop page Sidebar
    $wp_customize->add_setting('grocery_supermarket_woocommerce_shop_page_sidebar', array(
        'default' => true,
        'sanitize_callback' => 'grocery_supermarket_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'grocery_supermarket_woocommerce_shop_page_sidebar',array(
        'label'          => __( 'Hide Shop Page Sidebar', 'grocery-supermarket' ),
        'section'        => 'grocery_supermarket_general_settings',
        'settings'       => 'grocery_supermarket_woocommerce_shop_page_sidebar',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('grocery_supermarket_shop_page_sidebar_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'grocery_supermarket_sanitize_choices'
    ));
    $wp_customize->add_control('grocery_supermarket_shop_page_sidebar_layout',array(
        'type' => 'select',
        'label' => __('Woocommerce Shop Page Sidebar','grocery-supermarket'),
        'section' => 'grocery_supermarket_general_settings',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','grocery-supermarket'),
            'Right Sidebar' => __('Right Sidebar','grocery-supermarket'),
        ),
    ) );

    //TopBar
    $wp_customize->add_section('grocery_supermarket_topbar',array(
        'title' => esc_html__('Topbar Option','grocery-supermarket')
    ));

    $wp_customize->add_setting('grocery_supermarket_topbar_about_button',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('grocery_supermarket_topbar_about_button',array(
        'label' => esc_html__('Button Text 1','grocery-supermarket'),
        'section' => 'grocery_supermarket_topbar',
        'setting' => 'grocery_supermarket_topbar_about_button',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('grocery_supermarket_topbar_about_url',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('grocery_supermarket_topbar_about_url',array(
        'label' => esc_html__('Button Url 1','grocery-supermarket'),
        'section' => 'grocery_supermarket_topbar',
        'setting' => 'grocery_supermarket_topbar_about_url',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('grocery_supermarket_topbar_wishlist_button',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('grocery_supermarket_topbar_wishlist_button',array(
        'label' => esc_html__('Button Text 2','grocery-supermarket'),
        'section' => 'grocery_supermarket_topbar',
        'setting' => 'grocery_supermarket_topbar_wishlist_button',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('grocery_supermarket_topbar_wishlist_url',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('grocery_supermarket_topbar_wishlist_url',array(
        'label' => esc_html__('Button Url 2','grocery-supermarket'),
        'section' => 'grocery_supermarket_topbar',
        'setting' => 'grocery_supermarket_topbar_wishlist_url',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('grocery_supermarket_topbar_order_button',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('grocery_supermarket_topbar_order_button',array(
        'label' => esc_html__('Button Text 3','grocery-supermarket'),
        'section' => 'grocery_supermarket_topbar',
        'setting' => 'grocery_supermarket_topbar_order_button',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('grocery_supermarket_topbar_order_url',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('grocery_supermarket_topbar_order_url',array(
        'label' => esc_html__('Button Url 3','grocery-supermarket'),
        'section' => 'grocery_supermarket_topbar',
        'setting' => 'grocery_supermarket_topbar_order_url',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('grocery_supermarket_topbar_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('grocery_supermarket_topbar_text',array(
        'label' => esc_html__('Topbar Text','grocery-supermarket'),
        'section' => 'grocery_supermarket_topbar',
        'setting' => 'grocery_supermarket_topbar_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('grocery_supermarket_topbar1_wishlist_button',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('grocery_supermarket_topbar1_wishlist_button',array(
        'label' => esc_html__('Wishlist button','grocery-supermarket'),
        'section' => 'grocery_supermarket_topbar',
        'setting' => 'grocery_supermarket_topbar1_wishlist_button',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('grocery_supermarket_topbar1_wishlist_url',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('grocery_supermarket_topbar1_wishlist_url',array(
        'label' => esc_html__('Wishlist url','grocery-supermarket'),
        'section' => 'grocery_supermarket_topbar',
        'setting' => 'grocery_supermarket_topbar1_wishlist_url',
        'type'  => 'text'
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_topbar_setting', array(
        'sanitize_callback' => 'Grocery_Supermarket_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Grocery_Supermarket_Customize_Pro_Version ( $wp_customize,'pro_version_topbar_setting', array(
        'section'     => 'grocery_supermarket_topbar',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'grocery-supermarket' ),
        'description' => esc_url( GROCERY_SUPERMARKET_URL ),
        'priority'    => 100
    )));


    //Header
    $wp_customize->add_section('grocery_supermarket_header',array(
        'title' => esc_html__('Header Option','grocery-supermarket')
    ));

    $wp_customize->add_setting('grocery_supermarket_header_deals_button',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('grocery_supermarket_header_deals_button',array(
        'label' => esc_html__('Button Text','grocery-supermarket'),
        'section' => 'grocery_supermarket_header',
        'setting' => 'grocery_supermarket_header_deals_button',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('grocery_supermarket_header_deals_url',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('grocery_supermarket_header_deals_url',array(
        'label' => esc_html__('Button Url','grocery-supermarket'),
        'section' => 'grocery_supermarket_header',
        'setting' => 'grocery_supermarket_header_deals_url',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('grocery_supermarket_header_phone_number',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('grocery_supermarket_header_phone_number',array(
        'label' => esc_html__('Phone Number','grocery-supermarket'),
        'section' => 'grocery_supermarket_header',
        'setting' => 'grocery_supermarket_header_phone_number',
        'type'  => 'text'
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_header_setting', array(
        'sanitize_callback' => 'Grocery_Supermarket_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Grocery_Supermarket_Customize_Pro_Version ( $wp_customize,'pro_version_header_setting', array(
        'section'     => 'grocery_supermarket_header',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'grocery-supermarket' ),
        'description' => esc_url( GROCERY_SUPERMARKET_URL ),
        'priority'    => 100
    )));

     //Slider
    $wp_customize->add_section('grocery_supermarket_top_slider',array(
        'title' => esc_html__('Slider Settings','grocery-supermarket'),
        'description' => esc_html__('Here you have to add 3 different pages in below dropdown. Note: Image Dimensions 1400 x 550 px','grocery-supermarket')
    ));

    for ( $grocery_supermarket_count = 1; $grocery_supermarket_count <= 3; $grocery_supermarket_count++ ) {

        $wp_customize->add_setting( 'grocery_supermarket_top_slider_page' . $grocery_supermarket_count, array(
            'default'           => '',
            'sanitize_callback' => 'grocery_supermarket_sanitize_dropdown_pages'
        ) );
        $wp_customize->add_control( 'grocery_supermarket_top_slider_page' . $grocery_supermarket_count, array(
            'label'    => __( 'Select Slide Page', 'grocery-supermarket' ),
            'section'  => 'grocery_supermarket_top_slider',
            'type'     => 'dropdown-pages'
        ) );
    }

    //Opacity
    $wp_customize->add_setting('grocery_supermarket_slider_opacity_color',array(
      'default'              => '0.5',
      'sanitize_callback' => 'grocery_supermarket_sanitize_choices'
    ));

    $wp_customize->add_control( 'grocery_supermarket_slider_opacity_color', array(
    'label'       => esc_html__( 'Slider Image Opacity','grocery-supermarket' ),
    'section'     => 'grocery_supermarket_top_slider',
    'type'        => 'select',
    'choices' => array(
      '0' =>  esc_attr('0','grocery-supermarket'),
      '0.1' =>  esc_attr('0.1','grocery-supermarket'),
      '0.2' =>  esc_attr('0.2','grocery-supermarket'),
      '0.3' =>  esc_attr('0.3','grocery-supermarket'),
      '0.4' =>  esc_attr('0.4','grocery-supermarket'),
      '0.5' =>  esc_attr('0.5','grocery-supermarket'),
      '0.6' =>  esc_attr('0.6','grocery-supermarket'),
      '0.7' =>  esc_attr('0.7','grocery-supermarket'),
      '0.8' =>  esc_attr('0.8','grocery-supermarket'),
      '0.9' =>  esc_attr('0.9','grocery-supermarket')
    ),
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_slider_setting', array(
        'sanitize_callback' => 'Grocery_Supermarket_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Grocery_Supermarket_Customize_Pro_Version ( $wp_customize,'pro_version_slider_setting', array(
        'section'     => 'grocery_supermarket_top_slider',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'grocery-supermarket' ),
        'description' => esc_url( GROCERY_SUPERMARKET_URL ),
        'priority'    => 100
    )));

    // Best Sells Product
    $wp_customize->add_section('grocery_supermarket_best_sells',array(
        'title' => esc_html__('Best Sells Option','grocery-supermarket')
    ));

    $wp_customize->add_setting('grocery_supermarket_best_sells_section_heading',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('grocery_supermarket_best_sells_section_heading',array(
        'label' => __('Heading','grocery-supermarket'),
        'section' => 'grocery_supermarket_best_sells',
        'setting' => 'grocery_supermarket_best_sells_section_heading',
        'type'    => 'text'
    ));  

    $wp_customize->add_setting('grocery_supermarket_best_sells_section_sub_heading',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('grocery_supermarket_best_sells_section_sub_heading',array(
        'label' => __('Sub Heading','grocery-supermarket'),
        'section' => 'grocery_supermarket_best_sells',
        'setting' => 'grocery_supermarket_best_sells_section_sub_heading',
        'type'    => 'text'
    )); 

    $wp_customize->add_setting('grocery_supermarket_tab_number',array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('grocery_supermarket_tab_number',array(
        'label'   => __('Types of Kitchen to show','grocery-supermarket'),
        'section' => 'grocery_supermarket_best_sells',
        'setting' => 'grocery_supermarket_tab_number',
        'type'    => 'number'
    ));

    $increse =  get_theme_mod('grocery_supermarket_tab_number');


    for($i=1; $i<= $increse; $i++) {
    

        $wp_customize->add_setting('grocery_supermarket_slideproduct_tab1title'.$i,array(
          'default' => '',
          'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('grocery_supermarket_slideproduct_tab1title'.$i,array(
          'label' => __('Tab Heading','grocery-supermarket').$i,
          'section' => 'grocery_supermarket_best_sells',
          'setting' => 'grocery_supermarket_slideproduct_tab1title'.$i,
          'type'  => 'text'
        ));
        $args = array(
           'type'                     => 'product',
            'child_of'                 => 0,
            'parent'                   => '',
            'orderby'                  => 'term_group',
            'order'                    => 'ASC',
            'hide_empty'               => false,
            'hierarchical'             => 1,
            'number'                   => '',
            'taxonomy'                 => 'product_cat',
            'pad_counts'               => false
        );
      $categories = get_categories($args);
      $cat_posts = array();
      $m = 0;
      $cat_posts[]='Select';
      foreach($categories as $product){
        if($m==0){
          $default = $product->slug;
          $m++;
        }
        $cat_posts[$product->slug] = $product->name;
      }

      $wp_customize->add_setting('grocery_supermarket_cate_tab'.$i,array(
        'default' => 'select',
        'sanitize_callback' => 'grocery_supermarket_sanitize_choices',
      ));

      $wp_customize->add_control('grocery_supermarket_cate_tab'.$i,array(
        'type'    => 'select',
        'choices' => $cat_posts,
        'label' => __('Select category to display products ','grocery-supermarket').$i,
        'section' => 'grocery_supermarket_best_sells',
      ));
    }

    // Pro Version
    $wp_customize->add_setting( 'pro_version_best_seller_setting', array(
        'sanitize_callback' => 'Grocery_Supermarket_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Grocery_Supermarket_Customize_Pro_Version ( $wp_customize,'pro_version_best_seller_setting', array(
        'section'     => 'grocery_supermarket_best_sells',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'grocery-supermarket' ),
        'description' => esc_url( GROCERY_SUPERMARKET_URL ),
        'priority'    => 100
    )));
    
    // Footer
    $wp_customize->add_section('grocery_supermarket_site_footer_section', array(
        'title' => esc_html__('Footer', 'grocery-supermarket'),
    ));

    $wp_customize->add_setting('grocery_supermarket_footer_text_setting', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('grocery_supermarket_footer_text_setting', array(
        'label' => __('Replace the footer text', 'grocery-supermarket'),
        'section' => 'grocery_supermarket_site_footer_section',
        'priority' => 1,
        'type' => 'text',
    ));

    $wp_customize->add_setting('grocery_supermarket_show_hide_copyright',array(
        'default' => true,
        'sanitize_callback' => 'grocery_supermarket_sanitize_checkbox'
    ));
    $wp_customize->add_control('grocery_supermarket_show_hide_copyright',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Copyright','grocery-supermarket'),
        'section' => 'grocery_supermarket_site_footer_section',
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_footer_setting', array(
        'sanitize_callback' => 'Grocery_Supermarket_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Grocery_Supermarket_Customize_Pro_Version ( $wp_customize,'pro_version_footer_setting', array(
        'section'     => 'grocery_supermarket_site_footer_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'grocery-supermarket' ),
        'description' => esc_url( GROCERY_SUPERMARKET_URL ),
        'priority'    => 100
    )));

    // Post Settings
     $wp_customize->add_section('grocery_supermarket_post_settings',array(
        'title' => esc_html__('Post Settings','grocery-supermarket'),
        'priority'   =>40,
    ));

    $wp_customize->add_setting('grocery_supermarket_post_page_title',array(
        'sanitize_callback' => 'grocery_supermarket_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('grocery_supermarket_post_page_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Title', 'grocery-supermarket'),
        'section'     => 'grocery_supermarket_post_settings',
        'description' => esc_html__('Check this box to enable title on post page.', 'grocery-supermarket'),
    ));

    $wp_customize->add_setting('grocery_supermarket_post_page_meta',array(
        'sanitize_callback' => 'grocery_supermarket_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('grocery_supermarket_post_page_meta',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Meta', 'grocery-supermarket'),
        'section'     => 'grocery_supermarket_post_settings',
        'description' => esc_html__('Check this box to enable meta on post page.', 'grocery-supermarket'),
    ));

    $wp_customize->add_setting('grocery_supermarket_post_page_thumb',array(
        'sanitize_callback' => 'grocery_supermarket_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('grocery_supermarket_post_page_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Thumbnail', 'grocery-supermarket'),
        'section'     => 'grocery_supermarket_post_settings',
        'description' => esc_html__('Check this box to enable thumbnail on post page.', 'grocery-supermarket'),
    ));

    $wp_customize->add_setting('grocery_supermarket_post_page_btn',array(
        'sanitize_callback' => 'grocery_supermarket_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('grocery_supermarket_post_page_btn',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Button', 'grocery-supermarket'),
        'section'     => 'grocery_supermarket_post_settings',
        'description' => esc_html__('Check this box to enable button on post page.', 'grocery-supermarket'),
    ));

    $wp_customize->add_setting('grocery_supermarket_single_post_thumb',array(
        'sanitize_callback' => 'grocery_supermarket_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('grocery_supermarket_single_post_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Thumbnail', 'grocery-supermarket'),
        'section'     => 'grocery_supermarket_post_settings',
        'description' => esc_html__('Check this box to enable post thumbnail on single post.', 'grocery-supermarket'),
    ));

    $wp_customize->add_setting('grocery_supermarket_single_post_meta',array(
        'sanitize_callback' => 'grocery_supermarket_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('grocery_supermarket_single_post_meta',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Meta', 'grocery-supermarket'),
        'section'     => 'grocery_supermarket_post_settings',
        'description' => esc_html__('Check this box to enable single post meta such as post date, author, category, comment etc.', 'grocery-supermarket'),
    ));

    $wp_customize->add_setting('grocery_supermarket_single_post_title',array(
            'sanitize_callback' => 'grocery_supermarket_sanitize_checkbox',
            'default'           => 1,
    ));
    $wp_customize->add_control('grocery_supermarket_single_post_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Title', 'grocery-supermarket'),
        'section'     => 'grocery_supermarket_post_settings',
        'description' => esc_html__('Check this box to enable title on single post.', 'grocery-supermarket'),
    ));

    $wp_customize->add_setting('grocery_supermarket_single_post_tags',array(
        'sanitize_callback' => 'grocery_supermarket_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('grocery_supermarket_single_post_tags',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Tags', 'grocery-supermarket'),
        'section'     => 'grocery_supermarket_post_settings',
        'description' => esc_html__('Check this box to enable post tags on single post.', 'grocery-supermarket'),
    ));

    // Page Settings
    $wp_customize->add_section('grocery_supermarket_page_settings',array(
        'title' => esc_html__('Page Settings','grocery-supermarket'),
        'priority'   =>50,
    ));

    $wp_customize->add_setting('grocery_supermarket_single_page_title',array(
            'sanitize_callback' => 'grocery_supermarket_sanitize_checkbox',
            'default'           => 1,
    ));
    $wp_customize->add_control('grocery_supermarket_single_page_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Page Title', 'grocery-supermarket'),
        'section'     => 'grocery_supermarket_page_settings',
        'description' => esc_html__('Check this box to enable title on single page.', 'grocery-supermarket'),
    ));

    $wp_customize->add_setting('grocery_supermarket_single_page_thumb',array(
        'sanitize_callback' => 'grocery_supermarket_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('grocery_supermarket_single_page_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Page Thumbnail', 'grocery-supermarket'),
        'section'     => 'grocery_supermarket_page_settings',
        'description' => esc_html__('Check this box to enable page thumbnail on single page.', 'grocery-supermarket'),
    ));
}
add_action('customize_register', 'grocery_supermarket_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function grocery_supermarket_customize_partial_blogname(){
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function grocery_supermarket_customize_partial_blogdescription(){
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function grocery_supermarket_customize_preview_js(){
    wp_enqueue_script('grocery-supermarket-customizer', esc_url(get_template_directory_uri()) . '/assets/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'grocery_supermarket_customize_preview_js');

/*
** Load dynamic logic for the customizer controls area.
*/
function grocery_supermarket_panels_js() {
    wp_enqueue_style( 'grocery-supermarket-customizer-layout-css', get_theme_file_uri( '/assets/css/customizer-layout.css' ) );
    wp_enqueue_script( 'grocery-supermarket-customize-layout', get_theme_file_uri( '/assets/js/customize-layout.js' ), array(), '1.2', true );
}
add_action( 'customize_controls_enqueue_scripts', 'grocery_supermarket_panels_js' );