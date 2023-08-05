<?php
/**
 * Add aditional post types
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CoderDojo
 * @subpackage CoderDojo
 * @since 1.0.0
 */

function register_custom_post_types() {

	/**
	 * Post Type: Projects.
	 */

	$labels = [
		"name" => __( "Projects", "coderdojo" ),
		"singular_name" => __( "Project", "coderdojo" ),
		"menu_name" => __( "Projects", "coderdojo" ),
		"all_items" => __( "All Projects", "coderdojo" ),
		"add_new" => __( "Add new", "coderdojo" ),
		"add_new_item" => __( "Add new Project", "coderdojo" ),
		"edit_item" => __( "Edit Project", "coderdojo" ),
		"new_item" => __( "New Project", "coderdojo" ),
		"view_item" => __( "View Project", "coderdojo" ),
		"view_items" => __( "View Projects", "coderdojo" ),
		"search_items" => __( "Search Projects", "coderdojo" ),
		"not_found" => __( "No Projects found", "coderdojo" ),
		"not_found_in_trash" => __( "No Projects found in bin", "coderdojo" ),
		"parent" => __( "Parent Project:", "coderdojo" ),
		"featured_image" => __( "Featured image for this Project", "coderdojo" ),
		"set_featured_image" => __( "Set featured image for this Project", "coderdojo" ),
		"remove_featured_image" => __( "Remove featured image for this Project", "coderdojo" ),
		"use_featured_image" => __( "Use as featured image for this Project", "coderdojo" ),
		"archives" => __( "Project archives", "coderdojo" ),
		"insert_into_item" => __( "Insert into Project", "coderdojo" ),
		"uploaded_to_this_item" => __( "Upload to this Project", "coderdojo" ),
		"filter_items_list" => __( "Filter Projects list", "coderdojo" ),
		"items_list_navigation" => __( "Projects list navigation", "coderdojo" ),
		"items_list" => __( "Projects list", "coderdojo" ),
		"attributes" => __( "Projects attributes", "coderdojo" ),
		"name_admin_bar" => __( "Project", "coderdojo" ),
		"item_published" => __( "Project published", "coderdojo" ),
		"item_published_privately" => __( "Project published privately.", "coderdojo" ),
		"item_reverted_to_draft" => __( "Project reverted to draft.", "coderdojo" ),
		"item_scheduled" => __( "Project scheduled", "coderdojo" ),
		"item_updated" => __( "Project updated.", "coderdojo" ),
		"parent_item_colon" => __( "Parent Project:", "coderdojo" ),
	];

	$args = [
		"label" => __( "Projects", "coderdojo" ),
		"labels" => $labels,
		"description" => "",
		"public" => false,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		'capability_type' => array('project','projects'), //custom capability type
        'map_meta_cap'    => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "projects", "with_front" => true ],
		"query_var" => true,
		"menu_position" => 24,
		"menu_icon" => "dashicons-portfolio",
		"supports" => [ "title", "editor", "thumbnail", "excerpt" ],
	];

	register_post_type( "projects", $args );
}

//add_action( 'init', 'register_custom_post_types' );
