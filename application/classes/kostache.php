<?php defined('SYSPATH') or die('No direct script access.');

/**
 * This class provides basic functionality to all Kostache classes that extend it.
 */
abstract class Kostache extends Kohana_Kostache
{
	/**
	 * @var string Partial name for content
	 */
	const CONTENT_PARTIAL = 'content';

	/**
	 * @var string Base URL string
	 */
	public $base_url;

	/**
	 * @var boolean Render template in layout?
	 */
	public $render_layout = FALSE;

	/**
	 * @var string Page title
	 */
	public $title = FALSE;

	/** @var string Defines base template to use.
	 * 				It *must* have {{>content}} in it, calling the current view body.
	 * 				layout filename gets changed to ".{$_layout}.mustache"
	 */
	protected $_layout = 'layout';

	/** @var array Defines partials/child template files */
	protected $_partials = array();

	/**
	 * @param string|null $template
	 * @param array|null $partials
	 */
	public function __construct($template = NULL, array $partials = NULL)
	{
		$this->base_url = URL::base(TRUE);

		parent::__construct($template, $partials);
	}

	/**
	 * Change the base template
	 *
	 * @param String $layout
	 * @return Kostache
	 */
	public function set_layout($layout)
	{
		$this->_layout = $layout;

		return $this;
	}

	/**
	 * Kick off the Mustache render process and return the rendered string (HTML/JSON/etc)
	 *
	 * @return string
	 */
	public function render()
	{
		if ( ! $this->render_layout)
		{
			return parent::render();
		}

		$partials = $this->_partials;

		$partials[self::CONTENT_PARTIAL] = $this->_template;

		$template = $this->_load($this->_layout);

		return $this->_stash($template, $this, $partials)->render();
	}
}