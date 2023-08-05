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

// 3 different pages
// Kata - Editor - Teams 
// Normal - New Header - No Header

global $wp;
$current_url = home_url( add_query_arg( array(), $wp->request ) );
$editor = get_post_meta( $post->ID, $key = 'sushi_deck_trinket');
$childpages = get_posts(
  array(
    'post_parent' => $post->ID,
    'post_type' => 'sushi-card',
    'order' => 'ASC',
    'orderby' => 'menu_order',
    'numberposts' => -1
  )
);

// Check to see if url was directed to a Kata page - display normal
if (strpos($current_url, 'kata')) {
  get_header(); 
  get_template_part('template-parts/sushi-card/hero');
  // Get the link to the editor
  $editor_url = str_replace("kata", "editor", $current_url);?>

  <main>
    <section id="project-title">
        <div class="wrapper">
          <h1 class="has-text-align-center"><?php echo get_the_title($post->ID); ?></h1>
        </div>
    </section>
    <section id="project-cards">
        <div id=project-wrapper>
          <div id="toc-wrapper">
            <?php get_template_part('template-parts/sushi-card/badge-card'); ?>
        
            <?php if ($editor && $editor[0] != "") { ?>
              <aside class="toc-card">
                <h3 class="js-project-panel__toggle">Table of Contents</h3>
                <div id="toc-menu" class="u-hidden">
                  <p>View this Sushi Card side by side the Trinket editor</p>
                  <a id="next-link" href="<?php echo $editor_url; ?>" class="wp-block-button__link has-background has-color-purple">Open In Editor</a>
                </div>
              </aside>
            <?php } ?>
            <?php get_template_part('template-parts/sushi-card/author-card'); ?>
          </div>
          <div id="sushi-wrapper">
            <article class="sushi-card">
              <h2>Introduction</h2>
              <?php if (have_posts()) : while(have_posts()) : the_post();?>
                <?php the_content();?>
              <?php endwhile; endif;?> 

              <?php 
              if ($childpages) :
                $sushi = $childpages[0];
                $child_id = $sushi->ID;?>
                <div class="nav-links">
                  <div></div>
                  <a id="next-link" href="<?php echo get_permalink($child_id); ?>" class="navigation-link">Next</a>
                </div>
              <?php endif; ?>
            </article>
          </div>
        </div>
    </section>
  </main>       

<?php get_footer();
} else {
  get_template_part('template-parts/sushi-card/header');
  $class_type = 'teams';
  //Not normal Kata page so check if it is the editor page for header display
  if (strpos($current_url, 'editor')) {
    // Get the link back to Kata
    $kata_url = str_replace("editor", "kata", $current_url);
    $class_type = 'editor';
    echo '<header id="site-header" class="header">';
    echo '<div id="header-wrapper" class="editor">';
    get_template_part('template-parts/site/branding');
    the_title('<h1 class="editor-title">','</h1>');
    echo '<a id="next-link" href="' . $kata_url . '" class="wp-block-button__link has-background has-color-cyan">Close Editor</a>';
    echo '</div></header>';
  }
  $sushi_card = $childpages[0];
  $sushi_url = get_post_permalink($sushi_card->ID);
  //var_dump($urp);
  $editor_url = str_replace("kata", "editor", $sushi_url); ?>
  <main class="editor-wrapper">
    <iframe class="<?php echo $class_type ?>sushicardframe" src="<?php echo $editor_url ?>"></iframe>
    <iframe class="<?php echo $class_type ?>trinketframe" src="<?php echo $editor[0] ?>?runMode=autorun"></iframe>
  </main>
</body> <?php
}