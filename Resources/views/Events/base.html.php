<?php
$route = $view->container->get('request')->attributes->get('_route'); 

$xhp = 
<x:frag>
  <twitter:topbar>
    <symfony:a class="brand" route="techmaki_hackboard_events_show">
      <tx>
        HWKL 3
      </tx>
    </symfony:a>
    <ul class="nav">
      <li><a href="#less">Sponsors</a></li>
    </ul>
  </twitter:topbar>
  <div class="container">
    <symfony:slot:output name="_content" />
  </div>
</x:frag>

echo $xhp->toString();
