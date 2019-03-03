<?php
/**
 * Excerpt meta box output
 *
 * For cabins for sale admin pages.
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
}

?>
<label class="screen-reader-text" for="for-sale-meta-description"><?php _e( 'Cabin Summary', 'bsac-cabins' ); ?></label>
<p><?php _e( 'This cabin summary may be used by the active theme, for instance in the archive pages. It may also be used for the meta data descrition to help search engines and link sharing.', 'bsac-cabins' ); ?></p>
<textarea rows="6" name="for-sale-meta-description" tabindex="6" id="for-sale-meta-description" class="for-sale-meta-description"><?php echo esc_html( $post->post_excerpt ); ?></textarea>