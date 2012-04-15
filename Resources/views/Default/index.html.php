<?php 
$view->extend('TechmakiHackboardBundle::base.html.php');

$xhp =
<x:frag>
  <h1>Events</h1>
  <hb:events events={$events} />
</x:frag>;

echo $xhp->toString();
