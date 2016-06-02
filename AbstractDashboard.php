<?php

namespace XandrieBundle\Tools\Dashboard;

/**
 *
 * @name AbstractDashboard
 * @namespace XandrieBundle\Tools\Dashboard
 * @author Ibrahim Tounkara
 */
abstract class AbstractDashboard {
	
	/**
	 * @access protected
	 * @var Array $items
	 */
	protected $items = array ();
	
	/**
	 * @access protected
	 * @var multiple
	 */
	protected $form;
	
	
	/**
	 * @access private
	 * @var string
	 */
	private $title;
	
	
	
	
	public function getTitle() {
		return $this->title;
	}
	
	public function setTitle($title) {
		$this->title = $title;
		return $this;
	}
	
	public function getItems() {
		return $this->items;
	}
	public function getForm() {
		return $this->form;
	}
	protected function setForm($form) {
		$this->form = $form;
	}
	
	
	
	/**
	 * Add one or multiple items to a dashboard object
	 * @param multiple|array (value or array of values to add)
	 * @return void
	 */
	abstract public function addItems($values);
	
	
	/**
	 * Remove one or multiple items from a dashboard
	 * @param multiple|array (value or array of values to remove)
	 * @return void
	 */
	abstract public function removeItems($values);
	
	
	/**
	 * Create a form
	 * @param string (url where the form is sent to)
	 * @return void
	 */
	abstract protected function createForm($url);
	
	
	/**
	 * Convert a dashboard to a json array.
	 * @return Json
	 */
	abstract public function render();
	
}
