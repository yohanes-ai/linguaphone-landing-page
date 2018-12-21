<?php
/**
 * Show cart contents / total Ajax
 */

function zakra_woocommerce_header_add_to_cart_fragment( $fragments ) {
	ob_start();
	?>

	<a class="cart-page-link" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'zakra' ); ?>">
		<i class="tg-icon tg-icon-shopping-cart"></i>
		<span class="count">
		<?php
		printf(
		/* translators: number of items in the mini cart. */
			'%d',
			WC()->cart->get_cart_contents_count()
		);
		?>
		</span>
	</a>

	<?php
	$fragments['.cart-page-link'] = ob_get_clean();

	return $fragments;
}

add_filter( 'woocommerce_add_to_cart_fragments', 'zakra_woocommerce_header_add_to_cart_fragment' );

if ( ! function_exists( 'zakra_woocommerce_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return string
	 */
	function zakra_woocommerce_cart_link() {

		$output          = '';
		$output          .= '<a class="cart-page-link" href="' . esc_url( wc_get_cart_url() ) . '" title="' . __( 'View your shopping cart', 'zakra' ) . '">';
		$item_count_text = sprintf(
		/* translators: number of items in the mini cart. */
			'%d',
			WC()->cart->get_cart_contents_count()
		);
		$output          .= '<i class="tg-icon tg-icon-shopping-cart"></i>';
		$output          .= '<span class="count">' . esc_html( $item_count_text ) . '</span>';
		$output          .= '</a>';

		return $output;

	}
}
if ( ! function_exists( 'zakra_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return string
	 */
	function zakra_woocommerce_header_cart() {

		$output = '';

		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}

		$output .= '<li class="tg-menu-item tg-menu-item-cart ' . $class . '">';
		$output .= zakra_woocommerce_cart_link();
		$output .= '</li>';

		return $output;

	}
}
