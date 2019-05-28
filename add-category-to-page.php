<?php
/**
 * Plugin Name: Add Category to Page.
 * Plugin URI: https://ablyperu.com
 * Description: quickly add Categories and Tags to wordpress Pages. just Activate and visit the Page Edit and add categories.
 * Version: 1.0
 * Author: Ably Peru
 * Author URI: https://ablyperu.com
 * License:  GPL2
 */
 
 
 
 function ably_add_taxonomies_pages() {
      register_taxonomy_for_object_type( 'post_tag', 'page' );
      register_taxonomy_for_object_type( 'category', 'page' );
  } 
 add_action( 'init', 'ably_add_taxonomies_pages' );


 add_action( 'pre_get_posts', 'ably_category_and_tag_archives' );

 
// archive taxnomy

function ably_category_and_tag_archives( $wp_query ) {
if( $wp_query->is_main_query() && ! is_admin() && ( $wp_query->is_category() || $wp_query->is_tag() )) {
    $my_post_array = array('post','page');
    
    if ( $wp_query->get( 'category_name' ) || $wp_query->get( 'cat' ) )
     $wp_query->set( 'post_type', $my_post_array );
    
   if ( $wp_query->get( 'tag' ) )
     $wp_query->set( 'post_type', $my_post_array );
}
 }

?>