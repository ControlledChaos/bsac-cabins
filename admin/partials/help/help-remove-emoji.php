<?php
/**
 * Content for the Remove Emoji Script help tab.
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
<div>
	<h3><?php _e( 'Remove Emoji Script', 'bsac-cabins' ); ?></h3>
	<p><?php _e( 'WordPress/ClassicPress includes this script to allow emojis to work in older browsers. If your users work with modern browsers than this script is unnecessary.' ); ?></p>
</div>