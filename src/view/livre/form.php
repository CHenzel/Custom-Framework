<div class="form-panel">
    <h4 class="mb"><i class="fa fa-angle-right"></i> Formulaire d'ajout</h4>
    <form class="form-horizontal style-form" name="livre" action="<?php echo $view['router']->generate('book_new') ?>" method="POST">
        <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label">Nom</label>
            <div class="col-sm-8">
                <input class="form-control" type="text" name="nom">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label">Prix</label>
            <div class="col-sm-8">
                <input class="form-control" type="text" name="prix">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label">Genre</label>
            <div class="col-sm-8">
                <select name="genre" class="selectize">
                    <option>Roman</option>
                    <option>Science-fiction</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label">Date de parution</label>
            <div class="col-sm-8"> 
                <div class='input-group date datetime'>
                    <input name="date_parution" type='text' class="form-control" />
                    <span class="input-group-addon">
                       <i class="fa fa-calendar"></i>
                    </span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10">
                <input type="submit" class="btn btn-round btn-primary pull-right" value="Créer">
            </div>
        </div>
    </form>
</div>