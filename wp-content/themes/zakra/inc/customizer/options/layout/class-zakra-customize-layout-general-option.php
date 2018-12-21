<?php
/**
 * Layout general layout.
 *
 * @package     zakra
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*========================================== LAYOUT > General ==========================================*/
if ( ! class_exists( 'Zakra_Customize_Layout_General_Option' ) ) :

	/**
	 * Layout general option.
	 */
	class Zakra_Customize_Layout_General_Option extends Zakra_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {

			return array(

				/**
				 * Option: Default.
				 */
				'zakra_structure_default' => array(
					'setting' => array(
						'default'           => 'tg-site-layout--default',
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_radio' ),
					),
					'control' => array(
						'type'    => 'radio_image',
						'label'   => esc_html__( 'Default', 'zakra' ),
						'section' => 'zakra_layout_structure',
						'choices' => array(
							'tg-site-layout--default'    => ZAKRA_PARENT_INC_ICON_URI . '/layout-default.png',
							'tg-site-layout--left'       => ZAKRA_PARENT_INC_ICON_URI . '/left-sidebar.png',
							'tg-site-layout--right'      => ZAKRA_PARENT_INC_ICON_URI . '/right-sidebar.png',
							'tg-site-layout--no-sidebar' => ZAKRA_PARENT_INC_ICON_URI . '/full-width.png',
						),
					),
				),

				/**
				 * Option: Blog/Archive.
				 */
				'zakra_structure_archive' => array(
					'setting' => array(
						'default'           => 'tg-site-layout--default',
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_radio' ),
					),
					'control' => array(
						'type'    => 'radio_image',
						'label'   => esc_html__( 'Blog/Archive', 'zakra' ),
						'section' => 'zakra_layout_structure',
						'choices' => array(
							'tg-site-layout--default'    => ZAKRA_PARENT_INC_ICON_URI . '/layout-default.png',
							'tg-site-layout--left'       => ZAKRA_PARENT_INC_ICON_URI . '/left-sidebar.png',
							'tg-site-layout--right'      => ZAKRA_PARENT_INC_ICON_URI . '/right-sidebar.png',
							'tg-site-layout--no-sidebar' => ZAKRA_PARENT_INC_ICON_URI . '/full-width.png',
						),
					),
				),

				/**
				 * Option: Blog post.
				 */
				'zakra_structure_post'    => array(
					'setting' => array(
						'default'           => 'tg-site-layout--default',
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_radio' ),
					),
					'control' => array(
						'type'    => 'radio_image',
						'label'   => esc_html__( 'Single Post', 'zakra' ),
						'section' => 'zakra_layout_structure',
						'choices' => array(
							'tg-site-layout--default'    => ZAKRA_PARENT_INC_ICON_URI . '/layout-default.png',
							'tg-site-layout--left'       => ZAKRA_PARENT_INC_ICON_URI . '/left-sidebar.png',
							'tg-site-layout--right'      => ZAKRA_PARENT_INC_ICON_URI . '/right-sidebar.png',
							'tg-site-layout--no-sidebar' => ZAKRA_PARENT_INC_ICON_URI . '/full-width.png',
						),
					),
				),

				/**
				 * Option: Page.
				 */
				'zakra_structure_page'    => array(
					'setting' => array(
						'default'           => 'tg-site-layout--default',
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_radio' ),
					),
					'control' => array(
						'type'    => 'radio_image',
						'label'   => esc_html__( 'Page', 'zakra' ),
						'section' => 'zakra_layout_structure',
						'choices' => array(
							'tg-site-layout--default'    => ZAKRA_PARENT_INC_ICON_URI . '/layout-default.png',
							'tg-site-layout--left'       => ZAKRA_PARENT_INC_ICON_URI . '/left-sidebar.png',
							'tg-site-layout--right'      => ZAKRA_PARENT_INC_ICON_URI . '/right-sidebar.png',
							'tg-site-layout--no-sidebar' => ZAKRA_PARENT_INC_ICON_URI . '/full-width.png',
						),
					),
				),

			);

		}

	}

	new Zakra_Customize_Layout_General_Option();

endif;
