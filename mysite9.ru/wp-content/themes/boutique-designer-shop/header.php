<?php
/**
 * The header for our theme
 *
 * @subpackage Boutique Designer Shop
 * @since 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
	if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	} else {
	    do_action( 'wp_body_open' );
	}
?>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'boutique-designer-shop' ); ?></a>
	<?php if( get_option('boutique_designer_shop_theme_loader',true) != 'off'){ ?>
		<div class="preloader">
			<div class="load">
			  <hr/><hr/><hr/><hr/>
			</div>
		</div>
	<?php }?>
	<div id="page" class="site">
		<div id="header">
			<div class="wrap_figure">
				<div class="top_bar py-2 text-center text-lg-left text-md-left">
					<div class="container">
						<div class="row">
							<div class="col-lg-7 col-md-7 col-sm-12 align-self-center  text-lg-left">
								<?php if( get_option('boutique_designer_shop_tob_text_enable',false) != 'off'){ ?>
									<?php if( get_theme_mod('boutique_designer_shop_topbar_text') != '' ){ ?>
										<p class="mb-0"><?php echo esc_html(get_theme_mod('boutique_designer_shop_topbar_text','')); ?></p>
									<?php }?>
								<?php }?>
							</div>
							<div class="col-lg-5 col-md-5 col-sm-12 align-self-center">
								<?php if( get_option('boutique_designer_shop_contact_enable',false) != 'off'){ ?>
									<div class="row">
										<?php if( get_theme_mod('boutique_designer_shop_email') != ''){ ?>
											<div class="col-lg-8 col-md-7 align-self-center text-lg-right">
											<p class="mb-0"><?php echo esc_html(get_theme_mod('boutique_designer_shop_email','')); ?></p>
											</div>
										<?php }?>
										<?php if( get_theme_mod('boutique_designer_shop_call') != ''){ ?>
											<div class="col-lg-4 col-md-5  align-self-center text-lg-right">
											<p class="mb-0"><?php echo esc_html(get_theme_mod('boutique_designer_shop_call','')); ?></p>
											</div>
										<?php }?>
									</div>
								<?php }?>
							</div>
						</div>
					</div>
				</div>
				<div class="menu_header fixed_header py-3">
					<div class="container">
						<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-4 col-4 align-self-center">
								<div class="logo text-center text-md-left text-sm-left py-3 py-md-0">
							        <?php if ( has_custom_logo() ) : ?>
				            			<?php the_custom_logo(); ?>
					            	<?php endif; ?>
				              		<?php $boutique_designer_shop_blog_info = get_bloginfo( 'name' ); ?>
						                <?php if ( ! empty( $boutique_designer_shop_blog_info ) ) : ?>
						                  	<?php if ( is_front_page() && is_home() ) : ?>
												<?php if( get_option('boutique_designer_shop_logo_title',false) != 'off'){ ?>
							                    	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
												<?php }?>
							                  	<?php else : ?>
													<?php if( get_option('boutique_designer_shop_logo_title',false) != 'off'){ ?>
						                      		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
												<?php }?>
					                  		<?php endif; ?>
						                <?php endif; ?>
					                <?php
				                  		$boutique_designer_shop_description = get_bloginfo( 'description', 'display' );
					                  	if ( $boutique_designer_shop_description || is_customize_preview() ) :
					                ?>
					                <?php if( get_option('boutique_designer_shop_logo_text',true) != 'off'){ ?>
					                  	<p class="site-description">
					                    	<?php echo esc_html($boutique_designer_shop_description); ?>
					                  	</p>
					                <?php }?>
				              		<?php endif; ?>
							    </div>
							</div>
							<div class="col-lg-7 col-md-7 col-sm-4 col-4 align-self-center ">								
									<div class="toggle-menu gb_menu text-center">
										<button onclick="boutique_designer_shop_gb_Menu_open()" class="gb_toggle p-2"><i class="fas fa-ellipsis-h"></i><p class="mb-0"><?php esc_html_e('Menu','boutique-designer-shop'); ?></p></button>
									</div>
				   				<?php get_template_part('template-parts/navigation/navigation'); ?>
							</div>
							<div class="col-lg-2 col-md-2 col-sm-4 col-4  pl-0 align-self-center text-lg-right">
								<?php if( get_option('boutique_designer_shop_cart_enable',false) != 'off'){ ?>
									<?php if ( class_exists( 'WooCommerce' ) ) { ?>
										<?php global $woocommerce; ?>
										<a href="<?php echo wc_get_cart_url() ?>" class="header-cart"><i class="fas fa-shopping-cart"></i><span>CART</span><span>(<?php echo$woocommerce->cart->cart_contents_count ?>)</span></a>
									<?php }?>
								<?php }?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
