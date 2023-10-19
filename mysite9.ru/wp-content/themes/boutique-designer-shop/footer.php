<?php
/**
 * The template for displaying the footer
 *
 * @subpackage Boutique Designer Shop
 * @since 1.0
 */

?>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="copyright">
			<div class="container footer-content">
				<?php get_template_part( 'template-parts/footer/footer', 'widgets' ); ?>
			</div>
		</div>
		<?php get_template_part( 'template-parts/footer/site', 'info' ); ?>
		<?php if( get_option( 'boutique_designer_shop_scroll_enable',false) != 'off'){ ?>
		<div class="scroll-top">
			<button type=button id="boutique-designer-shop-scroll-to-top" class="scrollup"><i class="<?php echo esc_attr(get_theme_mod('boutique_designer_shop_scroll_top_icon','fas fa-chevron-up')); ?>"></i></button>
		</div>	
		<?php }?> 
	</footer>
<?php wp_footer(); ?>

</body>
</html>