<?php $view->extend('layout_admin.php') ?>
<h3><i class="fa fa-angle-right"></i> Livre - Ficher</h3>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="<?php echo $view['router']->generate('admin_home') ?>">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-book"></i> Livre
            </li>
            <li class="active">
                <i class="fa fa-eye"></i> Fiche
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
            <div class="row"> 
                <div class="col-lg-12">
                    <h4 class="mb"><i class="fa fa-angle-right"></i> Livre <?php echo $book->getNom(); ?>
                    <a class="btn btn-primary btn-xs pull-right"
                       title="editer" 
                       href="<?php echo $view['router']->generate('admin_book_edit',array('id'=>$book->getId())) ?>">
                       <i class="fa fa-pencil"></i>&nbsp;Modifier
                    </a>
                    <a class="btn btn-success btn-xs pull-right mr10"
                       title="liste" 
                       href="<?php echo $view['router']->generate('admin_book_list') ?>">
                       <i class="fa fa-list"></i>&nbsp;Liste des livres
                    </a>
                    </h4>
                </div>
            </div>
            <div class="row"> 
                <div class="col-lg-12">
                    <dl class="dl-horizontal">
                        <dt>Nom</dt>
                        <dd><?php echo $book->getNom(); ?></dd>
                        <dt>Genre</dt>
                        <dd><?php echo $book->getGenre(); ?></dd>
                        <dt>Auteur</dt>
                        <dd><?php echo $book->getAuteur() ? $book->getAuteur()->getFullName() : ''; ?></dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt>Date de parution</dt>
                        <dd><?php echo $book->getDateParution() ? $book->getDateParution()->format('Y-m-d') : ''; ?></dd>
                        <dt>Prix</dt>
                        <dd><?php echo $book->getPrix(); ?></dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>