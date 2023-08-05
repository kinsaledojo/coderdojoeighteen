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
 * @package CoderDojo_Theme
 * @subpackage CoderDojo
 * @since 1.0.0
 */

global $wp;
$current_url = home_url( add_query_arg( array(), $wp->request ) );
$base_url = get_permalink($post->post_parent);
if (strpos($current_url, 'editor') == true ) { ?>
  <!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php wp_head();?>
    </head>

    <body <?php body_class();?>>
<?php
  $base_url = str_replace("kata", "editor", $base_url);
} else {
  get_header();
  get_template_part('template-parts/sushi-card/hero');
}?>

<main>
  <?php if (strpos($current_url, 'editor') == false ) { ?>
    <section id="project-title">
    <div class="wrapper">
      <h1 class="has-text-align-center"><?php echo get_the_title($post->post_parent); ?></h1>
    </div>
  </section>
  <?php } ?>
  <section id="project-cards">
    <div id=project-wrapper>
      <div id="toc-wrapper">
        <aside class="toc-card sticky-card">
          <h3 class="js-project-panel__toggle">Table of Contents</h3>
          <ol id="toc-menu" class="u-hidden">
              <?php $sushi_cards = get_posts( array(
                      'title_li'    => '',
                      'post_parent'    => $post->post_parent,
                      'post_type'   => 'sushi-card',
                      'orderby' => 'menu_order',
                      'order' => 'ASC',
                      'posts_per_page' => -1
                  ) );
                  $previous_sushi_card = NULL;
                  $next_sushi_card = NULL;
                  $current_card = $post->ID;
                  $current_card_found = false;
                    $card_count = count($sushi_cards);
                    $template_directory = get_template_directory_uri();
                  for ($i = 0; $i <= $card_count-1; $i++) {
                    if( $current_card_found ) { // Current card has been found
                        if ($sushi_cards[$i - 1]->ID == $current_card) { // Card is just after current card
                        } else if ($i == $card_count - 1) { //Card is the last card                       
                            $sushi_cards[$i]->post_excerpt = 'sushi-card-item-incomplete-end';
                            $sushi_cards[$i]->post_content = '<img class="sushi-card-item-img" src="' . $template_directory . '/assets/images/sushi-card-incomplete-end.png" width="24" height="42">';
                        } else {
                            $sushi_cards[$i]->post_excerpt = 'sushi-card-item-incomplete-middle';
                            $sushi_cards[$i]->post_content = '<img class="sushi-card-item-img" src="' . $template_directory . '/assets/images/sushi-card-incomplete-middle.png" width="24" height="42">';
                        }
                    } else {
                        if ($sushi_cards[$i]->ID == $current_card) {
                            $current_card_found = TRUE;
                            if ($i == 0){ // Current card the first card
                                $sushi_cards[$i]->post_excerpt = 'sushi-card-item-current-start current-sushi-card';
                                $sushi_cards[$i]->post_content = '<img class="sushi-card-item-img" src="' . $template_directory . '/assets/images/sushi-card-current-start.png" width="24" height="42">';
                                $sushi_cards[$i + 1]->post_excerpt = 'sushi-card-item-incomplete-middle next-sushi-card';
                                $sushi_cards[$i + 1]->post_content = '<img class="sushi-card-item-img" src="' . $template_directory . '/assets/images/sushi-card-incomplete-middle.png" width="24" height="42">';
                                $previous_sushi_card = $base_url;
                                $next_sushi_card = $base_url . $sushi_cards[$i + 1]->post_name;
                            } else if ($i == $card_count - 1 ){ // Current card is last card
                                $sushi_cards[$i - 1]->post_excerpt = 'sushi-card-item-complete-middle previous-sushi-card';
                                $sushi_cards[$i]->post_excerpt = 'sushi-card-item-current-end current-sushi-card';
                                $sushi_cards[$i]->post_content = '<img class="sushi-card-item-img" src="' . $template_directory . '/assets/images/sushi-card-current-end.png" width="24" height="42">';
                                $previous_sushi_card = $base_url . $sushi_cards[$i - 1]->post_name;
                                $next_sushi_card = $base_url;
                            } else {
                                if ($i - 1 == 0) { // Previous card is the first card
                                    $sushi_cards[$i - 1]->post_excerpt = 'sushi-card-item-complete-start previous-sushi-card';
                                    $sushi_cards[$i]->post_content = '<img class="sushi-card-item-img" src="' . $template_directory . '/assets/images/sushi-card-complete-start.png" width="24" height="42">';
                                } else { 
                                    $sushi_cards[$i - 1]->post_excerpt = 'sushi-card-item-complete-middle previous-sushi-card';
                                    $sushi_cards[$i]->post_content = '<img class="sushi-card-item-img" src="' . $template_directory . '/assets/images/sushi-card-complete-middle.png" width="24" height="42">';
                                }
                                $sushi_cards[$i]->post_excerpt = 'sushi-card-item-current-middle current-sushi-card';
                                $sushi_cards[$i]->post_content = '<img class="sushi-card-item-img" src="' . $template_directory . '/assets/images/sushi-card-current-middle.png" width="24" height="42">';
                                if ($i + 1 == $card_count - 1) { // Next card is the last card
                                    $sushi_cards[$i + 1]->post_excerpt = 'sushi-card-item-incomplete-end next-sushi-card';
                                    $sushi_cards[$i + 1]->post_content = '<img class="sushi-card-item-img" src="' . $template_directory . '/assets/images/sushi-card-incomplete-end.png" width="24" height="42">';
                                } else {
                                    $sushi_cards[$i + 1]->post_excerpt = 'sushi-card-item-incomplete-middle next-sushi-card';
                                    $sushi_cards[$i + 1]->post_content = '<img class="sushi-card-item-img" src="' . $template_directory . '/assets/images/sushi-card-incomplete-middle.png" width="24" height="42">';
                                }
                                $previous_sushi_card = $base_url . $sushi_cards[$i - 1]->post_name;
                                $next_sushi_card = $base_url . $sushi_cards[$i + 1]->post_name;
                            }
                        } else if ($i == 0) {
                            $sushi_cards[$i]->post_excerpt = 'sushi-card-item-complete-start';
                            $sushi_cards[$i]->post_content = '<img class="sushi-card-item-img" src="' . $template_directory . '/assets/images/sushi-card-complete-start.png" width="24" height="42" ';
                        } else {  
                            $sushi_cards[$i]->post_excerpt = 'sushi-card-item-complete-middle';
                            $sushi_cards[$i]->post_content = '<img class="sushi-card-item-img" src="' . $template_directory . '/assets/images/sushi-card-complete-middle.png" width="24" height="42" ';
                        } 
                    }
                    echo '<li class="sushi-card-item sushi-card-item1021 ' . $sushi_cards[$i]->post_excerpt . '">';
                    echo '<a href="' . $base_url . $sushi_cards[$i]->post_name. '">';
                    echo '<p>' . $sushi_cards[$i]->menu_order. '. ' . $sushi_cards[$i]->post_title . '</p>';
                    echo $sushi_cards[$i]->post_content;
                    echo '</a>';
                    echo '</li>';
                }
                  
                    

                
                  ?>
          </ol>
        </aside>
      </div>
      <div id="sushi-wrapper">
        <article class="sushi-card">
         <?php the_title('<h2>', '</h2>'); ?>
          <?php if (have_posts()) : while(have_posts()) : the_post();?>
            <?php the_content();?>
          <?php endwhile; endif;?> 
          <div class="nav-links">
            <a id="previous-link" href="<?php echo $previous_sushi_card ?>" class="navigation-link"><</a>
            <a id="next-link" href="<?php echo $next_sushi_card ?>" class="navigation-link">Next</a>
          </div>
        </article>
      </div>
    </div>
  </section>
  </main>       

<?php 
if (strpos($current_url, 'editor') == false) {
  get_footer(); 
}   ?>