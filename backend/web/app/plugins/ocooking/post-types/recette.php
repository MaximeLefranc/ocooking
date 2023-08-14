<?php

/**
 * Registers the `recette` post type.
 */
function recette_init()
{
    register_post_type(
        'recette',
        [
            'labels'                => [
                'name'                  => __('Recettes', 'ocooking'),
                'singular_name'         => __('Recette', 'ocooking'),
                'all_items'             => __('All Recettes', 'ocooking'),
                'archives'              => __('Recette Archives', 'ocooking'),
                'attributes'            => __('Recette Attributes', 'ocooking'),
                'insert_into_item'      => __('Insert into recette', 'ocooking'),
                'uploaded_to_this_item' => __('Uploaded to this recette', 'ocooking'),
                'featured_image'        => _x('Featured Image', 'recette', 'ocooking'),
                'set_featured_image'    => _x('Set featured image', 'recette', 'ocooking'),
                'remove_featured_image' => _x('Remove featured image', 'recette', 'ocooking'),
                'use_featured_image'    => _x('Use as featured image', 'recette', 'ocooking'),
                'filter_items_list'     => __('Filter recettes list', 'ocooking'),
                'items_list_navigation' => __('Recettes list navigation', 'ocooking'),
                'items_list'            => __('Recettes list', 'ocooking'),
                'new_item'              => __('New Recette', 'ocooking'),
                'add_new'               => __('Add New', 'ocooking'),
                'add_new_item'          => __('Add New Recette', 'ocooking'),
                'edit_item'             => __('Edit Recette', 'ocooking'),
                'view_item'             => __('View Recette', 'ocooking'),
                'view_items'            => __('View Recettes', 'ocooking'),
                'search_items'          => __('Search recettes', 'ocooking'),
                'not_found'             => __('No recettes found', 'ocooking'),
                'not_found_in_trash'    => __('No recettes found in trash', 'ocooking'),
                'parent_item_colon'     => __('Parent Recette:', 'ocooking'),
                'menu_name'             => __('Recettes', 'ocooking'),
            ],
            'public'                => true,
            'hierarchical'          => false,
            'show_ui'               => true,
            'show_in_nav_menus'     => true,
            'supports'              => ['title', 'editor', 'thumbnail', 'excerpt'],
            'has_archive'           => true,
            'rewrite'               => true,
            'query_var'             => true,
            'menu_position'         => null,
            'menu_icon'             => 'dashicons-food',
            'show_in_rest'          => true,
            'rest_base'             => 'recettes',
            'rest_controller_class' => 'WP_REST_Posts_Controller',
        ]
    );
}

add_action('init', 'recette_init');

/**
 * Sets the post updated messages for the `recette` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `recette` post type.
 */
function recette_updated_messages($messages)
{
    global $post;

    $permalink = get_permalink($post);

    $messages['recette'] = [
        0  => '', // Unused. Messages start at index 1.
        /* translators: %s: post permalink */
        1  => sprintf(__('Recette updated. <a target="_blank" href="%s">View recette</a>', 'ocooking'), esc_url($permalink)),
        2  => __('Custom field updated.', 'ocooking'),
        3  => __('Custom field deleted.', 'ocooking'),
        4  => __('Recette updated.', 'ocooking'),
        /* translators: %s: date and time of the revision */
        5  => isset($_GET['revision']) ? sprintf(__('Recette restored to revision from %s', 'ocooking'), wp_post_revision_title((int) $_GET['revision'], false)) : false, // phpcs:ignore WordPress.Security.NonceVerification.Recommended
        /* translators: %s: post permalink */
        6  => sprintf(__('Recette published. <a href="%s">View recette</a>', 'ocooking'), esc_url($permalink)),
        7  => __('Recette saved.', 'ocooking'),
        /* translators: %s: post permalink */
        8  => sprintf(__('Recette submitted. <a target="_blank" href="%s">Preview recette</a>', 'ocooking'), esc_url(add_query_arg('preview', 'true', $permalink))),
        /* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
        9  => sprintf(__('Recette scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview recette</a>', 'ocooking'), date_i18n(__('M j, Y @ G:i', 'ocooking'), strtotime($post->post_date)), esc_url($permalink)),
        /* translators: %s: post permalink */
        10 => sprintf(__('Recette draft updated. <a target="_blank" href="%s">Preview recette</a>', 'ocooking'), esc_url(add_query_arg('preview', 'true', $permalink))),
    ];

    return $messages;
}

add_filter('post_updated_messages', 'recette_updated_messages');

/**
 * Sets the bulk post updated messages for the `recette` post type.
 *
 * @param  array $bulk_messages Arrays of messages, each keyed by the corresponding post type. Messages are
 *                              keyed with 'updated', 'locked', 'deleted', 'trashed', and 'untrashed'.
 * @param  int[] $bulk_counts   Array of item counts for each message, used to build internationalized strings.
 * @return array Bulk messages for the `recette` post type.
 */
function recette_bulk_updated_messages($bulk_messages, $bulk_counts)
{
    global $post;

    $bulk_messages['recette'] = [
        /* translators: %s: Number of recettes. */
        'updated'   => _n('%s recette updated.', '%s recettes updated.', $bulk_counts['updated'], 'ocooking'),
        'locked'    => (1 === $bulk_counts['locked']) ? __('1 recette not updated, somebody is editing it.', 'ocooking') :
            /* translators: %s: Number of recettes. */
            _n('%s recette not updated, somebody is editing it.', '%s recettes not updated, somebody is editing them.', $bulk_counts['locked'], 'ocooking'),
        /* translators: %s: Number of recettes. */
        'deleted'   => _n('%s recette permanently deleted.', '%s recettes permanently deleted.', $bulk_counts['deleted'], 'ocooking'),
        /* translators: %s: Number of recettes. */
        'trashed'   => _n('%s recette moved to the Trash.', '%s recettes moved to the Trash.', $bulk_counts['trashed'], 'ocooking'),
        /* translators: %s: Number of recettes. */
        'untrashed' => _n('%s recette restored from the Trash.', '%s recettes restored from the Trash.', $bulk_counts['untrashed'], 'ocooking'),
    ];

    return $bulk_messages;
}

add_filter('bulk_post_updated_messages', 'recette_bulk_updated_messages', 10, 2);
