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
class AdminFormValidator extends BaseFormValidator
{
    public function setFormValidator()
    {
        $this->formValidator = array(
           'email' => array('required'=>true,'type' => 'string'),
           'nom' => array('required'=>true,'type' => 'string'), 
           'prenom' => array('required'=>true,'type' => 'string'), 
        );
    }
}
