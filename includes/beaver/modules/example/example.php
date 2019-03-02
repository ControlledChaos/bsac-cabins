<?php
/**
 * Example Beaver Builder module
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
 * Example Beaver Builder module
 *
 * @since  1.0.0
 * @access public
 */
class BSACC_Example_Module extends FLBuilderModule {

    /**
	 * Constructor method
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
    public function __construct() {

        parent::__construct( [
            'name'          => __( 'Example', 'bsac-cabins' ),
            'description'   => __( 'An example for coding new modules.', 'bsac-cabins' ),
            'category'      => __( 'Example Modules', 'bsac-cabins' ),
            'dir'           => BSACC_PATH . 'includes/beaver/modules/example/',
            'url'           => BSACC_URL . 'includes/beaver/modules/example/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
        ] );

        /**
         * Use these methods to enqueue css and js already
         * registered or to register and enqueue your own.
         *
         * @since  1.0.0
         */

        // Already registered.
        $this->add_css( 'font-awesome' );
        $this->add_js( 'jquery-bxslider' );

        // Register and enqueue your own.
        $this->add_css('example-lib', $this->url . 'css/example-lib.css');
        $this->add_js('example-lib', $this->url . 'js/example-lib.js', [], '', true);

    }

    /**
     * Use this method to work with settings data before
     * it is saved. You must return the settings object.
     *
     * @since  1.0.0
	 * @access public
     * @param  $settings {object}
     * @return string
     */
    public function update( $settings ) {

        $settings->textarea_field .= __( ' - this text was appended in the update method.', 'bsac-cabins' );

        return $settings;

    }

    /**
     * Delete method
     *
     * This method will be called by the builder
     * right before the module is deleted.
     *
     * @since  1.0.0
	 * @access public
	 * @return void
     */
    public function delete() {}

    /**
     * Example method
     *
     * Add additional methods to this class for use in the
     * other module files such as preview.php, frontend.php
     * and frontend.css.php.
     *
     * @since  1.0.0
	 * @access public
	 * @return void
     */
    public function example_method() {}

}

/**
 * Register the module and its form settings.
 *
 * @since  1.0.0
 * @access public
 * @return array Returns the array of module fields.
 */
FLBuilder::register_module( 'BSACC_Example_Module', [
    'general' => [ // Tab
        'title'    => __( 'General', 'bsac-cabins' ), // Tab title
        'sections' => [ // Tab Sections
            'general' => [ // Section
                'title'  => __( 'Section Title', 'bsac-cabins' ), // Section Title
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
                        'help'        =>__( 'Put your help inf here.', 'bsac-cabins' ),
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
                    'select_field' => [
                        'type'    => 'select',
                        'label'   => __( 'Select Field', 'bsac-cabins' ),
                        'default' => 'option-2',
                        'options' => [
                            'option-1' => __( 'Option 1', 'bsac-cabins' ),
                            'option-2' => __( 'Option 2', 'bsac-cabins' ),
                            'option-3' => __( 'Option 3', 'bsac-cabins' )
                        ]
                    ],
                    'color_field' => [
                        'type'       => 'color',
                        'label'      => __( 'Color Picker', 'bsac-cabins' ),
                        'default'    => '333333',
                        'show_reset' => true,
                        'preview'     => [
                            'type'     => 'css',
                            'selector' => '.fl-example-text',
                            'property' => 'color'
                        ]
                    ],
                    'photo_field' => [
                        'type'  => 'photo',
                        'label' => __( 'Photo Field', 'bsac-cabins' )
                    ],
                    'photos_field' => [
                        'type'  => 'multiple-photos',
                        'label' => __( 'Multiple Photos Field', 'bsac-cabins' )
                    ],
                    'video_field' => [
                        'type'  => 'video',
                        'label' => __( 'Video Field', 'bsac-cabins' )
                    ],
                    'icon_field' => [
                        'type'        => 'icon',
                        'label'       => __( 'Icon Field', 'bsac-cabins' ),
                        'show_remove' => true
                    ],
                    'link_field' => [
                        'type'  => 'link',
                        'label' => __( 'Link Field', 'bsac-cabins' )
                    ],
                    'form_field' => [
                        'type'         => 'form',
                        'label'        => __( 'Form Field', 'bsac-cabins' ),
                        'form'         => 'example_settings_form', // ID from registered form below
                        'preview_text' => 'example' // Name of a field to use for the preview text
                    ],
                    'suggest_field' => [
                        'type'   => 'suggest',
                        'label'  => __( 'Suggest Field', 'bsac-cabins' ),
                        'action' => 'fl_as_posts',
                        'data'   => 'post'
                    ],
                    'editor_field' => [
                        'type'          => 'editor',
                        'label'         => '',
                        'media_buttons' => true,
                        'rows'          => 10
                    ],
                    'custom_field_example' => [
                        'type'    => 'bsacc-custom-beaver-field',
                        'label'   => __( 'Custom Field Example', 'bsac-cabins' ),
                        'default' => ''
                    ],
                ]
            ]
        ]
    ],
    'toggle' => [ // Tab
        'title'    => __( 'Toggle', 'bsac-cabins' ), // Tab title
        'sections' => [ // Tab Sections
            'general' => [ // Section
                'title'  => __( 'Toggle Example', 'bsac-cabins' ), // Section Title
                'fields' => [ // Section Fields
                    'toggle_me' => [
                        'type'    => 'select',
                        'label'   => __( 'Toggle Me!', 'bsac-cabins' ),
                        'default' => 'option-1',
                        'options' => [
                            'option-1' => __( 'Option 1', 'bsac-cabins' ),
                            'option-2' => __( 'Option 2', 'bsac-cabins' )
                        ],
                        'toggle' => [
                            'option-1' => [
                                'fields'   => [
                                    'toggle_text',
                                    'toggle_text2'
                                ],
                                'sections' => [
                                    'toggle_section'
                                ]
                            ],
                            'option-2' => []
                        ]
                    ],
                    'toggle_text' => [
                        'type'        => 'text',
                        'label'       => __( 'Hide Me!', 'bsac-cabins' ),
                        'default'     => '',
                        'description' => 'I get hidden when you toggle the select above.'
                    ],
                    'toggle_text2' => [
                        'type'    => 'text',
                        'label'   => __( 'Me Too!', 'bsac-cabins' ),
                        'default' => ''
                    ]
                ]
            ],
            'toggle_section' => [ // Section
                'title'  => __( 'Hide This Section!', 'bsac-cabins' ), // Section Title
                'fields' => [ // Section Fields
                    'some_text' => [
                        'type'    => 'text',
                        'label'   => __( 'Text', 'bsac-cabins' ),
                        'default' => ''
                    ]
                ]
            ]
        ]
    ],
    'multiple' => [ // Tab
        'title'    => __( 'Multiple', 'bsac-cabins' ), // Tab title
        'sections' => [ // Tab Sections
            'general' => [ // Section
                'title'   => __( 'Multiple Example', 'bsac-cabins' ), // Section Title
                'fields'  => [ // Section Fields
                    'test' => [
                        'type'     => 'text',
                        'label'    => __( 'Multiple Test', 'bsac-cabins' ),
                        'multiple' => true // Doesn't work with editor or photo fields
                    ]
                ]
            ]
        ]
    ],
    'include' => [ // Tab
        'title' => __( 'Include', 'bsac-cabins' ), // Tab title
        'file'  => BSACC_PATH . 'includes/beaver/example/includes/settings-example.php'
    ]
] );

/**
 * Register a settings form to use in the "form" field type above.
 */
FLBuilder::register_settings_form( 'example_settings_form', [
    'title' => __( 'Example Form Settings', 'bsac-cabins' ),
    'tabs'  => [
        'general' => [ // Tab
            'title'    => __( 'General', 'bsac-cabins' ), // Tab title
            'sections' => [ // Tab Sections
                'general' => [ // Section
                    'title'  => '', // Section Title
                    'fields' => [ // Section Fields
                        'example' => [
                            'type'    => 'text',
                            'label'   => __( 'Example', 'bsac-cabins' ),
                            'default' => __( 'Some example text', 'bsac-cabins' )
                        ]
                    ]
                ]
            ]
        ],
        'another' => [ // Tab
            'title'    => __( 'Another Tab', 'bsac-cabins' ), // Tab title
            'sections' => [ // Tab Sections
                'general' => [ // Section
                    'title'  => '', // Section Title
                    'fields' => [ // Section Fields
                        'another_example' => [
                            'type'  => 'text',
                            'label' => __( 'Another Example', 'bsac-cabins' )
                        ]
                    ]
                ]
            ]
        ]
    ]
] );