<?php
/**
 * Cabins for sale post type archive content
 *
 * @package    Mule_Plugin
 * @subpackage Includes\Post_Types_Taxes
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 */

/**
 * Fields registered by Advanced Custom Fields
 *
 * @since  1.0.0
 */

if ( ! class_exists( 'acf' ) ) {
	return;
}

/**
 * The cabin location
 */

// Get the cabin location fields.
$location = get_field( 'cabin_location' );
$other    = get_field( 'other_cabin_location' );

// Conditional location text.
if ( 'other' == $location ) {
	$location = __( 'Location: ', 'bsac-cabins' ) . $other;
} elseif ( 'spruce' == $location ) {
	$location = __( 'Location: Spruce Gove', 'bsac-cabins' );
} elseif ( 'winter' == $location ) {
	$location = __( 'Location: Winter Creek', 'bsac-cabins' );
} elseif ( 'first' == $location ) {
	$location = __( 'Location: First Water', 'bsac-cabins' );
} else {
	$location = __( 'Location: Main Canyon', 'bsac-cabins' );
}

// Default HTML for the location.
$location = sprintf(
	'<h3>%1s</h3>',
	$location
);

// Apply a filter for customization.
$location = apply_filters( 'bsac_cabins_archive_location', $location );

/**
 * The cabin status
 */

// Get the status taxonomy field.
$status = get_field( 'cabin_sale_status' );

// If a sale is pending but the cabin is still categorized as available.
if ( has_term( 'available', 'bsacc_status' ) && has_term( 'pending', 'bsacc_status' ) ) {
	$status = sprintf(
		'<h4 class="cabin-status available-pending"><span>%1s</span></h4>',
		__( 'Sale Pending, May Become Available', 'bsac-cabins' )
	);

// If the cabin is categorized as available.
} elseif ( has_term( 'available', 'bsacc_status' ) ) {
	$status = sprintf(
		'<h4 class="cabin-status available"><span>%1s</span></h4>',
		__( 'Cabin Is Available', 'bsac-cabins' )
	);

// If the cabin is categorized as sale pending.
} elseif ( has_term( 'pending', 'bsacc_status' ) ) {
	$status = sprintf(
		'<h4 class="cabin-status pending"><span>%1s</span></h4>',
		__( 'Sale Pending', 'bsac-cabins' )
	);

// If the cabin is NOT categorized as available.
} else {
	$status = sprintf(
		'<h4 class="cabin-status not-available"><span>%1s</span></h4>',
		__( 'No Longer Available', 'bsac-cabins' )
	);
}

// Apply a filter for customization.
$status = apply_filters( 'bsac_cabins_archive_status', $status );

/**
 * The cabin image
 */

// Get the featured image field.
$image = get_field( 'cabin_sale_featured_image' );

// If the post has an image.
if ( ! empty( $image ) ) {
	$url    = $image['url'];
	$title  = $image['title'];
	$alt    = $image['alt'];
	$size   = apply_filters( 'bsac_cabins_archive_thumbnail_size', 'medium' );
	$thumb  = $image['sizes'][$size];
	$width  = $image['sizes'][$size . '-width'];
	$height = $image['sizes'][$size . '-height'];

	// Default HTML for the image.
	$image = sprintf(
		'<a href="%1s"><span><img class="bsac-cabins-archive-thumbnail" src="%2s" alt="%3s" width="%4s" height="%5s" /></span></a>',
		get_permalink(),
		$thumb,
		$alt,
		$width,
		$height
	);

	// Apply a filter for customization.
	$image = apply_filters( 'bsac_cabins_archive_thumbnail', $image );

	// Content wrapper class.
	$wrapper = 'bsac-cabins-archive cabin-has-image';

// If there is no image.
} else {

	// Return nothing rather than empty image element.
	$image = null;

	// Content wrapper class.
	$wrapper = 'bsac-cabins-archive';
}

/**
 * The cabin excerpt
 */

// Get the description fields.
$excerpt     = get_field( 'cabin_short_description_sale' );
$description = get_field( 'cabin_description_sale' );

// If the post has a short description.
if ( $excerpt ) {
	$excerpt = $excerpt;

// If no short description but the post has an excerpt.
} elseif ( has_excerpt( get_the_ID() ) ) {
	$excerpt = wp_trim_words( get_the_excerpt(), 40, '&hellip;' );

// If no short description or excerpt but the post has the long description.
} elseif ( $description ) {
	$excerpt = sprintf(
		'<p>%1s</p>',
		wp_trim_words( $description )
	);

// Otherwise return nothing.
} else {
	$excerpt = null;
}

/**
 * The read more link
 */

// The default link HTML and text.
$read_more = sprintf(
	'<p class="read-cabin-details"><a href="%1s"><span>%2s</span></a></p>',
	esc_attr( esc_url( get_permalink() ) ),
	__( 'Read cabin details', 'bsac-cabins' )
);

// Apply a filter for customization.
$read_more = apply_filters( 'bsac_cabins_archive_read_more', $read_more );

?>
<div class="<?php echo $wrapper; ?>">
	<div class="bsac-cabins-archive-info">
		<?php echo $location . $status; ?>
		<?php echo $excerpt; ?>
		<?php echo $read_more; ?>
	</div>
	<div class="bsac-cabins-archive-image">
		<?php echo $image; ?>
	</div>
</div>