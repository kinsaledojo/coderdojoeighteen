<?php
/**
 * The template for displaying all single pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage CoderDojo Classic
 * @since CoderDojo Classic 1.0
 */

get_header();

echo '<main id="main">';

/* Start the Loop */
while ( have_posts() ) :
	the_post();
	get_template_part( 'template-parts/content/page' );
endwhile; // End of the loop.

/* if ( is_front_page() ) : 
    get_template_part( 'template-parts/content/latest-posts' );
endif; */

echo'</main>';

get_footer(); 