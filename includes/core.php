<?php
/**
 * Core plugin file
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

/*
 * Register the projects post type
 */
require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/projects.php';

/*
 * Register the project links metabox
 */
require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/metaboxes/project-links.php';
