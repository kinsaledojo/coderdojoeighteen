<?php
/**
 * Details here
 *
 * @package CoderDojo
 * @subpackage CoderDojo
 * @since 1.0.0
 */

$footer_text = get_theme_mod( 'footer_text', 0 );
if ( isset($footer_text)) : ?>
    <p id="footer-text"><?php echo $footer_text ?></p>
<?php endif;