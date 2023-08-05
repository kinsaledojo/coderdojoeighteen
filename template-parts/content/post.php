<?php 
/*
 * Template Name: Sushi Deck Template
 * Template Post Type: page
 */

?>
<main>
<article id="article" <?php post_class(); ?>>
<?php the_title('<h1 class="page-heading">', '</h1>'); ?>
<?php the_content();?>

</article>
</main>




<?php get_footer(); ?>