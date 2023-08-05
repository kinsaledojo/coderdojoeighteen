<?php
/**
 * Template part for displaying card contents
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CoderDojo
 * @subpackage CoderDojo
 * @since 1.0.0
 */

 ?>

<button id="<?php echo $post->ID ?>" onClick="user_button_click(this.id)" class="post-button">
    <img class="post-image" src="<?php echo get_the_post_thumbnail_url() ?>" />
    <?php the_title('<h3 class="card-heading-center">', '</h3>'); ?>

</button>
<div id="modal-<?php echo $post->ID ?>" class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button id="span-<?php echo $post->ID ?>" type="button" class="close" onClick="close_span_click(this.id)" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <h2 class="user-title"><?php the_title(); ?></h2>
        </div>
        <div class="modal-body">
            <img class="post-image" src="<?php echo get_the_post_thumbnail_url() ?>" />
            <div><?php the_content(); ?></div>
        </div>
        <div class="modal-footer">
            
            <button id="button-<?php echo $post->ID ?>" type="button" class="btn btn-default" onClick="close_button_click(this.id)" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>