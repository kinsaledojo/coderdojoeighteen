<?php
/**
 * Details here
 *
 * @package CoderDojo
 * @subpackage CoderDojo
 * @since 1.0.0
 */

if ( has_nav_menu( 'footer-social-links' ) ) : ?>
    <div id="footer-social" class="social-icon">
        <?php wp_nav_menu (
            array(
                'theme_location' => 'footer-social-links',
                'menu_class' => 'social-links',
                'menu_id' => 'footer-social-menu',
                'link_before' => '<p>',
                'link_after' => '</p>',
                'depth' => 1
            )
        ); ?>
    </div>
<?php endif; ?>