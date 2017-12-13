<?php
/**
 * Template Name: Blog
 *
 * @package Aiate
 */

 get_header(); ?>

 <div class="container-fluid">
    <section class="posts">
    <h2 class="section-title">Blog</h2>
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
 </div>

 <?php
 get_footer();
