<div class="form-group">
    <label class="col-sm-2 col-sm-2 control-label">Nom</label>
    <div class="col-sm-8">
        <input class="form-control" type="text" name="nom" value="<?php echo isset($book) ? $book->getNom() : ''; ?>">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 col-sm-2 control-label">Prix</label>
    <div class="col-sm-8">
        <input class="form-control" type="text" name="prix" value="<?php echo isset($book) ? $book->getPrix() : ''; ?>">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 col-sm-2 control-label">Genre</label>
    <?php $genres = array('Roman','Science-fiction','Fantastique','Autobiographie'); //Peux être remplacé par referentiel en base ?>
    <div class="col-sm-8">
        <select name="genre" class="selectize">
            <?php foreach ($genres as $genre) {
                if(isset($book) && ($book->getGenre()==$genre))
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
<div class="form-group">
    <label class="col-sm-2 col-sm-2 control-label">Auteur</label>
    <div class="col-sm-8">
        <select name="auteur_id" class="selectize">
            <?php foreach ($authors as $author) {
                if(isset($book) && ($book->getAuteurId() == $author->getId()))
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
<div class="form-group">
    <label class="col-sm-2 col-sm-2 control-label">Date de parution</label>
    <div class="col-sm-8"> 
        <div class='input-group date datetime'>
            <input name="date_parution" type='text' class="form-control" value="<?php echo (isset($book) && $book->getDateParution()) ? $book->getDateParution()->format('Y-m-d') : ''; ?>"/>
            <span class="input-group-addon">
               <i class="fa fa-calendar"></i>
            </span>
        </div>
    </div>
</div>