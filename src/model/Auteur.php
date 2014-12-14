<?php

namespace model;

use model\Base\Auteur as BaseAuteur;

/**
 * Skeleton subclass for representing a row from the 'auteur' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Auteur extends BaseAuteur
{
    public function getFullName()
    {
        $dateNaissance = $this->getDateNaissance() ? $this->getDateNaissance()->format('Y-m-d') : '- - -';
        $fullName = $this->getNom().' '.$this->getPrenom().' ('.$dateNaissance .')';
        return $fullName;
    }
}
