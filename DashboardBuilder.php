<?php

namespace AppBundle\Entity\Dashboard;

use AppBundle\Entity\Dashboard\AdminDashboard;
use AppBundle\Entity\Dashboard\EmployeeDashboard;
use AppBundle\Entity\Dashboard\TeamLeaderDashboard;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\Form\FormFactoryInterface;

class DashboardBuilder {
	private $router;
	private $form_factory;
	
	
	public function __construct(Router $r, FormFactoryInterface $fc) {
		$this->router = $r;
		$this->form_factory = $fc;
	}
	
	/**
	 * Build and initialize a AdminDashboard object type
	 * @param integer $iduser
	 * @return Dashboard
	 */
	public function prepareDashBoardAdmin($iduser) {
		$adashboard = new AdminDashboard ( $this->router, $this->form_factory, $iduser );
		return $adashboard;
	}
	
	/**
	 * Build and initialize a EmployeeDashboard object type
	 * @return Dashboard
	 */
	public function prepareDashBoardEmployee($iduser) {
		$edashboard = new EmployeeDashboard ();
		return $edashboard;
	}
	
	/**
	 * Build and initialize a TeamLeaderDashboard object type
	 * @return Dashboard
	 */
	public function prepareDashBoardTeamLeader() {
		$tdashboard = new TeamLeaderDashboard ();
		return $tdashboard;
	}
}
