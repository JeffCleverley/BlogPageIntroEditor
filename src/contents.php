<?php
/**
 * Business Logic for the front end to grab content from the database,
 * prepare it for rendering, and then call the view.
 *
 */
namespace BlogPageIntroEditor;

add_action( 'after_setup_theme', __NAMESPACE__ . '\unregister_callbacks' );
/**
 * Unregister callbacks after they have been registered.
 * Unregister the standard genesis header for page_for_posts.
 *
 * @since  0.0.1
 *
 * @return void
 */
function unregister_callbacks() {
    remove_action( 'genesis_before_loop', 'genesis_do_posts_page_heading' );
}

add_action( 'genesis_before_loop', __NAMESPACE__ . '\render_content_to_page_for_posts' );
/**
 * Render out the editor content for the page_for_posts.
 *
 * @since  0.0.1
 *
 * @return void
 */
function render_content_to_page_for_posts() {

    if( ! is_home() ) {
        return;
    }

    $page_for_posts = get_page_for_posts();

    if( ! $page_for_posts ) {
        return;
    }

    $contents = prepare_contents_for_rendering( $page_for_posts->post_content );
    $title = esc_html($page_for_posts->post_title);

    include( 'views/contents-view.php' );
}

/**
 * Get the page_for_post data and object from database.
 *
 * @since  0.0.1
 *
 * @return null | \WP_Post
 */
function get_page_for_posts() {

    $page_for_posts_id = get_option( 'page_for_posts' );

    return get_post( $page_for_posts_id );
}

/**
 * Prepares raw contents from the database for rendering.
 * Strips disallowed HTML tags, prepares any shortcodes, adds paragraph tags.
 *
 * @since   0.0.1
 * @param   string  $post_content from database.
 *
 * @return  string  With only allowed HTML tags.
 */
function prepare_contents_for_rendering( $post_content ) {

    $post_content = wp_kses_post( $post_content );
    $post_content = do_shortcode( $post_content );

    return wpautop( $post_content );
}
