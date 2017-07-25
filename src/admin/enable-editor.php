<?php
/**
 * Enable TinyMCE editor feature for the Blog Posts Page in the admin edit screen.
 *
 * @package BlogPageIntroEditor
 * @since   0.0.1
 * @author  Jeff Cleverley
 * @link    https://Jeffcleverley.com
 * @license GNU General Public License 2.0+
 */

namespace BlogPageIntroEditor\EnableEditor;

add_action( 'dbx_post_advanced', __NAMESPACE__ . '\remove_standard_notice' );
/**
 *  Remove the standard notice on page_for_posts.
 *
 * @since 1.0.0
 *
 * @return void
 */
function remove_standard_notice() {
	 remove_action( 'edit_form_after_title', '_wp_posts_page_notice' );
}

add_action( 'edit_form_after_title', __NAMESPACE__ . '\enable_editor_for_page_for_posts', 99 );
/**
* Enable editor on the page_for_posts page, to allow the user to add content.
* Add dismissible notice to replace the standard warning notice.
*
*  @since   0.0.1
*
*  @param   \WP_Post    $post   Current Post Object
*
*  @return  void
*
*/
function enable_editor_for_page_for_posts( $post ) {

    if ( get_option( 'page_for_posts' ) == $post->ID ) {

        if ( empty( $post->post_content ) ) {

            include( dirname( __FILE__ ) . '/../views/editor-notice-view.php' );
        }

        add_post_type_support( 'page', 'editor' );
    }
}
