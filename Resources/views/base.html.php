<?php
$route = $view->container->get('request')->attributes->get('_route'); 

$xhp =
<x:frag>
  <head>
    <title>Hackboard</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css" />
    <symfony:slot:output name="head" />
  </head>
  <body class={$route} style="padding-top: 60px; padding-bottom: 120px;">
    <twitter:navbar fixedtop="true">
      <twitter:navbar:brand>
        <a href="#">
          Hackboard
        </a>
      </twitter:navbar:brand>
      <twitter:navbar:nav>
        <li><hb:nav:facebook /></li>
        <li><a href="http://www.techmaki.com">Built by Techmaki</a></li>
      </twitter:navbar:nav>
    </twitter:navbar>
    <twitter:layout>
      <hb:facebook:init />
      <symfony:session:authentication-error />
      <symfony:slot:output name="_content" />
      <symfony:hermes:scripts />
      <javelin:footer />
    </twitter:layout>
  </body>
</x:frag>;

?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#">
  <?php echo $xhp->toString(); ?>
</html>
