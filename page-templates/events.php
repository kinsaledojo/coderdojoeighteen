<?php 
/*
 * Template Name: Events
 * Template Post Type: page
 */

get_header();

$args = array(
    'numberposts'      => -1,
    'orderby'          => 'menu_order',
    'order'            => 'ASC',
    'post_type'        => 'event'
);
$posts= get_posts( $args );
?>

<main>
    <?php get_template_part('template-parts/content/page');
    if(!empty($posts)) :
        echo '<aside id="aside-wrapper" class="wrapper spacer">';
        echo '<ul class="section-list alignwide">';
    
        foreach ($posts as $post):
            setup_postdata( $post );
            get_template_part('template-parts/content/link-card');
        endforeach;
        wp_reset_postdata();
        echo '</ul>';
        echo '</aside>';
    endif; ?>
</main>

<?php get_footer(); ?>