<?php
/**
 * The core plugin class
 *
 * @package    Big_Santa_Anita_Canyon_Cabins
 * @subpackage Includes
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 */

namespace BSAC_Cabins\Includes;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Get plugins path to check for active plugins.
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

/**
 * Define the core functionality of the plugin.
 *
 * @since  1.0.0
 * @access public
 */
final class Init {

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

			// Get class dependencies.
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
	 * @return void The constructor is empty.
	 */
	private function __construct() {}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function dependencies() {

		// Translation functionality.
		require_once BSACC_PATH . 'includes/class-i18n.php';

		// Admin/backend functionality, scripts and styles.
		require_once BSACC_PATH . 'admin/class-admin.php';

		// Frontend functionality, scripts and styles.
		require_once BSACC_PATH . 'frontend/class-frontend.php';

		// Various media and media library functionality.
		require_once BSACC_PATH . 'includes/media/class-media.php';

		// Post types and taxonomies.
		require_once BSACC_PATH . 'includes/post-types-taxes/class-post-type-tax.php';

	}

}

/**
 * Put an instance of the class into a function.
 *
 * @since  1.0.0
 * @access public
 * @return object Returns an instance of the class.
 */
function bsacc_init() {

	return Init::instance();

}

// Run an instance of the class.
bsacc_init();