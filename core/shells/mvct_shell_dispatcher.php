<?php

class MvctShellDispatcher {

	function __construct($args) {
		if (! defined('MVCT_SHELL_PATH')) {
			define('MVCT_SHELL_PATH', MVCT_CORE_PATH.'/shells');
		}
		$this->dispatch($args);
	}

	private function dispatch($args) {
		$shell_name = ($args[1]) ? $args[1] : 'help';
		$method = ($args[2]) ? $args[2] : 'main';
		$name = ($args[3]) ? $args[3] : '';

		$title = 'mvct_'.$shell_name.'_shell';
		$class = MvctInflector::camelize($title);
		$path = MVCT_SHELL_PATH.'/'.$title.'.php';

		if (! file_exists($path)) {
			$this->illegal_option($args[1]);
			$this->dispatch(array('', 'help'));
		}

		require_once $path;
		$obj = new $class;

		if (! method_exists($obj, $method)) {
			$this->illegal_option($args[2]);
			$this->dispatch(array('', 'help'));
		}

		if ($shell_name != 'help' && ! $name) {
			$this->illegal_option($args[3]);
			$this->dispatch(array('', 'help'));
		}

		$obj->$method($name);
		die();
	}

	private function illegal_option($opt) {
		echo "mvct: illegal option -- $opt\n";
	}

}
