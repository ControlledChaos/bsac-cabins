<?php
/**
 * About page site settings output.
 *
 * Uses the universal slug partial for admin pages. Set this
 * slug in the core plugin file.
 *
 * @package    Big_Santa_Anita_Canyon_Cabins
 * @subpackage Admin\Partials
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 */

namespace BSAC_Cabins\Admin\Partials;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
} ?>
<h3><?php _e( 'Website settings', 'bsac-cabins' ); ?></h3>
<?php echo sprintf(
	'<p>%1s <a href="%2s">%3s</a> %4s</p>',
	__( 'The plugin is equipped with', 'bsac-cabins' ),
	esc_url( admin_url( '?page=' . BSACC_ADMIN_SLUG . '-settings' ) ),
	__( 'an admin page', 'bsac-cabins' ),
	__( 'for customizing the user interface of WordPress/ClassicPress, as well as other useful features.', 'bsac-cabins' )
 ); ?>
<h3><?php _e( 'Clean Up the Admin', 'bsac-cabins' ); ?></h3>
<ul>
	<li><?php _e( 'Remove dashboard widgets: WordPress/ClassicPress news, quick press', 'bsac-cabins' ); ?></li>
	<li><?php _e( 'Make Menus and Widgets top level menu items', 'bsac-cabins' ); ?></li>
	<li><?php _e( 'Remove select admin menu items', 'bsac-cabins' ); ?></li>
	<li><?php _e( 'Remove WordPress/ClassicPress logo from admin bar', 'bsac-cabins' ); ?></li>
	<li><?php _e( 'Remove access to theme and plugin editors', 'bsac-cabins' ); ?></li>
</ul>
<h3><?php _e( 'Enchance the Admin', 'bsac-cabins' ); ?></h3>
<ul>
	<li><?php _e( 'Add three admin bar menus', 'bsac-cabins' ); ?></li>
	<li><?php _e( 'Add custom post types to the At a Glance widget', 'bsac-cabins' ); ?></li>
	<li><?php _e( 'Custom admin footer message', 'bsac-cabins' ); ?></li>
</ul>