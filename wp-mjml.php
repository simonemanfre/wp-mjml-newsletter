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

defined( 'ABSPATH' ) || exit; // Exit if accessed directly

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