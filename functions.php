<?php

// Theme initialization
function theme_enqueue_styles() {
  wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}
function cover_enqueue_styles() {
  if (is_home()) {
    wp_enqueue_style('cover-style', get_stylesheet_directory_uri() . '/cover/cover.css');
  }
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
add_action('wp_enqueue_scripts', 'cover_enqueue_styles', 20);

// JavaScript
function theme_enqueue_scripts() {
  if (is_page('cv')) {
    wp_enqueue_script('mustache', get_stylesheet_directory_uri() . '/mustache.min.js');
  }
}
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');

?>
