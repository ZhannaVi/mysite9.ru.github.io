<?php
/**
 * Displays top navigation
 *
 * @package Grocery Supermarket
 */
?>

<div class="navigation_header py-2">
    <div class="toggle-nav mobile-menu">
        <?php if(has_nav_menu('primary')){ ?>
            <button onclick="grocery_supermarket_openNav()"><i class="fas fa-th"></i></button>
        <?php }?>
    </div>
    <div id="mySidenav" class="nav sidenav">
        <nav id="site-navigation" class="main-navigation navbar navbar-expand-xl" aria-label="<?php esc_attr_e( 'Top Menu', 'grocery-supermarket' ); ?>">
            <?php if(has_nav_menu('primary')){
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'menu_class'     => 'menu',
                        'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    )
                );
            } ?>
        </nav>
        <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="grocery_supermarket_closeNav()"><i class="fas fa-times"></i></a>
    </div>
</div>