<?php $view->extend('layout_admin.php');?>
<h3><i class="fa fa-angle-right"></i> Admin - Ajouter Admin</h3>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="<?php echo $view['router']->generate('admin_home') ?>">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-user"></i> Admin
            </li>
            <li class="active">
                <i class="fa fa-plus-circle"></i> Nouveau
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-8">
        <?php echo $view->render('flagbag-message.php', array()); ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-8">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Formulaire d'ajout</h4>
            <form class="form-horizontal style-form" name="admin" action="<?php echo $view['router']->generate('admin_admin_new') ?>" method="POST">
                <?php echo $view->render('admin/admin/form.php', array()); ?>
                <div class="form-group">
                    <div class="col-sm-10">
                        <input type="submit" class="btn btn-round btn-primary pull-right" value="Créer">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
