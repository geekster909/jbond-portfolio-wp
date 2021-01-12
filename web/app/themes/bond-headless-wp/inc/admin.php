<?php
/**
 * Admin filters.
 *
 * @package  Bond_Headless_WP
 */

/**
 * Declare support for the Featured Image
 */
add_theme_support( 'post-thumbnails' );

/**
 * By default, in Add/Edit Post, WordPress moves checked categories to the top of the list and unchecked to the bottom.
 * When you have subcategories that you want to keep below their parents at all times, this makes no sense.
 * This function removes automatic reordering so the categories widget retains its order regardless of checked state.
 * Thanks to https://stackoverflow.com/a/12586404
 *
 * @param arr $args Array of arguments.
 * @return arr
 */
function taxonomy_checklist_checked_ontop_filter( $args ) {
  $args['checked_ontop'] = false;
  return $args;
}

add_filter( 'wp_terms_checklist_args', 'taxonomy_checklist_checked_ontop_filter' );

/**
 * Customize the preview button in the WordPress admin to point to the headless client.
 *
 * @param  str $link The WordPress preview link.
 * @return str The headless WordPress preview link.
 */
function set_headless_preview_link( $link ) {
  $post = get_post();
  if ( ! $post ) {
    return $link;
  }
  $status      = 'revision';
  $frontend    = get_frontend_origin();
  $parent_id   = $post->post_parent;
  $revision_id = $post->ID;
  $type        = get_post_type( $parent_id );
  $nonce       = wp_create_nonce( 'wp_rest' );
  if ( 0 === $parent_id ) {
      $status = 'draft';
  }
  return "$frontend/_preview/$parent_id/$revision_id/$type/$status/$nonce";
}

add_filter( 'preview_post_link', 'set_headless_preview_link' );

/**
 * Includes preview link in post data for a response.
 *
 * @param \WP_REST_Response $response The response object.
 * @param \WP_Post          $post     Post object.
 * @return \WP_REST_Response The response object.
 */
function set_preview_link_in_rest_response( $response, $post ) {
  if ( 'draft' === $post->post_status ) {
    $response->data['preview_link'] = get_preview_post_link( $post );
  }

  return $response;
}

add_filter( 'rest_prepare_post', 'set_preview_link_in_rest_response', 10, 2 );
add_filter( 'rest_prepare_page', 'set_preview_link_in_rest_response', 10, 2 );

/**
 * Hide menu pages in WordPress Admin
 */
// function bond_hide_menu_pages() {
//   // echo '<pre>'; print_r($GLOBALS[ 'menu' ], TRUE); echo '</pre>';die('here');
//   $currentUser = wp_get_current_user();
//   $currentUserEmail = $currentUser->data->user_email;

//   // if user doesnt have company domain (weareenvoy.com) domain, hide admin menus
//   if (strpos($currentUserEmail, 'weareenvoy.com') === false) {
//     remove_menu_page('plugins.php'); // Plugins
//     remove_menu_page('themes.php'); // Themes
//     remove_menu_page('tools.php'); // Tools
//     remove_menu_page('edit-comments.php'); // Comments
//     // remove_menu_page('options-general.php'); // General Settings
//     remove_submenu_page('options-general.php', 'options-writing.php'); // Writing Settings
//     remove_submenu_page('options-general.php', 'options-reading.php'); // Reading Settings
//     remove_submenu_page('options-general.php', 'options-discussion.php'); // Discussion Settings
//     remove_submenu_page('options-general.php', 'options-media.php'); // Media Settings
//     remove_submenu_page('options-general.php', 'options-permalink.php'); // Permalink Settings
//     remove_submenu_page('options-general.php', 'options-privacy.php'); // Privacy Settings
//   }

//   // if user has author role, hide additional menus
//   if(current_user_can( 'author' )) {
//     remove_menu_page('edit.php?post_type=news'); // CPT News
//     remove_menu_page('edit.php?post_type=work'); // CPT Work
//     remove_menu_page('edit.php?post_type=people'); // CPT People
//   }
// }
// add_action( 'admin_menu', 'bond_hide_menu_pages' );

/**
 * Add css to admin post types to hide elements
 */
// function posttype_admin_css() {
//   global $post_type;
//   $post_types = array(
//     /* set post types */
//     'news',
//     'work',
//     'people',
//     'post',
//     'page',
//   );

//   if(in_array($post_type, $post_types)) {
//     $style = '';
//     $style .= '<style type="text/css">';
//     $style .= '.editor-post-preview, .edit-post-post-visibility';
//     $style .= '{display: none;}';
//     $style .= '</style>';

//     echo $style;
//   }
// }
// add_action( 'admin_head-post-new.php', 'posttype_admin_css' );
// add_action( 'admin_head-post.php', 'posttype_admin_css' );

/**
 * Correct Permalinks - Point links inside WP Admin to the correct front-end domain
 */
// add_filter( 'home_url', function( $url, $path, $orig_scheme, $blog_id = null ) {
//   return str_replace(
//     WP_HOME,
//     WP_STATIC_SITEURL,
//     $url
//   );
// }, 10, 4 );

/**
 * Correct Permalinks - keep WP REST API routes unchanged, so they can still be called, e.g., through the front end.
 */
// add_filter( 'rest_url', function( $url, $path, $orig_scheme, $blog_id = null ) {
//   return str_replace(
//     WP_STATIC_SITEURL,
//     WP_HOME,
//     $url
//   );
// }, 10, 4 );
