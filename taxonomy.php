<?php 
/**
 * The template for displaying the primary taxonomy terms for the selected custom post type
 *  - Programming Languages
 *      - Scratch Archive
 *      - HTML Archive
 *      - JavaScript Archive
 *      - Python Archive
 *      - App Inventor
 *  - The Hardware Lab
 *  - The Studio Archive
 *  - The Arcade Archive
 *  - Other Resources Archive
 * 
 * These pages should not display just posts but rather the posts grouped by the resource type
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CoderDojo
 * @subpackage CoderDojo
 * @since 1.0.0
 */

get_header(); 
var_dump($wp_query->query_vars);
$taxonomy = array_keys($wp_query->query_vars)[0];
$term_slug = $wp_query->query_vars[$taxonomy];
var_dump($term_slug);
$terms = array(
    get_term_by( 
        'slug',
        $term_slug,
        $taxonomy
    )
);
$term = $terms[0];
var_dump($term);



global $wp;
$current_url = home_url( $wp->request );
?>
<div class="wp-block-group alignfull hero-section has-white-color has-text-color has-background" style="background-color:#642580">
    <div class="wp-block-group__inner-container">
        <h1 class="section-heading"><?php echo $section_title; ?></h1>   
        
        <img id="hero-image" class="wrapper" src="<?php bloginfo('template_url');?>/assets/images/header-image.png" />
    </div>
</div>
<main>
    <article id="article-wrapper" class="wrapper spacer">
    <p class="section-description"><?php echo $section_description; ?></p> 
    </article>
    <aside id="aside-wrapper" class="wrapper spacer">
    <?php if ($taxonomy == 'groups'){
    $section_title = $term->name;
    $section_description = $term->description;
    
    if($term->parent == 0){  
        var_dump('First Group');
        $terms = coderdojo_kata_get_group_terms($term->term_id);
        var_dump($terms);
        echo '<ul class="section-list">';
        foreach($terms as $term):
        //if($term->count > 0):
            echo '<li class="section-list-item sushi-cards">';
            echo '<a class="card-link" href="'. get_term_link($term).'">';
            echo '<img class="card-img" src="' . get_bloginfo('template_url') . '/assets/images/' . $term->slug . '.png" />';
            echo '<h3 class="card-heading">' . $term->name . '</h3>';
            echo '<p class="card-description">' . $term->description . '</p>';
            echo '</a>';
            echo '</li>';
        //endif;
        endforeach; 
        echo '</ul>';
    } else {
        foreach($terms as $term):
        
            $args = array(
                'numberposts'	=> $number_posts,
                'post_type'		=> 'sushi-deck',
                'relation'		=> 'AND',
                'tax_query'		=> array(
                    array(
                        'taxonomy'	=> 'groups',
                        'field'		=> 'slug',
                        'terms'		=> $primary_term
                    ),
                    array(
                        'taxonomy'	=> 'groups',
                        'field'		=> 'slug',
                        'terms'		=> $term->slug
                    )
                )
            );
            
            $posts = get_posts( $args );

            if(!empty($posts)) {
                
                echo '<section class="section">';
                echo '<h2 class="section-heading">' . $term->name . '</h2>';
                echo '<p class="section-description">' . $term->description . '</p>';
                echo '<ul class="section-list">';
                
                $count = 0;
                foreach ($posts as $post):

                    get_template_part('template-parts/content/link-card');
                   ++$count;
                endforeach;
                
                if($count == 5) :
                    echo '<li class="section-list-item sushi-cards">';
                    echo '<a class="card-link" href="' . $current_url . '/' . $term->slug . '">';
                    echo '<h3 class="card-heading">View All</h3>';
                    echo '</a>';
                    echo '</li>';
                endif;
                echo '</ul>';
                echo '</section>';
            }
        endforeach;
        var_dump('Second Group');
    }
} else {
    var_dump('Resource Type');
}

            
    ?>
    </aside>
</main>

<?php get_footer(); ?>