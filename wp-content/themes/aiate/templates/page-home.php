<?php
/**
 * Template Name: Home
 *
 * @package Aiate
 */

 get_header(); ?>

  <!-- Slider -->
  <div class="slider">
    <div id="Glide" class="glide">
      <div class="glide__arrows">
          <button class="glide__arrow prev" data-glide-dir="<">prev</button>
          <button class="glide__arrow next" data-glide-dir=">">next</button>
      </div>
      <div class="glide__wrapper">
          <ul class="glide__track">
              <?php $the_query = new WP_Query( 'posts_per_page=3' ); ?>
              <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
                <li class="glide__slide">
                  <div class="slide">
                    <a href="#" class="image">
                      <div class="featured">
                        <h1><?php the_title(); ?></h1>
                        <p><?php the_excerpt(__('()')); ?></p>
                      </div>
                    </a>
                  </div>
                </li>
              <?php endwhile;
                wp_reset_postdata();
              ?>
          </ul>
      </div>
    </div>
    <script>
        $("#Glide").glide({
            type: "carousel"
        });
    </script>
  </div>

  <!-- Container -->
  <div class="container-fluid">

      <!-- Features products -->
      <section class="featured-products">
        <h2 class="section-title">Productos destacados</h2>
        <div class="row">
          <?php
            $args = array(
              'post_type' => 'product',
              'posts_per_page' => 8
              );
            $loop = new WP_Query( $args );
            if ( $loop->have_posts() ) {
              while ( $loop->have_posts() ) : $loop->the_post(); ?>              
                <div class="product-card col-xs-12 col-sm-6 col-md-3">
                  <a href="<?php echo get_permalink(); ?>">
                  <?php woocommerce_template_loop_product_thumbnail(); ?>
                    <div class="product-info">                      
                      <?php woocommerce_template_single_meta(); ?>
                      <span class="name"><?php the_title(); ?></span>
                      <span class="price"><?php woocommerce_template_loop_price(); ?></span>
                      <button type="button" class="primary" name="button"><?php woocommerce_template_loop_add_to_cart(); ?></button>
                    </div>
                  </a>
                </div>
              <?php endwhile;
            } else {
              echo __( 'No products found' );
            }
            wp_reset_postdata();
          ?>
        </div>
      </section>

      <!-- Posts -->
      <section class="posts">
        <h2 class="section-title">Entradas</h2>
        <div class="row">
          <?php $the_query = new WP_Query( 'posts_per_page=3' ); ?>
          <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
            <div class="post-card col-sm-12 col-md-4">
              <div class="post-image"></div>
              <div class="post-info">
                <span class="category"><?php the_category(); ?></span>
                <span class="name"><?php the_title(); ?></span>
                <span class="excerpt"><?php the_excerpt(__('()')); ?></span>
                <a href="<?php echo get_permalink(); ?>"><button type="button" class="primary" name="button">Leer más</button></a>
              </div>
            </div>
          <?php endwhile;
            wp_reset_postdata();
          ?>
        </div>
      </section>

      <!-- Editorial -->
      <!-- <section class="editorial">
        <h2 class="section-title">Editorial</h2>
        <div class="row">
          <div class="post-card col-sm-12 col-md-6">
            <div class="post-image"></div>
            <div class="post-info">
              <span class="category">Lookbook</span>
              <span class="name">The Armoury Fall/Winter 2017</span>
              <span class="excerpt">Introducing: The Armoury Fall/Winter 2017 Lookbook </span>
            </div>
          </div>
          <div class="post-card col-sm-12 col-md-6">
            <div class="post-image"></div>
            <div class="post-info">
              <span class="category">Lookbook</span>
              <span class="name">The Armoury Fall/Winter 2017</span>
              <span class="excerpt">Introducing: The Armoury Fall/Winter 2017 Lookbook </span>
            </div>
          </div>
        </div>
      </section> -->
  </div>

 <?php
 get_footer();
