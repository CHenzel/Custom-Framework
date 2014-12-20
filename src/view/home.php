<?php $view->extend('layout.php');?>
<div class="row">
    <div class="col-lg-8">
        <?php echo $view->render('flagbag-message.php', array()); ?>
    </div>
</div>
<div class="row marketing">
    <div class="col-lg-12">
       <?php echo $name ?>
    </div>
</div>