<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>River Life</title>


<?php if($_SERVER['HTTPS']) { ?>

    <!-- Bootstrap core CSS -->
    <link href="include/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="include/bootstrap-3.3.5-dist/css/cover.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<!-- BEGIN 1: Load the Google Identity Toolkit helpers -->
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
    '#googleBadge', // accepts any CSS selector
    {
      widgetUrl: "/gitkit",
      signOutUrl: "/",
    }
  );
</script><!-- END 1: Load the Google Identity Toolkit helpers -->

<?php } ?>

    <!-- BEGIN header.css -->
    <style>
		<?php include("/var/www/_include/header.css");?>
    </style><!-- END header.css -->

  </head>
  <body>
    <!-- <h1></h1> -->
<?php if($_SERVER['HTTPS']) { ?>



<!-- BEGIN 2: Print the user information if a signed in user is present
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
</p><!-- END 2: Print the user information if a signed in user is present -->

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
	      <!-- MASTHEAD BRAND
              <h3 class="masthead-brand">River Life</h3> -->
              <nav>
                <ul class="nav masthead-nav">
                  <li class="active"><a href="/">Home</a></li>
                  <li><a href="mailto:webmaster@river.life">Contact</a></li>
                  <li><a href="#" id="googLog" onclick='$(".gitkit-id-submit").click();'>Google Login</a></li>
		  <!-- 2: Include the sign in button widget with the matching 'navbar' id -->
		  <li><div id="googleBadge"></div></li>
		  
                </ul>
              </nav>
            </div>
          </div>

	<!-- INNER COVER TEMPLATE HTML
          <div class="inner cover">
            <h1 class="cover-heading">Cover your page.</h1>
            <p class="lead">Cover is a one-page template for building simple and beautiful home pages. Download, edit the text, and add your own fullscreen background photo to make it your own.</p>
            <p class="lead">
              <a href="#" class="btn btn-lg btn-default">Learn more</a>
            </p>
          </div> -->

	<!-- MAST FOOT
          <div class="mastfoot">
            <div class="inner">
              <p>Cover template for <a href="http://getbootstrap.com">Bootstrap</a>, by <a href="https://twitter.com/mdo">@mdo</a>.</p>
            </div>
          </div> -->

        </div>

      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="include/jQuery-1.11.3/jquery.min.js"></script>
    <script src="include/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="include/bootstrap-3.3.5-dist/js/ie10-viewport-bug-workaround.js"></script>

<script>
$(window).bind("load", function() {
   //$(".gitkit-id-submit").html("Google Login");
   if ($(".gitkit-id-submit").length)
	$(".gitkit-id-submit").hide();
   else $("#googLog").hide();
});
</script>

<?php } ?>

<!-- GOOGLE ANALYTICS -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-65167719-1', 'auto');
  ga('send', 'pageview');

</script>

  </body>
</html>
