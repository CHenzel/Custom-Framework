<?php $view->extend('layout_admin.php') ?>
<h3><i class="fa fa-angle-right"></i> Admin - Ficher</h3>
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
                    <h4 class="mb"><i class="fa fa-angle-right"></i> Admin <?php echo $admin->getNom(); ?>
                    <a class="btn btn-primary btn-xs pull-right"
                       title="editer" 
                       href="<?php echo $view['router']->generate('admin_admin_edit',array('id'=>$admin->getId())) ?>">
                       <i class="fa fa-pencil"></i>&nbsp;Modifier
                    </a>
                    <a class="btn btn-success btn-xs pull-right mr10"
                       title="liste" 
                       href="<?php echo $view['router']->generate('admin_admin_list') ?>">
                       <i class="fa fa-list"></i>&nbsp;Liste des admins
                    </a>
                    </h4>
                </div>
            </div>
            <div class="row"> 
                <div class="col-lg-12">
                    <dl class="dl-horizontal">
                        <dt>Email</dt>
                        <dd><?php echo $admin->getUsername(); ?></dd>
                        <dt>Nom</dt>
                        <dd><?php echo $admin->getNom(); ?></dd>
                        <dt>Prénom</dt>
                        <dd><?php echo $admin->getPrenom(); ?></dd>
                        <dt>Ville</dt>
                        <dd><?php echo $admin->getPrenom(); ?></dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt>Statut</dt>
                        <dd><?php echo $admin->getStatut() == \model\Admin::STATUT_ACTIF ? 'Actif' : 'Inactif' ; ?></dd>
                        <dt>Role</dt>
                        <dd><?php echo $admin->getRole() == \model\Admin::USER_ADMIN ? 'Admin' : 'Super Admin' ; ?></dd>                        
                        <dt>Date de création</dt>
                        <dd><?php echo $admin->getDateCreation() ? $admin->getDateCreation()->format('Y-m-d') : ''; ?></dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>