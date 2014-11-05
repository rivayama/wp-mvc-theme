<?php

class MvctTemplater {

	public $msg;

	function __construct() {
		$this->template_dir = MVCT_CORE_PATH.'/templates';
	}

	public function get_message() {
		return $this->msg;
	}

	public function create($template, $target_path, $vars=array()) {
		$template_path = $this->template_dir.'/'.$template.'.php';
		if (! file_exists($template_path)) {
			$this->msg = "Template `$template` does not exist.\n";
			return;
		}
		if (file_exists($target_path)) {
			$this->msg = "`$target_path` already exists.\n";
			return;
		}

		extract($vars);
		ob_start();
		require $template_path;
		$content = ob_get_clean();

		$this->create_file($target_path, $content);
		$this->msg = "`$target_path` created.\n";
		return;
	}

	private function create_file($path, $content) {
		$fp = fopen($path, 'a');
		fwrite($fp, $content);
		fclose($fp);
	}

}
