<?php $view->extend('layout.php');?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Livres <small>Nouveau</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="<?php echo $view['router']->generate('test_home') ?>">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-book"></i> Livre
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <?php echo $view->render('livre/form.php', array()); ?>
    </div>
</div>