<?php

namespace AppBundle\Entity\Dashboard;

use XandrieBundle\Tools\Dashboard\AbstractDashboard;
use AppBundle\Form\DashboardType;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\Form\FormFactoryInterface;

class Dashboard extends AbstractDashboard {
	
	
	private $router;
	private $form_factory;
	private $iduser;

	
	
	public function __construct(Router $c, FormFactoryInterface $fc, $iduser) {
		$this->router 		= $c;
		$this->form_factory = $fc;
		$this->iduser 		= $iduser;
	}
	
	
	
	/**
	 *
	 * @see \XandrieBundle\Tools\Dashboard\AbstractDashboard::addItems()
	 */
	public function addItems($values){
		if(gettype($values) == 'array') {
			foreach($values as $item){
				array_push($this->items, $item);
			}
		} else
			array_push($this->items, $values);
	}
	
	
	
	/**
	 *
	 * @see \XandrieBundle\Tools\Dashboard\AbstractDashboard::removeItems()
	 */
	public function removeItems($keys) {
		if (gettype($keys) == 'array') {
			foreach($keys as $key){
				unset($this->items[$key]);
			}
		} else
			unset($this->items[$keys]);
	}
	
	
	
	/**
	 *
	 * @see \XandrieBundle\Tools\Dashboard\AbstractDashboard::createForm()
	 */
	public function createForm($route){
		$form = $this->form_factory->create(new DashboardType(), null, array(
				'action' => $this->router->generate($route),
				'method' => 'GET' 
		));
		
		
		return $form;
	}
	
	
	
	/**
	 *
	 * @see \XandrieBundle\Tools\Dashboard\AbstractDashboard::render()
	 */
	public function render(){
		
		return array (
				'title'		 => $this->getTitle(),
				'form' 		 => $this->form->createView(),
				'jsoncharts' => $this->items 
		);
	}

	
	
	
	
	
	
}
