<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://gnom.studio
 * @since             1.0.0
 * @package           Gnomtools
 *
 * @wordpress-plugin
 * Plugin Name:       Gnom Studio
 * Plugin URI:        https://gnom.studio
 * Description:       The plugin for websites maintained by Gnom Studio.
 * Version:           1.0.0
 * Author:            Gnom Studio
 * Author URI:        https://gnom.studio
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       gnomtools
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'GNOMTOOLS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-gnomtools-activator.php
 */
function activate_gnomtools() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-gnomtools-activator.php';
	Gnomtools_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-gnomtools-deactivator.php
 */
function deactivate_gnomtools() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-gnomtools-deactivator.php';
	Gnomtools_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_gnomtools' );
register_deactivation_hook( __FILE__, 'deactivate_gnomtools' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-gnomtools.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_gnomtools() {

	$plugin = new Gnomtools();
	$plugin->run();

}
run_gnomtools();


// add_action( 'wp_dashboard_setup', 'ci_dashboard_add_widgets' );
// function ci_dashboard_add_widgets() {
// 	wp_add_dashboard_widget( 'dw_dashboard_widget_news', __( 'CSSIgniter News', 'dw' ), 'dw_dashboard_widget_news_handler' );
// }

// function dw_dashboard_widget_news_handler() {
// 	_e( 'This is some dfsdfsdftext.', 'dw' );
// }

function register_my_dashboard_widget() {
	global $wp_meta_boxes;

   wp_add_dashboard_widget(
	   'my_dashboard_widget',
	   'GNOM STUDIO',
	   'my_dashboard_widget_display'
   );

	$dashboard = $wp_meta_boxes['dashboard']['normal']['core'];

   $my_widget = array( 'my_dashboard_widget' => $dashboard['my_dashboard_widget'] );
	unset( $dashboard['my_dashboard_widget'] );

	$sorted_dashboard = array_merge( $my_widget, $dashboard );
	$wp_meta_boxes['dashboard']['normal']['core'] = $sorted_dashboard;
}
add_action( 'wp_dashboard_setup', 'register_my_dashboard_widget' );

function my_dashboard_widget_display() {
   ?>

   <p>
   This website is maintained by your friendly Gnomes. Feel free to contact us if you need any help!
   </p>

   <p>
   For particularly time-sensitive posts please contact the editor in chief to make sure the required time does not conflict with any ongoing projects.
   </p>

   <a class="button" href="https://gnom.studio">Contact us</a>

   <?php
}


//login styles
function wpb_login_logo() { ?>
    <style type="text/css">
body {
    background: #e6f3f6 !important;
    display: flex;
    justify-content: center;
    width: 100vw !important;
}

#login {
    flex-flow: row wrap;
    width: 100% !important;
    margin-left: auto;
    margin-right: auto;
    padding: 0 !important;
    display: flex;
    margin: 0 !important;
}

.login h1 {
	text-align: center;
	width: 50%;
	background: url(https://images.unsplash.com/photo-1547419543-db0732b9dd06?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=900&q=60);
	background-size: cover;
    background-position: center center;
    position: relative;
    overflow: hidden;
}

.login h1 a {
    display: none !important;

}

.login form {
	border: 0;
    border-radius: 0px;
    padding: 0;
    padding-left: 2%;
    padding-right: 3%;
	font-weight: bold;
	font-family: -apple-system, BlinkMacSystemFont, sans-serif;
	width: 45%;
	height: 100vh;
	display: flex;
	flex-direction: column;
    justify-content: center;
    margin-top: 0 !important;
    padding-bottom: 25px;
    overflow: hidden;
}

#loginform::before {
	/* content: url(https://i.imgur.com/fbtF77U.png); */
	text-align: center;
	margin-bottom: 5%;
	width: 100%;
	height: 55px;
	/* left: 50%; */
	/* position: relative; */
	/* left: 50%; */
	background: url(https://i.imgur.com/CtWtTdS.png) !important;
	background-position: center !important;
	background-size: 190px !important;
	content: '';
	background-repeat: no-repeat !important;
}

.login .button-primary {
    float: left;
    margin-top: 20px;
    background: none;
    color: black;
    font-weight: bold;
    border-radius: 0px;
    border-color: black;
}

.wp-core-ui .button-primary.focus, .wp-core-ui .button-primary.hover, .wp-core-ui .button-primary:focus, .wp-core-ui .button-primary:hover {
    background: black;
}

.wp-core-ui .button-group.button-large .button, .wp-core-ui .button.button-large {
    width: 100%;
}

input[type="color"], input[type="date"], input[type="datetime-local"], input[type="datetime"], input[type="email"], input[type="month"], input[type="number"], input[type="password"], input[type="search"], input[type="tel"], input[type="text"], input[type="time"], input[type="url"], input[type="week"], select, textarea {
    border-radius: 0;
    border: 0;
}

.login form .input, .login form input[type="checkbox"], .login input[type="text"] {
    background: #F2F2F2;
}

#nav {
    display: none;
}

#backtoblog {
    display: none;
}

.wp-core-ui .button, .wp-core-ui .button-secondary {
    color: black;
}

.login #login_error {
    border-left-color: black;
    position: fixed;
}

.message {
    position: fixed;
    width: 100%;
    left: 50%;
}

#login_error {
    position: fixed;
    z-index: 9;
    left: 50%;
    top: 10%;
}

.login #login_error, .login .message, .login .success {
    border-left: 0px;
    padding: 12px;
    margin-left: 0;
    margin-bottom: 20px;
    background-color: black;
    box-shadow: 0 10px 10px 0 rgba(0,0,0,.1);
    color: white;
    font-weight: bolder;
}

@media (max-width: 450px) {
    #login {
        flex-flow: row wrap;
    }

    .login h1 {
        height: 350px;
        width: 100%;
    }

    .login form {
        width: 100%;
        height: auto;
        margin-top: 0;
    }
    body {
        background: white;
    }
}
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'wpb_login_logo' );


include_once('updater.php');



if (is_admin()) { // note the use of is_admin() to double check that this is happening in the admin
	$config = array(
		'slug' => plugin_basename(__FILE__), // this is the slug of your plugin
		'proper_folder_name' => 'gnomtools', // this is the name of the folder your plugin lives in
		'api_url' => 'https://api.github.com/repos/dirk789/GNOM-Tools', // the GitHub API url of your GitHub repo
		'raw_url' => 'https://raw.github.com/dirk789/GNOM-Tools/master', // the GitHub raw url of your GitHub repo
		'github_url' => 'https://github.com/dirk789/GNOM-Tools', // the GitHub url of your GitHub repo
		'zip_url' => 'https://github.com/dirk789/GNOM-Tools/zipball/master', // the zip url of the GitHub repo
		'sslverify' => true, // whether WP should check the validity of the SSL cert when getting an update, see https://github.com/jkudish/WordPress-GitHub-Plugin-Updater/issues/2 and https://github.com/jkudish/WordPress-GitHub-Plugin-Updater/issues/4 for details
		'requires' => '3.0', // which version of WordPress does your plugin require?
		'tested' => '3.3', // which version of WordPress is your plugin tested up to?
		'readme' => 'README.md', // which file to use as the readme for the version number
		'access_token' => '', // Access private repositories by authorizing under Appearance > GitHub Updates when this example plugin is installed
	);
	new WP_GitHub_Updater($config);
}