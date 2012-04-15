<?php

class :hb:event extends :symfony:base {

  attribute
    Techmaki\Bundle\HackboardBundle\Entity\Event event,
    bool details = true;

  public function render() {
    $event = $this->getAttribute('event');

    return 
      <section>
        <h1>
          <symfony:a
            route="techmaki_hackboard_events_show"
            params={array('id' => $event->getID())}>
            {$event->getName()}
          </symfony:a>
        </h1>
        <div class="row">
          <div class="span12">
            {$this->renderDetails()}
            {$this->getChildren()}
          </div>
          <div class="span4">
            <h2>Sponsors</h2>
          </div>
        </div>
      </section>;
  }

  private function renderDetails() {
    if (!$this->getAttribute('details')) {
      return null;
    }

    $event = $this->getAttribute('event');

    $description = $event->getDescription();
    if ($description) {
      $description =
        <p>
          <symfony:knp:markdown>
            {$description}
          </symfony:knp:markdown>
        </p>;
    }

    return 
      <x:frag>
        <p>
          Starts: <hb:date datetime={$event->getStartsAt()} type="long" />
        </p>
        <p>
          Ends: <hb:date datetime={$event->getEndsAt()} type="long" />
        </p>
        {$description}
      </x:frag>;
  }

}
