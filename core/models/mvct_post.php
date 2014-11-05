<?php

class MvctPost {

	public function find($options=array()) {
		$default = array(
			'post_status' => 'publish',
			'orderby' => 'post_date',
			'order' => 'desc',
			'posts_per_page' => 10,
			'category' => null,
			'exclude' => null,
		);
		$args = array_merge($default, $options);
		return get_posts($args);
	}

	public function fine_one($options=array()) {
		$options['posts_per_page'] = 1;
		$posts = $this->find($options);
		return $posts[0];
	}

}
