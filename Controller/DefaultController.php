<?php

namespace Techmaki\Bundle\HackboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\SecurityContext;

class DefaultController extends Controller
{
  /**
   * @Route("/")
   */
  public function indexAction()
  {
    $error = $this->getRequest()->getSession()->get(SecurityContext::AUTHENTICATION_ERROR);
    $events = $this->getDoctrine()
      ->getRepository('TechmakiHackboardBundle:Event')
      ->createQueryBuilder('e')
      ->orderBy('e.ends_at', 'DESC')
      ->getQuery()
      ->getResult();

    $content = $this->renderView(
      'TechmakiHackboardBundle:Default:index.html.php',
      array(
        'events' => $events,
      )
    );
    return new Response($content);
  }

}
