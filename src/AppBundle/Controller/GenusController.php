<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class GenusController extends Controller
{
	/**
     * @Route("/")
     */
	public function indexAction()
	    {
	    	return $this->render('genus/index.html.twig', array(
	    		'title' => 'home page'
	    	));
	    }
	/**
     * @Route("/genus/{name}")
     */
	public function showAction($name)
	    {
	    	/*$templating = $this->container->get("templating");
	    	$html = $templating->render('genus/show.html.twig', array(
	    		'name' => $name
	    	));
	    	return new Response($html);*/
	    	$notes = [
	            'Octopus asked me a riddle, outsmarted me',
	            'I counted 8 legs... as they wrapped around me',
	            'Inked!'
	        ];
	    	return $this->render('genus/show.html.twig', array(
	    		'name' => $name,
	    		'notes' => $notes
	    	));
	    }
}