<?php defined('SYSPATH') or die('No direct script access.');

class View_Front extends Kostache {

	protected $_layout = 'front/.layout';

	protected $_partials = array(
		'menu' => 'front/.menu',
	);
}