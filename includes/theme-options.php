<?php
/**
 * nori Theme Options
 *
 * @package WordPress
 * @subpackage Nori
 * @since Nori 1.0
 */

/*-----------------------------------------------------------------------------------*/
/* Properly enqueue styles and scripts for our theme options page.
/*
/* This function is attached to the admin_enqueue_scripts action hook.
/*
/* @param string $hook_suffix The action passes the current page to the function.
/* We don't do anything if we're not on our theme options page.
/*-----------------------------------------------------------------------------------*/

function nori_admin_enqueue_scripts( $hook_suffix ) {
	if ( $hook_suffix != 'appearance_page_theme_options' )
		return;

	wp_enqueue_style( 'nori-theme-options', get_template_directory_uri() . '/includes/theme-options.css', false, '2011-04-28' );
	wp_enqueue_script( 'nori-theme-options', get_template_directory_uri() . '/includes/theme-options.js', array( 'farbtastic' ), '2011-04-28' );
	wp_enqueue_style( 'farbtastic' );
}
add_action( 'admin_enqueue_scripts', 'nori_admin_enqueue_scripts' );


/*-----------------------------------------------------------------------------------*/
/* Register the form setting for our nori_options array.
/*
/* This function is attached to the admin_init action hook.
/*
/* This call to register_setting() registers a validation callback, nori_theme_options_validate(),
/* which is used when the option is saved, to ensure that our option values are complete, properly
/* formatted, and safe.
/*
/* We also use this function to add our theme option if it doesn't already exist.
/*-----------------------------------------------------------------------------------*/

function nori_theme_options_init() {

	// If we have no options in the database, let's add them now.
	if ( false === nori_get_theme_options() )
		add_option( 'nori_theme_options', nori_get_default_theme_options() );

	register_setting(
		'nori_options',       // Options group, see settings_fields() call in theme_options_render_page()
		'nori_theme_options', // Database option, see nori_get_theme_options()
		'nori_theme_options_validate' // The sanitization callback, see nori_theme_options_validate()
	);
}
add_action( 'admin_init', 'nori_theme_options_init' );

/*-----------------------------------------------------------------------------------*/
/* Add our theme options page to the admin menu.
/*
/* This function is attached to the admin_menu action hook.
/*-----------------------------------------------------------------------------------*/

function nori_theme_options_add_page() {
	add_theme_page(
		__( 'Theme Options', 'nori' ), // Name of page
		__( 'Theme Options', 'nori' ), // Label in menu
		'edit_theme_options',                  // Capability required
		'theme_options',                       // Menu slug, used to uniquely identify the page
		'theme_options_render_page'            // Function that renders the options page
	);
}
add_action( 'admin_menu', 'nori_theme_options_add_page' );


/*-----------------------------------------------------------------------------------*/
/* Returns the default options for Nori
/*-----------------------------------------------------------------------------------*/

function nori_get_default_theme_options() {
	$default_theme_options = array(
		'link_color'   => '#2C869B',
		'white_font' => '',
		'custom_logo' => '',
		'header_search' => '',
		'custom_footertext' => '',
		'custom_favicon' => '',
		'share-posts' => '',
		'share-singleposts' => '',
		'share-pages' => '',
	);

	return apply_filters( 'nori_default_theme_options', $default_theme_options );
}

/*-----------------------------------------------------------------------------------*/
/* Returns the options array for Nori
/*-----------------------------------------------------------------------------------*/

function nori_get_theme_options() {
	return get_option( 'nori_theme_options' );
}

/*-----------------------------------------------------------------------------------*/
/* Returns the options array for Nori
/*-----------------------------------------------------------------------------------*/

function theme_options_render_page() {
	?>
	<div class="wrap">
		<h2><?php printf( __( '%s Theme Options', 'nori' ), wp_get_theme() ); ?></h2>
		<?php settings_errors(); ?>

		<form method="post" action="options.php">
			<?php
				settings_fields( 'nori_options' );
				$options = nori_get_theme_options();
				$default_options = nori_get_default_theme_options();
			?>

			<table class="form-table">

				<tr valign="top"><th scope="row"><?php _e( 'Custom Link Color', 'nori' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Link Color', 'nori' ); ?></span></legend>
							<input type="text" name="nori_theme_options[link_color]" id="link-color" value="<?php echo esc_attr( $options['link_color'] ); ?>" />
							<a href="#" class="pickcolor hide-if-no-js" id="link-color-example"></a>
							<input type="button" class="pickcolor button hide-if-no-js" value="<?php esc_attr_e( 'Select a Color', 'nori' ); ?>">
							<div id="colorPickerDiv" style="z-index: 100; background:#eee; border:1px solid #ccc; position:absolute; display:none;"></div>
							<br />
							<small class="description"><?php printf( __( 'default link color: %s', 'nori' ), $default_options['link_color'] ); ?></small>
						</fieldset>
					</td>
				</tr>

				<tr valign="top"><th scope="row"><?php _e( 'White Font Color', 'nori' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'White Font Color', 'nori' ); ?></span></legend>
							<input id="nori_theme_options[white_font]" name="nori_theme_options[white_font]" type="checkbox" value="1" <?php checked( '1', $options['white_font'] ); ?> />
							<label class="description" for="nori_theme_options[white_font]"><?php _e( 'Check this box to set white as the standard text color (use in combination with the custom background option, see Appearance / Background).', 'nori' ); ?></label>
						</fieldset>
					</td>
				</tr>

				<tr valign="top"><th scope="row"><?php _e( 'Custom Logo', 'nori' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Custom Logo image', 'nori' ); ?></span></legend>
							<input class="regular-text" type="text" name="nori_theme_options[custom_logo]" value="<?php esc_attr_e( $options['custom_logo'] ); ?>" />
						<br/><label class="description" for="nori_theme_options[custom_logo]"><?php _e('Upload your own logo image (image width should be 320 pixels) using the ', 'nori'); ?><a href="<?php echo home_url(); ?>/wp-admin/media-new.php" target="_blank"><?php _e('WordPress Media Uploader', 'nori'); ?></a><?php _e('. Copy your logo image file URL and insert the URL here.', 'nori'); ?></label>
						</fieldset>
					</td>
				</tr>

				<tr valign="top"><th scope="row"><?php _e( 'Hide Search Form', 'nori' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Hide search form', 'nori' ); ?></span></legend>
							<input id="nori_theme_options[header_search]" name="nori_theme_options[header_search]" type="checkbox" value="1" <?php checked( '1', $options['header_search'] ); ?> />
							<label class="description" for="nori_theme_options[header_search]"><?php _e( 'Check this box to hide the search form in the header and at the bottom of the main menu on mobile devices.', 'nori' ); ?></label>
						</fieldset>
					</td>
				</tr>

				<tr valign="top"><th scope="row"><?php _e( 'Custom Footer Text', 'nori' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Custom Footer text', 'nori' ); ?></span></legend>
							<textarea id="nori_theme_options[custom_footertext]" class="small-text" cols="120" rows="3" name="nori_theme_options[custom_footertext]"><?php echo esc_textarea( $options['custom_footertext'] ); ?></textarea>
						<br/><label class="description" for="nori_theme_options[custom_footertext]"><?php _e( 'Customize the footer credit text. Standard HTML is allowed.', 'nori' ); ?></label>
						</fieldset>
					</td>
				</tr>

				<tr valign="top"><th scope="row"><?php _e( 'Custom Favicon', 'nori' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Custom Favicon', 'nori' ); ?></span></legend>
							<input class="regular-text" type="text" name="nori_theme_options[custom_favicon]" value="<?php esc_attr_e( $options['custom_favicon'] ); ?>" />
						<br/><label class="description" for="nori_theme_options[custom_favicon]"><?php _e( 'Create a favicon image and upload your .ico Favicon image (via FTP) to your server and enter the Favicon URL here.', 'nori' ); ?></label>
						</fieldset>
					</td>
				</tr>

				<tr valign="top"><th scope="row"><?php _e( 'Share option for posts', 'nori' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Share option for posts', 'nori' ); ?></span></legend>
							<input id="nori_theme_options[share-posts]" name="nori_theme_options[share-posts]" type="checkbox" value="1" <?php checked( '1', $options['share-posts'] ); ?> />
							<label class="description" for="nori_theme_options[share-posts]"><?php _e( 'Check this box to include a post short URL, Twitter, Facebook and Google+ button on the blogs front page and on single post pages.', 'nori' ); ?></label>
						</fieldset>
					</td>
				</tr>

				<tr valign="top"><th scope="row"><?php _e( 'Share option for single post pages only', 'nori' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Share option for single post pages only', 'nori' ); ?></span></legend>
							<input id="nori_theme_options[share-singleposts]" name="nori_theme_options[share-singleposts]" type="checkbox" value="1" <?php checked( '1', $options['share-singleposts'] ); ?> />
							<label class="description" for="nori_theme_options[share-singleposts]"><?php _e( 'Check this box to include the share post buttons <strong>only</strong> on single post pages.', 'nori' ); ?></label>
						</fieldset>
					</td>
				</tr>

				<tr valign="top"><th scope="row"><?php _e( 'Share option for pages', 'nori' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Share option for pages', 'nori' ); ?></span></legend>
							<input id="nori_theme_options[share-pages]" name="nori_theme_options[share-pages]" type="checkbox" value="1" <?php checked( '1', $options['share-pages'] ); ?> />
							<label class="description" for="nori_theme_options[share-pages]"><?php _e( 'Check this box to include the share option on pages.', 'nori' ); ?></label>
						</fieldset>
					</td>
				</tr>

			</table>

			<?php submit_button(); ?>
		</form>
	</div>
	<?php
}

/*-----------------------------------------------------------------------------------*/
/* Sanitize and validate form input. Accepts an array, return a sanitized array.
/*-----------------------------------------------------------------------------------*/

function nori_theme_options_validate( $input ) {
	global $layout_options, $font_options;

	// Link color must be 3 or 6 hexadecimal characters
	if ( isset( $input['link_color'] ) && preg_match( '/^#?([a-f0-9]{3}){1,2}$/i', $input['link_color'] ) )
			$output['link_color'] = '#' . strtolower( ltrim( $input['link_color'], '#' ) );

	// Text options must be safe text with no HTML tags
	$input['custom_logo'] = wp_filter_nohtml_kses( $input['custom_logo'] );
	$input['custom_favicon'] = wp_filter_nohtml_kses( $input['custom_favicon'] );

	// checkbox value is either 0 or 1
	if ( ! isset( $input['white_font'] ) )
		$input['white_font'] = null;
	$input['white_font'] = ( $input['white_font'] == 1 ? 1 : 0 );

	if ( ! isset( $input['share-posts'] ) )
		$input['share-posts'] = null;
	$input['share-posts'] = ( $input['share-posts'] == 1 ? 1 : 0 );

	if ( ! isset( $input['share-singleposts'] ) )
		$input['share-singleposts'] = null;
	$input['share-singleposts'] = ( $input['share-singleposts'] == 1 ? 1 : 0 );

	if ( ! isset( $input['share-pages'] ) )
		$input['share-pages'] = null;
	$input['share-pages'] = ( $input['share-pages'] == 1 ? 1 : 0 );

	if ( ! isset( $input['header_search'] ) )
		$input['header_search'] = null;
	$input['header_search'] = ( $input['header_search'] == 1 ? 1 : 0 );

	return $input;
}

/*-----------------------------------------------------------------------------------*/
/* Add a style block to the theme for the current font color.
/*
/* This function is attached to the wp_head action hook.
/*-----------------------------------------------------------------------------------*/

function nori_print_white_font_style() {
	$options = nori_get_theme_options();
	$white_font = $options['white_font'];

	$default_options = nori_get_default_theme_options();

	// Don't do anything if the current link color is the default.
	if ( $default_options['white_font'] == $white_font )
		return;
?>
<style type="text/css">
/* White Font Color Theme Option */
body {color:#fff;}
</style>
<?php
}
add_action( 'wp_head', 'nori_print_white_font_style' );

/*-----------------------------------------------------------------------------------*/
/* Add a style block to the theme for the current link color.
/*
/* This function is attached to the wp_head action hook.
/*-----------------------------------------------------------------------------------*/

function nori_print_link_color_style() {
	$options = nori_get_theme_options();
	$link_color = $options['link_color'];

	$default_options = nori_get_default_theme_options();

	// Don't do anything if the current link color is the default.
	if ( $default_options['link_color'] == $link_color )
		return;
?>
<style type="text/css">
/* Custom Link Color */
a,
#branding a.menu {
	color:<?php echo $link_color; ?>;
}
#header,
#site-navigation a#top,
#site-generator a#top-desktop,
input#submit,
input.wpcf7-submit,
#nav-below a,
.nav-previous a,
.nav-next a,
.previous-image a,
.next-image a,
#main-nav ul li a,
.jetpack_subscription_widget form#subscribe-blog input[type="submit"],
#content .wp-pagenavi a.page,
#content .wp-pagenavi a.nextpostslink,
#content .wp-pagenavi a.previouspostslink,
#content .wp-pagenavi a.first,
#content .wp-pagenavi a.last,
#content .wp-pagenavi span.current {
	background:<?php echo $link_color; ?>;
}
#content blockquote {
	border-left: 3px solid <?php echo $link_color; ?>;
}
</style>
<?php
}
add_action( 'wp_head', 'nori_print_link_color_style' );
