<?php
/**
 * Boutique Designer Shop: Customizer
 *
 * @subpackage Boutique Designer Shop
 * @since 1.0
 */

function boutique_designer_shop_customize_register( $wp_customize ) {

	wp_enqueue_style('customizercustom_css', esc_url( get_template_directory_uri() ). '/assets/css/customizer.css');

	// fontawesome icon-picker

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	// Add custom control.
  	require get_parent_theme_file_path( 'inc/customize/customize_toggle.php' );

  	require get_parent_theme_file_path( 'inc/switch/control_switch.php' );

  	require get_parent_theme_file_path( 'inc/custom-control.php' );
  	
	// Register the custom control type.
	$wp_customize->register_control_type( 'Boutique_Designer_Shop_Toggle_Control' );

	// Typography
	$wp_customize->add_section( 'boutique_designer_shop_typography_settings', array(
		'title'       => __( 'Typography', 'boutique-designer-shop' ),
		'priority'       => 2,
	) );

	$font_choices = array(
		'' => 'Select',
		'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
		'Open Sans:400italic,700italic,400,700' => 'Open Sans',
		'Oswald:400,700' => 'Oswald',
		'Playfair Display:400,700,400italic' => 'Playfair Display',
		'Montserrat:400,700' => 'Montserrat',
		'Raleway:400,700' => 'Raleway',
		'Droid Sans:400,700' => 'Droid Sans',
		'Lato:400,700,400italic,700italic' => 'Lato',
		'Arvo:400,700,400italic,700italic' => 'Arvo',
		'Lora:400,700,400italic,700italic' => 'Lora',
		'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
		'Oxygen:400,300,700' => 'Oxygen',
		'PT Serif:400,700' => 'PT Serif',
		'PT Sans:400,700,400italic,700italic' => 'PT Sans',
		'PT Sans Narrow:400,700' => 'PT Sans Narrow',
		'Cabin:400,700,400italic' => 'Cabin',
		'Fjalla One:400' => 'Fjalla One',
		'Francois One:400' => 'Francois One',
		'Josefin Sans:400,300,600,700' => 'Josefin Sans',
		'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
		'Arimo:400,700,400italic,700italic' => 'Arimo',
		'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
		'Bitter:400,700,400italic' => 'Bitter',
		'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
		'Roboto:400,400italic,700,700italic' => 'Roboto',
		'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
		'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
		'Roboto Slab:400,700' => 'Roboto Slab',
		'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
		'Rokkitt:400' => 'Rokkitt',
	);

	$wp_customize->add_setting( 'boutique_designer_shop_section_typo_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Boutique_Designer_Shop_Customizer_Customcontrol_Section( $wp_customize, 'boutique_designer_shop_section_typo_heading', array(
		'label'       => esc_html__( 'Typography Setting', 'boutique-designer-shop' ),
		'section'     => 'boutique_designer_shop_typography_settings',
		'settings'    => 'boutique_designer_shop_section_typo_heading',
	) ) );


	$wp_customize->add_setting( 'boutique_designer_shop_headings_text', array(
		'sanitize_callback' => 'boutique_designer_shop_sanitize_fonts',
	));
	$wp_customize->add_control( 'boutique_designer_shop_headings_text', array(
		'type' => 'select',
		'description' => __('Select your suitable font for the headings.', 'boutique-designer-shop'),
		'section' => 'boutique_designer_shop_typography_settings',
		'choices' => $font_choices
	));

	$wp_customize->add_setting( 'boutique_designer_shop_body_text', array(
		'sanitize_callback' => 'boutique_designer_shop_sanitize_fonts'
	));
	$wp_customize->add_control( 'boutique_designer_shop_body_text', array(
		'type' => 'select',
		'description' => __( 'Select your suitable font for the body.', 'boutique-designer-shop' ),
		'section' => 'boutique_designer_shop_typography_settings',
		'choices' => $font_choices
	) );

 	$wp_customize->add_section('boutique_designer_shop_pro', array(
        'title'    => __('UPGRADE DESIGNER SHOP PREMIUM', 'boutique-designer-shop'),
        'priority' => 1,
    ));

    $wp_customize->add_setting('boutique_designer_shop_pro', array(
        'default'           => null,
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control(new Boutique_Designer_Shop_Pro_Control($wp_customize, 'boutique_designer_shop_pro', array(
        'label'    => __('DESIGNER SHOP PREMIUM', 'boutique-designer-shop'),
        'section'  => 'boutique_designer_shop_pro',
        'settings' => 'boutique_designer_shop_pro',
        'priority' => 1,
    )));

	$wp_customize->add_setting('boutique_designer_shop_logo_title',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'boutique_designer_shop_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Boutique_Designer_Shop_Customizer_Customcontrol_Switch(
			$wp_customize,
			'boutique_designer_shop_logo_title',
			array(
				'settings'        => 'boutique_designer_shop_logo_title',
				'section'         => 'title_tagline',
				'label'           => __( 'Show Site Title', 'boutique-designer-shop' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'boutique-designer-shop' ),
					'off'    => __( 'Off', 'boutique-designer-shop' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting('boutique_designer_shop_logo_text',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'boutique_designer_shop_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Boutique_Designer_Shop_Customizer_Customcontrol_Switch(
			$wp_customize,
			'boutique_designer_shop_logo_text',
			array(
				'settings'        => 'boutique_designer_shop_logo_text',
				'section'         => 'title_tagline',
				'label'           => __( 'show Site Tagline', 'boutique-designer-shop' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'boutique-designer-shop' ),
					'off'    => __( 'Off', 'boutique-designer-shop' ),
				),
				'active_callback' => '',
			)
		)
	);
    $wp_customize->add_setting('boutique_designer_shop_logo_max_height',array(
		'default'=> '100',
		'transport' => 'refresh',
		'sanitize_callback' => 'boutique_designer_shop_sanitize_integer'
	));
	$wp_customize->add_control(new Boutique_Designer_Shop_Slider_Custom_Control( $wp_customize, 'boutique_designer_shop_logo_max_height',array(
		'label'	=> esc_html__('Logo Width','boutique-designer-shop'),
		'section'=> 'title_tagline',
		'settings'=>'boutique_designer_shop_logo_max_height',
		'input_attrs' => array(
			'reset'			   => 100,
            'step'             => 1,
			'min'              => 0,
			'max'              => 250,
        ),
	)));


    // Theme General Settings
    $wp_customize->add_section('boutique_designer_shop_theme_settings',array(
        'title' => __('Theme General Settings', 'boutique-designer-shop'),
        'priority' => 2,
    ) );
    $wp_customize->add_setting( 'boutique_designer_shop_sticky_header_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Boutique_Designer_Shop_Customizer_Customcontrol_Section( $wp_customize, 'boutique_designer_shop_sticky_header_heading', array(
		'label'       => esc_html__( 'Sticky Header Setting', 'boutique-designer-shop' ),
		'section'     => 'boutique_designer_shop_theme_settings',
		'settings'    => 'boutique_designer_shop_sticky_header_heading',
	) ) );

    $wp_customize->add_setting(
		'boutique_designer_shop_sticky_header',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'boutique_designer_shop_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Boutique_Designer_Shop_Customizer_Customcontrol_Switch(
			$wp_customize,
			'boutique_designer_shop_sticky_header',
			array(
				'settings'        => 'boutique_designer_shop_sticky_header',
				'section'         => 'boutique_designer_shop_theme_settings',
				'label'           => __( 'Show Sticky Header', 'boutique-designer-shop' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'boutique-designer-shop' ),
					'off'    => __( 'Off', 'boutique-designer-shop' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'boutique_designer_shop_loader_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Boutique_Designer_Shop_Customizer_Customcontrol_Section( $wp_customize, 'boutique_designer_shop_loader_heading', array(
		'label'       => esc_html__( 'Loader Setting', 'boutique-designer-shop' ),
		'section'     => 'boutique_designer_shop_theme_settings',
		'settings'    => 'boutique_designer_shop_loader_heading',
	) ) );
	$wp_customize->add_setting(
		'boutique_designer_shop_theme_loader',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'boutique_designer_shop_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Boutique_Designer_Shop_Customizer_Customcontrol_Switch(
			$wp_customize,
			'boutique_designer_shop_theme_loader',
			array(
				'settings'        => 'boutique_designer_shop_theme_loader',
				'section'         => 'boutique_designer_shop_theme_settings',
				'label'           => __( 'Show Site Loader', 'boutique-designer-shop' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'boutique-designer-shop' ),
					'off'    => __( 'Off', 'boutique-designer-shop' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'boutique_designer_shop_menu_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Boutique_Designer_Shop_Customizer_Customcontrol_Section( $wp_customize, 'boutique_designer_shop_menu_heading', array(
		'label'       => esc_html__( 'Menu Setting', 'boutique-designer-shop' ),
		'section'     => 'boutique_designer_shop_theme_settings',
		'settings'    => 'boutique_designer_shop_menu_heading',
	) ) );
	$wp_customize->add_setting('boutique_designer_shop_menu_text_transform',array(
        'default' => 'UPPERCASE',
        'sanitize_callback' => 'boutique_designer_shop_sanitize_choices'
	));
	$wp_customize->add_control('boutique_designer_shop_menu_text_transform',array(
        'type' => 'select',
        'label' => __('Menus Text Transform','boutique-designer-shop'),
        'section' => 'boutique_designer_shop_theme_settings',
        'choices' => array(
            'CAPITALISE' => __('CAPITALISE','boutique-designer-shop'),
            'UPPERCASE' => __('UPPERCASE','boutique-designer-shop'),
            'LOWERCASE' => __('LOWERCASE','boutique-designer-shop'),
        ),
	) );

	$wp_customize->add_setting( 'boutique_designer_shop_section_scroll_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Boutique_Designer_Shop_Customizer_Customcontrol_Section( $wp_customize, 'boutique_designer_shop_section_scroll_heading', array(
		'label'       => esc_html__( 'Scroll Top Setting', 'boutique-designer-shop' ),
		'section'     => 'boutique_designer_shop_theme_settings',
		'settings'    => 'boutique_designer_shop_section_scroll_heading',
	) ) );

	$wp_customize->add_setting(
			'boutique_designer_shop_scroll_enable',
			array(
				'type'                 => 'option',
				'capability'           => 'edit_theme_options',
				'theme_supports'       => '',
				'default'              => '1',
				'transport'            => 'refresh',
				'sanitize_callback'    => 'boutique_designer_shop_callback_sanitize_switch',
			)
		);
		$wp_customize->add_control(
			new Boutique_Designer_Shop_Customizer_Customcontrol_Switch(
				$wp_customize,
				'boutique_designer_shop_scroll_enable',
				array(
					'settings'        => 'boutique_designer_shop_scroll_enable',
					'section'         => 'boutique_designer_shop_theme_settings',
					'label'           => __( 'show Scroll Top', 'boutique-designer-shop' ),				
					'choices'		  => array(
						'1'      => __( 'On', 'boutique-designer-shop' ),
						'off'    => __( 'Off', 'boutique-designer-shop' ),
					),
					'active_callback' => '',
				)
			)
		);

	$wp_customize->add_setting('boutique_designer_shop_scroll_options',array(
        'default' => 'right_align',
        'sanitize_callback' => 'boutique_designer_shop_sanitize_choices'
	));
	$wp_customize->add_control('boutique_designer_shop_scroll_options',array(
        'type' => 'select',
        'label' => __('Scroll Top Alignment','boutique-designer-shop'),
        'section' => 'boutique_designer_shop_theme_settings',
        'choices' => array(
            'right_align' => __('Right Align','boutique-designer-shop'),
            'center_align' => __('Center Align','boutique-designer-shop'),
            'left_align' => __('Left Align','boutique-designer-shop'),
        ),
	) );

	$wp_customize->add_setting('boutique_designer_shop_scroll_top_icon',array(
		'default'	=> 'fas fa-chevron-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Boutique_Designer_Shop_Fontawesome_Icon_Chooser(
        $wp_customize,'boutique_designer_shop_scroll_top_icon',array(
		'label'	=> __('Add Scroll Top Icon','boutique-designer-shop'),
		'transport' => 'refresh',
		'section'	=> 'boutique_designer_shop_theme_settings',
		'setting'	=> 'boutique_designer_shop_scroll_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_section('boutique_designer_shop_breadcrumb_settings',array(
        'title' => __('Breadcrumb', 'boutique-designer-shop'),
        'priority' => 2
    ) );

	$wp_customize->add_setting( 'boutique_designer_shop_section_breadcrumb_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Boutique_Designer_Shop_Customizer_Customcontrol_Section( $wp_customize, 'boutique_designer_shop_section_breadcrumb_heading', array(
		'label'       => esc_html__( 'Breadcrumb Settings', 'boutique-designer-shop' ),
		'section'     => 'boutique_designer_shop_breadcrumb_settings',
		'settings'    => 'boutique_designer_shop_section_breadcrumb_heading',
	) ) );

	$wp_customize->add_setting(
		'boutique_designer_shop_enable_breadcrumb',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'boutique_designer_shop_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Boutique_Designer_Shop_Customizer_Customcontrol_Switch(
			$wp_customize,
			'boutique_designer_shop_enable_breadcrumb',
			array(
				'settings'        => 'boutique_designer_shop_enable_breadcrumb',
				'section'         => 'boutique_designer_shop_breadcrumb_settings',
				'label'           => __( 'Show Breadcrumb', 'boutique-designer-shop' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'boutique-designer-shop' ),
					'off'    => __( 'Off', 'boutique-designer-shop' ),
				),
				'active_callback' => '',
			)
		)
	);	

	if ( class_exists( 'WooCommerce' ) ) { 

	$wp_customize->add_section('boutique_designer_shop_wocommerce_section',array(
		'title' => __('WooCommerce Settings', 'boutique-designer-shop'),
    	'priority' => 2,
	));

	$wp_customize->add_setting( 'boutique_designer_shop_section_shoppage_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Boutique_Designer_Shop_Customizer_Customcontrol_Section( $wp_customize, 'boutique_designer_shop_section_shoppage_heading', array(
		'label'       => esc_html__( 'Sidebar Setting', 'boutique-designer-shop' ),
		'section'     => 'boutique_designer_shop_wocommerce_section',
		'settings'    => 'boutique_designer_shop_section_shoppage_heading',
	) ) );

	$wp_customize->add_setting(
		'boutique_designer_shop_shop_page_sidebar',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'boutique_designer_shop_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Boutique_Designer_Shop_Customizer_Customcontrol_Switch(
			$wp_customize,
			'boutique_designer_shop_shop_page_sidebar',
			array(
				'settings'        => 'boutique_designer_shop_shop_page_sidebar',
				'section'         => 'boutique_designer_shop_wocommerce_section',
				'label'           => __( 'Show Shop Page Sidebar', 'boutique-designer-shop' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'boutique-designer-shop' ),
					'off'    => __( 'Off', 'boutique-designer-shop' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting(
		'boutique_designer_shop_wocommerce_single_page_sidebar',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'boutique_designer_shop_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Boutique_Designer_Shop_Customizer_Customcontrol_Switch(
			$wp_customize,
			'boutique_designer_shop_wocommerce_single_page_sidebar',
			array(
				'settings'        => 'boutique_designer_shop_wocommerce_single_page_sidebar',
				'section'         => 'boutique_designer_shop_wocommerce_section',
				'label'           => __( 'Show Single Product Page Sidebar', 'boutique-designer-shop' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'boutique-designer-shop' ),
					'off'    => __( 'Off', 'boutique-designer-shop' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'boutique_designer_shop_section_archieve_product_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Boutique_Designer_Shop_Customizer_Customcontrol_Section( $wp_customize, 'boutique_designer_shop_section_archieve_product_heading', array(
		'label'       => esc_html__( 'Archieve Product Settings', 'boutique-designer-shop' ),
		'section'     => 'boutique_designer_shop_wocommerce_section',
		'settings'    => 'boutique_designer_shop_section_archieve_product_heading',
	) ) );

	$wp_customize->add_setting('boutique_designer_shop_archieve_item_columns',array(
        'default' => '3',
        'sanitize_callback' => 'boutique_designer_shop_sanitize_choices'
	));

	$wp_customize->add_control('boutique_designer_shop_archieve_item_columns',array(
        'type' => 'select',
        'label' => __('Select No of Columns','boutique-designer-shop'),
        'section' => 'boutique_designer_shop_wocommerce_section',
        'choices' => array(
            '1' => __('One Column','boutique-designer-shop'),
            '2' => __('Two Column','boutique-designer-shop'),
            '3' => __('Three Column','boutique-designer-shop'),
            '4' => __('four Column','boutique-designer-shop'),
            '5' => __('Five Column','boutique-designer-shop'),
            '6' => __('Six Column','boutique-designer-shop'),
        ),
	) );

	$wp_customize->add_setting( 'boutique_designer_shop_archieve_shop_perpage', array(
		'default'              => 6,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'boutique_designer_shop_sanitize_number_absint',
		'sanitize_js_callback' => 'absint',
	) );

	$wp_customize->add_control( 'boutique_designer_shop_archieve_shop_perpage', array(
		'label'       => esc_html__( 'Display Products','boutique-designer-shop' ),
		'section'     => 'boutique_designer_shop_wocommerce_section',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 30,
		),
	) );

	$wp_customize->add_setting( 'boutique_designer_shop_section_related_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new Boutique_Designer_Shop_Customizer_Customcontrol_Section( $wp_customize, 'boutique_designer_shop_section_related_heading', array(
		'label'       => esc_html__( 'Related Product Settings', 'boutique-designer-shop' ),
		'section'     => 'boutique_designer_shop_wocommerce_section',
		'settings'    => 'boutique_designer_shop_section_related_heading',
	) ) );

	$wp_customize->add_setting('boutique_designer_shop_related_item_columns',array(
        'default' => '3',
        'sanitize_callback' => 'boutique_designer_shop_sanitize_choices'
	));

	$wp_customize->add_control('boutique_designer_shop_related_item_columns',array(
        'type' => 'select',
        'label' => __('Select No of Columns','boutique-designer-shop'),
        'section' => 'boutique_designer_shop_wocommerce_section',
        'choices' => array(
            '1' => __('One Column','boutique-designer-shop'),
            '2' => __('Two Column','boutique-designer-shop'),
            '3' => __('Three Column','boutique-designer-shop'),
            '4' => __('four Column','boutique-designer-shop'),
            '5' => __('Five Column','boutique-designer-shop'),
            '6' => __('Six Column','boutique-designer-shop'),
        ),
	) );

	$wp_customize->add_setting( 'boutique_designer_shop_related_shop_perpage', array(
		'default'              => 3,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'boutique_designer_shop_sanitize_number_absint',
		'sanitize_js_callback' => 'absint',
	) );

	$wp_customize->add_control( 'boutique_designer_shop_related_shop_perpage', array(
		'label'       => esc_html__( 'Display Products','boutique-designer-shop' ),
		'section'     => 'boutique_designer_shop_wocommerce_section',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 10,
		),
	) );

	$wp_customize->add_setting(
		'boutique_designer_shop_related_product',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'boutique_designer_shop_callback_sanitize_switch',
		)
	);

	$wp_customize->add_control(new Boutique_Designer_Shop_Customizer_Customcontrol_Switch($wp_customize,'boutique_designer_shop_related_product',
		array(
			'settings'        => 'boutique_designer_shop_related_product',
			'section'         => 'boutique_designer_shop_wocommerce_section',
			'label'           => __( 'Show Related Products', 'boutique-designer-shop' ),				
			'choices'		  => array(
				'1'      => __( 'On', 'boutique-designer-shop' ),
				'off'    => __( 'Off', 'boutique-designer-shop' ),
			),
			'active_callback' => '',
		)
	));


}
	//theme width
	$wp_customize->add_section('boutique_designer_shop_theme_width_settings',array(
        'title' => __('Theme Width Option', 'boutique-designer-shop'),
        'priority' => 2,
    ) );

    $wp_customize->add_setting( 'boutique_designer_shop_theme_width_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Boutique_Designer_Shop_Customizer_Customcontrol_Section( $wp_customize, 'boutique_designer_shop_theme_width_heading', array(
		'label'       => esc_html__( 'Theme Width Setting', 'boutique-designer-shop' ),
		'section'     => 'boutique_designer_shop_theme_width_settings',
		'settings'    => 'boutique_designer_shop_theme_width_heading',
	) ) );

	$wp_customize->add_setting('boutique_designer_shop_width_options',array(
        'default' => 'full_width',
        'sanitize_callback' => 'boutique_designer_shop_sanitize_choices'
	));
	$wp_customize->add_control('boutique_designer_shop_width_options',array(
        'type' => 'select',
        'label' => __('Theme Width Option','boutique-designer-shop'),
        'section' => 'boutique_designer_shop_theme_width_settings',
        'choices' => array(
            'full_width' => __('fullwidth','boutique-designer-shop'),
            'container' => __('container','boutique-designer-shop'),
            'container_fluid' => __('container fluid','boutique-designer-shop'),
        ),
	) );
	//button
	$wp_customize->add_section('boutique_designer_shop_button_options',array(
        'title' => __('Button settings', 'boutique-designer-shop'),
        'priority' => 2,
    ) );
    $wp_customize->add_setting( 'boutique_designer_shop_section_theme_button_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Boutique_Designer_Shop_Customizer_Customcontrol_Section( $wp_customize, 'boutique_designer_shop_section_theme_button_heading', array(
		'label'       => esc_html__( 'Theme Buttons', 'boutique-designer-shop' ),		
		'section'     => 'boutique_designer_shop_button_options',
		'settings'    => 'boutique_designer_shop_section_theme_button_heading',
	) ) );
    $wp_customize->add_setting( 'boutique_designer_shop_theme_button_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'boutique_designer_shop_theme_button_color', array(
	    'label' => esc_html__( 'Background Color','boutique-designer-shop' ),
	    'section' => 'boutique_designer_shop_button_options',
	    'settings' => 'boutique_designer_shop_theme_button_color',
  	)));

	$wp_customize->add_setting('boutique_designer_shop_button_border_radius',array(
		'default'=> 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'boutique_designer_shop_sanitize_integer'
	));
	$wp_customize->add_control(new boutique_designer_shop_Slider_Custom_Control( $wp_customize, 'boutique_designer_shop_button_border_radius',array(
		'label' => esc_html__( 'Border Radius','boutique-designer-shop' ),
		'section'=> 'boutique_designer_shop_button_options',
		'settings'=>'boutique_designer_shop_button_border_radius',
		'input_attrs' => array(
			'reset'			   => 0,
            'step'             => 1,
			'min'              => 0,
			'max'              => 30,
        ),
	)));
	$wp_customize->add_setting( 'boutique_designer_shop_section_slider_button_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Boutique_Designer_Shop_Customizer_Customcontrol_Section( $wp_customize, 'boutique_designer_shop_section_slider_button_heading', array(
		'label'       => esc_html__( 'Slider Button', 'boutique-designer-shop' ),		
		'section'     => 'boutique_designer_shop_button_options',
		'settings'    => 'boutique_designer_shop_section_slider_button_heading',
	) ) );
    $wp_customize->add_setting( 'boutique_designer_shop_slider_button_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'boutique_designer_shop_slider_button_color', array(
	    'label' => esc_html__( 'Background Color','boutique-designer-shop' ),
	    'section' => 'boutique_designer_shop_button_options',
	    'settings' => 'boutique_designer_shop_slider_button_color',
  	)));

	$wp_customize->add_setting('boutique_designer_shop_slider_button_border_radius',array(
		'default'=> 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'boutique_designer_shop_sanitize_integer'
	));
	$wp_customize->add_control(new boutique_designer_shop_Slider_Custom_Control( $wp_customize, 'boutique_designer_shop_slider_button_border_radius',array(
		'label' => esc_html__( 'Border Radius','boutique-designer-shop' ),
		'section'=> 'boutique_designer_shop_button_options',
		'settings'=>'boutique_designer_shop_slider_button_border_radius',
		'input_attrs' => array(
			'reset'			   => 0,
            'step'             => 1,
			'min'              => 0,
			'max'              => 30,
        ),
	)));
	// Post Layouts
    $wp_customize->add_section('boutique_designer_shop_layout',array(
        'title' => __('Post Layout', 'boutique-designer-shop'),        
        'priority' => 2
    ) );

     $wp_customize->add_setting( 'boutique_designer_shop_section_post_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Boutique_Designer_Shop_Customizer_Customcontrol_Section( $wp_customize, 'boutique_designer_shop_section_post_heading', array(
		'label'       => esc_html__( 'single Post Structure', 'boutique-designer-shop' ),
		 'description' => __( 'Change the post layout from below options', 'boutique-designer-shop' ),
		'section'     => 'boutique_designer_shop_layout',
		'settings'    => 'boutique_designer_shop_section_post_heading',
	) ) );
	$wp_customize->add_setting( 'boutique_designer_shop_single_post_option',
		array(
			'default' => 'single_right_sidebar',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control( new boutique_designer_shop_Radio_Image_Control( $wp_customize, 'boutique_designer_shop_single_post_option',
			array(
				'type'=>'select',
				'label' => __( 'select Single Post Page Layout', 'boutique-designer-shop' ),
				'section' => 'boutique_designer_shop_layout',
				'choices' => array(

					'single_right_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/2column.jpg',
						'name' => __( 'Right Sidebar', 'boutique-designer-shop' )
					),
					'single_left_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/left.png',
						'name' => __( 'Left Sidebar', 'boutique-designer-shop' )
					),
					'single_full_width' => array(
						'image' => get_template_directory_uri().'/assets/images/1column.jpg',
						'name' => __( 'One Column', 'boutique-designer-shop' )
					),
				)
			)
		) );


	$wp_customize->add_setting('boutique_designer_shop_single_post_date',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'boutique_designer_shop_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Boutique_Designer_Shop_Customizer_Customcontrol_Switch(
			$wp_customize,
			'boutique_designer_shop_single_post_date',
			array(
				'settings'        => 'boutique_designer_shop_single_post_date',
				'section'         => 'boutique_designer_shop_layout',
				'label'           => __( 'Show Date', 'boutique-designer-shop' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'boutique-designer-shop' ),
					'off'    => __( 'Off', 'boutique-designer-shop' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->selective_refresh->add_partial( 'boutique_designer_shop_single_post_date', array(
		'selector' => '.date-box',
		'render_callback' => 'boutique_designer_shop_customize_partial_boutique_designer_shop_single_post_date',
	) );

	$wp_customize->add_setting('boutique_designer_shop_single_post_admin',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'boutique_designer_shop_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Boutique_Designer_Shop_Customizer_Customcontrol_Switch(
			$wp_customize,
			'boutique_designer_shop_single_post_admin',
			array(
				'settings'        => 'boutique_designer_shop_single_post_admin',
				'section'         => 'boutique_designer_shop_layout',
				'label'           => __( 'Show Author/Admin', 'boutique-designer-shop' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'boutique-designer-shop' ),
					'off'    => __( 'Off', 'boutique-designer-shop' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->selective_refresh->add_partial( 'boutique_designer_shop_single_post_admin', array(
		'selector' => '.entry-author',
		'render_callback' => 'boutique_designer_shop_customize_partial_boutique_designer_shop_single_post_admin',
	) );

	$wp_customize->add_setting('boutique_designer_shop_single_post_comment',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'boutique_designer_shop_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Boutique_Designer_Shop_Customizer_Customcontrol_Switch(
			$wp_customize,
			'boutique_designer_shop_single_post_comment',
			array(
				'settings'        => 'boutique_designer_shop_single_post_comment',
				'section'         => 'boutique_designer_shop_layout',
				'label'           => __( 'Show Comment', 'boutique-designer-shop' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'boutique-designer-shop' ),
					'off'    => __( 'Off', 'boutique-designer-shop' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting( 'boutique_designer_shop_section_archive_post_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Boutique_Designer_Shop_Customizer_Customcontrol_Section( $wp_customize, 'boutique_designer_shop_section_archive_post_heading', array(
		'label'       => esc_html__( 'Archieve Post Structure', 'boutique-designer-shop' ),
		 'description' => __( 'Change the post layout from below options', 'boutique-designer-shop' ),
		'section'     => 'boutique_designer_shop_layout',
		'settings'    => 'boutique_designer_shop_section_archive_post_heading',
	) ) );

    $wp_customize->add_setting( 'boutique_designer_shop_post_option',
			array(
				'default' => 'right_sidebar',
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control( new Boutique_Designer_Shop_Radio_Image_Control( $wp_customize, 'boutique_designer_shop_post_option',
			array(
				'type'=>'select',
				'label' => __( 'select Post Page Layout', 'boutique-designer-shop' ),
				'section' => 'boutique_designer_shop_layout',
				'choices' => array(
					'right_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/2column.jpg',
						'name' => __( 'Right Sidebar', 'boutique-designer-shop' )
					),
					'left_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/left.png',
						'name' => __( 'Left Sidebar', 'boutique-designer-shop' )
					),
					'one_column' => array(
						'image' => get_template_directory_uri().'/assets/images/1column.jpg',
						'name' => __( 'One Column', 'boutique-designer-shop' )
					),
					'three_column' => array(
						'image' => get_template_directory_uri().'/assets/images/3column.jpg',
						'name' => __( 'Three Column', 'boutique-designer-shop' )
					),
					'four_column' => array(
						'image' => get_template_directory_uri().'/assets/images/4column.jpg',
						'name' => __( 'Four Column', 'boutique-designer-shop' )
					),
					'grid_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/grid-sidebar.jpg',
						'name' => __( 'Grid-Sidebar Layout', 'boutique-designer-shop' )
					),
					'grid_left_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/grid-left.png',
						'name' => __( 'Grid-Sidebar Layout', 'boutique-designer-shop' )
					),
					'grid_post' => array(
						'image' => get_template_directory_uri().'/assets/images/grid.jpg',
						'name' => __( 'Grid Layout', 'boutique-designer-shop' )
					)
				)
			)
		) );

    $wp_customize->add_setting('boutique_designer_shop_grid_column',array(
		'default' => '3_column',
		'sanitize_callback' => 'boutique_designer_shop_sanitize_select'
	));
	$wp_customize->add_control('boutique_designer_shop_grid_column',array(
		'label' => esc_html__('Grid Post Per Row','boutique-designer-shop'),
		'section' => 'boutique_designer_shop_layout',
		'setting' => 'boutique_designer_shop_grid_column',
		'type' => 'radio',
        'choices' => array(
            '1_column' => __('1','boutique-designer-shop'),
            '2_column' => __('2','boutique-designer-shop'),
            '3_column' => __('3','boutique-designer-shop'),
            '4_column' => __('4','boutique-designer-shop'),
            '5_column' => __('6','boutique-designer-shop'),
        ),
	));

	$wp_customize->add_setting('boutique_designer_shop_date',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'boutique_designer_shop_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Boutique_Designer_Shop_Customizer_Customcontrol_Switch(
			$wp_customize,
			'boutique_designer_shop_date',
			array(
				'settings'        => 'boutique_designer_shop_date',
				'section'         => 'boutique_designer_shop_layout',
				'label'           => __( 'show Date', 'boutique-designer-shop' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'boutique-designer-shop' ),
					'off'    => __( 'Off', 'boutique-designer-shop' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->selective_refresh->add_partial( 'boutique_designer_shop_date', array(
		'selector' => '.date-box',
		'render_callback' => 'boutique_designer_shop_customize_partial_boutique_designer_shop_date',
	) );

	$wp_customize->add_setting('boutique_designer_shop_admin',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'boutique_designer_shop_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Boutique_Designer_Shop_Customizer_Customcontrol_Switch(
			$wp_customize,
			'boutique_designer_shop_admin',
			array(
				'settings'        => 'boutique_designer_shop_admin',
				'section'         => 'boutique_designer_shop_layout',
				'label'           => __( 'show Author/Admin', 'boutique-designer-shop' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'boutique-designer-shop' ),
					'off'    => __( 'Off', 'boutique-designer-shop' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->selective_refresh->add_partial( 'boutique_designer_shop_admin', array(
		'selector' => '.entry-author',
		'render_callback' => 'boutique_designer_shop_customize_partial_boutique_designer_shop_admin',
	) );

	$wp_customize->add_setting('boutique_designer_shop_comment',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'boutique_designer_shop_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Boutique_Designer_Shop_Customizer_Customcontrol_Switch(
			$wp_customize,
			'boutique_designer_shop_comment',
			array(
				'settings'        => 'boutique_designer_shop_comment',
				'section'         => 'boutique_designer_shop_layout',
				'label'           => __( 'show Comment', 'boutique-designer-shop' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'boutique-designer-shop' ),
					'off'    => __( 'Off', 'boutique-designer-shop' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->selective_refresh->add_partial( 'boutique_designer_shop_comment', array(
		'selector' => '.entry-comments',
		'render_callback' => 'boutique_designer_shop_customize_partial_boutique_designer_shop_comment',
	) );

	// Top bar
    $wp_customize->add_section('boutique_designer_shop_top',array(
        'title' => __('Header', 'boutique-designer-shop'),
        'priority' => 3
    ) );

	$wp_customize->add_setting( 'boutique_designer_shop_section_contact_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Boutique_Designer_Shop_Customizer_Customcontrol_Section( $wp_customize, 'boutique_designer_shop_section_contact_heading', array(
		'label'       => esc_html__( 'Header Settings', 'boutique-designer-shop' ),		
		'section'     => 'boutique_designer_shop_top',
		'settings'    => 'boutique_designer_shop_section_contact_heading',
	) ) );

	$wp_customize->add_setting(
		'boutique_designer_shop_tob_text_enable',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'boutique_designer_shop_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Boutique_Designer_Shop_Customizer_Customcontrol_Switch(
			$wp_customize,
			'boutique_designer_shop_tob_text_enable',
			array(
				'settings'        => 'boutique_designer_shop_tob_text_enable',
				'section'         => 'boutique_designer_shop_top',
				'label'           => __( 'Check to show Header Text', 'boutique-designer-shop' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'boutique-designer-shop' ),
					'off'    => __( 'Off', 'boutique-designer-shop' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting('boutique_designer_shop_topbar_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('boutique_designer_shop_topbar_text',array(
		'label' => esc_html__('Add Text','boutique-designer-shop'),
		'section' => 'boutique_designer_shop_top',
		'setting' => 'boutique_designer_shop_topbar_text',
		'type'    => 'text'
	));

		$wp_customize->add_setting(
		'boutique_designer_shop_contact_enable',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'boutique_designer_shop_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Boutique_Designer_Shop_Customizer_Customcontrol_Switch(
			$wp_customize,
			'boutique_designer_shop_contact_enable',
			array(
				'settings'        => 'boutique_designer_shop_contact_enable',
				'section'         => 'boutique_designer_shop_top',
				'label'           => __( 'Check to show contact details', 'boutique-designer-shop' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'boutique-designer-shop' ),
					'off'    => __( 'Off', 'boutique-designer-shop' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting('boutique_designer_shop_email',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_email'
	));
	$wp_customize->add_control('boutique_designer_shop_email',array(
		'label' => esc_html__('Add Email Address','boutique-designer-shop'),
		'section' => 'boutique_designer_shop_top',
		'setting' => 'boutique_designer_shop_email',
		'type'    => 'text',
	));

	$wp_customize->add_setting('boutique_designer_shop_call',array(
		'default' => '',
		'sanitize_callback' => 'boutique_designer_shop_sanitize_phone_number'
	));
	$wp_customize->add_control('boutique_designer_shop_call',array(
		'label' => esc_html__('Add Phone No','boutique-designer-shop'),
		'section' => 'boutique_designer_shop_top',
		'setting' => 'boutique_designer_shop_call',
		'type'    => 'text',
	));
	if ( class_exists( 'WooCommerce' ) ) { 
		$wp_customize->add_setting(
		'boutique_designer_shop_cart_enable',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'boutique_designer_shop_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Boutique_Designer_Shop_Customizer_Customcontrol_Switch(
			$wp_customize,
			'boutique_designer_shop_cart_enable',
			array(
				'settings'        => 'boutique_designer_shop_cart_enable',
				'section'         => 'boutique_designer_shop_top',
				'label'           => __( 'Check to show Header Cart', 'boutique-designer-shop' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'boutique-designer-shop' ),
					'off'    => __( 'Off', 'boutique-designer-shop' ),
				),
				'active_callback' => '',
			)
		)
	);
}

    //slider
	$wp_customize->add_section( 'boutique_designer_shop_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'boutique-designer-shop' ),
    	'priority'   => 3,
	) );

	$wp_customize->add_setting( 'boutique_designer_shop_section_slide_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Boutique_Designer_Shop_Customizer_Customcontrol_Section( $wp_customize, 'boutique_designer_shop_section_slide_heading', array(
		'label'       => esc_html__( 'Slider Settings', 'boutique-designer-shop' ),
		'description' => __( 'Slider Image Dimension ( 1600px x 650px )', 'boutique-designer-shop' ),		
		'section'     => 'boutique_designer_shop_slider_section',
		'settings'    => 'boutique_designer_shop_section_slide_heading',
	) ) );

	$wp_customize->add_setting(
		'boutique_designer_shop_slider_arrows',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'boutique_designer_shop_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Boutique_Designer_Shop_Customizer_Customcontrol_Switch(
			$wp_customize,
			'boutique_designer_shop_slider_arrows',
			array(
				'settings'        => 'boutique_designer_shop_slider_arrows',
				'section'         => 'boutique_designer_shop_slider_section',
				'label'           => __( 'Check To Show Slider', 'boutique-designer-shop' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'boutique-designer-shop' ),
					'off'    => __( 'Off', 'boutique-designer-shop' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('boutique_designer_shop_slide_heading',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('boutique_designer_shop_slide_heading',array(
		'label' => esc_html__('Slider Text','boutique-designer-shop'),
		'section' => 'boutique_designer_shop_slider_section',
		'setting' => 'boutique_designer_shop_slide_heading',
		'type'    => 'text',
		'active_callback' => 'boutique_designer_shop_slider_dropdown',
	));
	$args = array('numberposts' => -1);
	$post_list = get_posts($args);
	$i = 0;
	$pst_sls[]= __('Select','boutique-designer-shop');
	foreach ($post_list as $key => $p_post) {
		$pst_sls[$p_post->ID]=$p_post->post_title;
	}
	for ( $i = 1; $i <= 4; $i++ ) {
		$wp_customize->add_setting('boutique_designer_shop_post_setting'.$i,array(
			'sanitize_callback' => 'boutique_designer_shop_sanitize_select',
		));
		$wp_customize->add_control('boutique_designer_shop_post_setting'.$i,array(
			'type'    => 'select',
			'choices' => $pst_sls,
			'label' => __('Select post','boutique-designer-shop'),
			'section' => 'boutique_designer_shop_slider_section',
			'active_callback' => 'boutique_designer_shop_slider_dropdown',
		));
	}
	wp_reset_postdata();

	$wp_customize->add_setting('boutique_designer_shop_slider_content_alignment',array(
        'default' => 'LEFT-ALIGN',
        'sanitize_callback' => 'boutique_designer_shop_sanitize_choices'
	));
	$wp_customize->add_control('boutique_designer_shop_slider_content_alignment',array(
        'type' => 'select',
        'label' => __('Slider Content Alignment','boutique-designer-shop'),
        'section' => 'boutique_designer_shop_slider_section',
        'choices' => array(
            'LEFT-ALIGN' => __('LEFT-ALIGN','boutique-designer-shop'),
            'CENTER-ALIGN' => __('CENTER-ALIGN','boutique-designer-shop'),
            'RIGHT-ALIGN' => __('RIGHT-ALIGN','boutique-designer-shop'),),
        'active_callback' => 'boutique_designer_shop_slider_dropdown',
	) );
	
	// Product
	$wp_customize->add_section('boutique_designer_shop_millions_of_hours_section',array(
		'title'	=> __('Product Settings','boutique-designer-shop'),
		'priority'	=> 4,
	));
	$wp_customize->add_setting( 'boutique_designer_shop_section_product_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Boutique_Designer_Shop_Customizer_Customcontrol_Section( $wp_customize, 'boutique_designer_shop_section_product_heading', array(
		'label'       => esc_html__( 'Product Settings', 'boutique-designer-shop' ),	
		'section'     => 'boutique_designer_shop_millions_of_hours_section',
		'settings'    => 'boutique_designer_shop_section_product_heading',
	) ) );
	$wp_customize->add_setting(
		'boutique_designer_shop_product_enable',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'boutique_designer_shop_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Boutique_Designer_Shop_Customizer_Customcontrol_Switch(
			$wp_customize,
			'boutique_designer_shop_product_enable',
			array(
				'settings'        => 'boutique_designer_shop_product_enable',
				'section'         => 'boutique_designer_shop_millions_of_hours_section',
				'label'           => __( 'Check To Show Product Settings', 'boutique-designer-shop' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'boutique-designer-shop' ),
					'off'    => __( 'Off', 'boutique-designer-shop' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->selective_refresh->add_partial( 'boutique_designer_shop_millions_of_hours_heading', array(
		'selector' => '#millions-of-hours h3',
		'render_callback' => 'boutique_designer_shop_customize_partial_boutique_designer_shop_millions_of_hours_heading',
	) );

	$wp_customize->add_setting('boutique_designer_shop_millions_of_hours_sub_heading',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('boutique_designer_shop_millions_of_hours_sub_heading',array(
		'type' => 'text',
		'label' => __('Sub Heading Text','boutique-designer-shop'),
		'section' => 'boutique_designer_shop_millions_of_hours_section',
		'active_callback' => 'boutique_designer_shop_product_dropdown'
	));

	$wp_customize->add_setting('boutique_designer_shop_millions_of_hours_heading',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('boutique_designer_shop_millions_of_hours_heading',array(
		'type' => 'text',
		'label' => __('Heading Text','boutique-designer-shop'),
		'section' => 'boutique_designer_shop_millions_of_hours_section',
		'active_callback' => 'boutique_designer_shop_product_dropdown'
	));
	

	// Product settings
	$boutique_designer_shop_args = array(
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
	$categories = get_categories($boutique_designer_shop_args);
	$cat_posts = array();
	$m = 0;
	$cat_posts[]='Select';
	foreach($categories as $category){
	if($m==0){
		$default = $category->slug;
			$m++;
		}
		$cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('boutique_designer_shop_millions_of_hours_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'boutique_designer_shop_sanitize_select',
	));
	$wp_customize->add_control('boutique_designer_shop_millions_of_hours_category',array(
		'type'    => 'select',
		'choices' => $cat_posts,
		'label' => __('Select category to display products ','boutique-designer-shop'),
		'section' => 'boutique_designer_shop_millions_of_hours_section',
		'active_callback' => 'boutique_designer_shop_product_dropdown'
	));

	//Footer
    $wp_customize->add_section( 'boutique_designer_shop_footer_copyright', array(
    	'title'      => esc_html__( 'Footer Text', 'boutique-designer-shop' ),
    	'priority' => 6
	) );

	$wp_customize->add_setting( 'boutique_designer_shop_section_footer_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Boutique_Designer_Shop_Customizer_Customcontrol_Section( $wp_customize, 'boutique_designer_shop_section_footer_heading', array(
		'label'       => esc_html__( 'Footer Setting', 'boutique-designer-shop' ),		
		'section'     => 'boutique_designer_shop_footer_copyright',
		'settings'    => 'boutique_designer_shop_section_footer_heading',
	) ) );

    $wp_customize->add_setting('boutique_designer_shop_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('boutique_designer_shop_footer_text',array(
		'label'	=> esc_html__('Copyright Text','boutique-designer-shop'),
		'section'	=> 'boutique_designer_shop_footer_copyright',
		'type'		=> 'text'
	));

	$wp_customize->selective_refresh->add_partial( 'boutique_designer_shop_footer_text', array(
	  'selector' => '.site-info',
	  'render_callback' => 'boutique_designer_shop_customize_partial_boutique_designer_shop_footer_text',
	) );

	$wp_customize->add_setting('boutique_designer_shop_footer_widget',array(
		'default' => '4',
		'sanitize_callback' => 'boutique_designer_shop_sanitize_select'
	));
	$wp_customize->add_control('boutique_designer_shop_footer_widget',array(
		'label' => esc_html__('Footer Per Column','boutique-designer-shop'),
		'section' => 'boutique_designer_shop_footer_copyright',
		'setting' => 'boutique_designer_shop_footer_widget',
		'type' => 'radio',
		'choices' => array(
			'1'   => __('1 Column', 'boutique-designer-shop'),
			'2'  => __('2 Column', 'boutique-designer-shop'),
			'3' => __('3 Column', 'boutique-designer-shop'),
			'4' => __('4 Column', 'boutique-designer-shop')
		),
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'boutique_designer_shop_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'boutique_designer_shop_customize_partial_blogdescription',
	) );

	//front page
	$num_sections = apply_filters( 'boutique_designer_shop_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting( 'panel_' . $i, array(
			'default'           => false,
			'sanitize_callback' => 'boutique_designer_shop_sanitize_dropdown_pages',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( 'panel_' . $i, array(
			/* translators: %d is the front page section number */
			'label'          => sprintf( __( 'Front Page Section %d Content', 'boutique-designer-shop' ), $i ),
			'description'    => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'boutique-designer-shop' ) ),
			'section'        => 'theme_options',
			'type'           => 'dropdown-pages',
			'allow_addition' => true,
			'active_callback' => 'boutique_designer_shop_is_static_front_page',
		) );

		$wp_customize->selective_refresh->add_partial( 'panel_' . $i, array(
			'selector'            => '#panel' . $i,
			'render_callback'     => 'boutique_designer_shop_front_page_section',
			'container_inclusive' => true,
		) );
	}
}
add_action( 'customize_register', 'boutique_designer_shop_customize_register' );

function boutique_designer_shop_customize_partial_blogname() {
	bloginfo( 'name' );
}
function boutique_designer_shop_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
function boutique_designer_shop_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}
function boutique_designer_shop_is_view_with_layout_option() {
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

define('BOUTIQUE_DESIGNER_SHOP_PRO_LINK',__('https://www.ovationthemes.com/wordpress/designer-shop-wordpress-theme/','boutique-designer-shop'));

/* Pro control */
if (class_exists('WP_Customize_Control') && !class_exists('Boutique_Designer_Shop_Pro_Control')):
    class Boutique_Designer_Shop_Pro_Control extends WP_Customize_Control{

    public function render_content(){?>
        <label style="overflow: hidden; zoom: 1;">
	        <div class="col-md upsell-btn">
                <a href="<?php echo esc_url( BOUTIQUE_DESIGNER_SHOP_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE DESIGNER SHOP PREMIUM','boutique-designer-shop');?> </a>
	        </div>
            <div class="col-md">
                <img class="boutique_designer_shop_img_responsive " src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png">
            </div>
	        <div class="col-md">
	            <h3 style="margin-top:10px; margin-left: 20px; text-decoration:underline; color:#333;"><?php esc_html_e('BOUTIQUE DESIGNER SHOP PREMIUM - Features', 'boutique-designer-shop'); ?></h3>
                <ul style="padding-top:10px">
                    <li class="upsell-boutique_designer_shop"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Responsive Design', 'boutique-designer-shop');?> </li>
                    <li class="upsell-boutique_designer_shop"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Boxed or fullwidth layout', 'boutique-designer-shop');?> </li>
                    <li class="upsell-boutique_designer_shop"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Shortcode Support', 'boutique-designer-shop');?> </li>
                    <li class="upsell-boutique_designer_shop"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Demo Importer', 'boutique-designer-shop');?> </li>
                    <li class="upsell-boutique_designer_shop"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Section Reordering', 'boutique-designer-shop');?> </li>
                    <li class="upsell-boutique_designer_shop"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Contact Page Template', 'boutique-designer-shop');?> </li>
                    <li class="upsell-boutique_designer_shop"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multiple Blog Layouts', 'boutique-designer-shop');?> </li>
                    <li class="upsell-boutique_designer_shop"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Unlimited Color Options', 'boutique-designer-shop');?> </li>
                    <li class="upsell-boutique_designer_shop"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Designed with HTML5 and CSS3', 'boutique-designer-shop');?> </li>
                    <li class="upsell-boutique_designer_shop"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Customizable Design & Code', 'boutique-designer-shop');?> </li>
                    <li class="upsell-boutique_designer_shop"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Cross Browser Support', 'boutique-designer-shop');?> </li>
                    <li class="upsell-boutique_designer_shop"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Detailed Documentation Included', 'boutique-designer-shop');?> </li>
                    <li class="upsell-boutique_designer_shop"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Stylish Custom Widgets', 'boutique-designer-shop');?> </li>
                    <li class="upsell-boutique_designer_shop"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Patterns Background', 'boutique-designer-shop');?> </li>
                    <li class="upsell-boutique_designer_shop"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('WPML Compatible (Translation Ready)', 'boutique-designer-shop');?> </li>
                    <li class="upsell-boutique_designer_shop"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Woo-commerce Compatible', 'boutique-designer-shop');?> </li>
                    <li class="upsell-boutique_designer_shop"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Full Support', 'boutique-designer-shop');?> </li>
                    <li class="upsell-boutique_designer_shop"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('10+ Sections', 'boutique-designer-shop');?> </li>
                    <li class="upsell-boutique_designer_shop"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Live Customizer', 'boutique-designer-shop');?> </li>
                   	<li class="upsell-boutique_designer_shop"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('AMP Ready', 'boutique-designer-shop');?> </li>
                   	<li class="upsell-boutique_designer_shop"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Clean Code', 'boutique-designer-shop');?> </li>
                   	<li class="upsell-boutique_designer_shop"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('SEO Friendly', 'boutique-designer-shop');?> </li>
                   	<li class="upsell-boutique_designer_shop"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Supper Fast', 'boutique-designer-shop');?> </li>
                </ul>
        	</div>
		    <div class="col-md upsell-btn upsell-btn-bottom">
	            <a href="<?php echo esc_url( BOUTIQUE_DESIGNER_SHOP_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE DESIGNER SHOP PREMIUM','boutique-designer-shop');?> </a>
		    </div>
		    
        </label>
    <?php } }
endif;
