<?php
/**
 * Template part for displaying card contents
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CoderDojo
 * @subpackage CoderDojo
 * @since 1.0.0
 */

$levels = get_the_terms( $post->ID,  'levels' );

echo '<li class="section-list-item sushi-cards">';
echo '<a class="card-link" href="'. get_the_permalink() . '">';
echo '<img class="card-img" src="' . get_the_post_thumbnail_url() . '" />';
the_title('<h3 class="card-heading">', '</h3>');
if ($levels) :
    $level = $levels[0];
    echo '<img class="level-image" src="' . get_bloginfo('template_url') . '/assets/images/' . $level->slug . '.png" />';
endif;
echo '<p class="card-description">' . get_the_excerpt() . '</p>';
echo '</a>';
echo '</li>'; 