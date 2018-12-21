<?php
/**
 * Button styling.
 *
 * @package     zakra
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*========================================== STYLING >  BUTTON ==========================================*/
if ( ! class_exists( 'Zakra_Customize_Button_Option' ) ) :

	/**
	 * Button option.
	 */
	class Zakra_Customize_Button_Option extends Zakra_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {

			return array(

				/**
				 * Option: Button text color.
				 */
				'zakra_button_text_color'       => array(
					'output'  => array(
						array(
							'selector' => 'button, input[type="button"], input[type="reset"], input[type="submit"]',
							'property' => 'color',
						),
					),
					'setting' => array(
						'default'           => '#ffffff',
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_alpha_color' ),
					),
					'control' => array(
						'type'    => 'color',
						'label'   => esc_html__( 'Text Color', 'zakra' ),
						'section' => 'zakra_styling_button',
						'choices' => array(
							'alpha' => true,
						),
					),
				),

				/**
				 * Option: Button text hover color.
				 */
				'zakra_button_text_hover_color' => array(
					'output'  => array(
						array(
							'selector' => 'button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover',
							'property' => 'color',
						),
					),
					'setting' => array(
						'default'           => '#ffffff',
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_alpha_color' ),
					),
					'control' => array(
						'type'    => 'color',
						'label'   => esc_html__( 'Text Hover Color', 'zakra' ),
						'section' => 'zakra_styling_button',
						'choices' => array(
							'alpha' => true,
						),
					),
				),

				/**
				 * Option: Button background color.
				 */
				'zakra_button_bg_color'         => array(
					'output'  => array(
						array(
							'selector' => 'button, input[type="button"], input[type="reset"], input[type="submit"]',
							'property' => 'background-color',
						),
					),
					'setting' => array(
						'default'           => '#269bd1',
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_alpha_color' ),
					),
					'control' => array(
						'type'    => 'color',
						'label'   => esc_html__( 'Background Color', 'zakra' ),
						'section' => 'zakra_styling_button',
						'choices' => array(
							'alpha' => true,
						),
					),
				),

				/**
				 * Option: Button background hover color.
				 */
				'zakra_button_bg_hover_color'   => array(
					'output'  => array(
						array(
							'selector' => 'button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover',
							'property' => 'background-color',
						),
					),
					'setting' => array(
						'default'           => '#1e7ba6',
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_alpha_color' ),
					),
					'control' => array(
						'type'    => 'color',
						'label'   => esc_html__( 'Background Hover Color', 'zakra' ),
						'section' => 'zakra_styling_button',
						'choices' => array(
							'alpha' => true,
						),
					),
				),

				/**
				 * Option: Button roundness.
				 */
				'zakra_button_roundness'        => array(
					'output'  => array(
						array(
							'selector' => 'button, input[type="button"], input[type="reset"], input[type="submit"]',
							'property' => 'border-radius',
						),
					),
					'setting' => array(
						'default'           => array(
							'slider' => 0,
							'suffix' => 'px',
						),
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_slider' ),
					),
					'control' => array(
						'type'        => 'slider',
						'label'       => esc_html__( 'Roundness', 'zakra' ),
						'section'     => 'zakra_styling_button',
						'input_attrs' => array(
							'min'  => 0,
							'max'  => 20,
							'step' => 1,
						),
					),
				),

				/**
				 * Option: Padding.
				 */
				'zakra_button_padding'          => array(
					'output'  => array(
						array(
							'selector' => 'button, input[type="button"], input[type="reset"], input[type="submit"]',
							'property' => 'padding',
						),
					),
					'setting' => array(
						'default'           => array(
							'top'    => '10px',
							'right'  => '15px',
							'bottom' => '10px',
							'left'   => '15px',
						),
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_dimensions' ),
					),
					'control' => array(
						'type'        => 'dimensions',
						'label'       => esc_html__( 'Padding', 'zakra' ),
						'section'     => 'zakra_styling_button',
						'input_attrs' => array(
							'min'  => 0,
							'step' => 1,
						),
					),
				),

			);

		}

	}

	new Zakra_Customize_Button_Option();

endif;
