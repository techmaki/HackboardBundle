<?php

namespace Techmaki\Bundle\HackboardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Aizatto\Bundle\FacebookBundle\Entity\FacebookFriend as BaseFacebookFriend;

/**
 * Techmaki\Bundle\HackboardBundle\Entity\FacebookFriend
 *
 * @ORM\Entity()
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="facebook_friends")
 */
class FacebookFriend extends BaseFacebookFriend
{

  /**
   * Redeclared so Doctrine observes the callback.
   *
   * @ORM\prePersist
   */
  public function setCreatedAtValue()
  {
    parent::setCreatedAtValue();
    return $this;
  }

}
