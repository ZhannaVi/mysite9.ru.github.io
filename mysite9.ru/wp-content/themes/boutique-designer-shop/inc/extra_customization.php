<?php

	$boutique_designer_shop_custom_style= "";

	/*---------------------------Scroll-top-position -------------------*/

	$boutique_designer_shop_scroll_options = get_theme_mod( 'boutique_designer_shop_scroll_options','right_align');

    if($boutique_designer_shop_scroll_options == 'right_align'){

		$boutique_designer_shop_custom_style .='.scroll-top button{';

			$boutique_designer_shop_custom_style .='';

		$boutique_designer_shop_custom_style .='}';

	}else if($boutique_designer_shop_scroll_options == 'center_align'){

		$boutique_designer_shop_custom_style .='.scroll-top button{';

			$boutique_designer_shop_custom_style .='z-index: 999; right: 0; left:0; margin: 0 auto; top:85%;';

		$boutique_designer_shop_custom_style .='}';

	}else if($boutique_designer_shop_scroll_options == 'left_align'){

		$boutique_designer_shop_custom_style .='.scroll-top button{';

			$boutique_designer_shop_custom_style .='right: auto; left:5%; margin: 0 auto';

		$boutique_designer_shop_custom_style .='}';
	}

	/*---------------------------text-transform-------------------*/

	$boutique_designer_shop_text_transform = get_theme_mod( 'boutique_designer_shop_menu_text_transform','UPPERCASE');
    if($boutique_designer_shop_text_transform == 'CAPITALISE'){

		$boutique_designer_shop_custom_style .='nav#top_gb_menu ul li a{';

			$boutique_designer_shop_custom_style .='text-transform: capitalize ; font-size: 14px;';

		$boutique_designer_shop_custom_style .='}';

	}else if($boutique_designer_shop_text_transform == 'UPPERCASE'){

		$boutique_designer_shop_custom_style .='nav#top_gb_menu ul li a{';

			$boutique_designer_shop_custom_style .='text-transform: uppercase ; font-size: 14px;';

		$boutique_designer_shop_custom_style .='}';

	}else if($boutique_designer_shop_text_transform == 'LOWERCASE'){

		$boutique_designer_shop_custom_style .='nav#top_gb_menu ul li a{';

			$boutique_designer_shop_custom_style .='text-transform: lowercase ; font-size: 14px;';

		$boutique_designer_shop_custom_style .='}';
	}

	/*-------------------------Slider-content-alignment-------------------*/

	$boutique_designer_shop_slider_content_alignment = get_theme_mod( 'boutique_designer_shop_slider_content_alignment','LEFT-ALIGN');

	 	if($boutique_designer_shop_slider_content_alignment == 'LEFT-ALIGN'){

			$boutique_designer_shop_custom_style .='.slide-inner{';

				$boutique_designer_shop_custom_style .='text-align:left; left:15%; right:30%';

			$boutique_designer_shop_custom_style .='}';


		}else if($boutique_designer_shop_slider_content_alignment == 'CENTER-ALIGN'){

			$boutique_designer_shop_custom_style .='.slide-inner{';

				$boutique_designer_shop_custom_style .='text-align:center; left: 15%; right: 15%;';

			$boutique_designer_shop_custom_style .='}';


		}else if($boutique_designer_shop_slider_content_alignment == 'RIGHT-ALIGN'){

			$boutique_designer_shop_custom_style .='.slide-inner{';

				$boutique_designer_shop_custom_style .='text-align:right; left: 30%; right: 15%;';

			$boutique_designer_shop_custom_style .='}';

	}

	//--------------------sticky header----------------------

	if (false === get_option('boutique_designer_shop_sticky_header')) {
	    add_option('boutique_designer_shop_sticky_header', 'off');
	}

	// Define the custom CSS based on the 'boutique_designer_shop_sticky_header' option

	if (get_option('boutique_designer_shop_sticky_header', 'off') !== 'on') {
	    $boutique_designer_shop_custom_style .= '.fixed_header.fixed {';
	    $boutique_designer_shop_custom_style .= 'position: static;';
	    $boutique_designer_shop_custom_style .= '}';
	}

	if (get_option('boutique_designer_shop_sticky_header', 'off') !== 'off') {
	    $boutique_designer_shop_custom_style .= '.fixed_header.fixed {';
	    $boutique_designer_shop_custom_style .= 'position: fixed; background:#f4eee9;';
	    $boutique_designer_shop_custom_style .= '}';

	    $boutique_designer_shop_custom_style .= '.admin-bar .fixed {';
	    $boutique_designer_shop_custom_style .= ' margin-top: 32px;';
	    $boutique_designer_shop_custom_style .= '}';
	}

	//---------------------------------Logo-Max-height--------------------------

	$boutique_designer_shop_logo_max_height = get_theme_mod('boutique_designer_shop_logo_max_height','100');

	if($boutique_designer_shop_logo_max_height != false){

		$boutique_designer_shop_custom_style .='.custom-logo-link img{';

			$boutique_designer_shop_custom_style .='max-width: '.esc_html($boutique_designer_shop_logo_max_height).'px;';

		$boutique_designer_shop_custom_style .='}';
	}


	//-------------------------theme-width-options--------------------------------
	$boutique_designer_shop_theme_width = get_theme_mod( 'boutique_designer_shop_width_options','full_width');

    if($boutique_designer_shop_theme_width == 'full_width'){

		$boutique_designer_shop_custom_style .='body{';

			$boutique_designer_shop_custom_style .='max-width: 100%;';

		$boutique_designer_shop_custom_style .='}';

	}else if($boutique_designer_shop_theme_width == 'container'){

		$boutique_designer_shop_custom_style .='body{';

			$boutique_designer_shop_custom_style .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px;  margin-right: auto !important; margin-left: auto !important;';

		$boutique_designer_shop_custom_style .='}';
		

	}else if($boutique_designer_shop_theme_width == 'container_fluid'){

		$boutique_designer_shop_custom_style .='body{';

			$boutique_designer_shop_custom_style .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';

		$boutique_designer_shop_custom_style .='}';
	}


	//----------------------------theme-button-options--------------------------

	$boutique_designer_shop_theme_button_color = get_theme_mod('boutique_designer_shop_theme_button_color');

			if($boutique_designer_shop_theme_button_color != false){

		$boutique_designer_shop_custom_style .='button,input[type="button"],input[type="submit"],.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,button.search-submit,a.more-link,a.added_to_cart.wc-forward,home-btn,.site-footer .search-form .search-submit,.prev.page-numbers, .next.page-numbers, .page-numbers.current{';

			$boutique_designer_shop_custom_style .='background-color: '.esc_attr($boutique_designer_shop_theme_button_color).';';

		$boutique_designer_shop_custom_style .='}';
	}
	$boutique_designer_shop_button_border = get_theme_mod('boutique_designer_shop_button_border_radius','0');
		
		if($boutique_designer_shop_button_border != false){

				$boutique_designer_shop_custom_style .='button,input[type="button"],input[type="submit"],.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,button.search-submit,a.more-link,a.added_to_cart.wc-forward,home-btn,.site-footer .search-form .search-submit,#sidebar input[type="search"], input[type="search"], .prev.page-numbers, .next.page-numbers {';

		$boutique_designer_shop_custom_style .='border-radius: '.esc_attr(

			$boutique_designer_shop_button_border).'px;';
				
				$boutique_designer_shop_custom_style .='}';
		}


	//-----------------------------slider-button----------------------------------
		$boutique_designer_shop_slider_button_color = get_theme_mod('boutique_designer_shop_slider_button_color');

			if($boutique_designer_shop_slider_button_color != false){

		$boutique_designer_shop_custom_style .='.home-btn a {';

			$boutique_designer_shop_custom_style .='background-color: '.esc_attr($boutique_designer_shop_slider_button_color).';';

		$boutique_designer_shop_custom_style .='}';
	}
	$boutique_designer_shop_slider_button_border_radius = get_theme_mod('boutique_designer_shop_slider_button_border_radius','0');
		
		if($boutique_designer_shop_slider_button_border_radius != false){

				$boutique_designer_shop_custom_style .='.home-btn a {';

		$boutique_designer_shop_custom_style .='border-radius: '.esc_attr(

			$boutique_designer_shop_slider_button_border_radius).'px;';
				
				$boutique_designer_shop_custom_style .='}';
		}

//related products
if( get_option( 'boutique_designer_shop_related_product',true) != 'on') {

$boutique_designer_shop_custom_style .='.related.products{';

	$boutique_designer_shop_custom_style .='display: none;';
	
$boutique_designer_shop_custom_style .='}';
}

if( get_option( 'boutique_designer_shop_related_product',true) != 'off') {

$boutique_designer_shop_custom_style .='.related.products{';

	$boutique_designer_shop_custom_style .='display: block;';
	
$boutique_designer_shop_custom_style .='}';
}