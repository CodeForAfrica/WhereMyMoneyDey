<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Where My Money Dey?
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function where_my_money_dey_infinite_scroll_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'content',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'where_my_money_dey_infinite_scroll_setup' );
