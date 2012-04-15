<?php

namespace Techmaki\Bundle\HackboardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Techmaki\Bundle\HackboardBundle\Entity\EventProject
 *
 * @ORM\Table(name="event_projects")
 * @ORM\Entity(repositoryClass="Techmaki\Bundle\HackboardBundle\Entity\EventProjectRepository")
 */
class EventProject
{
  /**
   * @var integer $id
   *
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
   * @Assert\NotBlank()
   * @ORM\ManyToOne(targetEntity="Event")
   * @ORM\JoinColumn(name="event")
   */
  private $event;

  /**
   * @Assert\NotBlank()
   * @ORM\ManyToOne(targetEntity="Project")
   * @ORM\JoinColumn(name="project")
   */
  private $project;

  /**
   * Get id
   *
   * @return integer 
   */
  public function getId()
  {
      return $this->id;
  }

    /**
     * Set event
     *
     * @param Techmaki\Bundle\HackboardBundle\Entity\Event $event
     */
    public function setEvent(\Techmaki\Bundle\HackboardBundle\Entity\Event $event)
    {
        $this->event = $event;
    }

    /**
     * Get event
     *
     * @return Techmaki\Bundle\HackboardBundle\Entity\Event 
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Set project
     *
     * @param Techmaki\Bundle\HackboardBundle\Entity\Project $project
     */
    public function setProject(\Techmaki\Bundle\HackboardBundle\Entity\Project $project)
    {
        $this->project = $project;
    }

    /**
     * Get project
     *
     * @return Techmaki\Bundle\HackboardBundle\Entity\Project 
     */
    public function getProject()
    {
        return $this->project;
    }
}
