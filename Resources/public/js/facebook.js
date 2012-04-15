/**
 * @provides facebook 
 * @requires javelin-behavior
 * @requires javelin-stratcom
 */
JX.behavior('facebook', function(config, statics) {
  console.log(config);
  window.fbAsyncInit = function() {
    var fbconfig = {
      appId: config.app_id,
      channelUrl: window.location.protocol+"//"+window.location.host+"/channel.php",
      cookie: true,
      status: true
    }
    FB._https = (window.location.protocol == "https:");
    FB.init(fbconfig)
    
    if (config.facebook_id && config.facebook_id != 0) {
      var login_status = false;
      setTimeout(function() {
        if (login_status) {
          return;
        }
        return;

        window.location = config.logout_path;
      }, 6000);
      FB.getLoginStatus(function(response) {
        login_status = true;
        if (response.status == 'connected') {
          if (response.authResponse.userID != config.facebook_id) {
            window.location = config.login_path;
          }
        } else {
        debugger;
          window.location = config.logout_path;
        }
      });

      FB.Event.subscribe('auth.logout', function(response) {
        window.location = config.logout_path;
      });
    } else {
      FB.Event.subscribe('auth.login', function(response) {
        window.location = config.login_path;
      });
    }
  };

  (function() {
    var e = document.createElement('script');
    e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
    e.async = true;
    document.getElementById('fb-root').appendChild(e);
  })();

  JX.Stratcom.listen('click', 'facebook-connect', function(event) {
    event.kill();
    FB.login(function(response) {
      // TODO add logging
      if (response.status == 'connected') {
        window.location = event.getTarget().href;
      } else {
      }
    }, { scope: config.scope });
  });
});
