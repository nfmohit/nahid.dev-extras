<?php
/**
 * Custom plugin functions
 *
 * @since      1.0
 * @package    nahid.dev Extras
 * @author     Nahid Ferdous Mohit
 */

/*
 * Expose project custom fields to Rest API
 */

add_action( 'rest_api_init', 'create_api_project_meta_field' );

function create_api_project_meta_field() {
    register_rest_field( 'project', 'project-custom-fields',
    	array(
	        'get_callback' => 'get_project_meta_for_api',
	        'schema' => 'string',
	    )
	);
}

function get_project_meta_for_api( $object ) {
    $post_id = $object['id'];

    return get_post_meta( $post_id );
}
