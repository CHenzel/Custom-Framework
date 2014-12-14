<?php

namespace model;

use model\Base\Livre as BaseLivre;

/**
 * Skeleton subclass for representing a row from the 'livre' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Livre extends BaseLivre
{
    public function getFullName()
    {
        $dateParution = $this->getDateParution() ? $this->getDateParution()->format('Y-m-d') : '- - -';
        $fullName = $this->getNom().' '.$this->getGenre().' ('.$dateParution .')';
        return $fullName;
    }
}
