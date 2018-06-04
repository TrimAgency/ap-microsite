<?php
/**
 * Template Name: Full-Width, Home
 *
 * This template display content at full with, with no sidebars.
 * Please note that this is the WordPress construct of pages and that other 'pages' on your WordPress site will use a different template.
 *
 * @package some_like_it_neat
 */

  $background_images = array(
    "scene_1__title"  => get_image_path('background-1.jpg'),
    "scene_1__car"    => get_image_path('background-2.jpg'),
    "scene_1__riot"   => get_image_path('background-3.jpg')
  );

get_header(); ?>

<div class="home-content" style="background-image: url(<?php echo $background_images['scene_1__title']; ?> );">

<?php 
  get_template_part( 'page-templates/template-parts/home/google', 'map' ); 
  get_template_part( 'page-templates/template-parts/home/scene', '1' ); 
  get_template_part( 'page-templates/template-parts/home/scene', '2' ); 
  get_template_part( 'page-templates/template-parts/home/scene', '3' ); 
  get_template_part( 'page-templates/template-parts/home/scene', '4' ); 
  get_template_part( 'page-templates/template-parts/home/scene', '5-cta' ); 
?>


</div><!-- #primary -->

<?php get_footer(); ?>
