<?php
/**
 * Details here
 *
 * @package CoderDojo
 * @subpackage CoderDojo
 * @since 1.0.0
 */

if ( has_nav_menu( 'footer-menu-two' ) ) : ?>
    <div class="footer-menu">
        <h2 class="footer-menu-title"><?php echo wp_get_nav_menu_name( 'footer-menu-two' ); ?></h2>
        <?php wp_nav_menu (
            array(
                'theme_location' => 'footer-menu-two',
                'menu_class' => 'footer-menu',
                'menu_id' => 'footer-menu-two',
                'depth' => 1
            )
        ); ?>
    </div>
<?php endif; ?>