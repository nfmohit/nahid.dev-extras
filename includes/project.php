<?php
/**
 * Project post type
 *
 * @since      1.0
 * @package    nahid.dev Extras
 * @author     Nahid Ferdous Mohit
 */
/*
 * If this file is called directly, abort.
 */
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

/**
 * Register the project post type
 */
function create_project_post_type() {
    register_post_type( 'project',
      array(
        'labels' => array(
          'name' => __( 'Projects', 'nahid.dev-extras' ),
          'menu_name' => __( 'Projects', 'nahid.dev-extras' ),
          'singular_name' => __( 'Project', 'nahid.dev-extras' ),
          'add_new' => __( 'Add New', 'nahid.dev-extras' ),
          'add_new_item' => __( 'Add New Project', 'nahid.dev-extras' ),
          'edit_item' => __( 'Edit Project', 'nahid.dev-extras' ),
          'new_item' => __( 'New Project', 'nahid.dev-extras' ),
          'view_item' => __( 'View Project', 'nahid.dev-extras' ),
          'search_items' => __( 'Search Project', 'nahid.dev-extras' ),
          'not_found' => __( 'No Project', 'nahid.dev-extras' ),
          'not_found_in_trash' => __( 'No Project found in trash', 'nahid.dev-extras' ),
          'parent_item_colon' => __( 'Parent Project:', 'nahid.dev-extras' ),
          'all_items' => __( 'All Project', 'nahid.dev-extras' ),
          'attributes' => __( 'Project Options', 'nahid.dev-extras' ),
        ),
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'show_in_admin_bar' => false,
        'menu_icon' => 'dashicons-portfolio',
        'hierarchical' => true,
        'show_in_rest' => true,
        'supports' => array( 'title', 'editor', 'page-attributes', 'excerpt', 'custom-fields' ),
        'publicly_queryable' => true,
        'taxonomies' => array( 'category' ),
      )
    );
}
add_action( 'init', 'create_project_post_type' );
