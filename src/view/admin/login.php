<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Custom-Framework Exemple Admin login</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $view['assets']->getUrl('dashgum/css/bootstrap.css') ?>" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo $view['assets']->getUrl('dashgum/font-awesome/css/font-awesome.css') ?>" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="<?php echo $view['assets']->getUrl('dashgum/css/style.css') ?>" rel="stylesheet">
    <link href="<?php echo $view['assets']->getUrl('dashgum/css/style-responsive.css') ?>" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
	  <div id="login-page">
	  	<div class="container">
		      <form class="form-login" action="<?php echo $view['router']->generate('admin_login') ?>" method="POST">
		        <h2 class="form-login-heading">Connexion au panel Admin</h2>
		        <div class="login-wrap">
                            <?php echo $view->render('flagbag-message.php', array()); ?>
		            <input type="text" name="login" class="form-control" placeholder="Email" autofocus>
		            <br>
		            <input type="password" name="password" class="form-control" placeholder="Mot de passe">
		            <label class="checkbox">
		                <span class="pull-right">
		                    <a data-toggle="modal" href="login.html#myModal"> Mot de passe oublié?</a>
		                </span>
		            </label>
		            <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> Se connecter</button>
		            <hr>
		            
		            <div class="login-social-link centered">
		            <p>or you can sign in via your social network</p>
		                <button class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i> Facebook</button>
		                <button class="btn btn-twitter" type="submit"><i class="fa fa-twitter"></i> Twitter</button>
		            </div>
		            <div class="registration">
		                Don't have an account yet?<br/>
		                <a class="" href="#">
		                    Create an account
		                </a>
		            </div>
		        </div>
		          <!-- Modal -->
		          <!--<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Forgot Password ?</h4>
		                      </div>
		                      <div class="modal-body">
		                          <p>Enter your e-mail address below to reset your password.</p>
		                          <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
		
		                      </div>
		                      <div class="modal-footer">
		                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
		                          <button class="btn btn-theme" type="button">Submit</button>
		                      </div>
		                  </div>
		              </div>
		          </div>-->
		          <!-- modal -->
		      </form>	  	
	  	</div>
	  </div>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo $view['assets']->getUrl('dashgum/js/jquery.js') ?>" type="text/javascript" ></script>
    <script src="<?php echo $view['assets']->getUrl('dashgum/js/bootstrap.min.js') ?>" type="text/javascript" ></script>
    
    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script src="<?php echo $view['assets']->getUrl('dashgum/js/jquery.backstretch.min.js') ?>" type="text/javascript" ></script>
    <script>
        $.backstretch("assets/img/login-bg.jpg", {speed: 500});
    </script>
  </body>
</html>
