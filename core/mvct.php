<?php

$wordpress_path = dirname(__FILE__).'/../../../..';
require_once $wordpress_path.'/wp-load.php';
$shell = new MvctShellDispatcher($argv);
echo "\n";
