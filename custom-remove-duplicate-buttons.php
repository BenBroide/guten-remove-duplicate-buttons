<?php
/**
 * Plugin Name:     Custom Remove Duplicate Buttons
 */

/**
 * Registers all block assets so that they can be enqueued through the block editor
 * in the corresponding context.
 *
 * @see https://developer.wordpress.org/block-editor/tutorials/block-tutorial/applying-styles-with-stylesheets/
 */
function create_block_custom_remove_duplicate_buttons_block_init() {
	$dir = __DIR__;

	$script_asset_path = "$dir/build/index.asset.php";
	if ( ! file_exists( $script_asset_path ) ) {
		throw new Error(
			'You need to run `npm start` or `npm run build` for the "create-block/custom-remove-duplicate-buttons" block first.'
		);
	}
	$index_js     = 'build/index.js';
	$script_asset = require( $script_asset_path );
	wp_register_script(
		'block-custom-remove-duplicate-buttons-block-editor',
		plugins_url( $index_js, __FILE__ ),
		$script_asset['dependencies'],
		$script_asset['version']
	);
	wp_enqueue_script('block-custom-remove-duplicate-buttons-block-editor');

}
add_action( 'admin_init', 'create_block_custom_remove_duplicate_buttons_block_init' );
