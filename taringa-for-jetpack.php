<?php
/**
 * Plugin Name: Taringa! for Jetpack
 * Plugin URI: https://github.com/eliorivero/taringa-for-jetpack/
 * Description: Extension for Jetpack's Sharing to allow sharing a post to Taringa!
 * Author: Elio Rivero
 * Version: 0.0.7
 * Author URI: https://twitter.com/eliorivero
 * Text Domain: jetpack
 * Domain Path: /languages
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

define( 'JPFT__PLUGIN_DIR',  plugin_dir_path( __FILE__ ) );
define( 'JPFT__PLUGIN_FILE', __FILE__ );

// Localize
add_action( 'plugins_loaded', 'jpft_localization' );

// Check if Jetpack is active
add_action( 'admin_init', 'jptf_check_jetpack_active' );

// If Jetpack is loaded, start this extension
add_action( 'jetpack_modules_loaded', 'jptf_init' );

/**
 * Add button, enqueue assets and initialize everything.
 *
 * @since 0.0.7
 */
function jptf_init() {
	// Insert our CSS and JS
	add_action( 'load-settings_page_sharing', 'jpft_enqueue_assets' );
	add_action( 'wp_enqueue_scripts', 'jpft_enqueue_assets' );

	// Add button
	add_filter( 'sharing_services', 'jpft_add_sharing' );
}

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
 * Register styles and scripts.
 *
 * @since 0.0.7
 */
function jpft_enqueue_assets() {
	wp_enqueue_style( 'share-taringa', plugins_url( 'css/share-taringa.css', __FILE__ ), array(), JETPACK__VERSION );
}

/**
 * Initialize localization routines.
 *
 * @since 0.0.7
 */
function jpft_localization() {
	load_plugin_textdomain( 'jetpack', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
}

/**
 * If Jetpack is not active, don't activate this plugin.
 *
 * @since 0.0.7
 */
function jptf_check_jetpack_active() {
	if ( ! class_exists( 'Jetpack' ) ) {
		add_action( 'admin_notices', 'jptf_jetpack_not_active' );
		deactivate_plugins( plugin_basename( __FILE__ ) );
		unset( $_GET['activate'] );
	}
}

/**
 * Show a notice alerting user to install Jetpack.
 *
 * @since 0.0.7
 */
function jptf_jetpack_not_active() {
?>
	<div class="notice notice-error is-dismissible">
		<p><?php esc_html_e( 'Taringa for Jetpack requires the Jetpack plugin to be active on this WordPress installation!', 'jetpack' ); ?></p>
	</div>
<?php
}
