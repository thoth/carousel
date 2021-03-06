<?php

/**
 * Carousel App Model
 *
 * @category Carousel.Model
 * @package  Croogo.Carousel.Model
 * @version  1.0
 * @author   Tom Rader <to.rader@claritymediasolutions.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class Carousel extends CarouselAppModel {

	public $order = 'Carousel.weight, Carousel.start_date';
}
