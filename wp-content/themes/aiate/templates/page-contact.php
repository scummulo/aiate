<?php
/**
 * Template Name: Contact
 *
 * @package Aiate
 */

 get_header(); ?>

    <div class="container-fluid">
        <div class="page">
            <div class="page-title">
                <?php the_title( '<h1 class="title">', '</h1>' ); ?>
            </div>
            <div class="contactForm">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
    <div id="map"></div>

 <?php
 get_footer();
