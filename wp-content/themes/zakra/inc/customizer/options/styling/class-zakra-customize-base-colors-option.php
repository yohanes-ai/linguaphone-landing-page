<?php
/**
 * Base styling.
 *
 * @package     zakra
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*========================================== STYLING > BASE ==========================================*/
if ( ! class_exists( 'Zakra_Customize_Base_Colors_Option' ) ) :

	/**
	 * Base option.
	 */
	class Zakra_Customize_Base_Colors_Option extends Zakra_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {

			return array(

				/**
				 * Option: Primary color.
				 */
				'zakra_base_color_primary' => array(
					'setting' => array(
						'default'           => '#269bd1',
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_alpha_color' ),
					),
					'control' => array(
						'type'    => 'color',
						'label'   => esc_html__( 'Primary Color', 'zakra' ),
						'section' => 'zakra_styling_base',
						'choices' => array(
							'alpha' => true,
						),
					),
				),

				/**
				 * Option: Text color.
				 */
				'zakra_base_color_text'    => array(
					'output'  => array(
						array(
							'selector' => 'body',
							'property' => 'color',
						),
					),
					'setting' => array(
						'default'           => '#51585f',
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_alpha_color' ),
					),
					'control' => array(
						'type'    => 'color',
						'label'   => esc_html__( 'Text Color', 'zakra' ),
						'section' => 'zakra_styling_base',
						'choices' => array(
							'alpha' => true,
						),
					),
				),

				/**
				 * Option: Border color.
				 */
				'zakra_base_color_border'  => array(
					'setting' => array(
						'default'           => '#e9ecef',
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_alpha_color' ),
					),
					'control' => array(
						'type'    => 'color',
						'label'   => esc_html__( 'Border Color', 'zakra' ),
						'section' => 'zakra_styling_base',
						'choices' => array(
							'alpha' => true,
						),
					),
				),

			);

		}

	}

	new Zakra_Customize_Base_Colors_Option();

endif;
