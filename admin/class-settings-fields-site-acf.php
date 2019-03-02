<?php
/**
 * Site settings page field groups.
 *
 * @package    Big_Santa_Anita_Canyon_Cabins
 * @subpackage controlled-chaos\admin
 * @since      1.0.0
 */

namespace BSAC_Cabins\Admin;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Site settings page field groups.
 */
final class Settings_Fields_ACF {

	/**
	 * Instance of the class
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object Returns the instance.
	 */
	public static function instance() {

		// Varialbe for the instance to be used outside the class.
		static $instance = null;

		if ( is_null( $instance ) ) {

			// Set variable for new instance.
			$instance = new self;

			// Register settings page fields.
    		$instance->settings_fields();

		}

		// Return the instance.
		return $instance;

	}

	/**
	 * Constructor method
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void Constructor method is empty.
	 *              Change to `self` if used.
	 */
	public function __construct() {}

	/**
	 * Register settings page fields.
	 *
	 * Uses the universal slug partial for admin pages. Set this
     * slug in the core plugin file.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function settings_fields() {

		if ( function_exists( 'acf_add_local_field_group' ) ) :

			acf_add_local_field_group( [
				'key'    => 'group_5a0c7ff7764ca',
				'title'  => __( 'Settings Page', 'bsac-cabins' ),
				'fields' => [

					/**
					 * Dashboard tab settings.
					 *
					 * @since 1.0.0
					 */

					[
						'key'               => 'field_5a0c8d7232b94',
						'label'             => __( 'Dashboard', 'bsac-cabins' ),
						'name'              => '',
						'type'              => 'tab',
						'instructions'      => __( '', 'bsac-cabins' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'placement'         => 'top',
						'endpoint'          => 0,
					],
					[
						'key'               => 'field_5b4807983ccaf',
						'label'             => __( 'Custom Welcome', 'bsac-cabins' ),
						'name'              => 'bsacc_custom_welcome',
						'type'              => 'true_false',
						'instructions'      => __( '', 'bsac-cabins' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'message'           => __( 'Use the custom Welcome panel on the Dashboard', 'bsac-cabins' ),
						'default_value'     => 0,
						'ui'                => 0,
						'ui_on_text'        => '',
						'ui_off_text'       => '',
					],
					[
						'key'               => 'field_5b48081b3ccb0',
						'label'             => __( 'Remove Welcome Dismiss', 'bsac-cabins' ),
						'name'              => 'bsacc_remove_welcome_dismiss',
						'type'              => 'true_false',
						'instructions'      => __( '', 'bsac-cabins' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'message'           => __( 'Remove the Welcome panel dismiss button.', 'bsac-cabins' ),
						'default_value'     => 0,
						'ui'                => 0,
						'ui_on_text'        => '',
						'ui_off_text'       => '',
					],
					[
						'key'               => 'field_5a0c8f393edd6',
						'label'             => __( 'Hide Widgets', 'bsac-cabins' ),
						'name'              => 'bsacc_dashboard_hide_widgets',
						'type'              => 'checkbox',
						'instructions'      => __( 'Select the Dashboard widgets to hide.', 'bsac-cabins' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper' => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'choices'           => [
							'gutenberg' => __( 'Try Gutenberg', 'bsac-cabins' ),
							'welcome'   => __( 'Welcome', 'bsac-cabins' ),
							'news'      => __( 'WordPress News', 'bsac-cabins' ),
							'quick'     => __( 'Quick Press', 'bsac-cabins' ),
							'at_glance' => __( 'At a Glance', 'bsac-cabins' ),
							'activity'  => __( 'Activity', 'bsac-cabins' ),
						],
						'allow_custom'      => 0,
						'save_custom'       => 0,
						'default_value'     => [],
						'layout'            => 'horizontal',
						'toggle'            => 1,
						'return_format'     => 'value',
					],

					/**
					 * Admin Menu tab settings.
					 *
					 * @since 1.0.0
					 */

					[
						'key'               => 'field_5a0c800f57d56',
						'label'             => __( 'Admin Menu', 'bsac-cabins' ),
						'name'              => '',
						'type'              => 'tab',
						'instructions'      => __( '', 'bsac-cabins' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'placement'         => 'top',
						'endpoint'          => 0,
					],
					[
						'key'               => 'field_5a0c80ab57d59',
						'label'             => __( 'Settings Page', 'bsac-cabins' ),
						'name'              => 'bsacc_settings_link_position',
						'type'              => 'button_group',
						'instructions'      => __( 'Select the position of this Settings page link, and whether to show or hide the other settings links.', 'bsac-cabins' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'choices'           => [
							'default' => __( 'Default/Show', 'bsac-cabins' ),
							'top'     => __( 'Top Level/Hide', 'bsac-cabins' ),
						],
						'allow_null'        => 0,
						'default_value'     => 'default',
						'layout'            => 'horizontal',
						'return_format'     => 'value',
					],
					[
						'key'               => 'field_5aad41ffad3e6',
						'label'             => __( 'Site Settings Label', 'bsac-cabins' ),
						'name'              => 'bsacc_site_settings_link_label',
						'type'              => 'text',
						'instructions'      => __( 'Change the label of the link to this page.', 'bsac-cabins' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '50',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => '',
						'placeholder'       => __( 'Site Settings', 'bsac-cabins' ),
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
					],
					[
						'key'               => 'field_5b4809a3f4f0b',
						'label'             => __( 'Site Settings Icon', 'bsac-cabins' ),
						'name'              => 'bsacc_site_settings_link_icon',
						'type'              => 'text',
						'instructions'      => __( 'Enter a Dashicons CSS class for the icon of the link to this page.', 'bsac-cabins' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '50',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => '',
						'placeholder'       => 'dashicons-admin-settings',
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
					],
					[
						'key'               => 'field_5b480aa335a20',
						'label'             => __( 'Site Plugin Position', 'bsac-cabins' ),
						'name'              => 'bsacc_site_plugin_link_position',
						'type'              => 'button_group',
						'instructions'      => __( 'Make the site-specific plugin admin page a top-level link.', 'bsac-cabins' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'choices'           => [
							'default' => __( 'Under Plugins', 'bsac-cabins' ),
							'top'     => __( 'Top Level', 'bsac-cabins' ),
						],
						'allow_null'        => 0,
						'default_value'     => 'default',
						'layout'            => 'horizontal',
						'return_format'     => 'value',
					],
					[
						'key'               => 'field_5b480b0d35a21',
						'label'             => __( 'Site Plugin Label', 'bsac-cabins' ),
						'name'              => 'bsacc_site_plugin_link_label',
						'type'              => 'text',
						'instructions'      => __( 'Change the label of the link to this page.', 'bsac-cabins' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '50',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => '',
						'placeholder'       => __( 'Site Settings', 'bsac-cabins' ),
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
					],
					[
						'key'               => 'field_5b480b4f35a22',
						'label'             => __( 'Site Plugin Icon', 'bsac-cabins' ),
						'name'              => 'bsacc_site_plugin_link_icon',
						'type'              => 'text',
						'instructions'      => __( 'Enter a Dashicons CSS class for the icon of the link to this page.', 'bsac-cabins' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '50',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => '',
						'placeholder'       => 'dashicons-welcome-learn-more',
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
					],
					[
						'key'               => 'field_5a0c802257d57',
						'label'             => __( 'Menus Link', 'bsac-cabins' ),
						'name'              => 'bsacc_menus_position',
						'type'              => 'button_group',
						'instructions'      => __( 'Select the position of the Menus page link.', 'bsac-cabins' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'choices'           => [
							'top'     => __( 'Top Level', 'bsac-cabins' ),
							'default' => __( 'Default', 'bsac-cabins' ),
						],
						'allow_null'        => 0,
						'default_value'     => 'top',
						'layout'            => 'horizontal',
						'return_format'     => 'value',
					],
					[
						'key'               => 'field_5a0c808757d58',
						'label'             => __( 'Widgets Link', 'bsac-cabins' ),
						'name'              => 'bsacc_widgets_position',
						'type'              => 'button_group',
						'instructions'      => __( 'Select the position of the Widgets page link.', 'bsac-cabins' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'choices'           => [
							'top'     => __( 'Top Level', 'bsac-cabins' ),
							'default' => __( 'Default', 'bsac-cabins' ),
						],
						'allow_null'        => 0,
						'default_value'     => 'top',
						'layout'            => 'horizontal',
						'return_format'     => 'value',
					],
					[
						'key'               => 'field_5a0c8d8a32b95',
						'label'             => __( 'Hide Links', 'bsac-cabins' ),
						'name'              => 'bsacc_admin_hide_links',
						'type'              => 'checkbox',
						'instructions'      => __( 'Select which menu items to hide.', 'bsac-cabins' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper' => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'choices'           => [
							'themes'  => __( 'Appearance', 'bsac-cabins' ),
							'plugins' => __( 'Plugins', 'bsac-cabins' ),
							'users'   => __( 'Users', 'bsac-cabins' ),
							'tools'   => __( 'Tools', 'bsac-cabins' ),
							'fields'  => __( 'Custom Fields', 'bsac-cabins' ),
						],
						'allow_custom'      => 0,
						'save_custom'       => 0,
						'default_value'     => [],
						'layout'            => 'horizontal',
						'toggle'            => 1,
						'return_format'     => 'value',
					],
					[
						'key'               => 'field_5aaa73e38deb3',
						'label'             => __( 'Restore Links Manager', 'bsac-cabins' ),
						'name'              => 'bsacc_links_manager',
						'type'              => 'true_false',
						'instructions'      => __( 'The old Links Manager is hidden by default in newer WordPress installations.', 'bsac-cabins' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'message'           => '',
						'default_value'     => 0,
						'ui'                => 1,
						'ui_on_text'        => __( 'Enabled', 'bsac-cabins' ),
						'ui_off_text'       => __( 'Disabled', 'bsac-cabins' ),
					],

					/**
					 * Admin Pages tab settings.
					 *
					 * @since 1.0.0
					 */

					[
						'key'               => 'field_5a0cbb3873e55',
						'label'             => __( 'Admin Pages', 'bsac-cabins' ),
						'name'              => '',
						'type'              => 'tab',
						'instructions'      => __( '', 'bsac-cabins' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'placement'         => 'top',
						'endpoint'          => 0,
					],
					[
						'key'               => 'field_5bef0eeeacdc1',
						'label'             => __( 'Classic Editor', 'bsac-cabins' ),
						'name'              => 'bsacc_classic_editor',
						'type'              => 'true_false',
						'instructions'      => __( 'Disables the block editor (a.k.a. Gutenberg) and restores the TinyMCE editor.', 'bsac-cabins' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'message'           => __( 'Use the classic editor', 'bsac-cabins' ),
						'default_value'     => 0,
						'ui'                => 1,
						'ui_on_text'  => __( 'Yes', 'bsac-cabins' ),
						'ui_off_text' => __( 'No', 'bsac-cabins' ),
					],
					[
						'key'               => 'field_5bd8abd79a46d',
						'label'             => __( 'Admin Header', 'bsac-cabins' ),
						'name'              => 'bsacc_use_admin_header',
						'type'              => 'true_false',
						'instructions'      => __( 'Add the site title, site tagline, and a nav menu to the top of admin pages.', 'bsac-cabins' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'message'           => __( 'Use the admin header.', 'bsac-cabins' ),
						'default_value'     => 0,
						'ui'                => 1,
						'ui_on_text'        => __( 'Yes', 'bsac-cabins' ),
						'ui_off_text'       => __( 'No', 'bsac-cabins' ),
					],
					[
						'key'               => 'field_5b834989e850c',
						'label'             => __( 'Drag & Drop Sort Order', 'bsac-cabins' ),
						'name'              => 'bsacc_use_custom_sort_order',
						'type'              => 'true_false',
						'instructions'      => __( 'When posts and taxonomies are selected for custom sort order functionality, the table rows on their respective admin management screen can be dragged up or down.

						The order you set on the admin management screens will automatically set the order of the posts in the blog index pages and in archive pages.', 'bsac-cabins' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'message'           => __( 'Add drag & drop sort order functionality to post types and taxonomies.', 'bsac-cabins' ),
						'default_value'     => 0,
						'ui' => 1,
						'ui_on_text'        => __( 'Yes', 'bsac-cabins' ),
						'ui_off_text'       => __( 'No', 'bsac-cabins' ),
					],
					[
						'key'               => 'field_5a0cbb5e73e56',
						'label'             => __( 'Admin Footer Credit', 'bsac-cabins' ),
						'name'              => 'bsacc_admin_footer_credit',
						'type'              => 'text',
						'instructions'      => __( 'The "developed by" credit.', 'bsac-cabins' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
					],
					[
						'key'               => 'field_5a0cbba573e57',
						'label'             => __( 'Admin Footer Link', 'bsac-cabins' ),
						'name'              => 'bsacc_admin_footer_link',
						'type'              => 'url',
						'instructions'      => __( 'Link to the website devoloper.', 'bsac-cabins' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => '',
						'placeholder'       => '',
					],

					/**
					 * Meta/SEO tab settings.
					 *
					 * @since 1.0.0
					 */

					[
						'key'               => 'field_5a1989a036067',
						'label'             => __( 'Meta/SEO', 'bsac-cabins' ),
						'name'              => '',
						'type'              => 'tab',
						'instructions'      => __( '', 'bsac-cabins' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'placement'         => 'top',
						'endpoint'          => 0,
					],
					[
						'key'               => 'field_5a237090744c4',
						'label'             => __( 'Meta Tags', 'bsac-cabins' ),
						'name'              => 'bsacc_meta_disable_tags',
						'type'              => 'true_false',
						'instructions'      => __( 'Disable if you plan on using Yoast SEO or a similarly awful plugin.', 'bsac-cabins' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'message'           => __( 'Check to disable', 'bsac-cabins' ),
						'default_value'     => 0,
						'ui'                => 0,
						'ui_on_text'        => __( 'Disabled', 'bsac-cabins' ),
						'ui_off_text'       => __( 'Enabled', 'bsac-cabins' ),
					],
					[
						'key'               => 'field_5a198d601b523',
						'label'             => __( 'Blog Pages Title', 'bsac-cabins' ),
						'name'              => 'bsacc_meta_blog_title',
						'type'              => 'text',
						'instructions'      => __( 'Will use the site title if left empty.', 'bsac-cabins' ),
						'required'          => 0,
						'conditional_logic' => [
							[
								[
									'field'    => 'field_5a237090744c4',
									'operator' => '!=',
									'value'    => '1',
								],
							],
						],
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
					],
					[
						'key'               => 'field_5a198bd736068',
						'label'             => __( 'Blog Pages Description', 'bsac-cabins' ),
						'name'              => 'bsacc_meta_blog_description',
						'type'              => 'textarea',
						'instructions'      => __( 'Will use the site tagline if left empty and if a tagline is set.', 'bsac-cabins' ),
						'required'          => 0,
						'conditional_logic' => [
							[
								[
									'field'    => 'field_5a237090744c4',
									'operator' => '!=',
									'value'    => '1',
								],
							],
						],
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => '',
						'placeholder'       => '',
						'maxlength'         => '',
						'rows'              => 4,
						'new_lines'         => '',
					],
					[
						'key'               => 'field_5a198c1836069',
						'label'             => __( 'Blog Pages Image', 'bsac-cabins' ),
						'name'              => 'bsacc_meta_blog_image',
						'type'              => 'image',
						'instructions'      => __( 'A minimum of 1230px by 600px is recommended for retina display devices.', 'bsac-cabins' ),
						'required'          => 0,
						'conditional_logic' => [
							[
								[
									'field'    => 'field_5a237090744c4',
									'operator' => '!=',
									'value'    => '1',
								],
							],
						],
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'return_format'     => 'array',
						'preview_size'      => 'medium',
						'library'           => 'all',
						'min_width'         => '',
						'min_height'        => '',
						'min_size'          => '',
						'max_width'         => '',
						'max_height'        => '',
						'max_size'          => '',
						'mime_types'        => '',
					],
					[
						'key'               => 'field_5b2fd67604455',
						'label'             => __( 'Default Meta Image', 'bsac-cabins' ),
						'name'              => 'bsacc_meta_default_image',
						'type'              => 'image',
						'instructions'      => __( 'Will be used as a fallback for posts without a featured image and used for archive pages. A minimum of 1230px by 600px is recommended for retina display devices.', 'bsac-cabins' ),
						'required'          => 0,
						'conditional_logic' => [
							[
								[
									'field'    => 'field_5a237090744c4',
									'operator' => '!=',
									'value'    => '1',
								],
							],
						],
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'return_format'     => 'array',
						'preview_size'      => 'medium',
						'library'           => 'all',
						'min_width'         => '',
						'min_height'        => '',
						'min_size'          => '',
						'max_width'         => '',
						'max_height'        => '',
						'max_size'          => '',
						'mime_types'        => '',
					],
				],
				'location' => [
					[
						[
							'param'    => 'options_page',
							'operator' => '==',
							'value'    => BSACC_ADMIN_SLUG . '-settings',
						],
					],
				],
				'menu_order'            => 0,
				'position'              => 'acf_after_title',
				'style'                 => 'seamless',
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen'        => '',
				'active'                => 1,
				'description'           => '',
			 ] );

		endif;

	}

}

/**
 * Put an instance of the class into a function.
 *
 * @since  1.0.0
 * @access public
 * @return object Returns an instance of the class.
 */
function bsacc_settings_fields_acf() {

	return Settings_Fields_ACF::instance();

}

// Run an instance of the class.
bsacc_settings_fields_acf();