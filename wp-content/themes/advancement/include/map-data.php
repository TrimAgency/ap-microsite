<?php 
function assault_map_data() {
	$data_points = array();

	$assaults	= get_posts(array('post_type'				=> 'assaults',
															'post_status'			=> 'publish',
															'posts_per_page'  => '-1'));

  if (!empty($assaults)):
    foreach( $assaults as $assault ) : setup_postdata($assault);
      // declare 'location' nested array for each data_point
      $data_point = array('location' => array() );
  
      $data_point['id']               = $assault->ID;

      $data_point['hashtag']          = get_field('hashtag', $assault->ID);
      $data_point['month']            = get_field('month', $assault->ID);
      $data_point['year']             = get_field('year', $assault->ID);
      $data_point['city']             = get_field('city', $assault->ID);
      $data_point['state']            = get_field('state', $assault->ID);
      $data_point['article']          = get_field('article_url', $assault->ID);
      $data_point['summary']          = get_field('summary', $assault->ID);
      $data_point['location']['lat']  = (float) get_field('lat', $assault->ID);
      $data_point['location']['lng']  = (float) get_field('lng', $assault->ID);
      // $data_point['image'] = wp_get_attachment_url( get_post_thumbnail_id($assault->ID));
      
      // push assault data to data_points[]
      $data_points[] = $data_point;
      
    endforeach; wp_reset_postdata();
  endif; wp_reset_query();
  
  return $data_points;
}
  
  // assign return value to global var - declared in functions.php
  $assault_map_data_array = assault_map_data();