<?php
/**
 * Template Name: Center Column Page
 * Description: Page template with centered column layout
 *
 * @package WordPress
 * @subpackage Nori
 * @since Nori 1.0
 */

get_header(); ?>

	<div id="content" class="centercolumn">

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