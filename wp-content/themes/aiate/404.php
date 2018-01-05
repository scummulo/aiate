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
			<h1 class="page-title"><?php esc_html_e( 'Parece que esta página no existe', 'aiate' ); ?></h1>
		</div>

		<div class="page-content">
			<p class="text-center"><?php esc_html_e( 'Quizás te pueda interesar...', 'aiate' ); ?>

			<section class="featured-products">
				<div class="row">
				<?php
					$args = array(
					'post_type' => 'product',
					'posts_per_page' => 4,
					'tax_query'      => array(
						array(
						'taxonomy' => 'product_visibility',
						'field'    => 'name',
						'terms'    => 'featured',
						'operator' => 'IN',
						)
						)  
					);
					$loop = new WP_Query( $args );
					if ( $loop->have_posts() ) {
					while ( $loop->have_posts() ) : $loop->the_post(); ?>              
						<div class="product-card col-xs-6 col-sm-6 col-md-3">
						<a class="product-link" href="<?php echo get_permalink(); ?>"></a>
						<?php woocommerce_template_loop_product_thumbnail(); ?>             
						<div class="product-info">                      
							<?php woocommerce_template_single_meta(); ?>
							<span class="name">
							<?php the_title(); ?> 
							</span>
							<?php woocommerce_template_loop_price(); ?>
						</div>
						</div>
					<?php endwhile;
					} else {
					echo __( 'No products found' );
					}
					wp_reset_postdata();
				?>
				</div>
			</section>
		</p>
	</div><!-- .error-404 -->
</div>

<?php
get_footer();
