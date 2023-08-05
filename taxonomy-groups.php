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
$groups_slug = $wp_query->query_vars['groups'];
$groups_term = array(
    get_term_by( 
        'slug',
        $groups_slug,
        'groups'
    )
);
//Check if queried var containes 'types' query
if (array_key_exists('types', $wp_query->query_vars)) {
    // Currently on 'types' page
    // Display type and list of posts
    $types_slug = $wp_query->query_vars['types'];
    $sections = array(
        get_term_by( 
            'slug',
            $types_slug,
            'types'
        )
    );
    $number_posts = -1;
} else {
    // Currently on 'groups' page
    if($groups_term[0]->parent == 0){
        // Display child groups
        $sections = coderdojo_kata_get_group_terms($groups_term[0]->term_id);
        $number_posts = 5;
    } else {
        // Display types and posts
        $sections = coderdojo_kata_get_type_terms();
        $number_posts = 5;
    }
}
global $wp;
$current_url = home_url( $wp->request );
?>
<div class="wp-block-group alignfull hero-section has-white-color has-text-color has-background" style="background-color:#642580">
    <div class="wp-block-group__inner-container">
        <h1 class="section-heading"><?php echo $groups_term[0]->name; ?></h1>   
        
        <img id="hero-image" class="wrapper" src="<?php bloginfo('template_url');?>/assets/images/header-image.png" />
    </div>
</div>
<main>
    <article id="article-wrapper" class="wrapper spacer">
    <p class="section-description"><?php echo $groups_term[0]->description; ?></p> 
    </article>
    <aside id="aside-wrapper" class="wrapper spacer">
    <?php if($groups_term[0]->parent == 0){  
        echo '<ul class="section-list">';
        foreach($sections as $section):
        //if($term->count > 0):
            echo '<li class="section-list-item sushi-cards">';
            echo '<a class="card-link" href="'. get_term_link($section).'">';
            echo '<img class="card-img" src="' . get_bloginfo('template_url') . '/assets/images/' . $section->slug . '.png" />';
            echo '<h3 class="card-heading">' . $section->name . '</h3>';
            echo '<p class="card-description">' . $section->description . '</p>';
            echo '</a>';
            echo '</li>';
        //endif;
        endforeach; 
        echo '</ul>';
    } else {
        foreach($sections as $section):
        
            $args = array(
                'numberposts'	=> $number_posts,
                'post_type'		=> 'sushi-deck',
                'relation'		=> 'AND',
                'tax_query'		=> array(
                    array(
                        'taxonomy'	=> 'groups',
                        'field'		=> 'slug',
                        'terms'		=> $groups_term[0]->slug
                    ),
                    array(
                        'taxonomy'	=> 'types',
                        'field'		=> 'slug',
                        'terms'		=> $section->slug
                    )
                )
            );
            
            $posts = get_posts( $args );

            if(!empty($posts)) {
                
                echo '<section class="section">';
                echo '<h2 class="section-heading">' . $section->name . '</h2>';
                echo '<p class="section-description">' . $section->description . '</p>';
                echo '<ul class="section-list">';
                
                $count = 0;
                foreach ($posts as $post):

                    get_template_part('template-parts/content/link-card');
                   ++$count;
                endforeach;
                
                if($count == 5) :
                    echo '<li class="section-list-item sushi-cards">';
                    echo '<a class="card-link" href="' . $current_url . '/' . $section->slug . '">';
                    echo '<h3 class="card-heading">View All</h3>';
                    echo '</a>';
                    echo '</li>';
                endif;
                echo '</ul>';
                echo '</section>';
            }
        endforeach;

    }


            
    ?>
    </aside>
</main>

<?php get_footer(); ?>