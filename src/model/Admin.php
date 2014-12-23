<?php

namespace model;

use model\Base\Admin as BaseAdmin;

/**
 * Skeleton subclass for representing a row from the 'user_admin' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Admin extends BaseAdmin
{
    const USER_SUPER_ADMIN = 1;
    const USER_ADMIN = 2;
    const STATUT_ACTIF = 1;
    const STATUT_INACTIF = 2;
    
    public function getRoleLabel()
    {
        switch($this->getRole())
        {
            case self::USER_SUPER_ADMIN:
                $roleLabel = 'Super Admin';
            break;
            case self::USER_ADMIN:
                $roleLabel = 'Admin';
            break;
        }
        
        return $roleLabel;
    }
    
    public function getStatutLabel()
    {
        switch($this->getStatut())
        {
            case self::STATUT_ACTIF:
                $statutLabel = 'Actif';
            break;
            case self::STATUT_INACTIF:
                $statutLabel = 'Inactif';
            break;
        }
        
        return $statutLabel;
    }
}
