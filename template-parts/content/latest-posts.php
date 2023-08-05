<?php
/**
 * Details here
 *
 * @package CoderDojo
 * @subpackage CoderDojo
 * @since 1.0.0
 */

$args = array(
    'numberposts' => 3
);
   
$latest_posts = get_posts( $args );

if(!empty($latest_posts)) :

    echo '<section class="section latest-posts-section">';
    echo '<h2 class="section-heading">Latest News</h2>';
    echo '<p class="section-description">The lastest updates from CoderDojo Kinsale</p>';
    echo '<ul class="section-list alignwide">';

    foreach ($latest_posts as $post):

        get_template_part( 'template-parts/content/excerpt' );
    endforeach;

    echo '</ul>';
    echo '</section>';
endif;    
?>