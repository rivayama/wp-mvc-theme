<?php

class MvctLoader {

	function __construct() {
		if (! defined('MVCT_CORE_PATH')) {
			define('MVCT_CORE_PATH', MVCT_PLUGIN_PATH.'/core');
		}
		if (! defined('MVCT_CURRENT_THEME_PATH')) {
			define('MVCT_CURRENT_THEME_PATH', get_template_directory());
		}
		$this->load_core();
	}

	protected function load_core() {
		$files = array(
			'mvct_functions',
			'mvct_controller',
			'mvct_inflector',
			'mvct_helper',
			'mvct_templater',
			'shells/mvct_shell_dispatcher',
		);
		foreach ($files as $file) {
			require_once MVCT_CORE_PATH.'/'.$file.'.php';
		}
	}

}
