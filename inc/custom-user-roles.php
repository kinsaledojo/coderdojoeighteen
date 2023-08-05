<?php
/**
 * Add aditional user roles
 *
 * @link https://developer.wordpress.org/reference/functions/add_role/
 *
 * @package CoderDojo
 * @subpackage CoderDojo
 * @since 1.0.0
 */

function coderdojo_add_user_roles() {

    remove_role( 'editor' );
    //remove_role( 'author' );
    remove_role( 'contributor' );
    remove_role( 'subscriber' );

    // Gets the simple_role role object.
    $role = get_role( 'administrator' );
 
    // Add a new capability.
    $role->add_cap( 'sushi_cards', true );
    $role->add_cap( 'delete_others_sushi_cards', true );
    $role->add_cap( 'delete_private_sushi_cards', true );
    $role->add_cap( 'delete_sushi_cards', true );
    $role->add_cap( 'edit_others_sushi_cards', true );
    $role->add_cap( 'edit_private_sushi_cards', true );
    $role->add_cap( 'edit_published_sushi_cards', true );
    $role->add_cap( 'edit_sushi_cards', true );
    $role->add_cap( 'publish_sushi_cards', true );
    $role->add_cap( 'read_private_sushi_cards', true );

    $role->add_cap( 'grading', true );
    $role->add_cap( 'delete_awards', true );
    $role->add_cap( 'delete_others_awards', true );
    $role->add_cap( 'delete_private_awards', true );
    $role->add_cap( 'delete_published_awards', true );
    $role->add_cap( 'edit_awards', true );
    $role->add_cap( 'edit_others_awards', true );
    $role->add_cap( 'edit_private_awards', true );
    $role->add_cap( 'edit_published_awards', true );
    $role->add_cap( 'publish_awards', true );
    $role->add_cap( 'read_private_awards', true );

    $role->add_cap( 'delete_dojos', true );
    $role->add_cap( 'delete_others_dojos', true );
    $role->add_cap( 'delete_private_dojos', true );
    $role->add_cap( 'delete_published_dojos', true );
    $role->add_cap( 'edit_dojos', true );
    $role->add_cap( 'edit_others_dojos', true );
    $role->add_cap( 'edit_private_dojos', true );
    $role->add_cap( 'edit_published_dojos', true );
    $role->add_cap( 'publish_dojos', true );
    $role->add_cap( 'read_private_dojos', true );

    add_role( 
        'moderator', 
        'Moderator', 
        array(
            'read'         => true
        )
    );

    add_role( 
        'champion', 
        'Champion', 
        array(
            'read'         => true
        ) 
    );

    add_role( 
        'mentor', 
        'Mentor', 
        array(
            'read' => true,
            'upload_files'         => true,
            'sushi_cards' => true,
            'delete_sushi_cards'         => true,
            'delete_published_sushi_cards'   => true,
            'edit_sushi_cards' => true,
            'edit_published_sushi_cards'         => true,
            'publish_sushi_cards'   => true
        )
    );

    add_role( 
        'volunteer', 
        'Volunteer', 
        array(
            'read'         => true
        ) 
    );

    add_role( 
        'ninja-o13', 
        'Ninja (over 13)', 
        array(
            'read'         => true
        )
    );
    
    add_role( 
        'ninja-u13', 
        'Ninja (under 13)', 
        array(
            'read'         => true
        )
    );
}
add_action( 'admin_init', 'coderdojo_add_user_roles' );


function my_user_contactmethods($user_contactmethods){

	unset($user_contactmethods['url']);

	$user_contactmethods['title'] = 'Title';
	$user_contactmethods['linkedin'] = 'LinkedIn Profile';
  	$user_contactmethods['twitter'] = 'Twitter Profile';
 
  	return $user_contactmethods;
}
add_filter('user_contactmethods', 'my_user_contactmethods');


































/* add_role( 
    'moderator', 
    'Moderator', 
    array(
        'delete_others_pages'         => true,
        'delete_others_posts'   => true,
        'delete_pages' => true,
        'delete_posts'         => true,
        'delete_private_pages'   => true,
        'delete_private_posts' => true,
        'delete_published_pages'         => true,
        'delete_published_posts'   => true,
        'edit_others_pages' => true,
        'edit_others_posts'         => true,
        'edit_pages'   => true,
        'edit_posts' => true,
        'edit_private_pages'         => true,
        'edit_private_posts'   => true,
        'edit_published_pages' => true,
        'edit_published_posts'         => true,
        'manage_categories'   => true,
        'manage_links' => true,
        'moderate_comments'         => true,
        'publish_pages'   => true,
        'publish_posts' => true,
        'read'         => true,
        'read_private_pages'   => true,
        'read_private_posts' => true,
        'unfiltered_html'         => true,
        'upload_files'   => true,
        'sushi_cards' => true,
        'grading' => true
    )
);

add_role( 
    'champion', 
    'Champion', 
    array(
        'delete_others_posts'   => true,
        'delete_posts'         => true,
        'delete_private_posts' => true,
        'delete_published_posts'   => true,
        'edit_others_posts'         => true,
        'edit_posts' => true,
        'edit_private_posts'   => true,
        'edit_published_posts'         => true,
        'moderate_comments'         => true,
        'publish_pages'   => true,
        'publish_posts' => true,
        'read'         => true,
        'read_private_pages'   => true,
        'read_private_posts' => true,
        'unfiltered_html'         => true,
        'upload_files'   => true,
        'sushi_cards' => true,
    ) 
);

add_role( 
    'mentor', 
    'Mentor', 
    array(
        'delete_posts'         => true,
        'delete_published_posts'   => true,
        'edit_posts' => true,
        'edit_published_posts'         => true,
        'publish_posts'   => true,
        'read' => true,
        'upload_files'         => true,
        'sushi_cards' => true,
        'delete_sushi_cards'         => true,
        'delete_published_sushi_cards'   => true,
        'edit_sushi_cards' => true,
        'edit_published_sushi_cards'         => true,
        'publish_sushi_cards'   => true
    )
);

add_role( 
    'volunteer', 
    'Volunteer', 
    array(
        'read'         => true
    ) 
);

add_role( 
    'ninja-o13', 
    'Ninja (over 13)', 
    array(
        'delete_posts'         => true,
        'edit_posts' => true,
        'read' => true
    ) 
);

add_role( 
    'ninja-u13', 
    'Ninja (under 13)', 
    array(
        'read'         => true
    )
); */