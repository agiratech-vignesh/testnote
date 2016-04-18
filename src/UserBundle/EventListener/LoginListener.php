<?php

namespace UserBundle\EventListener;

use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\UserEvent;
use FOS\UserBundle\Model\UserManagerInterface;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\Security\Http\SecurityEvents;
use UserBundle\Controller\UserLoginController;
use UserBundle\Entity\UserLogin;
use UserBundle\Entity\Ip;
use Doctrine\ORM\EntityManager;

class LoginListener implements EventSubscriberInterface
{
    protected $userManager; 
    protected $em;

    public function __construct(UserManagerInterface $userManager, EntityManager $em)
    {
        $this->userManager = $userManager;
        $this->em = $em;
    }

    public static function getSubscribedEvents()
    {
        return array(
            FOSUserEvents::SECURITY_IMPLICIT_LOGIN => 'onImplicitLogin',
            SecurityEvents::INTERACTIVE_LOGIN => 'onSecurityInteractiveLogin',
        );
    }

    public function onImplicitLogin(UserEvent $event)
    {
        $user = $event->getUser();

        $user->setLastLogin(new \DateTime());
        $this->userManager->updateUser($user);
    }

    public function onSecurityInteractiveLogin(InteractiveLoginEvent $event)
    {

        $user = $event->getAuthenticationToken()->getUser();
        $user_id = $user->getId();
        $ip_address = $event->getRequest()->getClientIp();
        $ip_id = "";
        $os_info = "";
        $browser_agent = $event->getRequest()->server->get('HTTP_USER_AGENT');
        $OS = array("Windows"   =>   "/windows|win32/i",
                    "Linux"     =>   "/Linux/i",
                    "Unix"      =>   "/Unix/i",
                    "Mac"       =>   "/Mac/i"
        );
        foreach($OS as $key => $value){
            if(preg_match($value, $browser_agent)){
                $os_info = $key;
                break;
            }
        }
        
        $ips = $this->em->getRepository('UserBundle:Ip')
                ->findOneByIpAddress($ip_address);
        if(!$ips){
            $ips = new Ip();
            $ips->setCreated(new \DateTime());
            $ips->setIpAddress($ip_address);
            $this->em->persist($ips);
            $this->em->flush();
            $ip_id  = $ips->getId();
        } else {
            $ip_id  = $ips->getId();
        }
        if ($user instanceof UserInterface) {
            $user->setLastLogin(new \DateTime());
            $this->userManager->updateUser($user);

            $user_login = new UserLogin();
            $user_login->setCreated(new \DateTime());
            $user_login->setUserId($user_id);
            $user_login->setUser($user);
            $user_login->setIpId($ip_id);
            $user_login->setIp($ips);
            $user_login->setOs($os_info);
            $user_login->setBrowserAgent($browser_agent);
            $this->em->persist($user_login);
            $this->em->flush();
        }
    }
}