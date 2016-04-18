<?php
namespace UserBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
	/**
	* @Route("/admin/dashboard", name="admin_dashboard")
	*/
	public function dashboardAction()
	{
		return $this->render('admin/dashboard.html.twig');
	}
}