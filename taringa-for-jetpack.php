<?php
/**
 * Plugin Name: Taringa for Jetpack
 * Plugin URI: https://github.com/eliorivero/taringa-for-jetpack/
 * Description: Sharing button and Publicize extension for Taringa
 * Author: Automattic
 * Version: 0.0.7
 * Author URI: https://automattic.com/
 * Text Domain: jetpack
 * Domain Path: /languages
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

define( 'JPFT__PLUGIN_DIR',  plugin_dir_path( __FILE__ ) );
define( 'JPFT__PLUGIN_FILE', __FILE__ );

// Localize
add_action( 'plugins_loaded', 'jpft_localization' );

// Insert our CSS and JS
add_action( 'load-settings_page_sharing', 'jpft_sharing_head' );

// Add button
add_filter( 'sharing_services', 'jpft_add_sharing' );

/**
 * Add button to list of sharing services.
 *
 * @since 0.0.7
 */
function jpft_add_sharing( $services ) {
	include_once JPFT__PLUGIN_DIR . 'class.share-taringa.php';

	if ( ! array_key_exists( 'taringa', $services ) ) {
		$services['taringa'] = 'JPFT_Share_Taringa';
	}

	return $services;
}

/**
 * Add styles and scripts.
 *
 * @since 0.0.7
 */
function jpft_sharing_head() {
	wp_enqueue_style( 'share-taringa', plugins_url( 'css/share-taringa.css', __FILE__ ), array(), JETPACK__VERSION );
}

/**
 * Initialize localization routines.
 *
 * @since 0.0.7
 * @access public
 */
function jpft_localization() {
	load_plugin_textdomain( 'jetpack', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
}