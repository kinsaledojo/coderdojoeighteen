<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CoderDojo
 * @subpackage CoderDojo
 * @since 1.0.0
 */

get_header();?>

<?php if (is_home()): ?>
	<div class="wp-block-group alignfull hero-section has-background" style="background-color:#642580"><div class="wp-block-group__inner-container">
		<h1 class="alignwide has-text-align-center has-white-color has-text-color"><?php single_post_title() ?></h1>
		<div class="wp-block-columns">
			<div class="wp-block-column">
				<figure class="wp-block-image size-large"><img loading="lazy" width="560" height="373" src="http://127.0.0.1/wordpress/wp-content/uploads/2021/02/anvil.bf1c36b.jpg" alt="" class="wp-image-83" srcset="http://127.0.0.1/wordpress/wp-content/uploads/2021/02/anvil.bf1c36b.jpg 560w, http://127.0.0.1/wordpress/wp-content/uploads/2021/02/anvil.bf1c36b-300x200.jpg 300w" sizes="(max-width: 560px) 100vw, 560px"></figure>
			</div>
			<div class="wp-block-column"></div>
			<div class="wp-block-column">
				<figure class="wp-block-image size-large"><img loading="lazy" width="560" height="373" src="http://127.0.0.1/wordpress/wp-content/uploads/2021/02/nurnberg.9d10b96.jpg" alt="" class="wp-image-84" srcset="http://127.0.0.1/wordpress/wp-content/uploads/2021/02/nurnberg.9d10b96.jpg 560w, http://127.0.0.1/wordpress/wp-content/uploads/2021/02/nurnberg.9d10b96-300x200.jpg 300w" sizes="(max-width: 560px) 100vw, 560px"></figure>
			</div>
		</div>
	</div>
	</div>
	<section class="section">
    <ul class="section-list alignwide">
<?php elseif (is_category()):
	echo '<h1 id="blog-title" class="wrapper">Category</h1>';
elseif (is_search()):
	echo '<h1 id="blog-title" class="wrapper">';
	printf(
		/* translators: %s: search term. */
		esc_html__( 'Results for "%s"', 'twentytwentyone' ),
		'<span class="page-description search-term">' . esc_html( get_search_query() ) . '</span>'
	);
	echo '</h1>';
else:

endif; 

if ( have_posts() ) {

	// Load posts loop.
	while ( have_posts() ) {
		the_post();
		if ( is_single() ) :
			get_template_part( 'template-parts/content/page' );
		else:
			get_template_part( 'template-parts/content/excerpt' );
		endif;
	}

	// Previous/next page navigation.
	//twenty_twenty_one_the_posts_navigation();

} else {

	// If no content, include the "No posts found" template.
	//get_template_part( 'template-parts/content/content-none' );

}
if ( is_home() ) {
	echo '</ul>';
    echo '</section>';
} 
get_footer();