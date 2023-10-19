<?php

add_action( 'admin_menu', 'boutique_designer_shop_gettingstarted' );
function boutique_designer_shop_gettingstarted() {
	add_theme_page( esc_html__('Theme Documentation', 'boutique-designer-shop'), esc_html__('Theme Documentation', 'boutique-designer-shop'), 'edit_theme_options', 'boutique-designer-shop-guide-page', 'boutique_designer_shop_guide');
}

function boutique_designer_shop_admin_theme_style() {
   wp_enqueue_style('boutique-designer-shop-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/dashboard/dashboard.css');
}
add_action('admin_enqueue_scripts', 'boutique_designer_shop_admin_theme_style');

if ( ! defined( 'BOUTIQUE_DESIGNER_SHOP_SUPPORT' ) ) {
	define('BOUTIQUE_DESIGNER_SHOP_SUPPORT',__('https://wordpress.org/support/theme/boutique-designer-shop/','boutique-designer-shop'));
}
if ( ! defined( 'BOUTIQUE_DESIGNER_SHOP_REVIEW' ) ) {
	define('BOUTIQUE_DESIGNER_SHOP_REVIEW',__('https://wordpress.org/support/theme/boutique-designer-shop/reviews/','boutique-designer-shop'));
}
if ( ! defined( 'BOUTIQUE_DESIGNER_SHOP_LIVE_DEMO' ) ) {
define('BOUTIQUE_DESIGNER_SHOP_LIVE_DEMO',__('https://www.ovationthemes.com/demos/boutique-designer-shop/','boutique-designer-shop'));
}
if ( ! defined( 'BOUTIQUE_DESIGNER_SHOP_BUY_PRO' ) ) {
define('BOUTIQUE_DESIGNER_SHOP_BUY_PRO',__('https://www.ovationthemes.com/wordpress/designer-shop-wordpress-theme/','boutique-designer-shop'));
}
if ( ! defined( 'BOUTIQUE_DESIGNER_SHOP_PRO_DOC' ) ) {
define('BOUTIQUE_DESIGNER_SHOP_PRO_DOC',__('https://www.ovationthemes.com/docs/ot-boutique-designer-shop-pro-doc/','boutique-designer-shop'));
}
if ( ! defined( 'BOUTIQUE_DESIGNER_SHOP_THEME_NAME' ) ) {
define('BOUTIQUE_DESIGNER_SHOP_THEME_NAME',__('Premium Designer Shop Theme','boutique-designer-shop'));
}

/**
 * Theme Info Page
 */
function boutique_designer_shop_guide() {

	// Theme info
	$return = add_query_arg( array()) ;
	$boutique_designer_shop_theme = wp_get_theme(); ?>

	<div class="getting-started__header">
		<div class="col-md-10">
			<h2><?php echo esc_html( $boutique_designer_shop_theme ); ?></h2>
			<p><?php esc_html_e('Version: ', 'boutique-designer-shop'); ?><?php echo esc_html($boutique_designer_shop_theme['Version']);?></p>
		</div>
		<div class="col-md-2">
			<div class="btn_box">
				<a class="button-primary" href="<?php echo esc_url( BOUTIQUE_DESIGNER_SHOP_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support', 'boutique-designer-shop'); ?></a>
				<a class="button-primary" href="<?php echo esc_url( BOUTIQUE_DESIGNER_SHOP_REVIEW ); ?>" target="_blank"><?php esc_html_e('Review', 'boutique-designer-shop'); ?></a>
			</div>
		</div>
	</div>

	<div class="wrap getting-started">
		<div class="container">
			<div class="col-md-9">
				<div class="leftbox">
					<h3><?php esc_html_e('Documentation','boutique-designer-shop'); ?></h3>
					<p><?php esc_html_e('To setup the Boutique Designer Shop theme follow the below steps.','boutique-designer-shop'); ?></p>

					<h4><?php esc_html_e('1. Setup Logo','boutique-designer-shop'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Site Identity >> Upload your logo or Add site title and site description.','boutique-designer-shop'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','boutique-designer-shop'); ?></a>

					<h4><?php esc_html_e('2. Setup Contact Info','boutique-designer-shop'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Contact info >> Add your phone number and email address.','boutique-designer-shop'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=boutique_designer_shop_top') ); ?>" target="_blank"><?php esc_html_e('Add Contact Info','boutique-designer-shop'); ?></a>

					<h4><?php esc_html_e('3. Setup Menus','boutique-designer-shop'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Menus >> Create Menus >> Add pages, post or custom link then save it.','boutique-designer-shop'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Add Menus','boutique-designer-shop'); ?></a>

					<h4><?php esc_html_e('4. Setup Footer','boutique-designer-shop'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Widgets >> Add widgets in footer 1, footer 2, footer 3, footer 4. >> ','boutique-designer-shop'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widgets','boutique-designer-shop'); ?></a>

					<h4><?php esc_html_e('5. Setup Footer Text','boutique-designer-shop'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Footer Text >> Add copyright text. >> ','boutique-designer-shop'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=boutique_designer_shop_footer_copyright') ); ?>" target="_blank"><?php esc_html_e('Footer Text','boutique-designer-shop'); ?></a>

					<h3><?php esc_html_e('Setup Home Page','boutique-designer-shop'); ?></h3>
					<p><?php esc_html_e('To step the home page follow the below steps.','boutique-designer-shop'); ?></p>

					<h4><?php esc_html_e('1. Setup Page','boutique-designer-shop'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Pages >> Add New Page >> Select "Custom Home Page" from templates >> Publish it.','boutique-designer-shop'); ?></p>
					<a class="dashboard_add_new_page button-primary"><?php esc_html_e('Add New Page','boutique-designer-shop'); ?></a>

					<h4><?php esc_html_e('2. Setup Slider','boutique-designer-shop'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Post >> Add New Post >> Add title, content and featured image >> Publish it.','boutique-designer-shop'); ?></p>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Slider Settings >> Select post.','boutique-designer-shop'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=boutique_designer_shop_slider_section') ); ?>" target="_blank"><?php esc_html_e('Add Slider','boutique-designer-shop'); ?></a>

					<h4><?php esc_html_e('4. Setup products','boutique-designer-shop'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> products>> Category >> Add New category >>Add Product >> Add title, content, select product category and featured image >> Publish it.','boutique-designer-shop'); ?></p>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> product Settings >> Add section heading and select product category.','boutique-designer-shop'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=boutique_designer_shop_millions_of_hours_section') ); ?>" target="_blank"><?php esc_html_e('Add products','boutique-designer-shop'); ?></a>
				</div>
          	</div>
			<div class="col-md-3">
				<h3><?php echo esc_html(BOUTIQUE_DESIGNER_SHOP_THEME_NAME); ?></h3>
				<img class="boutique_designer_shop_img_responsive" style="width: 100%;" src="<?php echo esc_url( $boutique_designer_shop_theme->get_screenshot() ); ?>" />
				<div class="pro-links">
					<hr>
					<a class="button-primary buynow" href="<?php echo esc_url( BOUTIQUE_DESIGNER_SHOP_BUY_PRO ); ?>" target="_blank"><?php esc_html_e('Buy Now', 'boutique-designer-shop'); ?></a>
			    	<a class="button-primary livedemo" href="<?php echo esc_url( BOUTIQUE_DESIGNER_SHOP_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'boutique-designer-shop'); ?></a>
					<a class="button-primary docs" href="<?php echo esc_url( BOUTIQUE_DESIGNER_SHOP_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'boutique-designer-shop'); ?></a>
					<hr>
				</div>
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
		</div>
	</div>

<?php }?>
