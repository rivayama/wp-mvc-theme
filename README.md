# WP MVC Theme

An MVC framework for WordPress theme

## Installation

1. Put `wp-mvc-theme/` into the `wp-content/plugins/` directory
2. Activate the plugin through the "Plugins" menu in WordPress
3. Create a theme using the code generation utility `mvct`:

### Code generation

Go int the WP MVC Theme directory and make sure that `mvct` is executable.

	$ cd path/to/plugins/wp-mvc-theme
	$ chmod +x mvct

Generate the theme's initial code.

	$ ./mvct generate theme city

This will generate files in `path/to/themes/city/` that create a WP MVC Theme-based theme. The theme can now be activated in WordPress.

Generate an element's initial code.

	$ ./mvct generate element news

This will generate controller, model and view for news in `path/to/themes/city/elements/`, and test in `path/to/themes/city/tests/`. The element can now be used from the theme.

You can also generate codes separately like following:

	$ ./mvct generate controller feature
	$ ./mvct generate model feature
	$ ./mvct generate view feature
	$ ./mvct generate test feature

See `help` for more detail.

	$ ./mvct help

## Usage

### Template and view

The elements can be used by `get_element()` function from template files. Modify `path/to/themes/city/index.php`.

```php
<?php get_header(); ?>

<div id="container">
	<div id="main">
		<h2>City</h2>
		<?php get_element('news'); // <- Modify here ?>
	</div>
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
```

`get_element()` executes `exec()` method on the controller, and the controller renders the view. You can now see the element replaced from `get_element('news')` to `path/to/themes/city/elements/views/news.php`.

```html
<div id="news">
	<p>News</p>
</div>
```

### Controller

Here is a simple description for the controller.

* Models which are used in the controller are set by `$uses`.
* `$this->set()` can pass variables to the view.
* `$this->render_view()` renders given view.

The example of `path/to/themes/city/elements/controllers/news_controller.php` is shown below.

```php
<?php

class NewsController extends MvctController {

	public $uses = array(
		'MvctPost',
	);

	public function exec() {
		$this->set('news', $this->MvctPost->find());
		$this->render_view('news');
	}

}
```

### Model

Fundamental models for WordPress objects like `post` are defined in `path/to/plugins/wp-mvc-theme/core/models/`.

### Unit test

`mvct generate theme` generates phpunit.xml on the theme directory, and `mvct generate element` generates an unit test file for the element. You can now run unit test with `phpunit` on `path/to/themes/city/`.

```shell
$ cd path/to/themes/city
$ phpunit
PHPUnit 4.2.2 by Sebastian Bergmann.

Configuration read from /var/www/wp/wp-content/themes/city/phpunit.xml

.

Time: 1 ms, Memory: 24.25Mb

OK (1 test, 0 assertions)
```

Some useful methods like `getElement()` are available on `wp-mvc-theme/core/tests/mvct_test.php`. Add and modify tests for your theme. Enjoy testing!

## Links

* [WP-MVC][1] : A lot of ideas come from here.

## License

This is released under the [GPL v2][2].

[1]: http://www.gnu.org/licenses/gpl-2.0.html
[2]: http://www.gnu.org/licenses/gpl-2.0.html
