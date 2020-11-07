<?php

/****
Plugin Name: Book
Plugin URI:
Description: Design for personal purpose
Version: 1.0
Author: Shakhawat
Author URI:
License: GPLv2
Text Domain: bcpd
Domain Path: /languages/
 ****/

function bcp_load_text_domain()
{
    load_plugin_textdomain('bcpd', false, dirname(__FILE__) . "/languages");
}

add_action('plugins_loaded', 'bcp_load_text_domain');


function bcp_register_my_cpts_book_gallery()
{

    /**
     * Post Type: Books.
     */

    $labels = [
        "name" => __("Books", "bcpd"),
        "singular_name" => __("Book", "bcpd"),
    ];

    $args = [
        "label" => __("Books", "bcpd"),
        "labels" => $labels,
        "description" => "This custom post type has been created to design book and categories.",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => false,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => ["slug" => "book_gallery", "with_front" => true],
        "query_var" => true,
        "menu_position" => 5,
        "menu_icon" => "dashicons-media-document",
        "supports" => ["title", "editor", "thumbnail"],
    ];

    register_post_type("book_gallery", $args);
}

add_action('init', 'bcp_register_my_cpts_book_gallery');



function bcp_register_my_taxes()
{

    /**
     * Taxonomy: Book Categories.
     */

    $labels = [
        "name" => __("Book Categories", "bcpd"),
        "singular_name" => __("Book Category", "bcpd"),
    ];

    $args = [
        "label" => __("Book Categories", "bcpd"),
        "labels" => $labels,
        "public" => true,
        "publicly_queryable" => true,
        "hierarchical" => false,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => ['slug' => 'book_categories', 'with_front' => true,],
        "show_admin_column" => false,
        "show_in_rest" => true,
        "rest_base" => "book_categories",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "show_in_quick_edit" => false,
    ];
    register_taxonomy("book_categories", ["book_gallery"], $args);
}
add_action('init', 'bcp_register_my_taxes');
