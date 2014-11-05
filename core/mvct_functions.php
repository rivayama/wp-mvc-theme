<?php

function get_element($target) {
	require_once MVCT_CURRENT_THEME_PATH.'/elements/controllers/'.$target.'_controller.php';
	$controller = MvctInflector::camelize($target).'Controller';
	$obj = new $controller;
	$obj->exec();
}

function h($str) {
	return htmlspecialchars($str);
}
