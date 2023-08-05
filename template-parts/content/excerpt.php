<?php
/**
 * Template part for displaying post excerpts in index.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CoderDojo
 * @subpackage CoderDojo
 * @since 1.0.0
 */

echo '<li class="section-list-item card">';
echo '<a class="card-link" href="'. get_the_permalink() . '">';
echo '<img class="card-img" src="' . get_bloginfo( 'template_directory') . '/assets/images/transparent-card.png" style="background-image: url(' . get_the_post_thumbnail_url() . ')" />';
echo get_avatar( get_the_author_meta('user_email'), $size = '60');
the_title('<h3 class="card-heading">', '</h3>');
echo '<p class="card-description">' . get_the_excerpt() . '</p>';
echo '<p class="card-description-link">Read More</p>';
echo '<div class="divider"></div>';
echo '<p class="card-description">' . get_the_date(get_option( 'D/M/Y' )) . '</p>';
echo '</a>';
echo '</li>';