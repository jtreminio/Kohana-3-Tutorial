<?php defined('SYSPATH') or die('No direct script access.');

/**************************************************************
 * Catch All
 **************************************************************/
Route::set('default', '(<controller>(/<action>(/<id>)))')
	->defaults(array(
		'controller' => 'home',
		'action'     => 'index',
	));