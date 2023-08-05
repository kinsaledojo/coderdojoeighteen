<?php
/**
 * Details here
 *
 * @package CoderDojo
 * @subpackage CoderDojo
 * @since 1.0.0
 */

$footer_address = get_theme_mod( 'footer_address', 0 );
if ( isset($footer_address)) : ?>
    <p id="footer-address"><?php echo $footer_address ?></p>
<?php endif;