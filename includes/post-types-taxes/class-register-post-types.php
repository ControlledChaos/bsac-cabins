<?php
/**
 * Register post types.
 *
 * @package    Big_Santa_Anita_Canyon_Cabins
 * @subpackage Includes\Post_Types_Taxes
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 */

namespace BSAC_Cabins\Includes\Post_Types_Taxes;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Register post types.
 *
 * @since  1.0.0
 * @access public
 */
final class Post_Types_Register {

    /**
	 * Constructor magic method.
     *
     * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {

        // Register custom post types.
		add_action( 'init', [ $this, 'register' ] );

	}

    /**
     * Register custom post types.
     *
     * @since  1.0.0
	 * @access public
	 * @return void
     */
    public function register() {

        /**
         * Post Type: Cabins
         *
         * General documentaion of the cabins.
         */

        $labels = [
            'name'                  => __( 'Cabins', 'bsac-cabins' ),
            'singular_name'         => __( 'Cabin', 'bsac-cabins' ),
            'menu_name'             => __( 'Cabins', 'bsac-cabins' ),
            'all_items'             => __( 'All Cabins', 'bsac-cabins' ),
            'add_new'               => __( 'Add New', 'bsac-cabins' ),
            'add_new_item'          => __( 'Add New Cabin', 'bsac-cabins' ),
            'edit_item'             => __( 'Edit Cabin', 'bsac-cabins' ),
            'new_item'              => __( 'New Cabin', 'bsac-cabins' ),
            'view_item'             => __( 'View Cabin', 'bsac-cabins' ),
            'view_items'            => __( 'View Cabins', 'bsac-cabins' ),
            'search_items'          => __( 'Search Cabins', 'bsac-cabins' ),
            'not_found'             => __( 'No Cabins Found', 'bsac-cabins' ),
            'not_found_in_trash'    => __( 'No Cabins Found in Trash', 'bsac-cabins' ),
            'parent_item_colon'     => __( 'Parent Cabin', 'bsac-cabins' ),
            'featured_image'        => __( 'Featured image for this cabin', 'bsac-cabins' ),
            'set_featured_image'    => __( 'Set featured image for this cabin', 'bsac-cabins' ),
            'remove_featured_image' => __( 'Remove featured image for this cabin', 'bsac-cabins' ),
            'use_featured_image'    => __( 'Use as featured image for this cabin', 'bsac-cabins' ),
            'archives'              => __( 'Cabins archives', 'bsac-cabins' ),
            'insert_into_item'      => __( 'Insert into Cabin', 'bsac-cabins' ),
            'uploaded_to_this_item' => __( 'Uploaded to this Cabin', 'bsac-cabins' ),
            'filter_items_list'     => __( 'Filter Cabins', 'bsac-cabins' ),
            'items_list_navigation' => __( 'Cabins list navigation', 'bsac-cabins' ),
            'items_list'            => __( 'Cabins List', 'bsac-cabins' ),
            'attributes'            => __( 'Cabin Attributes', 'bsac-cabins' ),
            'parent_item_colon'     => __( 'Parent Cabin', 'bsac-cabins' ),
        ];

        // Apply a filter to labels for customization.
        $labels = apply_filters( 'bsacc_cabins_labels', $labels );

        $options = [
            'label'               => __( 'Cabins', 'bsac-cabins' ),
            'labels'              => $labels,
            'description'         => __( 'Custom post type description.', 'bsac-cabins' ),
            'public'              => true,
            'publicly_queryable'  => true,
            'show_ui'             => true,
            'show_in_rest'        => false,
            'rest_base'           => 'bsacc_cabins_rest_api',
            'has_archive'         => true,
            'show_in_menu'        => true,
            'exclude_from_search' => false,
            'capability_type'     => 'post',
            'map_meta_cap'        => true,
            'hierarchical'        => false,
            'rewrite'             => [
                'slug'       => 'cabins',
                'with_front' => true
            ],
            'query_var'           => 'bsacc_cabins',
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-admin-home',
            'supports'            => [
                'title',
                'editor',
                'thumbnail',
                'excerpt',
                'trackbacks',
                'custom-fields',
                'comments',
                'revisions',
                'author',
                'page-attributes',
                'post-formats'
            ],
            'taxonomies'          => [
                'category',
                'post_tag'
            ],
        ];

        // Apply a filter to arguments for customization.
        $options = apply_filters( 'bsacc_cabins_args', $options );

        /**
         * Register the post type
         */
        register_post_type(
            'bsacc_cabins',
            $options
        );

        /**
         * Post Type: Cabins For Sale
         *
         * Listings of cabins for sale and sold.
         */

        $labels = [
            'name'                  => __( 'Cabins For Sale', 'bsac-cabins' ),
            'singular_name'         => __( 'Cabin For Sale', 'bsac-cabins' ),
            'menu_name'             => __( 'Cabins For Sale', 'bsac-cabins' ),
            'all_items'             => __( 'All Cabins For Sale', 'bsac-cabins' ),
            'add_new'               => __( 'Add New', 'bsac-cabins' ),
            'add_new_item'          => __( 'Add New Cabin For Sale', 'bsac-cabins' ),
            'edit_item'             => __( 'Edit Cabin For Sale', 'bsac-cabins' ),
            'new_item'              => __( 'New Cabin', 'bsac-cabins' ),
            'view_item'             => __( 'View Cabin', 'bsac-cabins' ),
            'view_items'            => __( 'View Cabins For Sale', 'bsac-cabins' ),
            'search_items'          => __( 'Search Cabins For Sale', 'bsac-cabins' ),
            'not_found'             => __( 'No Cabins For Sale Found', 'bsac-cabins' ),
            'not_found_in_trash'    => __( 'No Cabins For Sale Found in Trash', 'bsac-cabins' ),
            'parent_item_colon'     => __( 'Parent Cabin', 'bsac-cabins' ),
            'featured_image'        => __( 'Featured image for this cabin', 'bsac-cabins' ),
            'set_featured_image'    => __( 'Set featured image for this cabin', 'bsac-cabins' ),
            'remove_featured_image' => __( 'Remove featured image for this cabin', 'bsac-cabins' ),
            'use_featured_image'    => __( 'Use as featured image for this cabin', 'bsac-cabins' ),
            'archives'              => __( 'Cabins For Sale archives', 'bsac-cabins' ),
            'insert_into_item'      => __( 'Insert into Cabin', 'bsac-cabins' ),
            'uploaded_to_this_item' => __( 'Uploaded to this Cabin', 'bsac-cabins' ),
            'filter_items_list'     => __( 'Filter Cabins For Sale', 'bsac-cabins' ),
            'items_list_navigation' => __( 'Cabins For Sale list navigation', 'bsac-cabins' ),
            'items_list'            => __( 'Cabins For Sale List', 'bsac-cabins' ),
            'attributes'            => __( 'Cabin Attributes', 'bsac-cabins' ),
            'parent_item_colon'     => __( 'Parent Cabin', 'bsac-cabins' ),
        ];

        // Apply a filter to labels for customization.
        $labels = apply_filters( 'bsacc_forsale_labels', $labels );

        $options = [
            'label'               => __( 'Cabins For Sale', 'bsac-cabins' ),
            'labels'              => $labels,
            'description'         => __( 'Custom post type description.', 'bsac-cabins' ),
            'public'              => true,
            'publicly_queryable'  => true,
            'show_ui'             => true,
            'show_in_rest'        => false,
            'rest_base'           => 'bsacc_forsale_rest_api',
            'has_archive'         => true,
            'show_in_menu'        => true,
            'exclude_from_search' => false,
            'capability_type'     => 'post',
            'map_meta_cap'        => true,
            'hierarchical'        => false,
            'rewrite'             => [
                'slug'       => 'cabins-for-sale',
                'with_front' => true
            ],
            'query_var'           => 'bsacc_forsale',
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-flag',
            'supports'            => [
                'title',
                'editor',
                'thumbnail',
                'excerpt',
                'trackbacks',
                'custom-fields',
                'comments',
                'revisions',
                'author',
                'page-attributes',
                'post-formats'
            ],
            'taxonomies'          => [
                'bsacc_status',
                'category',
                'post_tag'
            ],
        ];

        // Apply a filter to arguments for customization.
        $options = apply_filters( 'bsacc_forsale_args', $options );

        /**
         * Register the post type
         */
        register_post_type(
            'bsacc_forsale',
            $options
        );

    }

}

// Run the class.
$bsacc_forsales = new Post_Types_Register;