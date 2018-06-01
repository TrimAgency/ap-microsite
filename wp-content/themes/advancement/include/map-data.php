<?php 

function assault_map_data() {

	$data_points = array();

  // $term 	= strtolower( $_POST['term'] );
	$assaults	= get_posts(array('post_type'				=> 'assaults',
															'post_status'			=> 'publish',
															'posts_per_page'  => '-1'));

  if (!empty($assaults)):
    foreach( $assaults as $assault ) : setup_postdata($assault);
    
    // declare 'location' nested array
    $data_point = array('location' => array() );
    
    // $boundary_string = get_field('boundary', $assault->ID); // 'x,y,z x,y,z...'
    // $boundary_array = explode(' ', $boundary_string); // ['x,y,z', ...]
    
    // foreach( $boundary_array as $coord_string ) {
      
    //   	if (strpos($coord_string, ',') !== FALSE) {
    //     		$boundary_coords = explode(',', $coord_string); // ['x','y','z']
    //     		$coord_pair = array('lat' => (float) $boundary_coords[1],
    //     												'lng' => (float) $boundary_coords[0]);
    //     		$data_point['boundary'][] = $coord_pair;
    //     	}
        
    //     }
        
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