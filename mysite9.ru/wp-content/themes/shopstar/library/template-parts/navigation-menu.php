<?php
if ( function_exists( 'max_mega_menu_is_enabled' ) && max_mega_menu_is_enabled( 'primary' ) ) {
?>
<nav id="site-navigation" class="main-navigation-mega-menu" style="background: linear-gradient(to bottom, <?php echo( mmm_get_theme_for_location('primary')['container_background_from'] ); ?>, <?php echo( mmm_get_theme_for_location('primary')['container_background_to'] ); ?>);" role="navigation">
	<div id="main-menu" class="container">
		<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
	</div>
</nav><!-- #site-navigation -->
<?php
} else {
	//if ( get_theme_mod( 'shopstar-font-awesome-version', customizer_library_get_default( 'shopstar-font-awesome-version' ) ) == '4.7.0' ) {
		$font_awesome_code = 'otb-fa';
		$font_awesome_icon_prefix = 'otb-';
	//} else {
	//	$font_awesome_code = 'fa-solid';
	//	$font_awesome_icon_prefix = '';
	//}
?>
<nav id="site-navigation" class="main-navigation <?php echo ( !is_front_page() || ( get_theme_mod( 'shopstar-slider-type', customizer_library_get_default( 'shopstar-slider-type' ) ) == 'shopstar-no-slider' && !get_header_image() ) ) ? 'bottom-border mobile' : 'bottom-border'; ?>" role="navigation">
	<span class="menu-toggle" aria-expanded="false">
		<i class="<?php echo esc_attr( $font_awesome_code ); ?> <?php echo esc_attr( $font_awesome_icon_prefix ); ?>fa-bars"></i>
	</span>
	
	<div id="main-menu" class="container shopstar-mobile-menu-primary-color-scheme <?php echo ( !is_front_page() || ( get_theme_mod( 'shopstar-slider-type', customizer_library_get_default( 'shopstar-slider-type' ) ) == 'shopstar-no-slider' && !get_header_image() ) ) ? 'bottom-border' : ''; ?>">
	    <div class="padder">
	
			<div class="close-button"><i class="<?php echo esc_attr( $font_awesome_code ); ?> <?php echo esc_attr( $font_awesome_icon_prefix ); ?>fa-angle-right"></i><i class="<?php echo esc_attr( $font_awesome_code ); ?> <?php echo esc_attr( $font_awesome_icon_prefix ); ?>fa-angle-left"></i></div>
			<div class="main-navigation-inner">
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
	        </div>
			<?php if( get_theme_mod( 'shopstar-header-search', customizer_library_get_default( 'shopstar-header-search' ) ) ) : ?>
	        <span class="search-button">
	        	<a><?php echo __( 'Search', 'shopstar' ); ?> <i class="<?php echo esc_attr( $font_awesome_code ); ?> <?php echo esc_attr( $font_awesome_icon_prefix ); ?>fa-search search-btn"></i></a>
	        </span>
	        <?php endif; ?>
	
			<div class="search-slidedown">
				<div class="container">
					<div class="padder">
						<div class="search-block">
						<?php
						if( get_theme_mod( 'shopstar-header-search', customizer_library_get_default( 'shopstar-header-search' ) ) ) :
							get_search_form();
						endif;
						?>
						</div>
					</div>
				</div>
			</div>
		
		</div>	        
	</div>
</nav><!-- #site-navigation -->
<?php 
}
