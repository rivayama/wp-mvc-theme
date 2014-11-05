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

Modify `path/to/themes/city/index.php`.

```php
<?php get_header(); ?>

<div id="container">
    <div id="main">
        <h2>City</h2>
        <?php get_element('news'); // Modify here ?>
    </div>
    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
```

You can now see the rendered view replaced to `get_element('news')` from `path/to/themes/city/elements/views/news.php`.

```php
<div id="news">
    <p>News</p>
</div>
```

## License

This is released under the [GPL v2][1].

[1]: http://www.gnu.org/licenses/gpl-2.0.html
