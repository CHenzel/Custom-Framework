<?php $view->extend('layout.php');?>
<h3><i class="fa fa-angle-right"></i> Livre - Modifier Livre</h3>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="<?php echo $view['router']->generate('home') ?>">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-book"></i> Livre
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
            <h4 class="mb"><i class="fa fa-angle-right"></i> Formulaire de modification du livre <?php echo $book->getNom() ?></h4>
            <form class="form-horizontal style-form" name="livre" action="<?php echo $view['router']->generate('book_edit',array('id'=>$book->getId())) ?>" method="POST">
                <?php echo $view->render('livre/form.php', array('book'=>$book)); ?>
                <div class="form-group">
                    <div class="col-sm-10">
                        <input type="submit" class="btn btn-round btn-primary pull-right" value="Mettre à jour">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
