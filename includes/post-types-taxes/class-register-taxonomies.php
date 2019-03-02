<?php
/**
 * Register taxonomies.
 *
 * @package    Big_Santa_Anita_Canyon_Cabins
 * @subpackage Includes\Post_Types_Taxes
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 *
 * @link       https://codex.wordpress.org/Function_Reference/register_taxonomy
 */

namespace BSAC_Cabins\Includes\Post_Types_Taxes;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Register taxonomies.
 *
 * @since  1.0.0
 * @access public
 */
final class Taxes_Register {

    /**
	 * Constructor magic method.
     *
     * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {

        // Register custom taxonomies.
		add_action( 'init', [ $this, 'register' ] );

	}

    /**
     * Register custom taxonomies.
     *
     * @since  1.0.0
	 * @access public
	 * @return void
     */
    public function register() {

        /**
         * Taxonomy: Sample taxonomy (Taxonomy).
         *
         * Renaming:
         * Search case "Taxonomy" and replace with your post type singular name.
         * Search case "Taxonomies" and replace with your post type plural name.
         * Search case "bsacc_taxonomy" and replace with your taxonomy database name.
         * Search case "taxonomies" and replace with your taxonomy permalink slug.
         */

        $labels = [
            'name'                       => __( 'Taxonomies', 'bsac-cabins' ),
            'singular_name'              => __( 'Taxonomy', 'bsac-cabins' ),
            'menu_name'                  => __( 'Taxonomy', 'bsac-cabins' ),
            'all_items'                  => __( 'All Taxonomies', 'bsac-cabins' ),
            'edit_item'                  => __( 'Edit Taxonomy', 'bsac-cabins' ),
            'view_item'                  => __( 'View Taxonomy', 'bsac-cabins' ),
            'update_item'                => __( 'Update Taxonomy', 'bsac-cabins' ),
            'add_new_item'               => __( 'Add New Taxonomy', 'bsac-cabins' ),
            'new_item_name'              => __( 'New Taxonomy', 'bsac-cabins' ),
            'parent_item'                => __( 'Parent Taxonomy', 'bsac-cabins' ),
            'parent_item_colon'          => __( 'Parent Taxonomy', 'bsac-cabins' ),
            'popular_items'              => __( 'Popular Taxonomies', 'bsac-cabins' ),
            'separate_items_with_commas' => __( 'Separate Taxonomies with commas', 'bsac-cabins' ),
            'add_or_remove_items'        => __( 'Add or Remove Taxonomies', 'bsac-cabins' ),
            'choose_from_most_used'      => __( 'Choose from the most used Taxonomies', 'bsac-cabins' ),
            'not_found'                  => __( 'No Taxonomies Found', 'bsac-cabins' ),
            'no_terms'                   => __( 'No Taxonomies', 'bsac-cabins' ),
            'items_list_navigation'      => __( 'Taxonomies List Navigation', 'bsac-cabins' ),
            'items_list'                 => __( 'Taxonomies List', 'bsac-cabins' )
        ];

        $options = [
            'label'              => __( 'Taxonomies', 'bsac-cabins' ),
            'labels'             => $labels,
            'public'             => true,
            'hierarchical'       => false,
            'label'              => 'Taxonomies',
            'show_ui'            => true,
            'show_in_menu'       => true,
            'show_in_nav_menus'  => true,
            'query_var'          => true,
            'rewrite'            => [
                'slug'         => 'taxonomies',
                'with_front'   => true,
                'hierarchical' => false,
            ],
            'show_admin_column'  => true,
            'show_in_rest'       => true,
            'rest_base'          => 'taxonomies',
            'show_in_quick_edit' => true
        ];

        /**
         * Register the taxonomy
         */
        register_taxonomy(
            'bsacc_taxonomy',
            [
                'bsacc_post_type' // Change to your post type name.
            ],
            $options
        );

    }

}

// Run the class.
$bsacc_taxes = new Taxes_Register;