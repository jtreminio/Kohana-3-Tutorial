<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Home extends Controller {

	public function action_index()
	{
		$view = new View_Front_Home;
		$view->title = 'This is our title!';
		$this->response->body($view->render());
	}

}