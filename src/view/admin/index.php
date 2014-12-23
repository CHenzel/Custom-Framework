<?php $view->extend('layout_admin.php') ?>
<div class="row">
    <div class="col-lg-12">
        <?php echo $view->render('flagbag-message.php', array()); ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-8 main-chart">
        <div class="row mtbox">
            <div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                <div class="box1">
                    <span class="fa fa-book"></span>
                    <h3><a title="Liste des livres" href="<?php echo $view['router']->generate('admin_book_list'); ?>"><?php echo $nbBooks; ?></a></h3>
                </div>
                <p>Vous avez <?php echo $nbBooks; ?> livres dans votre librairie. Whoohoo!
                </p>
            </div>
            <div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                <div class="box1">
                    <span class="fa fa-users"></span>
                    <h3><a title="Liste des auteurs" href="<?php echo $view['router']->generate('admin_author_list'); ?>"><?php echo $nbAuthors; ?></a></h3>
                </div>
                <p>Vous avez <?php echo $nbAuthors; ?> auteurs dans votre librairie. Whoohoo!
                </p>
            </div>
        </div>
    </div>
</div>