<?php

class :hb:date extends :ui:base {

  attribute
    DateTime datetime @required,
    enum {
      'long'
    } type;

  public function render() {
    $datetime = $this->getAttribute('datetime');

    return
      <x:frag>
        {$datetime->format('l jS F Y')}
        at
        {$datetime->format('g:ia')}
      </x:frag>;
  }
}
