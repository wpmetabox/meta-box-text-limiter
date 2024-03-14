<?php
add_filter( 'rwmb_meta_boxes', function ( $meta_boxes ) {
	$meta_boxes[] = [
		'title'  => 'Text limit for WYSIWYG editor',
		'fields' => [
			[
				'name'       => 'Editor',
				'id'         => 't',
				'type'       => 'wysiwyg',
				'limit'      => 140,
				'limit_type' => 'character',
			],
			[
				'name'       => 'Editor Clone',
				'id'         => 't2',
				'type'       => 'wysiwyg',
				'clone'      => true,
				'limit'      => 20,
				'limit_type' => 'word',
			],
			// GROUP
			[
				'id'          => 'g',
				'type'        => 'group',
				'clone'       => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'fields'      => [
					[
						'name'       => 'Editor',
						'id'         => 'n',
						'type'       => 'wysiwyg',
						'clone'      => true,
						'limit'      => 140,
						'limit_type' => 'character',
					],
					[
						'name'       => 'Editor',
						'id'         => 'a',
						'type'       => 'wysiwyg',
						'limit'      => 20,
						'limit_type' => 'word',
					],
				],
			],
		],
	];

	return $meta_boxes;
} );