<?php
/**
 * CarouselActivation
 *
 * Activation class for Carousel plugin.
  *
 * @package  Croogo
 * @author   Tom Rader <tom.rader@claritymediasolutions.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.claritymediasolutions.com
 */		
class CarouselActivation {
	public function beforeActivation(&$controller) {
		return true;
	}

	public function onActivation(&$controller) {
		CakePlugin::load('Carousel');
		App::import('Model', 'CakeSchema');
		App::import('Model', 'ConnectionManager');
		include_once(APP.'Plugin'.DS.'Carousel'.DS.'Config'.DS.'Schema'.DS.'schema.php');
		$db = ConnectionManager::getDataSource('default');

		//Get all available tables
		$tables = $db->listSources();

		$CakeSchema = new CakeSchema();
		$CarouselSchema = new CarouselSchema();

		foreach ($CarouselSchema->tables as $table => $config) {
			if (!in_array($table, $tables)) {
				$db->execute($db->createSchema($CarouselSchema, $table));
			}
		}

		//Ignore the cache since the tables wont be inside the cache at this point
		//$db->cacheSources = false;
		@unlink(TMP . 'cache' . DS . 'models/cake_model_' . ConnectionManager::getSourceName($db). '_' . $db->config["database"] . '_list');
		$db->listSources();

		$controller->Setting->write('Carousel.carousel_rotation_interval','yes',array('description' => 'Rotation Interval','editable' => 1));

	}

	public function beforeDeactivation(&$controller) {
		return true;
	}

	public function onDeactivation(&$controller) {
	}

}