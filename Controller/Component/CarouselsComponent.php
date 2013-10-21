<?php
/**
 * Carousel
 *
 * Component class for Carousel plugin.
 *
 * @package  Croogo
 * @author   Tom Rader <tom.rader@claritymediasolutions.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.claritymediasolutions.com
 */		
App::uses('Component', 'Controller');

/**
 * Menus Component
 *
 * @package Croogo.Menus.Controller.Component
 */
class CarouselsComponent extends Component {

/**
 * Menus for layout
 *
 * @var string
 * @access public
 */
	public $carouselsForLayout = array();

	public $controller;

/**
 * Startup
 *
 * @param object $controller instance of controller
 * @return void
 */
	public function startup(Controller $controller) {
		$this->controller = $controller;
		if (!isset($controller->request->params['admin']) && !isset($controller->request->params['requested'])) {

		    $controller->loadModel('Carousel');
		    $this->carouselsForLayout = $controller->Carousel->find(
		    	'all', 
		    	array(
		    		'conditions'=>array(
		    			'NOW() BETWEEN start_date AND end_date'
		    		)
		    	)
		    );
		    //$controller->set(compact('carousels'));


			//$this->carousels();
		}
	}

/**
 * beforeRender
 *
 * @param object $controller instance of controller
 * @return void
 */
	public function beforeRender(Controller $controller) {
		$controller->set('carousels_for_layout', $this->carouselsForLayout);
	}

}
