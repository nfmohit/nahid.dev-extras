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
 * Register the project post type
 */
require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/project.php';

/*
 * Register the project links metabox
 */
require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/metaboxes/project-links.php';

/*
 * Register the project usage metabox
 */
require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/metaboxes/project-usage.php';

/*
 * Custom Plugin Functions
 */
require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/plugin-functions.php';

/*
 * Netlify Webhook Trigger
 */
require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/netlify-trigger.php';
