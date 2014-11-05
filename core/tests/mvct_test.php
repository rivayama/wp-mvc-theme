<?php

class MvctTest {

	public static function getElement($target) {
		ob_start();
		get_element($target);
		$buf = ob_get_contents();
		ob_end_clean();
		return $buf;
	}

	public static function initPost($request_uri) {
		$_SERVER['REQUEST_URI'] = $request_uri;
		wp_cache_reset();
		wp();
		require_once(ABSPATH . WPINC . '/template-loader.php');
		the_post();
	}

}
