<?php
/**
 * Archive/ blog layout.
 *
 * @package     zakra
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*========================================== POST/PAGE/BLOG > ARCHIVE/ BLOG ==========================================*/
if ( ! class_exists( 'Zakra_Customize_Blog_Archive_Option' ) ) :

	/**
	 * Archive/Blog option.
	 */
	class Zakra_Customize_Blog_Archive_Option extends Zakra_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {

			return array(

				/**
				 * Option: Post Content Order.
				 */
				'zakra_structure_archive_blog'        => array(
					'setting' => array(
						'default'           => array(
							'featured_image',
							'title',
							'meta',
							'content',
						),
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_sortable' ),
					),
					'control' => array(
						'type'        => 'sortable',
						'label'       => esc_html__( 'Post Content Order', 'zakra' ),
						'description' => esc_html__( 'Drag & Drop items to re-arrange the order', 'zakra' ),
						'section'     => 'zakra_archive_blog',
						'choices'     => array(
							'featured_image' => esc_attr__( 'Featured Image', 'zakra' ),
							'title'          => esc_attr__( 'Title', 'zakra' ),
							'meta'           => esc_attr__( 'Meta Tags', 'zakra' ),
							'content'        => esc_attr__( 'Content', 'zakra' ),
						),
					),
				),

				/**
				 * Option: Meta Tags Order.
				 */
				'zakra_meta_structure_archive_blog'   => array(
					'setting' => array(
						'default'           => array(
							'comments',
							'categories',
							'author',
							'date',
							'tags',
						),
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_sortable' ),
					),
					'control' => array(
						'type'        => 'sortable',
						'label'       => esc_html__( 'Meta Tags Order', 'zakra' ),
						'description' => esc_html__( 'Drag & Drop items to re-arrange the order', 'zakra' ),
						'section'     => 'zakra_archive_blog',
						'choices'     => array(
							'comments'   => esc_attr__( 'Comments', 'zakra' ),
							'categories' => esc_attr__( 'Categories', 'zakra' ),
							'author'     => esc_attr__( 'Author', 'zakra' ),
							'date'       => esc_attr__( 'Date', 'zakra' ),
							'tags'       => esc_attr__( 'Tags', 'zakra' ),
						),
					),
				),

				/**
				 * Option:  Post content.
				 */
				'zakra_post_content_archive_blog'     => array(
					'setting' => array(
						'default'           => 'excerpt',
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_radio' ),
					),
					'control' => array(
						'type'            => 'radio',
						'is_default_type' => true,
						'label'           => esc_html__( 'Post Content', 'zakra' ),
						'section'         => 'zakra_archive_blog',
						'choices'         => array(
							'excerpt' => esc_html__( 'Excerpt', 'zakra' ),
							'content' => esc_html__( 'Content', 'zakra' ),
						),
					),
				),

				/**
				 * Option: Disable read more.
				 */
				'zakra_enable_read_more_archive_blog' => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'            => 'toggle',
						'label'           => esc_html__( 'Enable Read More', 'zakra' ),
						'section'         => 'zakra_archive_blog',
						'active_callback' => array(
							array(
								'setting'  => 'zakra_post_content_archive_blog',
								'operator' => '===',
								'value'    => 'excerpt',
							),
						)
					),
				),

				/**
				 * Option: Read more alignment.
				 */
				'zakra_read_more_align_archive_blog'  => array(
					'setting' => array(
						'default'           => 'left',
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_radio' ),
					),
					'control' => array(
						'type'            => 'radio_image',
						'label'           => esc_html__( 'Read More Style', 'zakra' ),
						'section'         => 'zakra_archive_blog',
						'choices'         => array(
							'left'  => ZAKRA_PARENT_INC_ICON_URI . '/read-more-left.png',
							'right' => ZAKRA_PARENT_INC_ICON_URI . '/read-more-right.png',
						),
						'active_callback' => array(
							array(
								'setting'  => 'zakra_post_content_archive_blog',
								'operator' => '===',
								'value'    => 'excerpt',
							),
							array(
								'setting'  => 'zakra_enable_read_more_archive_blog',
								'operator' => '===',
								'value'    => true,
							),
						),
					),
				),

			);

		}

	}

	new Zakra_Customize_Blog_Archive_Option();

endif;
