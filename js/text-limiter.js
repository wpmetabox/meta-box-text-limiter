/* global jQuery */

jQuery( function ( $ ) {
	'use strict';

	var Limiter = {
		/**
		 * Initializing function
		 */
		init: function () {
			$( '.text-limiter' ).each( function () {
				var $input = $( this ).closest( '.rwmb-input' ),
					$clone = $( '.rwmb-clone', $input );

				if ( $clone.length ) {
					$clone.each( function () {
						Limiter.limit( $( this ) );
					} );
				} else {
					Limiter.limit( $input );
				}
			} );

			Limiter.cloneHandle();
		},

		/**
		 * Add limiter for input
		 *
		 * @param $wrapper The jQuery object for wrapper input
		 */
		limit: function ( $wrapper ) {
			var $limiter = $( '.text-limiter', $wrapper ),
				maximum = parseInt( $( '.maximum', $limiter ).text() ),
				$input = $( 'input[type=text]', $wrapper ).length ? $( 'input[type=text]', $wrapper ) : $( 'textarea', $wrapper ),
				$counter = $( '.counter', $limiter ),
				$countByWord = 'word' == $limiter.data( 'limit-type' );

			// Update length for current text
			var length = Limiter.count( $input.val(), $countByWord );
			$counter.html( length );

			// Count the input when typing
			$input.on( 'input', function () {
				var text = $input.val();
				length = Limiter.count( $input.val(), $countByWord );

				if ( length > maximum ) {
					text = Limiter.subStr( text, 0, maximum, $countByWord );
					$input.val( text );
					$counter.html( maximum );
				}
				else {
					$counter.html( length );
				}
			} );
		},

		/**
		 * Bind limiter for new clone input
		 */
		cloneHandle: function () {
			$( '.add-clone' ).on( 'click', function () {
				var $input = $( this ).closest( '.rwmb-input' );

				// Set timeout for bind event after create new clone
				setTimeout( function () {
					var $clone = $( '.rwmb-clone', $input ).last();

					// Reset display counter
					$( '.text-limiter > .counter', $clone ).html( '0' );

					Limiter.limit( $clone );
				}, 100 );
			} );
		},

		/**
		 * Count for text
		 *
		 * @param val
		 * @param countByWord
		 * @returns Integer
		 */
		count: function ( val, countByWord ) {
			if ( $.trim( val ) == '' ) {
				return 0;
			}

			return countByWord ? val.match( /\S+/g ).length : val.length;
		},

		/**
		 * Get subString for text by word or characters
		 *
		 * @param val
		 * @param start
		 * @param len
		 * @param subByWord
		 * @returns {string}
		 */
		subStr: function ( val, start, len, subByWord ) {
			if ( ! subByWord ) {
				return val.substr( start, len );
			}

			var lastIndexSpace = val.lastIndexOf( ' ' );

			return val.substr( start, lastIndexSpace );
		}
	};

	Limiter.init();
} );
