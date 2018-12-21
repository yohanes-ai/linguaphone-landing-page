<?php
/**
 * Link styling.
 *
 * @package     zakra
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*========================================== STYLING > LINK ==========================================*/
if ( ! class_exists( 'Zakra_Customize_Link_Option' ) ) :

	/**
	 * Link option.
	 */
	class Zakra_Customize_Link_Option extends Zakra_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {

			return array(

				/**
				 * Option: Link color.
				 */
				'zakra_link_color'       => array(
					'output'  => array(
						array(
							'selector' => '.entry-content a',
							'property' => 'color',
						),
					),
					'setting' => array(
						'default'           => '#269bd1',
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_alpha_color' ),
					),
					'control' => array(
						'type'    => 'color',
						'label'   => esc_html__( 'Link Color', 'zakra' ),
						'section' => 'zakra_styling_link',
						'choices' => array(
							'alpha' => true,
						),
					),
				),

				/**
				 * Option: Link hover color.
				 */
				'zakra_link_hover_color' => array(
					'output'  => array(
						array(
							'selector' => '.entry-content a:hover, a:focus',
							'property' => 'color',
						),
					),
					'setting' => array(
						'default'           => '#1e7ba6',
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_alpha_color' ),
					),
					'control' => array(
						'type'    => 'color',
						'label'   => esc_html__( 'Link Hover Color', 'zakra' ),
						'section' => 'zakra_styling_link',
						'choices' => array(
							'alpha' => true,
						),
					),
				),

			);

		}

	}

	new Zakra_Customize_Link_Option();

endif;
