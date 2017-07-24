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

add_action( 'edit_form_after_title', __NAMESPACE__ . '\enable_editor_for_page_for_posts', 99 );
/**
* Enable editor on the page_for_posts page, to allow the user to add content.
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
            posts_page_notice_editor_introduction();
        }

        add_post_type_support( 'page', 'editor' );
    }
}

function posts_page_notice_editor_introduction() {

    $message = '<div class="notice notice-info is-dismissible inline"><p>';
    $message .= __( 'Add some content, using the editor below, to introduce your users to your awesome blog page and it\'s incredible content!' );
    $message .='</p></div>';

    echo $message;
}
