<?php
/**
 * Media functionality.
 *
 * @package    Big_Santa_Anita_Canyon_Cabins
 * @subpackage Includes\Media
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 */

namespace BSAC_Cabins\Includes\Media;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Media functionality.
 *
 * @since  1.0.0
 * @access public
 */
class Media {

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

			// Get class dependencies
			// $instance->dependencies();

		}

		// Return the instance.
		return $instance;

	}

    /**
	 * Constructor method
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {

		// Add image sizes.
		add_action( 'init', [ $this, 'image_sizes' ] );

	}

	/**
	 * Get class dependencies
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function dependencies() {}

	/**
	 * Add image sizes.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function image_sizes() {

		// For link embedding and sharing on social sites.
		// add_image_size( __( 'Meta Image', 'bsac-cabins' ), 1200, 630, true );

	}

}

/**
 * Put an instance of the class into a function.
 *
 * @since  1.0.0
 * @access public
 * @return object Returns an instance of the class.
 */
function bsacc_media() {

	return Media::instance();

}

// Run an instance of the class.
bsacc_media();