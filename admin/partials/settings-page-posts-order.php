<?php
/**
 * Settings for drag & drop custom post and taxonomy orders.
 *
 * @package    Big_Santa_Anita_Canyon_Cabins
 * @subpackage Includes\Post_Types_Taxes
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 */

namespace BSAC_Cabins\Includes\Post_Types_Taxes;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Get the custom sort order options.
$bsacc_order_options = get_option( 'bsacc_order_options' );

// Set variable for array of registered public post types.
if ( isset( $bsacc_order_options['objects'] ) ) {
    $bsacc_order_post_types = $bsacc_order_options['objects'];

// Return empty array if no registered public tpost types.
} else {
    $bsacc_order_post_types = [];
}

// Set variable for array of registered public taxonomies.
if ( isset( $bsacc_order_options['tags'] ) ) {
    $bsacc_order_taxonomies = $bsacc_order_options['tags'];

// Return empty array if no registered public taxonomies.
} else {
    $bsacc_order_taxonomies = [];
} ?>
<div class="wrap">
    <h1><?php _e( 'Posts & Taxonomies Sort Orders', 'bsac-cabins' ); ?></h1>
    <p class="description"><?php _e( 'Add drag & drop sort order functionality to post types and taxonomies.', 'bsac-cabins' ); ?></p>
    <hr />
    <p><?php _e( 'When posts and taxonomies are selected for custom sort order functionality, the table rows on their respective admin management screen can be dragged up or down.', 'bsac-cabins' ); ?></p>
    <p><?php _e( 'The order you set on the admin management screens will automatically set the order of the posts in the blog index pages and in archive pages.', 'bsac-cabins' ); ?></p>
    <?php if ( isset( $_GET['msg'] ) ) : ?>
        <div id="message" class="notice notice-success is-dismissible">
            <?php if ( $_GET['msg'] == 'updated' ) {
                echo sprintf(
                    '<p>%1s</p>',
                    __( 'Settings saved.', 'bsac-cabins' )
                );
            } ?>
        </div>
    <?php endif; ?>
    <form method="post">
        <?php if ( function_exists( 'wp_nonce_field' ) ) { wp_nonce_field( 'bsacc_posts_order_nonce' ); } ?>
        <div id="posts_order_select">
            <table class="form-table">
                <tbody>
                    <tr valign="top">
                        <th scope="row"><?php _e( 'Check to Sort Post Types', 'bsac-cabins' ) ?></th>
                        <td>
                            <label><input type="checkbox" id="bsacc_order_check_all_post_types"> <?php _e( 'Check All', 'bsac-cabins' ) ?></label><br>
                            <?php
                            // Get all registered public post types.
                            $post_types = get_post_types(
                                [
                                    'show_ui'      => true,
                                    'show_in_menu' => true,
                                ],
                                'objects'
                            );

                            // Add a checkbox for each post type found.
                            foreach ( $post_types as $post_type ) :

                                // Ignore the Attachment (media) post type.
                                if ( $post_type->name == 'attachment' ) {
                                    continue;
                                } ?>
                                <label><input type="checkbox" name="objects[]" value="<?php echo $post_type->name; ?>" <?php
                                    if ( isset( $bsacc_order_post_types ) && is_array( $bsacc_order_post_types ) ) {
                                        if ( in_array( $post_type->name, $bsacc_order_post_types ) ) {
                                            echo 'checked="checked"';
                                        }
                                    }
                                    ?>>&nbsp;<?php echo $post_type->label; ?></label><br>
                            <?php endforeach; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="terms_order_select">
            <table class="form-table">
                <tbody>
                    <tr valign="top">
                        <th scope="row"><?php _e( 'Check to Sort Taxonomies', 'bsac-cabins' ) ?></th>
                        <td>
                            <label><input type="checkbox" id="bsacc_order_check_all_taxonomies"> <?php _e( 'Check All', 'bsac-cabins' ) ?></label><br>
                            <?php
                            // Get all registered public taxonomies.
                            $taxonomies = get_taxonomies(
                                [
                                    'show_ui' => true,
                                ],
                                'objects'
                            );

                            // Add a checkbox for each taxonomy found.
                            foreach ( $taxonomies as $taxonomy ) :

                                // Ignore the taxonomy used for post formats.
                                if ( $taxonomy->name == 'post_format' ) {
                                    continue;
                                } ?>
                                <label><input type="checkbox" name="tags[]" value="<?php echo $taxonomy->name; ?>" <?php
                                    if ( isset( $bsacc_order_taxonomies ) && is_array( $bsacc_order_taxonomies ) ) {
                                        if ( in_array( $taxonomy->name, $bsacc_order_taxonomies ) ) {
                                            echo 'checked="checked"';
                                        }
                                    } ?>>&nbsp;<?php echo $taxonomy->label ?></label><br>
                            <?php endforeach; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <p class="submit">
            <input type="submit" class="button-primary" name="bsacc_posts_order_submit" value="<?php _e( 'Save Changes', 'bsac-cabins' ); ?>">
        </p>
    </form>
</div>
<script>
( function ($) {

    // Handle the Check All input for post types.
    $( '#bsacc_order_check_all_post_types' ).on( 'click', function () {
        var items = $( '#posts_order_select input' );
        if ( $(this).is( ':checked' ) ) {
            $(items).prop( 'checked', true );
        } else {
            $(items).prop( 'checked', false );
        }
    });

    // Handle the Check All input for taxonomies.
    $( '#bsacc_order_check_all_taxonomies' ).on( 'click', function () {
        var items = $( '#terms_order_select input' );
        if ( $(this).is( ':checked' ) ) {
            $(items).prop( 'checked', true );
        } else {
            $(items).prop( 'checked', false );
        }
    });
})(jQuery)
</script>