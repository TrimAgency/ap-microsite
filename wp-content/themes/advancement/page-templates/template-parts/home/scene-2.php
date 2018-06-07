<?php $timeline_events	= get_posts(
                              array('post_type'				=> 'policing_timeline',
                                    'post_status'			=> 'publish',
                                    'posts_per_page'  => '-1',
                                    'orderby'         => 'date',
                                    'order'           => 'ASC'));
?>

<section id="scene-2" class="scene-2 scene section-card--static">

  <div id="timeline-container" class="timeline__container fixed-media-container positioned">
    <div class="fixed-media__content container--fullbleed">
      <div class="background-image background-2"></div>
    </div>
  </div>
  <div id="policing-timeline" class="content-container content-container--margin" style="padding-top:100px;text-align:center">
    <h1 class="center white timeline__title">Policing Timeline</h1>
<?php
  if (!empty($timeline_events)):
    foreach($timeline_events as $event):
      // get individual post data
      $event_id           = $event->ID;
      $event_date         = get_the_title($event);
      $event_description  = $event->post_content; ?>

      <!-- add data to elements -->
      <div class="timeline__event white scrolly-text scrolly-text--centered article-header__p--1">
        <h2 class="event__date bold">
          <?php echo $event_date; ?>
        </h2>
        <p class="event-desription ">
          <?php echo $event_description; ?>
        </p>  
      </div> 

  <?php
    endforeach;
  endif; ?>
  </div>
</section>