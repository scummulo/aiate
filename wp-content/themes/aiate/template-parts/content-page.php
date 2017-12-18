<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Aiate
 */

?>
<div class="container-fluid">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="page-title">
			<?php the_title( '<h1 class="section-title">', '</h1>' ); ?>
		</div>
		<div class="page-content">
			<?php
				the_content();

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'aiate' ),
					'after'  => '</div>',
				) );
			?>
		</div>
	</article><!-- #post-<?php the_ID(); ?> -->
</div>
