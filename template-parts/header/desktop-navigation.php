<?php
/**
 * Details here
 *
 * @package CoderDojo
 * @subpackage CoderDojo
 * @since 1.0.0
 */

if ( has_nav_menu( 'desktop-navigation-menu' ) ) {
    wp_nav_menu (
        array(
            'theme_location' => 'desktop-navigation-menu',
            'menu_class' => 'header-menu',
            'menu_id' => 'desktop-menu',
            'container' => 'nav',
            'container_id' => 'desktop-navigation',
            'depth' => 1
            )
        );
} ?>