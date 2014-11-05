<?php

class MvctHelper {

	public function link($text, $href, $options=array()) {
		$default = array(
			'escape' => true,
		);
		$options = array_merge($default, $options);
		if ($options['escape']) {
			$text = h($text);
		}
		unset($options['escape']);
		$opts = self::parse_options($options);
		$html = sprintf('<a href="%s"%s>%s</a>', $href, $opts, $text);
		return $html;
	}

	private function parse_options($options) {
		$opt = '';
		foreach ($options as $key => $val) {
			if (! $val) continue;
			$opt .= sprintf(' %s="%s"', $key, h($val));
		}
		return $opt;
	}

}
