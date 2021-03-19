<?php
/**
 * Redirect frontend requests to REST API.
 *
 * @package  Bond_Headless_WP
 */

// Redirect main URL to static site and individual posts to the REST API endpoint.
if (is_front_page()) {
  header( 'Location: https://justinbond.dev' );
} else if ( is_singular() ) {
  header(
    sprintf(
      'Location: /wp-json/wp/v2/%s/%s',
      get_post_type_object( get_post_type() )->rest_base,
      get_post()->ID
    )
  );
} else {
  header( 'Location: /wp-json/' );
}
