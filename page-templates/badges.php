<?php 
/*
 * Template Name: Badges
 * Template Post Type: page
 */

get_header();

$badge_types = array(
    array(
        'name' => 'Programming Badges',
        'slug' => 'programming'
    ),
    array(
        'name' => 'Soft Skills Badges',
        'slug' => 'soft-skills'
    ),
    array(
        'name' => 'Events Badges',
        'slug' => 'events'
    )
);
?>

<main>
    <?php get_template_part('template-parts/content/page');
    if(!empty($badge_types)) :
        foreach ($badge_types as $badge_type):
            $args = array(
                'numberposts'      => -1,
                'orderby'          => 'menu_order',
                'order'            => 'ASC',
                'post_type'        => 'badge',
                'tax_query'		=> array(
                    array(
                        'taxonomy'	=> 'badge_type',
                        'field'		=> 'slug',
                        'terms'		=> $badge_type['slug']
                    )
                )
            );
            $posts= get_posts( $args );
            if(!empty($posts)) :
                echo '<h2 class="section-heading">' . $badge_type['name'] . '</h2>';
                echo '<ul class="section-list alignwide">';
    
                foreach ($posts as $post):
                    setup_postdata( $post );
                    get_template_part('template-parts/content/modal-card');
                endforeach;
                wp_reset_postdata();
                echo '</ul>';
            endif;
        endforeach;
    endif;?>
</main>

<?php get_footer(); ?>