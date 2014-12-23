<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?php $view['slots']->output('title', 'Custom-Framework Default') ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $view['assets']->getUrl('dashgum/css/bootstrap.css') ?>" rel="stylesheet">

    <link href="<?php echo $view['assets']->getUrl('dashgum/font-awesome/css/font-awesome.css') ?>" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="<?php echo $view['assets']->getUrl('front/css/cover.css') ?>" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo $view['assets']->getUrl('front/js/ie-emulation-modes-warning.js') ?>"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">Custom Framework Demo CHenzel</h3>
              <nav>
                <ul class="nav masthead-nav">
                  <li class="active"><a href="#">Home</a></li>
                </ul>
              </nav>
            </div>
          </div>

          <div class="inner cover">
            <?php $view['slots']->output('_content') ?>
          </div>

          <div class="mastfoot">
            <div class="inner">
              <p>Builded with symfony 2 framework components by Charles Henzel</p>  
              <p>Cover template for <a href="http://getbootstrap.com">Bootstrap</a>, by <a href="https://twitter.com/mdo">@mdo</a>.</p>
            </div>
          </div>

        </div>

      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="<?php echo $view['assets']->getUrl('dashgum/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo $view['assets']->getUrl('front/js/docs.min.js') ?>"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo $view['assets']->getUrl('front/js/ie10-viewport-bug-workaround.js') ?>"></script>
  </body>
</html>
