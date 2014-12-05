<form name="livre" action="<?php echo $view['router']->generate('test_new') ?>" method="POST">
    <div class="form-group">
        <label>Nom</label>
        <input class="form-control" type="text" name="nom">
    </div>
    <div class="form-group">
        <label>Prix</label>
        <input class="form-control" type="text" name="prix">
    </div>
    <div class="form-group">
        <label>Type</label>
        <select name="type" class="form-control">
            <option>Roman</option>
            <option>Science-fiction</option>
        </select>
    </div>
    <input type="submit" class="btn btn-default btn-lg" value="Créer">
</form>