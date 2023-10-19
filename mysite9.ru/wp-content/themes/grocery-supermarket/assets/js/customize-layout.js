/*
** Scripts within the customizer controls window.
*/

(function( $ ) {
	wp.customize.bind( 'ready', function() {

	/*
	** Reusable Functions
	*/
		var optPrefix = '#customize-control-grocery_supermarket_options-';
		
		// Label
		function grocery_supermarket_customizer_label( id, title ) {

			// Site Identity

			if ( id === 'custom_logo' || id === 'site_icon' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-grocery_supermarket_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// General Setting

			if ( id === 'grocery_supermarket_preloader_hide' || id === 'grocery_supermarket_scroll_hide' || id === 'grocery_supermarket_scroll_top_position' || id === 'grocery_supermarket_products_per_row' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-grocery_supermarket_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Topbar Option

			if ( id === 'grocery_supermarket_topbar_about_button' || id === 'grocery_supermarket_topbar_wishlist_button' || id === 'grocery_supermarket_topbar_order_button' || id === 'grocery_supermarket_topbar_text' )  {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-grocery_supermarket_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Colors

			if ( id === 'grocery_supermarket_theme_color' || id === 'background_color' || id === 'background_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-grocery_supermarket_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Header Image

			if ( id === 'header_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-grocery_supermarket_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			//  Header

			if ( id === 'grocery_supermarket_header_deals_button' || id === 'grocery_supermarket_header_phone_number' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-grocery_supermarket_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			//  Best Sells

			if ( id === 'grocery_supermarket_best_sells_section_heading' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-grocery_supermarket_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Slider

			if ( id === 'grocery_supermarket_top_slider_page1' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-grocery_supermarket_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Topbar

			if ( id === 'grocery_supermarket_topbar1_wishlist_button'  ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-grocery_supermarket_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Footer

			if ( id === 'grocery_supermarket_footer_text_setting' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-grocery_supermarket_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Post Setting

			if ( id === 'grocery_supermarket_post_page_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-grocery_supermarket_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Single Post Setting

			if ( id === 'grocery_supermarket_single_post_thumb' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-grocery_supermarket_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Page Setting

			if ( id === 'grocery_supermarket_single_page_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-grocery_supermarket_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}
			
		}


	/*
	** Tabs
	*/

	    // Site Identity
		grocery_supermarket_customizer_label( 'custom_logo', 'Logo Setup' );
		grocery_supermarket_customizer_label( 'site_icon', 'Favicon' );

		// Topbar Option
		grocery_supermarket_customizer_label( 'grocery_supermarket_topbar_about_button', 'About Button' );
		grocery_supermarket_customizer_label( 'grocery_supermarket_topbar_wishlist_button', 'Wishlist Button' );
		grocery_supermarket_customizer_label( 'grocery_supermarket_topbar_order_button', 'Traking Button' );
		grocery_supermarket_customizer_label( 'grocery_supermarket_topbar_text', 'Text' );

		// Colors
		grocery_supermarket_customizer_label( 'grocery_supermarket_theme_color', 'Theme Color' );
		grocery_supermarket_customizer_label( 'background_color', 'Colors' );
		grocery_supermarket_customizer_label( 'background_image', 'Image' );

		//Header Image
		grocery_supermarket_customizer_label( 'header_image', 'Header Image' );

		// Header
		grocery_supermarket_customizer_label( 'grocery_supermarket_header_deals_button', 'Header Button' );
		grocery_supermarket_customizer_label( 'grocery_supermarket_header_phone_number', 'Phone Number' );

		// Best Sells
		grocery_supermarket_customizer_label( 'grocery_supermarket_best_sells_section_heading', 'Best Sells' );

		//Slider
		grocery_supermarket_customizer_label( 'grocery_supermarket_top_slider_page1', 'Slider' );
		
		// Wishlist button
		grocery_supermarket_customizer_label( 'grocery_supermarket_topbar1_wishlist_button', 'Wishlist button' );

		//Footer
		grocery_supermarket_customizer_label( 'grocery_supermarket_footer_text_setting', 'Footer' );

		// General Setting
		grocery_supermarket_customizer_label( 'grocery_supermarket_preloader_hide', 'Preloader' );
		grocery_supermarket_customizer_label( 'grocery_supermarket_scroll_hide', 'Scroll To Top' );
		grocery_supermarket_customizer_label( 'grocery_supermarket_scroll_top_position', 'Scroll to top Position' );
		grocery_supermarket_customizer_label( 'grocery_supermarket_products_per_row', 'Woocommerce' );

		//Single Post Setting
		grocery_supermarket_customizer_label( 'grocery_supermarket_single_post_thumb', 'Single Post Setting' );

		// Post Setting
		grocery_supermarket_customizer_label( 'grocery_supermarket_post_page_title', 'Post Setting' );

		// Page Setting
		grocery_supermarket_customizer_label( 'grocery_supermarket_single_page_title', 'Page Setting' );
	

	}); // wp.customize ready

})( jQuery );
