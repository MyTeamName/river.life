<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>River Life</title>
	<!-- BEGIN header.css -->
    <style>
		<?php include("/var/www/_include/header.css");?>
    </style><!-- END header.css -->

<!-- 1: Load the Google Identity Toolkit helpers -->
<?php
  set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__ .'/identity-toolkit-php-master/vendor/google/apiclient/src');
  require_once __DIR__ . '/identity-toolkit-php-master/vendor/autoload.php';

  $gitkitClient = Gitkit_Client::createFromFile(dirname(__FILE__) . '/identity-toolkit-php-master/gitkit-server-config.json');
  $gitkitUser = $gitkitClient->getUserInRequest();
?>
<script type="text/javascript" src="//www.gstatic.com/authtoolkit/js/gitkit.js"></script>
<link type=text/css rel=stylesheet href="//www.gstatic.com/authtoolkit/css/gitkit.css" />
<script type=text/javascript>
  window.google.identitytoolkit.signInButton(
    '#navbar', // accepts any CSS selector
    {
      widgetUrl: "/gitkit",
      signOutUrl: "/",
    }
  );
</script>

  </head>
  <body>
    <!-- <h1></h1> -->

<!-- 2: Include the sign in button widget with the matching 'navbar' id -->
<div id="navbar"></div>
<!-- End modification 2 -->

<!-- 2: Print the user information if a signed in user is present -->
<p>
  <?php if ($gitkitUser) { ?>
    Welcome back!<br><br>
    Email: <?= $gitkitUser->getEmail() ?><br>
    Id: <?= $gitkitUser->getUserId() ?><br>
    Name: <?= $gitkitUser->getDisplayName() ?><br>
    Identity provider: <?= $gitkitUser->getProviderId() ?><br>
  <?php } else { ?>
    You are not logged in yet.
  <?php } ?>
</p>

  </body>
</html>
