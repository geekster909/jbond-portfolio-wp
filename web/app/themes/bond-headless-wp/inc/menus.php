<?php
/**
 * Register main menu.
 *
 * @package  Bond_Headless_WP
 */

/**
 * Register navigation menu.
 *
 * @return void
 */
function register_menus() {
  register_nav_menu( 'main-menu', __( 'Main Menu', 'bond-headless-wp' ) );
  register_nav_menu( 'footer-menu', __( 'Footer Menu', 'bond-headless-wp' ) );
}
add_action( 'after_setup_theme', 'register_menus' );
