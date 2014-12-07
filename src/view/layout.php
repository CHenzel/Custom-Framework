<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>
        <?php $view['slots']->output('title', 'Custom-Framework Exemple Admin Template') ?>
    </title>
    
    <!-- Bootstrap core CSS -->
    <link href="<?php echo $view['assets']->getUrl('dashgum/css/bootstrap.css') ?>" rel="stylesheet">
    
    <!--external css-->
    <link href="<?php echo $view['assets']->getUrl('dashgum/font-awesome/css/font-awesome.css') ?>" rel="stylesheet" />
    
    <!--<link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">--> 
    <link rel="stylesheet" type="text/css" href="<?php echo $view['assets']->getUrl('dashgum/js/gritter/css/jquery.gritter.css') ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo $view['assets']->getUrl('dashgum/lineicons/style.css') ?>">
    
    <!-- Selectize -->
    <link href="<?php echo $view['assets']->getUrl('selectize/css/selectize.css') ?>" rel="stylesheet">
    
    <!-- Date picker-->
    <link href="<?php echo $view['assets']->getUrl('datepicker/css/bootstrap-datetimepicker.css') ?>" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="<?php echo $view['assets']->getUrl('dashgum/css/style.css') ?>" rel="stylesheet">
    <link href="<?php echo $view['assets']->getUrl('dashgum/css/style-responsive.css') ?>" rel="stylesheet">

    <!--<script src="assets/js/chart-master/Chart.js"></script>-->
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="<?php echo $view['router']->generate('home') ?>" class="logo"><b>Exemple Admin Panel</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- settings start -->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                            <i class="fa fa-tasks"></i>
                            <span class="badge bg-theme">4</span>
                        </a>
                        <ul class="dropdown-menu extended tasks-bar">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">You have 4 pending tasks</p>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <div class="task-info">
                                        <div class="desc">DashGum Admin Panel</div>
                                        <div class="percent">40%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <div class="task-info">
                                        <div class="desc">Database Update</div>
                                        <div class="percent">60%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <div class="task-info">
                                        <div class="desc">Product Development</div>
                                        <div class="percent">80%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <div class="task-info">
                                        <div class="desc">Payments Sent</div>
                                        <div class="percent">70%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                                            <span class="sr-only">70% Complete (Important)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="external">
                                <a href="#">See All Tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- settings end -->
                    <!-- inbox dropdown start-->
                    <li id="header_inbox_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                            <i class="fa fa-envelope-o"></i>
                            <span class="badge bg-theme">5</span>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">You have 5 new messages</p>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="photo"><img alt="avatar" src="assets/img/ui-zac.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Zac Snider</span>
                                    <span class="time">Just now</span>
                                    </span>
                                    <span class="message">
                                        Hi mate, how is everything?
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="photo"><img alt="avatar" src="assets/img/ui-divya.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Divya Manian</span>
                                    <span class="time">40 mins.</span>
                                    </span>
                                    <span class="message">
                                     Hi, I need your help with this.
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="photo"><img alt="avatar" src="assets/img/ui-danro.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Dan Rogers</span>
                                    <span class="time">2 hrs.</span>
                                    </span>
                                    <span class="message">
                                        Love your new Dashboard.
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="photo"><img alt="avatar" src="assets/img/ui-sherman.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Dj Sherman</span>
                                    <span class="time">4 hrs.</span>
                                    </span>
                                    <span class="message">
                                        Please, answer asap.
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">See all messages</a>
                            </li>
                        </ul>
                    </li>
                    <!-- inbox dropdown end -->
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="#">Logout</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="#"><img src="<?php echo $view['assets']->getUrl('dashgum/img/ui-sam.jpg') ?>" class="img-circle" width="60"></a></p>
                  <h5 class="centered">Support</h5>
              	  	
                  <li class="mt">
                      <a class="<?php if($request->getPathInfo() == $view['router']->generate('home')) { echo'active'; } else { echo '';} ?>" href="<?php echo $view['router']->generate('home') ?>">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a class="<?php if(strpos($request->getPathInfo(), 'livre')!== false) { echo'active'; } else { echo '';} ?>" href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>Livres</span>
                      </a>
                      <ul class="sub">
                        <li class="<?php if(strpos($request->getPathInfo(), $view['router']->generate('book_list'))!== false) { echo'active'; } else { echo '';} ?>">
                            <a href="<?php echo $view['router']->generate('book_list') ?>"><i class="fa fa-list"></i> Liste des livres</a>
                        </li>
                        <li class="<?php if(strpos($request->getPathInfo(), $view['router']->generate('book_new'))!== false) { echo'active'; } else { echo '';} ?>">
                            <a href="<?php echo $view['router']->generate('book_new') ?>"><i class="fa fa-pencil-square-o"></i> Ajouter un livre</a>
                        </li>
                      </ul>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
                <?php $view['slots']->output('_content') ?>
          </section>
      </section>

      <!--main content end-->
      <!--footer start-->
      <!--<footer class="site-footer">
          <div class="text-center">
              2014 - Alvarez.is
              <a href="<?php /* echo $view['router']->generate('book_new')*/ ?>#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>-->
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo $view['assets']->getUrl('dashgum/js/jquery.js') ?>" type="text/javascript" ></script>
    <script src="<?php echo $view['assets']->getUrl('dashgum/js/jquery-1.8.3.min.js') ?>" type="text/javascript" ></script>
    <script src="<?php echo $view['assets']->getUrl('dashgum/js/bootstrap.min.js') ?>" type="text/javascript" ></script>
    <script src="<?php echo $view['assets']->getUrl('dashgum/js/jquery.dcjqaccordion.2.7.js') ?>" type="text/javascript" class="include"></script>
    <script src="<?php echo $view['assets']->getUrl('dashgum/js/jquery.scrollTo.min.js') ?>" type="text/javascript"></script>
    <script src="<?php echo $view['assets']->getUrl('dashgum/js/jquery.nicescroll.js') ?>" type="text/javascript"></script>
    <script src="<?php echo $view['assets']->getUrl('dashgum/js/jquery.sparkline.js') ?>" type="text/javascript"></script>
    
    <!--common script for all pages-->
    <script src="<?php echo $view['assets']->getUrl('selectize/js/selectize.js') ?>" type="text/javascript"></script>
    
    <!--DatePicker-->
    <script src="<?php echo $view['assets']->getUrl('datepicker/js/moment.js') ?>" type="text/javascript"></script>
    <script src="<?php echo $view['assets']->getUrl('datepicker/js/bootstrap-datetimepicker.min.js') ?>" type="text/javascript"></script>

    <!--common script for all pages-->
    <script src="<?php echo $view['assets']->getUrl('dashgum/js/common-scripts.js') ?>" type="text/javascript"></script>
    
    <!--Plugin notification-->
    <script type="text/javascript" src="<?php echo $view['assets']->getUrl('dashgum/js/gritter/js/jquery.gritter.js') ?>"></script>
    <script type="text/javascript" src="<?php echo $view['assets']->getUrl('dashgum/js/gritter-conf.js') ?>"></script>
    <!--script for this page-->
    <!--<script src="assets/js/sparkline-chart.js"></script>    
    <script src="assets/js/zabuto_calendar.js"></script>-->
    <script type="text/javascript">
        $(document).ready(function () {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'Welcome to Dashgum!',
            // (string | mandatory) the text inside the notification
            text: ' next to the logo. Free version for <a href="http://blacktie.co" target="_blank" style="color:#ffd777">BlackTie.co</a>.',
            // (string | optional) the image to display on the left
            image: 'assets/img/ui-sam.jpg',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: true,
            // (int | optional) the time you want it to be alive for before fading out
            time: '',
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });

        return false;
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.selectize').selectize();
            //moment().format();
            $('.datetime').datetimepicker({
                format: 'YYYY/MM/DD',
                language: 'fr',
                pickTime: false 
            });
            
            $('.datetimepicker').datetimepicker({
                format: 'YYYY/MM/DD',
                language: 'fr',
            });
            
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            /*$("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });*/
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>
  </body>
</html>
