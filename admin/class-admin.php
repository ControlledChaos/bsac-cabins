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

	}

	/**
	 * Class dependency files.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function dependencies() {

		// The core settings class for the plugin.
		// require_once BSACC_PATH . 'admin/class-settings.php';

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