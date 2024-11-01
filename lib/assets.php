<?php
function userstatswpworbee_assets(){
	global $userstatswpworbee;

	//datatables core
	wp_register_script(
		'userstatswpworbee_datatables_script',
		plugin_dir_url( __DIR__ ) . 'assets/datatables/datatables.min.js',
		['jquery']
	);
	wp_enqueue_script( 'userstatswpworbee_datatables_script' );
	wp_register_style(
		'userstatswpworbee_datatables_styles',
		plugin_dir_url( __DIR__ ) . 'assets/datatables/datatables.min.css' );
	wp_enqueue_style( 'userstatswpworbee_datatables_styles' );

	//datatables plugins
	wp_register_script(
		'userstatswpworbee_datatables_script_buttons',
		plugin_dir_url( __DIR__ ) . 'assets/datatables/plugins/dataTables.buttons.min.js',
		['jquery', 'userstatswpworbee_datatables_script']
	);
	wp_enqueue_script( 'userstatswpworbee_datatables_script_buttons' );
	wp_register_style(
		'userstatswpworbee_datatables_styles_buttons',
		plugin_dir_url( __DIR__ ) . 'assets/datatables/plugins/dataTables.buttons.min.css' );
	wp_enqueue_style( 'userstatswpworbee_datatables_styles_buttons' );

	wp_register_script(
		'userstatswpworbee_datatables_script_fixedheader',
		plugin_dir_url( __DIR__ ) . 'assets/datatables/plugins/dataTables.fixedHeader.min.js',
		['jquery', 'userstatswpworbee_datatables_script']
	);
	wp_enqueue_script( 'userstatswpworbee_datatables_script_fixedheader' );
	wp_register_style(
		'userstatswpworbee_datatables_styles_fixedheader',
		plugin_dir_url( __DIR__ ) . 'assets/datatables/plugins/dataTables.fixedHeader.min.css' );
	wp_enqueue_style( 'userstatswpworbee_datatables_styles_fixedheader' );

	//userstatswp assets
	wp_register_script(
		'userstatswpworbee_script',
		plugin_dir_url( __DIR__ ) . 'assets/scripts.js',
		['jquery']
	);
//	wp_enqueue_script( 'userstatswpworbee_script' );
	wp_register_style(
		'userstatswpworbee_styles',
		plugin_dir_url( __DIR__ ) . 'assets/dist/styles.min.css?v=' . $userstatswpworbee['version'] );
	wp_enqueue_style( 'userstatswpworbee_styles' );


}
add_action('admin_enqueue_scripts', 'userstatswpworbee_assets');
