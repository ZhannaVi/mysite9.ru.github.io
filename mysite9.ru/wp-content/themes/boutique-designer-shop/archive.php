<?php
/**
 * The template for displaying archive pages
 *
 * @subpackage Boutique Designer Shop
 * @since 1.0
 */

get_header(); ?>

<main id="content">
			<?php if ( have_posts() ) : ?>
			<header class="page-header">
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
					<?php
						the_archive_title( '<h1 class="page-title mt-4 text-center"><span>', '</span></h1>' );
						the_archive_description( '<div class="taxonomy-description mt-4 text-center">', '</div>' );
					?>
				</div>
			</header>
		<?php endif; ?>
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