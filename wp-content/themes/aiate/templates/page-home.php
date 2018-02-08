<?php
/**
 * Template Name: Home
 *
 * @package Aiate
 */

 get_header(); ?>

  <!-- Slider -->
  <div class="slider">
    <div id="post-slider" class="glide">
      <div class="glide__arrows">
          <button class="glide__arrow prev" data-glide-dir="<"></button>
          <button class="glide__arrow next" data-glide-dir=">"></button>
      </div>
      <div class="glide__wrapper">
          <ul class="glide__track">
              <?php 
              $args = array(
                'tag' => 'slider',
                'posts_per_page' => -1,
              );
              $the_query = new WP_Query($args);
              ?>
              <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
                <li class="glide__slide">
                  <div class="slide">
                    <div class="image" style="background-image: url('<?php the_post_thumbnail_url()?>')"></div>
                    <div class="featured">
                        <a href="<?php echo get_permalink(); ?>">
                        <h1><?php the_title(); ?></h1>
                        </a>
                      </div> 
                  </div>
                </li>
              <?php endwhile;
                wp_reset_postdata();
              ?>
          </ul>
      </div>
    </div>
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

      <!-- Posts -->
      <section class="posts">
        <h2 class="section-title"><a class="back "href="<?php echo home_url('/' . 'blog') ?>">Gaceta</a></h2>
        <div class="row">
          <?php 
            $args = array(
              'posts_per_page' => 3,
            );
            $the_query = new WP_Query($args);
          ?>
          <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
            <div class="post-card col-sm-12 col-md-4">
             <a class="post-link" href="<?php echo get_permalink(); ?>"></a>
              <div class="post-image" style="background-image: url('<?php the_post_thumbnail_url()?>')"></div>
              <div class="post-info">
                <span class="category"><?php the_category(); ?></span>
                <span class="name"><?php the_title(); ?></span>
                <span class="excerpt"><?php the_excerpt(__('()')); ?></span>
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

      <!-- Instagram -->
      <section class="posts">
        <h2 class="section-title">Instagram</h2>
        <div class="row">
          <div class="col-xs-12">
            <?php the_content(); ?>
          </div>
        </div>
      </section>
  </div>

 <?php
 get_footer();
