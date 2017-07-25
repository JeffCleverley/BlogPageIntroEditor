<?php
/**
* Add awesome introduction content to your blog page using the built-in WordPress TinyMCE editor!
*
* @package      BlogPageIntroEditor
* @since        0.0.1
* @author       Jeff Cleverley
* @link         https://jeffcleverley.com
* @copyright    Jeff Cleverley
* @license      GNU General Public License 2.0+
*
* @wordpress-plugin
* Plugin Name:  Blog Page Intro Editor
* Plugin URI:   https://github.com/JeffCleverley/BlogPageIntroEditor.git
* Description:  Add awesome introduction content to your blog page using the built-in WordPress TinyMCE editor!
* Version:      0.0.1
* Author:       Jeff Cleverley
* Author URI:   https://jeffcleverley.com
* License:      GPL-2.0+
* License URI:  http://www.gnu.org/licenses/gpl-2.0.txt
* Text Domain:  Blog_Page_Intro_Editor
* Requires WP:  4.7.5
*
*/
namespace BlogPageIntroEditor;

if ( ! defined( 'ABSPATH' ) ) {
    exit( 'What exactly do you think you\'re doing?' );
}

require_once( __DIR__ . '/assets/vendor/autoload.php' );
