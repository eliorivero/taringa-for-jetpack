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

add_action( 'plugins_loaded', 'jpft_localization' );

/**
 * Initialize localization routines
 *
 * @since 0.0.7
 * @access public
 */
function jpft_localization() {
	load_plugin_textdomain( 'jetpack', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}