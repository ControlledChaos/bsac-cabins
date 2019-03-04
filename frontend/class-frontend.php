<?php
/**
 * The frontend functionality of the plugin
 *
 * @package    Big_Santa_Anita_Canyon_Cabins
 * @subpackage Frontend
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 */

namespace BSAC_Cabins\Frontend;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The frontend functionality of the plugin
 *
 * @since  1.0.0
 * @access public
 */
class Frontend {

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

			// Frontend dependencies
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

		// Enqueue the stylesheets for the front end.
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_styles' ] );

		// Enqueue the JavaScript for the front end.
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );

	}

	/**
	 * Frontend dependencies
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function dependencies() {

		// The frontend content filters for post types.
		require_once BSACC_PATH . 'frontend/class-content-filters.php';

	}

	/**
	 * Enqueue the stylesheets for the front end.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_styles() {

		// Enqueue the front end styles.
		wp_enqueue_style( BSACC_ADMIN_SLUG . '-frontend', BSACC_URL . 'frontend/assets/css/frontend.min.css', [], BSACC_VERSION, 'all' );

	}

	/**
	 * Enqueue the JavaScript for the admin area.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_scripts() {

		// Enqueue scripts for front end functionality of this plugin.
		wp_enqueue_script( BSACC_ADMIN_SLUG . '-frontend', BSACC_URL . 'frontend/assets/js/frontend.min.js', [ 'jquery' ], BSACC_VERSION, true );

	}

}

/**
 * Put an instance of the class into a function.
 *
 * @since  1.0.0
 * @access public
 * @return object Returns an instance of the class.
 */
function bsacc_frontend() {

	return Frontend::instance();

}

// Run an instance of the class.
bsacc_frontend();