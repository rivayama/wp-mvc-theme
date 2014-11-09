<?php
/*
Plugin Name: WP MVC Theme
Plugin URI: https://github.com/rivayama/wp-mvc-theme
Description: Sets up an MVC framework for theme development.
Author: rivayama
Author URI: https://github.com/rivayama
Version: 0.1
*/

if (! defined('MVCT_PLUGIN_PATH')) {
	define('MVCT_PLUGIN_PATH', dirname(__FILE__));
}

require_once MVCT_PLUGIN_PATH.'/core/mvct_loader.php';
$loader = new MvctLoader();
