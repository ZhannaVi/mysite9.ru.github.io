<?php 
//if ( get_theme_mod( 'shopstar-font-awesome-version', customizer_library_get_default( 'shopstar-font-awesome-version' ) ) == '4.7.0' ) {
	$font_awesome_code = 'otb-fa';
	$font_awesome_icon_prefix = 'otb-';
//} else {
//	$font_awesome_code = 'fa';
//	$font_awesome_icon_prefix = '';
//}
?>

<a class="header-cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
	<span class="header-cart-amount">
		<?php echo sprintf( _n('%d item', '%d items', WC()->cart->get_cart_contents_count(), 'shopstar'), WC()->cart->get_cart_contents_count() );?> - <?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?>
	</span>
	<span class="header-cart-checkout <?php echo ( WC()->cart->get_cart_contents_count() > 0 ) ? sanitize_html_class( 'cart-has-items' ) : ''; ?>">
		<span><?php esc_html_e('Checkout', 'shopstar'); ?></span> <i class="<?php echo $font_awesome_code; ?> <?php echo $font_awesome_icon_prefix; ?>fa-shopping-cart"></i>
	</span>
</a>
