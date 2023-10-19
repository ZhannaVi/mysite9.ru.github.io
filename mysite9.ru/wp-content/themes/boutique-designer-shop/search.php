<?php
/**
 * The template for displaying search results pages
 * 
 * @subpackage Boutique Designer Shop
 * @since 1.0
 */

get_header(); ?>

<main id="content">
	<header class="page-header">
		<?php if ( have_posts() ) : ?>
			<div class="header-image"></div>
			<div class="internal-div">
				<?php //breadcrumb
				if ( !is_page_template( 'page-template/custom-home-page.php' ) ) { 
					if( get_option('boutique_designer_shop_enable_breadcrumb',false) != 'off'){ ?>
						<div class="bread_crumb align-self-center text-center">
							<?php boutique_designer_shop_breadcrumb();  ?>
						</div>
					<?php }
				}?>
				<h1 class="page-title mt-4 text-center"><span><?php /* translators: %s: search term */
            	printf( esc_html__( 'Results For: %s','boutique-designer-shop'), esc_html( get_search_query() ) ); ?>  </span>
            	</h1>
			</div>
		<?php else : ?>
			<div class="header-image"></div>
			<div class="internal-div">
				<?php //breadcrumb
				if ( !is_page_template( 'page-template/custom-home-page.php' ) ) { 
					if( get_option('boutique_designer_shop_enable_breadcrumb',false) != 'off'){ ?>
						<div class="bread_crumb align-self-center text-center">
							<?php boutique_designer_shop_breadcrumb();  ?>
						</div>
					<?php }
				}?>
				<h2 class="page-title mt-4 text-center"><span><?php esc_html_e( 'Nothing Found', 'boutique-designer-shop' ); ?></span></h2>
			</div>
		<?php endif; ?>
	</header>
	<div class="container">
		<div class="content-area my-5">
			<div id="main" class="site-main" role="main">
		      	<div class="row m-0">				
				  <?php
					get_template_part( 'template-parts/post/post-layout' );
					?>
				</div>	
			</div>
		</div>
	</div>
</main>

<?php get_footer();