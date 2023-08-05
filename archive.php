<?php
/**
 * The template for displaying archive pages
 *  - Programming Languages Archive
 *  - The Hardware Lab Archive
 *  - The Studio Archive
 *  - The Arcade Archive
 *  - Other Resources Archive
 * 
 * These archive pages should not display posts but rather the terms for each post type
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CoderDojo_Theme
 * @subpackage CoderDojo
 * @since 1.0.0
 */

get_header(); 

$queried_object = get_queried_object();
$terms = get_taxonomy_terms($queried_object->name, 'all');
?>
<div class="wp-block-group alignfull hero-section has-white-color has-text-color has-background" style="background-color:#642580">
    <div class="wp-block-group__inner-container">

        <img id="hero-image" class="wrapper" src="<?php bloginfo('template_url');?>/assets/images/header-image.png" />
    </div>
</div>
<main>
  <article id="article-wrapper" class="wrapper spacer">
  <h1 class="section-heading"><?php echo $queried_object->label; ?></h1>       
  <p>  <?php echo $queried_object->description?> </p>
  </article>
  <aside id="aside-wrapper" class="wrapper spacer">
      <?php
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
      endforeach; ?>
    </div>
  </aside>
</main>

<?php get_footer(); ?>




