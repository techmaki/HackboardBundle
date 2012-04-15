<?php

namespace Techmaki\Bundle\HackboardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Techmaki\Bundle\HackboardBundle\Entity\Applicant
 *
 * @ORM\Table(name="applicants")
 * @ORM\Entity(repositoryClass="Techmaki\Bundle\HackboardBundle\Entity\ApplicantRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Applicant
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
   * @var datetime $updated_at
   *
   * @ORM\Column(name="updated_at", type="datetime")
   */
  private $updated_at;

  /**
   * @var string $name
   *
   * @ORM\Column(name="name", type="string", length=255)
   */
  private $name;

  /**
   * @var string $email
   *
   * @ORM\Column(name="email", type="string", length=255)
   */
  private $email;

  /**
   * @var string $mobile
   *
   * @ORM\Column(name="mobile", type="string", length=255)
   */
  private $mobile;

  /**
   * @var text $skills
   *
   * @ORM\Column(name="skills", type="text")
   */
  private $skills;

  /**
   * @var text $project_idea
   *
   * @ORM\Column(name="project_idea", type="text")
   */
  private $project_idea;

  /**
   * @var text $team_members
   *
   * @ORM\Column(name="team_members", type="text", nullable="true")
   */
  private $team_members;

  /**
   * @var string $referal
   *
   * @ORM\Column(name="referal", type="string", length=255, nullable="true")
   */
  private $referal;

  /**
   * @var string $facebook
   *
   * @ORM\Column(name="facebook", type="string", length=255, nullable="true")
   */
  private $facebook;

  /**
   * @var string $twitter
   *
   * @ORM\Column(name="twitter", type="string", length=255, nullable="true")
   */
  private $twitter;

  /**
   * @var string $github
   *
   * @ORM\Column(name="github", type="string", length=255, nullable="true")
   */
  private $github;

  /**
   * @Assert\NotBlank()
   * @ORM\ManyToOne(targetEntity="Event")
   * @ORM\JoinColumn(name="event")
   */
  private $event;

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
   * @ORM\prePersist
   */
  public function setCreatedAtValue()
  {
    $this->setCreatedAt(new \DateTime());
    return $this;
  }

  /**
   * Set created_at
   *
   * @param datetime $createdAt
   */
  public function setCreatedAt($createdAt)
  {
      $this->created_at = $createdAt;
      return $this;
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
   * @ORM\prePersist
   * @ORM\postPersist
   */
  public function setUpdatedAtValue()
  {
    $this->setUpdatedAt(new \DateTime());
    return $this;
  }

  /**
   * Set updated_at
   *
   * @param datetime $updatedAt
   */
  public function setUpdatedAt($updatedAt)
  {
      $this->updated_at = $updatedAt;
      return $this;
  }

  /**
   * Get updated_at
   *
   * @return datetime 
   */
  public function getUpdatedAt()
  {
      return $this->updated_at;
  }

  /**
   * Set name
   *
   * @param string $name
   */
  public function setName($name)
  {
      $this->name = $name;
      return $this;
  }

  /**
   * Get name
   *
   * @return string 
   */
  public function getName()
  {
      return $this->name;
  }

  /**
   * Set email
   *
   * @param string $email
   */
  public function setEmail($email)
  {
      $this->email = $email;
      return $this;
  }

  /**
   * Get email
   *
   * @return string 
   */
  public function getEmail()
  {
      return $this->email;
  }

  /**
   * Set mobile
   *
   * @param string $mobile
   */
  public function setMobile($mobile)
  {
      $this->mobile = $mobile;
      return $this;
  }

  /**
   * Get mobile
   *
   * @return string 
   */
  public function getMobile()
  {
      return $this->mobile;
  }

  /**
   * Set skills
   *
   * @param text $skills
   */
  public function setSkills($skills)
  {
      $this->skills = $skills;
      return $this;
  }

  /**
   * Get skills
   *
   * @return text 
   */
  public function getSkills()
  {
      return $this->skills;
  }

  /**
   * Set project_idea
   *
   * @param text $projectIdea
   */
  public function setProjectIdea($projectIdea)
  {
      $this->project_idea = $projectIdea;
      return $this;
  }

  /**
   * Get project_idea
   *
   * @return text 
   */
  public function getProjectIdea()
  {
      return $this->project_idea;
  }

  /**
   * Set team_members
   *
   * @param text $teamMembers
   */
  public function setTeamMembers($teamMembers)
  {
      $this->team_members = $teamMembers;
      return $this;
  }

  /**
   * Get team_members
   *
   * @return text 
   */
  public function getTeamMembers()
  {
      return $this->team_members;
  }

  /**
   * Set referal
   *
   * @param string $referal
   */
  public function setReferal($referal)
  {
      $this->referal = $referal;
      return $this;
  }

  /**
   * Get referal
   *
   * @return string 
   */
  public function getReferal()
  {
      return $this->referal;
  }

  /**
   * Set facebook
   *
   * @param string $facebook
   */
  public function setFacebook($facebook)
  {
      $this->facebook = $facebook;
      return $this;
  }

  /**
   * Get facebook
   *
   * @return string 
   */
  public function getFacebook()
  {
      return $this->facebook;
  }

  /**
   * Set twitter
   *
   * @param string $twitter
   */
  public function setTwitter($twitter)
  {
      $this->twitter = $twitter;
      return $this;
  }

  /**
   * Get twitter
   *
   * @return string 
   */
  public function getTwitter()
  {
      return $this->twitter;
  }

  /**
   * Set github
   *
   * @param string $github
   */
  public function setGithub($github)
  {
      $this->github = $github;
      return $this;
  }

  /**
   * Get github
   *
   * @return string 
   */
  public function getGithub()
  {
      return $this->github;
  }

  /**
   * Set event
   *
   * @param Techmaki\Bundle\HackboardBundle\Entity\Event $event
   */
  public function setEvent(Event $event)
  {
      $this->event = $event;
      return $this;
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
}