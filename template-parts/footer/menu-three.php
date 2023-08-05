<?php
/**
 * Details here
 *
 * @package CoderDojo
 * @subpackage CoderDojo
 * @since 1.0.0
 */

if ( has_nav_menu( 'footer-menu-three' ) ) : ?>
    <div class="footer-menu">
        <h2 class="footer-menu-title"><?php echo wp_get_nav_menu_name( 'footer-menu-three' ); ?></h2>
        <?php wp_nav_menu (
            array(
                'theme_location' => 'footer-menu-three',
                'menu_class' => 'footer-menu',
                'menu_id' => 'footer-menu-three',
                'depth' => 1
            )
        ); ?>
    </div>
<?php endif; ?>