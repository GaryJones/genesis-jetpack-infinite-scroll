<?php
/**
 * Genesis JetPack Infinite Scroll
 *
 * @package           Genesis_JetPack_Infinite_Scroll
 * @author            Sridhar Katakam
 * @author            Gary Jones <gary@garyjones.co.uk>
 * @license           GPL-2.0+
 * @link              http://sridharkatakam.com/jetpacks-infinite-scroll-genesis/
 * @copyright         2014 Gary Jones, Gamajo Tech
 *
 * @wordpress-plugin
 * Plugin Name:       Genesis JetPack Infinite Scroll
 * Plugin URI:        http://gamajo.com/genesis-jetpack-infinite-scroll
 * Description:       Adds support for JetPack Infinite Scroll to Genesis Framework child themes.
 * Version:           1.0.0
 * Author:            Sridhar Katakam and Gary Jones
 * Text Domain:       genesis-jetpack-infinite-scroll
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/GaryJones/genesis-jetpack-infinite-scroll
 * GitHub Branch:     master
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Customise as needed.
// See http://jetpack.me/support/infinite-scroll/
add_theme_support(
	'infinite-scroll',
	array(
		'container'      => 'main-content',
		'render'         => 'genesis_do_loop',
		// 'type'           => 'scroll',
		// 'footer_widgets' => false,
		// 'wrapper'        => true,
		// 'posts_per_page' => false,
	)
);

add_filter( 'genesis_attr_content', 'gjis_attributes_content' );
/**
 * Add a CSS ID to main element
 *
 * @param  array $attributes Existing attributes.
 *
 * @return array Amended attributes.
 */
function gjis_attributes_content( $attributes ) {
	if ( is_home() || is_archive() ) {
		$attributes['id'] = 'main-content';
	}

	return $attributes;
}

add_action ( 'genesis_after_entry', 'gjis_remove_pagination' );
/**
 * Remove archive pagination.
 */
function gjis_remove_pagination() {
	remove_action( 'genesis_after_endwhile', 'genesis_posts_nav' );
}
