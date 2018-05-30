<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *  
 * @package some_like_it_neat
 */
?>
<!DOCTYPE html>
<?php tha_html_before(); ?>
<html <?php language_attributes(); ?>>

<head>

    <!-- <?php tha_head_top(); ?> -->

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
	<!-- <style type="text/css">
		<?php // if ( 'no' === get_theme_mod( 'some-like-it-neat_post_format_support' ) ): ?>
			h1.entry-title:before {
				display: none;
			}
		<?php // endif; ?>
	</style> -->

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
	<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/gsap/1.14.2/TweenMax.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.gsap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.velocity.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/debug.addIndicators.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/jquery.ScrollMagic.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js"></script> -->

	<!-- <script>
	  jQuery(function() {
    // Init Controller
    var scrollMagicController = new ScrollMagic();

    var tween = TweenMax.to('#animation__policing-timeline', 0.5, {
      backgroundColor: 'rgb(125, 129, 121)',
      scale: 1,
      rotation: 360
    });

    var scene = new ScrollMagic.Scene({
      triggerElement: '#scene-2',
      duration: 300 /* How many pixels to scroll / animate */
    })
    .setTween(tween)
    .addTo(scrollMagicController);
  });</script> -->

  <div id="spinner" class="hidden overlay-wrap">
     <div class="spinner-wrap">
      <div class="spinner">
        <i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i>
      </div> 
    </div>
  </div>


	<div class="hfeed site">

		<!-- <header id="masthead" class="" role="banner">
			<div class="top-panel">
				<a href="/" id="logo-home-link" class="logo-home-link">
					<div class="logo" style="background-image: url(<?php // the_image_path('logo.svg'); ?>);" ></div>
				</a>
				

				<button class="hamburger hamburger--spring" type="button"
								aria-label="Menu" aria-controls="navigation">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</button>
				<nav id="navigation" class="js-menu cl-effect-4">
					<?php
						// wp_nav_menu(
						// 	array(
						// 		'theme_location' => 'primary-navigation',
						// 		'items_wrap' => '<ul class="body light">%3$s</ul>'
						// 	)
						// );
					?>
				</nav>

			</div>
		</header> --><!-- #masthead -->

		<main class="site-main wrap" role="main">