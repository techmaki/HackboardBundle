<?php

class :hb:facebook:init extends :symfony:base {

  public function render() {
    $facebook = self::$container->get('facebook');
    $user_id = $facebook->getUser();
    $app_id = $facebook->getAppID();

    $scope = array(
      'email',
      'offline_access',
    );

    $router = self::$container->get('router');

    $config = array(
      'app_id' => $app_id,
      'facebook_id' => $user_id,
      'scope' => implode(',', $scope),
      'login_path' => $router->generate('facebook_login_check', array(), true),
      'logout_path' => $router->generate('facebook_logout'),
    );

    self::$container->get('hermes')->scripts->requireAsset('facebook');
    Javelin::initBehavior('facebook', $config);
    return <div id="fb-root"></div>;
  }
}
