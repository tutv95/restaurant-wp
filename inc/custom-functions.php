<?php
/**
 * Created by PhpStorm.
 * User: Tu TV
 * Date: 07/12/2015
 * Time: 7:38 PM
 */


/**
 * Rewrite uri stylesheet
 */
function seo_wp_rewrite_uri_stylesheet() {
	return get_stylesheet_directory_uri() . '/style.min.css?time=' . md5( time() );
}

add_action( 'stylesheet_uri', 'seo_wp_rewrite_uri_stylesheet' );