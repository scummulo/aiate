<?php
/**
 * The template for displaying all single posts
 * 
 * @package Aiate
 */

get_header(); ?>

	<div class="container-fluid">
		<div class="single-post">
			<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', get_post_type() );

					// // If comments are open or we have at least one comment, load up the comment template.
					// if ( comments_open() || get_comments_number() ) :
					// 	comments_template();
					// endif;

				endwhile; // End of the loop.
			?>

			<a class="back "href="<?php echo home_url('/' . 'blog') ?>">Volver al blog</a>
			
		</div>
	</div>

<?php
get_footer();
