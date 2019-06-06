<?php
/**
 * Project Links metabox
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
 * Register the project links metabox
 */
function project_links_metabox() {
    add_meta_box(
        'project_links',
        __( 'Project Links', 'nahid.dev-extras' ),
        'project_links_metabox_callback',
        'projects',
        'normal',
        'default'
    );
}
add_action( 'add_meta_boxes', 'project_links_metabox' );

function project_links_metabox_callback() {
	echo 'Hello World';
}
