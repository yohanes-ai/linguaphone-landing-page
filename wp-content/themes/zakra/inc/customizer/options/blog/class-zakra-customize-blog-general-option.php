<?php
/**
 * General settings for Post/Page/Blog/Archive.
 *
 * @package     zakra
 */

defined( 'ABSPATH' ) || exit;

/*========================================== POST/PAGE/BLOG > General ==========================================*/
if ( ! class_exists( 'Zakra_Customize_Blog_General_Option' ) ) :

	/**
	 * Archive/Blog option.
	 */
	class Zakra_Customize_Blog_General_Option extends Zakra_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {

			return array(

				'zakra_page_title_heading'     => array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
						'label'   => esc_html__( 'Page Title', 'zakra' ),
						'section' => 'zakra_blog_general',
					),
				),

				/**
				 * Option: Enable page title.
				 */
				'zakra_page_title_enabled'     => array(
					'setting' => array(
						'default'           => 'page-header',
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_radio' ),
					),
					'control' => array(
						'type'            => 'radio',
						'is_default_type' => true,
						'label'           => esc_html__( 'Enable Page Title', 'zakra' ),
						'section'         => 'zakra_blog_general',
						'choices'         => array(
							'page-header'  => esc_html__( 'Page Header', 'zakra' ),
							'content-area' => esc_html__( 'Content Area', 'zakra' ),
						),
					),
				),

				/**
				 * Option: Markup.
				 */
				'zakra_page_title_markup'      => array(
					'setting' => array(
						'default' => 'h1',
					),
					'control' => array(
						'type'            => 'select',
						'is_default_type' => true,
						'label'           => esc_html__( 'Markup', 'zakra' ),
						'section'         => 'zakra_blog_general',
						'choices'         => array(
							'h1'   => esc_html__( 'Heading 1', 'zakra' ),
							'h2'   => esc_html__( 'Heading 2', 'zakra' ),
							'h3'   => esc_html__( 'Heading 3', 'zakra' ),
							'h4'   => esc_html__( 'Heading 4', 'zakra' ),
							'h5'   => esc_html__( 'Heading 5', 'zakra' ),
							'h6'   => esc_html__( 'Heading 6', 'zakra' ),
							'span' => esc_html__( 'Span', 'zakra' ),
							'p'    => esc_html__( 'Paragraph', 'zakra' ),
							'div'  => esc_html__( 'Div', 'zakra' ),
						),
						'active_callback' => array(
							array(
								'setting'  => 'zakra_page_title_enabled',
								'value'    => true,
								'operator' => '==',
							),
						),
					),
				),

				/**
				 * Option: Text color.
				 */
				'zakra_page_header_text_color' => array(
					'output'  => array(
						array(
							'selector' => '.tg-page-header .tg-page-header__title',
							'property' => 'color',
						),
					),
					'setting' => array(
						'default'           => '#16181a',
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_alpha_color' ),
					),
					'control' => array(
						'type'            => 'color',
						'label'           => esc_html__( 'Text Color', 'zakra' ),
						'section'         => 'zakra_blog_general',
						'choices'         => array(
							'alpha' => true,
						),
						'active_callback' => array(
							array(
								'setting'  => 'zakra_page_title_enabled',
								'value'    => true,
								'operator' => '==',
							),
						),
					),
				),

				/**
				 * Option: Font size.
				 */
				'zakra_page_title_font_size'   => array(
					'output'  => array(
						array(
							'selector' => '.tg-page-header .tg-page-header__title',
							'property' => 'font-size',
						),
					),
					'setting' => array(
						'default'           => array(
							'slider' => 18,
							'suffix' => 'px',
						),
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_slider' ),
					),
					'control' => array(
						'type'            => 'slider',
						'label'           => esc_html__( 'Font Size', 'zakra' ),
						'section'         => 'zakra_blog_general',
						'input_attrs'     => array(
							'min'  => 12,
							'max'  => 90,
							'step' => 1,
						),
						'active_callback' => array(
							array(
								'setting'  => 'zakra_page_title_enabled',
								'value'    => true,
								'operator' => '==',
							),
						),
					),
				),

				/**
				 * Option: Text alignment.
				 */
				'zakra_page_title_alignment'   => array(
					'setting' => array(
						'default'           => 'tg-page-header--left-right',
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_radio' ),
					),
					'control' => array(
						'type'    => 'radio_image',
						'label'   => esc_html__( 'Alignment', 'zakra' ),
						'section' => 'zakra_blog_general',
						'choices' => array(
							'tg-page-header--left-right'  => ZAKRA_PARENT_INC_ICON_URI . '/breadcrumb-right.png',
							'tg-page-header--right-left'  => ZAKRA_PARENT_INC_ICON_URI . '/breadcrumb-left.png',
							'tg-page-header--both-center' => ZAKRA_PARENT_INC_ICON_URI . '/breadcrumb-center.png',
							'tg-page-header--both-left'   => ZAKRA_PARENT_INC_ICON_URI . '/both-on-left.png',
							'tg-page-header--both-right'  => ZAKRA_PARENT_INC_ICON_URI . '/both-on-right.png',
						),

					),
				),

				/**
				 * Option: Padding.
				 */
				'zakra_page_title_padding'     => array(
					'output'  => array(
						array(
							'selector' => '.tg-page-header',
							'property' => 'padding',
						),
					),
					'setting' => array(
						'default'           => array(
							'top'    => '20px',
							'right'  => '0px',
							'bottom' => '20px',
							'left'   => '0px',
						),
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_dimensions' ),
					),
					'control' => array(
						'type'            => 'dimensions',
						'label'           => esc_html__( 'Padding', 'zakra' ),
						'section'         => 'zakra_blog_general',
						'input_attrs'     => array(
							'min'  => 0,
							'step' => 1,
						),
						'active_callback' => array(
							array(
								'setting'  => 'zakra_page_title_enabled',
								'value'    => true,
								'operator' => '==',
							),
						),
					),
				),

				/**
				 * Option: Background.
				 */
				'zakra_page_title_bg'          => array(
					'output'  => array(
						array(
							'selector' => '.tg-page-header',
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
						'section'         => 'zakra_blog_general',
						'active_callback' => array(
							array(
								'setting'  => 'zakra_page_title_enabled',
								'value'    => true,
								'operator' => '==',
							),
						),
					),
				),

				'zakra_breadcrumbs_heading'          => array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
						'label'   => esc_html__( 'Breadcrumbs', 'zakra' ),
						'section' => 'zakra_blog_general',
					),
				),

				/**
				 * Option: Enable breadcrumbs.
				 */
				'zakra_breadcrumbs_enabled'          => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'    => 'toggle',
						'label'   => esc_html__( 'Enable Breadcrumbs', 'zakra' ),
						'section' => 'zakra_blog_general',
					),
				),

				/**
				 * Option: Font size.
				 */
				'zakra_breadcrumbs_font_size'        => array(
					'output'  => array(
						array(
							'selector' => '.tg-page-header .breadcrumb-trail ul li',
							'property' => 'font-size',
						),
					),
					'setting' => array(
						'default'           => array(
							'slider' => 16,
							'suffix' => 'px',
						),
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_slider' ),
					),
					'control' => array(
						'type'            => 'slider',
						'label'           => esc_html__( 'Font Size', 'zakra' ),
						'section'         => 'zakra_blog_general',
						'input_attrs'     => array(
							'min'  => 8,
							'max'  => 26,
							'step' => 1,
						),
						'active_callback' => array(
							array(
								'setting'  => 'zakra_breadcrumbs_enabled',
								'operator' => '===',
								'value'    => true,
							),
						),
					),
				),

				/**
				 * Option: Text color.
				 */
				'zakra_breadcrumbs_text_color'       => array(
					'output'  => array(
						array(
							'selector' => '.tg-page-header .breadcrumb-trail ul li',
							'property' => 'color',
						),
					),
					'setting' => array(
						'default'           => '#16181a',
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_alpha_color' ),
					),
					'control' => array(
						'type'            => 'color',
						'label'           => esc_html__( 'Text Color', 'zakra' ),
						'section'         => 'zakra_blog_general',
						'choices'         => array(
							'alpha' => true,
						),
						'active_callback' => array(
							array(
								'setting'  => 'zakra_breadcrumbs_enabled',
								'operator' => '===',
								'value'    => true,
							),
						),
					),
				),

				/**
				 * Option: Separator color.
				 */
				'zakra_breadcrumbs_seperator_color'  => array(
					'output'  => array(
						array(
							'selector' => '.tg-page-header .breadcrumb-trail ul li::after',
							'property' => 'color',
						),
					),
					'setting' => array(
						'default'           => '#51585f',
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_alpha_color' ),
					),
					'control' => array(
						'type'            => 'color',
						'label'           => esc_html__( 'Separator Color', 'zakra' ),
						'section'         => 'zakra_blog_general',
						'choices'         => array(
							'alpha' => true,
						),
						'active_callback' => array(
							array(
								'setting'  => 'zakra_breadcrumbs_enabled',
								'operator' => '===',
								'value'    => true,
							),
						),
					),
				),

				/**
				 * Option: Link color.
				 */
				'zakra_breadcrumbs_link_color'       => array(
					'output'  => array(
						array(
							'selector' => '.tg-page-header .breadcrumb-trail ul li a',
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
						'section'         => 'zakra_blog_general',
						'choices'         => array(
							'alpha' => true,
						),
						'active_callback' => array(
							array(
								'setting'  => 'zakra_breadcrumbs_enabled',
								'operator' => '===',
								'value'    => true,
							),
						),
					),
				),

				/**
				 * Option: Link hover color.
				 */
				'zakra_breadcrumbs_link_hover_color' => array(
					'output'  => array(
						array(
							'selector' => '.tg-page-header .breadcrumb-trail ul li a:hover ',
							'property' => 'color',
						),
					),
					'setting' => array(
						'default'           => '#269bd1',
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_alpha_color' ),
					),
					'control' => array(
						'type'            => 'color',
						'label'           => esc_html__( 'Link Hover Color', 'zakra' ),
						'section'         => 'zakra_blog_general',
						'choices'         => array(
							'alpha' => true,
						),
						'active_callback' => array(
							array(
								'setting'  => 'zakra_breadcrumbs_enabled',
								'operator' => '===',
								'value'    => true,
							),
						),
					),
				),

			);

		}

	}

	new Zakra_Customize_Blog_General_Option();

endif;
