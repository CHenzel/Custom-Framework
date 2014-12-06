<?php $view->extend('layout.php');?>
<h3><i class="fa fa-angle-right"></i> Livre - Ajouter Livre</h3>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="<?php echo $view['router']->generate('home') ?>">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-book"></i> Livre
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-8">
        <?php echo $view->render('livre/form.php', array()); ?>
    </div>
</div>
