<?php
namespace app\controller\FormValidator;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of newPHPClass
 *
 * @author charleshenzel
 */
class LivreFormValidator extends BaseFormValidator
{
    public function setFormValidator()
    {
        $this->formValidator = array(
           'nom' => array('required'=>true,'type' => 'string'),
           'prix' => array('required'=>true,'type' => 'number'), 
           'genre' => array('required'=>true,'type' => 'string'),
           'date_parution' => array('required'=>true,'type' => 'string'),
        );
    }
}
