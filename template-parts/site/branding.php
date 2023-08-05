<?php
/**
 * Details here
 *
 * @package CoderDojo
 * @subpackage CoderDojo
 * @since 1.0.0
 */
 
if ( has_site_icon() ) :
    $icon_url = get_site_icon_url();
else :
    $icon_url = get_bloginfo( 'template_directory') . '/assets/images/site-icon.png';
endif;


if ( has_custom_logo() ) : 
    the_custom_logo();
else : ?>
    <a class="site-logo custom-logo-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <img class="site-icon custom-logo"  src="<?php echo esc_html( $icon_url ); ?>" alt="Site Icon" />
        <h1 id="site-title" class="custom-logo-title"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h1>
    </a> <?php
endif; ?> 