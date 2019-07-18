<?php
/**
 * Netlify webhook trigger
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

add_action( 'admin_enqueue_scripts', 'netlify_webhook_trigger', 10, 1 );
function netlify_webhook_trigger( $hook ) {
    global $post;

    if ( 'post.php' == $hook  && isset( $_GET[ 'message' ] ) && ( 'post' == $post->post_type || 'page' == $post->post_type || 'project' == $post->post_type ) ) { 

        $message_id = absint( $_GET['message'] );

        wp_enqueue_script(
            'netlify-trigger',
            plugin_dir_url( dirname( __FILE__ ) ) . 'assets/js/netlify-trigger.js',
            array( 'jquery' )
        );

        $data = array( 'Message' => $message_id );

        wp_localize_script( 'netlify-trigger', 'triggerPost', $data );
    }
}
