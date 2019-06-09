<?php
/**
 * Project Usage metabox
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
 * Register the project usage metabox
 */
function project_usage_metabox() {
    add_meta_box(
        'project_usage',
        __( 'Project Usage', 'nahid.dev-extras' ),
        'project_usage_metabox_callback',
        'project',
        'normal',
        'default'
    );
}
add_action( 'add_meta_boxes', 'project_usage_metabox' );

function project_usage_metabox_callback() {
	echo 'Hello World';
}
