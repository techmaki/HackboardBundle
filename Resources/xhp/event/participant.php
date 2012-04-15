<?php

class :hb:event:participant extends :symfony:base {

  attribute
    Techmaki\Bundle\HackboardBundle\Entity\Participant participant @required;

  public function render() {
    $participant = $this->getAttribute('participant');
    $user = $participant->getUser();

    $facebook_id = $user->getFacebookID();
    $facebook_url = "https://www.facebook.com/{$facebook_id}";
    $picture = "https://graph.facebook.com/{$facebook_id}/picture";

    $name = $user->getName();

    return
      <div class="row">
        <div class="span1">
          <a href={$facebook_url}>
            <img
              src={$picture}
              alt={$name}
              title={$name}
            />
          </a>
        </div>
        <div class="span10">
          {$this->renderUser()}
        </div>
      </div>;
  }

  private function renderUser() {
    $participant = $this->getAttribute('participant');
    $user = $participant->getUser();
    $facebook_url = "https://www.facebook.com/{$user->getFacebookID()}";

    return
      <x:frag>
        <h3>
          <a href={$facebook_url}>
            {$user->getName()}
          </a>
          &nbsp;
          <small>
            {$user->getSkills()}
          </small>
        </h3>
      </x:frag>;

  }

}
