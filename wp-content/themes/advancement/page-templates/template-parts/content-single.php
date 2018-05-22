<?php
/**
 * @package some_like_it_neat
 */

$tag_list = get_the_tag_list( '', __( ', ', 'some-like-it-neat' ) );

$bg_image = get_the_post_thumbnail_url();

$blog_date = get_the_date( 'j M' );

$blog_author = get_the_author_meta('display_name');
?>

<div class="visual style-2 blog-bg" style="background-image:url('<?php echo $bg_image ?>')">
  <div class="container">
    <div class="text-box">
    </div>
  </div>
</div>

<div class="blog-content-container">
  <div class="blog-content">
    <div class="intro">
      <h1 class="blog-date"><?php echo $blog_date ?> /<span class="blog-title"><?php the_title(); ?></span></h1>
      <p class="author">Posted by <?php echo $blog_author ?></p>
    </div>

    <div class="blog-text-content">
      <?php echo the_content(); ?>
    </div>

    <div class="blog-tags">
      <?php if ($tag_list) : ?>
        <p><strong>TAGS:</strong><?php echo $tag_list ?></p>
      <?php endif; ?>
    </div>

  </div><!-- blog-content -->
</div><!-- blg-content-container -->



