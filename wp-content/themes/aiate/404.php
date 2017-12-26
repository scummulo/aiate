<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Aiate
 */

get_header(); ?>

<div class="container-fluid">
	<div class="page error-404 not-found">
		<div class="page-title">
			<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'aiate' ); ?></h1>
		</div>

		<div class="page-content">
			<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'aiate' ); ?>
		</p>

		</div><!-- .page-content -->
	</div><!-- .error-404 -->
</div>

<?php
get_footer();
