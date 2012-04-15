<?php

class :hb:events extends :ui:base {

  attribute
    array events;

  public function render() {
    $rows = array();

    $events = $this->getAttribute('events');
    if (!is_array($events)) {
      $events = array();
    }

    foreach ($events as $event) {
      $rows[] =
        <tr>
          <td>
            <h2>
              <symfony:a
                route="techmaki_hackboard_events_show"
                params={array('id' => $event->getID())}>
                {$event->getName()}
              </symfony:a>
            </h2>
            <hb:date datetime={$event->getStartsAt()} />
          </td>
        </tr>;
    }

    return
      <table>
        {$rows}
      </table>;
  }
}
