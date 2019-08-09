<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Nori
 * @since Nori 1.0
 */

get_header(); ?>

	<div id="content" class="clearfix">
		<?php while ( have_posts() ) : the_post(); ?>
	
			<?php get_template_part( 'content', 'single' ); ?>
		
			<?php comments_template( '', true ); ?>
		
		<?php endwhile; // end of the loop. ?>

		<nav id="nav-single">
			<div class="nav-next"><?php next_post_link( '%link', __( 'Next Post', 'nori' ) ); ?></div>
			<div class="nav-previous"><?php previous_post_link( '%link', __( 'Previous Post', 'nori' ) ); ?></div>
		</nav><!-- #nav-below -->

		<div class="clear"></div>
		<?php if ( is_active_sidebar( 'widget-area-main' ) ) : ?>
			<div class="widget-area">
				<?php dynamic_sidebar( 'widget-area-main' ); ?>
			</div><!-- .widget-area -->
		<?php endif; ?>

	</div><!--end #content-->

<?php get_footer(); ?>