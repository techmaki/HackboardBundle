<?php

class :hb:nav:facebook extends :symfony:base {

  public function render() {
    $sc = self::$container->get('security.context');
    if (!$sc->isGranted('ROLE_FACEBOOK')) {
      return
        <a href="#" data-sigil="facebook-connect">
          <tx>Login with Facebook</tx>
        </a>;
    }

    $user = $sc->getToken()->getUser();

    return
      <a href="#">
        {$user->getUsername()}
      </a>;
  }

}
