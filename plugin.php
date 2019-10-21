<?php
/**
 * Plugin Name:       My Custom Shortcodes
 * Plugin URI:        https://wordpress.org/plugins/my-custom-shortcodes/
 * Description:       Custom shortcode for plugin development talk
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Jeffrey Carandang
 * Author URI:        https://jeffreycarandang.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       my-custom-shortcodes
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( !function_exists( 'mycustomsc_register_shortcode' ) ){
	add_shortcode( 'mycustomsc', 'mycustomsc_register_shortcode' );
	function mycustomsc_register_shortcode( $atts, $content = "" ){

		$html = '<div class="mycustomsc-wrapper">';
		$html .= esc_html( 'Sed ut perspiciatis unde omnis iste natus error sit <a href="#">voluptatem</a> accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?' );
		$html .= '</div>';

		//replace output
		$content = $html;

		return $content;
	}
}

if( !function_exists( 'mycustomsc_add_assets' ) ){
	add_action( 'wp_enqueue_scripts', 'mycustomsc_add_assets' );
	function mycustomsc_add_assets(){
		global $post;

		//check if valid post and if custom shortcode exists
		if ( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'mycustomsc') ) {
			wp_enqueue_style(
				'mycustomsc-css',
				plugin_dir_url( __FILE__ ) . '/assets/css/custom.css',
				array(),
				'1.0'
			);
		}
	}
}
?>