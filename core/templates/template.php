<?php echo "<?php get_header(); ?>\n"; ?>

<div id="container">
	<div id="main">
		<h2><?php echo $name_camel; ?></h2>
		<?php echo "<?php // get_element('$name_snake'); ?>\n"; ?>
	</div>
	<?php echo "<?php get_sidebar(); ?>\n"; ?>
</div>

<?php echo "<?php get_footer(); ?>"; ?>
