<?php $view->extend('layout_admin.php');?>
<h3><i class="fa fa-angle-right"></i> Auteur - Modifier l'auteur</h3>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="<?php echo $view['router']->generate('admin_home') ?>">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-user"></i> Auteur
            </li>
            <li class="active">
                <i class="fa fa-pencil"></i> Modification
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
            <h4 class="mb"><i class="fa fa-angle-right"></i> Formulaire de modification de l'auteur <?php echo $author->getNom() ?></h4>
            <form class="form-horizontal style-form" name="livre" action="<?php echo $view['router']->generate('admin_author_edit',array('id'=>$author->getId())) ?>" method="POST">
                <?php echo $view->render('admin/author/form.php', array('author'=>$author)); ?>
                <div class="form-group">
                    <div class="col-sm-10">
                        <input type="submit" class="btn btn-round btn-primary pull-right" value="Mettre à jour">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
