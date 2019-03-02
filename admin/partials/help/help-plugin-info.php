<?php
/**
 * Content for the plugin More Information help tab.
 *
 * @package    Big_Santa_Anita_Canyon_Cabins
 * @subpackage Admin\Partials
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 */

namespace BSAC_Cabins\Admin\Partials\Help;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
} ?>
<h3><?php echo sprintf(
	'%1s %2s %3s',
	__( 'More information about the', 'bsac-cabins' ),
	get_bloginfo( 'name' ),
	__( 'plugin', 'bsac-cabins' )
); ?></h3>
<h4><?php _e( 'The plugin source', 'bsac-cabins' ); ?></h4>
<p><?php _e( 'Following is the the link to this plugin as it comes out of the box. Change this information to complement your site-specific version.', 'bsac-cabins' ); ?></p>
<p><a href="https://github.com/ControlledChaos/bsac-cabins" target="_blank">https://github.com/ControlledChaos/bsac-cabins</a></p>
<h4><?php _e( 'Ask for development help', 'bsac-cabins' ); ?></h4>
<?php echo sprintf(
	'<p>%1s <a href="mailto:greg@ccdzine.com">greg@ccdzine.com</a></p>',
	__( 'If you would like help developing this plugin for your project, contact the plugin author, Greg Sweet, at' )
 ); ?>