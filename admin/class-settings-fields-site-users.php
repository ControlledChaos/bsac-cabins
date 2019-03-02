<?php
/**
 * Settings fields for user options.
 *
 * @package    Big_Santa_Anita_Canyon_Cabins
 * @subpackage Admin
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 */

namespace BSAC_Cabins\Admin;

use BSAC_Cabins\Admin\Partials\Field_Callbacks\Users_Callbacks as Callbacks;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Settings fields for user options.
 *
 * @since  1.0.0
 * @access public
 */
class Settings_Fields_Users {

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
    public function __construct() {

        // Media settings.
        add_action( 'admin_init', [ $this, 'settings' ] );

	}

	/**
	 * Class dependency files.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function dependencies() {

		// Callbacks for the Dashboard tab.
		require BSACC_PATH . 'admin/partials/field-callbacks/class-users-callbacks.php';

	}

    /**
	 * User settings.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function settings() {

        // User settings section.
        add_settings_section(
            'bsacc-site-users',
            __( 'User Settings', 'bsac-cabins' ),
            [],
            'bsacc-site-users'
        );

        // Local avatars only (no Gravatars).
		add_settings_field(
			'bsacc_block_gravatar',
			__( 'Block Gravatars', 'bsac-cabins' ),
			[ Callbacks::instance(), 'block_gravatar' ],
			'bsacc-site-users',
			'bsacc-site-users',
			[ esc_html__( 'Prevent avatar requests from Gravatar.com', 'bsac-cabins' ) ]
		);

		register_setting(
			'bsacc-site-users',
			'bsacc_block_gravatar'
		);

    }

}

/**
 * Put an instance of the class into a function.
 *
 * @since  1.0.0
 * @access public
 * @return object Returns an instance of the class.
 */
function bsacc_settings_fields_users() {

	return Settings_Fields_Users::instance();

}

// Run an instance of the class.
bsacc_settings_fields_users();