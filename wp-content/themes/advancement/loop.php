<?php if ( have_posts() ) {
        
        echo '<div class="blog-row row">';

        while (have_posts()) {
          the_post();

          echo   '<a class="blog-link" href="'. get_the_permalink() .'">';
          echo   '<div class="post" style="background-image:url(' . get_the_post_thumbnail_url() .'); background-size:cover; background-repeat:no-repeat;height:316px;">';
          echo   '<h2>' . get_the_title() .'</h2>';
          echo   '<span>BY ' . get_the_author_meta('display_name') . '</span>';
          echo   '</div>';
          echo   '</a>';

        }

        echo '</div>';
      }
?>
