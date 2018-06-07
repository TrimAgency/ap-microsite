<?php 

// Assault Custom Post Type
add_action('init', 'assaults_post_type');
function assaults_post_type() {
	register_post_type('assaults',
		array(
			'labels' => array(
				'name'          => __('Assaults'),
				'singular_name' => __('Assault'),
				'add_new'       => __( 'Add Assault'),
				'new_item'      => __( 'New Assault'),
  			'edit_item'     => __( 'Edit Assault'),
				'add_new_item'  => __( 'Add New Assault' ),
				'view_item'     => __( 'View Assault'),
  		  'all_items'     => __( 'View Assaults'),
  		  'search_items'  => __( 'Search Assaults'),
			),
			'public' => true,
			'has_archive' => true,
			'show_in_rest'=> true,
			'query_var' => true,
			'rest_base' => 'assaults-api',
  		'rest_controller_class' => 'WP_REST_Posts_Controller',
			'supports'  => array( 'title', 'thumbnail' )
		)
	);
}

// Register Categories for Assault Post Type
add_action( 'init', 'assaults_taxonomy', 30 );
  function assaults_taxonomy() {

  	$labels = array(
  		'name'              => _x( 'Assault Categories', 'taxonomy general name' ),
  		'singular_name'     => _x( 'Assault Category', 'taxonomy singular name' ),
  		'search_items'      => __( 'Search Assault Categories' ),
  		'all_items'         => __( 'All Assault Categories' ),
  		// 'parent_item'       => __( 'Parent Service Category' ),
  		// 'parent_item_colon' => __( 'Parent Service Category:' ),
  		'parent_item'       => null,
  		'parent_item_colon' => null,
  		'edit_item'         => __( 'Edit Assault Category' ),
  		'update_item'       => __( 'Update Assault Category' ),
  		'add_new_item'      => __( 'Add New Assault Category' ),
  		'new_item_name'     => __( 'New Assault Category or Range' ),
  		'menu_name'         => __( 'Assault Category' ),
  	);

  	$args = array(
  		// 'hierarchical'      => true,
  		'hierarchical'      => true,
  		'labels'            => $labels,
  		'show_ui'           => true,
  		'show_admin_column' => true,
  		'query_var'         => true,
  		'show_in_rest'      => true,
      'update_count_callback' => '_update_post_term_count',
      'rewrite' => array( 'slug'        => 'assault-categories',
                          'with_front'  => true ),
      // 'rest_base' => 'service',
  		// 'rest_controller_class' => 'WP_REST_Terms_Controller',
  	);

  	register_taxonomy( 'assault category', array( 'assaults' ), $args );

	}
	

// Policing Timeline Event Custom Post Type
add_action('init', 'policing_timeline_post_type');
function policing_timeline_post_type() {
	register_post_type('policing_timeline',
		array(
			'labels' => array(
				'name'          => __('Policing Timeline'),
				'singular_name' => __('Timeline Event'),
				'add_new'       => __( 'Add Timeline Event'),
				'new_item'      => __( 'New Timeline Event'),
  			'edit_item'     => __( 'Edit Timeline Event'),
				'add_new_item'  => __( 'Add New Timeline Event' ),
				'view_item'     => __( 'View Timeline Events'),
  		  'all_items'     => __( 'View Timeline Events'),
  		  'search_items'  => __( 'Search Timeline Events'),
			),
			'public' => true,
			'has_archive' => true,
			'show_in_rest'=> true,
			'query_var' => true,
			'rest_base' => 'policing-timeline-api',
  		'rest_controller_class' => 'WP_REST_Posts_Controller',
			'supports'  => array( 'title', 'editor', 'thumbnail' )
		)
	);
}



// custom post types - example

// add_action('init', 'team_post_type');
// function team_post_type() {
// 	register_post_type('employees',
// 		array(
// 			'labels' => array(
// 				'name' => __('Team'),
// 				'add_new'       => __( 'Add Member'),
// 				'singular_name' => __('Team'),
// 				'new_item'      => __( 'New Member' ),
//   			'edit_item'     => __( 'Edit Member'),
// 				'add_new_item'  => __( 'Add New Member'),
// 				'view_item'     => __( 'View Member'),
//   		  'all_items'     => __( 'View Team members'),
//   		  'search_items'  => __( 'Search Team'),
// 			),
// 			'public' => true,
// 			'has_archive' => true,
// 			'show_in_rest'=> true,
// 			'query_var' => true,
// 			'rest_base' => 'team-api',
//   		'rest_controller_class' => 'WP_REST_Posts_Controller',
// 		)
// 	);
// }
// example to add custom post types
// add_action('init', 'projects_post_type');
// function projects_post_type() {
// 	register_post_type('projects',
// 		array(
// 			'labels' => array(
// 				'name' => __('Projects'),
// 				'singular_name' => __('Project'),
// 				'add_new'       => __( 'Add Project'),
// 				'new_item'      => __( 'New Project'),
//   			'edit_item'     => __( 'Edit Project'),
// 				'add_new_item'  => __( 'Add New Project' ),
// 				'view_item'     => __( 'View Project'),
//   		  'all_items'     => __( 'View Projects'),
//   		  'search_items'  => __( 'Search Projects'),
// 			),
// 			'public' => true,
// 			'has_archive' => true,
// 			'show_in_rest'=> true,
// 			'query_var' => true,
// 			'rest_base' => 'projects-api',
//   		'rest_controller_class' => 'WP_REST_Posts_Controller',
// 			'supports'  => array( 'title', 'editor', 'thumbnail' )
// 		)
// 	);
// }

// custom taxanomy for projects - example

// add_action( 'init', 'projects_taxonomy', 30 );
//   function projects_taxonomy() {
//
//   	$labels = array(
//   		'name'              => _x( 'Project Categories', 'taxonomy general name' ),
//   		'singular_name'     => _x( 'Project Category', 'taxonomy singular name' ),
//   		'search_items'      => __( 'Search Project Categories' ),
//   		'all_items'         => __( 'All Project Categories' ),
//   		'parent_item'       => __( 'Parent Project Category' ),
//   		'parent_item_colon' => __( 'Parent Project Category:' ),
//   		'edit_item'         => __( 'Edit Project Category' ),
//   		'update_item'       => __( 'Update Project Category' ),
//   		'add_new_item'      => __( 'Add New Project Category' ),
//   		'new_item_name'     => __( 'New Project Category Name' ),
//   		'menu_name'         => __( 'Project Category' ),
//   	);
//
//   	$args = array(
//   		'hierarchical'      => true,
//   		'labels'            => $labels,
//   		'show_ui'           => true,
//   		'show_admin_column' => true,
//   		'query_var'         => true,
//   		'show_in_rest'       => true,
// 			'rest_base' => 'project-category',
//   		'rest_controller_class' => 'WP_REST_Terms_Controller',
//   	);
//
//   	register_taxonomy( 'project_category', array( 'projects' ), $args );
//
//   }
