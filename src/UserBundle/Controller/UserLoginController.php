<?php
namespace UserBundle\Controller;

#use UserBundle\Entity\UserLogin;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use UserBundle\Entity\Ip;


class UserLoginController extends Controller
{
	/**
     * @Route("/user/logins", name="all_login_history")
     */
	public function indexLoginHistoryAction()
	    {
	    	$user_logins = $this->getDoctrine()
            	->getRepository('UserBundle:UserLogin')
            	->findAll();
            if (!$user_logins) {
		    	throw $this->createNotFoundException('No user logins found by id ' . $id);
		    }
		    $build['user_login_items'] = $user_logins;
		    return $this->render('userlogin/index_login_history.html.twig', $build);
	    }
	/**
     * @Route("/user_login/{id}", name="login_history")
     */
	public function viewLoginHistoryAction($id)
	    {
	    	$user_logins = $this->getDoctrine()
            	->getRepository('UserBundle:UserLogin')
            	->find($id);
            if (!$user_logins) {
		    	throw $this->createNotFoundException('No user logins found by id ' . $id);
		    }
		    $build['user_login_items'] = $user_logins;
		    return $this->render('userlogin/view_login_history.html.twig', $build);
	    }
	/**
     * @Route("/user/{user_id}/login_history", name="user_login_history_list")
     */
	public function showUserLoginHistoryAction($user_id)
	    {
	    	$user_logins = $this->getDoctrine()
            	->getRepository('UserBundle:UserLogin')
            	->findByUserId(2);
            if (!$user_logins) {
		    	throw $this->createNotFoundException('No user logins found by id ' . $id);
		    }
		    $build['user_login_items'] = $user_logins;
		    return $this->render('userlogin/user_login_history.html.twig', $build);
	    }
}