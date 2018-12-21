<?php
/**
 * Footer widgets options.
 *
 * @package     zakra
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*========================================== FOOTER > FOOTER WIDGETS ==========================================*/
if ( ! class_exists( 'Zakra_Customize_Footer_Widget_Option' ) ) :

	/**
	 * Option: Footer widget Option.
	 */
	class Zakra_Customize_Footer_Widget_Option extends Zakra_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {

			return array(

				/**
				 * Option: Enable Footer widget.
				 */
				'zakra_footer_widgets_enabled'                  => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'    => 'toggle',
						'label'   => esc_html__( 'Enable Footer Widgets', 'zakra' ),
						'section' => 'zakra_footer_widgets',
					),
				),

				/**
				 * Option: Footer widget structure.
				 */
				'zakra_footer_widgets_style'                    => array(
					'setting' => array(
						'default'           => 'tg-footer-widget-col--four',
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_radio' ),
					),
					'control' => array(
						'type'            => 'radio_image',
						'label'           => esc_html__( 'Footer Widgets Style', 'zakra' ),
						'section'         => 'zakra_footer_widgets',
						'choices'         => array(
							'tg-footer-widget-col--one'   => ZAKRA_PARENT_INC_ICON_URI . '/one-column.png',
							'tg-footer-widget-col--two'   => ZAKRA_PARENT_INC_ICON_URI . '/two-columns.png',
							'tg-footer-widget-col--three' => ZAKRA_PARENT_INC_ICON_URI . '/three-columns.png',
							'tg-footer-widget-col--four'  => ZAKRA_PARENT_INC_ICON_URI . '/four-columns.png',
						),
						'active_callback' => array(
							array(
								'setting'  => 'zakra_footer_widgets_enabled',
								'operator' => '===',
								'value'    => true,
							),
						),
					),
				),

				/**
				 * Option: Footer widget background.
				 */
				'zakra_footer_widgets_bg'                       => array(
					'output'  => array(
						array(
							'selector' => '.tg-site-footer',
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
						'type'            => 'background',
						'label'           => esc_html__( 'Background', 'zakra' ),
						'section'         => 'zakra_footer_widgets',
						'choices'         => array(
							'alpha' => true,
						),
						'active_callback' => array(
							array(
								'setting'  => 'zakra_footer_widgets_enabled',
								'operator' => '===',
								'value'    => true,
							),
						),
					),
				),

				/**
				 * Option: Footer Widgets border.
				 */
				'zakra_footer_widgets_border_top_width'         => array(
					'output'  => array(
						array(
							'selector' => '.tg-site-footer .tg-site-footer-widgets',
							'property' => 'border-top-width',
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
						'type'            => 'slider',
						'label'           => esc_html__( 'Border Top', 'zakra' ),
						'section'         => 'zakra_footer_widgets',
						'input_attrs'     => array(
							'min'  => 0,
							'max'  => 20,
							'step' => 1,
						),
						'active_callback' => array(
							array(
								'setting'  => 'zakra_footer_widgets_enabled',
								'operator' => '===',
								'value'    => true,
							),
						),
					),
				),

				/**
				 * Option: Footer border color.
				 */
				'zakra_footer_widgets_border_top_color'         => array(
					'output'  => array(
						array(
							'selector' => '.tg-site-footer .tg-site-footer-widgets',
							'property' => 'border-top-color',
						),
					),
					'setting' => array(
						'default'           => '#e9ecef',
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_alpha_color' ),
					),
					'control' => array(
						'type'            => 'color',
						'label'           => esc_html__( 'Border Top Color', 'zakra' ),
						'section'         => 'zakra_footer_widgets',
						'choices'         => array(
							'alpha' => true,
						),
						'active_callback' => array(
							array(
								'setting'  => 'zakra_footer_widgets_enabled',
								'operator' => '===',
								'value'    => true,
							),
						),
					),
				),

				/**
				 * Option: Hide widgets title.
				 */
				'zakra_footer_widgets_hide_title'               => array(
					'setting' => array(
						'default'           => false,
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'            => 'toggle',
						'label'           => esc_html__( 'Hide Widget Title', 'zakra' ),
						'section'         => 'zakra_footer_widgets',
						'active_callback' => array(
							array(
								'setting'  => 'zakra_footer_widgets_enabled',
								'operator' => '===',
								'value'    => true,
							),
						),
					),
				),

				/**
				 * Option: Widget title color.
				 */
				'zakra_footer_widgets_title_color'              => array(
					'output'  => array(
						array(
							'selector' => '.tg-site-footer .tg-site-footer-widgets .widget-title',
							'property' => 'color',
						),
					),
					'setting' => array(
						'default'           => '#16181a',
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_alpha_color' ),
					),
					'control' => array(
						'type'            => 'color',
						'label'           => esc_html__( 'Widget Title Color', 'zakra' ),
						'section'         => 'zakra_footer_widgets',
						'choices'         => array(
							'alpha' => true,
						),
						'active_callback' => array(
							array(
								'setting'  => 'zakra_footer_widgets_enabled',
								'operator' => '===',
								'value'    => true,
							),
							array(
								'setting'  => 'zakra_footer_widgets_hide_title',
								'operator' => '===',
								'value'    => false,
							),
						),

					),
				),
				/*========================================== FOOTER > FOOTER WIDGETS:STYLING ==========================================*/
				/**
				 * Option: Footer Widgets text color.
				 */
				'zakra_footer_widgets_text_color'               => array(
					'output'  => array(
						array(
							'selector' => '.tg-site-footer .tg-site-footer-widgets',
							'property' => 'color',
						),
					),
					'setting' => array(
						'default'           => '#51585f',
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_alpha_color' ),
					),
					'control' => array(
						'type'            => 'color',
						'label'           => esc_html__( 'Text Color', 'zakra' ),
						'section'         => 'zakra_footer_widgets',
						'choices'         => array(
							'alpha' => true,
						),
						'active_callback' => array(
							array(
								'setting'  => 'zakra_footer_widgets_enabled',
								'operator' => '===',
								'value'    => true,
							),
						),
					),
				),

				/**
				 * Option: Footer Widgets link color.
				 */
				'zakra_footer_widgets_link_color'               => array(
					'output'  => array(
						array(
							'selector' => '.tg-site-footer .tg-site-footer-widgets a',
							'property' => 'color',
						),
					),
					'setting' => array(
						'default'           => '#16181a',
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_alpha_color' ),
					),
					'control' => array(
						'type'            => 'color',
						'label'           => esc_html__( 'Link Color', 'zakra' ),
						'section'         => 'zakra_footer_widgets',
						'choices'         => array(
							'alpha' => true,
						),
						'active_callback' => array(
							array(
								'setting'  => 'zakra_footer_widgets_enabled',
								'operator' => '===',
								'value'    => true,
							),
						),
					),
				),

				/**
				 * Option: Footer Widgets link hover color.
				 */
				'zakra_footer_widgets_link_hover_color'         => array(
					'output'  => array(
						array(
							'selector' => '.tg-site-footer .tg-site-footer-widgets a:hover, .tg-site-footer .tg-site-footer-widgets a:focus',
							'property' => 'color',
						),
					),
					'setting' => array(
						'default'           => '#269bd1',
						'capability'        => 'edit_theme_options',
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_alpha_color' ),
					),
					'control' => array(
						'type'            => 'color',
						'label'           => esc_html__( 'Link Hover Color', 'zakra' ),
						'section'         => 'zakra_footer_widgets',
						'choices'         => array(
							'alpha' => true,
						),
						'active_callback' => array(
							array(
								'setting'  => 'zakra_footer_widgets_enabled',
								'operator' => '===',
								'value'    => true,
							),
						),
					),
				),

				/**
				 * Option: Widget item border.
				 */
				'zakra_footer_widgets_item_border_bottom_width' => array(
					'output'  => array(
						array(
							'selector' => '.tg-site-footer .tg-site-footer-widgets ul li',
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
						'type'            => 'slider',
						'label'           => esc_html__( 'List Item Border Bottom', 'zakra' ),
						'section'         => 'zakra_footer_widgets',
						'input_attrs'     => array(
							'min'  => 0,
							'max'  => 20,
							'step' => 1,
						),
						'active_callback' => array(
							array(
								'setting'  => 'zakra_footer_widgets_enabled',
								'operator' => '===',
								'value'    => true,
							),
						),
					),
				),

				/**
				 * Option: Widget item border color.
				 */
				'zakra_footer_widgets_item_border_bottom_color' => array(
					'output'  => array(
						array(
							'selector' => '.tg-site-footer .tg-site-footer-widgets ul li',
							'property' => 'border-bottom-color',
						),
					),
					'setting' => array(
						'default'           => '#e9ecef',
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_alpha_color' ),
					),
					'control' => array(
						'type'            => 'color',
						'label'           => esc_html__( 'List Item Border Bottom Color', 'zakra' ),
						'section'         => 'zakra_footer_widgets',
						'choices'         => array(
							'alpha' => true,
						),
						'active_callback' => array(
							array(
								'setting'  => 'zakra_footer_widgets_enabled',
								'operator' => '===',
								'value'    => true,
							),
						),
					),
				),

			);

		}

	}

	new Zakra_Customize_Footer_Widget_Option();

endif;
