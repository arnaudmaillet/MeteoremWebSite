<?php
use Elementor\Controls_Manager;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Background;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Main OoohBoi_Imbox class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.5.4
 */
final class OoohBoi_Imbox {

	/**
	 * Initialize 
	 *
	 * @since 1.5.4
	 *
	 * @access public
	 */
	public static function init() {

        add_action( 'elementor/element/image-box/section_style_image/before_section_end',  [ __CLASS__, 'ooohboi_imbox_img_controls' ], 10, 2 ); 
        add_action( 'elementor/element/image-box/section_style_content/before_section_end',  [ __CLASS__, 'ooohboi_imbox_cont_controls' ], 10, 2 );

    }
    
	public static function ooohboi_imbox_img_controls( $element, $args ) {

        $selector = '{{WRAPPER}} .elementor-image-box-img';

		$element->add_control(
			'_ob_imbox_img',
			[
				'label' => 'I M B O X', 
				'type' => Controls_Manager::HEADING,
				'separator' => 'before', 
			]
        );
        // --------------------------------------------------------------------------------------------- CONTROL DIVIDER !!!!!
        $element->add_control(
            '_ob_imbox_separator_x',
            [
                'type' => Controls_Manager::DIVIDER, 
            ]
        );
        // --------------------------------------------------------------------------------------------- CONTROL Box Shadow Regular
		$element->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => '_ob_imbox_shadow', 
				'label' => __( 'Box Shadow', 'ooohboi-steroids' ), 
				'separator' => 'before', 
				'selector' => $selector, 
				'fields_options' => [
					'box_shadow' => [
						'default' => [
							'horizontal' => 0,
							'vertical' => 0,
							'blur' => 0,
							'spread' => 0,
							'color' => 'rgba(0,0,0,0.5)',
						],
					],
				],
			]
        );
        // ------------------------------------------------------------------------- CONTROL: Visibility
		$element->add_control(
			'_ob_imbox_visibility',
			[
				'label' => __( 'Content Overflow', 'ooohboi-steroids' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'hidden',
				'separator' => 'before', 
				'options' => [
					'visible' => __( 'Visible', 'ooohboi-steroids' ), 
					'hidden' => __( 'Hidden', 'ooohboi-steroids' ), 
				],
				'selectors' => [
					$selector => 'overflow: {{value}};',
				],
			]
		);

    }
    
    public static function ooohboi_imbox_cont_controls( $element, $args ) {

        $selector = '{{WRAPPER}} .elementor-image-box-content';

		$element->add_control(
			'_ob_imbox_cont',
			[
				'label' => 'I M B O X', 
				'type' => Controls_Manager::HEADING,
				'separator' => 'before', 
			]
        );

        // --------------------------------------------------------------------------------------------- CONTROL DIVIDER !!!!!
        $element->add_control(
            '_ob_imbox_separator_y',
            [
                'type' => Controls_Manager::DIVIDER, 
            ]
        );

        // --------------------------------------------------------------------------------------------- CONTROL BACKGROUND
		$element->add_group_control(
            Group_Control_Background::get_type(),
            [
				'name' => '_ob_imbox_cont_background', 
                'selector' => $selector,
            ]
		);

        // --------------------------------------------------------------------------------------------- CONTROL Padding
		$element->add_responsive_control(
			'_ob_imbox_padding_cont',
			[
				'label' => __( 'Padding', 'ooohboi-steroids' ),
				'separator' => 'before', 
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					$selector => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

	}

}