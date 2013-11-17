<?php

CroogoNav::add('carousel', array(
	'title' => 'Carousels',
	'weight'=>0,
	'icon'=>'picture',
	'url' => '#',
	'children' => array(
		'list' => array(
			'title' => 'List Carousels',
			'url' => array(
				'plugin' => 'carousel',
				'admin' => true,
				'controller' => 'carousels',
				'action' => 'index',
			),
		),
		'add_carousels' => array(
			'title' => 'Add Carousel',
			'url' => array(
				'plugin' => 'carousel',
				'admin' => true,
				'controller' => 'carousels',
				'action' => 'add',
			),
		),
	)
));



	CroogoNav::add('settings.children.carousel', array(
		'title' => 'Carousel',
		'url' => array(
			'admin' => true,
			'plugin' => 'settings',
			'controller' => 'settings',
			'action' => 'prefix',
			'Carousel',
		),
	));