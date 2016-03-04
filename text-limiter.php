<?php
/*
 * Plugin Name: Meta Box Text Limiter
 * Plugin URI: http://metabox.io
 * Description: Limit number of characters or words entered for text and textarea fields
 * Author: ThaoHa, Rilwis
 * Version: 1.0.1
 * Author URI: http://metabox.io
 */

add_action( 'rwmb_before', array( 'Text_Limiter', 'register' ) );

/* Pre Meta Box 4.8.2 */
add_filter( 'rwmb_get_field', array( 'Text_Limiter', 'get_value' ), 10, 4 );
add_filter( 'rwmb_the_field', array( 'Text_Limiter', 'the_value' ), 10, 4 );

/* Meta Box 4.8.2 and above */
add_filter( 'rwmb_get_value', array( 'Text_Limiter', 'get_value' ), 10, 4 );
add_filter( 'rwmb_the_value', array( 'Text_Limiter', 'the_value' ), 10, 4 );

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
		 * Filters the value of a field
		 *
		 * @see rwmb_get_field() in meta-box/inc/functions.php for explenation
		 *
		 * @param string $value
		 * @param array  $field
		 * @param array  $args
		 * @param int    $post_id
		 * @return string
		 */
		public static function get_value( $value, $field, $args, $post_id )
		{
			if ( ! in_array( $field['type'], self::$types ) || ! isset( $field['limit'] ) || ! is_numeric( $field['limit'] ) || ! $field['limit'] > 0 )
			{
				return $value;
			}

			$type = isset( $field['limit_type'] ) ? $field['limit_type'] : 'character';
			if ( 'word' == $type )
			{
				$value_array = preg_split( '/\s+/', $value, - 1, PREG_SPLIT_NO_EMPTY );
				$delimiter   = ' ';
			}
			else
			{
				$value_array = explode( '', $value, $field['limit'] );
				$delimiter   = '';
			}

			$value = implode( $delimiter, array_slice( $value_array, 0, $field['limit'] ) );

			return $value;
		}

		/**
		 * Filters the displayed value of a field
		 *
		 * @see rwmb_the_field() in meta-box/inc/functions.php for explenation
		 *
		 * @param string $output
		 * @param array  $field
		 * @param array  $args
		 * @param int    $post_id
		 * @return string
		 */
		public static function the_value( $output, $field, $args, $post_id )
		{
			return self::get_value( $output, $field, $args, $post_id );
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
