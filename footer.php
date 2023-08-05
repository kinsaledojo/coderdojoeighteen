<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CoderDojo
 * @subpackage CoderDojo
 * @since 1.0.0
 */

wp_footer();?>

        <footer id="footer" class="site-footer">
            <div id="footer-wrapper" class="wrapper spacer">
                <?php get_template_part('template-parts/site/branding'); ?>
                <?php get_template_part('template-parts/footer/text'); ?>
                <?php get_template_part('template-parts/footer/social-links'); ?>
                <div id="footer-menus">
                    <?php get_template_part('template-parts/footer/menu-one'); ?>
                    <?php get_template_part('template-parts/footer/menu-two'); ?>
                    <?php get_template_part('template-parts/footer/menu-three'); ?>
                    <?php get_template_part('template-parts/footer/menu-four'); ?>
                </div>

                <?php get_template_part('template-parts/footer/address'); ?>
            </div>               
        </footer>
    </body>
</html>