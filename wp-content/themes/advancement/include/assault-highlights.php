<?php // build cards for highlighted assaults
function display_assault_highlights() { 
  $highlights   = array('post_type'				=> 'assaults',
                        'post_status'			=> 'publish',
                        'posts_per_page'  => '-1',
                        'orderby'         => 'date',
                        'order'           => 'ASC',
                        'tax_query'       => array(
                        array('taxonomy'  => 'assault category',
                              'field'     =>  'slug',
                              'terms'     => 'highlights'
                        )));
  $assaults	= get_posts($highlights);

  if (!empty($assaults)):
    foreach ($assaults as $assault): 

      $id       = $assault->ID;
      $hashtag  = get_field('hashtag', $id);
      $month    = get_field('month', $id);
      $year     = get_field('year', $id);
      $city     = get_field('city', $id);
      $state    = get_field('state', $id);
      $article  = get_field('article_url', $id);
      $summary  = get_field('summary', $id);  ?>

      <div class="temp-card assault-highlight full-height-margin-top bg-white-5"
            data-highlight-year="<?php echo $year; ?>">
        
        <div class="">
          <h3><?php echo $year; ?></h3>
          <a  id="<?php echo $hashtag; ?>" 
              href="<?php echo $article; ?>"
              target="_blank"
              rel="nofollow">
              <?php echo $hashtag; ?>
            </a> – <?php echo $city, ", ", $state; ?>
            <p><?php echo $summary; ?></p>
          </div>
        </div>
<?php 
    endforeach;
  endif;
} ?>