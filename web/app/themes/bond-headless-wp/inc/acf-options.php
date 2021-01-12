<?php
/**
 * Add ACF options page.
 *
 * @package  Bond_Headless_WP
 */

// Add a custom options page to associate ACF fields.
if ( function_exists( 'acf_add_options_page' ) ) {
  acf_add_options_page(
    array(
      'page_title' => 'Global Settings',
      'menu_title' => 'Global',
      'menu_slug'  => 'global-settings',
      'capability' => 'manage_options',
      'post_id'    => 'global-settings',
      'redirect'   => false,
    )
  );
}
