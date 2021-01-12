<?php
/**
 * Plugin Name: BP
 * Description: Bond Portal
 * Author: Justin Bond
 * Author URI: https://justinbond.dev
 */
if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

require_once __DIR__ . '/bond-portal/config.php';
require_once __DIR__ . '/bond-portal/bond-portal.php';

function bp_run() {
    if (is_admin()) {
        $app = new Bp();
    }
}

add_action('init', 'bp_run');

require_once __DIR__ . '/bond-portal/lib/functions.php';
