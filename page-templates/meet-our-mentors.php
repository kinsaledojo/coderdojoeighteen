<?php 
/*
 * Template Name: Meet Our Mentors
 * Template Post Type: page
 */

get_header();
?>

<main>
    <?php get_template_part('template-parts/content/page');
    $users = get_users(array(
    'role__in' => array(
        'Champion',
        'Mentor'
    ),
    'orderby'       => 'user_url',
    'order'         => 'ASC'
)); ?>

<aside>
    <div id="user-profiles" class="alignwide">
        <?php foreach($users as $user) : 

            $profile_thumbnail_url = get_avatar_url($user->ID, ['size' => '192']);
            $belt_ID = esc_attr( get_the_author_meta( 'user_belt', $user->ID ));
            $title = get_the_author_meta( 'title', $user->ID );?>
            


            <button id="<?php echo $user->ID ?>" onClick="user_button_click(this.id)" class="user-profile">
                <img class="user-image" src=" <?php echo $profile_thumbnail_url ?>" />
                <?php echo get_the_post_thumbnail( $belt_ID, 'full', array( 'class' => 'user-belt' ) );?>
                <div class="user-content">
                    <div><?php echo $user->display_name ?></div>
                    <?php if($title == '') {
                        echo '<div>' . ucwords(reset($user->roles)) . '</div>';
                    } else {
                        echo '<div>' . ucwords(reset($user->roles)) . ' - ' . $title . '</div>';
                    }?>
                    <!-- Wordpress gets a capitalised traslation of the user role -->
                    <!-- <p><?php echo translate_user_role(reset($user->roles));?></p> -->
                </div>
            </button>
            <div id="modal-<?php echo $user->ID ?>" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button id="span-<?php echo $user->ID ?>" type="button" class="close" onClick="close_span_click(this.id)" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <h2 class="user-title"><?php echo $user->display_name ?></h2>
                    </div>
                    <div class="modal-body">
                        <img class="user-image" src="<?php echo get_avatar_url($user->ID, ['size' => '192']) ?>" />
                        <div><?php echo get_the_author_meta('description', $user->ID) ?></div>
                    </div>
                    <div class="modal-footer">
                        <ul class="user-links social-links">
                            <?php if ($user_url) : ?>
                                <li>
                                    <a href="<?php echo $user_url ?>"><p></p></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                        <button id="button-<?php echo $user->ID ?>" type="button" class="btn btn-default" onClick="close_button_click(this.id)" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?> 
    </div>
</aside>
</main> 


<?php get_footer(); ?>