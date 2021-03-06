<?php
/**
 * The template used for displaying page content.
 *
 * @package WordPress
 * @subpackage Nori
 * @since Nori 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-wrap">

		<header class="entry-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header><!-- end .entry-header -->

		<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'nori' ), 'after' => '</div>' ) ); ?>
		</div><!-- end .entry-content -->

		<footer class="entry-meta">
			<ul>
				<?php // Include Share-Btns
				$options = get_option('nori_theme_options');
				if( $options['share-pages'] ) : ?>
					<?php get_template_part( 'share'); ?>
				<?php endif; ?>
				<li class="post-edit"><?php edit_post_link(__( 'Edit this post', 'nori') ); ?></li>
			</ul>
		</footer><!-- end .entry-meta -->

	</div><!--end .entry-wrap -->
</article><!-- end post-<?php the_ID(); ?> -->