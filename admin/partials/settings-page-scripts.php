<?php
/**
 * Script options page output.
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

/**
 * Active tab switcher.
 *
 * @since  1.0.0
 * @return void
 */
if ( isset( $_GET[ 'tab' ] ) ) {
    $active_tab = $_GET[ 'tab' ];
} else {
    $active_tab = 'general';
}

/**
 * Set up the page tabs as an array for adding tabs
 * from another plugin or from a theme.
 *
 * @since  1.0.0
 * @return array
 */
$tabs = [

    // General options tab.
    sprintf(
        '<a href="?page=%1s-scripts&tab=general" class="nav-tab %2s"><span class="dashicons dashicons-admin-tools"></span> %3s</a>',
        BSACC_ADMIN_SLUG,
        $active_tab == 'general' ? 'nav-tab-active' : '',
        esc_html__( 'General', 'bsac-cabins' )
    ),

    // Vendor options tab.
    sprintf(
        '<a href="?page=%1s-scripts&tab=vendor" class="nav-tab %2s"><span class="dashicons dashicons-admin-plugins"></span> %3s</a>',
        BSACC_ADMIN_SLUG,
        $active_tab == 'vendor' ? 'nav-tab-active' : '',
        esc_html__( 'Vendor', 'bsac-cabins' )
    )

];

// Apply a filter to the tabs array for adding tabs.
$page_tabs = apply_filters( 'bsacc_tabs_script_options', $tabs );

/**
 * Do settings section and fields by tab.
 *
 * @since  1.0.0
 * @return void
 */
if ( 'general' == $active_tab ) {
    $section = 'bsacc-scripts-general';
    $fields  = 'bsacc-scripts-general';
} elseif ( 'vendor' == $active_tab ) {
    $section = 'bsacc-scripts-vendor';
    $fields  = 'bsacc-scripts-vendor';
} else {
    $section = null;
    $fields  = null;
}

// Apply filters to the sections and fields for new tabs.
$do_section = apply_filters( 'bsacc_section_script_options', $section );
$do_fields  = apply_filters( 'bsacc_fields_script_options', $fields );


/**
 * Conditional save button text by tab.
 *
 * @since  1.0.0
 * @return string Returns the button label.
 */
if ( 'general' == $active_tab  ) {
    $save = __( 'Save General', 'bsac-cabins' );
} elseif ( 'vendor' == $active_tab ) {
    $save = __( 'Save Vendor', 'bsac-cabins' );
} else {
    $save = __( 'Save Settings', 'bsac-cabins' );
}

// Apply a filter for new tabs added by another plugin or from a theme.
$button = apply_filters( 'bsacc_save_script_options', $save );

?>
<div class="wrap">
    <h1 class="wp-heading-inline"><?php esc_html_e( 'Script Options', 'bsac-cabins' ); ?></h1>
    <?php if ( is_rtl() ) : ?>
    <p class="description"><?php esc_html_e( 'Script settings from the Controlled Chaos plugin. More information in the Help tab at upper left.', 'bsac-cabins' ); ?></p>
    <?php else : ?>
    <p class="description"><?php esc_html_e( 'Script settings from the Controlled Chaos plugin. More information in the Help tab at upper right.', 'bsac-cabins' ); ?></p>
    <?php endif; ?>
    <hr class="wp-header-end">
    <h2 class="nav-tab-wrapper">
        <?php echo implode( $page_tabs ); ?>
    </h2>
    <form method="post" action="options.php">
        <?php
        settings_fields( $do_fields );
        do_settings_sections( $do_section );
        ?>
        <p class="submit"><?php submit_button( $button, 'primary', '', false, [] ); ?></p>
    </form>
</div>