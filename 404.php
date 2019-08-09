<?php
/**
 * The template for displaying 404 error pages.
 *
 * @package WordPress
 * @subpackage Nori
 * @since Nori 1.0
 */

get_header(); ?>

	<div id="content" class="clearfix">
		<article id="post-0" class="page error404 not-found">

			<div class="entry-wrap">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Not Found', 'nori' ); ?></h1>
				</header><!--end .entry-header -->

				<div class="entry-content">
					<p><?php _e( 'Apologies, but the page you requested could not be found. Perhaps searching will help.', 'nori' ); ?></p>
						<?php get_search_form(); ?>
				</div><!-- end .entry-content -->

				<script type="text/javascript">
					// focus on search field after it has loaded
					document.getElementById('s') && document.getElementById('s').focus();
				</script>

			</div><!-- end .entry-wrap -->
		</article><!-- end #post-0 -->
		
		<div class="clear"></div>
		<?php if ( is_active_sidebar( 'widget-area-main' ) ) : ?>
			<div class="widget-area">
				<?php dynamic_sidebar( 'widget-area-main' ); ?>
			</div><!-- .widget-area -->
		<?php endif; ?>

	</div><!--end #content-->

<?php get_footer(); ?>