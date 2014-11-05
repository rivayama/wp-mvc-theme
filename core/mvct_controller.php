<?php

abstract class MvctController {

	public $view_vars = array();
	public $uses = array();

	public function __construct() {
		foreach ($this->uses as $model) {
			$filename = MvctInflector::snakize($model);
			require_once MVCT_CORE_PATH.'/models/'.$filename.'.php';
			$this->$model = new $model;
		}
	}

	abstract public function exec();

	public function set($name, $obj) {
		$this->view_vars[$name] = $obj;
	}

	public function render_view($view) {
		extract($this->view_vars);
		require MVCT_CURRENT_THEME_PATH.'/elements/views/'.$view.'.php';
	}

}
