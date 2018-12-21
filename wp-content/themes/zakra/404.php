<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package zakra
 */

get_header();
?>

	<div id="primary" class="content-area">

			<section class="error-404 not-found">
				<header class="page-header">
					<?php zakra_entry_title(); ?>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'zakra' ); ?></p>

					<?php
					get_search_form();
					?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

	</div><!-- #primary -->

<?php
get_footer();
