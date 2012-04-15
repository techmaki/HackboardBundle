<?php

namespace Techmaki\Bundle\HackboardBundle\Entity;

use Aizatto\Bundle\FacebookBundle\Entity\FacebookUser as BaseFacebookUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * Techmaki\Bundle\HackboardBundle\Entity\User
 *
 * @ORM\Table(name="facebook_users")
 * @ORM\Entity()
 * @ORM\HasLifecycleCallbacks()
 */
class FacebookUser extends BaseFacebookUser {

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
