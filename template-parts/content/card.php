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

echo '<li class="section-list-item card">';
echo '<img class="card-img" src="' . get_bloginfo( 'template_directory') . '/assets/images/transparent-card.png" style="background-image: url(' . get_the_post_thumbnail_url() . ')" />';
the_title('<h3 class="card-heading-center">', '</h3>');
echo '</li>';