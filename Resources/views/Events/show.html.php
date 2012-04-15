<?php 
$view->extend('TechmakiHackboardBundle::base.html.php');

$apply = null;
if (($event->getEndsAt()->diff(new DateTime()))) {
  $apply =
    <small>
      <symfony:a
        route="techmaki_hackboard_events_apply"
        params={array('id' => $event->getID())}>
        <tx>
          Apply
        </tx>
      </symfony:a>
    </small>;
}

$xhp =
<hb:event event={$event}>
  <h2>Venue</h2>

  <h2>
    Participants
    {$apply}
  </h2>
  <hb:event:participants participants={$participants} />

  <h2>Projects</h2>
  <hb:event:projects projects={$projects} />
</hb:event>;

echo $xhp->toString();
