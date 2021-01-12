<?php
/**
 * API Modifications.
 *
 * @package  Bond_Headless_WP
 */

// class WPAPIYoastMeta {
//   function __construct() {
//     add_action('rest_api_init', array($this, 'add_yoast_data'));
//   }

//   function add_yoast_data() {
//     // Posts
//     register_rest_field( 'post',
//       'yoast',
//         array(
//           'get_callback'    => array( $this, 'wp_api_encode_yoast' ),
//           'update_callback' => null,
//           'schema'          => null,
//         )
//       );

//     // Pages
//     register_rest_field( 'page',
//       'yoast',
//       array(
//         'get_callback'    => array( $this, 'wp_api_encode_yoast' ),
//         'update_callback' => null,
//         'schema'          => null,
//       )
//       );

//     // Public custom post types
//     $types = get_post_types(array(
//       'public' => true,
//       '_builtin' => false
//     ));
//     foreach($types as $key => $type) {
//       register_rest_field( $type,
//         'yoast',
//         array(
//           'get_callback'    => array( $this, 'wp_api_encode_yoast' ),
//           'update_callback' => null,
//           'schema'          => null,
//         )
//       );
//     }
//   }

//   function wp_api_encode_yoast($post, $field_name, $request) {
//     $yoast_title = get_post_meta( $post['id'], '_yoast_wpseo_title', true );
//     $yoast_desc = get_post_meta( $post['id'], '_yoast_wpseo_metadesc', true );
    
//     $metatitle_val = wpseo_replace_vars($yoast_title, $post );
//     $metatitle_val = apply_filters( 'wpseo_title', $metatitle_val );

//     $metadesc_val = wpseo_replace_vars($yoast_desc, $post );
//     $metadesc_val = apply_filters( 'wpseo_metadesc', $metadesc_val );

//     $yoastMeta = array(
//       'focuskw' => get_post_meta($post['id'],'_yoast_wpseo_focuskw', true),
//       'title' => $metatitle_val,
//       'metadesc' => $metadesc_val,
//       'linkdex' => get_post_meta($post['id'], '_yoast_wpseo_linkdex', true),
//       'metakeywords' => get_post_meta($post['id'], '_yoast_wpseo_metakeywords', true),
//       'meta-robots-noindex' => get_post_meta($post['id'], '_yoast_wpseo_meta-robots-noindex', true),
//       'meta-robots-nofollow' => get_post_meta($post['id'], '_yoast_wpseo_meta-robots-nofollow', true),
//       'meta-robots-adv' => get_post_meta($post['id'], '_yoast_wpseo_meta-robots-adv', true),
//       'canonical' => get_post_meta($post['id'], '_yoast_wpseo_canonical', true),
//       'redirect' => get_post_meta($post['id'], '_yoast_wpseo_redirect', true),
//       'opengraph-title' => get_post_meta($post['id'], '_yoast_wpseo_opengraph-title', true),
//       'opengraph-description' => get_post_meta($post['id'], '_yoast_wpseo_opengraph-description', true),
//       'opengraph-image' => get_post_meta($post['id'], '_yoast_wpseo_opengraph-image', true),
//       'twitter-title' => get_post_meta($post['id'], '_yoast_wpseo_twitter-title', true),
//       'twitter-description' => get_post_meta($post['id'], '_yoast_wpseo_twitter-description', true),
//       'twitter-image' => get_post_meta($post['id'], '_yoast_wpseo_twitter-image', true)
//     );

//     return (array) $yoastMeta;
//   }
// }

// $WPAPIYoastMeta = new WPAPIYoastMeta();

// HTML entity decode title
function replace_the_title_filter( $content ) {

    $content = html_entity_decode($content);

    // Returns the content.
    return $content;
}
add_filter( 'the_title', 'replace_the_title_filter', 20 );

// HTML entity decode content
function replace_the_content_filter( $content ) {

    if ( is_single() )
    $content = html_entity_decode($content);

    // Returns the content.
    return $content;
}
add_filter( 'the_content', 'replace_the_content_filter', 20 );