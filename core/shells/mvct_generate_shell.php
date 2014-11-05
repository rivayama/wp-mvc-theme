<?php

class MvctGenerateShell {

	function __construct() {
		$this->templater = new MvctTemplater;
	}

	public function theme($name) {
		$vars = array(
			'name_camel' => MvctInflector::camelize($name),
			'name_snake' => MvctInflector::snakize($name),
		);

		$theme_path = get_theme_root().'/'.$vars['name_snake'];
		$directories = array(
			'elements',
			'elements/controllers',
			'elements/models',
			'elements/views',
			'libs',
			'tests',
			'tests/fixtures',
		);

		if (file_exists($theme_path)) {
			echo "Theme `$name` already exists.";
			return;
		}
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
		echo "Theme `$name` created.";
	}

	public function template($name) {
		$vars = array(
			'name_camel' => MvctInflector::camelize($name),
			'name_snake' => MvctInflector::snakize($name),
		);
		$path = MVCT_CURRENT_THEME_PATH;
		$file = $vars['name_snake'].'.php';
		$this->templater->create('template', $path.'/'.$file, $vars);
		echo $this->templater->get_message();
	}

	public function element($name) {
		$this->controller($name);
		$this->model($name);
		$this->view($name);
		$this->test($name);
	}

	public function controller($name) {
		$vars = array(
			'name_camel' => MvctInflector::camelize($name),
			'name_snake' => MvctInflector::snakize($name),
		);
		$path = MVCT_CURRENT_THEME_PATH.'/elements/controllers';
		$file = $vars['name_snake'].'_controller.php';
		$this->templater->create('controller', $path.'/'.$file, $vars);
		echo $this->templater->get_message();
	}

	public function model($name) {
		$vars = array(
			'name_camel' => MvctInflector::camelize($name),
		);
		$path = MVCT_CURRENT_THEME_PATH.'/elements/models';
		$file = MvctInflector::snakize($name).'.php';
		$this->templater->create('model', $path.'/'.$file, $vars);
		echo $this->templater->get_message();
	}

	public function view($name) {
		$vars = array(
			'name_camel' => MvctInflector::camelize($name),
			'name_snake' => MvctInflector::snakize($name),
		);
		$path = MVCT_CURRENT_THEME_PATH.'/elements/views';
		$file = $vars['name_snake'].'.php';
		$this->templater->create('view', $path.'/'.$file, $vars);
		echo $this->templater->get_message();
	}

	public function test($name) {
		$vars = array(
			'name_camel' => MvctInflector::camelize($name),
		);
		$path = MVCT_CURRENT_THEME_PATH.'/tests';
		$file = $vars['name_camel'].'Test.php';
		$this->templater->create('test', $path.'/'.$file, $vars);
		echo $this->templater->get_message();
	}

	public function fixture($name) {
		$vars = array(
			'name_camel' => MvctInflector::camelize($name),
			'name_snake' => MvctInflector::snakize($name),
		);
		$path = MVCT_CURRENT_THEME_PATH.'/tests/fixtures';
		$file = $vars['name_snake'].'.yml';
		$this->templater->create('fixture', $path.'/'.$file, $vars);
		echo $this->templater->get_message();
	}

}
