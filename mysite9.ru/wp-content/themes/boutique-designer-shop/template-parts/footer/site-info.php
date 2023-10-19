<?php
/**
 * Displays footer site info
 *
 * @subpackage Boutique Designer Shop
 * @since 1.0
 * @version 1.4
 */

?>
<div class="site-info py-4 text-center">

    <?php
        echo esc_html( get_theme_mod( 'boutique_designer_shop_footer_text' ) );
        printf(
            /* translators: %s: Designer Shop WordPress Theme. */
            '<a target="_blank" href="' . esc_url( 'https://www.ovationthemes.com/wordpress/free-boutique-wordpress-theme/') . '"> %s</a>',
            esc_html__( 'Designer Shop WordPress Theme', 'boutique-designer-shop' )
        );
    ?>

</div>
