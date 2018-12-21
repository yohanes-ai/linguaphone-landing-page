<?php
/**
 * Typography.
 *
 * @package     zakra
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*========================================== TYPOGRAPHY ==========================================*/
if ( ! class_exists( 'Zakra_Customize_Typography_Option' ) ) :

	/**
	 * Typography option.
	 */
	class Zakra_Customize_Typography_Option extends Zakra_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {

			return array(

				/**
				 * Option: Body.
				 */
				'zakra_base_typography_body'    => array(
					'output'  => array(
						array(
							'selector' => 'body',
						),
					),
					'setting' => array(
						'default'           => array(
							'font-family' => '-apple-system, blinkmacsystemfont, segoe ui, roboto, oxygen-sans, ubuntu, cantarell, helvetica neue, helvetica, arial, sans-serif',
							'variant'     => '400',
							'font-size'   => '15px',
							'line-height' => '1.8',
						),
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_typography' ),
					),
					'control' => array(
						'type'    => 'typography',
						'label'   => esc_html__( 'Body', 'zakra' ),
						'section' => 'zakra_base_typography',
					),
				),

				/**
				 * Option: Heading 1.
				 */
				'zakra_base_typography_heading' => array(
					'output'  => array(
						array(
							'selector' => 'h1, h2, h3, h4, h5, h6',
						),
					),
					'setting' => array(
						'default'           => array(
							'font-family' => '-apple-system, blinkmacsystemfont, segoe ui, roboto, oxygen-sans, ubuntu, cantarell, helvetica neue, helvetica, arial, sans-serif',
							'variant'     => '400',
							'line-height' => '1.3',
						),
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_typography' ),
					),
					'control' => array(
						'type'    => 'typography',
						'label'   => esc_html__( 'Heading', 'zakra' ),
						'section' => 'zakra_base_typography',
					),
				),

			);

		}

	}

	new Zakra_Customize_Typography_Option();

endif;
