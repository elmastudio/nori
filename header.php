<?php
/**
 * The themes header file.
 *
 * @package WordPress
 * @subpackage Nori
 * @since Nori 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 9]>
<html id="ie9" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) | !(IE 9)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	$options = get_option('nori_theme_options');
	if( $options['custom_favicon'] != '' ) : ?>
<link rel="shortcut icon" type="image/ico" href="<?php echo $options['custom_favicon']; ?>" />
<?php endif  ?>

<!-- HTML5 enabling script for IE7+8 -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<?php
	wp_enqueue_script('jquery');
	if ( is_singular() && get_option( 'thread_comments' ) )
	wp_enqueue_script( 'comment-reply' );
	wp_head();
?>

</head>

<body <?php body_class('frame'); ?>>

	<header id="header">
		<div id="branding">
			<hgroup id="site-title">
			<?php $options = get_option('nori_theme_options');
			if( $options['custom_logo'] != '' ) : ?>
				<a href="<?php echo home_url( '/' ); ?>" class="logo"><img src="<?php echo $options['custom_logo']; ?>" alt="<?php bloginfo('name'); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></a>
			<?php else: ?>
				<h1><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
			<?php endif  ?>
			</hgroup><!-- end #site-title -->

				<a href="#nav-mobile" class="menu"><?php _e('Menu', 'nori') ?></a>
				<!-- end .menu button -->

				<?php // search form in header on bigger screens
				$options = get_option('nori_theme_options');
				if( $options['header_search'] == 0 ) : ?>
					<div class="search">
						<?php get_search_form(); ?>
					</div><!-- end .search -->
				<?php endif; ?>

			</div><!-- end #branding -->
		</header><!-- end #header -->

	<div id="wrap" class="clearfix">
