<?php
/**
 * The template for displaying search results.
 *
 * @package WordPress
 * @subpackage Nori
 * @since Nori 1.0
 */

get_header(); ?>

	<div id="content" class="clearfix">

		<?php if ( have_posts() ) : ?>
		<header class="page-header">
			<h1 class="page-title"><?php echo $wp_query->found_posts; ?> <?php printf( __( 'Search Results for: %s', 'nori' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
		</header><!--end .page-header -->

		<div id="posts-container"  class="clearfix">
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php	get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>
		</div><!-- end #posts-container -->
				
			<?php if (  $wp_query->max_num_pages > 1 ) : ?>	
				<nav id="nav-below" class="clearfix">
					<div class="nav-previous"><?php next_posts_link( __( 'Older posts', 'nori' ) ); ?></div>
					<div class="nav-next"><?php previous_posts_link( __( 'Newer posts', 'nori' ) ); ?></div>
				</nav><!-- end #nav-below -->
			<?php endif; ?>
				
		<?php else : ?>
			
		<article id="post-0" class="page no-results not-found">
			<div class="entry-wrap">

				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Nothing Found', 'nori' ); ?></h1>
				</header><!--end .entry-header -->

				<div class="entry-content">
					<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'nori' ); ?></p>
					<div class="search">
						<?php get_search_form(); ?>
					</div><!-- end .search -->
				</div><!-- end .entry-content -->				
			</div><!-- end .entry-wrap -->
		</article>

			<?php endif; ?>
			
			<div class="clear"></div>
			
			<?php if ( is_active_sidebar( 'widget-area-main' ) ) : ?>
				<div class="widget-area">
					<?php dynamic_sidebar( 'widget-area-main' ); ?>
				</div><!-- .widget-area -->
			<?php endif; ?>

	</div><!--end #content-->

<?php get_footer(); ?>