<?php
/**
 * Wordpress user functionality.
 *
 * @package    Big_Santa_Anita_Canyon_Cabins
 * @subpackage Includes\Users
 *
 * @since      1.0.0
 * @author	   Jared Atchison
 * @author     Greg Sweet <greg@ccdzine.com>
 */

namespace BSAC_Cabins\Includes\Users;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Wordpress user functionality.
 *
 * @since  1.0.0
 * @access public
 */
class Users {

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
	 * @access public
	 * @return self
	 */
	public function __construct() {}

	/**
	 * Class dependency files.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function dependencies() {

		// User avatars.
		require_once BSACC_PATH . 'includes/users/class-user-avatars.php';

	}

}

/**
 * Put an instance of the class into a function.
 *
 * @since  1.0.0
 * @access public
 * @return object Returns an instance of the class.
 */
function bsacc_users() {

	return Users::instance();

}

// Run an instance of the class.
bsacc_users();