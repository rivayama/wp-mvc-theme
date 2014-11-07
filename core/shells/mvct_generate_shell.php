<?php

class MvctGenerateShell {

	function __construct() {
		$this->templater = new MvctTemplater;
	}

	public function theme($args) {
		list($theme_name) = $args;
		if (! $theme_name) {
			echo "Theme name should be specified.\n";
			exit();
		}
		if ($this->theme_exists($theme_name)) {
			echo "Theme `$theme_name` already exists.\n";
			die();
		}
		$vars = $this->get_vars($theme_name);
		$theme_path = $this->get_theme_path($theme_name);
		$directories = array(
			'elements',
			'elements/controllers',
			'elements/models',
			'elements/views',
			'libs',
			'tests',
			'tests/fixtures',
		);
		mkdir($theme_path);
		foreach ($directories as $dir) {
			mkdir($theme_path.'/'.$dir);
		}
		$this->templater->create('theme/style', $theme_path.'/style.css', $vars);
		$this->templater->create('theme/header', $theme_path.'/header.php', $vars);
		$this->templater->create('theme/sidebar', $theme_path.'/sidebar.php', $vars);
		$this->templater->create('theme/footer', $theme_path.'/footer.php', $vars);
		$this->templater->create('theme/phpunit', $theme_path.'/phpunit.xml', $vars);
		$this->templater->create('template', $theme_path.'/index.php', $vars);
		echo "Theme `$theme_name` created.\n";
	}

	public function template($args) {
		if (! $this->validate_args($args, __METHOD__)) die();
		list($theme_name, $target) = $args;
		$vars = $this->get_vars($target);
		$file = $this->get_theme_path($theme_name).'/'.$vars['name_snake'].'.php';
		$this->templater->create('template', $file, $vars);
		echo $this->templater->get_message();
	}

	public function element($args) {
		$this->controller($args);
		$this->model($args);
		$this->view($args);
		$this->test($args);
	}

	public function controller($args) {
		if (! $this->validate_args($args, __METHOD__)) die();
		list($theme_name, $target) = $args;
		$vars = $this->get_vars($target);
		$file = $this->get_theme_path($theme_name).'/elements/controllers/'.$vars['name_snake'].'_controller.php';
		$this->templater->create('controller', $file, $vars);
		echo $this->templater->get_message();
	}

	public function model($args) {
		if (! $this->validate_args($args, __METHOD__)) die();
		list($theme_name, $target) = $args;
		$vars = $this->get_vars($target);
		$file = $this->get_theme_path($theme_name).'/elements/models/'.$vars['name_snake'].'.php';
		$this->templater->create('model', $file, $vars);
		echo $this->templater->get_message();
	}

	public function view($args) {
		if (! $this->validate_args($args, __METHOD__)) die();
		list($theme_name, $target) = $args;
		$vars = $this->get_vars($target);
		$file = $this->get_theme_path($theme_name).'/elements/views/'.$vars['name_snake'].'.php';
		$this->templater->create('view', $file, $vars);
		echo $this->templater->get_message();
	}

	public function test($args) {
		if (! $this->validate_args($args, __METHOD__)) die();
		list($theme_name, $target) = $args;
		$vars = $this->get_vars($target);
		$file = $this->get_theme_path($theme_name).'/tests/'.$vars['name_camel'].'Test.php';
		$this->templater->create('test', $file, $vars);
		echo $this->templater->get_message();
	}

	public function fixture($args) {
		if (! $this->validate_args($args, __METHOD__)) die();
		list($theme_name, $target) = $args;
		$vars = $this->get_vars($target);
		$file = $this->get_theme_path($theme_name).'/tests/fixtures/'.$vars['name_snake'].'.yml';
		$this->templater->create('fixture', $file, $vars);
		echo $this->templater->get_message();
	}

	// {{{ Privates

	private function get_vars($name) {
		return array(
			'name_camel' => MvctInflector::camelize($name),
			'name_snake' => MvctInflector::snakize($name),
		);
	}

	private function get_theme_path($theme_name) {
		return get_theme_root().'/'.MvctInflector::snakize($theme_name);
	}

	private function theme_exists($theme_name) {
		$theme_path = $this->get_theme_path($theme_name);
		if (file_exists($theme_path)) {
			return true;
		}
		return false;
	}

	private function validate_args($args, $method) {
		list($theme_name, $target) = $args;
		if (! $theme_name) {
			echo "Theme name should be specified.\n";
			return false;
		}
		if (! $target) {
			echo "$method name should be specified.\n";
			return false;
		}
		if (! $this->theme_exists($theme_name)) {
			echo "Theme `$theme_name` does not exists.\n";
			return false;
		}
		return true;
	}

	// }}}

}
