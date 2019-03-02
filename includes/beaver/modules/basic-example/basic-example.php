<?php
/**
 * Basic example Beaver Builder module
 *
 * This is an example module with only the basic
 * setup necessary to get it working.
 *
 * @package    Big_Santa_Anita_Canyon_Cabins
 * @subpackage Includes\Beaver
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Basic example Beaver Builder module
 *
 * @since  1.0.0
 * @access public
 */
class BSACC_Basic_Example_Module extends FLBuilderModule {

    /**
	 * Constructor method
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
    public function __construct() {

        parent::__construct( [
            'name'          => __( 'Basic Example', 'bsac-cabins' ),
            'description'   => __( 'An basic example for coding new modules.', 'bsac-cabins' ),
            'category'      => __( 'Example Modules', 'bsac-cabins' ),
            'dir'           => BSACC_PATH . 'includes/beaver/modules/basic-example/',
            'url'           => BSACC_URL . 'includes/beaver/modules/basic-example/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
        ] );

    }
}

/**
 * Register the module and its form settings.
 *
 * @since  1.0.0
 * @access public
 * @return array Returns the array of module fields.
 */
FLBuilder::register_module( 'BSACC_Basic_Example_Module', [
    'general' => [ // Tab
        'title'    => __( 'General', 'bsac-cabins' ), // Tab title
        'sections' => [ // Tab Sections
            'general' => [ // Section
                'title' => __( 'Section Title', 'bsac-cabins' ), // Section Title
                'fields' => [ // Section Fields
                    'text_field' => [
                        'type'        => 'text',
                        'label'       => __( 'Text Field', 'bsac-cabins' ),
                        'default'     => '',
                        'maxlength'   => '2',
                        'size'        => '3',
                        'placeholder' => '10',
                        'class'       => 'my-css-class',
                        'description' => 'px',
                        'help'        => __( 'Put your help inf here.', 'bsac-cabins' ),
                        'preview'     => [
                            'type'     => 'css',
                            'selector' => '.fl-example-text',
                            'property' => 'font-size',
                            'unit'     => 'px'
                        ]
                    ],
                    'textarea_field' => [
                        'type'        => 'textarea',
                        'label'       => __( 'Textarea Field', 'bsac-cabins' ),
                        'default'     => '',
                        'placeholder' => __( 'Placeholder Text', 'bsac-cabins' ),
                        'rows'        => '6',
                        'preview'     => [
                            'type'     => 'text',
                            'selector' => '.fl-example-text'
                        ]
                    ],
                    'color_field' => [
                        'type'          => 'color',
                        'label'         => __( 'Color Picker', 'bsac-cabins' ),
                        'default'       => '333333',
                        'show_reset'    => true,
                        'preview'       => [
                            'type'     => 'css',
                            'selector' => '.fl-example-text',
                            'property' => 'color'
                        ]
                    ],
                    'custom_field_example' => [
                        'type'    => 'bsacc-custom-beaver-field',
                        'label'   => __( 'Custom Field Example', 'bsac-cabins' ),
                        'default' => ''
                    ],
                ]
            ]
        ]
    ]
] );