<?php
/**
 * The template for displaying all pages.
 *
 * @package WordPress
 * @subpackage Nori
 * @since Nori 1.0
 */

get_header(); ?>

	<div id="content" class="clearfix">

		<?php the_post(); ?>

			<?php get_template_part( 'content', 'page' ); ?>

			<?php comments_template( '', true ); ?>

			<div class="clear"></div>
			<?php if ( is_active_sidebar( 'widget-area-main' ) ) : ?>
				<div class="widget-area">
					<?php dynamic_sidebar( 'widget-area-main' ); ?>
				</div><!-- .widget-area -->
			<?php endif; ?>

	</div><!--end #content-->

<?php get_footer(); ?>