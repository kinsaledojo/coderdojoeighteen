<?php 
$template_directory = get_template_directory_uri();
$author = get_post_meta($post->ID, 'Author', true);
// Get author's display name 
$display_name = get_the_author_meta( 'display_name', $post->post_author );
$dojo_ID = get_the_author_meta('user_dojo', $post->post_author);
$dojo = get_post($dojo_ID);
$author_img = '<img class="sushi-card-item-img" src="' . $template_directory . '/assets/images/site-icon.png" width="24" height="42">';
// Get link to the author archive page
$user_posts = get_author_posts_url( get_the_author_meta( 'ID' , $post->post_author));?>


<aside class="toc-card">
    <h3 class="js-project-panel__toggle">Originally created by :</h3>
    <div id="toc-menu" class="u-hidden"> 
        <?php echo '<h5 class="user-name">' . $display_name . ' from</h5>'; ?>
        <div class="site-logo">
            <img class="dojo-icon dojo-logo"  src="<?php echo get_bloginfo( 'template_directory') . '/assets/images/site-icon.png'; ?>" alt="Site Icon" />
            <h4 id="site-title" class="coderdojo-name"><?php echo $dojo->post_title  ?></h4>
        </div>
        <!-- <?php //echo '<p>View all projects from ' . $dojo->post_title . '</p>'; ?>
        <a href="<?php echo $user_posts; ?>" class="navigation-link">View all</a> -->
    </div>
</aside>


