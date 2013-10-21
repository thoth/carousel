<?php
App::uses('AppHelper', 'View/Helper');

/**
 * Carousel Helper
 *
 * @category Helper
 * @package  Croogo
 * @version  1.0
 * @author   Tom Rader <tom.rader@claritymediasolutions.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.claritymediasolutions.org
 */

class CarouselHelper extends AppHelper{
/**
 * Other helpers used by this helper
 *
 * @var array
 * @access public
 */
	public $helpers = array(
		'Html',
	);

/**
 * Show Menu by Alias
 *
 * @param string $menuAlias Menu alias
 * @param array $options (optional)
 * @return string
 */

	function display($options = array()) {
		$_options = array(
			'element' => 'Carousel.carousel',
		);
		$options = array_merge($_options, $options);

		if (!isset($this->_View->viewVars['carousels_for_layout'])) {
			return false;
		}
		
		$carousel = $this->_View->viewVars['carousels_for_layout'];
		$output = $this->_View->element($options['element'], array(
			'carousels' => $carousel,
			'options' => $options,
		));
		return $output;


		
	}
}
