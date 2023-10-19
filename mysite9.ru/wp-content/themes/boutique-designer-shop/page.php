<?php
/**
 * The template for displaying all pages
 * 
 * @subpackage Boutique Designer Shop
 * @since 1.0
 */

get_header(); ?>

<main id="content" class="site-main" role="main">
	<?php while ( have_posts() ) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" class="outer-div">
			<div class="single-post-image">
				<?php the_post_thumbnail(); ?>
			</div>
			<div class="inner-div">
	    		<?php //breadcrumb
				if ( !is_page_template( 'page-template/custom-home-page.php' ) ) { 
					if( get_option('boutique_designer_shop_enable_breadcrumb',false) != 'off'){ ?>
						<div class="bread_crumb align-self-center text-center">
							<?php boutique_designer_shop_breadcrumb();  ?>
						</div>
					<?php }
				}?>
	    		<h2 class="text-center mt-4"><?php the_title();?></h2>				
	    	</div>
		</div>
	<?php endwhile; ?>
	<div class="content-area my-5">
		<div class="container">
			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-content">
						<?php the_content(); ?>
						<?php
							wp_link_pages( array(
								'before' => '<div class="page-links">' . __( 'Pages:', 'boutique-designer-shop' ),
								'after'  => '</div>',
							) );
						?>
					</div>
				</article>
			<?php endwhile; // End of the loop. ?>
		<div class="clearfix"></div> 
		</div>	
	</div>
</main>
<?php get_footer();
