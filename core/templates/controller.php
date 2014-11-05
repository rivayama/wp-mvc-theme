<?php echo "<?php\n"; ?>

class <?php echo $name_camel; ?>Controller extends MvctController {

	public $uses = array();

	public function exec() {
		$this->render_view('<?php echo $name_snake; ?>');
	}

}
