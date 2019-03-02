<?php
/**
 * Admin notice that this plugin needs the Advanced Custom Fields Pro plugin.
 *
 * @package    Big_Santa_Anita_Canyon_Cabins
 * @subpackage Includes\Partials
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 */

namespace BSAC_Cabins\Includes\Partials;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
} ?>
<div class="notice notice-error">
	<?php
	echo sprintf(
		'<p>%1s <a href="%3s" target="_blank">%4s</a> %5s</p>',
		esc_html__( 'The Big Santa Anita Canyon Cabins plugin requires the', 'bsac-cabins' ),
		esc_url( 'https://www.advancedcustomfields.com/pro/' ),
		esc_html( 'Advanced Custom Fields Pro' ),
		esc_html__( 'to be installed and activated.', 'bsac-cabins' )
	); ?>
</div>