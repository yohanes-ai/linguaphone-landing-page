<?php
/**
 * General options.
 *
 * @package     zakra
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*========================================== GENERAL ==========================================*/
if ( ! class_exists( 'Zakra_Customize_General_Option' ) ) :

	/**
	 * General option.
	 */
	class Zakra_Customize_General_Option extends Zakra_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {

			return array(

				/**
				 * Option: Container style.
				 */
				'zakra_general_container_style' => array(
					'setting' => array(
						'default'           => 'tg-container--wide',
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_radio' ),
					),
					'control' => array(
						'type'    => 'radio_image',
						'label'   => esc_html__( 'Container Style', 'zakra' ),
						'section' => 'zakra_general',
						'choices' => array(
							'tg-container--wide'      => ZAKRA_PARENT_INC_ICON_URI . '/full-width.png',
							'tg-container--boxed'     => ZAKRA_PARENT_INC_ICON_URI . '/boxed.png',
							'tg-container--separate'  => ZAKRA_PARENT_INC_ICON_URI . '/separate.png',
							'tg-container--stretched' => ZAKRA_PARENT_INC_ICON_URI . '/stretched.png',
						),

					),
				),

				/**
				 * Option: Container width.
				 */
				'zakra_general_container_width' => array(
					'output'  => array(
						array(
							'selector'    => '.tg-container',
							'property'    => 'max-width',
							'media_query' => '@media (min-width: 1200px)',
						),
					),
					'setting' => array(
						'default'           => array(
							'slider' => 1160,
							'suffix' => 'px',
						),
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_slider' ),
					),
					'control' => array(
						'type'        => 'slider',
						'label'       => esc_html__( 'Container Width', 'zakra' ),
						'section'     => 'zakra_general',
						'input_attrs' => array(
							'min'  => 768,
							'max'  => 1920,
							'step' => 1,
						),
					),
				),

				/**
				 * Option: Content width.
				 */
				'zakra_general_content_width'   => array(
					'output'  => array(
						array(
							'selector' => '#primary',
							'property' => 'width',
						),
					),
					'setting' => array(
						'default'           => array(
							'slider' => 70,
							'suffix' => '%',
						),
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_slider' ),
					),
					'control' => array(
						'type'        => 'slider',
						'label'       => esc_html__( 'Content Width', 'zakra' ),
						'description' => esc_html__( 'Only works for left/ right sidebar layout', 'zakra' ),
						'section'     => 'zakra_general',
						'input_attrs' => array(
							'min'  => 0,
							'max'  => 100,
							'step' => 1,
						),
					),
				),

				/**
				 * Option: Sidebar width.
				 */
				'zakra_general_sidebar_width'   => array(
					'output'  => array(
						array(
							'selector' => '#secondary',
							'property' => 'width',
						),
					),
					'setting' => array(
						'default'           => array(
							'slider' => 30,
							'suffix' => '%',
						),
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_slider' ),
					),
					'control' => array(
						'type'        => 'slider',
						'label'       => esc_html__( 'Sidebar Width', 'zakra' ),
						'description' => esc_html__( 'Only works for left/ right sidebar layout', 'zakra' ),
						'section'     => 'zakra_general',
						'input_attrs' => array(
							'min'  => 0,
							'max'  => 100,
							'step' => 1,
						),
					),
				),

			);

		}

	}

	new Zakra_Customize_General_Option();

endif;
