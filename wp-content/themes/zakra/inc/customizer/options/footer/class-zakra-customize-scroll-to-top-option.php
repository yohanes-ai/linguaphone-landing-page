<?php
/**
 * Scroll to top styling.
 *
 * @package     zakra
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*========================================== STYLING >  SCROLL TO TOP  ==========================================*/
if ( ! class_exists( 'Zakra_Customize_Scroll_To_Top_Option' ) ) :

	/**
	 * Scroll_To_Top option.
	 */
	class Zakra_Customize_Scroll_To_Top_Option extends Zakra_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {

			return array(

				/**
				 * Option: Enable scroll to top.
				 */
				'zakra_scroll_to_top_enabled'        => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'    => 'toggle',
						'label'   => esc_html__( 'Enable Scroll to Top', 'zakra' ),
						'section' => 'zakra_footer_scroll_to_top',
						'choices' => array(
							'alpha' => true,
						),
					),
				),

				/**
				 * Option: Color.
				 */
				'zakra_scroll_to_top_color'          => array(
					'output'  => array(
						array(
							'selector' => '.tg-scroll-to-top',
							'property' => 'color',
						),
					),
					'setting' => array(
						'default'           => '#ffffff',
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_alpha_color' ),
					),
					'control' => array(
						'type'            => 'color',
						'label'           => esc_html__( 'Color', 'zakra' ),
						'section'         => 'zakra_footer_scroll_to_top',
						'choices'         => array(
							'alpha' => true,
						),
						'active_callback' => array(
							array(
								'setting'  => 'zakra_scroll_to_top_enabled',
								'value'    => true,
								'operator' => '==',
							),
						),
					),
				),

				/**
				 * Option: Hover color.
				 */
				'zakra_scroll_to_top_hover_color'    => array(
					'output'  => array(
						array(
							'selector' => '.tg-scroll-to-top:hover',
							'property' => 'color',
						),
					),
					'setting' => array(
						'default'           => '#ffffff',
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_alpha_color' ),
					),
					'control' => array(
						'type'            => 'color',
						'label'           => esc_html__( 'Hover Color', 'zakra' ),
						'section'         => 'zakra_footer_scroll_to_top',
						'choices'         => array(
							'alpha' => true,
						),
						'active_callback' => array(
							array(
								'setting'  => 'zakra_scroll_to_top_enabled',
								'value'    => true,
								'operator' => '==',
							),
						),
					),
				),

				/**
				 * Option: Button background color.
				 */
				'zakra_scroll_to_top_bg_color'       => array(
					'output'  => array(
						array(
							'selector' => '.tg-scroll-to-top',
							'property' => 'background-color',
						),
					),
					'setting' => array(
						'default'           => '#16181a',
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_alpha_color' ),
					),
					'control' => array(
						'type'            => 'color',
						'label'           => esc_html__( 'Background Color', 'zakra' ),
						'section'         => 'zakra_footer_scroll_to_top',
						'choices'         => array(
							'alpha' => true,
						),
						'active_callback' => array(
							array(
								'setting'  => 'zakra_scroll_to_top_enabled',
								'value'    => true,
								'operator' => '==',
							),
						),
					),
				),

				/**
				 * Option: Button background hover color.
				 */
				'zakra_scroll_to_top_bg_hover_color' => array(
					'output'  => array(
						array(
							'selector' => '.tg-scroll-to-top:hover',
							'property' => 'background-color',
						),
					),
					'setting' => array(
						'default'           => '#1e7ba6',
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_alpha_color' ),
					),
					'control' => array(
						'type'            => 'color',
						'label'           => esc_html__( 'Background Hover Color', 'zakra' ),
						'section'         => 'zakra_footer_scroll_to_top',
						'choices'         => array(
							'alpha' => true,
						),
						'active_callback' => array(
							array(
								'setting'  => 'zakra_scroll_to_top_enabled',
								'value'    => true,
								'operator' => '==',
							),
						),
					),
				),

			);

		}

	}

	new Zakra_Customize_Scroll_To_Top_Option();

endif;
