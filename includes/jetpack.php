<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Magazine Awesome
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function magazine_awesome_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'content',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'magazine_awesome_jetpack_setup' );
