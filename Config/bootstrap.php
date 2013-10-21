<?php


Croogo::hookHelper('*', 'Carousel.Carousel');
Croogo::hookComponent('*', 'Carousel.Carousels');

$cacheConfig = Cache::config('_cake_model_');
$cacheConfig = Hash::merge($cacheConfig['settings'], array(
	'prefix' => 'carousels_',
	'path' => CACHE . 'queries',
	'duration' => '+1 hour',
));
Cache::config('carousel', $cacheConfig);




$Localization = new L10n();
Croogo::mergeConfig('Wysiwyg.actions', array(
	'Carousels/admin_edit' => array(
		array(
			'elements' => 'CarouselBody',
			'preset' => 'basic',
		),
	),
));



require 'admin_menu.php';
