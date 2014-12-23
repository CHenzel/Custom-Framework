<?php $view->extend('layout_admin.php') ?>
<?php 
    $route = 'admin_admin_list';
    $datagrid = $adminDatagrid;
    $admins = $datagrid->getResults();
    $form = $datagrid->getFilterFormView();
?>
<h3><i class="fa fa-angle-right"></i> Admin - Liste</h3>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> <a href="<?php echo $view['router']->generate('admin_home') ?>">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-list"></i> <a title="liste" href="<?php echo $view['router']->generate('admin_admin_list') ?>">Admin</a>
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <?php echo $view->render('flagbag-message.php', array()); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="content-panel">
            <div class="panel-body">
                <form name="filter_admin" action="<?php echo $view['router']->generate($route) ?>" method="post" class="form-horizontal filter-form">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-2">
                                <div class="form-group"> 
                                    <label class="col-sm-2 col-sm-2 control-label">Email</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" name="username" value="<?php echo isset($form['username']) ? $form['username']['data'] : ''; ?>">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-sm"><i class="fa fa-search"></i> Recherche</button>
                            <a href="<?php echo $view['router']->generate($route,array('action'=>'reset','datagrid'=>$datagrid->getName())) ?>" class="btn btn-danger btn-sm"><i class="fa fa-refresh"></i> rafraichir</a>
                        </div>  
                    </div>
                </form>
                <hr />
                <section id="unseen">
                    <table class="table table-bordered table-striped table-condensed">
                        <thead>
                            <tr>
                                <th><?php echo $view->render('datagrid/macro.php', array('column'=>'id','label'=>'#','route'=>$route,'datagrid'=>$datagrid)); ?></th>
                                <th><?php echo $view->render('datagrid/macro.php', array('column'=>'username','label'=>'Email','route'=>$route,'datagrid'=>$datagrid)); ?></th>
                                <th><?php echo $view->render('datagrid/macro.php', array('column'=>'nom','label'=>'Nom','route'=>$route,'datagrid'=>$datagrid)); ?></th>
                                <th><?php echo $view->render('datagrid/macro.php', array('column'=>'prenom','label'=>'Prénom','route'=>$route,'datagrid'=>$datagrid)); ?></th>
                                <th><?php echo $view->render('datagrid/macro.php', array('column'=>'ville','label'=>'Ville','route'=>$route,'datagrid'=>$datagrid)); ?></th>
                                <th><?php echo $view->render('datagrid/macro.php', array('column'=>'statut','label'=>'Statut','route'=>$route,'datagrid'=>$datagrid)); ?></th>
                                <th><?php echo $view->render('datagrid/macro.php', array('column'=>'role','label'=>'Role','route'=>$route,'datagrid'=>$datagrid)); ?></th>
                                <th><?php echo $view->render('datagrid/macro.php', array('column'=>'dateCreation','label'=>'Date de création','route'=>$route,'datagrid'=>$datagrid)); ?></th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($admins as $admin) { ?>
                            <tr>
                                <td><?php echo $admin->getId(); ?></td>
                                <td><?php echo $admin->getUsername(); ?></td>
                                <td><?php echo $admin->getNom(); ?></td>
                                <td><?php echo $admin->getPrenom(); ?></td>
                                <td><?php echo $admin->getVille(); ?></td>
                                <td><?php echo $admin->getStatut() == \model\Admin::STATUT_ACTIF ? 'Actif' : 'Inactif' ; ?></td>
                                <td><?php echo $admin->getRole() == \model\Admin::USER_ADMIN ? 'Admin' : 'Super Admin' ; ?></td>
                                <td><?php echo $admin->getDateCreation() ? $admin->getDateCreation()->format('Y-m-d') : ''; ?></td>
                                <td>
                                    <a class="btn btn-success btn-xs" title="voir" href="<?php echo $view['router']->generate('admin_admin_show',array('id'=>$admin->getId())) ?>"><i class="fa fa-eye"></i><a/>
                                    <a class="btn btn-primary btn-xs" title="editer" href="<?php echo $view['router']->generate('admin_admin_edit',array('id'=>$admin->getId())) ?>"><i class="fa fa-pencil"></i><a/>
                                    <a class="btn btn-danger btn-xs" title="supprimer" href="<?php echo $view['router']->generate('admin_admin_delete',array('id'=>$admin->getId())) ?>"><i class="fa fa-trash-o"></i><a/>
                                </td>  
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </section>
                <div class="row">
                    <div class="col-lg-12">
                        <?php echo $view->render('datagrid/pagination.php', array('route'=>$route,'datagrid'=>$datagrid,'extraParameters' => null)); ?>
                    </div>
                    <div class="col-lg-6"
                         <?php echo $view->render('datagrid/pagination_info.php', array('datagrid'=>$datagrid,'label' => 'admin(s)')); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>