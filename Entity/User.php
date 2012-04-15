<?php

namespace Techmaki\Bundle\HackboardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Aizatto\Bundle\FacebookBundle\Entity\User as BaseUser;

/**
 * Techmaki\Bundle\HackboardBundle\Entity\User
 *
 * @ORM\Table(name="users")
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Entity(repositoryClass="Techmaki\Bundle\HackboardBundle\Entity\UserRepository")
 */
class User extends BaseUser
{
  /**
   * @var integer $id
   *
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * @var string $mobile
   *
   * @ORM\Column(name="mobile", type="string", length=255, nullable=true)
   */
  protected $mobile;

  /**
   * @var text $skills
   *
   * @ORM\Column(name="skills", type="text", nullable=true)
   */
  protected $skills;

  /**
   * @var bigint $facebook_id
   *
   * @ORM\Column(name="facebook_id", type="bigint", nullable=true)
   */
  protected $facebook_id;

  /**
   * @var string $facebook_username
   *
   * @ORM\Column(name="facebook_username", type="string", length=255, nullable=true)
   */
  protected $facebook_username;

  /**
   * @var bigint $twitter_id
   *
   * @ORM\Column(name="twitter_id", type="bigint", nullable=true)
   */
  protected $twitter_id;

  /**
   * @var string $twitter_username
   *
   * @ORM\Column(name="twitter_username", type="string", length=255, nullable=true)
   */
  protected $twitter_username;

  /**
   * @var string $github_username
   *
   * @ORM\Column(name="github_username", type="string", length=255, nullable=true)
   */
  protected $github_username;

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
   * Set facebook_id
   *
   * @param bigint $facebookId
   */
  public function setFacebookId($facebookId)
  {
      $this->facebook_id = $facebookId;
      return $this;
  }

  /**
   * Get facebook_id
   *
   * @return bigint 
   */
  public function getFacebookId()
  {
      return $this->facebook_id;
  }

  /**
   * Set facebook_username
   *
   * @param string $facebookUsername
   */
  public function setFacebookUsername($facebookUsername)
  {
      $this->facebook_username = $facebookUsername;
      return $this;
  }

  /**
   * Get facebook_username
   *
   * @return string 
   */
  public function getFacebookUsername()
  {
      return $this->facebook_username;
  }

  /**
   * Set twitter_id
   *
   * @param bigint $twitterId
   */
  public function setTwitterId($twitterId)
  {
      $this->twitter_id = $twitterId;
      return $this;
  }

  /**
   * Get twitter_id
   *
   * @return bigint 
   */
  public function getTwitterId()
  {
      return $this->twitter_id;
  }

  /**
   * Set twitter_username
   *
   * @param string $twitterUsername
   */
  public function setTwitterUsername($twitterUsername)
  {
      $this->twitter_username = $twitterUsername;
      return $this;
  }

  /**
   * Get twitter_username
   *
   * @return string 
   */
  public function getTwitterUsername()
  {
      return $this->twitter_username;
  }

  /**
   * Set github_username
   *
   * @param string $githubUsername
   */
  public function setGithubUsername($githubUsername)
  {
      $this->github_username = $githubUsername;
      return $this;
  }

  /**
   * Get github_username
   *
   * @return string 
   */
  public function getGithubUsername()
  {
      return $this->github_username;
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
   * @ORM\prePersist
   * @ORM\preUpdate
   */
  public function setUpdatedAtValue()
  {
    $this->setUpdatedAt(new \DateTime());
    return $this;
  }

}
