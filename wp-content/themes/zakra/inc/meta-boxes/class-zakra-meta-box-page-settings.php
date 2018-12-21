<?php
/**
 * Page Settings meta box class.
 *
 * @package zakra
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class Zakra_Meta_Box_Page_Settings
 */
class Zakra_Meta_Box_Page_Settings {

	/**
	 * Meta box render content callback.
	 *
	 * @param WP_Post $post Current post object.
	 */
	public static function render( $post ) {
		// Add nonce for security and authentication.
		wp_nonce_field( 'zakra_nonce_action', 'zakra_meta_nonce' );

		$zakra_layout = get_post_meta( get_the_ID(), 'zakra_layout' );
		$zakra_layout = isset( $zakra_layout[0] ) ? $zakra_layout[0] : 'tg-site-layout--customizer';

		$zakra_remove_content_margin = get_post_meta( get_the_ID(), 'zakra_remove_content_margin' );
		$zakra_remove_content_margin = isset( $zakra_remove_content_margin[0] ) ? $zakra_remove_content_margin[0] : 0;

		$zakra_sidebar = get_post_meta( get_the_ID(), 'zakra_sidebar' );
		$zakra_sidebar = isset( $zakra_sidebar[0] ) ? $zakra_sidebar[0] : 'default';

		$zakra_transparent_header = get_post_meta( get_the_ID(), 'zakra_transparent_header' );
		$zakra_transparent_header = isset( $zakra_transparent_header[0] ) ? $zakra_transparent_header[0] : 0;

		$zakra_page_header = get_post_meta( get_the_ID(), 'zakra_page_header' );
		$zakra_page_header = isset( $zakra_page_header[0] ) ? $zakra_page_header[0] : 1;

		$zakra_header_style = get_post_meta( get_the_ID(), 'zakra_header_style' );
		$zakra_header_style = isset( $zakra_header_style[0] ) ? $zakra_header_style[0] : 'default';

		$zakra_menu_item_color = get_post_meta( get_the_ID(), 'zakra_menu_item_color' );
		$zakra_menu_item_color = isset( $zakra_menu_item_color[0] ) ? $zakra_menu_item_color[0] : '';

		$zakra_menu_item_hover_color = get_post_meta( get_the_ID(), 'zakra_menu_item_hover_color' );
		$zakra_menu_item_hover_color = isset( $zakra_menu_item_hover_color[0] ) ? $zakra_menu_item_hover_color[0] : '';

		$zakra_menu_item_active_color = get_post_meta( get_the_ID(), 'zakra_menu_item_active_color' );
		$zakra_menu_item_active_color = isset( $zakra_menu_item_active_color[0] ) ? $zakra_menu_item_active_color[0] : '';

		$zakra_menu_item_active_style = get_post_meta( get_the_ID(), 'zakra_menu_item_active_style' );
		$zakra_menu_item_active_style = isset( $zakra_menu_item_active_style[0] ) ? $zakra_menu_item_active_style[0] : '';

		/**
		 * Logo.
		 */
		global $post;

		// Get WordPress' media upload URL
		$upload_link = esc_url( get_upload_iframe_src( 'image', $post->ID ) );

		$zakra_logo = get_post_meta( $post->ID, 'zakra_logo', true );

		$img_src = wp_get_attachment_image_src( $zakra_logo, 'full' );

		$has_img = is_array( $img_src );
		?>
		<div id="page-settings-tabs-wrapper">
			<ul class="zakra-ui-nav">
				<?php
				$page_setting = apply_filters( 'zakra_page_setting', array(
					'general'      => array(
						'label'  => __( 'General', 'zakra' ),
						'target' => 'page-settings-general',
						'class'  => array(),
					),
					'header'       => array(
						'label'  => __( 'Header', 'zakra' ),
						'target' => 'page-settings-header',
						'class'  => array(),
					),
					'primary_menu' => array(
						'label'  => __( 'Primary Menu', 'zakra' ),
						'target' => 'page-settings-primary-menu',
						'class'  => array(),
					),
					'page-header'  => array(
						'label'  => __( 'Page Header', 'zakra' ),
						'target' => 'page-settings-page-header',
						'class'  => array(),
					),
				) );

				foreach ( $page_setting as $key => $tab ) {
					?>
					<li>
						<a href="#<?php echo esc_html( $tab['target'] ); ?>"><?php echo esc_html( $tab['label'] ); ?></a>
					</li>
					<?php
				}

				?>
			</ul><!-- /.zakra-ui-nav -->
			<div class="zakra-ui-content">
				<!-- GENERAL -->
				<div id="page-settings-general">

					<!-- LAYOUT -->
					<div class="options-group">
						<div class="zakra-ui-desc">
							<label><?php esc_html_e( 'Layout', 'zakra' ); ?></label>
						</div>

						<div class="zakra-ui-field">
							<label class="tg-label">
								<input type="radio" name="zakra_layout"
									   value="tg-site-layout--customizer" <?php checked( $zakra_layout, 'tg-site-layout--customizer' ); ?> />
								<img src="<?php echo ZAKRA_PARENT_URI . '/assets/img/icons/customizer.png' ?>"/>
							</label>
							<label class="tg-label">
								<input type="radio" name="zakra_layout"
									   value="tg-site-layout--default" <?php checked( $zakra_layout, 'tg-site-layout--default' ); ?> />
								<img src="<?php echo ZAKRA_PARENT_URI . '/assets/img/icons/layout-default.png' ?>"/>
							</label>
							<label class="tg-label">
								<input type="radio" name="zakra_layout"
									   value="tg-site-layout--left" <?php checked( $zakra_layout, 'tg-site-layout--left' ); ?> />
								<img src="<?php echo ZAKRA_PARENT_URI . '/assets/img/icons/left-sidebar.png' ?>"/>
							</label>
							<label class="tg-label">
								<input type="radio" name="zakra_layout"
									   value="tg-site-layout--right" <?php checked( $zakra_layout, 'tg-site-layout--right' ); ?> />
								<img src="<?php echo ZAKRA_PARENT_URI . '/assets/img/icons/right-sidebar.png' ?>"/>
							</label>
							<label class="tg-label">
								<input type="radio" name="zakra_layout"
									   value="tg-site-layout--no-sidebar" <?php checked( $zakra_layout, 'tg-site-layout--no-sidebar' ); ?> />
								<img src="<?php echo ZAKRA_PARENT_URI . '/assets/img/icons/full-width.png' ?>"/>
							</label>
						</div>
					</div>

					<!-- CONTENT MARGIN -->
					<div class="options-group">
						<div class="zakra-ui-desc">
							<label for="zakra-content-margin"><?php esc_html_e( 'Remove content margin', 'zakra' ); ?></label>
						</div>
						<div class="zakra-ui-field">
							<input type="checkbox"
								   id="zakra-content-margin"
								   name="zakra_remove_content_margin"
								   value="1" <?php checked( $zakra_remove_content_margin, 1 ); ?>>
						</div>
					</div>

					<!-- SIDEBAR -->
					<div class="options-group">
						<div class="zakra-ui-desc">
							<label for="zakra-sidebar"><?php esc_html_e( 'Sidebar', 'zakra' ); ?></label>
						</div>
						<div class="zakra-ui-field">
							<select name="zakra_sidebar" id="zakra-sidebar">
								<option value="default" <?php selected( $zakra_sidebar, 'default' ); ?>><?php esc_html_e( 'Default', 'zakra' ); ?></option>
								<option value="sidebar-right" <?php selected( $zakra_sidebar, 'sidebar-right' ); ?>><?php esc_html_e( 'Sidebar Right', 'zakra' ); ?></option>
								<option value="sidebar-left" <?php selected( $zakra_sidebar, 'sidebar-left' ); ?>><?php esc_html_e( 'Sidebar Left', 'zakra' ); ?></option>
								<option value="footer-sidebar-1" <?php selected( $zakra_sidebar, 'footer-sidebar-1' ); ?>><?php esc_html_e( 'Footer One', 'zakra' ); ?></option>
								<option value="footer-sidebar-2" <?php selected( $zakra_sidebar, 'footer-sidebar-2' ); ?>><?php esc_html_e( 'Footer Two', 'zakra' ); ?></option>
								<option value="footer-sidebar-3" <?php selected( $zakra_sidebar, 'footer-sidebar-3' ); ?>><?php esc_html_e( 'Footer Three', 'zakra' ); ?></option>
								<option value="footer-sidebar-4" <?php selected( $zakra_sidebar, 'footer-sidebar-4' ); ?>><?php esc_html_e( 'Footer Four', 'zakra' ); ?></option>
							</select>
						</div>
					</div>
				</div>
				<!-- HEADER -->
				<div id="page-settings-header">
					<!-- TRANSPARENT HEADER -->
					<div class="options-group">
						<div class="zakra-ui-desc">
							<label for="zakra-transparent-header"><?php esc_html_e( 'Enable Transparent Header', 'zakra' ); ?></label>
						</div>
						<div class="zakra-ui-field">
							<input type="checkbox"
								   id="zakra-transparent-header"
								   name="zakra_transparent_header"
								   value="1" <?php checked( $zakra_transparent_header, 1 ); ?>>
						</div>
					</div>

					<!-- LOGO -->
					<div class="options-group">
						<div class="zakra-ui-desc">
							<label for="tg-logo"><?php esc_html_e( 'Logo', 'zakra' ); ?></label>
						</div>
						<div class="zakra-ui-field" id="tg-logo-wrapper">

							<div class="tg-logo-holder">
								<?php if ( $has_img ) : ?>
									<img src="<?php echo $img_src[0] ?>" style="max-width:100%;"/>
								<?php endif; ?>
							</div>

							<p class="hide-if-no-js">
								<a class="upload-custom-img <?php if ( $has_img ) {
									echo 'hidden';
								} ?>"
								   href="<?php echo $upload_link ?>">
									<?php esc_html_e( 'Upload Logo', 'zakra' ) ?>
								</a>
								<a class="delete-custom-img <?php if ( ! $has_img ) {
									echo 'hidden';
								} ?>"
								   href="#">
									<?php esc_html_e( 'Remove Logo', 'zakra' ) ?>
								</a>
							</p>

							<input id="tg-logo" name="zakra_logo" type="hidden"
								   value="<?php echo esc_attr( $zakra_logo ); ?>"/>
						</div>
					</div>

					<!-- STYLE -->
					<div class="options-group">
						<div class="zakra-ui-desc">
							<label for="zakra-header-style"><?php esc_html_e( 'Style', 'zakra' ); ?></label>
						</div>
						<div class="zakra-ui-field">
							<label class="tg-label">
								<input type="radio" name="zakra_header_style"
									   value="default" <?php checked( $zakra_header_style, 'default' ); ?> />
								<img src="<?php echo ZAKRA_PARENT_URI . '/assets/img/icons/customizer.png' ?>"
									 title="From Customizer"/>
							</label>
							<label class="tg-label">
								<input type="radio" name="zakra_header_style"
									   value="tg-site-header--left" <?php checked( $zakra_header_style, 'tg-site-header--left' ); ?> />
								<img src="<?php echo ZAKRA_PARENT_URI . '/assets/img/icons/header-left.png' ?>"
									 title="Header Left"/>
							</label>
							<label class="tg-label">
								<input type="radio" name="zakra_header_style"
									   value="tg-site-header--center" <?php checked( $zakra_header_style, 'tg-site-header--center' ); ?> />
								<img src="<?php echo ZAKRA_PARENT_URI . '/assets/img/icons/header-center.png' ?>"
									 title="Header Center"/>
							</label>
							<label class="tg-label">
								<input type="radio" name="zakra_header_style"
									   value="tg-site-header--right" <?php checked( $zakra_header_style, 'tg-site-header--right' ); ?> />
								<img src="<?php echo ZAKRA_PARENT_URI . '/assets/img/icons/header-right.png' ?>"
									 title="Header Right"/>
							</label>
						</div>
					</div>
				</div>

				<!-- PRIMARY MENU -->
				<div id="page-settings-primary-menu">

					<!-- MENU ITEM COLOR -->
					<div class="options-group">
						<div class="zakra-ui-desc">
							<label for="zakra-menu-item-color"><?php esc_html_e( 'Menu Item Color', 'zakra' ); ?></label>
						</div>
						<div class="zakra-ui-field">
							<input class="tg-color-picker" type="text" name="zakra_menu_item_color"
								   id="zakra-menu-item-color"
								   value="<?php echo esc_attr( $zakra_menu_item_color ); ?>"/>
						</div>
					</div>

					<!-- MENU ITEM HOVER COLOR -->
					<div class="options-group">
						<div class="zakra-ui-desc">
							<label for="zakra-menu-item-hover-color"><?php esc_html_e( 'Menu Item Hover Color', 'zakra' ); ?></label>
						</div>
						<div class="zakra-ui-field">
							<input class="tg-color-picker" type="text" name="zakra_menu_item_hover_color"
								   id="zakra-menu-item-hover-color"
								   value="<?php echo esc_attr( $zakra_menu_item_hover_color ); ?>"/>
						</div>
					</div>

					<!-- MENU ITEM ACTIVE COLOR -->
					<div class="options-group">
						<div class="zakra-ui-desc">
							<label for="zakra-menu-item-active-color"><?php esc_html_e( 'Menu Item Active Color', 'zakra' ); ?></label>
						</div>
						<div class="zakra-ui-field">
							<input class="tg-color-picker" type="text" name="zakra_menu_item_active_color"
								   id="zakra-menu-item-active-color"
								   value="<?php echo esc_attr( $zakra_menu_item_active_color ); ?>"/>
						</div>
					</div>

					<!-- ACTIVE MENU ITEM STYLE -->
					<div class="options-group">
						<div class="zakra-ui-desc">
							<label for="zakra-menu_item_active_style"><?php esc_html_e( 'Active Menu Item Style', 'zakra' ); ?></label>
						</div>
						<div class="zakra-ui-field">
							<select name="zakra_menu_item_active_style" id="zakra-menu-item-active-style">
								<option value="" <?php selected( $zakra_menu_item_active_style, '' ); ?>><?php esc_html_e( 'Default', 'zakra' ); ?></option>
								<option value="tg-primary-menu--style-none" <?php selected( $zakra_menu_item_active_style, 'tg-primary-menu--style-none' ); ?>><?php esc_html_e( 'None', 'zakra' ); ?></option>
								<option value="tg-primary-menu--style-underline" <?php selected( $zakra_menu_item_active_style, 'tg-primary-menu--style-underline' ); ?>><?php esc_html_e( 'Underline Border', 'zakra' ); ?></option>
								<option value="tg-primary-menu--style-left-border" <?php selected( $zakra_menu_item_active_style, 'tg-primary-menu--style-left-border' ); ?>><?php esc_html_e( 'Left Border', 'zakra' ); ?></option>
								<option value="tg-primary-menu--style-right-border" <?php selected( $zakra_menu_item_active_style, 'tg-primary-menu--style-right-border' ); ?>><?php esc_html_e( 'Right Border', 'zakra' ); ?></option>
							</select>
						</div>
					</div>

				</div>

				<!-- PAGE HEADER -->
				<div id="page-settings-page-header">

					<!-- ENABLE PAGE HEADER -->
					<div class="options-group">
						<div class="zakra-ui-desc">
							<label for="zakra-page-header"><?php esc_html_e( 'Enable Page Header', 'zakra' ); ?></label>
						</div>
						<div class="zakra-ui-field">
							<input type="checkbox"
								   id="zakra-page-header"
								   name="zakra_page_header"
								   value="1" <?php checked( $zakra_page_header, 1 ); ?>>
						</div>
					</div>

				</div>

			</div>
			<!-- /.zakra-content -->
			<div class="clear"></div>
		</div>

		<?php
	}

	/**
	 * Save meta box content.
	 *
	 * @param int $post_id Post ID.
	 */
	public static function save( $post_id ) {

		$layout                 = isset( $_POST['zakra_layout'] ) ? sanitize_key( $_POST['zakra_layout'] ) : 'default'; // WPCS: CSRF ok.
		$remove_content_margin  = ( isset( $_POST['zakra_remove_content_margin'] ) && '1' === $_POST['zakra_remove_content_margin'] ) ? 1 : 0; // WPCS: CSRF ok.
		$sidebar                = isset( $_POST['zakra_sidebar'] ) ? sanitize_key( $_POST['zakra_sidebar'] ) : 'default'; // WPCS: CSRF ok.
		$transparent_header     = ( isset( $_POST['zakra_transparent_header'] ) && '1' === $_POST['zakra_transparent_header'] ) ? 1 : 0; // WPCS: CSRF ok.
		$menu_item_color        = isset( $_POST['zakra_menu_item_color'] ) ? $_POST['zakra_menu_item_color'] : ''; // WPCS: CSRF ok.
		$menu_item_hover_color  = isset( $_POST['zakra_menu_item_hover_color'] ) ? $_POST['zakra_menu_item_hover_color'] : ''; // WPCS: CSRF ok.
		$menu_item_active_color = isset( $_POST['zakra_menu_item_active_color'] ) ? $_POST['zakra_menu_item_active_color'] : ''; // WPCS: CSRF ok.
		$menu_item_active_style = isset( $_POST['zakra_menu_item_active_style'] ) ? sanitize_key( $_POST['zakra_menu_item_active_style'] ) : ''; // WPCS: CSRF ok.
		$page_header            = ( isset( $_POST['zakra_page_header'] ) && '1' === $_POST['zakra_page_header'] ) ? 1 : 0; // WPCS: CSRF ok.
		$logo                   = ( isset( $_POST['zakra_logo'] ) ) ? intval( $_POST['zakra_logo'] ) : ''; // WPCS: CSRF ok.
		$header_style           = isset( $_POST['zakra_header_style'] ) ? sanitize_key( $_POST['zakra_header_style'] ) : 'default'; // WPCS: CSRF ok.

		// LAYOUT.
		if ( in_array( $layout, array(
			'tg-site-layout--customizer',
			'tg-site-layout--default',
			'tg-site-layout--left',
			'tg-site-layout--right',
			'tg-site-layout--no-sidebar'
		), true ) ) {
			update_post_meta( $post_id, 'zakra_layout', $layout );
		} else {
			delete_post_meta( $post_id, 'zakra_layout' );
		}

		// CONTENT MARGIN.
		update_post_meta( $post_id, 'zakra_remove_content_margin', $remove_content_margin );

		// SIDEBAR.
		if ( in_array( $sidebar, array(
			'sidebar-right',
			'sidebar-left',
			'footer-sidebar-1',
			'footer-sidebar-2',
			'footer-sidebar-3',
			'footer-sidebar-4'
		), true ) ) {
			update_post_meta( $post_id, 'zakra_sidebar', $sidebar );
		} else {
			delete_post_meta( $post_id, 'zakra_sidebar' );
		}

		// TRANSPARENT HEADER.
		update_post_meta( $post_id, 'zakra_transparent_header', $transparent_header );

		// MENU ITEM COLOR.
		update_post_meta( $post_id, 'zakra_menu_item_color', $menu_item_color );

		// MENU ITEM HOVER COLOR.
		update_post_meta( $post_id, 'zakra_menu_item_hover_color', $menu_item_hover_color );

		// MENU ITEM ACTIVE COLOR.
		update_post_meta( $post_id, 'zakra_menu_item_active_color', $menu_item_active_color );

		// ACTIVE MENU ITEM STYLE.
		if ( in_array( $menu_item_active_style, array(
			'tg-primary-menu--style-none',
			'tg-primary-menu--style-underline',
			'tg-primary-menu--style-left-border',
			'tg-primary-menu--style-right-border',
		), true ) ) {
			update_post_meta( $post_id, 'zakra_menu_item_active_style', $menu_item_active_style );
		} else {
			delete_post_meta( $post_id, 'zakra_menu_item_active_style' );
		}

		// PAGE HEADER.
		update_post_meta( $post_id, 'zakra_page_header', $page_header );

		// LOGO.
		update_post_meta( $post_id, 'zakra_logo', $logo );

		// HEADER STYLE.
		if ( in_array( $header_style, array(
			'tg-site-header--left',
			'tg-site-header--center',
			'tg-site-header--right'
		), true ) ) {
			update_post_meta( $post_id, 'zakra_header_style', $header_style );
		} else {
			delete_post_meta( $post_id, 'zakra_header_style' );
		}

	}

}
