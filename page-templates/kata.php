<?php 
/*
 * Template Name: Kata Template
 * Template Post Type: page
 */

get_header(); 
get_template_part('template-parts/site/site-hero'); 

global $wp;
$current_url = home_url( $wp->request )
?> 

<main> 
    <article>
        <?php if (have_posts()) : while(have_posts()) : the_post();
            the_content();
        endwhile; endif; ?>
    </article>

    <aside id="aside-wrapper" class="wrapper spacer">
        <?php $areas =  coderdojo_kata_get_area_terms();
        foreach ($areas as $area): 

            $groups = coderdojo_kata_get_group_terms($area->term_id, 5);
            
            echo '<section class="section">';
            echo '<h2 class="section-heading">' . $area->name . '</h2>';
            echo '<p class="section-description">' . $area->description . '</p>';
            echo '<ul class="section-list">';
            
            $count = 0; 
            foreach($groups as $group) :
                if($count < 5) :
                    echo '<li class="section-list-item sushi-cards">';
                    echo '<a class="card-link" href="'. get_term_link($group).'">';
                    echo '<img class="card-img" src="' . get_bloginfo('template_url') . '/assets/images/' . $group->slug . '.png" />';
                    echo '<h3 class="card-heading">' . $group->name . '</h3>';
                    echo '<p class="card-description">' . $group->description . '</p>';
                    echo '</a>';
                    echo '</li>';  
                endif;
                ++$count;  
            endforeach;  
            
            if($count == 5) :
                echo '<li class="section-list-item sushi-cards">';
                echo '<a class="card-link" href="' . $current_url . '/' . $area->slug . '">';
                echo '<h3 class="card-heading">View All</h3>';
                echo '</a>';
                echo '</li>';
            endif;

            echo '</ul>';
            echo '</section>';
        endforeach; ?>   

    </aside>
</main>

<?php get_footer(); ?>