<?php
/**
 * Big Santa Anita Canyon Cabins Plugin
 *
 * @package     Big_Santa_Anita_Canyon_Cabins
 * @version     1.0.0
 * @author      Greg Sweet <greg@ccdzine.com>
 * @copyright   Copyright © 2018, Greg Sweet
 * @link        https://github.com/ControlledChaos/bsac-cabins
 * @license     GPL-3.0+ http://www.gnu.org/licenses/gpl-3.0.txt
 *
 * Plugin Name:  Big Santa Anita Canyon Cabins Plugin
 * Plugin URI:   https://github.com/ControlledChaos/bsac-cabins
 * Description:  Cabins plugin for Big Santa Anita Canyon sites. Provides custom post types with custom fields for documenting the cabins of Big Santa Anita Canyon and for listing them for sale. Requires the Advanced Custom Fields Pro to be active.
 * Version:      1.0.0
 * Author:       Controlled Chaos Design
 * Author URI:   http://ccdzine.com/
 * License:      GPL-3.0+
 * License URI:  https://www.gnu.org/licenses/gpl.txt
 * Text Domain:  bsac-cabins
 * Domain Path:  /languages
 */

/**
 * License & Warranty
 *
 * Big Santa Anita Canyon Cabins is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * Big Santa Anita Canyon Cabins is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Big Santa Anita Canyon Cabins. If not, see {URI to Plugin License}.
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The core plugin class
 *
 * Defines constants, gets the initialization class file
 * plus the activation and deactivation classes.
 *
 * @since  1.0.0
 * @access public
 */

// First check for other classes with the same name.
if ( ! class_exists( 'Big_Santa_Anita_Canyon_Cabins' ) ) :
	final class Big_Santa_Anita_Canyon_Cabins {

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

				// Define plugin constants.
				$instance->constants();

				// Require the core plugin class files.
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
		 * @return void Constructor method is empty.
	 *              Change to `self` if used.
		 */
		private function __construct() {}

		/**
		 * Define plugin constants
		 *
		 * Change the prefix, the text domain, and the default meta image
		 * to that which suits the needs of your website.
		 *
		 * Change the version as appropriate.
		 *
		 * @since  1.0.0
		 * @access private
		 * @return void
		 */
		private function constants() {

			/**
			 * Plugin version
			 *
			 * Keeping the version at 1.0.0 as this is a starter plugin but
			 * you may want to start counting as you develop for your use case.
			 *
			 * @since  1.0.0
			 * @return string Returns the latest plugin version.
			 */
			if ( ! defined( 'BSACC_VERSION' ) ) {
				define( 'BSACC_VERSION', '1.0.0' );
			}

			/**
			 * Text domain
			 *
			 * @since  1.0.0
			 * @return string Returns the text domain of the plugin.
			 *
			 * @todo   Replace all strings with constant.
			 */
			if ( ! defined( 'BSACC_DOMAIN' ) ) {
				define( 'BSACC_DOMAIN', 'bsac-cabins' );
			}

			/**
			 * Plugin folder path
			 *
			 * @since  1.0.0
			 * @return string Returns the filesystem directory path (with trailing slash)
			 *                for the plugin __FILE__ passed in.
			 */
			if ( ! defined( 'BSACC_PATH' ) ) {
				define( 'BSACC_PATH', plugin_dir_path( __FILE__ ) );
			}

			/**
			 * Plugin folder URL
			 *
			 * @since  1.0.0
			 * @return string Returns the URL directory path (with trailing slash)
			 *                for the plugin __FILE__ passed in.
			 */
			if ( ! defined( 'BSACC_URL' ) ) {
				define( 'BSACC_URL', plugin_dir_url( __FILE__ ) );
			}

			/**
			 * Universal slug
			 *
			 * This URL slug is used for various plugin admin & settings pages.
			 *
			 * The prefix will change in your search & replace in renaming the plugin.
			 * Change the second part of the define(), here as 'bsac-cabins',
			 * to your preferred page slug.
			 *
			 * @since  1.0.0
			 * @return string Returns the URL slug of the admin pages.
			 */
			if ( ! defined( 'BSACC_ADMIN_SLUG' ) ) {
				define( 'BSACC_ADMIN_SLUG', 'bsac-cabins' );
			}

			/**
			 * Default meta image
			 *
			 * Change the path and file name to suit your needs.
			 *
			 * @since  1.0.0
			 * @return string Returns the URL of the image.
			 */
			if ( ! defined( 'BSACC_DEFAULT_META_IMAGE' ) ) {
				define(
					'BSACC_DEFAULT_META_IMAGE',
					plugins_url( 'frontend/assets/images/default-meta-image.jpg', __FILE__ )
				);
			}

		}

		/**
		 * Throw error on object clone.
		 *
		 * @since  1.0.0
		 * @access public
		 * @return void
		 */
		public function __clone() {

			// Cloning instances of the class is forbidden.
			_doing_it_wrong( __FUNCTION__, __( 'This is not allowed.', 'bsac-cabins' ), '1.0.0' );

		}

		/**
		 * Disable unserializing of the class.
		 *
		 * @since  1.0.0
		 * @access public
		 * @return void
		 */
		public function __wakeup() {

			// Unserializing instances of the class is forbidden.
			_doing_it_wrong( __FUNCTION__, __( 'This is not allowed.', 'bsac-cabins' ), '1.0.0' );

		}

		/**
		 * Require the core plugin class files.
		 *
		 * @since  1.0.0
		 * @access private
		 * @return void Gets the file which contains the core plugin class.
		 */
		private function dependencies() {

			// The hub of all other dependency files.
			require_once BSACC_PATH . 'includes/class-init.php';

			// Include the activation class.
			require_once BSACC_PATH . 'includes/class-activate.php';

			// Include the deactivation class.
			require_once BSACC_PATH . 'includes/class-deactivate.php';

		}

	}
	// End core plugin class.

	/**
	 * Put an instance of the plugin class into a function.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object Returns the instance of the `Big_Santa_Anita_Canyon_Cabins` class.
	 */
	function bsacc_plugin() {

		return Big_Santa_Anita_Canyon_Cabins::instance();

	}

	// Begin plugin functionality.
	bsacc_plugin();

// End the check for the plugin class.
endif;

// Bail out now if the core class was not run.
if ( ! function_exists( 'bsacc_plugin' ) ) {
	return;
}

/**
 * Register the activaction & deactivation hooks.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
register_activation_hook( __FILE__, '\bsacc_activate_plugin' );
register_deactivation_hook( __FILE__, '\bsacc_deactivate_plugin' );

/**
 * The code that runs during plugin activation.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function bsacc_activate_plugin() {

	// Run the activation class.
	bsacc_activate();

}

/**
 * The code that runs during plugin deactivation.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function bsacc_deactivate_plugin() {

	// Run the deactivation class.
	bsacc_deactivate();

}

/**
 * Check for Advanced Custom Fields.
 *
 * @since  1.0.0
 * @access public
 * @return bool Returns true if the ACF free or Pro plugin is active.
 */
function bsacc_acf() {

	if ( class_exists( 'acf' ) ) {
		return true;
	} else {
		return false;
	}

}

/**
 * Check for Advanced Custom Fields Pro.
 *
 * @since  1.0.0
 * @access public
 * @return bool Returns true if the ACF Pro plugin is active.
 */
function bsacc_acf_pro() {

	if ( class_exists( 'acf_pro' ) ) {
		return true;
	} else {
		return false;
	}

}

/**
 * Check for Advanced Custom Fields options page.
 *
 * @since  1.0.0
 * @access public
 * @return bool Returns true if ACF 4.0 free plus the
 *              Options Page addon or Pro plugin is active.
 */
function bsacc_acf_options() {

	if ( class_exists( 'acf_pro' ) ) {
		return true;
	} elseif ( ( class_exists( 'acf' ) && class_exists( 'acf_options_page' ) ) ) {
		return true;
	} else {
		return false;
	}

}

/**
 * Add an admin error notice if Advanced Custom Fields Pro is not active.
 *
 * @since  1.0.0
 * @return void
 */
if ( ! bsacc_acf_pro() ) {

	add_action( 'admin_notices', 'bsacc_acf_notice' );

}

/**
 * Get the Advanced Custom Fields Pro admin notice output.
 *
 * @since  1.0.0
 * @return void
 */
function bsacc_acf_notice() {

	require_once plugin_dir_path( __FILE__ ) . 'includes/partials/acf-notice.php';

}