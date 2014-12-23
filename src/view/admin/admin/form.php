<div class="form-group">
    <label class="col-sm-2 col-sm-2 control-label">Email</label>
    <div class="col-sm-8">
        <input class="form-control" type="text" name="username" value="<?php echo isset($admin) ? $admin->getUserName() : ''; ?>">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 col-sm-2 control-label">Nom</label>
    <div class="col-sm-8">
        <input class="form-control" type="text" name="nom" value="<?php echo isset($admin) ? $admin->getNom() : ''; ?>">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 col-sm-2 control-label">Prénom</label>
    <div class="col-sm-8">
        <input class="form-control" type="text" name="prenom" value="<?php echo isset($admin) ? $admin->getPrenom() : ''; ?>">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 col-sm-2 control-label">Ville</label>
    <div class="col-sm-8">
        <input class="form-control" type="text" name="ville" value="<?php echo isset($admin) ? $admin->getVille() : ''; ?>">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 col-sm-2 control-label">Mot de passe</label>
    <div class="col-sm-8">
        <input class="form-control" type="password" name="password">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 col-sm-2 control-label">Statut</label>
    <?php $statuts = array('Actif' => \model\Admin::STATUT_ACTIF,'Inactif' => \model\Admin::STATUT_INACTIF); ?>
    <div class="col-sm-8">
        <select name="statut" class="selectize">
            <?php foreach ($statuts as $statut => $statutId) 
            {
                if(isset($admin) && ($admin->getStatut()==$statutId))
                {
                     echo '<option selected="selected" value="'.$statutId.'" >'.$statut.'</option>';
                }
                else
                {
                     echo '<option value="'.$statutId.'" >'.$statut.'</option>';
                }
             } ?>
        </select>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 col-sm-2 control-label">Role</label>
    <?php $roles = array('Admin' => \model\Admin::USER_ADMIN,'Super Admin' => \model\Admin::USER_SUPER_ADMIN); ?>
    <div class="col-sm-8">
        <select name="role" class="selectize">
            <?php foreach ($roles as $role => $roleId) 
            {
                if(isset($admin) && ($admin->getRole()==$roleId))
                {
                     echo '<option selected="selected" value="'.$roleId.'" >'.$role.'</option>';
                }
                else
                {
                     echo '<option value="'.$roleId.'" >'.$role.'</option>';
                }
             } ?>
        </select>
    </div>
</div>