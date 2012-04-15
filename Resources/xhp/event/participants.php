<?php

class :hb:event:participants extends :symfony:base {

  attribute
    array participants @required;

  public function render() {
    $participants = $this->getAttribute('participants');

    $html = array();
    foreach ($participants as $participant) {
      $html[] = <hb:event:participant participant={$participant} />;
    }

    return
      <div>
        {$html}
      </div>;
  }

}
