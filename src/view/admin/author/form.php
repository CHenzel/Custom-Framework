<div class="form-group">
    <label class="col-sm-2 col-sm-2 control-label">Nom</label>
    <div class="col-sm-8">
        <input class="form-control" type="text" name="nom" value="<?php echo isset($author) ? $author->getNom() : ''; ?>">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 col-sm-2 control-label">Prénom</label>
    <div class="col-sm-8">
        <input class="form-control" type="text" name="prenom" value="<?php echo isset($author) ? $author->getPrenom() : ''; ?>">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 col-sm-2 control-label">Date de naissance</label>
    <div class="col-sm-8"> 
        <div class='input-group date datetime'>
            <input name="date_naissance" type='text' class="form-control" value="<?php echo (isset($author) && $author->getDateNaissance()) ? $author->getDateNaissance()->format('Y-m-d') : ''; ?>"/>
            <span class="input-group-addon">
               <i class="fa fa-calendar"></i>
            </span>
        </div>
    </div>
</div>