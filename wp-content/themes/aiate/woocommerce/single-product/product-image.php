<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post, $product;
$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$thumbnail_size    = apply_filters( 'woocommerce_product_thumbnails_large_size', 'full' );
$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
$full_size_image   = wp_get_attachment_image_src( $post_thumbnail_id, $thumbnail_size );
$placeholder       = has_post_thumbnail() ? 'with-images' : 'without-images';
$wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
	'woocommerce-product-gallery',
	'woocommerce-product-gallery--' . $placeholder,
	'woocommerce-product-gallery--columns-' . absint( $columns ),
	'images',
) );
?>
<div class="product-images col-md-6" data-columns="<?php echo esc_attr( $columns ); ?>">

  <!-- Slider -->
  <div class="slider">
    <div id="product-detail-slider" class="glide">
      <div class="glide__arrows">
          <button class="glide__arrow prev" data-glide-dir="<"></button>
          <button class="glide__arrow next" data-glide-dir=">"></button>
      </div>
      <div class="glide__wrapper">
          <ul class="glide__track">
				<?php
				$attachment_ids = $product->get_gallery_attachment_ids();
					foreach( $attachment_ids as $attachment_id )
						echo
						'
						<li class="glide__slide">
							<div class="slide">
								<div class="image" style="background-image: url('.wp_get_attachment_url( $attachment_id ).')"></div>
						</div>
						</li>
						'
				?>
          </ul>
      </div>
    </div>
  </div>	
</div>
