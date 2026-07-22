<?php

function hale_coffee_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script']);
    add_theme_support('responsive-embeds');
    add_theme_support('custom-logo');

    register_nav_menus([
        'primary' => __('Primary Menu', 'hale-coffee'),
        'footer'  => __('Footer Menu', 'hale-coffee'),
    ]);
}
add_action('after_setup_theme', 'hale_coffee_setup');

function hale_coffee_enqueue_assets() {
    wp_enqueue_style('hale-coffee-style', get_template_directory_uri() . '/assets/css/style.css', [], wp_get_theme()->get('Version'));
}
add_action('wp_enqueue_scripts', 'hale_coffee_enqueue_assets');
