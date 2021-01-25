<?php
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Main OoohBoi Breaking Bad Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */
class OoohBoi_Breaking_Bad {

	/**
	 * Initialize 
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public static function init() {

		add_action( 'elementor/element/section/section_layout/before_section_end',  [ __CLASS__, 'ooohboi_handle_section' ], 10, 2 );
		add_action( 'elementor/element/column/layout/before_section_end',  [ __CLASS__, 'ooohboi_handle_columns' ], 10, 2 );

        add_action( 'elementor/frontend/section/before_render', function( \Elementor\Element_Base $element ) {

			if ( \Elementor\Plugin::instance()->editor->is_edit_mode() ) return;
			$settings = $element->get_settings_for_display();

			if ( isset( $settings[ '_ob_bbad_use_it' ] ) && 'yes' === $settings[ '_ob_bbad_use_it' ] ) {

				$element->add_render_attribute( '_wrapper', [
					'class' => 'ob-is-breaking-bad'
				] );

			}
			if ( isset( $settings[ '_ob_bbad_sssic_use' ] ) && 'yes' === $settings[ '_ob_bbad_sssic_use' ] ) {

				$element->add_render_attribute( '_wrapper', [
					'class' => 'ob-is-sticky-inner-section'
				] );
	
			}

		} );

	}

    public static function ooohboi_handle_section( $element, $args ) {

        //  create panel section
		$element->add_control(
			'_ob_bbad_section_title',
			[
				'label' => 'B R E A K I N G - B A D', 
				'type' => Controls_Manager::HEADING,
				'separator' => 'before', 
			]
        );
        // ------------------------------------------------------------------------- CONTROL: Use Breaking Bad for Section and Columns
		$element->add_control(
			'_ob_bbad_use_it',
			[
                'label' => __( 'Enable Breaking Bad?', 'ooohboi-steroids' ), 
				'description' => __( 'By enabling Breaking Bad for this SECTION, all the Columns will break in order to fit the available width.', 'ooohboi-steroids' ), 
				'separator' => 'before', 
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'ooohboi-steroids' ),
				'label_off' => __( 'No', 'ooohboi-steroids' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'frontend_available' => true,
			]
		);
		// ------------------------------------------------------------------------- CONTROL: Align columns
		$element->add_responsive_control(
			'_ob_bbad_arrange_cols',
			[
				'label' => __( 'Align Columns', 'ooohboi-steroids' ),
				'type' => Controls_Manager::SELECT,
                'default' => 'flex-start', 
				'options' => [
					'flex-start' => __( 'Start', 'ooohboi-steroids' ),
					'center' => __( 'Center', 'ooohboi-steroids' ), 
					'flex-end' => __( 'End', 'ooohboi-steroids' ), 
					'space-between' => __( 'Space Between', 'ooohboi-steroids' ), 
					'space-around' => __( 'Space Around', 'ooohboi-steroids' ), 
					'space-evenly' => __( 'Space Evenly', 'ooohboi-steroids' ),
				],
				'selectors' => [
					'{{WRAPPER}}.ob-is-breaking-bad .elementor-container > .elementor-row, {{WRAPPER}}.ob-is-breaking-bad .elementor-container' => 'justify-content: {{VALUE}} !important;',
				],
				'condition' => [
					'_ob_bbad_use_it' => 'yes',
				],
			]
		);
		// ------------------------------------------------------------------------- CONTROL: Columns direction
		$element->add_responsive_control(
			'_ob_bbad_cols_direction',
			[
				'label' => __( 'Columns Direction', 'ooohboi-steroids' ),
				'type' => Controls_Manager::SELECT,
                'default' => 'row', 
				'options' => [
					'row' => __( 'Row', 'ooohboi-steroids' ),
					'column' => __( 'Column', 'ooohboi-steroids' ), 
				],
				'selectors' => [
					'{{WRAPPER}}.ob-is-breaking-bad .elementor-container > .elementor-row, {{WRAPPER}}.ob-is-breaking-bad .elementor-container' => 'flex-direction: {{VALUE}};', 
					'{{WRAPPER}}.ob-is-breaking-bad.ob-is-glider .elementor-container.swiper-container-vertical > .elementor-row, {{WRAPPER}}.ob-is-breaking-bad.ob-is-glider .elementor-container.swiper-container-vertical' => 'flex-direction: column;',
				],
				'condition' => [
					'_ob_bbad_use_it' => 'yes',
				],
			]
		);
		// ------------------------------------------------------------------------- CONTROL: Columns direction - items alignment
		$element->add_responsive_control(
			'_ob_bbad_cols_direction_align',
			[
				'label' => __( 'Align Items', 'ooohboi-steroids' ),
				'type' => Controls_Manager::SELECT,
                'default' => 'flex-start', 
				'options' => [
					'flex-start' => __( 'Start', 'ooohboi-steroids' ),
					'center' => __( 'Center', 'ooohboi-steroids' ), 
					'flex-end' => __( 'End', 'ooohboi-steroids' ), 
				],
				'selectors' => [
					'{{WRAPPER}}.ob-is-breaking-bad .elementor-container > .elementor-row, {{WRAPPER}}.ob-is-breaking-bad .elementor-container' => 'align-items: {{VALUE}};',
				],
				'condition' => [
					'_ob_bbad_use_it' => 'yes', 
					'_ob_bbad_cols_direction' => [ 'column' ],
				],
			]
		);
		// ------------------------------------------------------------------------- SINCE 1.5.7 - CONTROL: Enable Sticky Section Stay in Column
		$element->add_control(
			'_ob_bbad_sssic_use',
			[
                'label' => sprintf( __( 'Sticky Section%sNEW!%s', 'ooohboi-steroids' ), '<sup class="ob-new-feature">', '</sup>' ), 
                'description' => __( 'It works for the Inner Section only! It keeps it sticky inside the column to avoid content overlaps.', 'ooohboi-steroids' ), 
				'type' => Controls_Manager::SWITCHER, 
				'label_on' => __( 'Yes', 'ooohboi-steroids' ),
				'label_off' => __( 'No', 'ooohboi-steroids' ),
				'return_value' => 'yes',
                'default' => 'no', 
				'frontend_available' => true, 
				'condition' => [
					'_ob_bbad_use_it' => 'yes', 
				],
			]
        );

    }

    public static function ooohboi_handle_columns( $element, $args ) {

		$element->add_control(
			'_ob_bbad_column_title',
			[
				'label' => 'B R E A K I N G - B A D', 
				'type' => Controls_Manager::HEADING,
				'separator' => 'before', 
			]
        );
		// --------------------------------------------------------------------------------------------- CONTROL Column width
		$element->add_responsive_control(
            '_ob_bbad_column_width',
            [
                'label' => __( 'Custom Width', 'ooohboi-steroids' ),
                'type' => Controls_Manager::TEXT,
                'separator' => 'before',
                'label_block' => true,
                'description' => __( 'You can enter any acceptable CSS value, for example: 50em, 300px, 100%, calc(100% - 300px). NOTE: If you want to make the columns wrap, Enable Breaking Bad for this Column parent SECTION!', 'ooohboi-steroids' ),
                'selectors' => [
                    '{{WRAPPER}}.elementor-column' => 'width: {{VALUE}};',
				],
            ]
		);
		// --------------------------------------------------------------------------------------------- CONTROL Column height
		$element->add_responsive_control(
            '_ob_bbad_column_height',
            [
				'label' => __( 'Custom Height', 'ooohboi-steroids' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 1000,
						'step' => 1,
					],
					'em' => [
						'max' => 100,
						'step' => 1,
					],
					'vh' => [
						'max' => 100,
						'step' => 1,
					],
                ],
				'size_units' => [ 'px', 'em', 'vh' ],
				'selectors' => [
					'{{WRAPPER}}.elementor-column, {{WRAPPER}}.elementor-column > .elementor-widget-wrap' => 'height: {{SIZE}}{{UNIT}};', 
                ],
			]
		);
		// --------------------------------------------------------------------------------------------- CONTROL Column order
		$element->add_responsive_control(
            '_ob_bbad_column_order',
            [
				'label' => __( 'Column Order', 'ooohboi-steroids' ), 
				'description' => sprintf(
                    __( 'More info at %sMozilla%s.', 'ooohboi-steroids' ),
                    '<a 
href="https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_Flexible_Box_Layout/Ordering_Flex_Items#The_order_property" target="_blank">',
                    '</a>'
                ),
				'type' => Controls_Manager::NUMBER, 
				'style_transfer' => true, 
				'selectors' => [
					'{{WRAPPER}}.elementor-column' => '-webkit-box-ordinal-group: calc({{VALUE}} + 1 ); -ms-flex-order:{{VALUE}}; order: {{VALUE}};', 
                ],
			]
		);
		// --------------------------------------------------------------------------------------------- CONTROL Scrollable
		$element->add_control(
            '_ob_bbad_column_scrollable',
            [
                'label' => __( 'Scrollable Column?', 'ooohboi-steroids' ), 
				'separator' => 'before', 
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'ooohboi-steroids' ),
				'label_off' => __( 'No', 'ooohboi-steroids' ),
				'return_value' => 'scroll',
				'default' => 'visible',
				'selectors' => [
					'{{WRAPPER}}.elementor-column > .elementor-column-wrap, {{WRAPPER}}.elementor-column > .elementor-widget-wrap' => 'overflow-y: {{VALUE}};', 
                ],
				'condition' => [
					'_ob_bbad_column_height!' => '',
				],
			]
		);

    }

}