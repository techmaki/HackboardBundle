<?php

namespace Techmaki\Bundle\HackboardBundle;

use Aizatto\Bundle\XHPBundle\ClassLoader;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class TechmakiHackboardBundle extends Bundle
{
  public function boot() {
    $loader = new ClassLoader('hb', __DIR__.'/Resources/xhp');
    $loader->register();
  }
}
