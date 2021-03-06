<?php
/**
 * The main template file
 *
 * @package Aiate
 */

get_header(); ?>

<?php 
  $args = array (
    'order' => ASC,
    'orderby' => title,
    'paged'=> $paged,
    'posts_per_page' => -1
  );
  $the_query = new WP_Query($args); 
?>

 <div class="container-fluid">
    <section class="posts">
    <h1 class="section-title">Blog</h1>
    <div class="row">
      <?php while ($the_query -> have_posts()) : $the_query -> the_post(); $counter++ ?>

        <?php 
        $category_object = get_the_category($post_id);
        $category_name = $category_object[0]->name;

          if ($counter == 4 || $counter == 5 ) {
            echo
            '
            <div class="post-card col-xs-12 col-sm-6">
            <a class="post-link" href="'.get_permalink().'"></a>
            <div class="post-image" style="background-image: url('.get_the_post_thumbnail_url().')"></div>
              <div class="post-info">
                <span class="category">'.$category_name.'</span>
                <span class="name">'.get_the_title().'</span>
                <span class="excerpt">'.get_the_excerpt().'</span>
              </div>
            </div>
            ';
          } else {
            echo
            '
            <div class="post-card col-xs-12 col-sm-6 col-md-4">
            <a class="post-link" href="'.get_permalink().'"></a>
            <div class="post-image" style="background-image: url('.get_the_post_thumbnail_url().')"></div>
              <div class="post-info">
                <span class="category">'.$category_name.'</span>
                <span class="name">'.get_the_title().'</span>
                <span class="excerpt">'.get_the_excerpt().'</span>
              </div>
            </div>
            ';
          }
        ?>
      <?php endwhile;?>
    </div>
  </section>
 </div>


 <?php
 get_footer();