<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Aiate
 */

get_header(); ?>

<div class="container-fluid">
	<div class="search-results">
		<div class="search-content">
		<?php
		if ( have_posts() ) : ?>

			<div class="search-title">
			<?php printf( esc_html__( 'Resultados de: %s', 'aiate' ), '<span>' . get_search_query() . '</span>' ); ?>
			</div>
			<div class="row">
				<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'template-parts/content', 'search' );

					endwhile;

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>
			</div>
			<div class="text-center">
				<?php the_posts_navigation(); ?>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
