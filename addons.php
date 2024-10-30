<?php
/**
 * Plugin Name: Hover Effects Bundle Visual Composer Addon
 * Plugin URI: http://webcodingplace.com/hover-effects-visual-composer
 * Description: Beautifully Designed Hover Effects for Images and Captions Visual Composer Addons
 * Version: 1.0.0
 * Author: UIElements
 * Author URI: http://webcodingplace.com/
 * License: GNU General Public License version 3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain: wcp-addons-vc
 */

require_once('plugin.class.php');

define('VCADDONS_PATH', untrailingslashit(plugin_dir_path( __FILE__ )) );
define('VCADDONS_URL', untrailingslashit(plugin_dir_url( __FILE__ )) );

if( class_exists('UI_Elements_Hover_Effects')){
	
	$just_initialize = new UI_Elements_Hover_Effects;
}

?>