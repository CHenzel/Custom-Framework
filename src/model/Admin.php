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
}
