<?php

function get_all_custom_post_types() {

	$args = array(
        'public'   => true,
        '_builtin' => false
    );
    $custom_post_types =  get_post_types($args,'objects');

    return $custom_post_types;
}

function get_taxonomy_terms($custom_post_type, $number) {

	$taxonomy = get_custom_post_type_taxonomy($custom_post_type);	
    $terms = get_custom_taxonomy_terms($taxonomy, $number);

    return $terms;
}

function get_custom_post_type_taxonomy($custom_post_type) {

    $taxonomy = "";
    switch ($custom_post_type) {
        case "software":
            $taxonomy = "software_groups";
            break;
        case "hardware":
            $taxonomy  = "hardware_groups";
            break;
        case "studio":
            $taxonomy  = "studio_groups";
            break;
        case "arcade":
            $taxonomy  = "arcade_groups";
            break;
        case "other":
            $taxonomy  = "other_groups";
            break;
        default:
    }
    return $taxonomy;
}

function get_taxonomy_post_type($taxonomy) {

    switch ($taxonomy) {
        case "software_groups":
            $custom_post_type = "software";
            break;
        case "hardware_groups":
            $custom_post_type = "hardware";
            break;
        case "studio_groups":
            $custom_post_type = "studio";
            break;
        case "arcade_groups":
            $custom_post_type = "arcade";
            break;
        case "other_groups":
            $custom_post_type = "other";
            break;
        default:
    }
    return $custom_post_type;
}

function get_custom_taxonomy_terms($taxonomy, $number) {
	
    $terms = get_terms( array(
		'taxonomy' => $taxonomy,
		'orderby' => 'term_id',
		'order' => 'ASC',
		'number' => $number,
		'hide_empty' => false
	) );
    return $terms;
}


