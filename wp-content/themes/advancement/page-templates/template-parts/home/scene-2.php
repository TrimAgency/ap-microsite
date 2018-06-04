<?php $timeline_events	= get_posts(
                              array('post_type'				=> 'policing_timeline',
                                    'post_status'			=> 'publish',
                                    'posts_per_page'  => '-1',
                                    'orderby'         => 'date',
                                    'order'           => 'ASC'));
?>

<section id="scene-2" class="scene scene-2 hidden-scene">
  <h1 class="center white">Policing Timeline</h1>
<?php
  if (!empty($timeline_events)):
    foreach($timeline_events as $event):
      // get individual post data
      $event_id           = $event->ID;
      $event_date         = get_the_title($event);
      $event_description  = $event->post_content; ?>

      <!-- add data to elements -->
      <div id="policing-timeline">

        <div class="timeline-event white">
          <h2 class="event-date bold">
            <?php echo $event_date; ?>
          </h2>
          <p class="event-desription">
            <?php echo $event_description; ?>
          </p>  
        </div> 

      </div>
  <?php
    endforeach;
  endif; ?>
</section>