<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Config;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Config\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');







//
//    Adds Foundation classes to next/prev buttons
//
//////////////////////////////////////////////////////////////////////
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');
function posts_link_attributes() {
    return 'class="button tiny"';
}



    /* @Recreate the default filters on the_content so we can pull formated content with get_post_meta
    -------------------------------------------------------------- */
    add_filter( 'meta_content', 'wptexturize'        );
    add_filter( 'meta_content', 'convert_smilies'    );
    add_filter( 'meta_content', 'convert_chars'      );
    add_filter( 'meta_content', 'wpautop'            );
    add_filter( 'meta_content', 'shortcode_unautop'  );
    add_filter( 'meta_content', 'prepend_attachment' );