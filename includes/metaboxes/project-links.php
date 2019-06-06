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
        'project',
        'side',
        'default'
    );
}
add_action( 'add_meta_boxes', 'project_links_metabox' );

function project_links_metabox_callback() {

    global $post;

    $values = get_post_custom( $post->ID );

    $github_url = isset( $values[ 'project_links_metabox_github_url' ] ) ? esc_url( $values[ 'project_links_metabox_github_url' ][ 0 ] ) : '';

    $wp_org_url = isset( $values[ 'project_links_metabox_wp_org_url' ] ) ? esc_url( $values[ 'project_links_metabox_wp_org_url' ][ 0 ] ) : '';

    wp_nonce_field( 'project_links_metabox_nonce', 'meta_box_nonce' );

    ?>

    <div class="components-base-control">
        <div class="components-base-control__field">
            <label class="components-base-control__label" for="project_links_metabox_github_url"><?php echo __( 'GitHub Repository URL', 'nahid.dev-extras' ); ?></label>
            <input class="components-text-control__input" type="url" id="project_links_metabox_github_url" name="project_links_metabox_github_url" value="<?php echo esc_url( $github_url ); ?>" />
        </div>
        <div class="components-base-control__field">
            <label class="components-base-control__label" for="project_links_metabox_wp_org_url"><?php echo __( 'WordPress.org URL', 'nahid.dev-extras' ); ?></label>
            <input class="components-text-control__input" type="url" id="project_links_metabox_wp_org_url" name="project_links_metabox_wp_org_url" value="<?php echo esc_url( $wp_org_url ); ?>" />
        </div>
    </div>

    <?php
}

function project_links_metabox_save( $post_id ) {

    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'project_links_metabox_nonce' ) ) return;

    if( !current_user_can( 'edit_post' ) ) return;

    if( isset( $_POST['project_links_metabox_github_url'] ) )
        update_post_meta( $post_id, 'project_links_metabox_github_url', esc_url( $_POST['project_links_metabox_github_url'] ) );

    if( isset( $_POST['project_links_metabox_wp_org_url'] ) )
        update_post_meta( $post_id, 'project_links_metabox_wp_org_url', esc_url( $_POST['project_links_metabox_wp_org_url'] ) );
}
add_action( 'save_post', 'project_links_metabox_save' );
