<?php
/*
 * Plugin Name: Meta Box Text Limiter
 * Plugin URI: http://metabox.io
 * Description: Limit number of characters or words entered for text and textarea fields
 * Author: ThaoHa, Rilwis
 * Version: 1.0.0
 * Author URI: http://metabox.io
 */

add_action( 'rwmb_before', array( 'Text_Limiter', 'register' ) );
add_action( 'admin_enqueue_scripts', array( 'Text_Limiter', 'admin_enqueue_scripts' ) );

if ( ! class_exists( 'Text_Limiter' ) )
{
	class Text_Limiter
	{
		/**
		 * List of supported fields
		 * @var array
		 */
		protected static $types = array( 'text', 'textarea' );

		/**
		 * Register
		 *
		 * @param $meta_box
		 */
		public static function register( $meta_box )
		{
			foreach ( self::$types as $type )
			{
				add_filter( "rwmb_{$type}_html", array( __CLASS__, 'show' ), 10, 2 );
			}
		}

		/**
		 * Show the html
		 *
		 * @param $input_html
		 * @param $field
		 *
		 * @return string
		 */
		public static function show( $input_html, $field )
		{
			if ( ! isset( $field['limit'] ) || ! is_numeric( $field['limit'] ) || ! $field['limit'] > 0 )
			{
				return $input_html;
			}

			$type = isset( $field['limit_type'] ) ? $field['limit_type'] : 'character';
			$text = 'word' == $type ? __( 'Word Count', 'text-limiter' ) : __( 'Character Count', 'text-limiter' );

			return $input_html . '
				<div class="text-limiter" data-limit-type="' . $type . '">
					<span>' . $text . ':
						<span class="counter">0</span>/<span class="maximum">' . $field['limit'] . '</span>
					</span>
				</div>';
		}

		/**
		 * Enqueue assets
		 *
		 * @return void
		 */
		public static function admin_enqueue_scripts()
		{
			wp_enqueue_style( 'text-limiter', plugin_dir_url( __FILE__ ) . 'css/text-limiter.css' );
			wp_enqueue_script( 'text-limiter', plugin_dir_url( __FILE__ ) . 'js/text-limiter.js', array( 'jquery' ), '', true );
		}
	}
}
