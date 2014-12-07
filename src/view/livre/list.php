<?php $view->extend('layout.php') ?>
<?php 
    $route = 'book_list';
    $datagrid = $bookDatagrid;
    $books = $datagrid->getResults();
   // $form = $datagrid->getFilterFormView();
?>
<h3><i class="fa fa-angle-right"></i> Livre - Liste</h3>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="<?php echo $view['router']->generate('home') ?>">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-book"></i> Livres
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
                <form action="#" method="post" class="form-inline">
                    <div class="row">
                        <div class="col-lg-3">    
                            <button type="submit" class="btn btn-info btn-sm"><i class="fa fa-search"></i> Recherche</button>
                            <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-refresh"></i> rafraichir</a>
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
                                <td><?php echo $book->getDateParution() ? $book->getDateParution()->format('Y-m-d') : ''; ?></td>
                                <td><?php echo $book->getPrix(); ?></td>
                                <td>
                                    <button class="btn btn-success btn-xs"><i class="fa fa-eye"></i></button>
                                    <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
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