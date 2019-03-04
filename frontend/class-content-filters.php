<?php
/**
 * The frontend content filters for post types
 *
 * @package    Big_Santa_Anita_Canyon_Cabins
 * @subpackage Frontend
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 */

namespace BSAC_Cabins\Frontend;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The frontend content filters for post types
 *
 * @since  1.0.0
 * @access public
 */
class Content_Filters {

	/**
	 * Constructor method
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {

		// Filter the cabins for sale post type singular content.
		add_filter( 'the_content', [ $this, 'for_sale_singular_filter' ], 10, 2 );

		// Filter the cabins for sale post type archive content.
		add_filter( 'the_content', [ $this, 'for_sale_archive_filter' ], 10, 2 );

	}

	/**
	 * Filter the cabins for sale post type singular content
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  string $content
	 * @return mixed Returns the custom HTML output.
	 */
	public function for_sale_singular_filter( $content ) {

		// Return the default content if not cabins for sale.
		if ( ! is_singular( 'bsacc_forsale' ) ) {
			return $content;
		}

		ob_start();

		// Include the snippet content.
		include BSACC_PATH . 'frontend/partials/singular-for-sale.php';

		$content = ob_get_contents();
		ob_end_clean();
		echo $content;

	}

	/**
	 * Filter the cabins for sale post type archive content
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  string $content
	 * @return mixed Returns the custom HTML output.
	 */
	public function for_sale_archive_filter( $content ) {

		// Return the default content if not cabins for sale.
		if ( ! ( is_post_type_archive( 'bsacc_forsale' ) || is_tax( 'bsacc_status' ) ) ) {
			return $content;
		}

		ob_start();

		// Include the snippet content.
		include BSACC_PATH . 'frontend/partials/archive-for-sale.php';

		$content = ob_get_contents();
		ob_end_clean();
		echo $content;

	}

}

$bsac_cabins_content = new Content_Filters();