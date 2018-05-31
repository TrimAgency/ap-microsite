<?php 

function assault_map_data() {

	$results = array();

  // $term 	= strtolower( $_POST['term'] );
	$assaults	= get_posts(array('post_type'				=> 'assaults',
															'post_status'			=> 'publish',
															'posts_per_page'  => '-1'));

  if (!empty($assaults)):
    foreach( $assaults as $assault ) : setup_postdata($assault);
    
    // declare 'location' nested array
    $result = array('location' => array() );
    
    // $boundary_string = get_field('boundary', $assault->ID); // 'x,y,z x,y,z...'
    // $boundary_array = explode(' ', $boundary_string); // ['x,y,z', ...]
    
    // foreach( $boundary_array as $coord_string ) {
      
    //   	if (strpos($coord_string, ',') !== FALSE) {
    //     		$boundary_coords = explode(',', $coord_string); // ['x','y','z']
    //     		$coord_pair = array('lat' => (float) $boundary_coords[1],
    //     												'lng' => (float) $boundary_coords[0]);
    //     		$result['boundary'][] = $coord_pair;
    //     	}
        
    //     }
        
        $result['id']               = $assault->ID;

        $result['hashtag']          = get_field('hashtag', $assault->ID);
        $result['month']            = get_field('month', $assault->ID);
        $result['year']             = get_field('year', $assault->ID);
        $result['city']             = get_field('city', $assault->ID);
        $result['state']            = get_field('state', $assault->ID);
        $result['article']          = get_field('article_url', $assault->ID);
        $result['summary']          = get_field('summary', $assault->ID);
        $result['location']['lat']  = (float) get_field('lat', $assault->ID);
        $result['location']['lng']  = (float) get_field('lng', $assault->ID);
        // $result['image'] = wp_get_attachment_url( get_post_thumbnail_id($assault->ID));
        
        // push assault data to results[]
        $results[] = $result;
        
      endforeach; wp_reset_postdata();
    endif; wp_reset_query();
    
    return $results;
  }
  
  // assign return value to global var - declared in functions.php
  $assault_map_data_array = assault_map_data();