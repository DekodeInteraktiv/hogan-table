<?php
/**
 * Plugin Name: Hogan Module: Table
 * Plugin URI: https://github.com/dekodeinteraktiv/hogan-table
 * GitHub Plugin URI: https://github.com/dekodeinteraktiv/hogan-table
 * Description: Table Module for Hogan.
 * Version: 1.2.1
 * Author: Dekode
 * Author URI: https://dekode.no
 * License: GPL-3.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-3.0.en.html
 *
 * Text Domain: hogan-table
 * Domain Path: /languages/
 *
 * @package Hogan
 * @author Dekode
 */

declare( strict_types = 1 );
namespace Dekode\Hogan\Table;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_action( 'plugins_loaded', __NAMESPACE__ . '\\hogan_load_textdomain' );
add_action( 'hogan/include_modules', __NAMESPACE__ . '\\register_module', 10, 1 );

/**
 * Register module text domain
 */
function hogan_load_textdomain() {
	\load_plugin_textdomain( 'hogan-table', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}

/**
 * Register module in Hogan
 *
 * @param \Dekode\Hogan\Core $core Hogan Core instance.
 * @return void
 */
function register_module( \Dekode\Hogan\Core $core ) {
	require_once 'class-table.php';
	$core->register_module( new \Dekode\Hogan\Table() );
}
