<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Aiate
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-title">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="title">', '</h1>' );
		else :
			the_title( '<h2 class="title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<?php
		endif; ?>
	</div>

	<div class="post-content">
		<?php if ( has_post_thumbnail() ) : ?>		
			<img src="<?php the_post_thumbnail_url()?>" alt="post-thumbnail">
		<?php endif; ?> 
				
		<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'aiate' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'aiate' ),
				'after'  => '</div>',
			) );
		?>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
