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
         * Taxonomy: Sale Status.
         */

        $labels = [
            'name'                       => __( 'Sale Statuses', 'bsac-cabins' ),
            'singular_name'              => __( 'Sale Status', 'bsac-cabins' ),
            'menu_name'                  => __( 'Sale Status', 'bsac-cabins' ),
            'all_items'                  => __( 'All Sale Statuses', 'bsac-cabins' ),
            'edit_item'                  => __( 'Edit Sale Status', 'bsac-cabins' ),
            'view_item'                  => __( 'View Sale Status', 'bsac-cabins' ),
            'update_item'                => __( 'Update Sale Status', 'bsac-cabins' ),
            'add_new_item'               => __( 'Add New Sale Status', 'bsac-cabins' ),
            'new_item_name'              => __( 'New Sale Status', 'bsac-cabins' ),
            'parent_item'                => __( 'Parent Sale Status', 'bsac-cabins' ),
            'parent_item_colon'          => __( 'Parent Sale Status', 'bsac-cabins' ),
            'popular_items'              => __( 'Popular Sale Statuses', 'bsac-cabins' ),
            'separate_items_with_commas' => __( 'Separate Sale Statuses with commas', 'bsac-cabins' ),
            'add_or_remove_items'        => __( 'Add or Remove Sale Statuses', 'bsac-cabins' ),
            'choose_from_most_used'      => __( 'Choose from the most used Sale Statuses', 'bsac-cabins' ),
            'not_found'                  => __( 'No Sale Statuses Found', 'bsac-cabins' ),
            'no_terms'                   => __( 'No Sale Statuses', 'bsac-cabins' ),
            'items_list_navigation'      => __( 'Sale Statuses List Navigation', 'bsac-cabins' ),
            'items_list'                 => __( 'Sale Statuses List', 'bsac-cabins' )
        ];

        $options = [
            'label'              => __( 'Sale Statuses', 'bsac-cabins' ),
            'labels'             => $labels,
            'public'             => true,
            'hierarchical'       => false,
            'label'              => 'Sale Statuses',
            'show_ui'            => true,
            'show_in_menu'       => true,
            'show_in_nav_menus'  => true,
            'query_var'          => true,
            'rewrite'            => [
                'slug'         => 'sale-status',
                'with_front'   => true,
                'hierarchical' => false,
            ],
            'show_admin_column'  => true,
            'show_in_rest'       => true,
            'rest_base'          => 'sale-status',
            'show_in_quick_edit' => true
        ];

        /**
         * Register the taxonomy
         */
        register_taxonomy(
            'bsacc_status',
            [
                'bsacc_forsale'
            ],
            $options
        );

    }

}

// Run the class.
$bsacc_taxes = new Taxes_Register;