<?php $view->extend('layout_admin.php') ?>
<?php 
    $route = 'admin_author_list';
    $datagrid = $authorDatagrid;
    $authors = $datagrid->getResults();
    $form = $datagrid->getFilterFormView();
?>
<h3><i class="fa fa-angle-right"></i> Auteur - Liste</h3>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> <a href="<?php echo $view['router']->generate('admin_home') ?>">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-list"></i> <a title="liste" href="<?php echo $view['router']->generate('admin_author_list') ?>">Auteur</a>
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
                <form name="filter_author" action="<?php echo $view['router']->generate($route) ?>" method="post" class="form-horizontal filter-form">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-2">
                                <div class="form-group"> 
                                    <label class="col-sm-2 col-sm-2 control-label">Nom</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" name="nom" value="<?php echo isset($form['nom']) ? $form['nom']['data'] : ''; ?>">
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
                                <th><?php echo $view->render('datagrid/macro.php', array('column'=>'nom','label'=>'Nom','route'=>$route,'datagrid'=>$datagrid)); ?></th>
                                <th><?php echo $view->render('datagrid/macro.php', array('column'=>'prenom','label'=>'Prénom','route'=>$route,'datagrid'=>$datagrid)); ?></th>
                                <th><?php echo $view->render('datagrid/macro.php', array('column'=>'dateNaissance','label'=>'Date de naissance','route'=>$route,'datagrid'=>$datagrid)); ?></th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($authors as $author) { ?>
                            <tr>
                                <td><?php echo $author->getId(); ?></td>
                                <td><?php echo $author->getNom(); ?></td>
                                <td><?php echo $author->getPrenom(); ?></td>
                                <td><?php echo $author->getDateNaissance() ? $author->getDateNaissance()->format('Y-m-d') : ''; ?></td>
                                <td>
                                <?php 
                                    $books = $author->getLivres();
                                    $nbBook = count($books);
                                    foreach ($books as $book) 
                                    {
                                        echo $book->getFullName();
                                        if($nbBook > 0)
                                        {
                                            echo '<br />';
                                        }
                                    }
                                ?>
                                </td>
                                <td>
                                    <a class="btn btn-success btn-xs" title="voir" href="<?php echo $view['router']->generate('admin_author_show',array('id'=>$author->getId())) ?>"><i class="fa fa-eye"></i><a/>
                                    <a class="btn btn-primary btn-xs" title="editer" href="<?php echo $view['router']->generate('admin_author_edit',array('id'=>$author->getId())) ?>"><i class="fa fa-pencil"></i><a/>
                                    <a class="btn btn-danger btn-xs" title="supprimer" href="<?php echo $view['router']->generate('admin_author_delete',array('id'=>$author->getId())) ?>"><i class="fa fa-trash-o"></i><a/>
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
                         <?php echo $view->render('datagrid/pagination_info.php', array('datagrid'=>$datagrid,'label' => 'auteur(s)')); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>