<?php defined('SYSPATH') or die('No direct script access.');

class View_Base extends Kostache
{
	public function __construct($template = NULL, array $partials = NULL)
	{
		$this->_partials[]= $partials;

		parent::__construct($template, $this->_partials);
	}
}