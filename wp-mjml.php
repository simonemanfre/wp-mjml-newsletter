<?php
/*
Plugin Name: MJML Template
Description: Create MJML Templates for your emails
Author: Simone manfredini
Author URI: https://simonemanfre.it/
License: GPL2
Domain Path: /languages/
Text Domain: mjml
Version: 0.0.1
*/
/*  This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
*/


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Registrazione del Custom Post Type Newsletter
function register_newsletter_post_type() {
    $labels = array(
        'name'               => 'Newsletter',
        'singular_name'      => 'Newsletter',
        'menu_name'          => 'Newsletter',
        'add_new'            => 'Aggiungi Nuova',
        'add_new_item'       => 'Aggiungi Nuova Newsletter',
        'edit_item'          => 'Modifica Newsletter',
        'new_item'           => 'Nuova Newsletter',
        'view_item'          => 'Visualizza Newsletter',
        'search_items'       => 'Cerca Newsletter',
        'not_found'          => 'Nessuna newsletter trovata',
        'not_found_in_trash' => 'Nessuna newsletter nel cestino'
    );

    $args = [
        "labels" => $labels,
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => true,
        "rewrite" => [ "with_front" => false ],
        "query_var" => true,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-admin-post',
        "supports" => [ "title", "editor", "excerpt", "thumbnail", "revisions", "page-attributes" ],
    ];

    register_post_type('newsletter', $args);
}
add_action('init', 'register_newsletter_post_type');

//THUMBNAILS
//add custom thumbnails
add_theme_support('post-thumbnails' );
add_image_size('newsletter', 800, 800, false);

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function newsletter_newsletter_mjml_block_init() {
	if ( function_exists( 'wp_register_block_types_from_metadata_collection' ) ) { // Function introduced in WordPress 6.8.
		wp_register_block_types_from_metadata_collection( __DIR__ . '/build', __DIR__ . '/build/blocks-manifest.php' );
	} else {
		if ( function_exists( 'wp_register_block_metadata_collection' ) ) { // Function introduced in WordPress 6.7.
			wp_register_block_metadata_collection( __DIR__ . '/build', __DIR__ . '/build/blocks-manifest.php' );
		}
		$manifest_data = require __DIR__ . '/build/blocks-manifest.php';
		foreach ( array_keys( $manifest_data ) as $block_type ) {
			register_block_type( __DIR__ . "/build/{$block_type}" );
		}
	}
}
add_action( 'init', 'newsletter_newsletter_mjml_block_init' );