<?php
/**
 * Primary menu.
 *
 * @package zakra
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*========================================== MENU > PRIMARY MENU ==========================================*/
if ( ! class_exists( 'Zakra_Customize_Primary_Menu_Option' ) ) :

	/**
	 * Primary Menu option.
	 */
	class Zakra_Customize_Primary_Menu_Option extends Zakra_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {

			return array(

				/**
				 * Option: Disable primary menu.
				 */
				'zakra_primary_menu_disabled'            => array(
					'setting' => array(
						'default'           => false,
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'    => 'toggle',
						'label'   => esc_html__( 'Disable Primary Menu', 'zakra' ),
						'section' => 'zakra_primary_menu',
					),
				),

				/**
				 * Option: Menu Item Color.
				 */
				'zakra_primary_menu_text_color'          => array(
					'output'  => array(
						array(
							'selector' => '.tg-primary-menu > div > ul > li > a',
							'property' => 'color',
						),
					),
					'setting' => array(
						'default'           => '#16181a',
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_alpha_color' ),
					),
					'control' => array(
						'type'            => 'color',
						'label'           => esc_html__( 'Menu Item Color', 'zakra' ),
						'section'         => 'zakra_primary_menu',
						'choices'         => array(
							'alpha' => true,
						),
						'active_callback' => array(
							array(
								'setting'  => 'zakra_primary_menu_disabled',
								'operator' => '===',
								'value'    => false,
							),
						),
					),
				),

				/**
				 * Option: Menu Item Hover Color.
				 */
				'zakra_primary_menu_text_hover_color'    => array(
					'output'  => array(
						array(
							'selector' => '.tg-primary-menu > div ul > li:hover > a',
							'property' => 'color',
						),
					),
					'setting' => array(
						'default'           => '#269bd1',
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_alpha_color' ),
					),
					'control' => array(
						'type'            => 'color',
						'label'           => esc_html__( 'Menu Item Hover Color', 'zakra' ),
						'section'         => 'zakra_primary_menu',
						'choices'         => array(
							'alpha' => true,
						),
						'active_callback' => array(
							array(
								'setting'  => 'zakra_primary_menu_disabled',
								'operator' => '===',
								'value'    => false,
							),
						),
					),
				),

				/**
				 * Option: Menu Item Active Color.
				 */
				'zakra_primary_menu_text_active_color'   => array(
					'output'  => array(
						array(
							'selector' => '.tg-primary-menu > div ul li:active > a, .tg-primary-menu > div > ul > li.current_page_item > a, .tg-primary-menu > div > ul > li.current-menu-item > a',
							'property' => 'color',
						),
						array(
							'selector' => '.tg-primary-menu.tg-primary-menu--style-underline > div > ul > li.current_page_item > a::before, .tg-primary-menu.tg-primary-menu--style-underline > div > ul > li.current-menu-item > a::before, .tg-primary-menu.tg-primary-menu--style-left-border > div > ul > li.current_page_item > a::before, .tg-primary-menu.tg-primary-menu--style-left-border > div > ul > li.current-menu-item > a::before, .tg-primary-menu.tg-primary-menu--style-right-border > div > ul > li.current_page_item > a::before, .tg-primary-menu.tg-primary-menu--style-right-border > div > ul > li.current-menu-item > a::before',
							'property' => 'background-color',
						),
					),
					'setting' => array(
						'default'           => '#269bd1',
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_alpha_color' ),
					),
					'control' => array(
						'type'            => 'color',
						'label'           => esc_html__( 'Menu Item Active Color', 'zakra' ),
						'section'         => 'zakra_primary_menu',
						'choices'         => array(
							'alpha' => true,
						),
						'active_callback' => array(
							array(
								'setting'  => 'zakra_primary_menu_disabled',
								'operator' => '===',
								'value'    => false,
							),
						),
					),
				),

				/**
				 * Option: Active Menu Item Style.
				 */
				'zakra_primary_menu_text_active_effect'  => array(
					'setting' => array(
						'default'           => 'tg-primary-menu--style-underline',
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_radio' ),
					),
					'control' => array(
						'type'            => 'select',
						'is_default_type' => true,
						'label'           => esc_html__( 'Active Menu Item Style', 'zakra' ),
						'section'         => 'zakra_primary_menu',
						'choices'         => array(
							'tg-primary-menu--style-none'         => esc_html__( 'None', 'zakra' ),
							'tg-primary-menu--style-underline'    => esc_html__( 'Underline Border', 'zakra' ),
							'tg-primary-menu--style-left-border'  => esc_html__( 'Left Border', 'zakra' ),
							'tg-primary-menu--style-right-border' => esc_html__( 'Right Border', 'zakra' ),
						),
						'active_callback' => array(
							array(
								'setting'  => 'zakra_primary_menu_disabled',
								'operator' => '===',
								'value'    => false,
							),
						),
					),
				),

				/**
				 * Option: Menu border bottom.
				 */
				'zakra_primary_menu_border_bottom_width' => array(
					'output'  => array(
						array(
							'selector' => '.tg-site-header .main-navigation',
							'property' => 'border-bottom-width',
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
						'type'            => 'slider',
						'label'           => esc_html__( 'Border Bottom', 'zakra' ),
						'section'         => 'zakra_primary_menu',
						'input_attrs'     => array(
							'min'  => 0,
							'max'  => 20,
							'step' => 1,
						),
						'active_callback' => array(
							array(
								'setting'  => 'zakra_primary_menu_disabled',
								'operator' => '===',
								'value'    => false,
							),
						),
					),
				),

				/**
				 * Option: Border color.
				 */
				'zakra_primary_menu_border_bottom_color' => array(
					'output'  => array(
						array(
							'selector' => '.tg-site-header .main-navigation',
							'property' => 'border-bottom-color',
						),
					),
					'setting' => array(
						'default'           => '#e9ecef',
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_alpha_color' ),
					),
					'control' => array(
						'type'            => 'color',
						'label'           => esc_html__( 'Border Bottom Color', 'zakra' ),
						'section'         => 'zakra_primary_menu',
						'choices'         => array(
							'alpha' => true,
						),
						'active_callback' => array(
							array(
								'setting'  => 'zakra_primary_menu_disabled',
								'operator' => '===',
								'value'    => false,
							),
						),
					),
				),

			);

		}

	}

	new Zakra_Customize_Primary_Menu_Option();

endif;
