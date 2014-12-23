<?php $view->extend('layout.php');?>
<div class="row">
    <div class="col-lg-8">
        <?php echo $view->render('flagbag-message.php', array()); ?>
    </div>
</div>
<h1 class="cover-heading">Welcome to Custom Framework Demo</h1>
<p class="lead">
   <a href="<?php echo $view['router']->generate('admin_home') ?>">
       <i class="fa fa-sign-in"></i>&nbsp;Connect to admin
   </a>
   <br />
   <b>Login :</b> test@test.com
   <br />
   <b>Password :</b> test
</p>
<p class="lead">
  <a target="_blank" href="https://github.com/CHenzel/Custom-Framework" class="btn btn-lg btn-default"><i class="fa fa-github"></i>&nbsp;Learn more</a>
</p>