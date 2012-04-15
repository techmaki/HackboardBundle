<?php

namespace Techmaki\Bundle\HackboardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Techmaki\Bundle\HackboardBundle\Entity\Participant
 *
 * @ORM\Table(name="participants")
 * @ORM\Entity(repositoryClass="Techmaki\Bundle\HackboardBundle\Entity\ParticipantRepository")
 */
class Participant
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
   * @var datetime $created_at
   *
   * @ORM\Column(name="created_at", type="datetime")
   */
  private $created_at;

  /**
   * @Assert\NotBlank()
   * @ORM\ManyToOne(targetEntity="Event")
   * @ORM\JoinColumn(name="event")
   */
  private $event;

  /**
   * @Assert\NotBlank()
   * @ORM\ManyToOne(targetEntity="User")
   * @ORM\JoinColumn(name="user")
   */
  private $user;


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
     * Set created_at
     *
     * @param datetime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
    }

    /**
     * Get created_at
     *
     * @return datetime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
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
     * Set user
     *
     * @param Techmaki\Bundle\HackboardBundle\Entity\User $user
     */
    public function setUser(\Techmaki\Bundle\HackboardBundle\Entity\User $user)
    {
        $this->user = $user;
    }

    /**
     * Get user
     *
     * @return Techmaki\Bundle\HackboardBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
