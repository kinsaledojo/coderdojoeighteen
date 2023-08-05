<?php
/**
 * Details here
 *
 * @package CoderDojo
 * @subpackage CoderDojo
 * @since 1.0.0
 */

$call_to_action_text = get_theme_mod( 'header_cta_text', 0 );
if ( isset($call_to_action_text)) : ?>
    <a id="header-cta" href="<?php echo get_theme_mod( 'header_cta_link', 0 ); ?>"><?php echo $call_to_action_text ?></a>
<?php endif;