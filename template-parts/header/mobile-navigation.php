<?php
/**
 * Details here
 *
 * @package CoderDojo
 * @subpackage CoderDojo
 * @since 1.0.0
 */

if ( has_nav_menu( 'mobile-navigation-menu' ) ) {
    wp_nav_menu (
        array(
            'theme_location' => 'mobile-navigation-menu',
            'container' => 'nav',
            'container_id' => 'mobile-navigation',
            'container_class' => 'navigation',
            'link_after' => '<span class="menu-icon dashicons dashicons-arrow-down"></span>',
            'depth' => 1
        )
    );
} ?>