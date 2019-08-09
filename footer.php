 <?php
/**
 * The template for displaying the footer.
 *
 * @package WordPress
 * @subpackage Nori
 * @since Nori 1.0
 */
?>

	<div id="site-navigation" class="clearfix">
		<div id="nav-mobile">
			<a href="#header" id="top"><?php _e('Top', 'nori') ?></a>
		</div><!-- end #nav-mobile -->

		<nav id="main-nav">
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- end #main-nav -->

		<?php // search form in footer on mobile devices
			$options = get_option('nori_theme_options');
			if( $options['header_search'] == 0 ) : ?>

			<div class="search">
				<?php get_search_form(); ?>
			</div><!-- end .search -->
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'widget-area-optional-1' ) ) : ?>
			<div class="widget-area-optional-1">
				<?php dynamic_sidebar( 'widget-area-optional-1' ); ?>
			</div><!-- end .widget-area-optional-1 -->
		<?php endif; ?>

	</div><!-- end #site-navigation -->

	<div id="site-generator" class="clearfix">
		<?php
		$options = get_option('nori_theme_options');
		if($options['custom_footertext'] != '' ){
			echo stripslashes($options['custom_footertext']);
		} else { ?>

		<ul>
			<li>&copy; <?php echo date('Y'); ?> <?php bloginfo(); ?>.</li>
			<li><?php _e('Proudly powered by', 'nori') ?> <a href="https://wordpress.org/" ><?php _e('WordPress', 'nori') ?></a>.</li>
			<li><?php printf( __( 'Theme: %1$s by %2$s', 'nori' ), 'Nori', '<a href="https://www.elmastudio.de/en/">Elmastudio</a>' ); ?>.</li>
				<?php } ?>
		</ul>

		<a href="#header" id="top-desktop"><?php _e('Top', 'nori') ?></a>
	</div><!-- end #site-generator -->

	<?php if (has_nav_menu( 'footer' ) ) {
		wp_nav_menu( array('theme_location' => 'footer', 'container' => 'nav' , 'container_id' => 'footer-nav', 'depth' => 1 ));}
	?>

</div><!-- end #wrap -->

<?php // Include Google+ Code if Share post buttons are activated.
	$options = get_option('nori_theme_options');
	if($options['share-singleposts'] or $options['share-posts'] or $options['share-pages']) : ?>
	<script type="text/javascript">
	(function() {
		var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
		po.src = 'https://apis.google.com/js/plusone.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
	})();
	</script>

	<div id="fb-root"></div>
<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/<?php _e('en_US', 'nori') ?>/all.js#xfbml=1";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
