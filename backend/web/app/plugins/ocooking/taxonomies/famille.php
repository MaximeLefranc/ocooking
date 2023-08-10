<?php

/**
 * Registers the `famille` taxonomy,
 * for use with 'recette'.
 */
function famille_init() {
	register_taxonomy( 'famille', [ 'recette' ], [
		'hierarchical'          => false,
		'public'                => true,
		'show_in_nav_menus'     => true,
		'show_ui'               => true,
		'show_admin_column'     => false,
		'query_var'             => true,
		'rewrite'               => true,
		'capabilities'          => [
			'manage_terms' => 'edit_posts',
			'edit_terms'   => 'edit_posts',
			'delete_terms' => 'edit_posts',
			'assign_terms' => 'edit_posts',
		],
		'labels'                => [
			'name'                       => __( 'Familles', 'ocooking' ),
			'singular_name'              => _x( 'Famille', 'taxonomy general name', 'ocooking' ),
			'search_items'               => __( 'Search Familles', 'ocooking' ),
			'popular_items'              => __( 'Popular Familles', 'ocooking' ),
			'all_items'                  => __( 'All Familles', 'ocooking' ),
			'parent_item'                => __( 'Parent Famille', 'ocooking' ),
			'parent_item_colon'          => __( 'Parent Famille:', 'ocooking' ),
			'edit_item'                  => __( 'Edit Famille', 'ocooking' ),
			'update_item'                => __( 'Update Famille', 'ocooking' ),
			'view_item'                  => __( 'View Famille', 'ocooking' ),
			'add_new_item'               => __( 'Add New Famille', 'ocooking' ),
			'new_item_name'              => __( 'New Famille', 'ocooking' ),
			'separate_items_with_commas' => __( 'Separate familles with commas', 'ocooking' ),
			'add_or_remove_items'        => __( 'Add or remove familles', 'ocooking' ),
			'choose_from_most_used'      => __( 'Choose from the most used familles', 'ocooking' ),
			'not_found'                  => __( 'No familles found.', 'ocooking' ),
			'no_terms'                   => __( 'No familles', 'ocooking' ),
			'menu_name'                  => __( 'Familles', 'ocooking' ),
			'items_list_navigation'      => __( 'Familles list navigation', 'ocooking' ),
			'items_list'                 => __( 'Familles list', 'ocooking' ),
			'most_used'                  => _x( 'Most Used', 'famille', 'ocooking' ),
			'back_to_items'              => __( '&larr; Back to Familles', 'ocooking' ),
		],
		'show_in_rest'          => true,
		'rest_base'             => 'famille',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	] );

}

add_action( 'init', 'famille_init' );

/**
 * Sets the post updated messages for the `famille` taxonomy.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `famille` taxonomy.
 */
function famille_updated_messages( $messages ) {

	$messages['famille'] = [
		0 => '', // Unused. Messages start at index 1.
		1 => __( 'Famille added.', 'ocooking' ),
		2 => __( 'Famille deleted.', 'ocooking' ),
		3 => __( 'Famille updated.', 'ocooking' ),
		4 => __( 'Famille not added.', 'ocooking' ),
		5 => __( 'Famille not updated.', 'ocooking' ),
		6 => __( 'Familles deleted.', 'ocooking' ),
	];

	return $messages;
}

add_filter( 'term_updated_messages', 'famille_updated_messages' );
