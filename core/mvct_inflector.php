<?php

class MvctInflector {

	public static function underscore($str) {
		return str_replace('-', '_', $str);
	}

	public static function camelize($str) {
		$str = self::underscore($str);
		$str = str_replace('_', ' ', $str);
		return str_replace(' ', '', ucwords($str));
	}

	public static function snakize($str) {
		$str = self::underscore($str);
		$str = lcfirst($str);
		$str = preg_replace('/[A-Z]/', ' $0', $str);
		$str = strtolower($str);
		$str = str_replace(' ', '_', $str);
		return $str;
	}

}
