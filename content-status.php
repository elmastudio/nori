<?php
/**
 * The template for displaying posts in the Status Post Format
 *
 * @package WordPress
 * @subpackage Nori
 * @since Nori 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-wrap">

		<div class="entry-content">
			<?php the_content( __( 'Continue Reading', 'nori' ) ); ?>
		</div><!-- end .entry-content -->

		<footer class="entry-meta">
			<ul>
				<li class="post-date"><a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a></li>
				<li class="post-author"><?php _e('Posted by', 'nori') ?>
					<?php
						printf( __( '<a href="%1$s" title="%2$s">%3$s</a>', 'nori' ),
						esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
						sprintf( esc_attr__( 'All posts by %s', 'nori' ), get_the_author() ),
						get_the_author());
					?>
				</li>
				<li class="post-comments"><?php comments_popup_link( __( '0 comments', 'nori' ), __( '1 comment', 'nori' ), __( '% comments', 'nori' ), 'comments-link', __( 'comments off', 'nori' ) ); ?></li>
				<li class="post-edit"><?php edit_post_link(__( 'Edit this post', 'nori') ); ?></li>
				<?php // Include Share-Btns
					$options = get_option('nori_theme_options');
					if( $options['share-posts'] ) : ?>
						<?php get_template_part( 'share'); ?>
				<?php endif; ?>
			</ul>
		</footer><!-- end .entry-meta -->

	</div><!-- end .post-wrap -->
</article><!-- end post -<?php the_ID(); ?> -->