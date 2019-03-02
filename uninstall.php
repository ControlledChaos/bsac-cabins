<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * @package    Big_Santa_Anita_Canyon_Cabins
 * @subpackage Admin
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

/**
 * Uninstall avatars.
 *
 * During uninstallation, remove the custom field from the users
 * and delete the local avatars.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function bsacc_user_avatars_uninstall() {

	$bsacc_user_avatars = new bsacc_user_avatars;
	$users            = get_users_of_blog();

	foreach ( $users as $user ) {
		$bsacc_user_avatars->avatar_delete( $user->user_id );
	}

	delete_option( 'bsacc_user_avatars_caps' );

}
register_uninstall_hook( __FILE__, 'bsacc_user_avatars_uninstall' );