<?php
use Elementor\Controls_Manager;
use Elementor\Controls_Stack;
use Elementor\Element_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Main OoohBoi Harakiri
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */
class OoohBoi_Harakiri {

	/**
	 * Initialize 
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public static function init() {

		add_action( 'elementor/element/heading/section_title_style/before_section_end',  [ __CLASS__, 'add_section' ] );
        add_action( 'elementor/element/text-editor/section_style/before_section_end',  [ __CLASS__, 'add_section' ] );
        add_action( 'elementor/element/after_add_attributes',  [ __CLASS__, 'add_attributes' ] );

    }

    public static function add_attributes( Element_Base $element ) {

        if( ! in_array( $element->get_name(), [ 'heading', 'text-editor' ] ) ) return;
		$settings = $element->get_settings();
        $does_harakiri = isset( $settings[ '_ob_harakiri_writing_mode' ] ) ? $settings[ '_ob_harakiri_writing_mode' ] : '';
        
        if( 'inherit' !== $settings[ '_ob_harakiri_writing_mode' ] ) 
            $element->add_render_attribute( '_wrapper', 'class', 'ob-harakiri' );

    }
    
	public static function add_section( Element_Base $element ) {

		//  create panel section
		$element->add_control(
			'_ob_harakiri_plugin_title',
			[
				'label' => 'H A R A K I R I', 
				'type' => Controls_Manager::HEADING,
				'separator' => 'before', 
			]
        );
        $element->add_responsive_control(
			'_ob_harakiri_writing_mode',
			[
				'label' => __( 'Writing Mode', 'ooohboi-steroids' ),
				'type' => Controls_Manager::SELECT,
                'default' => 'inherit', 
				'prefix_class' => 'ob-harakiri-', 
				'frontend_available' => true, 
				'options' => [
					'vertical-lr' => __( 'Vertical LR', 'ooohboi-steroids' ),
					'vertical-rl' => __( 'Vertical RL', 'ooohboi-steroids' ),
					'inherit' => __( 'Normal', 'ooohboi-steroids' ),
                ],
				'selectors' => [
					'{{WRAPPER}}.ob-harakiri' => 'writing-mode: {{VALUE}};', 
                    '{{WRAPPER}}.ob-harakiri .elementor-heading-title' => 'writing-mode: {{VALUE}};', 
					'{{WRAPPER}}.ob-harakiri .elementor-text-editor' => 'writing-mode: {{VALUE}};', 
                ],
			]
        );
        $element->add_responsive_control(
			'_ob_harakiri_make_inline',
			[
				'label' => __( 'Flip', 'ooohboi-steroids' ), 
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'ooohboi-steroids' ),
				'label_off' => __( 'No', 'ooohboi-steroids' ),
				'return_value' => 'no',
				'default' => 'no',
                'label_block' => false,
                'condition' => [
					'_ob_harakiri_writing_mode!' => 'inherit', 
                ],
                'selectors' => [
                    '{{WRAPPER}}.ob-harakiri .elementor-heading-title' => 'transform: rotate(180deg);', 
                    '{{WRAPPER}}.ob-harakiri .elementor-text-editor' => 'transform: rotate(180deg);',
                ],
                'device_args' => [
                    Controls_Stack::RESPONSIVE_TABLET => [
                        'selectors' => [
                            '{{WRAPPER}}.ob-harakiri .elementor-heading-title' => 'transform: rotate(180deg);', 
                            '{{WRAPPER}}.ob-harakiri .elementor-text-editor' => 'transform: rotate(180deg);',
                        ],
                        'condition' => [
                            '_ob_harakiri_writing_mode_tablet!' => 'inherit', 
                        ],
                    ],
                    Controls_Stack::RESPONSIVE_MOBILE => [
                        'selectors' => [
                            '{{WRAPPER}}.ob-harakiri .elementor-heading-title' => 'transform: rotate(180deg);', 
                            '{{WRAPPER}}.ob-harakiri .elementor-text-editor' => 'transform: rotate(180deg);',
                        ],
                        'condition' => [
                            '_ob_harakiri_writing_mode_mobile!' => 'inherit', 
                        ],
                    ],
                ],
			]
        );
        $element->add_responsive_control(
			'_ob_harakiri_height',
			[
				'label' => __( 'Height', 'ooohboi-steroids' ),
				'type' => Controls_Manager::SELECT,
                'default' => '', 
				'options' => [
					'' => __( 'Default', 'ooohboi-steroids' ),
					'auto' => __( 'Inline', 'ooohboi-steroids' ) . ' (auto)', 
					'initial' => __( 'Custom', 'ooohboi-steroids' ),
				],
				'selectors_dictionary' => [
					'inherit' => '100%',
				],
				'selectors' => [
					'{{WRAPPER}}.ob-harakiri' => 'inline-size: {{VALUE}}; width: unset;', 
					'{{WRAPPER}}.ob-harakiri .elementor-heading-title' => 'inline-size: {{VALUE}};', 
                    '{{WRAPPER}}.ob-harakiri .elementor-text-editor' => 'inline-size: {{VALUE}};',
				],
				'condition' => [
					'_ob_harakiri_writing_mode!' => 'inherit', 
                ],
			]
		);
        $element->add_responsive_control(
			'_ob_harakiri_height_custom',
			[
				'label' => __( 'Custom Height', 'ooohboi-steroids' ),
				'description' => __( 'NOTE: [%] unit works properly only if Column height is a fixed value!', 'ooohboi-steroids' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'max' => 100,
						'step' => 1,
					],
					'vh' => [
						'max' => 100,
						'step' => 1,
					],
                ],
                'default' => [
					'unit' => '%',
					'size' => 100,
                ],
				'size_units' => [ 'px', '%', 'vh' ],
				'selectors' => [
					'{{WRAPPER}}.ob-harakiri' => 'inline-size: {{SIZE}}{{UNIT}}; width: unset;', 
                ],
                'device_args' => [
					Controls_Stack::RESPONSIVE_TABLET => [
						'condition' => [
							'_ob_harakiri_height_tablet' => [ 'initial' ], 
							'_ob_harakiri_writing_mode!' => 'inherit', 
						],
					],
					Controls_Stack::RESPONSIVE_MOBILE => [
						'condition' => [
							'_ob_harakiri_height_mobile' => [ 'initial' ], 
							'_ob_harakiri_writing_mode!' => 'inherit', 
						],
					],
				],
                'condition' => [
					'_ob_harakiri_height' => [ 'initial' ], 
					'_ob_harakiri_writing_mode!' => 'inherit', 
				],
			]
		);

	}

}