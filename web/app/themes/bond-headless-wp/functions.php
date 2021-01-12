<?php
/**
 * Theme for the Bond Headless WordPress Starter Kit.
 *
 * @package  Bond_Headless_WP
 */

// Frontend origin.
require_once 'inc/frontend-origin.php';

// ACF commands.
require_once 'inc/class-acf-commands.php';

// Logging functions.
require_once 'inc/log.php';

// CORS handling.
require_once 'inc/cors.php';

// Admin modifications.
require_once 'inc/admin.php';

// Add Menus.
require_once 'inc/menus.php';

// API Modifications.
require_once 'inc/api.php';

// Add Headless Settings area.
require_once 'inc/acf-options.php';

// WPGraphql Modifications.
require_once 'inc/wpgraphql.php';

if (!function_exists('acf_nullify_empty')) {
  /**
   * Return `null` if an empty value is returned from ACF.
   *
   * @param mixed $value
   * @param mixed $post_id
   * @param array $field
   *
   * @return mixed
   */
  function acf_nullify_empty($value, $post_id, $field) {
    if (empty($value)) {
      return null;
    }
    return $value;
  }
}

add_filter('acf/format_value', 'acf_nullify_empty', 100, 3);
