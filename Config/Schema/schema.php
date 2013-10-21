<?php 

class CarouselSchema extends CakeSchema {

	public $name = 'Carousel';

	public function before($event = array()) {
		return true;
	}

	public function after($event = array()) {
	}

	public $carousels = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'title' => array('type' => 'string', 'length' => 255, 'null' => true),
		'body' => array('type' => 'text', 'null' => true),
		'url' => array('type' => 'text', 'null' => true),
		'image' => array('type' => 'string', 'length' => 255, 'null' => true),
		'start_date' => array('type' => 'timestamp', 'null' => true),
		'end_date' => array('type' => 'timestamp', 'null' => true),
		'weight' => array('type' => 'integer', 'length'=>10, 'default'=>0, 'null' => true),
		'created' => array('type' => 'timestamp', 'null' => true),
		'modified' => array('type' => 'timestamp', 'null' => true),
		'indexes' => array(
			'id' => array('column' => array('id'), 'unique' => true),
		),
		'tableParameters' => array(
			'charset' => 'utf8',
			'collate' => 'utf8_unicode_ci',
			'engine' => 'InnoDb'
		),
	);



}
