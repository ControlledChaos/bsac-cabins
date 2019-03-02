<?php
/**
 * About page media options output.
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
<h2><?php _e( 'Media and Upload Options', 'bsac-cabins' ); ?></h2>
<h3><?php _e( 'Image Sizes', 'bsac-cabins' ); ?></h3>
<ul>
	<li><?php _e( 'Add option to hard crop the medium and/or large image sizes', 'bsac-cabins' ); ?></li>
	<li><?php _e( 'Add option to allow SVG uploads to the Media Library', 'bsac-cabins' ); ?></li>
</ul>
<h3><?php _e( 'Fancybox Presentation', 'bsac-cabins' ); ?></h3>
<h3><?php _e( 'SVG Uploads', 'bsac-cabins' ); ?></h3>