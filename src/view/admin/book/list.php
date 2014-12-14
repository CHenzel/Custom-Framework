<?php $view->extend('layout_admin.php') ?>
<?php 
    $route = 'admin_book_list';
    $datagrid = $bookDatagrid;
    $books = $datagrid->getResults();
    $form = $datagrid->getFilterFormView();
?>
<h3><i class="fa fa-angle-right"></i> Livre - Liste</h3>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> <a href="<?php echo $view['router']->generate('admin_home') ?>">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-list"></i> <a title="liste" href="<?php echo $view['router']->generate('admin_book_list') ?>">Livres</a>
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
                <form name="filter_book" action="<?php echo $view['router']->generate($route) ?>" method="post" class="form-horizontal filter-form">
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
                            <?php $genres = array('Roman','Science-fiction','Fantastique','Autobiographie'); //Peux être remplacé par referentiel en base ?>
                            <div class="col-md-4">
                                <div class="form-group"> 
                                    <label class="col-sm-2 col-sm-2 control-label">Genre</label>
                                    <div class="col-sm-8">
                                        <select name="genre" class="selectize">
                                            <?php
                                            echo '<option selected="selected"></option>';   
                                            foreach ($genres as $genre) {
                                                if(isset($form['genre']) && ($form['genre']['data'] == $genre))
                                                {
                                                    echo '<option selected="selected">'.$genre.'</option>';
                                                }
                                                else
                                                {
                                                    echo '<option>'.$genre.'</option>';   
                                                }
                                             } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group"> 
                                    <label class="col-sm-2 col-sm-2 control-label">Auteur</label>
                                    <div class="col-sm-8">
                                        <?php $authors = model\AuteurQuery::create()->find(); ?>
                                        <select name="auteur_id" class="selectize">
                                            <?php
                                            echo '<option selected="selected"></option>';   
                                            foreach ($authors as $author) {
                                                if(isset($form['auteur_id']) && ($form['auteur_id']['data'] == $author->getId()))
                                                {
                                                   echo '<option selected="selected" value="'.$author->getId().'" >'.$author->getFullName().'</option>';
                                                }
                                                else
                                                {
                                                    echo '<option value="'.$author->getId().'">'.$author->getFullName().'</option>';   
                                                }
                                             } ?>
                                        </select>
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
                                <th><?php echo $view->render('datagrid/macro.php', array('column'=>'genre','label'=>'Genre','route'=>$route,'datagrid'=>$datagrid)); ?></th>
                                <th><?php echo $view->render('datagrid/macro.php', array('column'=>'auteurId','label'=>'Auteur','route'=>$route,'datagrid'=>$datagrid)); ?></th>
                                <th><?php echo $view->render('datagrid/macro.php', array('column'=>'dateParution','label'=>'Date de parution','route'=>$route,'datagrid'=>$datagrid)); ?></th>
                                <th><?php echo $view->render('datagrid/macro.php', array('column'=>'prix','label'=>'Prix','route'=>$route,'datagrid'=>$datagrid)); ?></th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($books as $book) { ?>
                            <tr>
                                <td><?php echo $book->getId(); ?></td>
                                <td><?php echo $book->getNom(); ?></td>
                                <td><?php echo $book->getGenre(); ?></td>
                                <td><?php echo $book->getAuteur() ? $book->getAuteur()->getFullName() : ''; ?></td>
                                <td><?php echo $book->getDateParution() ? $book->getDateParution()->format('Y-m-d') : ''; ?></td>
                                <td><?php echo $book->getPrix(); ?></td>
                                <td>
                                    <a class="btn btn-success btn-xs" title="voir" href="<?php echo $view['router']->generate('admin_book_show',array('id'=>$book->getId())) ?>"><i class="fa fa-eye"></i><a/>
                                    <a class="btn btn-primary btn-xs" title="editer" href="<?php echo $view['router']->generate('admin_book_edit',array('id'=>$book->getId())) ?>"><i class="fa fa-pencil"></i><a/>
                                    <a class="btn btn-danger btn-xs" title="supprimer" href="<?php echo $view['router']->generate('admin_book_delete',array('id'=>$book->getId())) ?>"><i class="fa fa-trash-o"></i><a/>
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
                         <?php echo $view->render('datagrid/pagination_info.php', array('datagrid'=>$datagrid,'label' => 'livre(s)')); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>