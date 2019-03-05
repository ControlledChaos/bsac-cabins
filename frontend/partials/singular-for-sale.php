<?php
/**
 * Cabins for sale post type singular content
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
$location = apply_filters( 'bsac_cabins_single_location', $location );

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
$status = apply_filters( 'bsac_cabins_single_status', $status );

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
	$url    = $image['url'];
	$size   = apply_filters( 'bsac_cabins_single_thumbnail_size', 'medium' );
	$thumb  = $image['sizes'][$size];
	$width  = $image['sizes'][$size . '-width'];
	$height = $image['sizes'][$size . '-height'];

	// Default HTML for the image.
	$image = sprintf(
		'<a data-fancybox href="%1s"><span><img class="bsac-cabins-single-thumbnail" src="%2s" alt="%3s" width="%4s" height="%5s" /></span></a>',
		$url,
		$thumb,
		$alt,
		$width,
		$height
	);

	// Apply a filter for customization.
	$image = apply_filters( 'bsac_cabins_single_thumbnail', $image );

	// Content wrapper class.
	$top = 'bsac-cabins-single-top cabin-has-image';

// If there is no image.
} else {

	// Return nothing rather than empty image element.
	$image = null;

	// Content wrapper class.
	$top = 'bsac-cabins-single-top';
}

/**
 * The cabin description
 */

// Get the description field.
$description = get_field( 'cabin_description_sale' );

/**
 * Price and flexibility
 */

// Get the price and flexibility fields.
$price       = get_field( 'cabin_price' );
$flexibility = get_field( 'price_flexibility' );

// If the price is an asking price.
if ( $price && 'asking' == $flexibility ) {
	$price = sprintf(
		'<p class="cabin-price price-asking"><span>%1s</span> %2s</p>',
		__( 'Asking', 'bsac-cabins' ),
		'$' . $price
	);

// If the price is firm.
} elseif ( $price && 'firm' == $flexibility ) {
	$price = sprintf(
		'<p class="cabin-price price-firm">%1s <span>%2s</span></p>',
		'$' . $price,
		__( 'Firm', 'bsac-cabins' )
	);

// If the price is reduced.
} elseif ( $price && 'reduced' == $flexibility ) {
	$price = sprintf(
		'<p class="cabin-price price-reduced"<span>%1s</span> %2s</p>',
		__( 'Reduced to', 'bsac-cabins' ),
		'$' . $price
	);
} else {
	$price = sprintf(
		'<p class="cabin-price">%1s</p>',
		'$' . $price
	);
}

// Get the map shortcode field.
$map = get_field( 'cabin_map_sale' );

// Get the contact form shortcode field.
$form = get_field( 'sac_cabin_contact_form' );

?>
<div class="<?php echo $top; ?>">
	<div class="bsac-cabins-single-info">
		<?php echo $image; ?>
		<?php echo $location; ?>
		<?php echo $status; ?>
		<?php echo $price; ?>
	</div>
</div>
<div class="bsac-cabins-single-description">
	<h3><?php _e( 'Cabin Details', 'bsac-cabins' ); ?></h3>
	<?php echo $description; ?>
</div>
<?php if ( get_field( 'cabin_includes' ) ) : ?>
<div class="bsac-cabins-single-includes">
	<h3><?php _e( 'What\'s Included', 'bsac-cabins' ); ?></h3>
	<?php echo get_field( 'cabin_includes' ); ?>
</div>
<?php endif; ?>
<?php if ( get_field( 'cabin_directions_sale' ) ) : ?>
<div class="bsac-cabins-single-includes">
	<h3><?php _e( 'Map & Directions', 'bsac-cabins' ); ?></h3>
	<?php echo get_field( 'cabin_directions_sale' ); ?>
	<?php if ( $map ) { echo do_shortcode( $map ); } ?>
</div>
<?php endif; ?>
<?php if ( get_field( 'contact_info_sale' ) ) : ?>
<div class="bsac-cabins-single-contact">
	<h3><?php _e( 'Contact Information', 'bsac-cabins' ); ?></h3>
	<?php echo get_field( 'contact_info_sale' ); ?>
	<?php if ( $form ) { echo do_shortcode( $form ); } ?>
</div>
<?php endif; ?>
<?php if ( get_field( 'cabin_video_sale' ) ) : ?>
<div class="bsac-cabins-single-video">
	<h3><?php _e( 'Cabin Video', 'bsac-cabins' ); ?></h3>
	<div class="cabins-single-video-embed">
		<?php echo get_field( 'cabin_video_sale' ); ?>
	</div>
</div>
<?php endif; ?>
<?php if ( get_field( 'cabin_gallery_sale' ) ) : ?>
<div class="bsac-cabins-single-gallery">
	<h3><?php _e( 'Gallery of Photos', 'bsac-cabins' ); ?></h3>
	<?php
	$images = get_field( 'cabin_gallery_sale' );
	$size   = 'medium';

	if ( $images ) : ?>
    <ul>
        <?php foreach ( $images as $image ) : ?>
            <li>
                <a data-fancybox="gallery" data-fancybox-group="<?php echo 'gallery-' . get_the_ID(); ?>" rel="<?php echo 'gallery-' . get_the_ID(); ?>" href="<?php echo $image['url']; ?>">
                     <figure>
						<img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>" />
						<figcaption><?php echo $image['caption']; ?></figcaption>
					 </figure>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
	<?php endif; ?>
</div>
<?php endif; ?>