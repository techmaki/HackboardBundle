<?php

namespace Techmaki\Bundle\HackboardBundle\Controller;

use Techmaki\Bundle\HackboardBundle\Entity\Applicant;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class EventsController extends Controller
{

  /**
   * @Route("/events/{id}/apply")
   */
  public function applyAction($id)
  {
    $event = $this->getDoctrine()
      ->getRepository('TechmakiHackboardBundle:Event')
      ->find($id);

    $applicant = id(new Applicant())
      ->setEvent($event);

    $form = $this->createFormBuilder($applicant)
      ->add('name', 'text')
      ->add('email', 'email')
      ->add('mobile', 'text')
      ->add('skills', 'textarea')
      ->add('project_idea', 'textarea')
      ->add('team_members', 'textarea', array('required' => false))
      ->add('referal', 'text', array('required' => false))
      ->add('facebook', 'text', array('required' => false))
      ->add('twitter', 'text', array('required' => false))
      ->add('github', 'text', array('required' => false))
      ->getForm();

    $request = $this->getRequest();
    $valid = null;
    if ($request->getMethod() == 'POST' &&
        $request->request->has('form')) {
      $form->bindRequest($request);
      if ($valid = $form->isValid()) {
        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($applicant);
        $em->flush();
        $valid = true;
        $form->setData(new Applicant());
      }
    }

    $content = $this->renderView(
      'TechmakiHackboardBundle:Events:apply.html.php',
      array(
        'event' => $event,
        'formview' => $form->createView(),
        'applicant' => $applicant,
        'valid' => $valid,
      )
    );
    return new Response($content);
  }

  /**
   * @Route("/events/{id}")
   */
  public function showAction($id)
  {
    $event = $this->getDoctrine()
      ->getRepository('TechmakiHackboardBundle:Event')
      ->find($id);

    $participants = $this->getDoctrine()
      ->getRepository('TechmakiHackboardBundle:Participant')
      ->createQueryBuilder('p')
      ->where('p.event = :event')
      ->join('p.user', 'u')
      ->orderBy('u.name', 'ASC')
      ->setParameter('event', $id)
      ->getQuery()
      ->getResult();

    $projects = $this->getDoctrine()
      ->getRepository('TechmakiHackboardBundle:EventProject')
      ->createQueryBuilder('ep')
      ->where('ep.event = :event')
      ->join('ep.project', 'p')
      ->orderBy('p.name', 'ASC')
      ->setParameter('event', $id)
      ->getQuery()
      ->getResult();
    $projects = mpull($projects, 'getProject');

    $content = $this->renderView(
      'TechmakiHackboardBundle:Events:show.html.php',
      array(
        'event' => $event,
        'participants' => $participants,
        'projects' => $projects,
      )
    );
    return new Response($content);
  }

}
