<?php
/**
 * ACF fields for cabins for sale
 *
 * Requires the Advanced Custom Fields Pro plugin.
 *
 * @package    Big_Santa_Anita_Canyon_Cabins
 * @subpackage Admin
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 */

namespace BSAC_Cabins\Admin;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * ACF fields for cabins for sale
 *
 * @since  1.0.0
 * @access public
 */
class Fields_For_Sale {

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

			// Register the fields.
			$instance->fields();

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
	 * Register the fields
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function fields() {

		if ( function_exists( 'acf_add_local_field_group' ) ) :

			// Cabin description field instructions.
			$cabin_desc_instr = sprintf(
				'%1s <br /> %2s',
				__( 'General description of the cabin, history, etc.', 'bsac-cabins' ),
				__( 'For listing that which is included with the cabin see the "Price & Terms" tab.', 'bsac-cabins' )
			);

			acf_add_local_field_group( [
				'key'    => 'group_55dbf67363475',
				'title'  => __( 'Cabins For Sale', 'bsac-cabins' ),
				'fields' => [
					[
						'key'               => 'field_567efb04de2b6',
						'label'             => __( 'Info', 'bsac-cabins' ),
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
						'placement' => 'top',
						'endpoint'  => 0,
					],
					[
						'key'               => 'field_55dc0dbb8e321',
						'label'             => __( 'Cabin Number', 'bsac-cabins' ),
						'name'              => 'cabin_number_sale',
						'type'              => 'number',
						'instructions'      => __( '', 'bsac-cabins' ),
						'required'          => 1,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => 'fields-three-wide',
							'id'    => '',
						],
						'default_value'     => '',
						'placeholder'       => __( '', 'bsac-cabins' ),
						'prepend'           => '',
						'append'            => '',
						'min'               => 1,
						'max'               => 140,
						'step'              => 1,
						'readonly'          => 0,
						'disabled'          => 0,
					],
					[
						'key'               => 'field_55dc0ffa344b7',
						'label'             => __( 'Cabin Location', 'bsac-cabins' ),
						'name'              => 'cabin_location',
						'type'              => 'select',
						'instructions'      => __( '', 'bsac-cabins' ),
						'required'          => 1,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => 'fields-three-wide',
							'id'    => '',
						],
						'choices'           => [
							'main'   => __( 'Main Canyon', 'bsac-cabins' ),
							'east'   => __( 'Main Canyon/East Fork', 'bsac-cabins' ),
							'first'  => __( 'First Water', 'bsac-cabins' ),
							'winter' => __( 'Winter Creek', 'bsac-cabins' ),
							'spruce' => __( 'Spruce Grove', 'bsac-cabins' ),
							'other'  => __( 'Other', 'bsac-cabins' ),
						],
						'default_value'     => [],
						'allow_null'        => 0,
						'multiple'          => 0,
						'ui'                => 1,
						'ajax'              => 0,
						'placeholder'       => __( '', 'bsac-cabins' ),
						'disabled'          => 0,
						'readonly'          => 0,
						'return_format'     => 'value',
					],
					[
						'key'               => 'field_55dc10d0344b8',
						'label'             => __( 'Other Cabin Location', 'bsac-cabins' ),
						'name'              => 'other_cabin_location',
						'type'              => 'text',
						'instructions'      => __( '', 'bsac-cabins' ),
						'required'          => 0,
						'conditional_logic' => [
							[
								[
									'field'    => 'field_55dc0ffa344b7',
									'operator' => '==',
									'value'    => 'other',
								],
							],
						],
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => '',
						'placeholder'       => __( 'Chantry Flat, Above the Falls, Roberts Camp...', 'bsac-cabins' ),
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
						'readonly'          => 0,
						'disabled'          => 0,
					],
					[
						'key'               => 'field_5c7af0827cdf2',
						'label'             => 'Cabin Status',
						'name'              => 'cabin_sale_status',
						'type'              => 'taxonomy',
						'instructions'      => '',
						'required'          => 1,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => 'fields-three-wide',
							'id'    => '',
						],
						'taxonomy'          => 'bsacc_status',
						'field_type'        => 'multi_select',
						'allow_null'        => 0,
						'add_term'          => 0,
						'save_terms'        => 1,
						'load_terms'        => 1,
						'return_format'     => 'object',
						'multiple'          => 1,
					],
					[
						'key'               => 'field_5c7d49cb9c7ab',
						'label'             => __( 'Short Description', 'bsac-cabins' ),
						'name'              => 'cabin_short_description_sale',
						'type'              => 'textarea',
						'instructions'      => __( '', 'bsac-cabins' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => '',
						'placeholder'       => __( '', 'bsac-cabins' ),
						'maxlength'         => '',
						'rows'              => 4,
						'new_lines'         => 'wpautop',
					],
					[
						'key'               => 'field_55dc11b33a5ad',
						'label'             => __( 'Cabin Description', 'bsac-cabins' ),
						'name'              => 'cabin_description_sale',
						'type'              => 'wysiwyg',
						'instructions'      => $cabin_desc_instr,
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => '',
						'tabs'              => 'all',
						'toolbar'           => 'basic',
						'media_upload'      => 0,
						'delay'             => 0,
					],
					[
						'key'               => 'field_567efb1ade2b7',
						'label'             => __( 'Price & Terms', 'bsac-cabins' ),
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
						'key'               => 'field_55dc0e1d8e322',
						'label'             => __( 'Cabin Price', 'bsac-cabins' ),
						'name'              => 'cabin_price',
						'type'              => 'text',
						'instructions'      => __( '', 'bsac-cabins' ),
						'required'          => 1,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => 50,
							'class' => '',
							'id'    => '',
						],
						'default_value'     => '',
						'placeholder'       => __( '40,000', 'bsac-cabins' ),
						'prepend'           => '$',
						'append'            => '.00',
						'maxlength'         => '',
						'readonly'          => 0,
						'disabled'          => 0,
					],
					[
						'key'               => 'field_55dc0f168e324',
						'label'             => __( 'Price Flexibility', 'bsac-cabins' ),
						'name'              => 'price_flexibility',
						'type'              => 'select',
						'instructions'      => __( '', 'bsac-cabins' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => 50,
							'class' => '',
							'id'    => '',
						],
						'choices'           => [
							'none'    => __( 'Not Specified', 'bsac-cabins' ),
							'asking'  => __( 'Asking', 'bsac-cabins' ),
							'firm'    => __( 'Firm', 'bsac-cabins' ),
							'reduced' => __( 'Reduced', 'bsac-cabins' ),
						],
						'default_value'     => [],
						'allow_null'        => 1,
						'multiple'          => 0,
						'ui'                => 0,
						'ajax'              => 0,
						'placeholder'       => __( '', 'bsac-cabins' ),
						'disabled'          => 0,
						'readonly'          => 0,
						'return_format'     => 'value',
					],
					[
						'key'               => 'field_55dc0e5c8e323',
						'label'             => __( 'SOLD!', 'bsac-cabins' ),
						'name'              => 'mark_sold',
						'type'              => 'checkbox',
						'instructions'      => __( '', 'bsac-cabins' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'choices'           => [
							'sold' => __( 'This cabin has been sold', 'bsac-cabins' ),
						],
						'default_value'     => [],
						'layout'            => 'vertical',
						'toggle'            => 0,
						'allow_custom'      => 0,
						'save_custom'       => 0,
						'return_format'     => 'value',
					],
					[
						'key'               => 'field_55dc11d43a5ae',
						'label'             => __( 'What\'s Included', 'bsac-cabins' ),
						'name'              => 'cabin_includes',
						'type'              => 'wysiwyg',
						'instructions'      => __( 'List any furniture, appliances, tools, memorabilia, etc. that is included in the cabin sale.', 'bsac-cabins' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => '',
						'tabs'              => 'all',
						'toolbar'           => 'basic',
						'media_upload'      => 0,
						'delay'             => 0,
					],
					[
						'key'               => 'field_567efb31de2b8',
						'label'             => __( 'Map & Directions', 'bsac-cabins' ),
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
						'key'               => 'field_55dc125343c65',
						'label'             => __( 'Map Code', 'bsac-cabins' ),
						'name'              => 'cabin_map_sale',
						'type'              => 'text',
						'instructions'      => __( 'Enter a map embed code.', 'bsac-cabins' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => '',
						'placeholder'       => '[put_wpgm id=1]',
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
					],
					[
						'key'               => 'field_55dc120643c64',
						'label'             => __( 'Directions to Cabin', 'bsac-cabins' ),
						'name'              => 'cabin_directions_sale',
						'type'              => 'textarea',
						'instructions'      => __( '', 'bsac-cabins' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => '',
						'placeholder'       => __( '', 'bsac-cabins' ),
						'maxlength'         => '',
						'rows'              => '',
						'new_lines'         => 'wpautop',
						'readonly'          => 0,
						'disabled'          => 0,
					],
					[
						'key'               => 'field_567efc2cde2bb',
						'label'             => __( 'Display', 'bsac-cabins' ),
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
						'key'               => 'field_567efb7bde2b9',
						'label'             => __( 'Add Video?', 'bsac-cabins' ),
						'name'              => 'cabin_video_sale',
						'type'              => 'true_false',
						'instructions'      => __( '', 'bsac-cabins' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'message'           => __( 'Check to embed a video', 'bsac-cabins' ),
						'default_value'     => 0,
						'ui'                => 0,
						'ui_on_text'        => '',
						'ui_off_text'       => '',
					],
					[
						'key'               => 'field_567efbcade2ba',
						'label'             => __( 'Cabin Video', 'bsac-cabins' ),
						'name'              => 'cabin_video_sale',
						'type'              => 'oembed',
						'instructions'      => __( 'Paste the URL of the video (i.e. YouTube or Vimeo)', 'bsac-cabins' ),
						'required'          => 0,
						'conditional_logic' => [
							[
								[
									'field'    => 'field_567efb7bde2b9',
									'operator' => '==',
									'value'    => '1',
								],
							],
						],
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'width'             => '',
						'height'            => '',
					],
					[
						'key'               => 'field_55dc12e143c66',
						'label'             => __( 'Featured Image', 'bsac-cabins' ),
						'name'              => 'cabin_sale_featured_image',
						'type'              => 'image',
						'instructions'      => __( 'This will be used in the post as well as in feeds and when sharing on social sites.', 'bsac-cabins' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'return_format'     => 'array',
						'preview_size'      => 'medium',
						'library'           => 'all',
						'min_width'         => 600,
						'min_height'        => 315,
						'min_size'          => '',
						'max_width'         => '',
						'max_height'        => '',
						'max_size'          => '',
						'mime_types'        => 'jpg,jpeg,png',
					],
					[
						'key'               => 'field_55dc133043c67',
						'label'             => __( 'Cabin Gallery', 'bsac-cabins' ),
						'name'              => 'cabin_gallery_sale',
						'type'              => 'gallery',
						'instructions'      => __( 'Photo gallery of the cabin', 'bsac-cabins' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'min'               => '',
						'max'               => '',
						'preview_size'      => 'thumbnail',
						'library'           => 'all',
						'min_width'         => '',
						'min_height'        => '',
						'min_size'          => '',
						'max_width'         => '',
						'max_height'        => '',
						'max_size'          => '',
						'mime_types'        => 'jpg,jpeg,png',
						'insert'            => 'append',
					],
					[
						'key'               => 'field_567efc56de2bc',
						'label'             => __( 'Contact', 'bsac-cabins' ),
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
						'key'               => 'field_55dc13d958a3c',
						'label'             => __( 'Contact Information', 'bsac-cabins' ),
						'name'              => 'contact_info_sale',
						'type'              => 'textarea',
						'instructions'      => __( '', 'bsac-cabins' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => '',
						'placeholder'       => __( '', 'bsac-cabins' ),
						'maxlength'         => '',
						'rows'              => '',
						'new_lines'         => 'wpautop',
						'readonly'          => 0,
						'disabled'          => 0,
					],
					[
						'key'               => 'field_59593462829aa',
						'label'             => __( 'Contact Form', 'bsac-cabins' ),
						'name'              => 'sac_cabin_contact_form',
						'type'              => 'text',
						'instructions'      => __( 'Paste in the shortcode for a contact form.', 'bsac-cabins' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => '',
						'placeholder'       => __( '', 'bsac-cabins' ),
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
					],
				],
				'location' => [
					[
						[
							'param'    => 'post_type',
							'operator' => '==',
							'value'    => 'bsacc_forsale',
						],
					],
				],
				'menu_order'            => 0,
				'position'              => 'acf_after_title',
				'style'                 => 'seamless',
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen'        => [
					0 => 'the_content',
					1 => 'discussion',
					2 => 'comments',
					3 => 'revisions',
					4 => 'slug',
					5 => 'author',
					6 => 'format',
					7 => 'send-trackbacks',
				],
				'active'      => true,
				'description' => __( 'For the Cabins For Sale post type.', 'bsac-cabins' ),
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
function bsacc_fields_for_sale() {

	return Fields_For_Sale::instance();

}

// Run an instance of the class.
bsacc_fields_for_sale();