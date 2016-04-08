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
        //echo $user->getId();
        //echo "<pre>"; print_r($user ); echo "</pre>";

        if ($user instanceof UserInterface) {
            $user->setLastLogin(new \DateTime());
            $this->userManager->updateUser($user);
            $user_id = $user->getId();

            $user_login = new UserLogin();
            $user_login->setCreated(new \DateTime());
            $user_login->setUserId($user_id);
            $user_login->setIpId(3);
            $user_login->setOs('Windows');
            $user_login->setBrowserAgent('Mozilla/5.0 (iPad; U; CPU OS 3_2_1 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Mobile/7B405');
            $this->em->persist($user_login);
            $this->em->flush();
        }
    }
}
