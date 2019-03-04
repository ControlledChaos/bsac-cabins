<?php
/**
 * Admin functiontionality and settings.
 *
 * @package    Big_Santa_Anita_Canyon_Cabins
 * @subpackage Admin
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 *
 * @todo       Add admin and user access checks.
 */

namespace BSAC_Cabins\Admin;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Admin functiontionality and settings.
 *
 * @since  1.0.0
 * @access public
 */
class Admin {

	/**
	 * Instance of the class
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object Returns the instance.
	 */
	public static function instance() {

		// Varialbe for the instance to be used outside the class.
		static $instance = null;

		if ( is_null( $instance ) ) {

			// Set variable for new instance.
			$instance = new self;

			// Require the class files.
			$instance->dependencies();

		}

		// Return the instance.
		return $instance;

	}

	/**
	 * Constructor method
	 *
	 * @since  1.0.0
	 * @access private
	 * @return self
	 */
	private function __construct() {

		// Enqueue the stylesheets for the admin area.
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_styles' ] );

		// Enqueue the JavaScript for the admin area.
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_scripts' ] );

		// Replace default post title placeholders.
		add_filter( 'enter_title_here', [ $this, 'title_placeholders' ] );

		// Customize post meta boxes.
		// add_action( 'add_meta_boxes', [ $this, 'customize_metaboxes' ], 10, 2 );

	}

	/**
	 * Class dependency files.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function dependencies() {

		// The ACF fields for cabins for sale.
		require_once BSACC_PATH . 'admin/class-fields-for-sale.php';

		// Stop here if not in the back end.
		if ( ! is_admin() ) {
			return;
		}

		// Add icons to the titles of ACF tab and accordion fields, if active.
		if ( bsacc_acf_pro() && ! get_option( 'bsacc_acf_activate_settings_page' ) ) {
			// include_once BSACC_PATH . 'admin/class-acf-tab-icons.php';
		}

	}

	/**
	 * Enqueue the stylesheets for the admin area.
	 *
	 * Uses the universal slug partial for admin pages. Set this
     * slug in the core plugin file.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_styles() {

		/**
		 * Enqueue the general backend styles.
		 *
		 * Included are just a few style rules for features added by this plugin.
		 *
		 * @since 1.0.0
		 */
		wp_enqueue_style( BSACC_ADMIN_SLUG . '-admin', BSACC_URL . 'admin/assets/css/admin.min.css', [], BSACC_VERSION, 'all' );

	}

	/**
	 * Enqueue the JavaScript for the admin area.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_scripts() {

		// Enqueue scripts for backend functionality of this plugin.
		wp_enqueue_script( BSACC_ADMIN_SLUG . '-admin', BSACC_URL . 'admin/assets/js/admin.js', [ 'jquery' ], BSACC_VERSION, true );

	}

	/**
     * Replace default post title placeholders.
     *
     * @since  1.0.0
	 * @access public
     * @param  object $title Stores the 'Enter title here" placeholder.
	 * @return object Returns the title placeholder.
     * @throws Non-Object Throws an error on attachment edit screens since
     *         there is no placeholder, so that post type is nullified.
     */
    public function title_placeholders( $title ) {

        // Get the current screen as a variable.
        $screen = get_current_screen();

        // Post type: post.
        if ( 'bsacc_forsale' == $screen->post_type ) {
            $post_title = esc_html__( 'Enter "Cabin" plus cabin number', 'bsac-cabins' );

        // Post type: attachment.
        } elseif ( $screen->post_type == 'attachment' ) {
            $post_title = null;

        // Post type: custom, unidentified.
        } else {
            $post_title = esc_html__( 'Enter Title', 'bsac-cabins' );
        }

        // Apply a filter conditional modification.
        $title = apply_filters( 'bsac_cabins_post_title_placeholders', $post_title );

        // Return the new placeholder.
        return $title;

	}

	/**
	 * Customize post meta boxes
	 *
	 * Used on post type edit pages.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object $post Gets the post object.
	 * @param  string $post_type Gets the post type.
	 * @global array $wp_meta_boxes Holds all the widgets for wp-admin
	 */
	public function customize_metaboxes( $post_type, $post ) {

		// Access global variables.
		global $wp_meta_boxes;

		/**
		 * Post excerpt in cabins for sale edit pages.
		 *
		 * @see bsacc_forsale
		 */

		// Screen reader title for toggle button.
		$wp_meta_boxes['bsacc_forsale']['normal']['core']['postexcerpt']['title'] = __( 'Cabin Summary', 'bsac-cabins' );

		// Meta box ID for toggling.
		$wp_meta_boxes['bsacc_forsale']['normal']['core']['postexcerpt']['id'] = 'for-sale-meta-box';

		// Callback function for meta box output.
		$wp_meta_boxes['bsacc_forsale']['normal']['core']['postexcerpt']['callback'] = [ $this, 'for_sale_excerpt_meta_box' ];
	}

	/**
	 * Excerpt meta box output
	 *
	 * For cabins for sale admin pages.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object $post Gets the post object.
	 */
	public function for_sale_excerpt_meta_box( $post ) {

		// Get the HTML for the meta box content.
		require BSACC_PATH . 'admin/partials/for-sale-excerpt-meta-box.php';

	}

}

/**
 * Put an instance of the class into a function.
 *
 * @since  1.0.0
 * @access public
 * @return object Returns an instance of the class.
 */
function bsacc_admin() {

	return Admin::instance();

}

// Run an instance of the class.
bsacc_admin();