<?php

/**
 * Registers the `ingredient` taxonomy,
 * for use with 'recette'.
 */
function ingredient_init() {
	register_taxonomy( 'ingredient', [ 'recette' ], [
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
			'name'                       => __( 'Ingredients', 'ocooking' ),
			'singular_name'              => _x( 'Ingredient', 'taxonomy general name', 'ocooking' ),
			'search_items'               => __( 'Search Ingredients', 'ocooking' ),
			'popular_items'              => __( 'Popular Ingredients', 'ocooking' ),
			'all_items'                  => __( 'All Ingredients', 'ocooking' ),
			'parent_item'                => __( 'Parent Ingredient', 'ocooking' ),
			'parent_item_colon'          => __( 'Parent Ingredient:', 'ocooking' ),
			'edit_item'                  => __( 'Edit Ingredient', 'ocooking' ),
			'update_item'                => __( 'Update Ingredient', 'ocooking' ),
			'view_item'                  => __( 'View Ingredient', 'ocooking' ),
			'add_new_item'               => __( 'Add New Ingredient', 'ocooking' ),
			'new_item_name'              => __( 'New Ingredient', 'ocooking' ),
			'separate_items_with_commas' => __( 'Separate ingredients with commas', 'ocooking' ),
			'add_or_remove_items'        => __( 'Add or remove ingredients', 'ocooking' ),
			'choose_from_most_used'      => __( 'Choose from the most used ingredients', 'ocooking' ),
			'not_found'                  => __( 'No ingredients found.', 'ocooking' ),
			'no_terms'                   => __( 'No ingredients', 'ocooking' ),
			'menu_name'                  => __( 'Ingredients', 'ocooking' ),
			'items_list_navigation'      => __( 'Ingredients list navigation', 'ocooking' ),
			'items_list'                 => __( 'Ingredients list', 'ocooking' ),
			'most_used'                  => _x( 'Most Used', 'ingredient', 'ocooking' ),
			'back_to_items'              => __( '&larr; Back to Ingredients', 'ocooking' ),
		],
		'show_in_rest'          => true,
		'rest_base'             => 'ingredient',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	] );

}

add_action( 'init', 'ingredient_init' );

/**
 * Sets the post updated messages for the `ingredient` taxonomy.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `ingredient` taxonomy.
 */
function ingredient_updated_messages( $messages ) {

	$messages['ingredient'] = [
		0 => '', // Unused. Messages start at index 1.
		1 => __( 'Ingredient added.', 'ocooking' ),
		2 => __( 'Ingredient deleted.', 'ocooking' ),
		3 => __( 'Ingredient updated.', 'ocooking' ),
		4 => __( 'Ingredient not added.', 'ocooking' ),
		5 => __( 'Ingredient not updated.', 'ocooking' ),
		6 => __( 'Ingredients deleted.', 'ocooking' ),
	];

	return $messages;
}

add_filter( 'term_updated_messages', 'ingredient_updated_messages' );
