<?php
/**
 * Development subpage output.
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
    )

];

// Apply a filter to the tabs array for adding tabs.
$page_tabs = apply_filters( 'bsacc_tabs_development', $tabs );

/**
 * Do settings section and fields by tab.
 *
 * @since  1.0.0
 * @return void
 */
if ( 'general' == $active_tab ) {
    $section = 'bsacc-site-development-general';
    $fields  = 'bsacc-site-development-general';
} else {
    $section = null;
    $fields  = null;
}

// Apply filters to the sections and fields for new tabs.
$do_section = apply_filters( 'bsacc_section_development', $section );
$do_fields  = apply_filters( 'bsacc_fields_development', $fields );

/**
 * Conditional save button text by tab.
 *
 * @since  1.0.0
 * @return string Returns the button label.
 */
if ( 'general' == $active_tab  ) {
    $save = __( 'Save General', 'bsac-cabins' );
} else {
    $save = __( 'Save Settings', 'bsac-cabins' );
}

// Apply a filter for new tabs added by another plugin or from a theme.
$button = apply_filters( 'bsacc_save_script_options', $save );

// Settings saved notice.
if ( isset( $_GET['settings-updated'] ) ) { ?>
<div id="setting-error-settings_updated" class="notice notice-success is-dismissible">
	<p><strong><?php _e( 'Settings saved.', 'bsac-cabins' ); ?></strong></p>
</div>
<?php } ?>
<div class="wrap">
	<?php echo sprintf( '<h1 class="wp-heading-inline">%1s %2s</h1>', get_bloginfo( 'name' ), esc_html__( 'Development', 'bsac-cabins' ) ); ?>
	<p class="description"><?php _e( 'A few tools that come in handy during the development of your website.', 'bsac-cabins' ); ?></p>
	<hr class="wp-header-end">
	<h2 class="nav-tab-wrapper">
        <?php echo implode( $page_tabs ); ?>
    </h2>
	<form action="options.php" method="post">
		<?php
        settings_fields( $do_fields );
        do_settings_sections( $do_section );
        ?>
		<p class="submit"><?php submit_button( $button, 'primary', '', false, [] ); ?></p>
    </form>
</div>