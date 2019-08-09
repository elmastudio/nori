<?php
/**
 * Demo Installer content, One Click Demo Import plugin required
 * See: https://wordpress.org/plugins/one-click-demo-import/
 *
 * @package Nori
 * @since Nori 1.0.4
 */

function ocdi_import_files() {
	return array(

		array(
			'import_file_name'             => 'Demo Nori',
			'categories'                   => array( 'Blog' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'assets/demo/nori-content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'assets/demo/nori-widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'assets/demo/nori-customizer.dat',
		),
	);
}
add_filter( 'pt-ocdi/import_files', 'ocdi_import_files' );
