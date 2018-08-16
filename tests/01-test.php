<?php
add_filter( 'rwmb_meta_boxes', function( $meta_boxes ) {

	$meta_boxes[] = array(
		'title'      => 'Test',
		'fields'     => array(
			array(
				'name'       => 'Text',
				'id'         => 't',
				'type'       => 'text',
				'limit'      => 140,
				'limit_type' => 'character',
			),
			array(
				'name'       => 'Text Clone',
				'id'         => 't2',
				'type'       => 'text',
				'clone'      => true,
				'limit'      => 140,
				'limit_type' => 'character',
			),
			// GROUP
			array(
				'id'          => 'g',
				'type'        => 'group',
				'clone'       => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'fields' => array(
					array(
						'name'       => 'Name',
						'id'         => 'n',
						'type'       => 'text',
						'clone'      => true,
						'limit'      => 140,
						'limit_type' => 'character',
					),
					array(
						'name'       => 'About',
						'id'         => 'a',
						'type'       => 'textarea',
						'cols'       => 20,
						'rows'       => 3,
						'limit'      => 140,
						'limit_type' => 'character',
					),
				),
			),
		),
	);

	return $meta_boxes;
} );