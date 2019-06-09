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

	global $post;

    $values = get_post_custom( $post->ID );

    $usage_text = isset( $values[ 'project_usage_metabox_usage_text' ] ) ? esc_html( $values[ 'project_usage_metabox_usage_text' ][ 0 ] ) : '';

    wp_nonce_field( 'project_usage_metabox_nonce', 'meta_box_nonce' );

    ?>

    <div class="components-base-control">
        <div class="components-base-control__field">
            <?php wp_editor( $usage_text, 'project_usage_metabox_usage_text' ); ?>
        </div>
    </div>

    <?php
}

function project_usage_metabox_save( $post_id ) {

    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'project_usage_metabox_nonce' ) ) return;

    if( !current_user_can( 'edit_post' ) ) return;

    if( isset( $_POST['project_usage_metabox_usage_text'] ) ) {
        if ( $_POST['project_usage_metabox_usage_text'] == '' ) {
            delete_post_meta( $post_id, 'project_usage_metabox_usage_text' );
        } else {
            update_post_meta( $post_id, 'project_usage_metabox_usage_text', esc_html( $_POST['project_usage_metabox_usage_text'] ) );
        }
    }
}
add_action( 'save_post', 'project_usage_metabox_save' );
