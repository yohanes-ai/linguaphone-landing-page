<?php
/**
 * Header main options.
 *
 * @package zakra
 */

defined( 'ABSPATH' ) || exit;

/*========================================== HEADER > HEADER MAIN ==========================================*/
if ( ! class_exists( 'Zakra_Customize_Header_Main_Option' ) ) :

	/**
	 * Header main customizer options.
	 */
	class Zakra_Customize_Header_Main_Option extends Zakra_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {

			return array(

				/**
				 * Option: Header style.
				 */
				'zakra_header_main_style'               => array(
					'setting' => array(
						'default'           => 'tg-site-header--left',
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_radio' ),
					),
					'control' => array(
						'type'    => 'radio_image',
						'label'   => esc_html__( 'Style', 'zakra' ),
						'section' => 'zakra_header_main',
						'choices' => array(
							'tg-site-header--left'   => ZAKRA_PARENT_INC_ICON_URI . '/header-left.png',
							'tg-site-header--center' => ZAKRA_PARENT_INC_ICON_URI . '/header-center.png',
							'tg-site-header--right'  => ZAKRA_PARENT_INC_ICON_URI . '/header-right.png',
						),

					),
				),

				/**
				 * Option: Enable search icon.
				 */
				'tg_header_menu_search_enabled'           => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'    => 'toggle',
						'label'   => esc_html__( 'Enable Search Icon', 'zakra' ),
						'section' => 'zakra_header_main',
					),
				),

				/**
				 * Option: Header bar border.
				 */
				'zakra_header_main_border_bottom_width' => array(
					'output'  => array(
						array(
							'selector' => '.tg-site-header',
							'property' => 'border-bottom-width',
						),
					),
					'setting' => array(
						'default'           => array(
							'slider' => 1,
							'suffix' => 'px',
						),
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_slider' ),
					),
					'control' => array(
						'type'        => 'slider',
						'label'       => esc_html__( 'Border Bottom', 'zakra' ),
						'section'     => 'zakra_header_main',
						'input_attrs' => array(
							'min'  => 0,
							'max'  => 20,
							'step' => 1,
						),

					),
				),

				/**
				 * Option: Header bar border color.
				 */
				'zakra_header_main_border_bottom_color' => array(
					'output'  => array(
						array(
							'selector' => '.tg-site-header',
							'property' => 'border-bottom-color',
						),
					),
					'setting' => array(
						'default'           => '#e9ecef',
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_alpha_color' ),
					),
					'control' => array(
						'type'    => 'color',
						'label'   => esc_html__( 'Border Bottom Color', 'zakra' ),
						'section' => 'zakra_header_main',
						'choices' => array(
							'alpha' => true,
						),
					),
				),

				/**
				 * Option: Background.
				 */
				'zakra_header_main_bg'                  => array(
					'output'  => array(
						array(
							'selector' => '.tg-site-header',
						),
					),
					'setting' => array(
						'default'           => array(
							'background-color'      => '#ffffff',
							'background-image'      => '',
							'background-repeat'     => 'repeat',
							'background-position'   => 'center center',
							'background-size'       => 'contain',
							'background-attachment' => 'scroll',
						),
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_background' ),
					),
					'control' => array(
						'type'    => 'background',
						'section' => 'zakra_header_main',
					),
				),

			);

		}

	}

	new Zakra_Customize_Header_Main_Option();

endif;
