<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Aiate
 */

?>

<div class="post-card col-sm-12 col-md-4">
	<a class="post-link" href="<?php echo get_permalink(); ?>"></a>
	<div class="post-image" style="background-image: url('<?php the_post_thumbnail_url()?>')"></div>
	<div class="post-info">
		<span class="name"><?php the_title(); ?></span>
	</div>
</div>





