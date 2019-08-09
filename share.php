<?php
/**
 * Social share buttons for posts and pages

 * @package WordPress
 * @subpackage Nori
 * @since Nori 1.0
 */
?>

<li class="share-btns">
	<ul>
		<li class="twitter"><a href="https://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>" data-lang="<?php bloginfo( $language ); ?>"><?php _e('Tweet', 'nori') ?></a><script type="text/javascript" src="https://platform.twitter.com/widgets.js"></script></li>
		<li class="googleplus"><g:plusone size="medium" href="<?php the_permalink(); ?>"></g:plusone></li>
		<li class="fb"><div class="fb-like" data-href="<?php the_permalink(); ?>" data-send="true" data-layout="button_count" data-width="120" data-show-faces="false"></div></li>
	</ul>
</li><!-- end .share-btns -->
