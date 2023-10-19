<?php
//if ( get_theme_mod( 'shopstar-font-awesome-version', customizer_library_get_default( 'shopstar-font-awesome-version' ) ) == '4.7.0' ) {
	$font_awesome_code = 'otb-fa';
	$font_awesome_brand_code = 'otb-fa';
	$font_awesome_custom_icon_style_code = 'otb-fa';
	$font_awesome_icon_prefix = 'otb-';
//} else {
//	$font_awesome_code = 'fa';
//	$font_awesome_brand_code = 'fab';
//	$font_awesome_custom_icon_style_code = get_theme_mod( 'shopstar-social-custom-icon-style-code', customizer_library_get_default( 'shopstar-social-custom-icon-style-code' ) );
//	$font_awesome_icon_prefix = '';
//}
?>

<ul class="social-icons">
<?php
if( get_theme_mod( 'shopstar-social-email', customizer_library_get_default( 'shopstar-social-email' ) ) != '' ) :
    echo '<li><a href="' . esc_attr( 'mailto:' . antispambot( get_theme_mod( 'shopstar-social-email' ), 1 ) ) . '" target="_blank" rel="noopener" title="' . __( 'Send us an email', 'shopstar' ) . '" class="email"><i class="' .$font_awesome_code. ' ' .$font_awesome_icon_prefix. 'fa-envelope"></i></a></li>';
endif;

if( get_theme_mod( 'shopstar-social-skype', customizer_library_get_default( 'shopstar-social-skype' ) ) != '' ) :
    echo '<li><a href="skype:' . esc_attr( get_theme_mod( 'shopstar-social-skype' ) ) . '?userinfo" rel="noopener" title="' . __( 'Contact us on Skype', 'shopstar' ) . '" class="skype"><i class="' .$font_awesome_brand_code. ' ' .$font_awesome_icon_prefix. 'fa-skype"></i></a></li>';
endif;

if( get_theme_mod( 'shopstar-social-tumblr', customizer_library_get_default( 'shopstar-social-tumblr' ) ) != '' ) :
    echo '<li><a href="' . esc_url( get_theme_mod( 'shopstar-social-tumblr' ) ) . '" target="_blank" rel="noopener" title="' . __( 'Find us on Tumblr', 'shopstar' ) . '" class="tumblr"><i class="' .$font_awesome_brand_code. ' ' .$font_awesome_icon_prefix. 'fa-tumblr"></i></a></li>';
endif;

if( get_theme_mod( 'shopstar-social-flickr', customizer_library_get_default( 'shopstar-social-flickr' ) ) != '' ) :
    echo '<li><a href="' . esc_url( get_theme_mod( 'shopstar-social-flickr' ) ) . '" target="_blank" rel="noopener" title="' . __( 'Find us on Flickr', 'shopstar' ) . '" class="flickr"><i class="' .$font_awesome_brand_code. ' ' .$font_awesome_icon_prefix. 'fa-flickr"></i></a></li>';
endif;
?>
</ul>